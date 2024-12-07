<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = [];
        return view('users.index', compact('users'));
    }

    public function getUsers(Request $request)
    {
        $query = User::query();
        
        if ($request->input('search.value')) {
            $searchValue = $request->input('search.value');
            $query->where(function($q) use ($searchValue) {
                $q->where('name', 'LIKE', "%{$searchValue}%")
                  ->orWhere('email', 'LIKE', "%{$searchValue}%");
            });
        }
        
        $perPage = $request->input('length', 10); // Items per page
        $currentPage = $request->input('start', 0) / $perPage + 1; // Calculate the current page
    
        // Use paginate() to get the results
        $users = $query->paginate($perPage, ['*'], 'page', $currentPage);

        // Return JSON response for DataTables
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => User::count(), // Total records before filtering
            'recordsFiltered' => $users->total(), // Total records after filtering
            'data' => $users->items(), // Paginated data
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findorFail($id);
        return view('users.create', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->fullname;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');

    }

    public function delete($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User Deleted successfully.');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|min:8',
        ]);
        $user->name = $request->name;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['success' => true, 'message' => 'Profile updated. You will be logged out.']);
    }
}
