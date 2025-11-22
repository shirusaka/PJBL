<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Ayam Kabogor</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: {
                        primary: {
                            50: '#fff7ed', 100: '#ffedd5', 500: '#f97316', 600: '#ea580c', 700: '#c2410c',
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        html { scroll-behavior: smooth; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 10px; }
    </style>
    @stack('styles')
</head>

<body class="bg-gray-50 text-slate-800 font-sans antialiased" 
      x-data="{ sidebarOpen: window.innerWidth >= 1024 }">

    <div x-show="sidebarOpen" 
         @click="sidebarOpen = false" 
         x-transition.opacity
         class="fixed inset-0 bg-slate-900/50 z-40 lg:hidden backdrop-blur-sm"></div>

    @include('components.sidebar')

    <div class="flex-1 flex flex-col min-h-screen transition-all duration-300 ease-in-out"
         :class="sidebarOpen ? 'lg:ml-64' : 'lg:ml-0'">
        
        @include('components.navbar')

        <main class="flex-1 p-6 lg:p-8">
            @yield('content')
        </main>

        <footer class="mt-10 text-center text-sm text-slate-400 pb-4">
            &copy; {{ date('Y') }} Ayam Kabogor. All rights reserved.
        </footer>
    </div>

    @stack('scripts')
</body>
</html>