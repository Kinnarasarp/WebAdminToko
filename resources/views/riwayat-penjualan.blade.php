@extends('template.app')

@section('riwayat_active', 'active')

@section('title', 'Riwayat Penjualan')

@section('content')
<section>
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Riwayat Penjualan</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Produk Terjual</th>
                <th>Harga Jual</th>
                <th>Subtotal</th>
                <th>Tanggal Transaksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaksiHistory as $index => $transaksi)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaksi->produk->nama }}</td> <!-- Accessing related product's name -->
                <td>{{ $transaksi->quantity }}</td>
                <td>{{ $transaksi->harga }}</td>
                <td>{{ $transaksi->quantity * $transaksi->harga }}</td> <!-- Calculate Subtotal -->
                <td>{{ $transaksi->created_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
