<nav class="navbar navbar-expand-lg navbar-light bg-light px-5 mb-5">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <!-- Add more links here if needed -->
    </div>

    @auth
      <div class="navbar-nav ml-auto d-flex align-items-center">
        <span class="nav-item nav-link">{{ Auth::user()->name }}</span>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-link nav-item nav-link" style="padding: 0;">Logout</button>
        </form>
      </div>
    @endauth
  </div>
</nav>
