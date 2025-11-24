<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Ayam Kabogor</title>

    <link rel="icon" href="{{ asset('storage/public/images/logo_ayam_kabogor.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                        logo: ['Fredoka One', 'cursive'],
                    },
                    colors: {
                        primary: {
                            500: '#FF5722', 
                            600: '#E64A19', 
                        },
                        cream: '#FFF8E7',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'shake': 'shake 0.5s cubic-bezier(.36,.07,.19,.97) both',
                        'slide-in': 'slideIn 0.8s ease-out forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-15px)' },
                        },
                        shake: {
                            '10%, 90%': { transform: 'translate3d(-1px, 0, 0)' },
                            '20%, 80%': { transform: 'translate3d(2px, 0, 0)' },
                            '30%, 50%, 70%': { transform: 'translate3d(-4px, 0, 0)' },
                            '40%, 60%': { transform: 'translate3d(4px, 0, 0)' }
                        },
                        slideIn: {
                            '0%': { opacity: '0', transform: 'translateX(20px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans text-slate-800 antialiased selection:bg-orange-100 selection:text-orange-900 overflow-hidden">

    <div class="min-h-screen w-full flex bg-white" x-data="loginForm()">

        <div class="hidden md:flex w-1/2 bg-cream relative flex-col justify-center items-center overflow-hidden border-r border-orange-100">
            <div class="absolute top-0 left-0 w-full h-full opacity-30 pointer-events-none">
                <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-orange-300 rounded-full blur-3xl mix-blend-multiply filter animate-float"></div>
                <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-yellow-300 rounded-full blur-3xl mix-blend-multiply filter animate-float" style="animation-delay: 2s"></div>
            </div>

            <div class="relative z-10 text-center animate-float">
                <img src="{{ asset('assets/img/logo_ayam.png') }}" alt="Logo Ayam Kabogor" class="w-48 mx-auto">
            </div>
        </div>

        <div class="w-full md:w-1/2 flex flex-col justify-center items-center px-8 sm:px-14 relative bg-white">
            
            <div class="w-full max-w-sm opacity-0 animate-slide-in" style="animation-delay: 0.2s;">
                
                <div class="md:hidden text-center mb-8">
                    <h2 class="font-logo text-3xl text-primary-500">AYAM KABOGOR</h2>
                </div>

                <div class="mb-10 text-center">
                    <h2 class="text-3xl font-bold text-slate-800 mb-2">Selamat Datang</h2>
                    <p class="text-slate-400">Silakan login untuk masuk ke Halaman Admin.</p>
                </div>

                <form action="{{ route('login.post') }}" method="POST" @submit="submitLogin($event)" class="space-y-6" :class="{'animate-shake': error}">
                    @csrf
                    
                    <div x-show="error" x-cloak 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="p-3 bg-red-50 border border-red-100 text-red-500 text-sm rounded-xl flex items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span x-text="errorMessage"></span>
                    </div>

                    <div class="group">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2 ml-1 group-focus-within:text-orange-500 transition-colors">
                            Username
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-orange-500 transition-colors">
                                <i class="fa-regular fa-user text-lg"></i>
                            </span>
                            <input type="text" name="username" x-model="username" placeholder="Masukkan Username" 
                                class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-primary-500 focus:ring-4 focus:ring-orange-500/10 outline-none transition-all duration-300 font-medium text-slate-700 placeholder-slate-400">
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2 ml-1 group-focus-within:text-orange-500 transition-colors">
                            Password
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-orange-500 transition-colors">
                                <i class="fa-solid fa-lock text-lg"></i>
                            </span>
                            <input :type="showPassword ? 'text' : 'password'" name="password" x-model="password" placeholder="Masukkan Password" 
                                class="w-full pl-12 pr-12 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-primary-500 focus:ring-4 focus:ring-orange-500/10 outline-none transition-all duration-300 font-medium text-slate-700 placeholder-slate-400">
                            
                            <button type="button" @click="showPassword = !showPassword" 
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-orange-500 transition-colors focus:outline-none cursor-pointer p-1">
                                <i class="fa-regular text-lg" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" 
                            :disabled="loading"
                            class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:to-primary-500 text-white font-bold py-4 rounded-xl shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 transform hover:-translate-y-0.5 active:scale-95 transition-all duration-300 flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed mt-4">
                        
                        <svg x-show="loading" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        
                        <span x-text="loading ? 'MEMPROSES...' : 'LOGIN'"></span>
                    </button>

                </form>
            </div>

            <div class="absolute bottom-6 w-full text-center opacity-0 animate-slide-in" style="animation-delay: 0.5s;">
                <p class="mt-10 text-center text-sm text-slate-400 pb-4">
                    &copy; {{ date('Y') }} Ayam Kabogor. All rights reserved.
                </p>
            </div>

        </div>

    </div>

    <script>
        function loginForm() {
            // Cek jika ada error dari session Laravel, tampilkan error
            const laravelError = '{{ session('error') ?? ($errors->any() ? $errors->first() : '') }}';

            return {
                username: '{{ old('username') }}',
                password: '',
                showPassword: false,
                loading: false,
                
                // Tampilkan error jika ada dari Laravel
                error: laravelError.length > 0,
                errorMessage: laravelError,

                submitLogin(e) {
                    this.error = false;
                    
                    if (this.username.trim() === '' || this.password.trim() === '') {
                        e.preventDefault();
                        this.error = true;
                        this.errorMessage = 'Harap isi Username dan Password.';
                        setTimeout(() => this.error = false, 3000);
                        return;
                    }

                    // Aktifkan loading spinner saat form siap submit ke Laravel
                    this.loading = true;
                    // Biarkan form ter-submit secara natural oleh browser
                }
            }
        }
    </script>
</body>
</html>