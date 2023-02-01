<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function create(){
    return view('client.create');
    }
    public function store(Request $request){
    $request->validate([
      'image'=> 'required|image|mimes:png,jpg,jpeg'
    ]);
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('front/client.upload'), $imageName);

    $client = new Client;
    $client->image = $imageName;
    $client->save();

    return back()->with('success', 'Image Uploaded Successfuly');

    // return view('client.create');
    }
    public function index(){
    $clients = DB::table('clients')->get();
    return view('client.index',compact('clients'));
    }
    public function destroy($id){
    $row = Client::findOrFail($id);
    $row->destroy($id);
    return back()->with('sucess', 'Image Deleted Successfully');
    }

}
