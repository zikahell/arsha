<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    // return view('front.layouts.app');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = Validator::make($request->all(),
        [
          'name'=>'required|min:3|max:20',
          'email'=>'required|email',
          'subject'=>'required|string|max:20',
          'content'=>'required|max:1000'
        ]
        // [Alert::error('Error', 'Your Message did not been send')]
      );
    if (!$validated->fails()) {
      $message = new Message;
      $message->name = $request->name;
      $message->email = $request->email;
      $message->subject = $request->subject;
      $message->content = $request->content;
      $message->save();
      Alert::success('Success', 'Your Message Added Successfully');
      Mail::to(request('email'))->send(new ContactUs());
      return back();
    
    } 
     else {
      Alert::error('Error', 'Your Message have not been sended');
      return back();
     }
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
        //
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
        //
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
