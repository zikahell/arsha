<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
    $services = DB::table('services')->get();
    return $this->apiResponse($services,'Services Showed',200);
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
      $validated = Validator::make($request->all(),[
      'title' => 'required|min:3|max:20',
      'description' => 'required|min:5|max:50',
      'icon' => 'required|min:3|max:50'
    ]);
    if (!$validated->fails()) {
      $service = new Service;
      $service->title = $request->title;
      $service->description = $request->description;
      $service->icon = $request->icon;
      $service->save();
      return $this->apiResponse($service,'Service Added',201);
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
    $service = Service::find($id);
    if(!$service){
      return $this->apiResponse(null,'Service is not exist',404);
    }
    return $this->apiResponse($service,'Service exist',200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //
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
        'title' => 'required|min:3|max:20',
        'description' => 'required|min:5|max:50',
        'icon' => 'required|min:3|max:50'
      ]);
    if (!$validated->fails()) {
      $data=DB::table('services')->where('id', $id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'icon' => $request->icon
      ]);
      $data = DB::table('services')->where('id', $id)->get();
      return $this->apiResponse($data, 'Service Updated', 200);
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
    $row = Service::find($id);
    if(!$row){
      return $this->apiResponse(null,'Service is not exist',404);
    }
    
    $row->destroy($id);
    return $this->apiResponse($row,'Service Delted',200);
    }
}
