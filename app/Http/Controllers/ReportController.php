<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\MyClass;
use App\Reports;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $id = Session::get('id');
        $selectedClass = MyClass::find($id);
        return view('report.create', compact('selectedClass', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Session::get('id');
        $this->validate($request, [
            'attend' => 'required',
            'lesson' => 'required'
        ]);

        $data = [
            'announcement' => $request->get('announcement'),
            'attend' => $request->get('attend'),
            'absent' => $request->get('absent'),
            'late' => $request->get('late'),
            'leave' => $request->get('leave'),
            'lesson' => $request->get('lesson'),
            'remark' => $request->get('remark')
        ];

        $newReport = new Reports([
            'teacher_id' => $request->get('teacher_id'),
            'academic_id' => $request->get('academic_id'),
            'class_id' => $request->get('class_id'),
            'report' => serialize($data)
        ]);

        $newReport->save();

        return redirect()->route('myclass.index')->with('success', 'Report Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
