<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
{
    return Dosen::all();
}

public function store(Request $request)
{
    $dosen = Dosen::create($request->all());
    return response()->json($dosen, 201);
}

public function show($id)
{
    return Dosen::findOrFail($id);
}

public function update(Request $request, $id)
{
    $dosen = Dosen::findOrFail($id);
    $dosen->update($request->all());
    return response()->json($dosen, 200);
}

public function destroy($id)
{
    Dosen::destroy($id);
    return response()->json(null, 204);
}
}
