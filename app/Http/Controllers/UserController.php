<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->user->Show();
        return view('admin.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return back()->with('password', 'Password and confirm password are not the same');
        }
        $this->user->Store([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return back()->with('create', 'Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->user->ShowId($id);
        return view('admin.users.profile',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->user->Edit($id, [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);
        return redirect()->route('user.index')->with('update', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user->Trash($id);
        return redirect()->route('user.index')->with('delete', 'Deleted successfully');
    }
}
