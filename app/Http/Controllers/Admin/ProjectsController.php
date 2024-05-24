<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Functions\Helper as Help;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exist = Project::where('title', $request->title)->first();

        if ($exist) {
            return redirect()->route('admin.projects.index')->with('error', 'Il progetto è già stato inserito');
        } else {
            $new_project = new Project();
            $new_project->title = $request->title;
            $new_project->languages = $request->languages;
            $new_project->slug = Help::generateSlug($new_project->title, Project::class);
            $new_project->save();
            return redirect()->route('admin.projects.index')->with('success', 'Il progetto è stato inserito correttamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate(
            [
                'title' => 'required|min:5|max:30'
            ],
            [
                'title.required' => 'Devi inserire il nome del progetto',
                'title.min' => 'Il progetto deve avere almeno :min caratteri',
                'title.max' => 'Il progetto non  deve avere più di :max caratteri',
            ]
        );
        $exists = Project::where('title', $request->title)->first();
        if ($exists) {
            return redirect()->route('admin.projects.index')->with('error', 'Nessuna modifica effettuata');
            // dd($exists);
        } else {
            $data['slug'] = Help::generateSlug($request->title, project::class);
            $project->update($data);

            return redirect()->route('admin.projects.index')->with('success', 'Progetto modificato');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Il progetto è stato eliminato');
    }
}
