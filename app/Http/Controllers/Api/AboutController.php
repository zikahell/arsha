<?php

namespace App\Http\Controllers\Api;

use App\Models\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
    $content = AboutContent::find(1);
    return $this->apiResponse($content,'About Show',200);
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
      // $content = AboutContent::findOrFail(1);
      // return view('about.edit')->with('content',$content);
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
        'title' => 'required|min:20|max:200',
        'line1' => 'required|min:20|max:60',
        'line2' => 'required|min:20|max:60',
        'line3' => 'required|min:20|max:60',
        'description' => 'required|min:25|max:500'
      ]);
    if (!$validated->fails()) {
      $data=DB::table('about_contents')->where('id', $id)->update([
        'title' => $request->title,
        'line1' => $request->line1,
        'line2' => $request->line2,
        'line3' => $request->line3,
        'description' => $request->description
      ]);
      $data = DB::table('about_contents')->where('id', $id)->get();
      return $this->apiResponse($data,'About Updated',200);
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
