@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white text-[#252525]">

    {{-- =====================================================
         HERO
    ====================================================== --}}

    <section class="relative overflow-hidden border-b border-gray-100 bg-white">

        {{-- Decorative Elements --}}
        <div class="pointer-events-none absolute -right-32 -top-32 h-80 w-80 rounded-full border-[40px] border-red-50"></div>

        <div class="pointer-events-none absolute -bottom-24 -left-24 h-64 w-64 rounded-full border-[30px] border-gray-50"></div>

        <div class="relative mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">

            <div class="max-w-4xl">

                {{-- Label --}}
                <div class="mb-6 flex items-center gap-3">

                    <span class="h-px w-10 bg-[#D90000]"></span>

                    <span class="text-sm font-bold uppercase tracking-[0.2em] text-[#D90000]">
                        Resources
                    </span>

                </div>


                {{-- Heading --}}
                <h1 class="max-w-4xl text-4xl font-black leading-tight tracking-tight text-[#151515] sm:text-5xl lg:text-6xl">

                    Dokumen &

                    <span class="text-[#D90000]">
                        Resources
                    </span>

                    BRAMAX

                </h1>


                {{-- Description --}}
                <p class="mt-6 max-w-2xl text-base leading-8 text-gray-500 sm:text-lg">

                    Akses berbagai dokumen dan informasi resmi BRAMAX
                    untuk mengenal lebih dekat perusahaan, layanan,
                    dan solusi yang kami hadirkan.

                </p>

            </div>

        </div>

    </section>


    {{-- =====================================================
         DOWNLOAD CONTENT
    ====================================================== --}}

    <section class="bg-[#f8f8f8] px-6 py-16 lg:px-8 lg:py-24">

        <div class="mx-auto max-w-6xl">


            {{-- Section Header --}}
            <div class="mb-12 flex flex-col justify-between gap-6 md:flex-row md:items-end">

                <div>

                    <p class="mb-3 text-sm font-bold uppercase tracking-[0.15em] text-[#D90000]">
                        Download Center
                    </p>

                    <h2 class="text-3xl font-black tracking-tight text-[#151515] sm:text-4xl">
                        Dokumen untuk Anda
                    </h2>

                </div>

                <p class="max-w-md text-sm leading-7 text-gray-500 md:text-right">
                    Temukan dokumen resmi yang tersedia untuk membantu
                    Anda memahami BRAMAX dan layanan yang kami tawarkan.
                </p>

            </div>


            {{-- Downloads --}}
            @if($downloads->count())

                <div class="grid gap-5 md:grid-cols-2">

                    @foreach($downloads as $download)

                        <article
                            class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:border-gray-300 hover:shadow-xl"
                        >

                            {{-- Red Accent --}}
                            <div class="absolute left-0 top-0 h-full w-1 bg-[#D90000]"></div>


                            <div class="flex flex-col gap-6 sm:flex-row sm:items-start">


                                {{-- Icon --}}
                                <div
                                    class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-red-50 text-[#D90000] transition duration-300 group-hover:bg-[#D90000] group-hover:text-white"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M14 3v6h5M9 14h6M9 17h4"
                                        />
                                    </svg>

                                </div>


                                {{-- Content --}}
                                <div class="min-w-0 flex-1">

                                    <div class="mb-2 flex flex-wrap items-center gap-2">

                                        <span class="rounded-full bg-red-50 px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-[#D90000]">
                                            PDF
                                        </span>

                                        <span class="text-xs text-gray-400">
                                            Official Document
                                        </span>

                                    </div>


                                    <h3 class="text-xl font-bold text-[#151515] transition group-hover:text-[#D90000]">
                                        {{ $download->title }}
                                    </h3>


                                    @if($download->description)

                                        <p class="mt-3 text-sm leading-7 text-gray-500">
                                            {{ $download->description }}
                                        </p>

                                    @endif


                                    @if($download->file)

                                        <div class="mt-5">

                                            <a
                                                href="{{ asset('storage/' . $download->file) }}"
                                                target="_blank"
                                                class="inline-flex items-center gap-2 text-sm font-bold text-[#D90000] transition hover:gap-3"
                                            >

                                                Download Dokumen

                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M8 10l4 4m0 0l4-4m-4 4V3"
                                                    />
                                                </svg>

                                            </a>

                                        </div>

                                    @endif

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                {{-- Empty State --}}
                <div class="rounded-2xl border border-gray-200 bg-white px-6 py-20 text-center">

                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gray-50 text-gray-400">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-9 w-9"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14 3v6h5"
                            />
                        </svg>

                    </div>

                    <h3 class="mt-6 text-xl font-bold text-[#252525]">
                        Dokumen belum tersedia
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-gray-500">
                        Dokumen yang dapat diunduh akan tersedia di halaman ini.
                    </p>

                </div>

            @endif

        </div>

    </section>


     <x-cta />

@endsection

