<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
      $products = Product::all();
      return $this->apiResponse($products,'Products Showed',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    // $categories = Category::all();
    // return view('product.create',compact('categories'));
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
      'name' => 'required|min:3|max:30',
      'description' => 'required|min:3|max:30',
      'category_id' => 'required',
      'image' => 'required|mimes:png,jpg,jpeg',
      'client'=>'required|min:3|max:20'
    ]);
    if (!$validated->fails()) {
      $imageName = time() . '.' . $request->image->extension();
      $request->image->move(public_path('front/product.upload'), $imageName);
      $category = Category::findOrFail($request->category_id);
      $category->products()->create([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $imageName,
        'client' => $request->client
      ]);
      return $this->apiResponse(1,'Products created',200);

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
    $product = Product::find($id);
    if(!$product){
      return $this->apiResponse(null,'Product is not exist',404);

    }
    return $this->apiResponse($product,'Products exist',200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // $categories = Category::all();
    // $products = Product::findOrFail($id);
    // return view('product.edit',compact('categories','products'));
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
        'name' => 'required|min:3|max:30',
        'description' => 'required|min:3|max:30',
        'category_id' => 'required',
        'image' => 'required|mimes:png,jpg,jpeg',
        'client'=>'required|min:3|max:20'
      ]);
    if (!$validated->fails()) {
      $imageName = time() . '.' . $request->image->extension();
      $request->image->move(public_path('front/product.upload'), $imageName);
      $category = Category::findOrFail($request->category_id);
      $data=DB::table('products')->where('id', $id)->update([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $imageName,
        'category_id' => $request->category_id,
        'client' => $request->client
      ]);
      $data = DB::table('products')->where('id', $id)->get();
      return $this->apiResponse($data,'Products updated',200);
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
    $row = Product::find($id);
    if(!$row){
      return $this->apiResponse(null,'Product is not exist',404);
    }

    $row->destroy($id);
    return $this->apiResponse($row,'Products deleted',200);
    }
}
