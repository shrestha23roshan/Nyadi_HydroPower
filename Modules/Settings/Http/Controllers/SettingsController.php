<?php

namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Settings\Repositories\Setting\SettingRepository;
use Modules\Settings\Http\Requests\Setting\UpdateRequest;
use Modules\Settings\Http\Requests\Profile\ProfileUpdateRequest;
use Modules\Configuration\Repositories\User\UserRepository;
use Intervention\Image\Facades\Image;
use Modules\Settings\Http\Requests\Profile\PasswordUpdateRequest;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    private $setting;
    private $user;

    public function __construct(SettingRepository $setting, UserRepository $user)
    {
        $this->setting = $setting;
        $this->user = $user;
        $this->destinationpath = 'uploads/settings/';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('settings::Setting.index')
        ->withSetting($this->setting->find(1));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request)
    {
        
        $data = $request->except('site_logo', 'site_favicon');

        $siteLogo = $request->site_logo;
        if($siteLogo) {
            $extension = strrchr($siteLogo->getClientOriginalName(), '.');
            $new_file_name = "logo_" . time();
            $attachment = $siteLogo->move($this->destinationpath, $new_file_name.$extension);
            $data['site_logo'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        $siteFavicon = $request->site_favicon;
        if($siteFavicon) {
            $extension = strrchr($siteFavicon->getClientOriginalName(), '.');
            $new_file_name = "favicon_" . time();
            $attachment = $siteFavicon->move($this->destinationpath, $new_file_name.$extension);
            $data['site_favicon'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $setting = $this->setting->update('1', $data);

        if($setting){
            return redirect()->route('admin.settings.index')
                ->withSuccessMessage('Settings is saved successfully.');
        }
        return redirect()->back()->withInput()
            ->withWarningMessage('Settings can not be saved.');
    }

    // For Profile Update

    public function profile()
    {
        return view('settings::Profile.profile');
    }

    
    /**
     * Update the profile resource in storage.
     * @param  ProfileUpdateRequest $request
     * @return Response
     */
    public function updateProfile(ProfileUpdateRequest $request)
    {
        $user = $this->user->find(auth()->id());

        $data = $request->except('image_icon');

        // Retrieve previous User image icon name
        $temp = $user->image_icon;

        $imagePath = null;
        if($temp != null){
            $oldImageName = $temp.'-s.jpg';
            $imagePath = 'uploads/settings/profile/'.$oldImageName;
        }
        $imageFile = $request->file('image_icon');

        if($imageFile){
            // Remove previous user image icon from profile folder
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
            
            $tmpFilePath = 'uploads/settings/profile/';
            $hardPath = str_slug($data['email'], '-'). '-' .md5(time());
            $img = Image::make($imageFile);

            $img->fit(80, 80)->save($tmpFilePath.$hardPath.'-s.jpg');
            $user->image_icon = $hardPath;
        }

        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->designation = $data['designation'];
        $user->save();
        if($user->save()){
            return redirect()->back()->withInput()
                ->withSuccessMessage('Profile is updated successfully.');
        }
        return redirect()->back()->withInput()
            ->withWarningMessage('Profile can not be updated.');
    }

     /**
     * Update the password resource in storage.
     * @param  ProfileUpdateRequest $request
     * @return Response
     */
    public function updatePassword(PasswordUpdateRequest $request)
    {
        $credentials = $request->only('password', 'password_confirmation');
        $user = Auth::user();
        $user->password = bcrypt($credentials['password']);
        $user->save();
        if($user->save()){
            return redirect()->back()
                ->withSuccessMessage('Password is updated successfully.');
        }
        return redirect()->back()
            ->withWarningMessage('Password can not be updated.');
    }

}
