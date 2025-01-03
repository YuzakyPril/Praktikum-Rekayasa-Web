<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
/**
* @OA\Get(
*   path="/api/mahasiswa",
*   summary="Dapatkan daftar semua mahasiswa",
*   description="Mengembalikan daftar semua mahasiswa",
*   operationId="getMahasiswa",
*   tags={"Mahasiswa"},
*   @OA\Response(
*       response=200,
*       description="Daftar mahasiswa",
*       @OA\JsonContent(
*           type="array",
*           @OA\Items(ref="#/components/schemas/Mahasiswa")
*       )
*   )
* )

 * @OA\Post(
 *     path="/api/mahasiswa",
 *     summary="Tambahkan mahasiswa baru",
 *     description="Menambahkan data mahasiswa baru",
 *     operationId="createMahasiswa",
 *     tags={"Mahasiswa"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Mahasiswa berhasil ditambahkan",
 *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Data tidak valid"
 *     )
 * )



 * @OA\Put(
 *     path="/api/mahasiswa/{id}",
 *     summary="Perbarui data mahasiswa",
 *     description="Memperbarui data mahasiswa berdasarkan ID",
 *     operationId="updateMahasiswa",
 *     tags={"Mahasiswa"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID mahasiswa yang akan diperbarui",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Mahasiswa berhasil diperbarui",
 *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Data tidak valid"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Mahasiswa tidak ditemukan"
 *     )
 * )



 * @OA\Delete(
 *     path="/api/mahasiswa/{id}",
 *     summary="Hapus mahasiswa",
 *     description="Menghapus data mahasiswa berdasarkan ID",
 *     operationId="deleteMahasiswa",
 *     tags={"Mahasiswa"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID mahasiswa yang akan dihapus",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Mahasiswa berhasil dihapus"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Mahasiswa tidak ditemukan"
 *     )
 * )


*/


        public function index()
    {
        return Mahasiswa::all();
    }

    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json($mahasiswa, 201);
    }

    public function show($id)
    {
        return Mahasiswa::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return response()->json($mahasiswa, 200);
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return response()->json(null, 204);
    }

    public function getDosensByMakul($kode_makul)
    {
        $makul = Makul::where('kode_makul', $kode_makul)->with('dosens')->first();

        if ($makul) {
            return response()->json($makul->dosens);
        }

        return response()->json(['message' => 'Mata kuliah tidak ditemukan'], 404);
    }
}
