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
                  <th>Satuan</th>
                  <th>Harga Jual</th>
                  <th>Subtotal</th>
                  <th>Tanggal Transaksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($penjualanHistory as $index => $penjualan)
                  @php
                    $produkTerjual = 0;
                    foreach ($penjualanHistory as $penjualan) {
                        $produkTerjual += $penjualan->transaksi->quantity;
                    }
                  @endphp
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $penjualan->produk->nama }}</td>
                    <td>{{ $produkTerjual }}</td>
                    <td>{{ $penjualan->produk->satuan }}</td>
                    <td>{{ $penjualan->produk->harga_jual }}</td>
                    <td>{{ $penjualan->transaksi->subtotal }}</td>
                    <td>{{ $penjualan->created_at }}</td>
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
