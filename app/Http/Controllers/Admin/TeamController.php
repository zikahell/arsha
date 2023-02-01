<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $members = DB::table('teams')->get();
    return view('team.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $request->validate([
      'name' => 'required|min:3|max:20',
      'job' => 'required|min:3|max:50',
      'description' => 'required|min:5|max:100',
      'image' => 'required|image|mimes:png,jpg,jpeg',
      'facebook'=>'required',
      'linkedin'=>'required'
    ]);
    $imageName = time().'.'.$request->image->extension();
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
    return back()->with('success', 'Member Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $member = Team::findOrFail($id);
    return view('team.edit')->with('member',$member);
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
      $request->validate([
        'name' => 'required|min:3|max:20',
        'job' => 'required|min:3|max:50',
        'description' => 'required|min:5|max:100',
        'image' => 'required|image|mimes:png,jpg,jpeg',
        'facebook'=>'required',
        'linkedin'=>'required'
      ]);
      $imageName = time().'.'.$request->image->extension();
      $request->image->move(public_path('front/team,upload'), $imageName);

      DB::table('teams')->where('id', $id)->update([
        'name'=>$request->name,
        'job'=>$request->job,
        'description'=>$request->description,
        'image'=>$imageName,
        'facebook'=>$request->facebook,
        'instagram'=>$request->instagram,
        'twitter'=>$request->twitter,
        'linkedin'=>$request->linkedin
      ]);
      return back()->with('success', 'Member Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $row = Team::findOrFail($id);
    $row->destroy($id);
    return back()->with('success', 'Member Deleted Successfully');
    }
}
