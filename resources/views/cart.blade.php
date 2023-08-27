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
                <form action="{{ route('confirmpenjualan') }}" method="POST">
                  @csrf
                  @foreach ($array_produks as $id)
                    @php
                      $item = App\Models\Produk::find($id);
                      
                      $subtotal = $item->harga_jual;
                    @endphp
                    <tr>
                      <td>{{ $item->nama }}</td>
                      <td id="stok_{{ $item->id }}" data-stok="{{ $item->stok }}">{{ $item->stok }}</td>
                      <td>{{ $item->satuan }}</td>
                      <td>@currency($item->harga_jual)</td>
                      <td class="d-flex justify-content-center" style="gap: 10px;">
                        <input type="number" name="jumlah[]" value="1" min="1" max="{{ $item->stok }}"
                          class="form-control" id="qty-input_{{ $item->id }}"
                          onchange="updateSubtotal(this, '{{ $item->harga_jual }}', '{{ $item->id }}')">
                      </td>
                      <td>@currency($subtotal)</td>
                      <input type="hidden" class="subtotal" id="hidden_subtotal_{{ $item->id }}"
                        value="{{ $subtotal }}">
                    </tr>
                    <input type="hidden" name="produk_id[]" value="{{ $item }}">
                  @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-end mt-4">
              <button type="button" class="btn btn-primary" id="konfirmasi" data-bs-toggle="modal"
                data-bs-target="#modalCenter">
                Konfirmasi
              </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">Total harga</label>
                        <input disabled type="text" id="totalharga" class="form-control" placeholder="Jumlah Produk" />
                        <input type="hidden" id="totalharga1" name="total">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Konfirmasi Pembelian</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    function updateSubtotal(input, harga, id) {
      $(document).ready(function() {
        var value = $(input).val();
        var stok = $('#stok_' + id).attr('data-stok');
        if ((value !== '') && (value.indexOf('.') === -1)) {
          $(input).val(Math.max(Math.min(value, stok), -stok));
        }
        var jumlah = input.value;
        var subtotal = jumlah * harga;
        $('#hidden_subtotal_' + id).val(subtotal);

        input.parentNode.nextElementSibling.innerHTML = 'Rp' + subtotal.toLocaleString('id-ID');
      });
    }

    $('#konfirmasi').click(function(e) {
      e.preventDefault();
      var subtotal = document.querySelectorAll('.subtotal');
      var total = 0;

      $.each(subtotal, function(indexInArray, element) {
        total += parseFloat(element.value);
        console.log(element.value);
      });

      console.log(total);

      $('#totalharga').val('Rp' + total.toLocaleString('id-ID'));
      $('#totalharga1').val(total);
    });
  </script>
@endsection
