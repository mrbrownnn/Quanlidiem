<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class CourseController extends Controller
{
    public function add_course(){
        return view('admin.add_course');
    }
    public function save_course(Request $request){
        $data = array();
        $data['course_id'] = $request->course_id;
        $data['course_name'] = $request->course_name;

        DB::table('tbl_course')->insert($data);
        return Redirect::to('/course-list');
    }
    public function course_list(){
        $course_list = DB::table('tbl_course')->get();

        return view('admin.course_list')->with('course_list',$course_list);
    }
    public function edit_course($course_id){
        $edit_course = DB::table('tbl_course')->where('course_id',$course_id)->get();

        return view('admin.edit_course')->with('edit_course',$edit_course);
    }
    public function update_course(Request $request,$course_id){
        $data = array();
        $data['course_id'] = $request->course_id;
        $data['course_name'] = $request->course_name;

        DB::table('tbl_course')->where('course_id',$course_id)->update($data);
        Session::put('message','Cập nhật khóa thành công');
        return Redirect::to('/course-list');
    }
    public function delete_course($course_id){
        DB::table('tbl_course')->delete($data);
        Session::put('message','Xóa khóa thành công');
        return Redirect::to('/course-list');
    }
}
