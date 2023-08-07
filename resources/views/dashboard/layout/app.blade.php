@include('dashboard/layout/head')

<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">

    <!-- sidenav  -->
    @include('dashboard/layout/sidebar')

    <!-- end sidenav -->


    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <!-- Navbar -->

        @include('dashboard/layout/navigation')

        <!-- end Navbar -->

        <!-- cards -->
        @yield('content')

        <!-- end cards -->
    </main>


   @include('dashboard/layout/setting')
</body>

@include('dashboard/layout/footer')
