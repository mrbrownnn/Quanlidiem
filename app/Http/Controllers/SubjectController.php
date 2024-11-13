<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SubjectController extends Controller
{
    public function add_subject(){

        $lecturers_list = DB::table('tbl_lecturers')->get();

        return view('admin.add_subject')->with('lecturers_list',$lecturers_list);
    }

    public function save_subject(Request $request){

        $data = array();
        $data['subject_id'] = $request->subject_id;
        $data['subject_name'] = $request->subject_name;
        $data['total_subject'] = $request->total_subject;
        $data['lecturers_id'] = $request->lecturers_id;
        $data['start_subject'] = $request->start_subject;
        $data['is_skill'] = $request->is_skill;
        $data['is_final'] = $request->is_final;

        DB::table('tbl_subject')->insert($data);
        return Redirect::to('/subject-list');
    }
    public function subject_list(){

       $subject_list = DB::table('tbl_subject')
       ->join('tbl_lecturers','tbl_lecturers.lecturers_id','=','tbl_subject.lecturers_id')
       ->get();

       return view('admin.subject_list')->with('subject_list',$subject_list);
    }
    public function edit_subject($subject_id){

        $lecturers_list = DB::table('tbl_lecturers')->get();
        $edit_subject = DB::table('tbl_subject')->where('subject_id',$subject_id)->get();
 
        
        return view('admin.edit_subject')->with('edit_subject',$edit_subject)->with('lecturers_list',$lecturers_list);
    }
    public function update_subject(Request $request,$subject_id){

        $data = array();
        $data['subject_id'] = $request->subject_id;
        $data['subject_name'] = $request->subject_name;
        $data['total_subject'] = $request->total_subject;
        $data['lecturers_id'] = $request->lecturers_id;
        $data['start_subject'] = $request->start_subject;
        $data['is_skill'] = $request->is_skill;
        $data['is_final'] = $request->is_final;

        DB::table('tbl_subject')->where('subject_id',$subject_id)->update($data);
        Session::put('message', 'Cập nhật môn học thành công');
        return Redirect::to('/subject-list');

    }
    public function delete_subject($subject_id){

        DB::table('tbl_subject')->where('subject_id',$subject_id)->delete();

        Session::put('message','Xóa môn học thành công');
        return Redirect::to('/subject-list');
    }
    
}
