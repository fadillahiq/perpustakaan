<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Katalog;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function dashboard()
    {
        // $anggotas = Anggota::with('user', 'peminjaman')->get();

        // return $anggotas;

        $total_anggota = Anggota::count();
        $total_buku = Buku::count();
        $total_peminjaman = Peminjaman::count();
        $total_penerbit = Penerbit::count();

        $data_donuts = Buku::select(DB::raw("COUNT(id_penerbit) as total"))->groupBy('id_penerbit')->orderBy('id_penerbit', 'ASC')->pluck('total');
        $label_donuts = Penerbit::orderBy('penerbits.id', 'ASC')->join('bukus', 'bukus.id_penerbit', '=', 'penerbits.id')->groupBy('nama_penerbit')->pluck('nama_penerbit');

        $label_bar = ['Peminjaman', 'Pengembalian'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 1 ? '#458af7' : 'gray';
            $data_bar[$key]['borderColor'] = $key == 1 ? '#458af7' : 'gray';
            $data_month = [];

            foreach (range(1,12) as $month) {
                if ($key == 0) {
                    $data_month[] = Peminjaman::select(DB::raw("COUNT(*) as total"))->whereMonth('tanggal_pinjam', $month)->first()->total;
                } else {
                    $data_month[] = Peminjaman::select(DB::raw("COUNT(*) as total"))->whereMonth('tanggal_kembali', $month)->first()->total;
                }

            }

            $data_bar[$key]['data'] = $data_month;
        }

        return view('admin.dashboard', compact('total_anggota', 'total_buku', 'total_peminjaman', 'total_penerbit', 'data_donuts', 'label_donuts', 'data_bar', 'label_bar'));
    }

    public function data_penerbit()
    {
        $datas = Penerbit::with('buku')->get();
        return view('admin.penerbit.index');
    }

    public function data_anggota()
    {
        $datas = Anggota::all();
        return view('admin.anggota.index');
    }

    public function data_buku()
    {
        Paginator::useBootstrap();
        $penerbits = Penerbit::all();
        $pengarangs = Pengarang::all();
        $katalogs = Katalog::all();
        return view('admin.buku.index', compact('penerbits', 'pengarangs', 'katalogs'));
    }

    public function data_peminjaman()
    {
       if(auth()->user()->hasRole('petugas')){
            $bukus = Buku::limit(100)->orderBy('id', 'desc')->where('qty_stok', '>', 0)->get();
            $anggotas = Anggota::all();
            return view('admin.peminjaman.index', compact('bukus', 'anggotas'));
       }else {
           return view('errors.403');
       }
    }

    public function test_spatie()
    {
        // Membuat Role Baru
        // $role = Role::create(['name' => 'petugas']);
        // $permission = Permission::create(['name' => 'index peminjaman']);

        // Memberikan akses pada role petugas untuk mengakses index peminjaman
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // Menambkan Role pada User
        // $user = User::where('email', 'laku0505@gmail.com')->first();
        // $user->assignRole('petugas');
        // return $user;

        // Menghapus Role pada User
        // $user = User::where('email', 'laku0505@gmail.com')->first();
        // $user->removeRole('petugas');
        // return $user;
    }
}
