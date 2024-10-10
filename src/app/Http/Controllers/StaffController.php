<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('user.staffdisplay', compact('staffs'));
    }

    public function indexAdmin()
    {
        $staffs = Staff::all();
        return view('admin.listStaff', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $ruangans = Ruangan::all();

        return view('admin.createStaff', compact('users', 'ruangans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'ruangan_id' => 'required|exists:ruangans,id',
        ],
        [
            'user_id.required' => 'User ID tidak boleh kosong!',
            'user_id.exists' => 'User ID tidak ditemukan!',
            'ruangan_id.required' => 'Ruangan ID tidak boleh kosong!',
            'ruangan_id.exists' => 'Ruangan ID tidak ditemukan!',
        ]);
    
        // Save the staff data
        $user = User::where('user_id', $request->user_id)->first();

        if ($user->role !== 'admin') {
            $user->role = 'admin';
            $user->save();
        }

        Staff::create([
            'user_id' => $request->user_id,
            'ruangan_id' => $request->ruangan_id,
        ]);
    
        return redirect()->route('admin-staff')->with('success', 'Staff berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
