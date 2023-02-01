<?php

namespace App\Http\Controllers\Api;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
    $plans = Plan::all();
    return $this->apiResponse($plans,'Plans Showed',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    // return view('plan.create');
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
      'name' => 'required|min:3|max:20',
      'price' => 'required|numeric|min:3|max:200',
      'duration' => 'required|min:3|max:20',
    ]);
    if (!$validated->fails()) {
      $plan=Plan::create([
        'name' => $request->name,
        'price' => $request->price,
        'duration' => $request->duration
      ]);
      return $this->apiResponse($plan,'PLAN CREATED',201);
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
    $plan = Plan::find($id);
    if(!$plan){
      return $this->apiResponse(null,'PLAN not exist',404);

    }
    return $this->apiResponse($plan,'PLAN Showed',200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // $plan = Plan::findOrFail($id);
    // return view('plan.edit')->with('plan', $plan);
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
        'name' => 'required|min:3|max:20',
        'price' => 'required|numeric|min:3|max:200',
        'duration' => 'required|min:3|max:20',
      ]);
    if (!$validated->fails()) {
      DB::table('plans')->where('id', $id)->update([
        'name' => $request->name,
        'price' => $request->price,
        'duration' => $request->duration
      ]);
      $data = DB::table('plans')->where('id', $id)->get();
      return $this->apiResponse($data,'PLAN updated',200);
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
    $plan = Plan::find($id);
    if(!$plan){
      return $this->apiResponse(null,'PLAN not exist',404);
    }
    $plan->destroy($id);
    return $this->apiResponse(null,'PLAN Deleted',200);
    }
}
