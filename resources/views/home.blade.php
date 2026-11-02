<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            body {
                font-family: Arial, sans-serif;
                max-width: 600px;
                margin: 60px auto;
                padding: 20px;
                background: #f8fafc;
            }

            .card {
                background: white;
                padding: 28px;
                border-radius: 12px;
                box-shadow: 0 4px 20px #0001;
            }

            button {
                padding: 10px 16px;
                margin-right: 8px;
                cursor: pointer;
                border: 0;
                border-radius: 6px;
                background: #1e3a8a;
                color: white;
            }

            input {
                display: block;
                width: 95%;
                padding: 10px;
                margin: 12px 0;
            }
        </style>
    @endif
</head>

<body class="">
    <div class="card">
        <button onclick="changeLanguage('en')">English</button>
        <button onclick="changeLanguage('bn')">বাংলা</button>

        <h1 id="welcome">Loading...</h1>
        <p id="description"></p>

        <form>
            <label id="nameLabel" for="name"></label>
            <input id="name" type="text">
            <button id="saveButton" type="submit"></button>
        </form>
    </div>

    <script>
        let currentLocale = 'en';

        async function changeLanguage(locale) {
            currentLocale = locale;

            try {
                const response = await fetch(
                    `/api/translations?locale=${locale}`
                );

                if (!response.ok) {
                    throw new Error('Failed to load translations');
                }

                const data = await response.json();
                const t = data.translations;

                document.documentElement.lang = data.locale;
                document.getElementById('welcome').textContent =
                    t.welcome ?? 'Welcome';

                document.getElementById('description').textContent =
                    t.description ?? '';

                document.getElementById('nameLabel').textContent =
                    t.name ?? 'Name';

                document.getElementById('saveButton').textContent =
                    t.save ?? 'Save';
            } catch (error) {
                console.error(error);
                alert('Unable to load translations');
            }
        }

        document.querySelector('form').addEventListener(
            'submit',
            function(event) {
                event.preventDefault();
                alert(
                    currentLocale === 'bn' ?
                    'সংরক্ষণ করা হয়েছে!' :
                    'Saved!'
                );
            }
        );

        changeLanguage('en');
    </script>
</body>

</html>
