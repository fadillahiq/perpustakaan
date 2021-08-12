<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = Peminjaman::select('peminjaman.*', DB::raw('DATEDIFF(tanggal_kembali,tanggal_pinjam) as lama_pinjam'))->with('anggota', 'buku',);

        if ($request->status_kembali) {
            $status = $request->status_kembali == 'belum' ? 0 : 1;
            $data = $data->where('status','=', $status);
        }

        if ($request->tanggal) {
            $data = $data->where('tanggal_pinjam', $request->tanggal);
        }

        $data = $data->get();

        foreach ($data as $value) {

            $total = 0;

            foreach ($value->buku as $buku) {
                $total_bayar = $total + $buku->harga_pinjam;
            }

            $value->total_bayar = 'Rp. '.number_format($total_bayar * $value->lama_pinjam);

            $value->list_buku = Buku::select('id','judul')->limit(12)->orderBy('id', 'desc')->get();
            $value->buku_dipinjam = DetailPeminjaman::where('id_peminjaman', $value->id)->pluck('id_buku');

            foreach ($value->list_buku as $list) {
                $list->dipinjam = in_array($list->id, $value->buku_dipinjam->toArray());
            }
        }

        $datatables = datatables()->of($data)->addIndexColumn();

        return $datatables->make(true);
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
            'id_anggota' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        $data = [
            'id_anggota' => $request->id_anggota,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 0
        ];

        $data_peminjaman = Peminjaman::create($data);

        $bukus = $request->id_buku;
        $data2 = [];

        foreach($bukus as $buku) {
            $data2[] = [
                'id_peminjaman' => $data_peminjaman->id,
                'id_buku' => $buku,
                'qty' => 1
            ];

            $data_buku = Buku::find($buku);
            $data_buku->update(['qty_stok' => $data_buku->qty_stok - 1]);
        }

        DetailPeminjaman::insert($data2);

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($id);
        $this->validate($request, [
            'id_anggota' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status' => 'required'
        ]);

        $data = [
            'id_anggota' => $request->id_anggota,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status
        ];

        $peminjaman->update($data);

        DetailPeminjaman::where('id_peminjaman', $peminjaman->id)->delete();

        $bukus = $request->id_buku;
        foreach ($bukus as $buku) {
            DetailPeminjaman::create([
                'id_peminjaman' => $peminjaman->id,
                'id_buku' => $buku,
                'qty' => 1
            ]);

            if ($request->status == 1) {
                $data_buku = Buku::find($buku);
                $data_buku->update(["qty_stok" => $data_buku->qty_stok + 1]);
            }

        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::find($id);
        DetailPeminjaman::where('id_peminjaman', $peminjaman->id)->delete();
        $peminjaman->delete();
    }
}
