<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function showAllMessages(){
    $messages = DB::table('messages')->paginate(5);
    return view('message.message', compact('messages'));
    }
    public function destroy($id){
      $row = Message::findOrFail($id);
      $row->destroy($id);
      return back()->with('success','Message Deleted Successfully');
    }
}
