@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white text-black">

    {{-- Hero Category --}}
    <section class="border-b border-gray-100 bg-white">
        <div class="max-w-7xl mx-auto px-6 py-20 md:py-24">

            {{-- Breadcrumb --}}
            <div class="mb-8">
                <a
                    href="{{ url('/') }}"
                    class="text-sm text-gray-500 hover:text-red-600 transition"
                >
                    Home
                </a>

                <span class="mx-2 text-gray-300">/</span>

                <span class="text-sm text-red-600 font-medium">
                    Business Category
                </span>
            </div>

            {{-- Label --}}
            <p class="text-sm font-semibold text-red-600 uppercase tracking-[0.2em]">
                Business Category
            </p>

            {{-- Title --}}
            <h1 class="mt-4 text-4xl md:text-6xl font-bold tracking-tight text-black">
                {{ $category->name }}
            </h1>

            {{-- Description --}}
            @if ($category->description)
                <p class="mt-6 max-w-3xl text-lg leading-relaxed text-gray-600">
                    {{ $category->description }}
                </p>
            @endif

            {{-- Service Count --}}
            <div class="mt-8 flex items-center gap-3">
                <span class="inline-flex items-center rounded-full border border-red-100 bg-red-50 px-4 py-2 text-sm font-medium text-red-600">
                    {{ $category->services->count() }} Services
                </span>
            </div>

        </div>
    </section>


    {{-- Services --}}
    <section class="bg-gray-50 py-20 md:py-24">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Section Header --}}
            <div class="max-w-2xl">
                <p class="text-sm font-semibold text-red-600 uppercase tracking-[0.2em]">
                    Our Services
                </p>

                <h2 class="mt-3 text-3xl md:text-4xl font-bold tracking-tight text-black">
                    Services in this Category
                </h2>

                <p class="mt-4 text-gray-600 leading-relaxed">
                    Explore the services available in
                    {{ $category->name }}.
                </p>
            </div>


            {{-- Service Grid --}}
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($category->services as $service)

                    <div
                        class="group overflow-hidden rounded-2xl border border-gray-200 bg-white
                               transition-all duration-300
                               hover:-translate-y-1 hover:border-red-200 hover:shadow-xl"
                    >

                        {{-- Service Image --}}
                        <div class="relative h-56 overflow-hidden bg-gray-100">

                            @if ($service->image)

                                <img
                                    src="{{ asset('storage/' . $service->image) }}"
                                    alt="{{ $service->name }}"
                                    class="w-full h-full object-cover
                                           group-hover:scale-105
                                           transition-transform duration-500"
                                >

                            @else

                                <div class="w-full h-full flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-red-50 text-red-500">
                                            +
                                        </div>

                                        <p class="text-sm text-gray-400">
                                            No Image
                                        </p>
                                    </div>
                                </div>

                            @endif

                            {{-- Image Badge --}}
                            <div class="absolute top-4 left-4">
                                <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-red-600 shadow-sm">
                                    {{ $category->name }}
                                </span>
                            </div>

                        </div>


                        {{-- Card Content --}}
                        <div class="p-6">

                            {{-- Service Name --}}
                            <h3
                                class="text-xl font-semibold text-black
                                       group-hover:text-red-600
                                       transition"
                            >
                                {{ $service->name }}
                            </h3>


                            {{-- Description --}}
                            @if ($service->description)

                                <p class="mt-3 text-gray-600 leading-relaxed line-clamp-3">
                                    {{ $service->description }}
                                </p>

                            @else

                                <p class="mt-3 text-gray-400 leading-relaxed">
                                    Discover more about this service from BRAMAX.
                                </p>

                            @endif


                            {{-- Learn More --}}
                            <div class="mt-6">

                                <a
                                    href="{{ route('services.show', $service->slug) }}"
                                    class="inline-flex items-center gap-2
                                           text-sm font-semibold
                                           text-red-600
                                           hover:text-red-700
                                           transition"
                                >

                                    Learn More

                                    <span
                                        class="transition-transform duration-300
                                               group-hover:translate-x-1"
                                    >
                                        →
                                    </span>

                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    {{-- Empty State --}}
                    <div class="col-span-full rounded-2xl border border-gray-200 bg-white p-12 text-center">

                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-red-50 text-red-600 text-xl">
                            !
                        </div>

                        <h3 class="mt-5 text-lg font-semibold text-black">
                            Belum ada service
                        </h3>

                        <p class="mt-2 text-gray-500">
                            Belum ada service yang tersedia untuk kategori ini.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>
    </section>


    {{-- CTA --}}
    <x-cta />

</div>

@endsection