<?php

namespace App\Http\Controllers;
use App\Department;
use App\Section;

use Illuminate\Http\Request;
use Validator;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('section.home',compact('sections'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $departments = Department::all();
        return view('section.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = new Section();

        $validator = Validator::make($request->all(), [
            'department_id' => 'required',
            'section_name' => 'required'
        ]);

        if($validator->fails()){
            return redirect('section/create')
                ->withErrors($validator)
                ->withInput();
        }

        $section->department_id = $request->department_id;
        $section->section_name = $request->section_name;
        $section->save();
        return redirect('section')->with('message','successfully inserted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all();
        $section = Section::find($id);
        /*echo '<pre>';
        var_dump($departments);
        echo '</pre>';
        exit;*/
        return view('section.edit',['section' => $section, 'departments' => $departments]);
        //return view('section.edit',compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$section = new Section();
        $section = Section::find($id);

        $validator = Validator::make($request->all(), [
            'department_id' => 'required',
            'section_name' => 'required'
        ]);

        if($validator->fails()){
            return redirect('section/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $section->department_id = $request->department_id;
        $section->section_name = $request->section_name;
        $section->save();
        return redirect('section')->with('message','successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();
        return redirect()->back()->with('message','successfully deleted.');
    }
}
