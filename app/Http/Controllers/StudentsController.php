<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\EditStudentRequest;
use App\Models\Department;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\StreamedResponse;



class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::paginate(100);
        return view('StudentList',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
      $departments = Department::all();
      return view('addStudent',['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddStudentRequest $request)
    {

        $data =[
          'first_name'    => $request->first_name,
          'last_name'     => $request->last_name,
          'student_id'    => $request->student_id,
          'age'           => $request->age,
          'department_id' => $request->department_id
        ];

          DB::beginTransaction();
          student::create($data);
          DB::commit();
          return redirect('student-list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id):view
    {

        $student = Student::where('id',$id)->first();
        return view('StudentProfile',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id):view
    {

        $student = Student::where('id',$id)->first();
        $departments = Department::all();
        return view('StudentEdit',['student'=>$student, 'departments'=>$departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditStudentRequest $request, $id)
    {

        $data =[
          'first_name'    => $request->first_name,
          'last_name'     => $request->last_name,
          'student_id'    => $request->student_id,
          'age'           => $request->age,
          'department_id' => $request->department_id
        ];
        Student::where('id',$id)->update($data);

        return redirect('student-list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id',$id)->delete();

        return redirect('student-list');
    }

    /**
    * Export All student data in csv
    *
    */

    public function export()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="students.csv"',
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['first_name', 'last_name', 'student_id', 'age', 'department', 'subjects']);

            Student::with('departments', 'subjects')
                ->chunk(500, function ($students) use ($handle) {
                    foreach ($students as $student) {
                        fputcsv($handle, [
                            $student->first_name,
                            $student->last_name,
                            $student->student_id,
                            $student->age,
                            optional($student->departments)->name,
                            $student->subjects->pluck('name')->implode(','),
                        ]);
                    }
                });

            fclose($handle);
        };

        return response()->stream($callback, Response::HTTP_OK, $headers);
    }

}
