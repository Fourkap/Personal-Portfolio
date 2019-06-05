<?php
/**
 * Class ProjectController
 * php version 7.2.10
 *
 * @category App\Http\Controllers\Admin
 * @package  App\Http\Controllers\Admin
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 */

namespace App\Http\Controllers\Admin;

use App\Picture;
use App\Project;
use App\ProjectPicture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ProjectController
 *
 * @category App\Http\Controllers\Admin
 * @package  App\Http\Controllers\Admin
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 */
class ProjectController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.project.index', compact('projects'));
    }//end index()


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request Object Request transmis par laravel
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name'        => 'required',
                'urlname'     => 'required|unique:projects,url_name',
                'description' => 'required',
                'type'        => 'required',
                'startedAt'   => 'required|date',
                'endedAt'     => 'required|date',
            ]
        );

        $project = new Project(
            [
                'name'        => $request->get('name'),
                'url_name'    => $request->get('urlname'),
                'description' => $request->get('description'),
                'type'        => $request->get('type'),
                'started_at'  => $request->get('startedAt'),
                'ended_at'    => $request->get('endedAt'),
            ]
        );
        $project->save();


        if ($request->hasfile('picture')) {
            $name = uniqid() . '.' . $request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->move(public_path() . '/img/', $name);
            $picture = new Picture(
                [
                'path' => $name,
                ]
            );
            $picture->save();

            (new ProjectPicture(
                [
                'project_id' => $project->getId(),
                'picture_id' => $picture->getId(),
                ]
            ))->save();
        }


        return redirect()->route(
            'admin.project.edit',
            $project->getId()
        )->with('success', __('Le projet a été ajouté !'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id Identifiant du projet
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(int $id)
    {
        return redirect()->route('admin.project.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id Identifiant du projet
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $project = Project::find($id);

        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request Objet Request founis pas laravel
     * @param int     $id      Identifiant du projet
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $request->validate(
            [
                'name'        => 'required',
                'urlname'     => 'required|unique:projects,url_name,' . $id,
                'description' => 'required',
                'type'        => 'required',
                'startedAt'   => 'required|date',
                'endedAt'     => 'required|date',
            ]
        );

        $project              = Project::find($id);
        $project->name        = $request->get('name');
        $project->url_name    = $request->get('urlname');
        $project->description = $request->get('description');
        $project->type        = $request->get('type');
        $project->started_at  = $request->get('startedAt');
        $project->ended_at    = $request->get('endedAt');
        $project->save();

        return redirect()->route(
            'admin.project.edit',
            $project->getId()
        )->with('success', 'Le projet a été mis à jour !');
    }

    /**
     * Remove the specified resource from storage
     *
     * @param int $id Identifiant du projet
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->route('admin.project.index')->with('success', 'Le projet a été supprimé !');
    }
}
