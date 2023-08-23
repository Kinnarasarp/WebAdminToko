@extends('template.app')

@section('title', 'Produk')

@section('produk_active', 'active')

@section('content')
  <style>
    th,
    td {
      text-align: center;
    }
  </style>
  @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <div class="card">
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="card-header">@yield('title')</h4>
      <a href="{{ route('produk-create') }}" class="card-header">
        <button type="button" class="btn btn-success">Tambah Produk</button>
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-striped" id="produkTable">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Stok</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($produk as $item)
              <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->stok }} {{ $item->satuan }}</td>
                <td>@currency($item->harga_beli)</td>
                <td>@currency($item->harga_jual)</td>
                <td>
                  @if ($item->stok == 0)
                    <span class="badge bg-label-danger">Habis</span>
                  @elseif($item->stok < 5)
                    <span class="badge bg-label-warning">Menipis</span>
                  @else
                    <span class="badge bg-label-success">Tersedia</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('produk-edit', $item->id) }}" class="btn btn-md btn-warning">Edit</a>
                  {{-- <form action="{{ route('produk-destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE') --}}
                  <button type="submit" class="btn btn-md btn-danger" data-bs-toggle="modal"
                    data-bs-target="#modalCenter"
                    onclick="delete_produk('{{ $item->id }}', `{{ route('produk-destroy', $item->id) }}`)">Delete</button>
                  {{-- </form> --}}
                </td>
              </tr>
            @endforeach

            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="modalCenterTitle">Delete Produk</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col mb-3">
                        <h5 style="text-align: center;">Apakah Anda Yakin Akan Menghapus Produk Ini?</h5>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                      </button>
                      <form id="formDelete" method="post" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ya</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </tbody>
        </table>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        $("#produkTable").DataTable()
      });

      function delete_produk(id, url) {
        console.log(url);
        $('#modalCenter').modal('show');
        $('#formDelete').attr('action', url);
      }
    </script>
  @endsection
