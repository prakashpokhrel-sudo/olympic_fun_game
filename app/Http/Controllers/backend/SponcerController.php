<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Sponcer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SponcerController extends Controller
{
     public function sponcerview()
    {
      $sponcers = Sponcer::latest()->get();
      return view('backend.sponcer.index', compact('sponcers'));
    }

    public function addsponcer(Request $request)
    {
        $image = $request->file('sponcer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('backend/sponcer/img'.$name_gen);
        $save_url ='backend/sponcer/img'.$name_gen;
        Sponcer::latest()->insert([
            'sponcer_name' =>$request ->sponcer_name,
            'sponcer_image' =>$save_url,

        ]);
        return redirect()->route('all.sponcer')->with('message','Sponcer Created Successfully');
    }
     public function deletesponcer($id)
    {
        $ad = Sponcer::find($id);
        $ad->delete();
        return  redirect()->back()->with('message','Ad deleted successfully');

    }
      public function updatesponcer(Request $request, $id)
    {
        $updatesponcer = Sponcer::find($id);
        $featureImage = $updatesponcer->sponcer_image;
        $data = $request->all();
        if($request->hasFile('sponcer_image'))
        {
        $image = $request->file('sponcer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('backend/sponcer/img'.$name_gen);
        $save_url ='backend/sponcer/img'.$name_gen;
        }
        $data['sponcer_image'] = $featureImage;
        $updatesponcer->update($data);
        return redirect()->back();
    }
    
}
