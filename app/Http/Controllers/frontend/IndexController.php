<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\liveGame;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

use function PHPSTORM_META\type;

class IndexController extends Controller
{
    public function index()
    {
 $livegames= liveGame::where('title','Toplive')->first();

  return  view('frontend.index', compact('livegames'));
        
    }
	public function home()
    {
  return  view('frontend');
        
    }

     public function UserLogOut()
    { 
        Auth::Logout();
        return redirect()->route('login');
    }
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $users = User::find($id);
        return view('dashboard', compact('users'));
    }
    public function UserProfileEdit(){

		$id = Auth::user()->id;
		$editData = User::find($id);
		return view('frontend.profile.user_profile',compact('editData'));

	}
   public function UserProfileStore(Request $request){

		$id = Auth::user()->id;
		$data = User::find($id);
		$data->name = $request->name;
		$data->email = $request->email;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->street = $request->street;
        $data->zip = $request->zip;
        $data->phone_no = $request->phone_no;

		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/admin_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'Admin Profile Updated Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('dashboard')->with($notification);

	} // end method
    public function UserChangePassword(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.dashboard',compact('user'));
    }
 

    public function UserPasswordUpdate(Request $request){

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
		}else{
			return redirect()->back();
		}


	}// end method

}