<?php

namespace App\Http\Controllers\Api;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
    $infos = Info::all();
    return $this->apiResponse($infos,'Informations Showed',200);
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
    //   $validated = Validator::make($request->all(),[
    //   'address' => 'required|min:5|max:50',
    //   'city' => 'required|min:5|max:50',
    //   'post_code' => 'required|numeric|min:5',
    //   'country' => 'required|min:5|max:50',
    //   'phone' => 'required|min:10|max:14',
    //   'email' => 'required|min:5|max:50',
    // ]);
    // if (!$validated->fails()) {
    //   $info = new Info;
    //   $info->address = $request->address;
    //   $info->city = $request->city;
    //   $info->post_code = $request->post_code;
    //   $info->country = $request->country;
    //   $info->phone = $request->phone;
    //   $info->email = $request->email;
    //   $info->save();
    //   return $this->apiResponse($info,'Info Stored',201);
    // }
    // else 
    // return $this->apiResponse(null,$validated->errors(),404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // $info = Info::findOrFail($id);
    // return view('info.edit')->with('info', $info);
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
        'address' => 'required|min:5|max:50',
        'city' => 'required|min:5|max:50',
        'post_code' => 'required|numeric|min:5',
        'country' => 'required|min:5|max:50',
        'phone' => 'required|min:10|max:14',
        'email' => 'required|min:5|max:50',
      ]);
    if (!$validated->fails()) {
      DB::table('infos')->where('id', $id)->update([
        'address' => $request->address,
        'city' => $request->city,
        'post_code' => $request->post_code,
        'country' => $request->country,
        'phone' => $request->phone,
        'email' => $request->email,
      ]);
      $data = DB::table('infos')->where('id', $id)->get();
      return $this->apiResponse($data,'Info updated',200);
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
        //
    }
}
