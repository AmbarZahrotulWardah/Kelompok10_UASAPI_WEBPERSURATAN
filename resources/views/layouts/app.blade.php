<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Persura')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dark Mode Persistence -->
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Lenis + GSAP -->
    <script src="https://unpkg.com/@studio-freight/lenis@1.0.35/bundled/lenis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!-- Lottie -->
    <script src="https://cdn.jsdelivr.net/npm/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 via-indigo-100 to-purple-100 min-h-screen text-gray-900 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700 dark:text-white">



    <!-- Navbar -->
    <div class="bg-white dark:bg-gray-800 shadow-md p-4 flex justify-between items-center fixed top-0 w-full z-10">
        <h1 class="text-xl font-bold text-indigo-600 dark:text-indigo-300">📬 Persura</h1>
        <div class="md:hidden">
            <button onclick="document.getElementById('menu').classList.toggle('hidden')" class="text-gray-600 dark:text-gray-300 text-2xl">☰</button>
        </div>
        <ul class="hidden md:flex space-x-6 text-sm text-indigo-600 dark:text-indigo-300">
            <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li>
            <li><a href="{{ route('profile.index') }}" class="hover:underline">Profil</a></li>
            <li>
                <form method="GET" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-500 hover:underline">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Hamburger Menu (Mobile) -->
    <div id="menu" class="hidden bg-white dark:bg-gray-800 shadow p-4 absolute right-4 top-16 rounded w-56 z-20">
        <a href="{{ route('dashboard') }}" class="block text-sm py-1 hover:text-indigo-600">🏠 Dashboard</a>
        <a href="{{ route('profile.index') }}" class="block text-sm py-1 hover:text-indigo-600">👤 Profil</a>
        <form method="GET" action="{{ route('logout') }}">
            @csrf
            <button class="mt-2 text-red-500 w-full text-left text-sm">Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="pt-24 pb-10 px-6 max-w-5xl mx-auto">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 800 });

        // Close menu outside click
        const menuBtn = document.querySelector("button[onclick]");
        const menu = document.getElementById("menu");

        document.addEventListener("click", function (e) {
            if (!menu.contains(e.target) && !menuBtn.contains(e.target)) {
                menu.classList.add("hidden");
            }
        });

        // Lenis smooth scroll
        const lenis = new Lenis({
            duration: 1.4,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t))
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener("click", function (e) {
                const target = document.querySelector(this.getAttribute("href"));
                if (target) {
                    e.preventDefault();
                    lenis.scrollTo(target);
                }
            });
        });

        // GSAP for AOS
        gsap.registerPlugin(ScrollTrigger);
        gsap.utils.toArray('[data-aos]').forEach((el) => {
            gsap.from(el, {
                scrollTrigger: {
                    trigger: el,
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                opacity: 0,
                y: 50,
                duration: 0.8,
                ease: 'power2.out'
            });
        });

    </script>
    
</body>
</html>
