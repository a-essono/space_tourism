<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administation de space_tourism</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 max-w-4xl">
        <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
<h1 class="text-2xl font-bold mt-10">{{ $title }}</h1>
{{ $slot }}
    </div>
</body>
</html>