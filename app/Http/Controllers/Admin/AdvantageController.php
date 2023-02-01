<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $advantages = Advantage::all();
    return view('advantage.index', compact( 'advantages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $plans = Plan::all();
      return view('advantage.create',compact('plans'));
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
        'advantage' => 'required|min:7|max:30',
        'plan_id' => 'required',
      ]);
      $plan = Plan::findOrFail($request->plan_id);
      $plan->advantages()->create([
        'advantage' => $request->advantage,
      ]);
      return back()->with('success', 'Advantage Added Successfully');
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
      $plans = Plan::all();
      $advantages = Advantage::findOrFail($id);
      return view('advantage.edit',compact('plans','advantages'));
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
        'advantage' => 'required|min:7|max:30',
        'plan_id' => 'required',
      ]);
      $plan = Plan::findOrFail($request->plan_id);
      DB::table('advantages')->where('id',$id)->update([
        'advantage' => $request->advantage,
        'plan_id'=>$request->plan_id,
      ]);
      return back()->with('success', 'Advantage Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $row = Advantage::findOrFail($id);
      $row->destroy($id);
      return back()->with('success', 'Advantage Deleted Successfully');
    }
}
