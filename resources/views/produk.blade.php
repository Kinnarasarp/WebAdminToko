@extends('template.app')

@section('title', 'Produk')

@section('produk_active', 'active')

@section('content')
<div class="card">
  <div class="d-flex justify-content-between align-items-center">
    <h4 class="card-header">@yield('title')</h4>
    <a href="{{ route('produk-create') }}" class="card-header">
      <button type="button" class="btn btn-success">Tambah Produk</button>
    </a>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Satuan</th>
          <th>Harga</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($produk as $item)
        <tr>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->satuan }}</td>
          <td>{{ $item->harga }}</td>
          <td>{{ $item->status }}</td>
          <td>
            <a href="{{ route('produk-show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
            <a href="{{ route('produk-edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('produk-destroy', $item->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <!-- Tambahkan kode pagination di sini -->
    <div class="mt-3">
      {{ $produk->links() }} <!-- Ini akan menampilkan link pagination -->
    </div>
  </div>
</div>
@endsection