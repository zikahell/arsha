<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  use ApiResponseTrait;
    public function index()
    {
    $categories = Category::all();
    return $this->apiResponse($categories,'Categories Showed',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    // return view('category.create');
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
          'name'=>'required|min:3|max:20'
        ]);
    if (!$validated->fails()) {
      $category=Category::create([
        'name' => $request->name
      ]);
      return $this->apiResponse($category, 'Categories Added', 201);
    } else
      return $this->apiResponse(null, $validated->errors(), 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $category = Category::find($id);
    if(!$category){
      return $this->apiResponse(null,'Categories is not exist',404);
    }
    return $this->apiResponse($category,'Categories exist',200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // $categories = Category::findOrFail($id);
    // return view('category.edit', compact('categories'));
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
        'name'=>'required|min:3|max:20'
      ]);
    if (!$validated->fails()) {
      $data=DB::table('categories')->where('id', $id)->update([
        'name' => $request->name
      ]);
      $data = DB::table('categories')->where('id', $id)->get();
      return $this->apiResponse($data,'Category updated',200);
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
    $row = Category::find($id);
    if(!$row){
      return $this->apiResponse(null,'Categories is not exist',404);
    }
    $row->destroy($id);
    return $this->apiResponse($row,'Category Deleted',200);
    }
}
