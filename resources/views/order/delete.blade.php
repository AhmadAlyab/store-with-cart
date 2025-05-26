<!-- Modal -->
<div class="modal fade" id="deleteOrder{{ $invoice->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $invoice->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-end" dir="rtl">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel{{ $invoice->id }}">تأكيد حذف الفاتورة</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد أنك تريد حذف هذه الفاتورة؟ لا يمكن التراجع عن هذا الإجراء.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <form action="{{ route('order.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $invoice->id }}">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i> نعم، احذف
                    </button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
            </div>
        </div>
    </div>
</div>
