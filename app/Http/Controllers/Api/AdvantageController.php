<?php

namespace App\Http\Controllers\Api;

use App\Models\Plan;
use App\Models\Advantage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
    $advantages = Advantage::all();
    return $this->apiResponse($advantages,'Advantage Showed',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $plans = Plan::all();
      // return view('advantage.create',compact('plans'));
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
        'advantage' => 'required|min:7|max:30',
        'plan_id' => 'required',
      ]);
    if (!$validated->fails()) {
      $plan = Plan::find($request->plan_id);
      $data=$plan->advantages()->create([
        'advantage' => $request->advantage,
      ]);
      return $this->apiResponse($data,'Advantage Stored',200);
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
    $advantage = Advantage::find($id);
    if(!$advantage){
      return $this->apiResponse(null,'Advantage not exist',404);
    }
    return $this->apiResponse($advantage,'Advantage Showed',200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // $plans = Plan::all();
      // $advantages = Advantage::findOrFail($id);
      // return view('advantage.edit',compact('plans','advantages'));
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
        'advantage' => 'required|min:7|max:30',
        'plan_id' => 'required',
      ]);
    if (!$validated->fails()) {
      $plan = Plan::find($request->plan_id);
      
      DB::table('advantages')->where('id', $id)->update([
        'advantage' => $request->advantage,
        'plan_id' => $request->plan_id,
      ]);
      $data = DB::table('advantages')->where('id', $id)->get();
      return $this->apiResponse($data,'Advantage updated',200);
    }
    else
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
      $advantage = Advantage::find($id);
      if(!$advantage){
        return $this->apiResponse(null,'Advantage not exist',404);
      }
      $advantage->destroy($id);
      return $this->apiResponse(null,'Advantage DELETED',200);
    }
}
