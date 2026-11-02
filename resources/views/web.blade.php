<!DOCTYPE html>
<html lang="{{ $locale }}">

<head>
    <meta charset="UTF-8">
    <title>{{ $translations['welcome'] ?? 'Welcome' }}</title>
</head>

<body>
    <h1>{{ $translations['welcome'] ?? 'Welcome' }}</h1>

    <p>
        {{ $translations['description'] ?? 'Welcome to our website' }}
    </p>

    <a href="/web?locale=en">English</a>
    <a href="/web?locale=bn">বাংলা</a>
</body>

</html>
