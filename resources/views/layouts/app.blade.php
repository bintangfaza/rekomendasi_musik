<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Music App' }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Theme -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#6C4AB6",
                        secondary: "#4B56D2",
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-gradient-to-b from-purple-800 via-blue-700 to-blue-900 text-white">
    <nav class="p-5 flex justify-between items-center">
        <h1 class="text-xl font-semibold"> Music Recommender</h1>
        <div>
            <span class="text-sm opacity-80">
                Bintang Senja
            </span>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="px-4 pb-16">
        @yield('content')
    </main>

</body>
</html>
