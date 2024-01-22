<nav class="navbar navbar-expand-lg" style="background-color:navy ">
    <a href="{{route('home')}}" class="nav-link text-light">Home</a>
    @guest
    <a href="{{route('login')}}" class="nav-link text-light">Login</a>
    @else
    <form action="{{route('logout')}}" method="get">

    </form>
    @endguest
</nav>