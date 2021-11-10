<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 1) {
            return redirect('/admin');
        }
        if ($user->role == 2) {
            return redirect('/user');
        }
    }

    public function resetpass(Request $request, User $user){
        $rules=[
            'email'=>'required|email|max:255',
            'oldpassword'=>'required|min:8',
            'newpassword'=>'required|min:8',
            'newpassword-confirm'=>'required|min:8|same:newpassword',
        ];
        $error_messages=[
            'newpassword-confirm.same'=>'konfirmasi password baru tidak sama',
            'newpassword.min'=>'panjang password harus lebih dari 8 karakter',
            'newpassword-confirm.min'=>'panjang password harus lebih dari 8 karakter',
        ];
        $validator=  validator($request->all(), $rules, $error_messages);
        if ($validator->fails()) {
            return redirect('/resetpass')->with('error','Reset password gagal')->withErrors($validator, 'reset')->withInput();
        }
        else{
            $findUser = User::where('email',$request->email)->first();
            if ($findUser !== null) {                
                if (Hash::check($request->oldpassword, $findUser->password)) {                
                    $updatePassword = $findUser->update([
                        'password' => Hash::make($request->newpassword)
                    ]);
                    return redirect('/login')->with('success','Reset password berhasil');
                }
                else {
                    return redirect('/resetpass')->with('error','Reset password gagal. Password lama tidak sesuai dengan yang ada di database');
                }   
            }
            else{
                return redirect('/resetpass')->with('error','Reset password gagal. Email belum terdaftar');                    
            }
        }
    }

    public function feedback(Request $request){
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $message = $request->message;
        Feedback::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
        ]);
        return redirect('/#appointment')->with('msg','Thanks for your feedback');
    }
}
