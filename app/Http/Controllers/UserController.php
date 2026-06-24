<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bengkel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('bengkel')->latest()->paginate(5);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bengkels = Bengkel::all();
        return view('user.create', compact('bengkels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'BengkelsID' => 'required|exists:bengkels,id',
            'role' => 'required|in:admin,manager,mekanik',
        ]);

        // Enkripsi password sebelum disimpan
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);
        return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $bengkels = Bengkel::all();
        return view('user.edit', compact('user', 'bengkels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6', 
            'BengkelsID' => 'required|exists:bengkels,id',
            'role' => 'required|in:admin,manager,mekanik',
        ]);

        // Cek apakah kolom password diisi, jika tidak, hapus dari array agar tidak menimpa password lama.
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            // Hapus password dari array agar tidak menimpa data yang ada dengan null.
            unset($validated['password']);
        }

        $user->update($validated);
        return redirect()->route('user.index')->with('success', 'Data Pengguna berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data Pengguna berhasil dihapus!');
    }
}
