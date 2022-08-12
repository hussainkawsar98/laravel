@include('layout.backend.header')
@include('layout.backend.top-bar')
@include('layout.backend.left-sidebar')

<div id="main-content">
  @yield('main-content')
</div>

@include('layout.backend.footer-bottom')
@include('layout.backend.footer-link')