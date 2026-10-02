@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white text-black">

    {{-- HERO --}}
    <section class="border-b border-gray-100 bg-white">
        <div class="max-w-7xl mx-auto px-6 py-20 md:py-24">

            {{-- Breadcrumb --}}
            <div class="mb-8 flex items-center gap-2 text-sm">
                <a
                    href="{{ url('/') }}"
                    class="text-gray-500 hover:text-[#D90000] transition"
                >
                    Home
                </a>

                <span class="text-gray-300">/</span>

                <span class="text-[#D90000] font-medium">
                    Creative & Media
                </span>
            </div>


            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                {{-- Text --}}
                <div>

                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                        Creative, Media, Design & Promotion
                    </p>

                    <h1 class="mt-4 text-4xl md:text-6xl font-bold tracking-tight leading-tight text-black">
                        Creative Solutions for
                        <span class="text-[#D90000]">
                            Stronger Brands
                        </span>
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-relaxed text-gray-600">
                        BRAMAX menyediakan solusi creative, media, design,
                        dan promotion untuk membantu bisnis membangun identitas,
                        menyampaikan pesan, dan memperkuat komunikasi dengan
                        audiens.
                    </p>


                    {{-- CTA --}}
                    <div class="mt-8 flex flex-wrap gap-3">

                        <a
                            href="{{ route('portfolio.index') }}"
                            class="inline-flex items-center gap-2 rounded-xl
                                   bg-[#D90000] px-6 py-3.5
                                   text-sm font-semibold text-white
                                   hover:bg-[#B80000]
                                   transition"
                        >
                            Lihat Portfolio
                            <span>→</span>
                        </a>

                        <a
                            href="{{ url('/#contact') }}"
                            class="inline-flex items-center gap-2 rounded-xl
                                   border border-gray-300
                                   bg-white px-6 py-3.5
                                   text-sm font-semibold text-black
                                   hover:border-[#D90000]
                                   hover:text-[#D90000]
                                   transition"
                        >
                            Diskusikan Kebutuhan
                        </a>

                    </div>

                </div>


                {{-- Visual --}}
                <div>

                    @if($category->image)

                        <div class="overflow-hidden rounded-3xl border border-gray-200">
                            <img
                                src="{{ asset('storage/' . $category->image) }}"
                                alt="{{ $category->name }}"
                                class="w-full h-[360px] md:h-[430px] object-cover"
                            >
                        </div>

                    @else

                        <div class="h-[360px] md:h-[430px]
                                    rounded-3xl
                                    border border-red-100
                                    bg-red-50
                                    flex items-center justify-center">

                            <div class="text-center px-8">

                                <div class="mx-auto flex h-20 w-20 items-center justify-center
                                            rounded-2xl bg-white border border-red-100">

                                    <span class="text-3xl font-bold text-[#D90000]">
                                        +
                                    </span>

                                </div>

                                <p class="mt-5 text-sm text-gray-500">
                                    Creative & Media
                                </p>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>
    </section>


    {{-- CAPABILITIES --}}
    <section class="py-20 md:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">

            <div class="max-w-2xl mb-12">

                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                    Our Capabilities
                </p>

                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-black">
                    Creative & Media Services
                </h2>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    Explore our creative capabilities across branding,
                    design, content, photography, film/video, and research.
                </p>

            </div>


            {{-- Services --}}
            @if($category->services->count())

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($category->services as $service)

                        <a
                            href="{{ route('services.show', $service->slug) }}"
                            class="group rounded-2xl
                                   border border-gray-200
                                   bg-white
                                   overflow-hidden
                                   hover:-translate-y-1
                                   hover:border-red-200
                                   hover:shadow-lg
                                   transition-all duration-300"
                        >

                            {{-- Image --}}
                            <div class="h-52 bg-gray-100 overflow-hidden">

                                @if($service->image)

                                    <img
                                        src="{{ asset('storage/' . $service->image) }}"
                                        alt="{{ $service->name }}"
                                        class="w-full h-full object-cover
                                               group-hover:scale-105
                                               transition-transform duration-500"
                                    >

                                @else

                                    <div class="w-full h-full flex items-center justify-center">

                                        <div class="flex h-14 w-14 items-center justify-center
                                                    rounded-xl bg-red-50
                                                    border border-red-100">

                                            <span class="text-[#D90000] font-bold">
                                                +
                                            </span>

                                        </div>

                                    </div>

                                @endif

                            </div>


                            {{-- Content --}}
                            <div class="p-6">

                                @if($service->icon)

                                    <div class="mb-5 flex h-11 w-11 items-center justify-center
                                                rounded-xl bg-red-50
                                                border border-red-100">

                                        <span class="text-xs font-semibold text-[#D90000]">
                                            {{ $service->icon }}
                                        </span>

                                    </div>

                                @endif


                                <h3
                                    class="text-xl font-semibold text-black
                                           group-hover:text-[#D90000]
                                           transition"
                                >
                                    {{ $service->name }}
                                </h3>


                                @if($service->description)

                                    <p class="mt-3 text-sm leading-relaxed text-gray-600 line-clamp-3">
                                        {{ $service->description }}
                                    </p>

                                @endif


                                <div class="mt-5 text-sm font-semibold text-[#D90000]">
                                    Lihat Detail →
                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            @else

                <div class="rounded-2xl border border-gray-200 bg-white p-10 text-center">

                    <p class="text-gray-500">
                        Belum ada service untuk kategori ini.
                    </p>

                </div>

            @endif

        </div>
    </section>


    {{-- CREATIVE FOCUS --}}
    <section class="py-20 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <div class="max-w-2xl mb-12">

                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                    Creative Focus
                </p>

                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-black">
                    Supporting Your Brand & Communication
                </h2>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    BRAMAX menghadirkan layanan creative yang mencakup
                    beberapa kebutuhan utama dalam komunikasi dan promosi bisnis.
                </p>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Branding --}}
                <div class="rounded-2xl border border-gray-200 p-7">

                    <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-100
                                flex items-center justify-center">

                        <span class="font-bold text-[#D90000]">
                            01
                        </span>

                    </div>

                    <h3 class="mt-5 text-xl font-semibold">
                        Branding
                    </h3>

                    <p class="mt-3 text-gray-600 leading-relaxed">
                        Mendukung kebutuhan branding dan identitas untuk
                        memperkuat karakter komunikasi bisnis.
                    </p>

                </div>


                {{-- Design --}}
                <div class="rounded-2xl border border-gray-200 p-7">

                    <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-100
                                flex items-center justify-center">

                        <span class="font-bold text-[#D90000]">
                            02
                        </span>

                    </div>

                    <h3 class="mt-5 text-xl font-semibold">
                        Design
                    </h3>

                    <p class="mt-3 text-gray-600 leading-relaxed">
                        Solusi desain untuk kebutuhan visual dan komunikasi
                        yang mendukung aktivitas bisnis.
                    </p>

                </div>


                {{-- Content --}}
                <div class="rounded-2xl border border-gray-200 p-7">

                    <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-100
                                flex items-center justify-center">

                        <span class="font-bold text-[#D90000]">
                            03
                        </span>

                    </div>

                    <h3 class="mt-5 text-xl font-semibold">
                        Content
                    </h3>

                    <p class="mt-3 text-gray-600 leading-relaxed">
                        Pengembangan content kreatif untuk mendukung
                        komunikasi dan promosi bisnis.
                    </p>

                </div>


                {{-- Photography --}}
                <div class="rounded-2xl border border-gray-200 p-7">

                    <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-100
                                flex items-center justify-center">

                        <span class="font-bold text-[#D90000]">
                            04
                        </span>

                    </div>

                    <h3 class="mt-5 text-xl font-semibold">
                        Photography
                    </h3>

                    <p class="mt-3 text-gray-600 leading-relaxed">
                        Kebutuhan photography untuk menghasilkan materi
                        visual yang mendukung bisnis dan promosi.
                    </p>

                </div>


                {{-- Film / Video --}}
                <div class="rounded-2xl border border-gray-200 p-7">

                    <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-100
                                flex items-center justify-center">

                        <span class="font-bold text-[#D90000]">
                            05
                        </span>

                    </div>

                    <h3 class="mt-5 text-xl font-semibold">
                        Film & Video
                    </h3>

                    <p class="mt-3 text-gray-600 leading-relaxed">
                        Produksi film dan video untuk kebutuhan dokumentasi
                        maupun komunikasi visual.
                    </p>

                </div>


                {{-- Research --}}
                <div class="rounded-2xl border border-gray-200 p-7">

                    <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-100
                                flex items-center justify-center">

                        <span class="font-bold text-[#D90000]">
                            06
                        </span>

                    </div>

                    <h3 class="mt-5 text-xl font-semibold">
                        Creative Research
                    </h3>

                    <p class="mt-3 text-gray-600 leading-relaxed">
                        Research sebagai bagian dari kebutuhan creative
                        dan komunikasi bisnis.
                    </p>

                </div>

            </div>

        </div>
    </section>


    {{-- CTA --}}
    <section class="py-20 bg-[#D90000]">
        <div class="max-w-4xl mx-auto px-6 text-center">

            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-white">
                Start a Conversation
            </p>

            <h2 class="mt-3 text-3xl md:text-4xl font-bold text-white">
                Punya Kebutuhan Creative & Media?
            </h2>

            <p class="mt-5 text-white/90 leading-relaxed">
                Diskusikan kebutuhan branding, desain, content,
                photography, film/video, atau creative research
                bersama tim BRAMAX.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-3">

                <a
                    href="{{ route('portfolio.index') }}"
                    class="inline-flex items-center gap-2
                           rounded-xl bg-white
                           px-6 py-3.5
                           text-sm font-semibold
                           text-[#D90000]
                           hover:bg-gray-100
                           transition"
                >
                    Lihat Portfolio
                    <span>→</span>
                </a>

                <a
                    href="{{ url('/#contact') }}"
                    class="inline-flex items-center gap-2
                           rounded-xl border border-white
                           px-6 py-3.5
                           text-sm font-semibold
                           text-white
                           hover:bg-white
                           hover:text-[#D90000]
                           transition"
                >
                    Diskusikan Kebutuhan
                </a>

            </div>

        </div>
    </section>

</div>

@endsection