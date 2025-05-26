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
        <h3 class="mb-3">قائمة المستخدمين</h3>

        <!-- Button to trigger modal -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="fa-solid fa-user-plus"></i> مستخدم جديد
        </button>

        @include('user.create')
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم </th>
                    <th>الأيميل</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button class="btn btn-outline-success btn-sm" data-bs-target="#ediUser{{$user->id}}"
                                 data-bs-toggle="modal"
                             title="تعديل مستخدم">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            <button class="btn btn-outline-danger btn-sm" data-bs-target="#deleteUser{{$user->id}}"
                                data-bs-toggle="modal"
                            title="حذف مستخدم">
                               <i class="fa-solid fa-trash"></i>
                           </button>

                       </td>
                    </tr>
                    @include('user.delete')
                    @include('user.edit')
                @empty
                    <tr>
                        <td colspan="4">لا توجد مستخدمين حالياً</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    @include('layouts.footer')

</body>
</html>
