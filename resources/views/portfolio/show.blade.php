@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-white py-16 text-gray-900 md:py-24">


<div class="mx-auto max-w-[1100px] px-6">

    {{-- BACK --}}
    <div class="mb-10">
        <a
            href="{{ url('/#portfolio') }}"
            class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 transition hover:text-[#e40046]"
        >
            <span>←</span>
            Kembali ke Portfolio
        </a>
    </div>


    {{-- HEADER --}}
    <div class="max-w-3xl">

        @if ($project->category)

            <span class="text-sm font-semibold uppercase tracking-[0.2em] text-[#e40046]">
                {{ $project->category->name }}
            </span>

        @endif

        <h1 class="mt-4 text-3xl font-bold leading-tight md:text-5xl">
            {{ $project->title }}
        </h1>

        <div class="mt-6 flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-500">

            @if ($project->location)
                <span>{{ $project->location }}</span>
            @endif

            @if ($project->year)
                <span>{{ $project->year }}</span>
            @endif

            @if ($project->status)
                <span class="font-medium text-[#e40046]">
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

       <div class="mt-10 flex justify-center">

    <div class="w-full max-w-[800px] overflow-hidden rounded-2xl border border-gray-200 bg-gray-100 shadow-sm">

        <img
            src="{{ asset('storage/' . $mainImage->image) }}"
            alt="{{ $mainImage->alt_text ?? $project->title }}"
            class="h-[320px] w-full object-cover md:h-[400px]"
        >

    </div>

</div>

    @endif


    {{-- PROJECT INFORMATION --}}
    <div class="mt-12 grid gap-10 md:grid-cols-[1fr_320px]">

        {{-- DESCRIPTION --}}
        <div>

            @if ($project->scope)

                <div>

                    <h2 class="text-2xl font-bold">
                        Scope Project
                    </h2>

                    <div class="mt-4 leading-8 text-gray-600">
                        {!! nl2br(e($project->scope)) !!}
                    </div>

                </div>

            @endif

        </div>


        {{-- SIDEBAR --}}
        <aside>

            <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6">

                <h3 class="text-sm font-bold uppercase tracking-[0.15em] text-[#e40046]">
                    Project Info
                </h3>

                <div class="mt-6 space-y-5">

                    @if ($project->category)

                        <div>
                            <p class="text-xs text-gray-400">
                                Category
                            </p>

                            <p class="mt-1 font-semibold text-gray-900">
                                {{ $project->category->name }}
                            </p>
                        </div>

                    @endif


                    @if ($project->location)

                        <div>
                            <p class="text-xs text-gray-400">
                                Location
                            </p>

                            <p class="mt-1 font-semibold text-gray-900">
                                {{ $project->location }}
                            </p>
                        </div>

                    @endif


                    @if ($project->year)

                        <div>
                            <p class="text-xs text-gray-400">
                                Year
                            </p>

                            <p class="mt-1 font-semibold text-gray-900">
                                {{ $project->year }}
                            </p>
                        </div>

                    @endif


                    <div>
                        <p class="text-xs text-gray-400">
                            Status
                        </p>

                        <p class="mt-1 font-semibold text-[#e40046]">
                            {{ $project->status }}
                        </p>
                    </div>

                </div>

            </div>

        </aside>

    </div>


    {{-- GALLERY --}}
    @if ($project->images->count() > 1)

        <div class="mt-16">

            <div class="mb-6">

                <span class="text-xs font-semibold uppercase tracking-[0.2em] text-[#e40046]">
                    Gallery
                </span>

                <h2 class="mt-2 text-2xl font-bold">
                    Dokumentasi Project
                </h2>

            </div>


            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3">

                @foreach ($project->images->sortBy('sort_order') as $image)

                    <div class="group overflow-hidden rounded-2xl border border-gray-200 bg-gray-100">

                        <img
                            src="{{ asset('storage/' . $image->image) }}"
                            alt="{{ $image->alt_text ?? $project->title }}"
                            class="h-[220px] w-full object-cover transition duration-500 group-hover:scale-105"
                        >

                    </div>

                @endforeach

            </div>

        </div>

    @endif


    {{-- CTA --}}
    <div class="mt-20 rounded-3xl bg-[#e40046] px-8 py-12 text-center text-white">

        <h2 class="text-2xl font-bold md:text-3xl">
            Punya kebutuhan project serupa?
        </h2>

        <p class="mx-auto mt-3 max-w-xl text-sm leading-7 text-white/80">
            Hubungi BRAMAX untuk mendiskusikan kebutuhan bisnis
            dan solusi yang sesuai.
        </p>

        <a
            href="{{ url('/#contact') }}"
            class="mt-6 inline-flex rounded-full bg-white px-6 py-3 text-sm font-semibold text-[#e40046] transition hover:bg-pink-50"
        >
            Hubungi Kami
        </a>

    </div>

</div>


</section>

@endsection
