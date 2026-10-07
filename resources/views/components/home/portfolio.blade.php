{{-- =========================
    PORTFOLIO
========================= --}}
<section
    id="portfolio"
    class="relative overflow-hidden bg-[#F3F4F6] px-[7%] py-[80px] text-black md:py-[100px]"
>

    {{-- =========================
        DECORATION
    ========================= --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden">

        <div
            class="absolute -left-40 top-20 h-[420px] w-[420px] rounded-full border border-gray-200"
        ></div>

        <div
            class="absolute -right-40 bottom-0 h-[480px] w-[480px] rounded-full border border-gray-200"
        ></div>

        <div
            class="absolute left-[8%] top-[20%] h-2 w-2 rounded-full bg-gray-300"
        ></div>

        <div
            class="absolute right-[10%] top-[30%] h-2 w-2 rounded-full bg-gray-300"
        ></div>

        <div
            class="absolute bottom-[20%] left-[15%] h-2 w-2 rounded-full bg-gray-300"
        ></div>

    </div>


    {{-- =========================
        CONTAINER
    ========================= --}}
    <div class="relative z-10 mx-auto max-w-[1280px]">


        {{-- =========================
            HEADER
        ========================= --}}
        <div class="mb-16 text-center">

            <span
                class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]"
            >
                Portfolio
            </span>

            <h2
                class="mt-3 text-3xl font-bold tracking-tight text-gray-900 md:text-5xl"
            >
                Proyek Unggulan Kami
            </h2>

            <p
                class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-gray-600 md:text-base"
            >
                Berbagai proyek yang kami kerjakan untuk membantu bisnis
                berkembang melalui solusi yang tepat dan profesional.
            </p>

        </div>


        {{-- =========================
            PROJECT GRID
        ========================= --}}
        <div
            class="grid grid-cols-1 justify-items-center gap-10 md:grid-cols-2 lg:grid-cols-3"
        >

            @forelse ($projects as $project)

                @php
                    $image = $project->images
                        ->sortBy('sort_order')
                        ->first();
                @endphp


                {{-- =========================
                    PROJECT CARD
                ========================= --}}
                <article
                    class="group relative flex w-full justify-center"
                >

                    <div
                        class="relative flex h-[270px] w-full max-w-[380px] flex-col items-start justify-start gap-2 rounded-2xl border border-gray-200 bg-white p-5 shadow-[0_15px_35px_rgba(0,0,0,0.08)] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_25px_45px_rgba(0,0,0,0.12)]"
                    >

                        {{-- =========================
                            PROJECT IMAGE
                        ========================= --}}
                        @if ($image)

                            <div
                                class="absolute -bottom-6 -right-6 h-[55%] w-[50%] overflow-hidden rounded-xl border border-gray-200 bg-gray-100 shadow-md transition-all duration-700 group-hover:-translate-x-4 group-hover:-translate-y-4"
                            >

                                <img
                                    src="{{ asset('storage/' . $image->image) }}"
                                    alt="{{ $project->title }}"
                                    class="h-full w-full object-contain p-2 transition-transform duration-500 group-hover:scale-105"
                                >

                            </div>

                        @else

                            <div
                                class="absolute -bottom-6 -right-6 flex h-[55%] w-[50%] items-center justify-center rounded-xl border border-gray-200 bg-gray-100 shadow-md transition-all duration-700 group-hover:-translate-x-4 group-hover:-translate-y-4"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-10 w-10 text-gray-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 16l5-5 4 4 3-3 6 6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5v10a2 2 0 002 2z"
                                    />
                                </svg>

                            </div>

                        @endif


                        {{-- =========================
                            PROJECT CONTENT
                        ========================= --}}
                        <div
                            class="relative z-10 max-w-[62%]"
                        >

                            {{-- Category --}}
                            <span
                                class="text-[10px] font-semibold uppercase tracking-[0.18em] text-[#D90000]"
                            >
                                {{ $project->category->name ?? 'Portfolio' }}
                            </span>


                            {{-- Title --}}
                            <h3
                                class="mt-2 text-2xl font-bold leading-tight text-gray-900"
                            >
                                {{ $project->title }}
                            </h3>


                            {{-- Description --}}
                            <p
                                class="mt-2 line-clamp-3 text-sm leading-5 text-gray-500"
                            >
                                {{ $project->description ?: 'Proyek BRAMAX untuk membantu kebutuhan bisnis melalui solusi yang tepat dan profesional.' }}
                            </p>


                            {{-- =========================
                                BUTTON
                            ========================= --}}
                            <div class="relative z-20 mt-5">

                                <a
                                    href="{{ url('/portfolio/' . $project->slug) }}"  
                                    class="inline-flex items-center gap-2 rounded-lg bg-[#D90000] px-5 py-2.5 text-xs font-semibold text-white transition-all duration-300 hover:bg-[#B00000] hover:shadow-md"
                                >
                                    Lihat Proyek

                                    <span
                                        class="transition-transform duration-300 group-hover:translate-x-1"
                                    >
                                        →
                                    </span>

                                </a>

                            </div>

                        </div>

                    </div>

                </article>


            @empty

                {{-- =========================
                    EMPTY STATE
                ========================= --}}
                <div
                    class="col-span-full w-full rounded-2xl border border-dashed border-gray-300 bg-white px-6 py-16 text-center"
                >

                    <div
                        class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-gray-100 text-gray-400"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-8 w-8"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 7h16M4 12h16M4 17h10"
                            />
                        </svg>

                    </div>

                    <h3
                        class="mt-5 text-lg font-bold text-gray-900"
                    >
                        Belum Ada Proyek
                    </h3>

                    <p
                        class="mx-auto mt-2 max-w-md text-sm leading-6 text-gray-500"
                    >
                        Proyek yang telah selesai dan ditampilkan sebagai
                        portfolio akan muncul di bagian ini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>