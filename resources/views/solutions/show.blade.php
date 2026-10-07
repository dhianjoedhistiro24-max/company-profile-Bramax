
@extends('layouts.app')

@section('title', $solution->title . ' - BRAMAX')

@section('content')

<div class="relative min-h-screen overflow-hidden bg-[#f8f8f8] text-[#252525]">

    {{-- =========================================================
        BACKGROUND FIXED
    ========================================================== --}}

    <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden">

        {{-- Background dasar --}}
        <div class="absolute inset-0 bg-[#f8f8f8]"></div>


        {{-- =====================================================
            SILUET BRAMAX
        ====================================================== --}}

        <div class="absolute left-1/2 top-[42%] -translate-x-1/2 -translate-y-1/2 whitespace-nowrap select-none">

            <span class="text-[150px] font-black tracking-[0.15em] text-[#D90000]/[0.025] md:text-[240px] lg:text-[320px]">
                BRAMAX
            </span>

        </div>


        {{-- =====================================================
            LEFT RED / PINK GEOMETRIC SHAPE
        ====================================================== --}}

        <div class="absolute -left-[145px] top-[70px] h-[360px] w-[360px] rotate-[30deg]">

            <div class="absolute inset-0 border-[55px] border-[#f18aa0]"></div>

            <div class="absolute inset-[55px] bg-[#f8f8f8]"></div>

        </div>


        {{-- =====================================================
            LEFT LOWER RED SHAPE
        ====================================================== --}}

        <div class="absolute -left-[175px] bottom-[80px] h-[300px] w-[300px] rotate-[30deg]">

            <div class="absolute inset-0 border-[48px] border-[#e9002d]"></div>

            <div class="absolute inset-[48px] bg-[#f8f8f8]"></div>

        </div>


        {{-- =====================================================
            RIGHT RED / PINK GEOMETRIC SHAPE
        ====================================================== --}}

        <div class="absolute -right-[170px] top-[430px] h-[380px] w-[380px] rotate-[30deg]">

            <div class="absolute inset-0 border-[50px] border-[#ed3155]"></div>

            <div class="absolute inset-[50px] bg-[#f8f8f8]"></div>

        </div>


        {{-- =====================================================
            RIGHT LOWER SHAPE
        ====================================================== --}}

        <div class="absolute -right-[170px] bottom-[20px] h-[300px] w-[300px] rotate-[30deg]">

            <div class="absolute inset-0 border-[45px] border-[#f21d45]"></div>

            <div class="absolute inset-[45px] bg-[#f8f8f8]"></div>

        </div>


        {{-- =====================================================
            HEXAGON KANAN ATAS
        ====================================================== --}}

        <div
            class="absolute right-[7%] top-[100px] h-[105px] w-[105px] border border-[#d9d9d9] opacity-50"
            style="clip-path: polygon(
                25% 6.7%,
                75% 6.7%,
                100% 50%,
                75% 93.3%,
                25% 93.3%,
                0% 50%
            );"
        ></div>


        {{-- =====================================================
            HEXAGON KANAN TENGAH
        ====================================================== --}}

        <div
            class="absolute right-[14%] top-[250px] h-[90px] w-[90px] border border-[#e1a8b4] opacity-40"
            style="clip-path: polygon(
                25% 6.7%,
                75% 6.7%,
                100% 50%,
                75% 93.3%,
                25% 93.3%,
                0% 50%
            );"
        ></div>


        {{-- =====================================================
            HEXAGON KIRI ATAS
        ====================================================== --}}

        <div
            class="absolute left-[25%] top-[20px] h-[80px] w-[80px] border border-[#e1a8b4] opacity-25"
            style="clip-path: polygon(
                25% 6.7%,
                75% 6.7%,
                100% 50%,
                75% 93.3%,
                25% 93.3%,
                0% 50%
            );"
        ></div>


        {{-- =====================================================
            GARIS DIAGONAL
        ====================================================== --}}

        <div class="absolute left-[22%] top-[25px] h-px w-[280px] rotate-[28deg] bg-[#e3a3af]/40"></div>

        <div class="absolute right-[22%] top-[70px] h-px w-[260px] -rotate-[28deg] bg-[#e3a3af]/40"></div>

        <div class="absolute left-[12%] bottom-[170px] h-px w-[200px] -rotate-[35deg] bg-[#e3a3af]/40"></div>

        <div class="absolute right-[10%] bottom-[250px] h-px w-[230px] rotate-[35deg] bg-[#e3a3af]/40"></div>


        {{-- =====================================================
            SOFT LIGHT EFFECT
        ====================================================== --}}

        <div class="absolute left-[35%] top-[15%] h-[300px] w-[300px] rounded-full bg-[#ef3155]/[0.025] blur-3xl"></div>

        <div class="absolute right-[30%] top-[45%] h-[350px] w-[350px] rounded-full bg-[#ef3155]/[0.02] blur-3xl"></div>

    </div>


    {{-- =========================================================
        CONTENT
    ========================================================== --}}

    <div class="relative z-10">


        {{-- =====================================================
            HEADER
        ====================================================== --}}

        <section class="border-b border-gray-100 bg-white/90">

            <div class="mx-auto max-w-6xl px-6 py-6">

                <a
                    href="{{ url('/') }}"
                    class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition hover:text-[#D90000]"
                >
                    <span class="text-base">←</span>
                    Kembali
                </a>

            </div>

        </section>


        {{-- =====================================================
            MAIN CONTENT
        ====================================================== --}}

        <section class="bg-transparent">

            <div class="mx-auto max-w-6xl px-6 py-10 md:py-12">


                {{-- IMAGE --}}
                @if ($solution->image)

                    <div class="mb-6 mr-8 w-full max-w-[440px] float-left">

                        <div class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-[0_10px_35px_rgba(0,0,0,0.06)]">

                            <img
                                src="{{ asset('storage/' . $solution->image) }}"
                                alt="{{ $solution->title }}"
                                class="block h-auto max-h-[500px] w-full object-contain"
                            >

                        </div>

                    </div>

                @endif


                {{-- TITLE + DESCRIPTION --}}
                <div>

                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-[#111111] md:text-4xl">
                        {{ $solution->title }}
                    </h1>


                    @if ($solution->description)

                        <div class="mt-4 whitespace-pre-line text-base leading-7 text-gray-600 text-justify">
                            {{ $solution->description }}
                        </div>

                    @endif

                </div>


                {{-- CLEAR FLOAT --}}
                <div class="clear-both"></div>

            </div>

        </section>


        {{-- =====================================================
            FEATURES
        ====================================================== --}}

        @if (!empty($solution->features))

            <section class="bg-white/90 py-12 md:py-14">

                <div class="mx-auto max-w-6xl px-6">

                    <div class="mb-7">

                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                            Features
                        </p>

                        <h2 class="mt-2 text-2xl font-bold tracking-tight text-[#111111] md:text-3xl">
                            Yang Kami Sediakan
                        </h2>

                    </div>


                    @php

                        $features = is_array($solution->features)
                            ? $solution->features
                            : json_decode($solution->features, true);

                    @endphp


                    @if (is_array($features) && count($features))

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

                            @foreach ($features as $feature)

                                <div class="group rounded-2xl border border-gray-200 bg-white p-5 transition duration-300 hover:border-[#D90000] hover:shadow-md">

                                    <div class="flex items-start gap-3">

                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#FFF1F1] text-[#D90000]">

                                            <span class="font-bold">
                                                ✓
                                            </span>

                                        </div>

                                        <h3 class="pt-1 font-semibold text-[#111111]">
                                            {{ $feature }}
                                        </h3>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @endif

                </div>

            </section>

        @endif


        {{-- =====================================================
            SERVICES
        ====================================================== --}}

        <section class="bg-transparent py-12 md:py-14">

            <div class="mx-auto max-w-6xl px-6">

                <div class="mb-7">

                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                        Our Services
                    </p>

                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-[#111111] md:text-3xl">
                        Layanan {{ $solution->title }}
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-500">
                        Layanan yang tersedia dalam solution ini.
                    </p>

                </div>


                @if ($solution->services->count())

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">

                        @foreach ($solution->services as $service)

                            <div class="group rounded-2xl border border-gray-200 bg-white p-6 transition duration-300 hover:border-[#D90000] hover:shadow-md">

                                {{-- ICON --}}
                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#FFF1F1] text-[#D90000]">

                                    @if ($service->icon)

                                        <span class="text-lg">
                                            {{ $service->icon }}
                                        </span>

                                    @else

                                        <span class="text-lg font-bold">
                                            +
                                        </span>

                                    @endif

                                </div>


                                {{-- CATEGORY --}}
                                @if ($service->category)

                                    <p class="mt-5 text-xs font-semibold uppercase tracking-[0.15em] text-[#D90000]">
                                        {{ $service->category->name }}
                                    </p>

                                @endif


                                {{-- SERVICE NAME --}}
                                <h3 class="mt-2 text-lg font-bold text-[#111111]">
                                    {{ $service->name }}
                                </h3>


                                {{-- DESCRIPTION --}}
                                @if ($service->description)

                                    <p class="mt-3 text-sm leading-6 text-gray-500">
                                        {{ $service->description }}
                                    </p>

                                @endif

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="rounded-2xl border border-gray-200 bg-white/90 px-6 py-12 text-center">

                        <p class="text-lg font-semibold text-[#111111]">
                            Belum ada layanan
                        </p>

                        <p class="mt-2 text-sm text-gray-500">
                            Layanan untuk solution ini belum tersedia.
                        </p>

                    </div>

                @endif

            </div>

        </section>


        <x-cta />


    </div>

</div>

@endsection

