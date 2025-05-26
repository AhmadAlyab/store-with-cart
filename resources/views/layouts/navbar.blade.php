<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" dir="rtl">
    <div class="container">
        <!-- اللوجو واسم المتجر في المنتصف -->
        <div class="d-flex mx-auto justify-content-between">
            <img src="{{ asset('images/logo1.jpg') }}" alt="لوجو أزياء الأحمد" width="100" height="50" class="me-5">
            <a class="navbar-brand fs-3 fw-bold" href="{{ route('home') }}">{{ \App\Models\Setting::first()->name_site }}</a>
        </div>

        <!-- زر القائمة للموبايل -->
        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- زر سلة المشتريات بجانب زر القائمة -->
        <a class="nav-link position-relative text-white me-2" href="{{ route('cart.view')}}">
            🛒 السلة
            <span id="cart-count" class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                 0
            </span>
        </a>

        <!-- عناصر النافبار -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">📍 العنوان: {{ \App\Models\Setting::first()->address }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">📞 الهاتف: {{ \App\Models\Setting::first()->phone }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
