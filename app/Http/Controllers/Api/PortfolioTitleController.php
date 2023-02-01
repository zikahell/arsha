<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PortfolioTitle;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PortfolioTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
    $titles = PortfolioTitle::all();
    return $this->apiResponse($titles,'Portfolio Title Showed',200);
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
    // $title = PortfolioTitle::findOrFail($id);
    // return view('portfolio_title.edit')->with('title',$title);
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
      'title' => 'required|min:10|max:500'
    ]);
    if (!$validated->fails()) {
      DB::table('portfolio_titles')->where('id', $id)->update([
        'title' => $request->title
      ]);
      $data = DB::table('portfolio_titles')->where('id', $id)->get();
      return $this->apiResponse($data, 'Portfolio Title updated', 200);
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
