<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sport;
use Illuminate\Support\Facades\Storage;
use Image;
class SportsCategory extends Controller
{
      public function sportscategory()
    {
      $sportscategories = Sport::latest()->get();
      return view('backend.sportscategory.index', compact('sportscategories'));
    }
    public function addcategory(Request $request)
    {
        $image = $request->file('sports_category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('backend/sportscategory_image/img'.$name_gen);
        $save_url ='backend/sportscategory_image/img'.$name_gen;
        Sport::latest()->insert([
            'sports_category_title' =>$request ->sports_category_title,
            'sports_category_image' =>$save_url,

        ]);
        return redirect()->route('view.category')->with('message','Category Created Successfully');
    }
    
    public function deletecategory($id)
    {
        $ad = Sport::find($id);
        $ad->delete();
        return  redirect()->back()->with('message','Ad deleted successfully');

    }

    public function updatecategory(Request $request, $id)
    {
        $updatecategory = Sport::find($id);
        $featureImage = $updatecategory->sports_category_image;
        $data = $request->all();
        if($request->hasFile('sports_category_image'))
        {
        $image = $request->file('sports_category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('backend/sportscategory_image/img'.$name_gen);
        $save_url ='backend/sportscategory_image/img'.$name_gen;
        }
        $data['sports_category_image'] = $featureImage;
        $updatecategory->update($data);
        return redirect()->back();
    }
}

