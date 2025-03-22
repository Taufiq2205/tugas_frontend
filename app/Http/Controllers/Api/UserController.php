<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan semua user
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'nama_lengkap' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'gaji_pokok' => 'nullable|numeric',
            'pinjaman' => 'nullable|numeric',
        ]);

        // Simpan ke database
        $validated['password'] = Hash::make($validated['password']); // Enkripsi password

        $user = User::create($validated);
        return response()->json($user, 201);
    }

    // Menampilkan user berdasarkan ID
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user, 200);
    }

    // Mengupdate user
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validated = $request->validate([
            'username' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:6',
            'nama_lengkap' => 'sometimes|required|string|max:255',
            'notelp' => 'sometimes|required|string|max:20',
            'gaji_pokok' => 'nullable|numeric',
            'pinjaman' => 'nullable|numeric',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);
        return response()->json($user, 200);
    }

    // Menghapus user
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted'], 200);
    }
}
