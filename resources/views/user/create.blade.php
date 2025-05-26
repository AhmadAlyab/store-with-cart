<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" dir="rtl">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">إضافة مستخدم</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nameModal" class="form-label">الاسم</label>
                        <input type="text" class="form-control" id="nameModal" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="emailModal" class="form-label">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="emailModal" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="passwordModal" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" id="passwordModal" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="passwordModal" class="form-label"> تاكيد كلمة المرور</label>
                        <input type="password" class="form-control" id="passwordModal" name="password_confirmation" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-plus"></i> حفظ
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
