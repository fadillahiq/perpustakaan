<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $data_katalog = Katalog::latest()->paginate(10);

        return view('admin.katalog.index', compact('data_katalog'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.katalog.create');
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
            'nama' => 'required|string|max:64|unique:katalogs'
        ]);

        Katalog::create($request->all());

        Alert::success('Data Katalog berhasil disimpan');
        return redirect()->route('katalog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function show(Katalog $katalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $katalog = Katalog::findOrFail($id);
        return view('admin.katalog.edit', compact('katalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $katalog = Katalog::findOrFail($id);
        $this->validate($request, [
            'nama' => 'required|string|max:64|unique:katalogs,nama,'.$katalog->id
        ]);

        $katalog->update($request->all());

        Alert::success('Data Katalog berhasil diperbarui');
        return redirect()->route('katalog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $katalog = Katalog::findOrFail($id);
        $katalog->delete();

        Alert::success('Data Katalog berhasil dihapus');
        return redirect()->route('katalog.index');
    }
}
