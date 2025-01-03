<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makul;

class MakulController extends Controller
{
    public function index()
{
    return Makul::all();
}

public function store(Request $request)
{
    $makul = Makul::create($request->all());
    return response()->json($makul, 201);
}

public function show($id)
{
    return Makul::findOrFail($id);
}

public function update(Request $request, $id)
{
    $makul = Makul::findOrFail($id);
    $makul->update($request->all());
    return response()->json($makul, 200);
}

public function destroy($id)
{
    Makul::destroy($id);
    return response()->json(null, 204);
}
}
