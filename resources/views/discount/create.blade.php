<!-- Modal -->
<div class="modal fade" id="addDiscount{{$product->id}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">إضافة خصم جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('discount.add') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <label for="value" class="form-label">قيمة الخصم</label>
                        <input type="number" class="form-control" name="value" id="value" required>
                    </div>
                    <button type="submit" class="btn btn-success">حفظ الخصم</button>
                </form>
            </div>
        </div>
    </div>
</div>

