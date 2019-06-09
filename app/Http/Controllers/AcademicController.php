<?php

namespace App\Http\Controllers;

use App\Academic;
use Illuminate\Http\Request;
use function Opis\Closure\serialize;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $academics = Academic::orderBy('id', 'desc')->get();
        return view('academic.index', compact('academics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'term' => $request->get('term'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date')
        ];

        $newAcademic = new Academic([
            'year' => $request->get('year'),
            'academic_detail' => serialize($data)
        ]);

        $newAcademic->save();

        return redirect()->route('academic.create')->with('success', 'New Academic Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function show(Academic $academic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function edit(Academic $academic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academic $academic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academic = Academic::findOrFail($id);
        $academic->delete();
        return redirect()->route('academic.index')->with('Success', 'Academic Deleted');
    }

    /*
    Get current Academic
    */
    public function getCurrentAcademic()
    {
        $current_academic = Academic::max('id');
        return $current_academic;
    }
    public function getAcademic()
    { }
}
