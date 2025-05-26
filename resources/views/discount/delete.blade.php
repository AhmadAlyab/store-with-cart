<!-- Modal -->
<div class="modal fade" id="deleteDiscount{{$product->id}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">حذف الخصم</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('discount.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $product->discount->id }}">
                    <div class="mb-3">
                        <input type="text" value="هل انت متاكد من حذف الخصم"  class="form-control"
                        name="name" id="name" readonly required>
                    </div>
                    <button type="submit" class="btn btn-success">حذف الخصم</button>
                </form>
            </div>
        </div>
    </div>
</div>
