<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'project_id' => 'required',
            'group_num' => 'required',
        ]);

        $group = Group::where('project_id', $request->project_id)->where('group_num', $request->group_num)->first();
        $student = Student::where('full_name', $request->full_name)->first();

        // check if student id assigned already:
        $groups = Group::where('project_id', $request->project_id)->get();
        foreach ($groups as $group) {
            if ($group->students()->where('student_id', $student->id)->exists()){
                return redirect()->back()->with('error', 'This student assigned already!');
            }
        }

        $student->groups()->attach($group->id);
        return redirect()->back();


    }

    public function detach(Request $request)
        {
            $student = Student::find($request->student_id);
            $student->groups()->detach($request->group_id);

            return redirect()->back();
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
