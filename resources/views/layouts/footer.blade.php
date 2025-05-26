     <!-- المعلومات العامة -->
     <footer class="bg-dark text-white text-center py-3">
        <p>📍 العنوان: {{ \App\Models\Setting::first()->address }} | 📞 الهاتف: {{ \App\Models\Setting::first()->phone }}</p>
        <p>جميع الحقوق محفوظة &copy; 2025   {{ \App\Models\Setting::first()->name_site }}</p>
    </footer>

    <script>
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @elseif(session('error'))
            toastr.error("{{ session('error') }}");
        @elseif(session('info'))
            toastr.info("{{ session('info') }}");
        @elseif(session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- update the number of items in the cart --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateCartCount() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                method: "GET",
                success: function(response) {
                    $("#cart-count").text(response.count);
                }
            });
        }

        // تحديث العدّاد عند تحميل الصفحة
        $(document).ready(function() {
            updateCartCount();
        });

    </script>

    <script>
        $(document).on("click", ".add-to-cart", function() {
            let productId = $(this).data("id");

            $.ajax({
                url: "{{ route('cart.add') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: productId
                },
                success: function(response) {
                    updateCartCount(); // تحديث عداد السلة مباشرة
                }
            });
        });
    </script>


