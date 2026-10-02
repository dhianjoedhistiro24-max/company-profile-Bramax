<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>{{ $title ?? 'Admin Dashboard' }} - BRAMAX</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="bg-[#f7f7f7] text-[#252525]">

<div
    x-data="{ sidebarOpen: true }"
    class="min-h-screen"
>


{{-- SIDEBAR --}}
<aside
    class="fixed inset-y-0 left-0 z-50 w-[260px] border-r border-gray-200 bg-white transition-transform duration-300"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>

    <div class="flex h-full flex-col">

        {{-- LOGO --}}
        <div class="flex h-20 items-center border-b border-gray-100 px-6">

            <a href="{{ route('admin.dashboard') }}"
               class="text-2xl font-black tracking-tight">

                BRA<span class="text-[#D90000]">MAX</span>

            </a>

        </div>


        {{-- MENU --}}
        <nav class="flex-1 overflow-y-auto px-4 py-6">

            <p class="mb-3 px-3 text-xs font-bold uppercase tracking-widest text-gray-400">
                Main Menu
            </p>


            <a
                href="{{ route('admin.dashboard') }}"
                class="mb-1 flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >
                Dashboard
            </a>


            <a
                href="{{ route('admin.news.index') }}"
                class="mb-1 flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >
                Berita
            </a>


            <a
                href="{{ route('admin.services.index') }}"
                class="mb-1 flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >
                Services
            </a>


            <a
                href="{{ route('admin.solutions.index') }}"
                class="mb-1 flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >
                Solutions
            </a>


            <a
                href="{{ route('admin.projects.index') }}"
                class="mb-1 flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >
                Projects
            </a>


            <a
                href="{{ route('admin.contact-messages.index') }}"
                class="mb-1 flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >
                Contact Messages
            </a>


            <a
                href="{{ route('admin.about.edit') }}"
                class="mb-1 flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >
                About
            </a>

        </nav>


        {{-- LOGOUT --}}
        <div class="border-t border-gray-100 p-4">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center rounded-xl px-4 py-3 text-sm font-medium text-gray-500 transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
                >
                    Logout
                </button>

            </form>

        </div>

    </div>

</aside>


{{-- OVERLAY MOBILE --}}
<div
    x-show="sidebarOpen"
    x-transition.opacity
    @click="sidebarOpen = false"
    class="fixed inset-0 z-40 bg-black/30 lg:hidden"
></div>


{{-- MAIN --}}
<main
    class="min-h-screen transition-all duration-300"
    :class="sidebarOpen ? 'lg:ml-[260px]' : 'lg:ml-0'"
>

    {{-- TOP BAR --}}
    <header class="sticky top-0 z-30 flex h-20 items-center border-b border-gray-200 bg-white/95 px-6 backdrop-blur">

        <button
            type="button"
            @click="sidebarOpen = !sidebarOpen"
            class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 text-xl transition hover:border-[#D90000] hover:text-[#D90000]"
        >
            ☰
        </button>


        <div class="ml-4">

            <p class="text-sm font-semibold text-[#D90000]">
                BRAMAX ADMIN
            </p>

            <p class="text-xs text-gray-400">
                Management System
            </p>

        </div>

    </header>


    {{-- CONTENT --}}
    <div class="p-6">

        @yield('content')

    </div>

</main>


</div>

</body>
</html>
