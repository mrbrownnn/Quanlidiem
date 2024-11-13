<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class PointController extends Controller
{
    public function add_point(){
        Session::put('subject_id',null);
        Session::put('class_id',null);
        $subject_list = DB::table('tbl_subject')->get();
        $class_list = DB::table('tbl_class')->get();
        return view('admin.add_point')->with('subject_list',$subject_list)->with('class_list',$class_list);
    }
    public function search(Request $request){

        $class_id = $request->class_id;
        $subject_id = $request->subject_id;
        $class_list = DB::table('tbl_class')
        ->join('tbl_student','tbl_student.class_id','=','tbl_class.class_id')
        ->get();
        $subject_list = DB::table('tbl_subject')->where('subject_id',$subject_id)->get();
        Session::put('subject_id',$subject_id);
        Session::put('class_id',$class_id);
        return view('admin.add_point')->with('class_list',$class_list)->with('subject_list',$subject_list);
    }
    public function save_point(Request $request){
        $data = array();
        $data['student_id'] = $request->student_id;
        $data['subject_id'] = Session::get('subject_id');
        $data['skill_1st'] = $request->skill_1st;
        $data['skill_2st'] = $request->skill_2st;
        $data['final_1st'] = $request->final_1st;
        $data['final_2st'] = $request->final_2st;

        DB::table('tbl_point')->insert($data);

        Session::put('subject_id',null);
        Session::put('class_id',null);

        return Redirect::to('/add-point');
    }
    public function score_list(){
        $score_list = DB::table('tbl_point')
        ->join('tbl_student','tbl_student.student_id','=','tbl_point.student_id')
        ->join('tbl_subject','tbl_subject.subject_id','=','tbl_point.subject_id')
        ->get();
        return view('admin.score_list')->with('score_list',$score_list);
    }

    public function edit_score($student_id,$subject_id){

        $edit_score = DB::table('tbl_point')
        ->join('tbl_subject','tbl_subject.subject_id','=','tbl_point.subject_id')
        ->where('student_id',$student_id)->get();

        Session::put('subject_id',$subject_id);

        return view('admin.edit_score')->with('edit_score',$edit_score);
    }
    public function update_point(Request $request,$student_id,$subject_id){
        $data = array();
        $data['skill_1st'] = $request->skill_1st;
        $data['skill_2st'] = $request->skill_2st;
        $data['final_1st'] = $request->final_1st;
        $data['final_2st'] = $request->final_2st;

        DB::table('tbl_point')->where('student_id',$student_id)->where('subject_id',$subject_id)->update($data);
        Session::put('message','Cập nhật điểm thành công ^^');
        return Redirect::to('/score-list');
    }
    public function delete_point($student_id){
        DB::table('tbl_point')->where('student_id',$student_id)->where('subject_id',$subject_id)->delete();
        Session::put('message','Xóa thành công ^^');
        return Redirect::to('/score-list');
    }

    public function class_point_list(){
        $student_list = DB::table('tbl_student')
        ->join('tbl_class','tbl_class.class_id','=','tbl_student.class_id')
        ->get();
        $subject_list = DB::table('tbl_subject')->get();
        $score_list = DB::table('tbl_point')
        ->join('tbl_subject','tbl_subject.subject_id','=','tbl_point.subject_id')
        ->get();
        return view('admin.class_point_list')->with('score_list',$score_list)->with('student_list',$student_list)->with('subject_list',$subject_list); 
    }
}
