@include('inc-back.header')
<body>
<div class="o-page">

    @include('inc-back.sidebar')

    <main class="o-page__content">

        @include('inc-back.nav')

        <div class="container">

            @yield('content')

        </div>

    </main>
</div>




@include('inc-back.footer')