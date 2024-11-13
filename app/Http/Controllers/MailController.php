<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mail;
use App\Models\Admin;
use Carbon\Carbon;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class MailController extends Controller
{
    public function recover_password(Request $reruest){
        $data = $reruest->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Lấy lại mật khẩu ".' '.$now;
        $admin = Admin::where('admin_email','=',$data['email_account'])->get();

        foreach($admin as $key => $value){
            $admin_id = $value->admin_id;
        }

        if($admin){
            $count_admin = $admin->count();
            if($count_admin == 0){
                return redirect()->back()->with('error','Email của bạn chưa đăng kí');
            }else{
                $token_random = Str::random();
                $admin = Admin::find($admin_id);
                $admin->token_admin = $token_random;
                $admin->save();

                //send mail

                $to_email = $data['email_account'];//send email to this
                $link_reset_password = url('/update-new-password?email='.$to_email.'&token='.$token_random);

                $data = array(
                    "name" => $title_mail,
                    "body" => $link_reset_password,
                    "email" => $data['email_account']
                );

                Mail::send(
                    'pages.checkout.forget_pass_notify',
                    ['data'=>$data],
                    function($message) use ($title_mail,$data)
                    {
                        $message->to($data['email'])->subject($title_mail);
                        $message->from($data['email'],$title_mail);
                    }
                );
                return redirect()->back()->with('message','Gửi mail thành công , vui lòng check email');
            }
        }
    }

    public function update_new_password(){
        return view('pages.update_new_password');
    }

    public function reset_password(Request $reruest){
        $data = $reruest->all();
        $token_random = Str::random();
        $admin = Admin::where('admin_email','=',$data['admin_email'])->where('token_admin','=',$data['token_admin'])->get();
        if($data['password'] == $data['confirm_password']){
            $password = md5($data['confirm_password']);
        }else{
            return redirect()->back()->with('error','Mật khẩu không trừng khớp');
        }
        foreach($admin as $key => $value){
            $admin_id = $value->admin_id;
        }

            $count_admin = $admin->count();
            if($count_admin == 0){
                return redirect('forgot-password')->with('error','Link đã hết thời hạn , vui lòng thử lại');
            }else{
                $token_random = Str::random();
                $admin = Admin::find($admin_id);
                $admin->token_admin = $token_random;
                $admin->admin_password = $password;
                $admin->save();

                return redirect('login')->with('message','Đổi mật khẩu thành công , hãy đăng nhập');
              }
        
    }

}
