<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title>@yield('title')</title>
</head>

<body>
  <header class="p-3 text-bg-dark mb-2">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 text-white">Главная</a></li>
          <li><a href="/price" class="nav-link px-2 text-white">Цены</a></li>
          <li><a href="/faqs" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="/about" class="nav-link px-2 text-white">Про нас</a></li>
          <li><a href="/review" class="nav-link px-2 text-white">Отзывы</a></li>
          <li><a href="/book" class="nav-link px-2 text-white">Телефонная книжка</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="get" action="{{ route('search') }}">
          <input type="search" id="s" name="s" class="form-control form-control-dark text-bg-dark" placeholder="Поиск..." aria-label="Search">
        </form>

        <div class="text-end">
          <a href="{{ route('login') }}">
            <button type="button" class="btn btn-outline-light me-2">Login</button>
          </a>
          <a href="{{ route('register') }}">
            <button type="button" class="btn btn-warning">Sign-up</button>
          </a>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    @yield('main_content')
  </div>
</body>

</html>