<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class UserProfileController extends Controller
{
    public function uploadImage($folder,$image){
    $image->store('/',$folder);
    $filename=$image->hashName();
    $path='assets/img/'.$folder.'/'.$filename;
    return $path;
    }

    public function showUserProfile($id)
    {
        $user= User::findOrFail($id);
        return view('users.profile',['user'=>$user]);
    }


    public function updateUserProfile(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
            'phone' => 'required', 'int',
            'city' =>  'string', 'max:255',
            'country' => 'required', 'string', 'max:255',
        ]);
        $user=User::find(Auth::user()->id);
        $path="";
        if($request->has('photo')){
            $path= $this->uploadImage('users',$request->photo);
            $user->profile_photo_path=$path;
            $user->save();
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->country = $request['country'];
        $user->city = $request['city'];
        $user->save();

        if($user)
        return response()->json([
            'status'=>true,
            'msg'=>'تم التعديل بنجاح',
        ]);
        else
        return response()->json([
            'status'=>false,
            'msg'=>'error with creation',
        ]);
        // return redirect()->back()
        // ->with('success','Profile Updated successfully');
    }

    public function changePassword(Request $request){



        $this->validate($request, [
            'new_password' =>  'required|string|min:6|max:50|same:confirm_password',
        ]);

        $user=User::find(Auth::user()->id);

        $user->password=$request->new_password;
        return redirect()->route('logout');

    }

}
