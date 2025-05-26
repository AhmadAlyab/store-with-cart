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
        <div class="container mt-5">
            <div class="card shadow p-4">
                <h4 class="mb-4 text-center">📋 إعدادات الموقع</h4>
                <form action="{{ route('setting.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $settings->id }}">
                    <div class="mb-3">
                        <label for="name_site" class="fw-bold">اسم الموقع:</label>
                        <input type="text" class="form-control m-2"
                        name="name_site" id="name_site" value="{{ $settings->name_site }}">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="fw-bold">العنوان:</label>
                        <input type="text" class="form-control m-2"
                        name="address" id="address" value="{{ $settings->address }}">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="fw-bold">رقم الهاتف:</label>
                        <input type="text" class="form-control m-2"
                        name="phone" id="phone" value="{{ $settings->phone }}">
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="حفظ" class="btn btn-success">
                    </div>
                </form>

            </div>
        </div>

    </div>


    @include('layouts.footer')

</body>
</html>
