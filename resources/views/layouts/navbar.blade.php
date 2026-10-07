
@php
    $solutions = \App\Models\Solution::where('is_active', true)
        ->orderBy('sort_order')
        ->get();
@endphp

<nav
    id="navbar"
    class="fixed left-0 top-0 z-50 w-full border-b border-gray-200 bg-white transition-transform duration-300 ease-in-out"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- =========================
             NAVBAR UTAMA
        ========================== --}}
        <div class="flex h-[72px] items-center justify-between">

            {{-- LOGO --}}
            <a
                href="{{ route('home') }}"
                class="shrink-0 text-xl font-extrabold tracking-tight text-[#D90000] sm:text-2xl"
            >
                {{ $setting?->site_name ?? 'BRAMAX' }}
            </a>


            {{-- =========================
                 DESKTOP MENU
            ========================== --}}
            <div class="hidden items-center gap-1 lg:flex">

                {{-- HOME --}}
                <a
                    href="{{ route('home') }}"
                    class="rounded-lg px-4 py-2.5 text-sm font-medium text-[#252525] transition hover:text-[#D90000]"
                >
                    Home
                </a>


                {{-- ABOUT --}}
                <a
                    href="{{ route('home') }}#about"
                    class="rounded-lg px-4 py-2.5 text-sm font-medium text-[#252525] transition hover:text-[#D90000]"
                >
                    About
                </a>


            
                {{-- SOLUTIONS --}}
                <a
                    href="{{ route('home') }}#solutions"
                    class="rounded-lg px-4 py-2.5 text-sm font-medium text-[#252525] transition hover:text-[#D90000]"
                >
                    Solutions
                </a>



                {{-- PORTFOLIO --}}
                <a
                    href="{{ route('home') }}#portfolio"
                    class="rounded-lg px-4 py-2.5 text-sm font-medium text-[#252525] transition hover:text-[#D90000]"
                >
                    Portfolio
                </a>


                {{-- INSIGHTS --}}
                <a
                    href="{{ route('insights') }}"
                    class="rounded-lg px-4 py-2.5 text-sm font-medium text-[#252525] transition hover:text-[#D90000]"
                >
                    Insights
                </a>


                {{-- DOWNLOAD --}}
                <a
                    href="/download"
                    class="rounded-lg px-4 py-2.5 text-sm font-medium text-[#252525] transition hover:text-[#D90000]"
                >
                    Download
                </a>


                {{-- CONTACT --}}
                <a
                    href="/contact"
                    class="ml-2 rounded-full bg-[#D90000] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#b80000]"
                >
                    Contact
                </a>

            </div>


            {{-- =========================
                 MOBILE BUTTON
            ========================== --}}
            <button
                id="mobileMenuButton"
                type="button"
                class="flex h-11 w-11 items-center justify-center rounded-lg border border-gray-200 bg-white text-[#252525] transition hover:bg-gray-100 lg:hidden"
                aria-label="Buka menu"
                aria-expanded="false"
            >

                {{-- HAMBURGER --}}
                <svg
                    id="mobileMenuOpenIcon"
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>


                {{-- CLOSE --}}
                <svg
                    id="mobileMenuCloseIcon"
                    class="hidden h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>

            </button>

        </div>


        {{-- =========================
             MOBILE MENU
        ========================== --}}
        <div
            id="mobileMenu"
            class="hidden border-t border-gray-200 bg-white lg:hidden"
        >

            <div class="max-h-[calc(100vh-72px)] overflow-y-auto py-2">

                {{-- HOME --}}
                <a
                    href="{{ route('home') }}"
                    class="block border-b border-gray-100 px-4 py-4 text-sm font-medium text-[#252525] transition hover:bg-gray-50 hover:text-[#D90000]"
                >
                    Home
                </a>


                {{-- ABOUT --}}
                <a
                    href="{{ route('home') }}#about"
                    class="block border-b border-gray-100 px-4 py-4 text-sm font-medium text-[#252525] transition hover:bg-gray-50 hover:text-[#D90000]"
                >
                    About
                </a>


                {{-- =========================
                     MOBILE SOLUTIONS
                ========================== --}}
                <div class="border-b border-gray-100">

                    <button
                        id="mobileSolutionsButton"
                        type="button"
                        class="flex w-full items-center justify-between px-4 py-4 text-left text-sm font-medium text-[#252525] transition hover:bg-gray-50"
                        aria-expanded="false"
                    >

                        <span>Solutions</span>

                        <svg
                            id="mobileSolutionsIcon"
                            class="h-4 w-4 transition-transform duration-200"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>

                    </button>


                    {{-- SOLUTIONS LIST --}}
                    <div
                        id="mobileSolutionsMenu"
                        class="hidden bg-gray-50 px-3 pb-3"
                    >

                        @forelse($solutions as $solution)

                            <a
                                href="{{ route('solutions.show', $solution->slug) }}"
                                class="block rounded-lg px-4 py-3 text-sm font-medium !text-black transition hover:bg-[#fff0f5] hover:!text-[#D90000]"
                            >
                                {{ $solution->title }}
                            </a>

                        @empty

                            <div class="px-4 py-3 text-sm text-gray-500">
                                Belum ada Solution
                            </div>

                        @endforelse

                    </div>

                </div>


                {{-- PORTFOLIO --}}
                <a
                    href="{{ route('home') }}#portfolio"
                    class="block border-b border-gray-100 px-4 py-4 text-sm font-medium text-[#252525] transition hover:bg-gray-50 hover:text-[#D90000]"
                >
                    Portfolio
                </a>


                {{-- INSIGHTS --}}
                <a
                    href="{{ route('insights') }}"
                    class="block border-b border-gray-100 px-4 py-4 text-sm font-medium text-[#252525] transition hover:bg-gray-50 hover:text-[#D90000]"
                >
                    Insights
                </a>


                {{-- DOWNLOAD --}}
                <a
                    href="/download"
                    class="block border-b border-gray-100 px-4 py-4 text-sm font-medium text-[#252525] transition hover:bg-gray-50 hover:text-[#D90000]"
                >
                    Download
                </a>


                {{-- CONTACT --}}
                <div class="p-4">

                    <a
                        href="/contact"
                        class="block rounded-full bg-[#D90000] px-5 py-3 text-center text-sm font-semibold text-white transition hover:bg-[#b80000]"
                    >
                        Contact
                    </a>

                </div>

            </div>

        </div>

    </div>
</nav>

