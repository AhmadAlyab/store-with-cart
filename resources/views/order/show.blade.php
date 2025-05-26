<!DOCTYPE html>
<html lang="ar">
<head>
  @include('layouts.head')
</head>
<body>
    @include('layouts.navbarAdmin')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container my-4" dir="rtl">
        <h3 class="mb-3">قائمة الطلبات</h3>

        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>المادة</th>
                    <th>العدد</th>
                    <th>السعر</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->quantity * $order->product->price  }}</td>
                          <td>
                            <button class="btn btn-outline-danger btn-sm" data-bs-target="#deleteOrder{{$order->id}}" data-bs-toggle="modal"
                             title="حذف الطلب">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <button class="btn btn-outline-success btn-sm" data-bs-target="#editOrder{{$order->id}}" data-bs-toggle="modal"
                                title="تعديل الطلب">
                                   <i class="fa-solid fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    @include('order.update')
                    @include('order.deleteItem')
                @empty
                    <tr>
                        <td colspan="6">لا توجد مواد حالياً</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    @include('layouts.footer')

</body>
</html>
