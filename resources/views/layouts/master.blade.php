<!DOCTYPE html>
<html lang="en">
@include('partial.header')
<body>

<div class="jumbotron mb-0">
    <div class="container text-center">
        <h1>Transfer System</h1>
        <p></p>
    </div>
</div>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a href="{{ route('login') }}" class="navbar-brand"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav float-right">

            @auth

                <li class="nav-item"><a class="nav-link {{ Route::currentRouteNamed('home') ? 'active' : ''  }}" href="{{ route('home') }}">Home</a></li>

                <li class="nav-item"><a class="nav-link {{ Route::currentRouteNamed('orders') ? 'active' : ''  }}" href="{{ route('transfers') }}">Create a transfer</a></li>

                <li class="nav-item"><a class="nav-link {{ Route::currentRouteNamed('editUser') ? 'active' : ''  }}" href="{{route('history')}}"> Transfer History</a></li>

                <li class="nav-item"><a class="nav-link {{ Route::currentRouteNamed('logout') ? 'active' : ''  }}" href="{{route('logout')}}"> Logout</a></li>

            @else
                <li class="nav-item"><a class="nav-link {{ Route::currentRouteNamed('home') ? 'active' : ''  }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ Route::currentRouteNamed('login') ? 'active' : ''  }}" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link {{ Route::currentRouteNamed('register') ? 'active' : ''  }}" href="{{ route('register') }}">Register</a></li>
        @endauth
    </div>
</nav>

@yield('content')

</body>
</html>
