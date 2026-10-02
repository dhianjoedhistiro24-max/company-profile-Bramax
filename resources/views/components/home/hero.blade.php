
<section 
    id="home"
    class="hero-scroll-container relative h-[200vh] bg-[#F5F5F5]"
>

    <!-- STICKY AREA -->
    <div 
        class="scroll-expand-sticky sticky top-0 z-10 flex h-screen w-full items-center justify-center overflow-hidden"
    >

        <!-- GAMBAR -->
        <div 
            id="scroll-expand-image"
            class="relative flex h-[50vh] w-[50vw] items-center justify-center overflow-hidden rounded-[30px]"
        >

            <!-- BACKGROUND IMAGE -->
            <img
                src="{{ asset('images/1ME00006.jpg') }}"
                alt="BRAMAX"
                class="absolute inset-0 h-full w-full object-cover"
            >

            <!-- OVERLAY -->
            <div 
                class="absolute inset-0 bg-gradient-to-r from-[#191B1B]/50 via-[#E51929]/10 to-transparent"
            ></div>


            <!-- TEXT AWAL -->
            <div
                id="hero-text-initial"
                class="relative z-10 text-center"
            >

                <h2 class="text-5xl font-bold text-white md:text-7xl">
                    BRAMAX
                </h2>

            </div>


            <!-- TEXT SETELAH SCROLL -->
            <div
                id="hero-text-overlay"
                class="pointer-events-none absolute z-10 max-w-[800px] px-6 text-center opacity-0 transition-all duration-500"
                style="transform: translateY(20px);"
            >

                <p class="mb-4 text-sm font-bold tracking-[0.2em] text-[#FF4040]">
                    PT BRAMAX TEKNOLOGI INDONESIA
                </p>

                <h1 class="mb-6 text-4xl font-bold leading-tight text-[#F5F5F5] md:text-6xl">
                    Solusi Teknologi untuk Masa Depan
                </h1>

                <p class="mx-auto mb-8 max-w-[600px] text-base leading-relaxed text-gray-300 md:text-lg">
                    Menghadirkan solusi teknologi yang inovatif untuk mendukung perkembangan bisnis di era digital.
                </p>

                <a
                    href="#services"
                    class="inline-flex items-center rounded-full bg-gradient-to-r from-[#e91e63] to-[#ff3d71] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-1 hover:shadow-[0_8px_25px_rgba(233,30,99,0.35)]"
                >
                    Pelajari Selengkapnya
                </a>

            </div>

        </div>

    </div>

</section>
