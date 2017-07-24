<?php

namespace App\Http\Controllers;

use App\Department;
//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('department.home',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo 'ok';exit;
        $department = new Department();

        $validator = Validator::make($request->all(), [
            'department_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('department/create')
                ->withErrors($validator)
                ->withInput();
        }

        $department->department_name = $request->department_name;
        $department->save();
        return redirect('department')->with('message', 'successfull inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo $id;
        $department = Department::find($id);
        return view('department.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('department.edit',compact('department'));
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
        $department = Department::find($id);
        $this->validate($request, [
            'department_name' => 'required'
        ]);
        $department->department_name = $request->department_name;
        $department->save();
        //return redirect()->back()->with('msg','Successfully updated.');

        //return redirect()->route('department.index',['msg','Successfully updated.']); // redirect with get value parameter
        //return redirect('dashboard')->with('status', 'Profile updated!');
        return redirect()->route('department.index')->with('message', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->back()->with('message','Successfully deleted.');
    }
}
