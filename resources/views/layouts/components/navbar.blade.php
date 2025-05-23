<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      {{-- <form action="/logout" method="POST">
        @csrf
        @method('POST') --}}
        <button type="button" class="btn btn-danger" data-target="#modal-logout" data-toggle="modal">
          Logout
        </button>
      {{-- </form> --}}
    </ul>
  </nav>
  <!-- /.navbar -->

@include('layouts.pages.auth.logout-confirmation')