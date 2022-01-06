<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CountryController extends Controller
{
     public function viewcountry()
    {
      $countries = Country::latest()->get();
      return view('backend.country.index', compact('countries'));
    }
     public function addcountry(Request $request)
    {
        $image = $request->file('country_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('backend/country/img'.$name_gen);
        $save_url ='backend/country/img'.$name_gen;
        Country::latest()->insert([
            'country_name' =>$request ->country_name,
            'description' =>$request ->description,
            'country_image' =>$save_url,

        ]);
        return redirect()->route('view.country')->with('message','Sponcer Created Successfully');
    }
    public function uploadImage(Request $request) {    
  if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('image'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('image/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    } 
      public function deletecountry($id)
    {
        $ad = Country::find($id);
        $ad->delete();
        return  redirect()->back()->with('message','Ad deleted successfully');

    }
 public function updatecountry(Request $request, $id)
    {
        $updatesponcer = Country::find($id);
        $featureImage = $updatesponcer->country_image;
        $data = $request->all();
        if($request->hasFile('country_image'))
        {
        $image = $request->file('country_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('backend/country/img'.$name_gen);
        $save_url ='backend/country/img'.$name_gen;
        }
        $data['country_image'] = $featureImage;
        $updatesponcer->update($data);
        return redirect()->back();
    }

}
