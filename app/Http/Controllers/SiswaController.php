<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('index', compact('siswa'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'asal' => 'required',
        ], [
            'nama_siswa.required' => 'Nama siswa harus diisi.',
            'kelas.required' => 'Kelas harus diisi.',
            'asal.required' => 'Asal harus diisi.',
        ]);

        $data = $request->all();

        Siswa::create($data);

        return redirect("/siswa")->with('success', 'Data siswa berhasil disimpan.');
    }
}
