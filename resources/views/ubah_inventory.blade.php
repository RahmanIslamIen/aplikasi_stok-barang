@extends('inventory_dashboard')

@section('title')
    Inventory Edit
@endsection

@section('konten_item')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Ubah Data Inventory
                        <a href="{{ url('/') }}" class="btn btn-danger float-end">kembali</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('ubah-inventori/'.$inventory->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <img src="/uploads/inventory/{{$inventory->gambar_item}}" class="card-img-top gambarInventori">
                        <div class="form-group mb-3">
                            <label for="">Gambar Item</label>
                            <input type="file" name="gambar_item" value="{{$inventory->gambar_item}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nama Item</label>
                            <input type="text" name="nama_item" value="{{$inventory->nama_item}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Harga Item</label>
                            <input type="number" name="harga_item" value="{{$inventory->harga_item}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Jumlah Item</label>
                            <input type="number" name="jumlah" value="{{$inventory->jumlah}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Satuan</label>
                            <input type="text" name="satuan" value="{{$inventory->satuan}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection