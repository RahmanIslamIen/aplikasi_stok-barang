<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public function tampilData()
    {
        $inventory = Inventory::all();
        return view('item_inventory', compact('inventory'));
    }
    
    public function store(Request $request)
    {
        $inventory = new Inventory;

        if($request->hasfile('gambar_item'))
        {
            $file = $request->file('gambar_item');
            $extenstion = $file->getClientOriginalExtension();
            $namaFile = time().'.'.$extenstion;
            $file->move('uploads/inventory/', $namaFile);
            $inventory->gambar_item = $namaFile;
        }

        $inventory->nama_item = $request->input('nama_item');
        $inventory->harga_item = $request->input('harga_item');
        $inventory->jumlah = $request->input('jumlah');
        $inventory->satuan = $request->input('satuan');
        $inventory->save();

        return redirect()->back()->with('satus', 'inventori barang berhasil ditambahkan');
    }

    public function mengubahData($id)
    {
        $inventory = Inventory::find($id);
        return view('ubah_inventory', compact('inventory'));
    }

    public function ubahData(Request $request, $id)
    {
        $inventory = Inventory::find($id);
        
        if($request->hasfile('gambar_item'))
        {
            $file = $request->file('gambar_item');
            $extenstion = $file->getClientOriginalExtension();
            $namaFile = time().'.'.$extenstion;
            $file->move('uploads/inventory/', $namaFile);
            $inventory->gambar_item = $namaFile;
        }

        $inventory->nama_item = $request->input('nama_item');
        $inventory->harga_item = $request->input('harga_item');
        $inventory->jumlah = $request->input('jumlah');
        $inventory->satuan = $request->input('satuan');
        $inventory->update();

        return redirect()->back();
    }

    public function hapusData($id){
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->back()->with('status','inventori berhasil di hapus');
    }

}
