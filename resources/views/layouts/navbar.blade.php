<nav
    id="navbar"
    class="fixed left-0 top-0 z-50 w-full border-b border-gray-200/80 bg-white/90 backdrop-blur-lg transition-transform duration-300"
>

    <div class="mx-auto flex h-[76px] max-w-[1200px] items-center justify-between px-6">

        <!-- LOGO -->
        <a
            href="{{ route('home') }}"
            class="bg-gradient-to-r from-[#D90000] to-[#e91e63] bg-clip-text text-2xl font-extrabold tracking-[-0.5px] text-transparent"
        >
            BRAMAX
        </a>


        <!-- DESKTOP MENU -->
        <div class="hidden items-center gap-2 md:flex">

            <a
                href="{{ route('home') }}"
                class="px-3.5 py-2.5 text-[15px] font-medium text-[#252525] transition hover:text-[#D90000]"
            >
                Home
            </a>

            <a
                href="{{ route('home') }}#about"
                class="px-3.5 py-2.5 text-[15px] font-medium text-[#252525] transition hover:text-[#D90000]"
            >
                About
            </a>


            <!-- SOLUTIONS -->
            <div class="group relative">

                <button
                    type="button"
                    class="flex items-center gap-1.5 border-0 bg-transparent px-3.5 py-2.5 text-[15px] font-medium text-[#252525] transition hover:text-[#D90000]"
                >
                    Solutions
                    <span class="text-xs">⌄</span>
                </button>


                <div
                    class="invisible absolute left-0 top-[calc(100%+10px)] w-[240px] translate-y-[-8px] rounded-xl border border-gray-200 bg-white p-2 opacity-0 shadow-xl transition-all duration-200 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100"
                >

                    <a
                        href="{{ route('solutions.digital') }}"
                        class="block rounded-lg px-3 py-2.5 text-sm text-[#252525] transition hover:bg-[#fff0f5] hover:text-[#D90000]"
                    >
                        Digital & Software
                    </a>

                    <a
                        href="{{ route('solutions.show', 'business-support') }}"
                        class="block rounded-lg px-3 py-2.5 text-sm text-[#252525] transition hover:bg-[#fff0f5] hover:text-[#D90000]"
                    >
                        Business Support
                    </a>

                    <a
                       href="{{ route('business-categories.show', 'kreatif-media-desain-promosi') }}"   
                        class="block rounded-lg px-3 py-2.5 text-sm text-[#252525] transition hover:bg-[#fff0f5] hover:text-[#D90000]"
                    >
                        Creative & Media
                    </a>

                    <a
                        href="/solutions/commerce"
                        class="block rounded-lg px-3 py-2.5 text-sm text-[#252525] transition hover:bg-[#fff0f5] hover:text-[#D90000]"
                    >
                        Commerce & Procurement
                    </a>

                    <a
                        href="/solutions/operational"
                        class="block rounded-lg px-3 py-2.5 text-sm text-[#252525] transition hover:bg-[#fff0f5] hover:text-[#D90000]"
                    >
                        Operational Support
                    </a>

                </div>

            </div>


            <a
                href="{{ route('home') }}#portfolio"
                class="px-3.5 py-2.5 text-[15px] font-medium text-[#252525] transition hover:text-[#D90000]"
            >
                Portfolio
            </a>

            <a
                href="{{ route('insights') }}"
                class="px-3.5 py-2.5 text-[15px] font-medium text-[#252525] transition hover:text-[#D90000]"
            >
                Insights
            </a>

            <a
                href="/download"
                class="px-3.5 py-2.5 text-[15px] font-medium text-[#252525] transition hover:text-[#D90000]"
            >
                Download
            </a>


            <!-- CONTACT -->
            <a
                href="/contact"
                class="ml-2 rounded-full bg-gradient-to-r from-[#D90000] to-[#e91e63] px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:shadow-[0_6px_18px_rgba(217,0,0,0.25)]"
            >
                Contact
            </a>

        </div>


        <!-- MOBILE BUTTON -->
        <button
            id="mobileMenuButton"
            type="button"
            class="flex h-10 w-10 items-center justify-center text-2xl text-[#252525] transition hover:text-[#D90000] md:hidden"
            aria-label="Buka menu"
            aria-expanded="false"
        >
            ☰
        </button>

    </div>


    <!-- MOBILE MENU -->
    <div
        id="mobileMenu"
        class="hidden border-t border-gray-200 bg-white px-6 pb-6 pt-4 shadow-lg md:hidden"
    >

        <div class="flex flex-col">

            <a
                href="{{ route('home') }}"
                class="border-b border-gray-100 py-3 text-sm font-medium text-[#252525] transition hover:text-[#D90000]"
            >
                Home
            </a>

            <a
                href="{{ route('home') }}#about"
                class="border-b border-gray-100 py-3 text-sm font-medium text-[#252525] transition hover:text-[#D90000]"
            >
                About
            </a>


            <!-- MOBILE SOLUTIONS -->
            <div class="border-b border-gray-100 py-3">

                <p class="mb-2 text-sm font-medium text-[#252525]">
                    Solutions
                </p>

                <div class="flex flex-col gap-2 pl-3">

                    <a
                        href="{{ route('solutions.digital') }}"
                        class="text-sm text-gray-500 transition hover:text-[#D90000]"
                    >
                        Digital & Software
                    </a>

                    <a
                        href="{{ route('solutions.show', 'business-support') }}"
                        class="text-sm text-gray-500 transition hover:text-[#D90000]"
                    >
                        Business Support
                    </a>

                    <a
                        href="/solutions/creative"
                        class="text-sm text-gray-500 transition hover:text-[#D90000]"
                    >
                        Creative & Media
                    </a>

                    <a
                        href="/solutions/commerce"
                        class="text-sm text-gray-500 transition hover:text-[#D90000]"
                    >
                        Commerce & Procurement
                    </a>

                    <a
                        href="/solutions/operational"
                        class="text-sm text-gray-500 transition hover:text-[#D90000]"
                    >
                        Operational Support
                    </a>

                </div>

            </div>


            <a
                href="{{ route('home') }}#portfolio"
                class="border-b border-gray-100 py-3 text-sm font-medium text-[#252525] transition hover:text-[#D90000]"
            >
                Portfolio
            </a>

            <a
                href="{{ route('insights') }}"
                class="border-b border-gray-100 py-3 text-sm font-medium text-[#252525] transition hover:text-[#D90000]"
            >
                Insights
            </a>

            <a
                href="/download"
                class="border-b border-gray-100 py-3 text-sm font-medium text-[#252525] transition hover:text-[#D90000]"
            >
                Download
            </a>


            <!-- MOBILE CONTACT -->
            <a
                href="/contact"
                class="mt-4 rounded-full bg-gradient-to-r from-[#D90000] to-[#e91e63] px-5 py-3 text-center text-sm font-semibold text-white transition hover:shadow-[0_6px_18px_rgba(217,0,0,0.25)]"
            >
                Contact
            </a>

        </div>

    </div>

</nav>

