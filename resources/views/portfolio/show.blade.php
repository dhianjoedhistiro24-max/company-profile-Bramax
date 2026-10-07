@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-white py-16 text-gray-900 md:py-24">

    <div class="mx-auto max-w-[1100px] px-6">

        {{-- BACK --}}
        <div class="mb-10">
            <a
                href="{{ url('/#portfolio') }}"
                class="group inline-flex items-center gap-2 text-sm font-semibold text-gray-500 transition hover:text-[#D90000]"
            >
                <span class="transition-transform duration-300 group-hover:-translate-x-1">
                    ←
                </span>
                Kembali ke Portfolio
            </a>
        </div>


        {{-- HEADER --}}
        <div class="max-w-4xl">

            @if ($project->category)
                <span class="inline-flex rounded-full bg-gray-100 px-4 py-2 text-xs font-bold uppercase tracking-[0.18em] text-[#D90000]">
                    {{ $project->category->name }}
                </span>
            @endif

            <h1 class="mt-5 text-4xl font-bold leading-tight tracking-tight text-gray-900 md:text-6xl">
                {{ $project->title }}
            </h1>

            <div class="mt-6 flex flex-wrap gap-3">

                @if ($project->location)
                    <span class="rounded-full border border-gray-200 bg-white px-4 py-2 text-sm text-gray-500">
                        {{ $project->location }}
                    </span>
                @endif

                @if ($project->year)
                    <span class="rounded-full border border-gray-200 bg-white px-4 py-2 text-sm text-gray-500">
                        {{ $project->year }}
                    </span>
                @endif

                @if ($project->status)
                    <span class="rounded-full bg-gray-900 px-4 py-2 text-sm font-semibold text-white">
                        {{ $project->status }}
                    </span>
                @endif

            </div>

        </div>


       {{-- MAIN IMAGE --}}
@php
    $mainImage = $project->images->sortBy('sort_order')->first();
@endphp

@if ($mainImage)

    <div class="mt-12 flex justify-center">

        <img
            src="{{ asset('storage/' . $mainImage->image) }}"
            alt="{{ $mainImage->alt_text ?? $project->title }}"
            class="max-h-[360px] max-w-[80%] object-contain md:max-h-[420px] md:max-w-[75%]"
        >

    </div>

@endif


        {{-- PROJECT INFORMATION --}}
        <div class="mt-14 grid gap-8 md:grid-cols-[1fr_320px]">

            {{-- DESCRIPTION --}}
            <div>

                @if ($project->scope)

                    <div class="rounded-3xl border border-gray-200 bg-white p-7 shadow-sm md:p-9">

                        <div class="mb-7 flex items-center gap-4">

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-900 text-sm font-bold text-white">
                                01
                            </div>

                            <div>
                                <span class="text-xs font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                                    Project
                                </span>

                                <h2 class="mt-1 text-2xl font-bold text-gray-900">
                                    Scope Project
                                </h2>
                            </div>

                        </div>

                        <div class="leading-8 text-gray-600">
                            {!! nl2br(e($project->scope)) !!}
                        </div>

                    </div>

                @endif

            </div>


            {{-- SIDEBAR --}}
            <aside>

                <div class="sticky top-8 rounded-3xl border border-gray-200 bg-gray-50 p-7">

                    <div class="flex items-center justify-between">

                        <h3 class="text-sm font-bold uppercase tracking-[0.15em] text-[#D90000]">
                            Project Info
                        </h3>

                        <span class="h-2 w-2 rounded-full bg-[#D90000]"></span>

                    </div>


                    <div class="mt-7 divide-y divide-gray-200">

                        @if ($project->category)

                            <div class="py-4 first:pt-0">

                                <p class="text-xs font-medium tracking-wider text-gray-400">
                                    Category
                                </p>

                                <p class="mt-1 font-semibold text-gray-900">
                                    {{ $project->category->name }}
                                </p>

                            </div>

                        @endif


                        @if ($project->location)

                            <div class="py-4">

                                <p class="text-xs font-medium tracking-wider text-gray-400">
                                    Location
                                </p>

                                <p class="mt-1 font-semibold text-gray-900">
                                    {{ $project->location }}
                                </p>

                            </div>

                        @endif


                        @if ($project->year)

                            <div class="py-4">

                                <p class="text-xs font-medium tracking-wider text-gray-400">
                                    Year
                                </p>

                                <p class="mt-1 font-semibold text-gray-900">
                                    {{ $project->year }}
                                </p>

                            </div>

                        @endif


                        @if ($project->status)

                            <div class="py-4 pb-0">

                                <p class="text-xs font-medium tracking-wider text-gray-400">
                                    Status
                                </p>

                                <div class="mt-2 inline-flex items-center gap-2 rounded-full bg-white px-3 py-1.5 text-sm font-semibold text-[#D90000]">

                                    <span class="h-1.5 w-1.5 rounded-full bg-[#D90000]"></span>

                                    {{ $project->status }}

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            </aside>

        </div>


        {{-- GALLERY --}}
        @if ($project->images->count() > 1)

            <div class="mt-20">

                <div class="mb-8 flex items-end justify-between gap-6">

                    <div>

                        <span class="text-xs font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                            Gallery
                        </span>

                        <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900">
                            Dokumentasi Project
                        </h2>

                    </div>

                    <span class="hidden text-sm text-gray-400 md:block">
                        {{ $project->images->count() }} Foto
                    </span>

                </div>


                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">

                    @foreach ($project->images->sortBy('sort_order') as $image)

                        <div class="rounded-2xl border border-gray-200 bg-gray-100 p-2 shadow-sm transition duration-500 hover:-translate-y-1 hover:shadow-lg">

                            <div class="flex h-[220px] items-center justify-center overflow-hidden rounded-xl bg-white">

                                <img
                                    src="{{ asset('storage/' . $image->image) }}"
                                    alt="{{ $image->alt_text ?? $project->title }}"
                                    class="max-h-[190px] max-w-[90%] object-contain"
                                >

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        @endif


        {{-- CTA --}}
        <div class="mt-20">
            <x-cta />
        </div>

    </div>

</section>

@endsection