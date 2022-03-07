<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // public function create()
    // {
    //     return view('item_');
    // }

    public function store(Request $request)
    {
        $inventory = new Inventory;

        $inventory->nama_item = $request->input('nama_item');
        $inventory->harga_item = $request->input('harga_item');
        $inventory->jumlah = $request->input('jumlah');
        $inventory->satuan = $request->input('satuan');
        $inventory->save();

        return redirect()->back()->with('satus', 'inventori barang berhasil ditambahkan');
    }
}
