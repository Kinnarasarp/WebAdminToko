@extends('template.app')

@section('riwayat_active', 'active')

@section('title', 'Riwayat Penjualan')

@section('content')
  <section>
    <div class="row">
      <div class="col-xxl">

        @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="card mb-4">
          <div class="card-header">
            <h5 class="mb-0">Riwayat Penjualan</h5>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="riwayatTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Order</th>
                  <th>Nama Produk</th>
                  <th>Produk Terjual</th>
                  <th>Harga Jual</th>
                  <th>Subtotal</th>
                  <th>Tanggal Transaksi</th>
                </tr>
              </thead>
              <tbody>
                {{-- @dd($transaksiHistory) --}}
                @foreach ($transaksiHistory as $index => $transaksi)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaksi->penjualan_no_order }}</td>
                    <td>{{ $transaksi->produk->nama }}</td> <!-- Accessing related product's name -->
                    <td>{{ $transaksi->quantity }}</td>
                    <td>@currency($transaksi->harga)</td>
                    <td>@currency($transaksi->quantity * $transaksi->harga)</td> <!-- Calculate Subtotal -->
                    <td>{{ $transaksi->created_at->addHour(7) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
      $("#riwayatTable").DataTable()
    });
  </script>
@endsection
