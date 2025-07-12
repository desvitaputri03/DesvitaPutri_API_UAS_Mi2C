<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perpustakaan;

class PerpustakaanController extends Controller
{
    public function index()
    {
        return response()->json(Perpustakaan::all());
    }

    public function show($id)
    {
        $data = Perpustakaan::find($id);
        if (!$data) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_perpustakaan' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'tipe' => 'required|in:Negeri,Swasta',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $data = Perpustakaan::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Perpustakaan::find($id);
        if (!$data) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $data->update($request->all());
        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = Perpustakaan::find($id);
        if (!$data) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $data->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
