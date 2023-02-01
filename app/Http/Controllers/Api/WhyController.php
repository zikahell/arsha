<?php

namespace App\Http\Controllers\Api;

use App\Models\Why;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WhyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
      $whies = Why::all();
      return $this->apiResponse($whies,'Why us Showed',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // return view('why_us.create');

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
        'question' => 'required|min:20|max:500',
        'answer' => 'required|min:20|max:500'
      ]);
    if (!$validated->fails()) {
      $why=Why::create([
        'question' => $request->question,
        'answer' => $request->answer
      ]);
      return $this->apiResponse($why,'Why us Created',201);
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
    $why = Why::find($id);
    if(!$why){
      return $this->apiResponse(null,'Why us not exist',404);
    }
    return $this->apiResponse($why,'Why us Question Showed',200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // $why = Why::findOrFail($id);
      // return view('why_us.edit', compact('why'));
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
        'question' => 'required|min:20|max:500',
        'answer' => 'required|min:20|max:500'
      ]);
    if (!$validated->fails()) {
      DB::table('whies')->where('id', $id)->update([
        'question' => $request->question,
        'answer' => $request->answer
      ]);
      $data = DB::table('whies')->where('id', $id)->get();
      return $this->apiResponse($data,'Why us updated',200);
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
      $why = Why::find($id);
      if(!$why){
        return $this->apiResponse(null,'Why us not exist',404);
      }
      $why->destroy($id);
      return $this->apiResponse(null,'Why us Question Deleted',200);
    }
}
