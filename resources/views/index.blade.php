<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <title>{{ \Config::get('app.name') }}</title>
        <meta name="description" content="{{ \Config::get('app.desc') }}">
        <meta name="keywords" content="{{ \Config::get('app.keywords') }}">
        <meta property="og:title" content="{{ \Config::get('app.name') }}" />
        <meta property="og:description" content="{{ \Config::get('app.desc') }}" />
        <meta property="og:site_name" content="{{ \Config::get('app.name') }}" />
        <meta name="twitter:title" content="{{ \Config::get('app.name') }}" />
        <link rel="icon" href="/favicon.ico">
        <script>
            window.csrf = "{{ csrf_token() }}";
            window.app_url = "{{ \Config::get('app.url') }}";
        </script>
    </head>
    <body>
        <div id="app">
            <router-view></router-view>
        </div>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="/js/app.js"></script>
    </body>
</html>
