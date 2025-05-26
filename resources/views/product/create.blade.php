<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">إضافة منتج جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المنتج</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">السعر</label>
                        <input type="number" class="form-control" name="price" id="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="productImage" class="form-label">تحميل صورة المنتج</label>
                        <input type="file" class="form-control" id="productImage"
                         name="productImage" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-success">حفظ المنتج</button>
                </form>
            </div>
        </div>
    </div>
</div>
