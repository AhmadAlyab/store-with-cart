<!-- Modal -->
<div class="modal fade" id="editOrder{{$order->id}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">تعديل الكمية</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('order.edit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <input type="hidden" name="order_id" value="{{ $order->order->id }}">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">العدد</label>
                        <input type="number" class="form-control" name="quantity"
                        value="{{ $order->quantity }}" id="quantity" required>
                    </div>
                    <button type="submit" class="btn btn-success">حفظ الخصم</button>
                </form>
            </div>
        </div>
    </div>
</div>
