<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Menampilkan banner berdasarkan posisi
     */
    public function getByPosition($position)
    {
        $banners = Banner::active()
            ->byPosition($position)
            ->currentlyActive()
            ->orderBy('order_index', 'asc')
            ->get();

        return response()->json($banners);
    }

    /**
     * Menampilkan semua banner aktif
     */
    public function index()
    {
        $banners = Banner::active()
            ->currentlyActive()
            ->orderBy('order_index', 'asc')
            ->get()
            ->groupBy('position');

        return view('banners.index', compact('banners'));
    }

    /**
     * Menampilkan banner untuk posisi tertentu (untuk partial view)
     */
    public function showByPosition($position)
    {
        $banners = Banner::active()
            ->byPosition($position)
            ->currentlyActive()
            ->orderBy('order_index', 'asc')
            ->get();

        return view('banners.partials.position', [
            'banners' => $banners,
            'position' => $position
        ]);
    }
}
