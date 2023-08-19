@extends('template.app')

@section('penjualan_active', 'active')

@section('title', 'Web Toko')

@section('content')
<section>
  <div class="my-2">
    <a href="{{ route('penjualan') }}" class="text-decoration-none text-black">
      <div class="back-button d-flex align-items-center">
        <i class='bx bx-chevron-left'></i>
        <p class="m-0">Back</p>
      </div>
    </a>
  </div>
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Cart</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Harga Jual</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($array_produks as $id)
              @php
              $item = App\Models\Produk::find($id);
              $subtotal = $item->harga_jual;
              @endphp
              <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->harga_jual }}</td>
                <td class="d-flex justify-content-center" style="gap: 10px;">
                  <input type="number" name="jumlah[]" value="1" min="1" max="{{ $item->stok }}" class="form-control" id="qty-input" onchange="updateSubtotal(this, '{{ $item->harga_jual }}')">
                </td>
                <td class="subtotal">{{ $subtotal }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Launch modal
          </button>
          <!-- Modal -->
          <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Jumlah Produk</label>
                      <input disabled type="text" id="nameWithTitle" class="form-control" placeholder="Jumlah Produk" />
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function updateSubtotal(input, harga) {
    var jumlah = input.value;
    var subtotal = jumlah * harga;
    input.parentNode.nextElementSibling.innerHTML = subtotal;
  }

  $('input').on('input', function() {
    var value = $(this).val();
    if ((value !== '') && (value.indexOf('.') === -1)) {
      $(this).val(Math.max(Math.min(value, 90), -90));
    }
  });
</script>
@endsection