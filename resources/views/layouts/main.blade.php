@php
    session()->start();

@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!--   Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />


    <link rel="stylesheet" href="{{ asset('assets/fonts/inter/inter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">

    <link rel="stylesheet" href="{{ asset('dist-assets/select2/css/select22.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist-assets/select2-bootstrap4-theme/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist-assets/css/toastr.min.css') }}">


    <!-- preloader css-->
    <link rel="stylesheet" href="{{ asset('dist-assets/css/preloader.css') }}" />
    <!-- favicon -->
    <link href="{{ asset('dist-assets/css/flatpickr.min.css') }}" rel="stylesheet">

    <!-- Icons fontawesome
        ============================================ -->

    <link rel="stylesheet" href="{{ asset('css/icons/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-assets/css/preloader.css')}}" />

    <!-- Script geral -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('dist-assets/js/scripts/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('dist-assets/js/scripts/sweetalert.script.min.js') }}"></script>
    <script src="{{ asset('dist-assets/select2/js/lodash.min.js') }}"></script>
    <script src="{{ asset('dist-assets/select2/js/select22.min.js') }}"></script>
    <script src="{{ asset('dist-assets/js/toastr.min.js') }}"></script>


    {{--  pdf  --}}
    <script src="{{ asset('pdf/js/VentanaCentrada.js') }}"></script>
    <script src="{{ asset('pdf/js/pdf.js') }}"></script>
    <script src="{{ asset('dist-assets/js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/api_queries.js') }}"></script>

    <script>
        document.addEventListener("wheel", function(event) {}, {
            passive: true
        });
    </script>


    <!-- Bootstrap js E CSS normal
  ============================================ -->

    <title>@yield('title')</title>


</head>

<body class="text-left">
    <!-- Start preloader -->
    <div class="loader-bg">
        <div class="loader-p"></div>
    </div>

    @yield('content')

    <script src="{{ asset('assets/js/tech-stack.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/i18next.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/i18nextHttpBackend.min.js') }}"></script>
    <script src="{{ asset('assets/js/icon/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/multi-lang.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    <script>
        layout_change("light");
    </script>
    <script>
        change_box_container("false");
    </script>
    <script>
        layout_caption_change("true");
    </script>
    <script>
        layout_rtl_change("false");
    </script>
    <script>
        preset_change("preset-1");
    </script>
    <script>
        main_layout_change("vertical");
    </script>


    @yield('scripts')




</body>

</html>
