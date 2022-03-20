@extends('inventory_dashboard')

@section('title')
    Item Inventory
@endsection

@section('konten_item')

<ul class="nav nav-tabs bagianMenu" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#inventori" type="button" role="tab" aria-controls="home" aria-selected="true">
      Beranda
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#diagram" type="button" role="tab" aria-controls="profile" aria-selected="false">
      Grafik Inventori
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#aktivitas" type="button" role="tab" aria-controls="contact" aria-selected="false">
      Value Aset
    </button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="inventori" role="tabpanel" aria-labelledby="home-tab">

      <div class="row">
        <!-- Button modal tambah data -->
        <button type="button" class="btn btn-success btn-tambahData" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Tambah Data
        </button>
      </div>

      <div class="row row-cols-1 row-cols-md-4 g-4 container_konten">
        
        @foreach ($inventory as $item)

        <div class="col">
          <div class="card">
            <img src="/uploads/inventory/{{ $item->gambar_item }}" class="card-img-top gambarInventori">
            <div class="card-body">
              <h5 class="card-title">{{ $item->nama_item }}</h5>
              <p class="card-text">Harga: {{ $item->harga_item }}</p>
              <p>{{ $item->jumlah }} {{ $item->satuan }}</p>
              <a href="{{ url('hapus-inventory/'.$item->id) }}" type="button" class="btn btn-danger">Hapus</a>
              <a href="{{ url('mengubah-inventori/'.$item->id) }}" type="button" class="btn btn-primary">Ubah</a>
            </div>
          </div>
        </div>
        
        @endforeach

      </div>

      <!-- Modal tambah data -->
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
                        <input type="number" name="harga_item" class="form-control">
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

  </div>
  <div class="tab-pane fade container_konten" id="diagram" role="tabpanel" aria-labelledby="profile-tab">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div>
      <canvas id="myChart"></canvas>
    </div>

    <script>
      const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
      ];

      const data = {
        labels: labels,
        datasets: [
          {
          label: 'Barang Masuk',
          backgroundColor: '#8A39E1',
          borderColor: '#8A39E1',
          data: [5, 10, 5, 2, 20, 30, 45],
          },
          {
          label: 'Barang Keluar',
          backgroundColor: '#00C897',
          borderColor: '#00C897',
          data: [10, 9, 8, 4, 15, 24, 28],
          },
          {
          label: 'Barang Rusak',
          backgroundColor: '#4D77FF',
          borderColor: '#4D77FF',
          data: [8, 7, 6, 9, 12, 14, 22],
          }
      ]
      };

      const config = {
        type: 'line',
        data: data,
        options: {}
      };
    </script>

    <script>
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
    </script>
    
  </div>
  <div class="tab-pane fade container_konten" id="aktivitas" role="tabpanel" aria-labelledby="contact-tab">
    
    <h1>Perhitungan Jumlah asset</h1>
    <div class="row row-col-1 row-col-md-2">
      <div class="col">
        <p>nilai total seluruh inventori</p>
        <p>Rp 4.000.000</p>
      </div>
      <div class="col">
        <p>Jumlah Total semua inventori</p>
        <p>Rp 4.000.000</p>    
      </div>
    </div>

    <div class="rincian_inventori">
      <div class="card bagianPenyimpanan">
        <p>Ruang Simpan Inventori</p>
        <div class="progress">
          <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="card bagianPenyimpanan">
        <p>Penyimpanan Hardisk</p>
        <div class="progress">
          <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="card bagianPenyimpanan">
        <p>Penyimpanan Barang Rusak</p>
        <div class="progress">
          <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>

  </div>
</div>



@endsection