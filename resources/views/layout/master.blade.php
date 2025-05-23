<!DOCTYPE html>
<html lang="en">

<head>
  @include('bagian.header')
</head>

<body class="index-page">

  @include('bagian.navbar')
  <main>
    @yield('isi')
  </main>

  @include('bagian.footer')
  @stack('scripts')
</body>

</html>