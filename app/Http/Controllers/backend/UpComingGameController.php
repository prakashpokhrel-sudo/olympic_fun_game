<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\UpcomingGame;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UpComingGameController extends Controller
{
     public function viewupcominggame()
    {
      $upcominggames = UpcomingGame::latest()->get();
      return view('backend.upcominggame.index', compact('upcominggames'));
    }

public function addupcominggames(Request $request){

$image = $request->file('sports_image');
$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
Image::make($image)->resize(300,300)->save('backend/upcominggame/img/'.$name_gen);
$save_url ='backend/upcominggame/img/'.$name_gen;
UpcomingGame::latest()->insert([
            'category_id' =>$request ->category_id,
            'title' =>$request ->title,
            'sports_description' =>$request ->sports_description,
            'sports_time' =>$request ->sports_time,
            'sports_image' =>$save_url,
        ]);

return redirect()->route('view.upcominggame');

  }

  public function deleteupcominggame($id)
{
 $ad = UpcomingGame::find($id);
 $ad->delete();
return  redirect()->back()->with('message','Upcoming Game deleted successfully');
}

public function updateupdategame(Request $request, $id)
    {
        $updateupcominggame = UpcomingGame::find($id);
        $featureImage = $updateupcominggame->sports_image;
        $data = $request->all();
        if($request->hasFile('sports_image'))
        {
        $image = $request->file('sports_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('backend/upcominggame/img/'.$name_gen);
        $save_url ='backend/upcominggame/img/'.$name_gen;
        }
        $data['sports_image'] = $featureImage;
        $updateupcominggame->update($data);
        return redirect()->back();
    }

}
