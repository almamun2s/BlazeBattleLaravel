<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blaze Battles</title>

    <!-- inserting favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo.jpeg')}}" type="image/x-icon">
    <!-- inserting all css files -->
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/re_login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/team.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/all.min.css') }}">

</head>
<body>

    <!-- ==================================== Header Section ====================================  -->
    <header class="bb-header">
        <div class="bb-container">
            <div class="bb-header-inner">
                <div class="bb-header-logo">
                    <a href="/">
                        <img src="{{ asset('img/logo.jpeg')}}" alt="logo">
                    </a>
                </div>
                <div class="bb-header-menu">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="teams">Teams</a></li>
                        {{-- <li><a href="#">Achivement</a></li> --}}
                    </ul>
                </div>
                <div class="bb-header-pp-btn">
                    <ul>
                        @auth
                            <li><a href="profile"><i class="fas fa-user"></i> Profile</a></li>
                            <li><a href="logout"><i class="fas fa-door-open"></i> Log out</a></li>
                        @endauth
                        @guest
                            <li><a href="login"><i class="fas fa-user"></i> Log in</a></li>
                            <li><a href="register"><i class="fas fa-user-plus"></i> sign up</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </header>
