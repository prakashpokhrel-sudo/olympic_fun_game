<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\liveGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
public function  CatPost($id, $category_en)
 {
$catpost = DB::table('live_games')->where('category_id',$id)->orderBy('id','desc')->simplePaginate(4);
return view('frontend.allcategorysport.allsports', compact('catpost'));
 }

 public function findbasedcategory(liveGame $categorySlug)
   {
     $ads = $categorySlug->ad;
    $filterBySubCategories = liveGame::where('id',$categorySlug)->get();
    return view('frontend.livegames.alllivegames',compact('filterBySubCategories','ads'));
   }
    public function SinglePost($id)
 {
$post = DB::table('live_games')
        ->join('sports','live_games.category_id','sports.id')
        ->select('live_games.*','sports.sports_category_title','sports.sports_category_image')
        ->where('live_games.id',$id)->limit(8)->first();

       return view('frontend.singlegame.single_game', compact('post'));
 }
 public function SinglePostUpcominggame($id)
 {
$post = DB::table('upcoming_games')
        ->join('sports','upcoming_games.category_id','sports.id')
        ->select('upcoming_games.*','sports.sports_category_title','sports.sports_category_image')
        ->where('upcoming_games.id',$id)->first();

       return view('frontend.singlegame.upcomingsingle_game', compact('post'));
 }

}
