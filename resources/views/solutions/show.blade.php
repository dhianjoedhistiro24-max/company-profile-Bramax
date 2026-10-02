
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white">

    {{-- Header --}}
    <section class="border-b border-gray-100 bg-white">

        <div class="max-w-6xl mx-auto px-6 py-14">

            {{-- Back --}}
            <div class="mb-7">

                <a
                    href="{{ route('solutions.digital') }}"
                    class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-[#B91C1C] transition"
                >
                    <span>←</span>
                    Back to Solutions
                </a>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                {{-- Text --}}
                <div>

                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-pink-600">
                        Solutions
                    </p>

                    <h1 class="mt-4 text-4xl md:text-5xl font-bold leading-tight text-black">
                        {{ $solution->title }}
                    </h1>

                    @if($solution->short_description)

                        <p class="mt-5 text-lg leading-relaxed text-gray-600">
                            {{ $solution->short_description }}
                        </p>

                    @endif

                </div>

                {{-- Image --}}
                <div>

                    @if($solution->image)

                        <div class="rounded-2xl overflow-hidden border border-gray-200">

                            <img
                                src="{{ asset('storage/' . $solution->image) }}"
                                alt="{{ $solution->title }}"
                                class="w-full h-[300px] object-cover"
                            >

                        </div>

                    @else

                        <div class="h-[300px] rounded-2xl bg-pink-50 border border-pink-200 flex items-center justify-center">

                            <div class="w-20 h-20 rounded-2xl bg-white border border-pink-200 flex items-center justify-center">

                                <span class="text-3xl font-bold text-[#B91C1C]">
                                    +
                                </span>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </section>


    {{-- Description --}}
    <section class="py-16">

        <div class="max-w-6xl mx-auto px-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                {{-- Main Content --}}
                <div class="lg:col-span-2">

                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#B91C1C]">
                        Overview
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-black">
                        Tentang Solution Ini
                    </h2>

                    @if($solution->description)

                        <div class="mt-5 text-gray-600 leading-8 whitespace-pre-line">
                            {{ $solution->description }}
                        </div>

                    @else

                        <p class="mt-5 text-gray-500">
                            Informasi mengenai solution ini belum tersedia.
                        </p>

                    @endif

                </div>


                {{-- Features --}}
                <div>

                    <div class="border border-gray-200 rounded-2xl p-6">

                        <p class="text-sm font-semibold uppercase tracking-[0.15em] text-pink-600">
                            Key Features
                        </p>

                        @if($solution->features && count($solution->features))

                            <ul class="mt-5 space-y-4">

                                @foreach($solution->features as $feature)

                                    <li class="flex items-start gap-3">

                                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-red-50 border border-red-200 flex items-center justify-center">

                                            <span class="text-xs font-bold text-[#B91C1C]">
                                                ✓
                                            </span>

                                        </span>

                                        <span class="text-gray-700">
                                            {{ $feature }}
                                        </span>

                                    </li>

                                @endforeach

                            </ul>

                        @else

                            <p class="mt-5 text-gray-500 text-sm">
                                Belum ada fitur yang ditambahkan.
                            </p>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- Services --}}
    <section class="py-16 bg-gray-50">

        <div class="max-w-6xl mx-auto px-6">

            <div class="mb-10">

                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#B91C1C]">
                    Our Services
                </p>

                <h2 class="mt-3 text-3xl font-bold text-black">
                    Layanan {{ $solution->title }}
                </h2>

                <p class="mt-4 max-w-2xl text-gray-600 leading-relaxed">
                    Jelajahi layanan yang tersedia dalam solution ini.
                </p>

            </div>

            @if($solution->services->count())

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($solution->services as $service)

                        <a
                            href="{{ route('services.show', $service->slug) }}"
                            class="group bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition duration-300"
                        >

                            @if($service->image)

                                <div class="h-48 overflow-hidden">

                                    <img
                                        src="{{ asset('storage/' . $service->image) }}"
                                        alt="{{ $service->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                    >

                                </div>

                            @endif

                            <div class="p-6">

                                @if($service->icon)

                                    <div class="w-11 h-11 rounded-xl bg-red-50 border border-red-100 flex items-center justify-center mb-5">

                                        <span class="text-[#B91C1C] font-semibold">
                                            {{ $service->icon }}
                                        </span>

                                    </div>

                                @endif

                                <h3 class="text-xl font-semibold text-black group-hover:text-[#B91C1C] transition">
                                    {{ $service->name }}
                                </h3>

                                @if($service->description)

                                    <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                                        {{ $service->description }}
                                    </p>

                                @endif

                                <div class="mt-5 text-sm font-semibold text-[#B91C1C]">
                                    Lihat Detail →
                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            @else

                <div class="border border-gray-200 rounded-2xl bg-white p-8 text-center">

                    <p class="text-gray-500">
                        Belum ada layanan untuk solution ini.
                    </p>

                </div>

            @endif

        </div>

    </section>


    {{-- CTA --}}
    <section class="py-8 bg-[#B91C1C]">

        <div class="max-w-xl mx-auto px-6 text-center">

            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-white">
                Start Your Project
            </p>

            <h2 class="mt-2 text-xl md:text-2xl font-bold text-white">
                Butuh Solution Ini untuk Bisnis Anda?
            </h2>

            <p class="mt-3 text-xs md:text-sm text-white/90 leading-relaxed">
                Hubungi tim BRAMAX untuk mendiskusikan kebutuhan
                dan solusi yang sesuai dengan bisnis Anda.
            </p>

            <div class="mt-5 flex flex-wrap justify-center gap-2">

                <a
                    href="#contact"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-[#B91C1C] rounded-lg font-semibold text-xs hover:bg-pink-50 transition"
                >
                    Konsultasi Sekarang
                    <span>→</span>
                </a>

                <a
                    href="{{ route('solutions.digital') }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 border border-white text-white rounded-lg font-semibold text-xs hover:bg-white hover:text-[#B91C1C] transition"
                >
                    Lihat Semua Solution
                </a>

            </div>

        </div>

    </section>

</div>

@endsection

