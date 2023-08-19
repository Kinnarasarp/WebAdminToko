@extends('template.app')

@section('penjualan_active', 'active')

@section('title', 'Konfirmasi Checkout')

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
                    <h5 class="mb-0">Konfirmasi Checkout</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('prosesCheckout') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="no_order" class="form-label">Nomor Order</label>
                            <input type="text" name="no_order" id="no_order" class="form-control" value="{{ $penjualan->no_order }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="totalHarga" class="form-label">Total Harga</label>
                            <input type="number" name="totalHarga" id="totalHarga" class="form-control" value="{{ $totalHarga }}" readonly>
                        </div>
                        <!-- ... (hidden input fields for produk_id, harga, keuntungan, total) -->
                        <button type="submit" class="btn btn-primary">Confirm Transaction</button>
                    </form>


                    @foreach ($array_produks as $id)
                    @php
                    $item = App\Models\Produk::find($id);
                    @endphp
                    <input type="hidden" name="produk_id[]" value="{{ $id }}">
                    <input type="hidden" name="harga[]" value="{{ $item->harga_jual }}">
                    <input type="hidden" name="keuntungan[]" value="{{ $item->harga_jual - $item->harga_beli }}">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity for {{ $item->nama }}</label>
                        <input type="number" name="quantity[]" class="form-control" value="1" min="1" max="{{ $item->stok }}" required>
                    </div>
                    <div class="mb-3">
                            <label for="totalHarga" class="form-label">Total Harga</label>
                            <input type="number" name="totalHarga" id="totalHarga" class="form-control" value="{{ $totalHarga }}" readonly>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Confirm Transaction</button>
                    </form>

                    <!-- <div class="mb-3">
                        <label class="form-label">Subtotal for {{ $item->nama }}</label>
                        <input type="number" name="subtotal[]" class="form-control" value="{{ $item->harga_jual }}" readonly>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Confirm Transaction</button>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</section>
@section('script')
<script>
    function updateSubtotal(input, harga) {
        var jumlah = input.value;
        var subtotal = jumlah * harga;
        $(input).closest('tr').find('.subtotal').html(subtotal);
    }
</script>
@endsection