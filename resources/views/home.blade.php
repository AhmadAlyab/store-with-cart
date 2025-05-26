<!DOCTYPE html>
<html lang="ar">
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.navbar')

     <!-- المنتجات -->
     <div class="container my-5">

        <div class="row">
            @foreach ($products as $product)
                <div class="col-6 col-md-6 col-lg-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/'.$product->profil_photo) }}" class="card-img-top" alt="منتج 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"><span class="new-price">{{ $product->price }} ل.س</span>
                                @if ($product->discount)
                                    <span class="old-price">{{ ($product->price - ($product->discount->value/100 ) * $product->price) }} ل.س</span>
                                @endif
                            </p>
                        </div>
                        <div class="card-footer">
                            <button class="add-to-cart btn btn-success" data-id="{{ $product->id }}">
                                🛒 أضف إلى السلة
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
