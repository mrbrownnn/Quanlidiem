<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Roles;
use Auth;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    public function login_authentication(){
        return view('admin.custom_auth.login_authentication');
    }

    public function logout_authentication(){
        Auth::logout();
        return redirect('/login-authentication')->with('message','Đăng xuất authentication thành công');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:8|max:20',
        ],
        [
            'admin_email.dns' => 'Vui lòng nhập đúng dịnh dạng!',
            'admin_email.required' => 'Vui lòng diền email!',
            'admin_password.required' => 'Vui lòng diền mật khẩu!',
            'password.min' => 'Mật khẩu ít nhất 8 kí tự!',
            'password.max' => 'Mật khẩu nhiều nhất 20 kí tự!'
        ] 
        );

        // $data = $request->all();
        if(Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])){
           return redirect('/dashboard'); 
        }else{
            return redirect('/login-authentication')->with('message','Lỗi đăng nhâp authentication');
        }


    }
    public function register_authencation(Request $request){
        $validated = $request->validate([
            'admin_name' => 'required|max:50',
            'admin_email' => 'required|email',
            'password' => 'required|min:8|max:20',
            'confirm_password' => 'required|min:8|max:20'
        ],
        [
            'admin_email.dns' => 'Vui lòng nhập đúng dịnh dạng!',
            'admin_email.required' => 'Vui lòng diền email!',
            'admin_password.required' => 'Vui lòng diền mật khẩu!',
            'password.min' => 'Mật khẩu ít nhất 8 kí tự!',
            'password.max' => 'Mật khẩu nhiều nhất 20 kí tự!'
        ] 
        );
        $data = $request->all();

        if($data['password'] == $data['confirm_password']){
            $password = md5($data['confirm_password']);
        }else{
            return redirect()->back()->with('error','Mật khẩu không trừng khớp');
        }

        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = $password;
        $admin->save();
        $admin->roles()->attach(Roles::where('name','user')->first());

        return redirect('register')->with('message','Đăng kí thành công , hãy đăng nhập tài khoản');
    }
    
}
