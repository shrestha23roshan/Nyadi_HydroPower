<?php

namespace App\Http\Controllers;

use Modules\MediaManagement\Repositories\Banner\BannerRepository;
use Modules\AboutUs\Repositories\CompanyProfile\CompanyProfileRepository;
use Modules\MediaManagement\Repositories\Album\AlbumRepository;
use Modules\NewsAndUpdate\Repositories\News\NewsRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;
use Modules\Settings\Repositories\Setting\SettingRepository;
use App\Http\Requests\ContactFormRequest;
use Mail;
use Modules\Popup\Repositories\Popup\PopupRepository;

class HomeController extends Controller
{
    private $banner;
    private $company_profile;
    private $album;
    private $news;
    private $seo;
    private $setting;
    private $popup;

    public function __construct(
        BannerRepository $banner,
        CompanyProfileRepository $company_profile,
        AlbumRepository $album,
        NewsRepository $news,
        SeoRepository $seo,
        SettingRepository $setting,
        PopupRepository $popup
    )
    {
        $this->banner = $banner;
        $this->company_profile = $company_profile;
        $this->album = $album;
        $this->news = $news;
        $this->seo = $seo;
        $this->setting = $setting;
        $this->popup = $popup;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.frontend.index')
        ->withBanners($this->banner->getActive())
        ->withCompanyProfile($this->company_profile->getActive())
        ->withAlbums($this->album->getActive()->take(4))
        ->withNews($this->news->getActive())
        ->withSetting($this->setting->getSetting())
        ->withSeo($this->seo->findByField('page', 'home'))
        ->withPopup($this->popup->getActive());


    }

    public function getContacts()
    {
        return view('layouts.frontend.contacts')
        ->withSetting($this->setting->getSetting())
        ->withSeo($this->seo->findByField('page', 'contact-us'));
    }

    public function sendmail(ContactFormRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'user_message' => $request->get('message')
        ];
         \Mail::send('email.contact', $data , function($message){
            $message->from('shrestha23roshan@gmail.com');
            $message->to('test46076@gmail.com')
            ->subject('Nyadi Contact Form Message');
        });

        return \Redirect::route('contacts')->with('success_message', 'Thank you for contacting us!');
    }
}
