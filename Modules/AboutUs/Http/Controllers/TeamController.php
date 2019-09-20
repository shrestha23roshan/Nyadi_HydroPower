<?php

namespace Modules\AboutUs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AboutUs\Repositories\Team\TeamRepository;
use Modules\AboutUs\Http\Requests\Team\StoreRequest;
use Modules\AboutUs\Http\Requests\Team\UpdateRequest;

class TeamController extends Controller
{
    private $team;

    public function __construct(TeamRepository $team)
    {
        $this->team = $team;
        $this->destinationpath = 'uploads/aboutus/teams/';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('aboutus::Team.index')
        ->withTeams($this->team->getLatest());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('aboutus::Team.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('attachment');

        $imageFile = $request->attachment;
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "team_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        $team = $this->team->create($data);
        if ($team) {
            return redirect()->route('admin.about-us.team.index')
            ->withSuccessMessage('Team is added successfully.');
        }
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Team can not be added.');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('aboutus::Team.edit')
        ->withTeam($this->team->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $team = $this->team->find($id);

        $imageFile = $request->attachment;
        if ($imageFile) {
            if (file_exists($this->destinationpath . $team->attachment) &&  $team->attachment != '') {
                unlink($this->destinationpath . $team->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "team_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : null;
        }
        
        $team = $this->team->update($id, $data);
        if($team){
            return redirect()->route('admin.about-us.team.index')
                ->withSuccessMessage('Team is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Team can not be updated.');
    }
    

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $team = $this->team->find($id);
        $previousAttachment = $team->attachment;

        $flag = $this->team->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Team is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Team can not be deleted.',
        ], 422);
    }
}
