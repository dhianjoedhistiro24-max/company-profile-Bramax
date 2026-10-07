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


{{-- =========================
     SIDEBAR
========================= --}}

<aside
    class="fixed inset-y-0 left-0 z-50 w-[260px] border-r border-gray-200 bg-white transition-transform duration-300"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>

    <div class="flex h-full flex-col">


        {{-- LOGO --}}

        <div class="flex h-20 items-center border-b border-gray-100 px-6">

            <a
                href="{{ route('admin.dashboard') }}"
                class="text-2xl font-black tracking-tight"
            >

                BRA<span class="text-[#D90000]">MAX</span>

            </a>

        </div>


        {{-- MENU --}}

        <nav class="flex-1 overflow-y-auto px-4 py-6">

            <p class="mb-3 px-3 text-xs font-bold uppercase tracking-widest text-gray-400">
                Main Menu
            </p>


            {{-- DASHBOARD --}}

            <a
                href="{{ route('admin.dashboard') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >

                {{-- Dashboard Icon --}}

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M3 13h8V3H3v10zm10 8h8V3h-8v18zM3 21h8v-6H3v6z"
                    />
                </svg>

                Dashboard

            </a>


            {{-- PROFILE --}}

            <a
                href="{{ route('admin.profile.edit') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >

                {{-- Profile Icon --}}

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M15 19a6 6 0 00-12 0m6-8a4 4 0 100-8 4 4 0 000 8zm7-1v6m3-3h-6"
                    />
                </svg>

                Profile

            </a>


            {{-- SETTINGS --}}

            <a
                href="{{ route('admin.settings.edit') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >

                {{-- Settings Icon --}}

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M10.3 3.2l.4-1.2h2.6l.4 1.2a8.2 8.2 0 012 .8l1.2-.5 1.8 1.8-.5 1.2a8.2 8.2 0 01.8 2l1.2.4v2.6l-1.2.4a8.2 8.2 0 01-.8 2l.5 1.2-1.8 1.8-1.2-.5a8.2 8.2 0 01-2 .8l-.4 1.2h-2.6l-.4-1.2a8.2 8.2 0 01-2-.8l-1.2.5-1.8-1.8.5-1.2a8.2 8.2 0 01-.8-2L2 11.5V8.9l1.2-.4a8.2 8.2 0 01.8-2l-.5-1.2 1.8-1.8 1.2.5a8.2 8.2 0 012-.8z"
                    />
                    <circle
                        cx="12"
                        cy="10.2"
                        r="2.5"
                        stroke-width="1.8"
                    />
                </svg>

                Settings

            </a>


            {{-- BERITA --}}

            <a
                href="{{ route('admin.news.index') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M5 4h14v16H5V4zm3 4h8M8 12h8M8 16h5"
                    />
                </svg>

                Berita

            </a>


            {{-- SERVICES --}}

            <a
                href="{{ route('admin.services.index') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>

                Services

            </a>


            {{-- SOLUTIONS --}}

            <a
                href="{{ route('admin.solutions.index') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M9.5 14.5L14.5 9.5M8 4h8l4 4v8l-4 4H8l-4-4V8l4-4z"
                    />
                </svg>

                Solutions

            </a>


            {{-- PROJECTS --}}

            <a
                href="{{ route('admin.projects.index') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M4 5h16v14H4V5zm3 3h4v3H7V8zm0 5h4v3H7v-3zm6-5h4v8h-4V8z"
                    />
                </svg>

                Projects

            </a>


            {{-- CONTACT MESSAGES --}}

            <a
                href="{{ route('admin.contact-messages.index') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M4 5h16v11H8l-4 4V5z"
                    />
                </svg>

                Contact Messages

            </a>


            {{-- ABOUT --}}

            <a
                href="{{ route('admin.about.edit') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <circle
                        cx="12"
                        cy="12"
                        r="9"
                        stroke-width="1.8"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-width="1.8"
                        d="M12 11v5"
                    />

                    <circle
                        cx="12"
                        cy="8"
                        r="0.7"
                        fill="currentColor"
                        stroke="none"
                    />
                </svg>

                About

            </a>


            {{-- PROJECT CATEGORIES --}}

            <a
                href="{{ route('admin.project-categories.index') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M4 6h16v12H4V6zm3 3h4v4H7V9zm6 0h4M13 13h4"
                    />
                </svg>

                Project Categories

            </a>


            {{-- BUSINESS CATEGORIES --}}

            <a
                href="{{ route('admin.business-categories.index') }}"
                class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-[#D90000]/10 hover:text-[#D90000]"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M4 6h16v12H4V6zm3 3h4v4H7V9zm6 0h4M13 13h4"
                    />
                </svg>

                Business Categories

            </a>

        </nav>


        {{-- LOGOUT --}}

        <div class="border-t border-gray-100 p-4">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-red-500 transition hover:bg-red-50"
                >

                    <svg
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M10 17l5-5-5-5M15 12H3m12-7h4a2 2 0 012 2v10a2 2 0 01-2 2h-4"
                        />
                    </svg>

                    Logout

                </button>

            </form>

        </div>

    </div>

</aside>


{{-- =========================
     OVERLAY MOBILE
========================= --}}

<div
    x-show="sidebarOpen"
    x-transition.opacity
    @click="sidebarOpen = false"
    class="fixed inset-0 z-40 bg-black/30 lg:hidden"
></div>


{{-- =========================
     MAIN
========================= --}}

<main
    class="min-h-screen transition-all duration-300"
    :class="sidebarOpen ? 'lg:ml-[260px]' : 'lg:ml-0'"
>


    {{-- TOP BAR --}}

    <header
        class="sticky top-0 z-30 flex h-20 items-center border-b border-gray-200 bg-white/95 px-6 backdrop-blur"
    >

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

