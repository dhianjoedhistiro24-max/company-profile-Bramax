<section
    id="about"
    class="bg-white px-[7%] py-[100px] md:py-[120px]"
>
    <div class="mx-auto grid max-w-[1200px] items-center gap-14 lg:grid-cols-2 lg:gap-20">

        {{-- LEFT --}}
        <div>

            <span class="text-sm font-semibold tracking-[0.2em] text-[#e40046]">
                ABOUT BRAMAX
            </span>

            <h2 class="mt-4 text-3xl font-bold leading-tight text-black md:text-5xl">
                {{ $about?->title ?? 'Teknologi yang Mendorong Pertumbuhan' }}
            </h2>

            @if($about?->content)

                <div class="mt-6 space-y-4 leading-relaxed text-gray-600">

                    @foreach(explode("\n", $about->content) as $paragraph)

                        @if(trim($paragraph) !== '')
                            <p>
                                {{ trim($paragraph) }}
                            </p>
                        @endif

                    @endforeach

                </div>

            @else

                <p class="mt-6 leading-relaxed text-gray-600">
                    PT BRAMAX TEKNOLOGI INDONESIA hadir sebagai perusahaan
                    teknologi yang menyediakan solusi digital untuk membantu
                    bisnis berkembang lebih cepat, efektif, dan terintegrasi.
                </p>

                <p class="mt-4 leading-relaxed text-gray-600">
                    Kami menggabungkan teknologi, inovasi, dan pendekatan yang
                    berorientasi pada kebutuhan bisnis untuk menciptakan solusi
                    yang memberikan dampak nyata.
                </p>

            @endif

            @if($about?->cta)

                <a
                    href="{{ route('about') }}"
                    class="mt-8 inline-flex items-center gap-2 rounded-lg
                           bg-[#e40046] px-6 py-3 text-sm font-semibold text-white
                           transition duration-300
                           hover:bg-[#c9003d]
                           hover:-translate-y-0.5
                           hover:shadow-lg"
                >
                    {{ $about->cta }}

                    <span>→</span>
                </a>

            @endif

        </div>


        {{-- RIGHT --}}
        <div class="relative mx-auto w-full max-w-[520px]">

            {{-- CARD 01 --}}
            <div
                class="relative rounded-2xl border border-gray-200
                       bg-[#fffdfb] p-7
                       shadow-[0_8px_30px_rgba(0,0,0,0.06)]
                       md:p-8"
            >

                <div class="flex items-start gap-5">

                    <div class="text-4xl font-bold text-[#e40046]">
                        01
                    </div>

                    <div>

                        <h3 class="text-xl font-semibold text-black">
                            Technology
                        </h3>

                        <p class="mt-2 text-sm leading-relaxed text-gray-500">
                            Membangun solusi dengan teknologi modern
                            dan scalable untuk mendukung kebutuhan bisnis.
                        </p>

                    </div>

                </div>

            </div>


            {{-- CARD 02 --}}
            <div
                class="relative mt-5 ml-8 rounded-2xl border border-gray-200
                       bg-white p-7
                       shadow-[0_8px_30px_rgba(0,0,0,0.06)]
                       md:p-8"
            >

                <div class="flex items-start gap-5">

                    <div class="text-4xl font-bold text-[#e40046]">
                        02
                    </div>

                    <div>

                        <h3 class="text-xl font-semibold text-black">
                            Innovation
                        </h3>

                        <p class="mt-2 text-sm leading-relaxed text-gray-500">
                            Menghadirkan pendekatan inovatif untuk menciptakan
                            solusi yang relevan bagi kebutuhan bisnis.
                        </p>

                    </div>

                </div>

            </div>


            {{-- DECORATION --}}
            <div
                class="absolute -right-5 -top-5 h-20 w-20
                       rounded-full border border-[#e40046]/20"
            ></div>

            <div
                class="absolute -bottom-6 -left-5 h-16 w-16
                       rounded-full border border-[#e40046]/10"
            ></div>

        </div>

    </div>
</section>