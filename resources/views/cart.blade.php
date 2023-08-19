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
                      {{-- <div class="minus" style="font-size: 20px">
                        <button id="minus" class="decrement-btn"
                          style="border-bottom: 1px solid; padding-bottom: 10px; border: none; background-color: transparent; color: #696CFF">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-dash-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                          </svg>
                        </button>
                      </div> --}}
                      <input type="number" name="jumlah[]" value="1" min="1" max="{{ $item->stok }}"
                        class="form-control" id="qty-input" onchange="updateSubtotal(this, '{{ $item->harga_jual }}')">
                      {{-- <div class="plus" style="font-size: 20px">
                        <button id="plus" class="increment-btn"
                          style="padding-bottom: 10px; border: none; background-color: transparent; color: #696CFF">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path
                              d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                          </svg>
                        </button>
                      </div> --}}
                    </td>
                    <td class="subtotal">{{ $subtotal }}</td>
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

    // $(".increment-btn").click(function(e) {
    //   e.preventDefault();

    //   var inc_value = $('#qty-input').val();
    //   var value = parseInt(inc_value, 10);

    //   value = isNaN(value) ? 0 : value;
    //   if (value < 10) {
    //     value++;
    //     $('#qty-input').val(value);
    //   }
    // })

    // $(".decrement-btn").click(function(e) {
    //   e.preventDefault();

    //   var dec_value = $('#qty-input').val();
    //   var value = parseInt(dec_value, 10);
    //   var subtotal = $("#subtotal").val();

    //   value = isNaN(value) ? 0 : value;
    //   if (value > 1) {
    //     value--;
    //     $('#qty-input').val(value);
    //   }
    // })
  </script>
@endsection
