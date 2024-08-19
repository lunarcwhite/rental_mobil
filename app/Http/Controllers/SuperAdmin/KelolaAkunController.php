<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Validation\Rule;

class KelolaAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['users'] = User::whereNot('id', 1)->get();
            $data['roles'] = Role::whereNot('id', 1)->get();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
        return view('SuperAdmin.KelolaAkun.index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'min_digits:8',
            'roleId' => 'required'
        ]);
        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        try {
            User::create($data);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi berhasil');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_method', '_token');
        if ($data['password'] != null) {
            $request->validate([
                'name' => ['required', Rule::unique('users')->ignore($id)],
                'email' => ['required', Rule::unique('users')->ignore($id)],
                'password' => 'min_digits:8',
                'roleId' => 'required'
            ]);
            $data['password'] = bcrypt($request->password);
        }else{
            $request->validate([
                'name' => ['required', Rule::unique('users')->ignore($id)],
                'email' => ['required', Rule::unique('users')->ignore($id)],
                'roleId' => 'required'
            ]);
            unset($data['password']);
        }

        try {
            User::where('id', $id)->update($data);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi berhasil!');
    }

    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Aksi gagal!')->withInput();
        }
        return redirect()->back()->with('success', 'Aksi berhasil');
    }
}
