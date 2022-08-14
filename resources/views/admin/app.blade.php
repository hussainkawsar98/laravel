@include('layout.admin.header')
@include('layout.admin.top-bar')
@include('layout.admin.left-sidebar')

<div id="main-content">
  @yield('main-content')
</div>

@include('layout.admin.footer-bottom')
@include('layout.admin.footer-link')