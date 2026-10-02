<nav class="fixed left-0 top-0 z-50 w-full border-b border-white/10 bg-[#111111]/90 backdrop-blur-md">

```
<div class="mx-auto flex max-w-[1200px] items-center justify-between px-[7%] py-5">

    <!-- LOGO -->
    <a href="/" class="text-2xl font-bold tracking-wide text-white">
        BRAMAX
    </a>

    <!-- DESKTOP MENU -->
    <div id="navbarMenu" class="hidden items-center gap-7 md:flex">

        <a href="/" class="text-sm text-white transition hover:text-[#ff4f81]">
            Home
        </a>

        <a href="/#about" class="text-sm text-white transition hover:text-[#ff4f81]">
            About
        </a>

        <!-- SOLUTIONS -->
        <div class="group relative">

            <button
                type="button"
                class="flex items-center gap-1 text-sm text-white transition hover:text-[#ff4f81]"
            >
                Solutions
                <span class="text-xs">⌄</span>
            </button>

            <div class="invisible absolute left-0 top-full mt-3 w-56 rounded-lg border border-[#2a2a2a] bg-[#1a1a1a] p-2 opacity-0 shadow-xl transition-all duration-200 group-hover:visible group-hover:opacity-100">

                <a href="/solutions/digital"
                   class="block rounded px-3 py-2 text-sm text-white hover:bg-[#2a2a2a] hover:text-[#ff4f81]">
                    Digital & Software
                </a>

                <a href="/solutions/business"
                   class="block rounded px-3 py-2 text-sm text-white hover:bg-[#2a2a2a] hover:text-[#ff4f81]">
                    Business Support
                </a>

                <a href="/solutions/creative"
                   class="block rounded px-3 py-2 text-sm text-white hover:bg-[#2a2a2a] hover:text-[#ff4f81]">
                    Creative & Media
                </a>

                <a href="/solutions/commerce"
                   class="block rounded px-3 py-2 text-sm text-white hover:bg-[#2a2a2a] hover:text-[#ff4f81]">
                    Commerce & Procurement
                </a>

                <a href="/solutions/operational"
                   class="block rounded px-3 py-2 text-sm text-white hover:bg-[#2a2a2a] hover:text-[#ff4f81]">
                    Operational Support
                </a>

            </div>

        </div>

        <a href="/#portfolio" class="text-sm text-white transition hover:text-[#ff4f81]">
            Portfolio
        </a>

        <a href="/insights" class="text-sm text-white transition hover:text-[#ff4f81]">
            Insights
        </a>

        <a href="/download" class="text-sm text-white transition hover:text-[#ff4f81]">
            Download
        </a>

        <a
            href="/contact"
            class="rounded-full bg-[#e40046] px-5 py-2 text-sm font-semibold text-white transition hover:bg-[#ff4f81]"
        >
            Contact
        </a>

    </div>


    <!-- MOBILE BUTTON -->
    <button
        id="mobileMenuButton"
        type="button"
        class="text-2xl text-white md:hidden"
        aria-label="Buka menu"
        aria-expanded="false"
    >
        ☰
    </button>

</div>


<!-- MOBILE MENU -->
<div
    id="mobileMenu"
    class="hidden border-t border-white/10 bg-[#111111] px-6 py-5 md:hidden"
>

    <div class="flex flex-col gap-5">

        <a href="/" class="text-white transition hover:text-[#ff4f81]">
            Home
        </a>

        <a href="/#about" class="text-white transition hover:text-[#ff4f81]">
            About
        </a>

        <a href="/#services" class="text-white transition hover:text-[#ff4f81]">
            Solutions
        </a>

        <a href="/#portfolio" class="text-white transition hover:text-[#ff4f81]">
            Portfolio
        </a>

        <a href="/insights" class="text-[#ff4f81] transition hover:text-white">
            Insights
        </a>

        <a href="/download" class="text-white transition hover:text-[#ff4f81]">
            Download
        </a>

        <a href="/contact" class="text-white transition hover:text-[#ff4f81]">
            Contact
        </a>

    </div>

</div>
```

</nav>
