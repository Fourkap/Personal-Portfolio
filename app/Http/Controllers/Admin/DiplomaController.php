<?php

namespace App\Http\Controllers\Admin;

use App\Diploma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DiplomaController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diplomas = Diploma::all();

        return view('admin.diploma.index', compact('diplomas'));
    }//end index()


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.diploma.create');
    }//end create()


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'      => 'required',
                'startedAt' => 'required|date',
                'endedAt'   => 'required|date',
            ]
        );

        $diploma = new Diploma(
            [
                'name'        => $request->get('name'),
                'subname'     => $request->get('subName'),
                'description' => $request->get('description'),
                'started_at'  => $request->get('startedAt'),
                'ended_at'    => $request->get('endedAt'),
                'user_id'     => Auth::user()->getId(),
            ]
        );
        $diploma->save();

        return redirect()->route('admin.diploma.index')->with('success', __('admin.diploma.successMessage'));
    }//end store()


    /**
     * Display the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }//end show()


    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diploma = Diploma::find($id);

        return view('admin.diploma.edit', compact('diploma'));
    }//end edit()


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  integer                  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'subName' => 'required',
                'description' => 'required',
                'startedAt' => 'required|date',
                'endedAt' => 'required|date',
            ]);

                $diploma            = Diploma::find($id);
                $diploma->name      = $request->get('name');
                $diploma->subName   = $request->get('subName');
                $diploma->description = $request->get('description');
                $diploma->started_at = $request->get('startedAt');
                $diploma->ended_at   = $request->get('endedAt');
                $diploma->save();

                return redirect()->route('admin.diploma.edit', $diploma->getId())->with('success', 'Le diplôme a été mis à jour !');
    }//end update()


    /**
     * Remove the specified resource from storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $diploma = Diploma::find($id);
        $diploma->delete();

        return redirect()->route('admin.diploma.index')->with('success', 'Le diplôme a été supprimé !');
    }//end destroy()
}//end class
