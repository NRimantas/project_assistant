<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all projects data
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returning create view blade
        return view('project.create');
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
            'title' => 'required|max:50',
            'groups_number' => 'required',
            'students_number' => 'required',
        ]);
        // if title already exists
        if (Project::where('title', '=', $request->title)->exists()) {
            return redirect()->route('project.index')->with('title', 'Project title exists');
        } else {

            $project =  Project::create($request->all());

            // create groups, as requested
            for ($i = 1; $i <= $request->groups_number; $i++) {
                $group = new Group;
                $group->project_id = $project->id;
                $group->group_num = $i;
                $group->save();
            }

            return redirect()->route('project.index')->with('success', 'Project created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // get students and groups data
        $students = Student::all();
        $groups = Group::all();
        return view('project.show', compact('project', 'students', 'groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $validate_data = $request->validate([
            'title' => 'required|max:50',
            'groups_number' => 'required',
            'students_number' => 'required',
        ]);

        // if title already exists
        if (Project::where('title', '=', $request->title)->exists()) {
            return redirect()->route('project.edit', compact('project'))->with('title', 'Project title already exists');
        }else{
            // update project
            $project=Project::find($id);
            $project->title = $request->title;
            $project->groups_number = $request->groups_number;
            $project->students_number = $request->students_number;
            $project->save();

            return redirect()->route('project.index', compact('project'))->with('success', 'Project was updated successfully!');
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back();
    }
}
