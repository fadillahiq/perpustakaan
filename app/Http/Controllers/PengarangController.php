<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use RealRashid\SweetAlert\Facades\Alert;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $data_pengarang = Pengarang::latest()->paginate(10);

        return view('admin.pengarang.index', compact('data_pengarang'))->with('i');
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
            'nama_pengarang' => 'required|max:64|string',
            'email' => 'required|email|max:255|unique:pengarangs',
            'telp' => 'required|string|max:14',
            'alamat' => 'required|max:500'
        ]);

        Pengarang::create($request->all());

        Alert::success('Data Pengarang berhasil disimpan');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function show(Pengarang $pengarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengarang $pengarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengarang = Pengarang::findOrFail($id);
        $this->validate($request, [
            'nama_pengarang' => 'required|max:64|string',
            'email' => 'required|email|max:255|unique:pengarangs,email,'.$pengarang->id,
            'telp' => 'required|string|max:14',
            'alamat' => 'required|max:500'
        ]);

        $pengarang->update($request->all());

        Alert::success('Data Pengarang berhasil diperbarui');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->delete();

        return back()->withSuccess('Data Pengarang berhasil dihapus');
    }
}
