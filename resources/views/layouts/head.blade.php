<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>  {{ \App\Models\Setting::first()->name_site }}</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- jQuery (Toastr يحتاجه) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<style>
    .old-price {
        text-decoration: line-through;
        color: red;
        display: block;
    }
    .new-price {
        font-weight: bold;
        color: green;
        font-size: 1.2em;
        display: block;
    }
</style>
