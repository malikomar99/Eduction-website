<!DOCTYPE html>
<html @yield('html_attribute')>

<head>
    @include('layouts.partials/title-meta')

    @include('layouts.partials/head-css')

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('css/image-upload.css') }}">
    {{-- select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>


</head>

@include('layouts.partials/body')

<div id="app-layout">

    @include('layouts.partials/topbar')

    @include('layouts.partials/sidebar')


    <div class="content-page">
        <div class="content">

            @yield('content')

        </div>
        @include('layouts.partials/footer')
    </div>

</div>
@include('layouts.partials/vendor')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
@if (session('error'))
        Toastify({
            text: "{{ session('error') }}",
            duration: 4000,
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center`, or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #FF6F61, #D32F2F)", // Premium red gradient for error
                color: "#fff",  // White text color for contrast
                padding: "10px 20px",
                borderRadius: "8px",
                fontSize: "16px",
                boxShadow: "0px 4px 10px rgba(0, 0, 0, 0.1)"
            },
            onClick: function(){} // Callback after click
        }).showToast();
@elseif (session('success'))

        Toastify({
            text: "✔ {{ session('success') }}", // Adding checkmark icon for success
            duration: 4000,
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center`, or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)", // Premium green gradient for success
                color: "#fff",  // White text color for contrast
                padding: "10px 20px",
                borderRadius: "8px",
                fontSize: "16px",
                boxShadow: "0px 4px 10px rgba(0, 0, 0, 0.1)"
            },
            onClick: function(){} // Callback after click
        }).showToast();

        @elseif (session('message'))
        Toastify({
            text: "{{ session('message') }}", // Show generic message from session
            duration: 4000,
            newWindow: true,
            close: true,
            gravity: "top", // Position from top
            position: "right", // Position from right
            stopOnFocus: true, // Prevents dismissing on hover
            style: {
                background: "linear-gradient(to right, #ffffff, #f0f0f0)", // Premium white gradient
                color: "#333",  // Dark text for contrast
                padding: "12px 25px",
                borderRadius: "12px",
                fontSize: "16px",
                boxShadow: "0px 4px 12px rgba(0, 0, 0, 0.1)"
            },
            onClick: function(){} // Callback after click
        }).showToast();
    
@endif

    </script>
@stack('js')
</body>

</html>
