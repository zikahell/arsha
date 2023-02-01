<?php

namespace App\Http\Controllers;

use App\Models\AboutContent;
use App\Models\Advantage;
use App\Models\Category;
use App\Models\CtaTitle;
use App\Models\HeadTitle;
use App\Models\Info;
use App\Models\Plan;
use App\Models\PortfolioTitle;
use App\Models\PricingTitle;
use App\Models\Product;
use App\Models\Question;
use App\Models\QuestionTitle;
use App\Models\ServiceTitle;
use App\Models\Skill;
use App\Models\SkillTitle;
use App\Models\Social;
use App\Models\TeamTitle;
use App\Models\Why;
use App\Models\WhyTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
  public function index(){
    $clients = DB::table('clients')->get();
    $members = DB::table('teams')->get();
    $services = DB::table('services')->get();
    $service_title = ServiceTitle::all();
    $content = AboutContent::findOrFail(1);
    $categories = Category::all();
    $products = Product::all();
    $question_title = QuestionTitle::all();
    $questions = Question::all();
    $skill_title = SkillTitle::all();
    $skills = Skill::all();
    $why_title = WhyTitle::all();
    $whies = Why::all();
    $plans = Plan::all();
    $advantages = Advantage::all();
    $pricing_titles = PricingTitle::all();
    $team_titles = TeamTitle::all();
    $head_titles = HeadTitle::all();
    $portfolio_titles = PortfolioTitle::all();
    $cta_titles = CtaTitle::all();
    $infos = Info::all();
    $socials = Social::all();
    return view('front.layouts.app',compact('socials','cta_titles','infos','portfolio_titles','head_titles','team_titles','clients','members','services','categories','products','question_title','questions','service_title','skill_title','skills','why_title','whies','plans','advantages','pricing_titles'))->with('content',$content,);
    }
}
