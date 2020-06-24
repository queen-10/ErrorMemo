<div class="user">
    <ul class="nav">
        @if (Auth::check())
        <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link">{{ Auth::user()->name }}</a>
        </li>
        @else
        <li class="nav-item">
            <a href="{{ url('/login') }}" class="nav-link">Login</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/register') }}" class="nav-link">Register</a>
        </li>
        @endif
    </ul>
</div>
<style>
    .user{
        margin-left: auto;
    }
    
    li a {
        color: #fff;
    }
</style>