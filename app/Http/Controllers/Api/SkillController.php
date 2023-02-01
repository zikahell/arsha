<?php

namespace App\Http\Controllers\Api;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
    $skills = Skill::all();
    return $this->apiResponse($skills,'Skills Showed',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    // return view('skill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = Validator::make($request->all(),[
        'name' => 'required|min:1|max:20',
        'percent' => 'required|numeric|min:1|max:100'
      ]);
    if (!$validated->fails()) {
      $skill=Skill::create([
        'name' => $request->name,
        'percent' => $request->percent
      ]);
      return $this->apiResponse($skill,'Skill Stored',201);
    }
    else
    return $this->apiResponse(null,$validated->errors(),404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $skill = Skill::find($id);
    if(!$skill){
      return $this->apiResponse(null, 'Skill not found', 404);
    }
    return $this->apiResponse($skill, 'Skill Showed', 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // $skill = Skill::findOrFail($id);
    // return view('skill.edit', compact('skill'));
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
      $validated = Validator::make($request->all(),[
        'name' => 'required|min:1|max:20',
        'percent' => 'required|numeric|min:1|max:100'
      ]);
    if (!$validated->fails()) {
      $data = DB::table('skills')->where('id', $id)->update([
        'name' => $request->name,
        'percent' => $request->percent
      ]);
      $data = DB::table('skills')->where('id', $id)->get();
      return $this->apiResponse(null,'Skill updated',200);
    }
    return $this->apiResponse(null,$validated->errors(),404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $skill = Skill::find($id);
    if(!$skill){
      return $this->apiResponse(null, 'Skill not found', 404);
    }
    $skill->destroy($id);
    return $this->apiResponse(null, 'Skill Deleted', 200);
    }
}
