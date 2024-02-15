<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use App\Models\{Student, Room};
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function __construct()
    {
        // if (!auth()->user()) {
        if (!Session::get('adminid') && !Session::get('username')) {
            // return redirect()->route('home')->with(['error' => 'Unauthorized access!!']);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->user());
        // dd(Session::get('adminid'),Session::get('username'));
        $students = Student::with(['room'])->get();
        // dd($students);
         return view('student.list',['student'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::get();
        return view('student.create', ['rooms' => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'phone'    => 'required|digits:10',
            'room'     => 'required',
            'filename' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $student = new Student();
        $student->sname   = $request->name;
        $student->semail  = $request->email;
        $student->phone   = $request->phone;
        $student->classId = $request->room;

        $imageName = time().'.'.$request->filename->extension();
        $request->filename->move(public_path('uploads'), $imageName);

        $student->image   = $imageName;
        $result = $student->save();
        if ($result) {
            return redirect(route('student.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('student.index'))->with('error', 'Failure');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = Student::with(['room'])->where('id',$id)->first();
        return view('student.view',['student'=>$students]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = Student::findOrFail($id);
        $room = Room::get();
        return view('student.edit',['student'=>$students,'rooms'=>$room]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'phone'    => 'required|digits:10',
            'room'     => 'required',
            'filename' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $student = Student::findOrFail($id);
        $student->sname   = $request->name;
        $student->semail  = $request->email;
        $student->phone   = $request->phone;
        $student->classId = $request->room;
        if ($request->hasFile('filename')) {
            $oldimg = $student->image;
            if($oldimg!='' && file_exists(public_path('uploads').'/'.$oldimg)) {
                unlink(public_path('uploads').'/'.$oldimg);
            }
            $imageName = time().'.'.$request->filename->extension();
            $request->filename->move(public_path('uploads'), $imageName);
            $student->image = $imageName;
        }
        $result = $student->save();
        if ($result) {
            return redirect(route('student.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('student.index'))->with('error', 'Failure');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Student::findOrFail($id)->delete(); 
        if ($result) {
            return redirect(route('student.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('student.index'))->with('error', 'Failure');
        }
    }

    public function import(Request $request)
    {
        if ($request->isMethod('post')) 
        {
            $request->validate([
                'filename' => 'required'
            ]);
            // $time = time();
            $data = new StudentImport();
            $data->import($request->filename);

            $existEmails = [];
            foreach ($data->failures() as $key => $failure) {
                $failedRow = $failure->values();
                $existEmails[] = $failedRow['email'];
            }
            if (count($existEmails)) {
                $with['error'] = 'Email Ids ('.implode(', ', $existEmails).') already exists !!';
            }
            $uploadedCount = $data->getRowCount();
            if ($uploadedCount) {
                $with['success'] = $uploadedCount.' Rows has been uploaded successfully!';
            }
            return redirect(route('student.import'))->with($with);
        }
        else 
        {
            return view('student.import');
        }
    }
    public function export()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }
}
