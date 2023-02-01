<?php

namespace App\Http\Controllers\Api;

use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
    $socials = Social::all();
    return $this->apiResponse($socials,'Social Info Showed',200);
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
        //
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
    // $social = Social::findOrFail($id);
    // return view('social.edit')->with('social', $social);
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
      'description' => 'required',
      'facebook' => 'required',
      'twitter' => 'required',
      'instagram' => 'required',
      'linkedin' => 'required',
      'skype' => 'required',
    ]);
    if (!$validated->fails()) {
      DB::table('socials')->where('id', $id)->update([
        'description' => $request->description,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'instagram' => $request->instagram,
        'linkedin' => $request->linkedin,
        'skype' => $request->skype,
      ]);
      $data = DB::table('socials')->where('id', $id)->get();
      return $this->apiResponse($data, 'Social Info Updated', 200);
    }
    else
    return $this->apiResponse(null, $validated->errors(), 404);
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
