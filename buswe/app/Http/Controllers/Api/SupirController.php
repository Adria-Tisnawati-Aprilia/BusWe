<?php

namespace App\Http\Controllers\Api;
use App\Models\Supir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupirController extends Controller
{
    public function index()
    {
        $supirs = Supir::orderByDesc('created_at')->paginate(5);
        return response()->json($supirs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_reg' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'jk' => 'required|in:P,L'
        ]);

        $supir = Supir::create($request->all());
        return response()->json($supir);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supir $supir)
    {
        return $supir;
        return response()->json($supir);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supir $supir)
    {
        $request->validate([
            'no_reg' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'jk' => 'required|in:P,L'
        ]);

        $supir->no_reg = $request->no_reg;
        $supir->nama_lengkap = $request->nama_lengkap;
        $supir->alamat = $request->alamat;
        $supir->jk = $request->jk;
        $supir->save();

        return response()->json($supir);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supir $supir)
    {
        $supir->delete();
        return response()->json(['message' => 'supir berhasil dihapus']);
    }
}
