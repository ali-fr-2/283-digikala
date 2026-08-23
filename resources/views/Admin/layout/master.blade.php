<!doctype html>
<html lang="en">

@include('admin.layout.head-tag')

<body>

    @include('admin.layout.loader')
    @include('admin.layout.navbar-part-one')
    @include('admin.layout.navbar-part-two')
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>


        @include('admin.layout.sidebar')

        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                @yield('content')

                @include('admin.layout.footer')
            </div>
        </div>

        @include('admin.layout.js')
    </div>

</body>



</html>
