<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $plans = Plan::all();
    return view('plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('plan.create');
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
      'name' => 'required|min:3|max:20',
      'price' => 'required|numeric|min:3|max:200',
      'duration' => 'required|min:3|max:20',
    ]);
    Plan::create([
      'name' => $request->name,
      'price' => $request->price,
      'duration' => $request->duration
    ]);
    return back()->with('success', 'Plan Added Successfully');
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
    $plan = Plan::findOrFail($id);
    return view('plan.edit')->with('plan', $plan);
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
        'name' => 'required|min:3|max:20',
        'price' => 'required|numeric|min:3|max:200',
        'duration' => 'required|min:3|max:20',
      ]);
      DB::table('plans')->where('id',$id)->update([
        'name' => $request->name,
        'price' => $request->price,
        'duration' => $request->duration
      ]);
      return back()->with('success', 'Plan Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $row = Plan::findOrFail($id);
    $row->destroy($id);
    return back()->with('success', 'Plan Deleted Successfully');
    }
}
