<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class StudentController extends Controller
{
    public function add_student(){

        $class_list = DB::table('tbl_class')->get();

        return view('admin.add_student')->with('class_list',$class_list);
    }

    public function save_student(Request $request){

        $data = array();
        $data['student_id'] = $request->student_id;
        $data['lastname'] = $request->lastname;
        $data['firstname'] = $request->firstname;
        $data['gender'] = $request->gender;
        $data['dob'] = $request->dob;
        $data['address'] = $request->address;
        $data['class_id'] = $request->class_id;

        DB::table('tbl_student')->insert($data);

        return Redirect::to('/student-list');

    }
    public function student_list(){

        $student_list = DB::table('tbl_student')
        ->join('tbl_class','tbl_class.class_id','=','tbl_student.class_id')
        ->get();
        return view('admin.student_list')->with('student_list',$student_list);
    }
    public function edit_student($student_id){

        $class_list = DB::table('tbl_class')->get();
        $edit_student = DB::table('tbl_student')->where('student_id',$student_id)->get();

        return view('admin.edit_student')->with('class_list',$class_list)->with('edit_student',$edit_student);
    }
    public function update_student(Request $request,$student_id){

        $data = array();
        $data['student_id'] = $request->student_id;
        $data['lastname'] = $request->lastname;
        $data['firstname'] = $request->firstname;
        $data['gender'] = $request->gender;
        $data['dob'] = $request->dob;
        $data['address'] = $request->address;
        $data['class_id'] = $request->class_id;

        DB::table('tbl_student')->where('student_id',$student_id)->update($data);
        Session::put('message','Cập nhật sinh viên thành công ^^');
        return Redirect::to('/student-list');
    }
    public function delete_student($student_id){
 
        DB::table('tbl_student')->where('student_id',$student_id)->update();
        Session::put('message','Xóa sinh viên thành công ^^');
        return Redirect::to('/student-list');
    }
}
