<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $services = DB::table('services')->get();
    return view('service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('service.create');
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
      'title' => 'required|min:3|max:20',
      'description' => 'required|min:5|max:50',
      'icon' => 'required|min:3|max:50'
    ]);
    $service = new Service;
    $service->title = $request->title;
    $service->description = $request->description;
    $service->icon = $request->icon;
    $service->save();
    return back()->with('success', 'Service Added Successfully');
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
    $service = Service::findOrFail($id);
    return view('service.edit')->with('service',$service);
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
        'title' => 'required|min:3|max:20',
        'description' => 'required|min:5|max:50',
        'icon' => 'required|min:3|max:50'
      ]);
      DB::table('services')->where('id', $id)->update([
        'title'=>$request->title,
        'description'=>$request->description,
        'icon'=>$request->icon
      ]);
    return back()->with('success', 'Service Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $row = Service::findOrFail($id);
    $row->destroy($id);
    return back()->with('success', 'Service Deleted Successfully');
    }
}
