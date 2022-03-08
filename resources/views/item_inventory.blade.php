@extends('inventory_dashboard')

@section('title')
    Item Inventory
@endsection

@section('konten_item')

<div class="row">
  <!-- Button modal tambah data -->
  <button type="button" class="btn btn-success btn-tambahData" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Data
  </button>
</div>

<div class="row row-cols-1 row-cols-md-4 g-4 container_konten">
  
  @foreach ($inventory as $item)

  <div class="col">
    <div class="card h-100">
      <img src="/uploads/inventory/{{ $item->gambar_item }}" class="card-img-top gambarInventori">
      <div class="card-body">
        <h5 class="card-title">{{ $item->nama_item }}</h5>
        <p class="card-text">{{ $item->harga_item }}</p>
        <p>{{ $item->jumlah }} . {{ $item->satuan }}</p>
        <a href="{{ url('hapus-inventory/'.$item->id) }}" type="button" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
  
  @endforeach

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Inventori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{ url('tambah-inventori') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group mb-3">
                  <label for="">Gambar Item</label>
                  <input type="file" name="gambar_item" class="form-control">
              </div>
              <div class="form-group mb-3">
                  <label for="">Nama Item</label>
                  <input type="text" name="nama_item" class="form-control">
              </div>
              <div class="form-group mb-3">
                  <label for="">Harga Item</label>
                  <input type="text" name="harga_item" class="form-control">
              </div>
              <div class="form-group mb-3">
                  <label for="">Jumlah Item</label>
                  <input type="number" name="jumlah" class="form-control">
              </div>
              <div class="form-group mb-3">
                  <label for="">Satuan</label>
                  <input type="text" name="satuan" class="form-control">
              </div>
              <div class="form-group mb-3">
                  <button type="submit" class="btn btn-success">Save Inventori</button>
              </div>

          </form>
      </div>
    </div>
  </div>
</div>

@endsection