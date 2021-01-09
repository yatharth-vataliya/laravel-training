<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Repositories\StudentRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{

    public function __construct(private StudentRepository $studentRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'student_name' => 'required|string|max:100',
                'student_email' => 'required|string|email|max:100|unique:students,student_email',
                'student_birth_date' => 'required|date',
                'student_mobile' => 'nullable|string|max:13|min:10|unique:\App\Models\Student,student_mobile',
                'student_stream' => 'required|string|max:50',
                'student_address' => 'nullable|string|max:200',
                'student_profile_picture' => 'nullable|file|mimes:jpg,JPG,png,PNG,bpm,gif',
                'student_gender' => 'nullable|string|max:8',
                'student_hobbies' => 'nullable|array|max:4',
            ],
            [
                'student_name.required' => 'Please Fill Student Name',
                'student_email.required' => 'Please Fill student email',
                'student_email.email' => 'Be sure that inserted email is in correct formate',
            ]
        )->validate();

        $student['student_name'] = $request->input('student_name');
        $student['student_email'] = $request->input('student_email');
        $student['student_birth_date'] = $request->input('student_birth_date');
        $student['student_mobile'] = $request->input('student_mobile');
        $student['student_stream'] = $request->input('student_stream');
        $student['student_address'] = $request->input('student_address');
        if ($request->hasFile('student_profile_picture')) {
            $filename = '_' . time() . '.' . $request->file('student_profile_picture')->getClientOriginalExtension();
            $request->file('student_profile_picture')->storeAs('custom/profile_pictures/', $filename,);
            $student['student_profile_picture'] = $filename;
        }
        $student['student_gender'] = $request->input('student_gender');
        $hobbies = $request->input('student_hobbies');
        $hobbies = implode(',', ($hobbies ?? []));
        $hobbies = trim($hobbies, ',');
        $student['student_hobbies'] = $hobbies;

        $this->studentRepository->create($student);
        return response()->view('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return response()->view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validated = Validator::make(
            $request->all(),
            [
                'student_id' => 'required|numeric',
                'student_name' => 'required|string|max:100',
                'student_email' => 'required|string|email|max:100|unique:students,student_email,' . $request->student_id,
                'student_birth_date' => 'required|date',
                'student_mobile' => 'nullable|string|max:13|min:10|unique:students,student_mobile,' . $request->student_id,
                'student_stream' => 'required|string|max:50',
                'student_address' => 'nullable|string|max:200',
                'student_profile_picture' => 'nullable|file|mimes:jpg,JPG,png,PNG,bpm,gif',
                'student_gender' => 'nullable|string|max:8',
                'student_hobbies' => 'nullable|array|max:4',
            ],
            [
                'student_id.required' => 'Hey you please don\'t mess with code we are not fool here',
                'student_name.required' => 'Please Fill Student Name',
                'student_email.required' => 'Please Fill student email',
                'student_email.email' => 'Be sure that inserted email is in correct format',
            ]
        )->validate();


        $student = Student::find($request->student_id);
        $data['student_name'] = $request->input('student_name');
        $data['student_email'] = $request->input('student_email');
        $data['student_birth_date'] = $request->input('student_birth_date');
        $data['student_mobile'] = $request->input('student_mobile');
        $data['student_stream'] = $request->input('student_stream');
        $data['student_address'] = $request->input('student_address');
        if ($request->hasFile('student_profile_picture')) {
            try {
                unlink(storage_path('app/custom/profile_pictures/') . $student->getRawOriginal('student_profile_picture'));
            } catch (\Throwable $th) {
                Log::debug($th->getMessage());
            }
            $filename = '_' . time() . '.' . $request->file('student_profile_picture')->getClientOriginalExtension();
            $request->file('student_profile_picture')->storeAs('custom/profile_pictures/', $filename,);
            $data['student_profile_picture'] = $filename;
        }
        if ($request->input('is_image_delete') == 'yes') {
            try {
                unlink(storage_path('app/custom/profile_pictures/') . $student->getRawOriginal('student_profile_picture'));
                $data['student_profile_picture'] = NULL;
            } catch (\Throwable $th) {
                Log::debug($th->getMessage());
            }
        }
        $data['student_gender'] = $request->input('student_gender');
        $hobbies = $request->input('student_hobbies');
        $hobbies = implode(',', ($hobbies ?? []));
        $hobbies = trim($hobbies, ',');
        $data['student_hobbies'] = $hobbies;

        $this->studentRepository->updateStudent($data, $student);
        return response()->redirectToRoute('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student = Student::find($request->student_id);
        $this->studentRepository->deleteById($request->student_id);
    }

    public function ajaxStudentsData(Request $request)
    {
        if ($request->ajax()) {
            $students = $this->studentRepository->getAll();
            return DataTables::of($students)->addIndexColumn()->make(true);
        }
    }
}
