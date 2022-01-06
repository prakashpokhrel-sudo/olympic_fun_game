<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\liveGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveGameController extends Controller
{
     public function viewlivegame()
    {
      $livegames = liveGame::latest()->get();
      return view('backend.livegame.index', compact('livegames'));
    }
    

public function addlivegames(Request $request){
$data = array();
$data['category_id'] = $request->category_id;
$data['title'] = $request->title;
$data['embed_code'] = $request->embed_code;
$data['type'] = $request->type;
DB::table('live_games')->insert($data);

return redirect()->route('view.livegame');

  }

  public function deletelivegame($id)
{
 $ad = liveGame::find($id);
 $ad->delete();
  return  redirect()->back()->with('message','Ad deleted successfully');
}


public function updatelivegame(Request $request, $id)
{
$data = array();
$data['category_id'] = $request->category_id;
$data['title'] = $request->title;
$data['embed_code'] = $request->embed_code;
$data['type'] = $request->type;
DB::table('live_games')->where('id',$id)->update($data);

return redirect()->route('view.livegame');

}

public function deletevideo($id)
{
DB::table('live_games')->where('id',$id)->delete();
return redirect()->back();
}

  public function Activesetting(Request $request,$id)
  {
  	DB::table('live_games')->where('id',$id)->update(['type'=>0]);
  	return redirect()->back();

  }
public function inactivesetting(Request $request,$id)
  {
  	DB::table('live_games')->where('id',$id)->update(['type'=>1]);
  	return redirect()->back();
  }

}
