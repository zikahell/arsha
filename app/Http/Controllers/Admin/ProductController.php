<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $categories = Category::all();
    return view('product.create',compact('categories'));
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
      'name' => 'required|min:3|max:30',
      'description' => 'required|min:3|max:30',
      'category_id' => 'required',
      'image' => 'required|mimes:png,jpg,jpeg',
      'client'=>'required|min:3|max:20'
    ]);
    $imageName=time().'.'.$request->image->extension();
    $request->image->move(public_path('front/product.upload'),$imageName);
    $category = Category::findOrFail($request->category_id);
    $category->products()->create([
      'name' => $request->name,
      'description' => $request->description,
      'image' => $imageName,
      'client'=>$request->client
    ]);
    return back()->with('success', 'Product Added Successfully');
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
    $categories = Category::all();
    $products = Product::findOrFail($id);
    return view('product.edit',compact('categories','products'));
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
        'name' => 'required|min:3|max:30',
        'description' => 'required|min:3|max:30',
        'category_id' => 'required',
        'image' => 'required|mimes:png,jpg,jpeg',
        'client'=>'required|min:3|max:20'
      ]);
      $imageName=time().'.'.$request->image->extension();
      $request->image->move(public_path('front/product.upload'),$imageName);
      $category = Category::findOrFail($request->category_id);
      DB::table('products')->where('id',$id)->update([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $imageName,
        'category_id'=>$request->category_id,
        'client'=>$request->client
      ]);
      return back()->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $row = Product::findOrFail($id);
    $row->destroy($id);
    return back()->with('success', 'Product Deleted Successfully');
    }
}
