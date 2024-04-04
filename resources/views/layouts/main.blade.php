<!DOCTYPE html>
<html lang="az" dir="ltr">
  @include('partials.head')
  <body>
    <div id="body">
      @include('partials.burger')
      @include('partials.header')
      @yield('content')
      @include('partials.footer')
    </div>
  @include('partials.footer_scripts')
  </body>
</html>
