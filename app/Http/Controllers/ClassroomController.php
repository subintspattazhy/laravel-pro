<?php
namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;


class ClassroomController extends Controller
{

    public function index()
    {
        return view('classroom.index');
    }

    public function getClasses(Request $request)
    {
        $query = ClassRoom::query();
        
        if ($request->input('search.value')) {
            $searchValue = $request->input('search.value');
            $query->where(function($q) use ($searchValue) {
                $q->where('name', 'LIKE', "%{$searchValue}%");
            });
        }
        
        $perPage = $request->input('length', 10); 
        $currentPage = $request->input('start', 0) / $perPage + 1;
    
        $classes = $query->paginate($perPage, ['*'], 'page', $currentPage);
    
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => ClassRoom::count(),
            'recordsFiltered' => $classes->total(),
            'data' => $classes->map(function ($classRoom) {
                return [
                    'id' => $classRoom->id,
                    'name' => $classRoom->name,
                    'active' => $classRoom->active ? 'Active' : 'Inactive',
                    'edit_url' => route('classroom.edit', $classRoom->id),
                    'delete_url' => route('classroom.delete', $classRoom->id),
                ];
            }),
        ]);
    }
    

    public function create()
    {
        return view('classroom.create');
    }

    public function store(StoreClassRequest $request)
    {
        ClassRoom::create($request->validated() + [

            'active'=> $request->has('active') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Class created successfully.');
    }

    public function edit(ClassRoom $class)
    {
        // $classRoom = classRoom::findorfail($class);
        return view('classroom.create', compact('class'));
    }

    public function  update(UpdateClassRequest $request, ClassRoom $class)
    {
        // $classRoom = classRoom::findorfail($class);
        $class->update($request->validated() + [

            'active' => $request->has('active') ? 1 : 0,
        ]);
        return redirect()->route('classroom')->with('success', 'Class update successfully');
    }

    public function delete(classRoom $classes)
    {
        $classes->delete();
        return response()->json(['message' => 'Class delete  successfully']);
    }

}

