@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white">

    <section class="border-b border-gray-100 bg-white">
        <div class="max-w-7xl mx-auto px-6 py-14">

            <a
                href="{{ route('business-categories.show', $service->serviceCategory->slug) }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-[#D90000] transition"
            >
                <span>←</span>
                <span>{{ $service->serviceCategory->name }}</span>
            </a>

            <div class="mt-10 max-w-4xl">

                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                    {{ $service->serviceCategory->name }}
                </p>

                <h1 class="mt-4 text-4xl md:text-5xl font-bold leading-tight text-black">
                    {{ $service->name }}
                </h1>

                @if($service->description)
                    <p class="mt-5 text-lg leading-relaxed text-gray-600">
                        {{ $service->description }}
                    </p>
                @endif

            </div>

        </div>
    </section>

    <section class="py-16">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                <div class="lg:col-span-2">

                    @if($service->image)

                        <div class="rounded-2xl overflow-hidden border border-gray-200">
                            <img
                                src="{{ asset('storage/' . $service->image) }}"
                                alt="{{ $service->name }}"
                                class="w-full max-h-[500px] object-cover"
                            >
                        </div>

                    @endif

                    <div class="mt-10">

                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                            Service Overview
                        </p>

                        <h2 class="mt-3 text-3xl font-bold text-black">
                            Tentang {{ $service->name }}
                        </h2>

                        @if($service->description)

                            <div class="mt-5 text-gray-600 leading-8 whitespace-pre-line">
                                {{ $service->description }}
                            </div>

                        @else

                            <p class="mt-5 text-gray-500">
                                Informasi mengenai layanan ini belum tersedia.
                            </p>

                        @endif

                    </div>

                </div>

                <div>

                    <div class="border border-gray-200 rounded-2xl p-6">

                        <p class="text-sm font-semibold uppercase tracking-[0.15em] text-pink-600">
                            Service Information
                        </p>

                        <div class="mt-6 space-y-5">

                            <div>
                                <p class="text-xs uppercase tracking-wider text-gray-400">
                                    Business Category
                                </p>

                                <a
                                    href="{{ route('business-categories.show', $service->serviceCategory->slug) }}"
                                    class="mt-1 block font-semibold text-black hover:text-[#D90000] transition"
                                >
                                    {{ $service->serviceCategory->name }}
                                </a>
                            </div>

                            @if($service->solution)

                                <div>
                                    <p class="text-xs uppercase tracking-wider text-gray-400">
                                        Solution
                                    </p>

                                    <a
                                        href="{{ route('solutions.show', $service->solution->slug) }}"
                                        class="mt-1 block font-semibold text-black hover:text-[#D90000] transition"
                                    >
                                        {{ $service->solution->title }}
                                    </a>
                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

       <x-cta />
</div>

@endsection

