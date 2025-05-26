<!DOCTYPE html>
<html lang="ar">
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.navbar')

     <!-- cart view -->
     <div class="container my-5">

        <div class="row">
            @php
                $total = 0;
                $delivery = 3000;
            @endphp

            <div class="container mt-4">
                <h3 class="mb-4">🧾 الفاتورة</h3>
                    @csrf
                    <div class="border rounded p-3 bg-light">
                        @if (isset($items) && $items != [])
                            @foreach ($items as $item)
                                @php
                                    $subtotal = $item['price'] * $item['quantity'];
                                    $total += $subtotal;
                                @endphp
                                <div class="d-flex justify-content-around align-items-center mb-2">
                                    <div>
                                        <strong>{{ $item['name'] }}</strong> × {{ $item['quantity'] }}
                                    </div>
                                    <div>
                                        {{ number_format($subtotal) }} ل.س
                                    </div>
                                    <div>
                                        <a href="{{ route('cart.remove', ['id' => $item['id']]) }}" class="btn btn-danger btn-sm">
                                            أزالة
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                    <hr>
                    {{-- <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="deliveryCheckbox">
                        <label class="form-check-label" for="deliveryCheckbox">
                            إضافة تكلفة التوصيل ({{ number_format($delivery) }} ل.س)
                        </label>
                    </div> --}}

                    <h5 class="text-end">💰 المجموع: <span id="total">{{ number_format($total) }}</span> ل.س</h5>
                    <a href="{{ route('cart.info') }}" class="btn btn-success">اتمام الفاتورة</a>
                    <a href="{{ route('cart.clear') }}" class="btn btn-danger">افراغ السلة</a>

                        @else
                            <p class="text-center">السلة فارغة.</p>
                            <hr>
                        @endif
                  </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById("deliveryCheckbox").addEventListener("change", function () {
            let baseTotal = {{ $total }};
            let delivery = {{ $delivery }};
            let totalElement = document.getElementById("total");

            if (this.checked) {
                totalElement.textContent = (baseTotal + delivery).toLocaleString();
            } else {
                totalElement.textContent = baseTotal.toLocaleString();
            }
        });
    </script>

    @include('layouts.footer')


</body>



</html>
