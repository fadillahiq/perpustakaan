<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Buku::orderBy('judul', 'ASC')->get();

        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'isbn' => 'required|integer',
            'judul' => 'required|string|max:64',
            'tahun' => 'required|integer',
            'id_penerbit' => 'required|integer',
            'id_pengarang' => 'required|integer',
            'id_katalog' => 'required|integer',
            'qty_stok' => 'required|integer',
            'harga_pinjam' => 'required|integer',
        ]);

        Buku::create($request->all());

        Alert::success('Data Buku berhasil disimpan');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $this->validate($request, [
            'isbn' => 'required|integer',
            'judul' => 'required|string|max:64',
            'tahun' => 'required|integer',
            'id_penerbit' => 'required|integer',
            'id_pengarang' => 'required|integer',
            'id_katalog' => 'required|integer',
            'qty_stok' => 'required|integer',
            'harga_pinjam' => 'required|integer',
        ]);

        $buku->update($request->all());

        Alert::success('Data Buku berhasil diperbarui');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return back()->withSuccess('Data Buku berhasil dihapus');
    }
}
