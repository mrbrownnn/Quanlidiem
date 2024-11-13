<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ClassController extends Controller
{
    public function add_class(){

        $lecturers_list = DB::table('tbl_lecturers')->get();
        $major_list = DB::table('tbl_major')->get();
        $course_list = DB::table('tbl_course')->get();

        return view('admin.add_class')->with('lecturers_list',$lecturers_list)->with('major_list',$major_list)->with('course_list',$course_list);
    }
    public function save_class(Request $request){
  
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['major_id'] = $request->major_id;
        $data['class_name'] = $request->class_name;
        $data['lecturers_id'] = $request->lecturers_id;
        $data['course_id'] = $request->course_id;
        $data['student_qty'] = $request->student_qty;
        $data['start_time'] = $request->start_time;
        $data['end_time'] = $request->end_time;

        DB::table('tbl_class')->insert($data);
        return Redirect::to('/class-list');
    }
    public function class_list(){
  
      $class_list = DB::table('tbl_class')
      ->join('tbl_lecturers','tbl_lecturers.lecturers_id','=','tbl_class.lecturers_id')
      ->join('tbl_major','tbl_major.major_id','=','tbl_class.major_id')
      ->join('tbl_course','tbl_course.course_id','=','tbl_class.course_id')
      ->get();

      return view('admin.class_list')->with('class_list',$class_list);
    } 

    public function edit_class($class_id){
      
      $lecturers_list = DB::table('tbl_lecturers')->get();
      $major_list = DB::table('tbl_major')->get();
      $course_list = DB::table('tbl_course')->get();

      $edit_class = DB::table('tbl_class')->where('class_id',$class_id)->get();
      $manager_class = view('admin.edit_class')->with('edit_class',$edit_class)->with('lecturers_list',$lecturers_list)->with('major_list',$major_list)->with('course_list',$course_list);

      return view('admin_layout')->with('admin.edit_class',$manager_class);
    }
    public function update_class(Request $request,$class_id){
 
      $data = array();
      $data['class_id'] = $request->class_id;
      $data['major_id'] = $request->major_id;
      $data['class_name'] = $request->class_name;
      $data['lecturers_id'] = $request->lecturers_id;
      $data['course_id'] = $request->course_id;
      $data['student_qty'] = $request->student_qty;
      $data['start_time'] = $request->start_time;
      $data['end_time'] = $request->end_time;

      DB::table('tbl_class')->where('class_id',$class_id)->update($data);
      Session::put('message','Cập nhật lớp học thành công');
      return Redirect::to('/class-list');
  }
  public function delete_class($class_id){


    DB::table('tbl_class')->where('class_id',$class_id)->delete();

    Session::put('message','Xóa lớp học thành công');
    return Redirect::to('/class-list');

}

}