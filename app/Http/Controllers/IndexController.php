<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {

        $tahun = $request->tahun;
        $menu = Http::get('https://tes-web.landa.id/intermediate/menu');
        $transaksi = Http::get('https://tes-web.landa.id/intermediate/transaksi?tahun='.$tahun);
        $menu_ = json_decode($menu);
        $transaksi_ = json_decode($transaksi);
        $nilai = 0;

        if ($request->tahun) {
            
            foreach ($transaksi_ as $hasil) {
                $nilai += $hasil->total;
            }

            foreach ($menu_ as $item) {
                for ($i = 1; $i <= 12; $i++) {
                    $result[$item->menu][$i] = 0;
                }
            }

            foreach ($transaksi_ as $data) {
                $bulan = date('n', strtotime($data->tanggal));
                $result[$data->menu][$bulan] += $data->total;
            }

            foreach ($transaksi_ as $jml) {
                for ($i = 1; $i <= 12; $i++) {
                    $jumlah[$i] = 0;
                }
            }

            foreach ($transaksi_ as $perbulan) {
                $dino = date('n', strtotime($perbulan->tanggal));
                $jumlah[$dino] += $perbulan->total;
            }

            foreach ($menu_ as $permenu) {
                $jumlahmenu[$permenu->menu] = 0;
            }

            foreach ($transaksi_ as $jmltrans) {
                $jumlahmenu[$jmltrans->menu] += $jmltrans->total;
            }

            return view('index', compact('tahun', 'menu_', 'transaksi_', 'result', 'nilai', 'jumlah', 'jumlahmenu'));
        } else {
            return redirect('index');
        }
    }

    
}
