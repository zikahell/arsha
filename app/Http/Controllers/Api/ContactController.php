<?php

namespace App\Http\Controllers\Api;

use App\Mail\ContactUs;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiResponseTrait;
    public function index()
    {
    $messages = DB::table('messages')->get();

    return $this->apiResponse($messages, 'ok', 200);
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
    Mail::to(request('email'))->send(new ContactUs());
    return $this->apiResponse($message,'Message Created',201);
  } 
   else {
    return $this->apiResponse(null,$validated->errors(),404);
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
    $message = Message::find($id);
    if(!$message){
      return $this->apiResponse(null,'Message Not found',404);
    }
    return $this->apiResponse($message, 'Message Showed', 200);
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
      $row = Message::find($id);
      if(!$row){
        return $this->apiResponse(null,'Message Not found',404);
      }
      $row->destroy($id);
      return $this->apiResponse(null,'Message Deleted',200);
    
    }
  }
