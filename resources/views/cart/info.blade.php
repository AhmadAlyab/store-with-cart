<!DOCTYPE html>
<html lang="ar">
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.navbar')

     <!-- information for user -->
     <div class="container my-5">

        <div class="row">
            <form action="{{ route('order.save') }}" method="POST" class="mt-4" dir="rtl">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">الاسم الكامل</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">رقم الهاتف</label>
                    <input type="number" name="phone" id="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">العنوان</label>
                    <textarea name="address" id="address" rows="3" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-success w-100">📦 تأكيد الطلب</button>
            </form>

        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
