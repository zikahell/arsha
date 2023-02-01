<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
  public function showAllNews(){
    $news = DB::table('news')->paginate(5);
    return view('news.news',compact('news'));
    }
    public function destroy($id){
      $row = News::findOrFail($id);
      $row->destroy($id);
      return back()->with('success','Email Deleted Successfully');
    }
}
