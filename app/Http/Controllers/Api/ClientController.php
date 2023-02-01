<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
  use ApiResponseTrait;
  
    public function store(Request $request){
    $validator=Validator::make($request->all(),[
      'image'=> 'required|image|mimes:png,jpg,jpeg'
    ]);
    if (!$validator->fails()) {
      $imageName = time() . '.' . $request->image->extension();
      $request->image->move(public_path('front/client.upload'), $imageName);

      $client = new Client;
      $client->image = $imageName;
      $client->save();

      return $this->apiResponse($client,'Client Created',201);
    } 
    else
      return $this->apiResponse(null, $validator->errors(), 404);

    }
    public function index(){
    $clients = DB::table('clients')->get();
    return $this->apiResponse($clients,'Clients Showed',200);
    }
    public function destroy($id){
    $row = Client::find($id);
    if(!$row){
      return $this->apiResponse(null, 'Client not found', 404);
    }
    $row->destroy($id);
    return $this->apiResponse($row,'Clients Deleted',200);
    }
}
