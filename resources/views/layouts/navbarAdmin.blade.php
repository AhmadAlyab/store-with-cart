<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" dir="rtl">
    <div class="container">
        <!-- اللوجو واسم المتجر في المنتصف -->
        <div class="d-flex mx-auto justify-content-between">
            <img src="{{ asset('images/logo1.jpg') }}" alt="لوجو أزياء الأحمد" width="100" height="50" class="me-5">
            <a class="navbar-brand fs-3 fw-bold" href="{{ route('admin') }}">{{ \App\Models\Setting::first()->name_site }}</a>
        </div>

        <!-- زر القائمة للموبايل -->
        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- عناصر النافبار -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">📍 العنوان:  {{ \App\Models\Setting::first()->address }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">📞 الهاتف: {{ \App\Models\Setting::first()->phone }}</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-secondary" type="submit">
                            تسجيل خروج
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- ✅ الشريط الفرعي -->
<nav class="bg-light border-top border-bottom py-2" dir="rtl">
    <div class="container d-flex justify-content-start gap-4">
        <a href="{{ route('orders.index') }}" class="text-dark fw-bold text-decoration-none">
            <i class="fa-solid fa-box-open me-1"></i> الطلبات
        </a>
        <a href="{{ route('users.index') }}" class="text-dark fw-bold text-decoration-none">
            <i class="fa-solid fa-users me-1"></i> المستخدمين
        </a>
        <a href="{{ route('setting.index') }}" class="text-dark fw-bold text-decoration-none">
            <i class="fa-solid fa-gear me-1"></i> الأعدادات
        </a>
    </div>
</nav>
