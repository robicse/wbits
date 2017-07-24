<?php

namespace App\Http\Controllers;

use App\Department;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('ajax.create', compact('departments'));
    }
    public function geDepartment(Request $request){
        $getDept = $request->dept;

        $sections = DB::table('sections')
            ->where('department_id',$getDept)
            ->get();
        $section_name='';
        foreach ($sections as $section){
            $section_name = $section->section_name;
        }
        //$msg = "ok";
        $msg = '<input type="text" name="section_name" value="'.$section_name.'" class="form-control"  placeholder="Section Name">';
        return response()->json(array('msg'=> $msg), 200);
    }
}
