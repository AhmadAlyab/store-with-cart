<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>محل  {{ \App\Models\Setting::first()->name_site }} - تسجيل الدخول</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .store-name {
            font-size: 2rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }
        .login-container {
            max-width: 400px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .error-message {
            display: none;
            color: red;
            font-size: 0.9em;
            margin-bottom: 10px;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="store-name"> محل {{ \App\Models\Setting::first()->name_site }}  </div>

    <!-- نموذج تسجيل الدخول -->
    <div class="login-container">
        <h3 class="text-center">تسجيل الدخول</h3>
        @if (session('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label"> اسم المستخدم</label>
                <input type="email" class="form-control"
                id="email" placeholder="أدخل اسم المستخدم"
                name="email" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" class="form-control"
                 id="password" placeholder="أدخل كلمة المرور"
                 name="password" required>
                 <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
