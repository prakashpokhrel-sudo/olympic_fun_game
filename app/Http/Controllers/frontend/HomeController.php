<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\liveGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Hash;

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
 
 public function AllWriter()
    {
  $user = DB::table('users')->get();
  return view('backend.user.user',compact('user'));
    }

    public function StoreUser(Request $request)
  { 
  
$data=array();
$data = array();
$data['name'] = $request->name;
$data['email'] = $request->email;
$data['password'] = Hash::make($request->password);

if($request->file('profile_photo_path'))
        {
         $file = $request->file('profile_photo_path');
         $filename =date('YmdHi').$file->getClientOriginalName();
         $file->move(public_path('upload/admin_images'),$filename);
         $data['profile_photo_path']=$filename;
       
    }

DB::table('users')->insert($data);
 return Redirect()->route('all.users');

    }
     public function UpdateWriter(Request $request, $id){
        
      $data = array();
     	$data['name'] = $request->name;
     	$data['email'] = $request->email;
      $data['password'] = Hash::make($request->password);
      if($request->file('profile_photo_path'))
        {
         $file = $request->file('profile_photo_path');
         $filename =date('YmdHi').$file->getClientOriginalName();
         $file->move(public_path('upload/admin_images'),$filename);
         $data['profile_photo_path']=$filename;
       
    }
      

     	DB::table('users')->where('id',$id)->update($data);

      return Redirect()->route('all.users');

   }
   public function deletewriter($id)
    {
        $ad = User::find($id);
        $ad->delete();
        return  redirect()->back()->with('message','Ad deleted successfully');

    }

}
