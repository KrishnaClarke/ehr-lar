<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'EHR Demo')</title>
  <link rel="stylesheet" href="/css/maicons.css">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="/vendor/animate/animate.css">
  <link rel="stylesheet" href="/css/theme.css">
</head>
<body>
<header>
  <div class="topbar">
    <div class="container">
      <div class="text-sm">
        <span class="mai-shield-checkmark text-primary"></span>
        Portfolio demo &middot; every patient, doctor and nurse here is randomly generated and fictional.
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/"><span class="text-primary">EHR</span>-Health</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupport">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="/">Home</a></li>
          <li class="nav-item {{ request()->is('statistics') ? 'active' : '' }}"><a class="nav-link" href="/statistics">Dashboard</a></li>
          <li class="nav-item {{ request()->is('patients*') ? 'active' : '' }}"><a class="nav-link" href="/patients">Patients</a></li>
          <li class="nav-item {{ request()->is('doctors*') ? 'active' : '' }}"><a class="nav-link" href="/doctors">Doctors</a></li>
          <li class="nav-item {{ request()->is('nurses*') ? 'active' : '' }}"><a class="nav-link" href="/nurses">Nurses</a></li>
          <li class="nav-item {{ request()->is('beds*') ? 'active' : '' }}"><a class="nav-link" href="/beds">Beds</a></li>
          <li class="nav-item {{ request()->is('update*') ? 'active' : '' }}"><a class="nav-link" href="/updates">Unassign</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<main class="container py-4">
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @yield('content')
</main>

<footer class="page-footer">
  <div class="container text-center py-3">
    <p class="mb-0">EHR Demo &middot; a Laravel portfolio project. Not for real medical data.</p>
  </div>
</footer>

<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="/vendor/wow/wow.min.js"></script>
<script src="/js/theme.js"></script>
</body>
</html>
