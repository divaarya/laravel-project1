<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-900 text-white flex">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-800 min-h-screen p-5">
        <h2 class="text-2xl font-bold mb-6">Flowbite</h2>
        <ul class="space-y-3">
            <li><a href="/dashboard" class="hover:text-blue-400">Dashboard</a></li>
            <li><a href="/student" class="hover:text-blue-400">Students</a></li>
            <li><a href="/teacher" class="hover:text-blue-400">Teachers</a></li>
            <li><a href="/classroom" class="hover:text-blue-400">Classrooms</a></li>
            <li><a href="/subject" class="hover:text-blue-400">Subjects</a></li>
            <li><a href="/guardian" class="hover:text-blue-400">Guardians</a></li>
        </ul>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 p-8">
        @yield('content')
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
