<?php

namespace App\Http\Controllers;

use App\MyClass;
use App\Http\Controllers\AcademicController;
use Illuminate\Http\Request;
use function Opis\Closure\serialize;
use Illuminate\Support\Facades\Auth;
use Session;

class MyClassController extends Controller
{
    public $myclass = [];
    public $teacher_id;
    public $academic_id;



    public function __construct()
    {

        $this->middleware('auth');
        $academic = new AcademicController();
        $this->academic_id = $academic->getCurrentAcademic();
    }

    public function index()
    {
        $myclass = MyClass::where('teacher_id', '=', Auth::user()->id)->where('academic_id', '=', $this->academic_id)->get();
        return view('myclass.index', compact('myclass'));
    }

    public function create()
    {

        $data = [
            'course' => $this->loadCourse(),
            'year' => $this->loadYear(),
            'extend' => $this->loadExtend(),
            'session' => $this->loadSession(),
            'academic_id' => $this->academic_id
        ];

        return view('myclass.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'course' => 'required',
            'year' => 'required',
            'session' => 'required'
        ]);

        $data = [
            'session' => $request->get('session'),
            'year' => $request->get('year'),
            'extend' => $request->get('extend'),
            'subject' => $request->get('subject'),
            'course' => $request->get('course')
        ];

        $newclass = new MyClass([
            'teacher_id' => $request->get('teacher_id'),
            'academic_id' => $request->get('academic_id'),
            'myclass' => serialize($data)
        ]);

        $newclass->save();

        return redirect()->route('myclass.create')->with('success', 'New class added');
    }

    public function show($id)
    {
        Session::put('id', $id);
        $selectedClass = MyClass::find($id);
        return view('myclass.show', compact('selectedClass'));
    }

    public function edit($id)
    {
        $data = [
            'course' => $this->loadCourse(),
            'year' => $this->loadYear(),
            'extend' => $this->loadExtend(),
            'session' => $this->loadSession()
        ];
        $selectedClass = MyClass::find($id);
        return view('myclass.edit', compact('selectedClass', 'id'), $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'subject' => 'required',
            'course' => 'required',
            'year' => 'required',
            'session' => 'required'
        ]);

        $data = [
            'session' => $request->get('session'),
            'year' => $request->get('year'),
            'extend' => $request->get('extend'),
            'subject' => $request->get('subject'),
            'course' => $request->get('course')
        ];

        $saveClass = MyClass::find($id);
        $saveClass->teacher_id = $request->get('teacher_id');
        $saveClass->academic_id = $request->get('academic_id');
        $saveClass->myclass = serialize($data);

        $saveClass->save();

        return redirect()->route('myclass.index')->with('successs', 'Classroom updated');
    }

    public function loadYear()
    {
        $year = ['F', 'G', 'LC', 'I', 'II', 'III'];
        return $year;
    }

    public function loadSession()
    {
        $session = ['M' => 'Morning', 'A' => 'Afternoon', 'E' => 'Evening'];
        return $session;
    }

    public function loadExtend()
    {
        $extend = ['A', 'B', 'C', 'D', 'E'];
        return $extend;
    }

    public function loadCourse()
    {
        $course = ['ENG', 'IT', 'ITB', 'BUS'];
        return $course;
    }
}
