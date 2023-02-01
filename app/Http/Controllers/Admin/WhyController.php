<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Why;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $whies = Why::all();
      return view('why_us.index',compact('whies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('why_us.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'question' => 'required|min:20|max:500',
        'answer' => 'required|min:20|max:500'
      ]);
      Why::create([
        'question' => $request->question,
        'answer' => $request->answer
      ]);
      return back()->with('success', 'Question Added Successfully');
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
      $why = Why::findOrFail($id);
      return view('why_us.edit', compact('why'));
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
      $request->validate([
        'question' => 'required|min:20|max:500',
        'answer' => 'required|min:20|max:500'
      ]);
      DB::table('whies')->where('id',$id)->update([
        'question' => $request->question,
        'answer' => $request->answer
      ]);
      return back()->with('success', 'Question Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $row = Why::findOrFail($id);
      $row->destroy($id);
      return back()->with('success', 'Question Deleted Successfully');
    }
}
