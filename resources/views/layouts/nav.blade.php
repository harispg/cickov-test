
      <nav class="navbar navbar-expand-md bg-light navbar-light">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="/">Artists geathering</a>

        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Register/Login</a>
          </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/artists">See them all</a>
        </li>
          @if(auth()->user())
        <li class="nav-item">
          <a class="nav-link" href="/logout">Log Out</a>
        </li>
        <li class="nav-item justify-content-end">
          <a class="nav-link" href="/register">{{auth()->user()->name}}</a>
        </li>
        <li class="nav-item justify-content-end">
          <a class="nav-link" href="/edit">Edit your account</a>
        </li>
          @endif

        </ul>
      </nav>
      <br>
