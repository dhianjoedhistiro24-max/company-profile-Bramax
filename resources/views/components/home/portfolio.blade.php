<section
    id="portfolio"
    class="px-[7%] py-[80px] text-black md:py-[100px]"
    style="
        background-color: #f8f7f3;
        background-image:
            radial-gradient(rgba(0,0,0,0.035) 0.7px, transparent 0.7px),
            radial-gradient(rgba(0,0,0,0.02) 0.7px, transparent 0.7px);
        background-size: 7px 7px, 11px 11px;
        background-position: 0 0, 3px 4px;
    "
>

    <div class="mx-auto max-w-[1280px]">

        {{-- =========================
            HEADER
        ========================== --}}
        <div class="mb-[45px] text-center">

            <span class="text-sm font-semibold tracking-[0.2em] text-black">
                PORTFOLIO
            </span>

            <h2 class="mt-3 text-3xl font-bold tracking-tight text-black md:text-5xl">
                Proyek Unggulan
                <span class="text-black">
                    Kami
                </span>
            </h2>

            <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-black md:text-base">
                Berbagai proyek yang kami kerjakan untuk membantu bisnis
                berkembang melalui solusi yang tepat dan profesional.
            </p>

        </div>




        {{-- =========================
            PORTFOLIO GRID
        ========================== --}}
        <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 lg:grid-cols-3">

            @forelse ($projects as $project)

                @php

                    $image = $project->images
                        ->sortBy('sort_order')
                        ->first();

                    /*
                    |--------------------------------------------------------------------------
                    | WARNA CARD CERAH
                    |--------------------------------------------------------------------------
                    */

                    $cardColors = [

                        // Lavender
                        'bg-[#d8cbe2]',

                        // Peach / beige
                        'bg-[#ddd0cb]',

                        // Lilac
                        'bg-[#d9d0e3]',

                        // Pink pastel
                        'bg-[#e4b9dd]',

                        // Warm beige
                        'bg-[#d8cbc2]',

                        // Soft purple
                        'bg-[#d0cadb]',

                    ];

                    $cardColor =
                        $cardColors[$loop->index % count($cardColors)];

                @endphp


                {{-- =========================
                    CARD
                ========================== --}}
                <article
                    class="group relative h-[235px] overflow-hidden rounded-[18px] {{ $cardColor }} transition duration-300 hover:-translate-y-1"
                >

                    {{-- =========================
                        CONTENT
                    ========================== --}}
                    <div
                        class="relative z-10 h-full w-[63%] p-6 md:p-7"
                    >

                        {{-- CATEGORY --}}
                        @if ($project->category)

                            <span
                                class="mb-3 inline-block text-xs font-semibold uppercase tracking-[0.15em] text-black"
                            >
                                {{ $project->category->name }}
                            </span>

                        @endif


                        {{-- TITLE --}}
                        <h3
                            class="text-[20px] font-bold leading-snug text-black"
                        >
                            {{ $project->title }}
                        </h3>


                        {{-- DESCRIPTION --}}
                        @if ($project->description)

                            <p
                                class="mt-2 line-clamp-3 text-[14px] font-medium leading-6 text-black"
                            >
                                {{ $project->description }}
                            </p>

                        @endif


                        {{-- META --}}
                        <div
                            class="mt-3 flex flex-wrap gap-2 text-xs text-black"
                        >

                            @if ($project->location)

                                <span class="text-black">
                                    {{ $project->location }}
                                </span>

                            @endif

                            @if ($project->year)

                                <span class="text-black">
                                    •
                                </span>

                                <span class="text-black">
                                    {{ $project->year }}
                                </span>

                            @endif

                        </div>


                        {{-- LINK --}}
                        <div class="mt-3">

                            <a
                                href="{{ url('/portfolio/' . $project->slug) }}"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-black transition-all duration-300 hover:gap-3"
                            >

                                Lihat Detail

                                <span>
                                    →
                                </span>

                            </a>

                        </div>

                    </div>


                    {{-- =========================
                        IMAGE
                    ========================== --}}
                    @if ($image)

                        <div
                            class="absolute right-[18px] top-0 h-full w-[108px] overflow-hidden rounded-t-[11px]"
                        >

                            <img
                                src="{{ asset('storage/' . $image->image) }}"
                                alt="{{ $image->alt_text ?? $project->title }}"
                                class="h-full w-full object-contain object-bottom transition duration-500 group-hover:scale-[1.03]"
                            >

                        </div>

                    @else

                        {{-- DEFAULT JIKA TIDAK ADA FOTO --}}
                        <div
                            class="absolute right-[18px] top-0 flex h-full w-[108px] items-center justify-center bg-white/20"
                        >

                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-xl bg-black/5 text-2xl text-black"
                            >
                                ◆
                            </div>

                        </div>

                    @endif

                </article>


            @empty

                {{-- =========================
                    EMPTY STATE
                ========================== --}}
                <div
                    class="col-span-full rounded-[18px] border border-dashed border-black/20 bg-white/40 px-6 py-16 text-center"
                >

                    <div
                        class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-black/5 text-xl text-black"
                    >
                        ◆
                    </div>

                    <h3
                        class="mt-5 text-xl font-bold text-black"
                    >
                        Belum Ada Project
                    </h3>

                    <p
                        class="mt-2 text-sm text-black"
                    >
                        Project yang ditambahkan melalui dashboard admin
                        akan tampil di bagian ini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>