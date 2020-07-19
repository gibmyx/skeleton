<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vue SPA API</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/plantilla.css') }}" rel="stylesheet">
    <style>
        .full-screan{
            width: 100%;
            height: 100vh;
        }
    </style>
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden" >
<div id="app" class="full-screan">
    <router-view name="header" v-show="loggedIn"></router-view>
    <div class="app-body" v-show="loggedIn">
        <sidebar></sidebar>
        <router-view></router-view>
    </div>
    <app v-show="!loggedIn"></app>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/plantilla.js') }}"></script>
</body>
</html>
