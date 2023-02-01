<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
    $members = DB::table('teams')->get();
    return $this->apiResponse($members,'Members Showed',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
    //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $validator=Validator::make($request->all(),[
      'name' => 'required|min:3|max:20',
      'job' => 'required|min:3|max:50',
      'description' => 'required|min:5|max:100',
      'image' => 'required|image|mimes:png,jpg,jpeg',
      'facebook'=>'required',
      'linkedin'=>'required'
    ]);
    if (!$validator->fails()) {
      $imageName = time() . '.' . $request->image->extension();
      $request->image->move(public_path('front/team,upload'), $imageName);
      $team = new Team;
      $team->name = $request->name;
      $team->job = $request->job;
      $team->description = $request->description;
      $team->image = $imageName;
      $team->facebook = $request->facebook;
      $team->instagram = $request->instagram;
      $team->twitter = $request->twitter;
      $team->linkedin = $request->linkedin;
      $team->save();
      return $this->apiResponse($team,'Team Created',201);
    } else
      return $this->apiResponse(null, $validator->errors(), 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $member = Team::find($id);
    if(!$member){
      return $this->apiResponse(null, 'MEMBER DOESNT EXIST', 404);
    }
    return $this->apiResponse($member, 'Member founded', 200);

    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // $member = Team::findOrFail($id);
    // return view('team.edit')->with('member',$member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator=Validator::make($request->all(),[
        'name' => 'required|min:3|max:20',
        'job' => 'required|min:3|max:50',
        'description' => 'required|min:5|max:100',
        'image' => 'required|image|mimes:png,jpg,jpeg',
        'facebook'=>'required',
        'linkedin'=>'required'
      ]);
    if (!$validator->fails()) {
      $imageName = time() . '.' . $request->image->extension();
      $request->image->move(public_path('front/team,upload'), $imageName);

      $data=DB::table('teams')->where('id', $id)->update([
        'name' => $request->name,
        'job' => $request->job,
        'description' => $request->description,
        'image' => $imageName,
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'twitter' => $request->twitter,
        'linkedin' => $request->linkedin
      ]);
      $data = DB::table('teams')->where('id', $id)->get();
      return $this->apiResponse($data,'Member Updated Successfully',200);
    }
    else
    return $this->apiResponse(null,$validator->errors(),404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $row = Team::find($id);
    if(!$row){
      return $this->apiResponse(null, 'MEMBER DOESNT EXIST', 404);
    }
    $row->destroy($id);
    return $this->apiResponse(null, 'Member Deleted', 200);
    }
}
