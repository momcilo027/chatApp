@include('includes.header')
<div class="navbar">
    <div class="logo">
      <ul>
        <li><a href="/">Laravel ChatApp</a></li>
      </ul>
    </div>
    <div class="links">
      <ul>
        @auth
        <li><a href="/">Home</a></li>
        <li><a href="/user/{{auth()->user()->id}}/edit">{{auth()->user()->username}}</a></li>
        <li>
          <form action="/logout" method="POST">
            @csrf
            <button class="logOutBtn" type="submit">Log Out</button>
          </form>
        </li>
        @else
        <li><a href="/signup">Sign Up</a></li>
        <li><a href="/login">Log In</a></li>
        @endauth
      </ul>
    </div>
  </div>
