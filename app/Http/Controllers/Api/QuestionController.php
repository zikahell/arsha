<?php

namespace App\Http\Controllers\Api;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
    $questions = Question::all();
    return $this->apiResponse($questions,'Questions Showed',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    // return view('question.create');
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
      'question' => 'required|min:10|max:100',
      'answer' => 'required|min:10|max:500'
    ]);
    if (!$validated->fails()) {
      $q=Question::create([
        'question' => $request->question,
        'answer' => $request->answer
      ]);
      return $this->apiResponse($q,'Questions stored',200);
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
    $q = Question::find($id);
    if(!$q){
      return $this->apiResponse(null, 'Quesion not found', 404);
    }
    return $this->apiResponse($q, 'Quesion founded', 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // $question = Question::findOrFail($id);
    // return view('question.edit')->with('question', $question);
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
        'question' => 'required|min:10|max:100',
        'answer' => 'required|min:10|max:500'
      ]);
    if (!$validated->fails()) {
      $data = DB::table('questions')->where('id', $id)->update([
        'question' => $request->question,
        'answer' => $request->answer
      ]);
      $data = DB::table('questions')->where('id', $id)->get();
      return $this->apiResponse($data,'Questions updated',200);
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
    $q = Question::find($id);
    if(!$q){
      return $this->apiResponse(null, 'Quesion not found', 404);
    }
    $q->destroy($id);
    return $this->apiResponse($q, 'Quesion Deleted', 200);
    }
}
