<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Models\Admin;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('/dashboard');
        } else {
            Session::put('message','Không có quyền truy cập!');
            return Redirect::to('/login')->send();
        }
    }
    public function login(){
        return view('admin_login');
    }
    public function calendar(){
        return view('calendar');
    }
    public function profile(){
        $city = City::orderby('matp','ASC')->get();
        return view('profile')->with(compact('city'));
    }
    public function forgot_password(){
        return view('pages.forgot_password');
    }
    public function dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
     //select address
     public function select_delivery(Request $request){
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="city"){
    			$select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
    				$output.='<option>---Chọn quận huyện---</option>';
    			foreach($select_province as $key => $province){
    				$output.='<option type="text" value="'.$province->maqh.'">'.$province->name.'</option>';
    			}

    		}else{

    			$select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
    			$output.='<option>---Chọn xã phường---</option>';
    			foreach($select_wards as $key => $ward){
    				$output.='<option "text" value="'.$ward->xaid.'">'.$ward->name.'</option>';
    			}
    		}
    		echo $output;
    	}
    	
    }
    //end select address
    public function change_password(Request $request , $admin_id){
       $data = $request->all();
       
       if(md5($data['old_password']) == Auth::user($admin_id)->admin_password){
           if($data['password'] == $data['confirm_password']){
               $password = md5($data['password']);
           }else{
               return redirect()->back()->with('error','Mật khẩu không trùng lặp');
           }
       }else{
            return redirect()->back()->with('error','Mật khẩu cũ sai hoặc không chính xác'); 
       }
       $admin = Admin::find($admin_id);
       $admin->admin_password = $password;
       $admin->save();
       return redirect()->back()->with('message','Đổi mật khẩu thành công');     
    }
    public function update_profile(Request $request,$admin_id){
         $data = $request->all();
         $wards = DB::table('tbl_xaphuongthitran')->where('xaid',$data['wards'])->get();
         foreach($wards as $key => $value){
             $ward = $value->name;
         }
         $provinces = DB::table('tbl_quanhuyen')->where('maqh',$data['province'])->get();
         foreach($provinces as $key => $value){
             $province = $value->name;
         }
         $citys = DB::table('tbl_tinhthanhpho')->where('matp',$data['city'])->get();
         foreach($citys as $key => $value){
             $city = $value->name;
         }
        //  echo  $ward;
        //  echo $city;
        //  echo $province;
        
        //  exit;
        if(empty($ward)){
           $ward = 'Chưa xác định';
           $city = 'Chưa xác định';
           $province = 'Chưa xác định';
        }
         $address = $data['address'] . ', ' .$ward . ', ' . $province . ', ' . $city;
         $get_image = $request->file('image');
      
         if($get_image){
             $get_name_image = $get_image->getClientOriginalName();
             $name_image = current(explode('.',$get_name_image));
             $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
             $get_image->move('public/backend/dist/img',$new_image);
             $data['image'] = $new_image;
             $admin =  Admin::find($admin_id);
             $admin->admin_name = $data['admin_name'];
             $admin->admin_address = $address;
             $admin->admin_experience = $data['admin_experience'];
             $admin->admin_skill = $data['admin_skill'];
             $admin->image = $data['image'];
             $admin->save();
             return redirect()->back()->with('message','Cập nhật thành công');
         }
         
    }
    public function login_admin(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $validated = $request->validate([
            'admin_email' => 'required|email:rfc,dns',
            'admin_password' => 'required|min:8|max:20',
        ],
        [
            'admin_email.dns' => 'Vui lòng nhập đúng dịnh dạng!',
            'admin_email.required' => 'Vui lòng diền email!',
            'admin_password.required' => 'Vui lòng diền mật khẩu!',
            'admin_password.min' => 'Mật khẩu ít nhất 8 kí tự!',
            'admin_password.max' => 'Mật khẩu nhiều nhất 20 kí tự!'
        ] 
        );
    
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
    
            return Redirect::to('/dashboard');
        } else {
            Session::put('message','Mật khẩu hoặc tài khoản bị sai. Vui lòng nhập lại');
            return Redirect::to('/login');
        }
    }

    public function logout_admin(){
        $this->AuthLogin();
         Session::put('admin_name',null);
         Session::put('admin_id',null);
         Session::put('subject_id',null);
         return Redirect::to('/login');
    }

    public function manager(){
        return view('admin.users.user_list');
    }
}
