<!DOCTYPE html>
<html lang="ar">
<head>
  @include('layouts.head')
</head>
<body>
    @include('layouts.navbarAdmin')
    <!-- زر إضافة منتج -->
    <div class="container text-center my-4">
        <button class="btn btn-success" data-bs-toggle="modal"
        data-bs-target="#addProduct">
            ➕ إضافة منتج
        </button>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('product.create')
    <!-- المنتجات -->
    <div class="container my-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-6 col-md-6 col-lg-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/'.$product->profil_photo) }}" class="card-img-top" alt="منتج 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->name }}</h5>
                                @if ($product->discount)
                                <p class="card-text"><span class="new-price">
                                    {{ ($product->price - ($product->discount->value/100 ) * $product->price) }} ل.س</span>

                                    <span class="old-price">{{ $product->price }} ل.س</span>
                                    <button class="btn btn-outline-danger btn-sm"
                                        data-bs-target="#deleteDiscount{{$product->id}}"
                                        data-bs-toggle="modal"
                                        title="حذف الخصم">
                                           <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <button class="btn btn-outline-success btn-sm"
                                        data-bs-target="#editDiscount{{$product->id}}"
                                        data-bs-toggle="modal"
                                    title="تعديل الخصم">
                                       <i class="fa-solid fa-edit"></i>
                                    </button>
                                    @include('discount.update')
                                    @include('discount.delete')

                                @else
                                <p class="card-text"><span class="new-price">{{ $product->price }} ل.س</span>

                                <button class="btn btn-warning m-1" data-bs-toggle="modal"
                                data-bs-target="#addDiscount{{$product->id}}">إضافة خصم</button>

                                @endif
                            </p>
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editProduct{{$product->id}}">
                                تعديل
                            </button>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteProduct{{$product->id}}">
                                حذف
                            </button>
                        </div>
                    </div>
                </div>
                @include('product.update')
                @include('product.delete')
                @include('discount.create')

            @endforeach
        </div>
    </div>

    @include('layouts.footer')

</body>
</html>
