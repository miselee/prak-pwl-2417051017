<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        $userModel = new UserModel();

        return view('list_user', [
            'title' => 'List User',
            'users' => $userModel->getUser(),
        ]);
    }

    public function create()
    {
        $kelasModel = new Kelas();

        return view('create_user', [
            'title' => 'Create User',
            'kelas' => $kelasModel->getKelas(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:30',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        UserModel::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();

        return view('edit_user', [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelasModel->getKelas(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:30',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = UserModel::findOrFail($id);

        $user->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}