<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIKESET</title>

    <!-- ✅ Livewire Styles -->
    @livewireStyles

    <!-- ✅ Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/a2c51f5b7a.js" crossorigin="anonymous"></script>

    <!-- Alpine.js CDN (cukup satu saja) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>

    {{ $slot }}

    <!-- ✅ Livewire Scripts -->
    @livewireScripts

</body>
</html>
