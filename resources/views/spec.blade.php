<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Raffle Spec</title>
</head>
<body>
    <redoc spec-url="{{ url('/raffle-api-spec/reference/raffle-api.json') }}"></redoc>
    <script src="/js/vendor/redoc.standalone.js"></script>
</body>
</html>
