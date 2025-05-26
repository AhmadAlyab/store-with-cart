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
        <h3 class="mb-3">قائمة الفواتير</h3>

        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم الكامل</th>
                    <th>العنوان</th>
                    <th>رقم الهاتف</th>
                    <th>قيمة الفاتورة</th>
                    <th>تاريخ الفاتورة</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $index => $invoice)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $invoice->name }}</td>
                        <td>{{ $invoice->address }}</td>
                        <td>{{ $invoice->phone }}</td>
                        <td>{{ $invoice->amount }}</td>
                        <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                        <td>
                            <button class="btn btn-outline-danger btn-sm" data-bs-target="#deleteOrder{{$invoice->id}}" data-bs-toggle="modal"
                             title="حذف الفاتورة">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <a class="btn btn-outline-warning btn-sm" href="{{ route('order.show',['id' => $invoice->id ]) }}" title="عرض الفاتورة">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @include('order.delete')
                @empty
                    <tr>
                        <td colspan="7">لا توجد فواتير حالياً</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    @include('layouts.footer')

</body>
</html>
