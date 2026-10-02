@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white text-black">

    {{-- Hero --}}
<section class="border-b border-gray-100">
    <div class="mx-auto max-w-6xl px-6 py-20 md:py-28">

        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-20">

            {{-- Left: Title --}}
            <div>

                <p class="mb-5 text-sm font-semibold uppercase tracking-[0.25em] text-[#D90000]">
                    About BRAMAX
                </p>

                <h1 class="text-4xl font-bold leading-tight tracking-tight md:text-6xl">
                    {{ $about->title }}
                </h1>

                <div class="mt-8 h-1 w-16 bg-[#D90000]"></div>

            </div>


            {{-- Right: Banner --}}
            @if($about->banner)
                <div>
                    <div class="overflow-hidden rounded-3xl border border-gray-200 bg-gray-100 shadow-[0_15px_50px_rgba(0,0,0,0.08)]">

                        <img
                            src="{{ asset('storage/' . $about->banner) }}"
                            alt="{{ $about->title }}"
                            class="h-[320px] w-full object-cover md:h-[400px]"
                        >

                    </div>
                </div>
            @endif

        </div>

    </div>
</section>
    {{-- Content --}}
    <section class="py-20 md:py-28">
        <div class="mx-auto max-w-6xl px-6">

            <div class="grid gap-14 md:grid-cols-[1fr_1.5fr]">

                {{-- Label --}}
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-gray-400">
                        Who We Are
                    </p>

                    <h2 class="mt-4 text-3xl font-bold leading-tight md:text-4xl">
                        Technology-enabled
                        <span class="text-[#D90000]">
                            Business Partner
                        </span>
                    </h2>
                </div>


                {{-- Description --}}
                <div class="max-w-3xl">

                    <div class="whitespace-pre-line text-lg leading-8 text-gray-600">
                        {{ $about->content }}
                    </div>

                    @if($about->cta)
                        <div class="mt-10">
                            <a
                                href="{{ route('home') }}#contact"
                                class="inline-flex items-center rounded-full bg-[#D90000] px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-[#b80000] hover:shadow-lg"
                            >
                                {{ $about->cta }}

                                <span class="ml-2">
                                    →
                                </span>
                            </a>
                        </div>
                    @endif

                </div>

            </div>

        </div>
    </section>


    {{-- Values --}}
    <section class="border-t border-gray-100 bg-gray-50 py-20 md:py-24">
        <div class="mx-auto max-w-6xl px-6">

            <div class="mb-12 max-w-2xl">

                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                    Our Approach
                </p>

                <h2 class="mt-3 text-3xl font-bold md:text-4xl">
                    Solusi yang berorientasi pada kebutuhan bisnis
                </h2>

            </div>


            <div class="grid gap-6 md:grid-cols-3">

                <div class="rounded-2xl border border-gray-200 bg-white p-7">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-xl bg-[#fff0f0] text-[#D90000]">
                        01
                    </div>

                    <h3 class="text-lg font-bold">
                        Technology
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-gray-500">
                        Memanfaatkan teknologi untuk menciptakan solusi yang efektif,
                        terintegrasi, dan relevan.
                    </p>
                </div>


                <div class="rounded-2xl border border-gray-200 bg-white p-7">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-xl bg-[#fff0f0] text-[#D90000]">
                        02
                    </div>

                    <h3 class="text-lg font-bold">
                        Business
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-gray-500">
                        Memahami kebutuhan bisnis dan menerjemahkannya menjadi
                        solusi yang dapat diterapkan.
                    </p>
                </div>


                <div class="rounded-2xl border border-gray-200 bg-white p-7">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-xl bg-[#fff0f0] text-[#D90000]">
                        03
                    </div>

                    <h3 class="text-lg font-bold">
                        Impact
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-gray-500">
                        Berorientasi pada hasil dan dampak nyata bagi klien,
                        partner, dan perkembangan bisnis.
                    </p>
                </div>

            </div>

        </div>
    </section>


   {{-- CTA --}}
<section class="border-t border-gray-100 bg-white py-20 md:py-24">
    <div class="mx-auto max-w-6xl px-6">

        <div
            class="relative overflow-hidden rounded-3xl
                   border border-gray-200 bg-white
                   px-8 py-12
                   shadow-[0_10px_40px_rgba(0,0,0,0.05)]
                   md:px-14 md:py-14"
        >

            {{-- Red Accent --}}
            <div class="absolute left-0 top-0 h-full w-1.5 bg-[#D90000]"></div>

            <div class="relative flex flex-col gap-10 md:flex-row md:items-center md:justify-between">

                {{-- Text --}}
                <div class="max-w-2xl">

                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                        Let's Work Together
                    </p>

                    <h2 class="mt-4 text-3xl font-bold leading-tight text-black md:text-4xl">
                        Punya kebutuhan bisnis atau teknologi?
                    </h2>

                    <p class="mt-5 max-w-xl leading-7 text-gray-500">
                        Diskusikan kebutuhan Anda bersama BRAMAX dan temukan
                        solusi yang sesuai dengan tujuan bisnis Anda.
                    </p>

                </div>


                {{-- Button --}}
                <div class="shrink-0">

                    <a
                        href="{{ route('home') }}#contact"
                        class="group inline-flex items-center rounded-full
                               bg-[#D90000] px-7 py-3.5
                               text-sm font-semibold text-white
                               transition duration-300
                               hover:-translate-y-0.5
                               hover:bg-[#b80000]
                               hover:shadow-lg"
                    >
                        Diskusikan Kebutuhan

                        <span
                            class="ml-2 transition-transform duration-300
                                   group-hover:translate-x-1"
                        >
                            →
                        </span>
                    </a>

                </div>

            </div>

        </div>

    </div>
</section>
</div>

@endsection


