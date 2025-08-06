<!DOCTYPE html>
<html @yield('html_attribute')>

<head>
    @include('layouts.partials/title-meta')

    @include('layouts.partials/head-css')
</head>

<body @yield('bidy_attribute')>

    @yield('content')

    @include('layouts.partials/vendor')

</body>

</html>