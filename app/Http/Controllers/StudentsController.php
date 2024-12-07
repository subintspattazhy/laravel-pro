<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Students;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentsController extends Controller
{
    private $districts = [
        'Thiruvananthapuram',
        'Kollam',
        'Pathanamthitta',
        'Alappuzha', 
        'Kottayam',
        'Idukki',
        'Ernakulam',
        'Thrissur',
        'Palakkad', 
        'Malappuram',
        'Kozhikode',
        'Wayanad',
        'Kannur',
        'Kasaragod',
    ];

    public function index()
    {
        return view('students.index');
    }

    public function create()
    {
        return view('students.create', $this->getCommonData());
    }

    public function edit(Students $student)
    {
        $data = $this->getCommonData();
        $data['students'] = $student;
        return view('students.create', $data);
    }

    public function getStudents(Request $request)
    {
        $query = Students::with(['teacher', 'classRoom']);

        if ($searchValue = $request->input('search.value')) {
            $query->where('name', 'LIKE', "%{$searchValue}%");
        }
        
        $perPage = $request->input('length', 10);
        $currentPage = $request->input('start', 0) / $perPage + 1;

        $students = $query->paginate($perPage, ['*'], 'page', $currentPage);

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => Students::count(), 
            'recordsFiltered' => $students->total(), 
            'data' => $students->map(function ($student) {
                return [
                    'id' => $student->id,
                    'name' => $student->name, 
                    'dob' => $student->dob,
                    'join_date' => $student->join_date,
                    'phone' => $student->phone,
                    'teacher_name' => $student->teacher->name ?? 'N/A', 
                    'class_room_name' => $student->classRoom->name ?? 'N/A',
                    'active' => $student->active ? 'Active' : 'Inactive',
                    'edit_url' => route('students.edit', $student->id),
                    'delete_url' => route('students.delete', $student->id),
                ];
            }),
        ]);
    }

    public function store(StoreStudentRequest $request)
    {
        
        Students::create($request->validated() + [
            'join_date' => $request->join_date,
            'current_class_room_id' => $request->current_class_room_id,
            'teacher_id' => $request->teacher,
            'place' => $request->place,
            'whatsapp' => $request->whatsapp,
            'abroad_place' => $request->abroad_place ?? '',
            'active'=> $request->has('active') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Student created successfully');
    }

    public function update(UpdateStudentRequest $request, Students $student)
    {
        $student->update($request->validated() + [
            'join_date' => $request->join_date,
            // 'current_class_room_id' => $request->current_class_room_id,
            'teacher_id' => $request->teacher,
            'place' => $request->place,
            'abroad_place' => $request->abroad_place ?? '',
            'active' => $request->has('active') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Student Updated successfully');
    }

    public function delete(Students $student)
    {
        $student->delete();
        return response()->json(['message' => 'Student Deleted successfully']);
    }


    private function getCommonData()
    {
        return [
            'teachers' => User::where('role', 'teacher')->get(),
            'classes' => ClassRoom::where('active', 1)->get(),
            'districts' => $this->districts,
        ];
    }
}
