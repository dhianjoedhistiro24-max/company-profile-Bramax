@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white text-black">

{{-- Hero --}}
<section
    class="relative min-h-[650px] overflow-hidden border-b border-gray-100 bg-cover bg-center"
    @if($about->banner)
        style="background-image: url('{{ asset('storage/' . $about->banner) }}');"
    @endif
>

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-white/80"></div>

    {{-- Content --}}
    <div class="relative flex min-h-[650px] items-center">

        <div class="mx-auto w-full max-w-6xl px-6">

            <div class="max-w-3xl">

                <p class="mb-5 text-sm font-semibold uppercase tracking-[0.25em] text-[#D90000]">
                    About BRAMAX
                </p>

                <h1 class="text-4xl font-bold leading-tight tracking-tight text-black md:text-6xl">
                    {{ $about->title }}
                </h1>

                <div class="mt-8 h-1 w-16 bg-[#D90000]"></div>

            </div>

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


{{-- Vision & Mission --}}
<section class="border-t border-gray-100 bg-gray-50 py-20 md:py-24">

    <div class="mx-auto max-w-6xl px-6">

        <div class="mb-12 max-w-2xl">

            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                Our Direction
            </p>

            <h2 class="mt-3 text-3xl font-bold md:text-4xl">
                Visi & Misi
            </h2>

        </div>

        <div class="grid gap-6 md:grid-cols-2">

          
{{-- Visi --}}
<div class="group relative overflow-hidden rounded-3xl border border-gray-200 bg-white p-8 transition duration-300 hover:-translate-y-1 hover:border-gray-300 hover:shadow-xl md:p-10">

    {{-- Decorative Number --}}
    <div class="absolute -right-5 -top-10 select-none text-[150px] font-black leading-none text-gray-50 transition duration-300 group-hover:text-[#fff0f3]">
        VISI
    </div>

    <div class="relative">

        {{-- Top --}}
        <div class="flex items-center justify-between">

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#fff0f3] text-sm font-bold text-[#D90000]">
                01
            </div>

            <span class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">
                Direction
            </span>

        </div>

        {{-- Title --}}
        <div class="mt-10">

            <div class="mb-4 h-1 w-12 rounded-full bg-[#D90000]"></div>

            <h3 class="text-2xl font-bold tracking-tight text-black md:text-3xl">
                Visi
            </h3>

        </div>

        {{-- Content --}}
         
        <p class="mt-6 max-w-xl whitespace-pre-line text-base leading-8 text-gray-500">
            {{ $about->vision ?? 'Visi BRAMAX belum diatur.' }}
            
        </p>
        

        {{-- Bottom --}}
        <div class="mt-10 flex items-center gap-3 border-t border-gray-100 pt-5">

            <span class="h-2 w-2 rounded-full bg-[#D90000]"></span>

            <span class="text-xs font-medium uppercase tracking-[0.15em] text-gray-400">
                BRAMAX Vision
            </span>

        </div>

    </div>

</div>


{{-- Misi --}}
<div class="group relative overflow-hidden rounded-3xl border border-gray-200 bg-white p-8 transition duration-300 hover:-translate-y-1 hover:border-gray-300 hover:shadow-xl md:p-10">

    {{-- Decorative Number --}}
    <div class="absolute -right-5 -top-10 select-none text-[150px] font-black leading-none text-gray-50 transition duration-300 group-hover:text-[#fff0f3]">
        MISI
    </div>

    <div class="relative">

        {{-- Top --}}
        <div class="flex items-center justify-between">

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#fff0f3] text-sm font-bold text-[#D90000]">
                02
            </div>

            <span class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">
                Direction
            </span>

        </div>

        {{-- Title --}}
        <div class="mt-10">

            <div class="mb-4 h-1 w-12 rounded-full bg-[#D90000]"></div>

            <h3 class="text-2xl font-bold tracking-tight text-black md:text-3xl">
                Misi
            </h3>

        </div>

        {{-- Content --}}
        <p class="mt-6 max-w-xl whitespace-pre-line text-base leading-8 text-gray-500">
            {{ $about->mission ?? 'Misi BRAMAX belum diatur.' }}
        </p>

        {{-- Bottom --}}
        <div class="mt-10 flex items-center gap-3 border-t border-gray-100 pt-5">

            <span class="h-2 w-2 rounded-full bg-[#D90000]"></span>

            <span class="text-xs font-medium uppercase tracking-[0.15em] text-gray-400">
                BRAMAX Mission
            </span>

        </div>

    </div>

</div>



            </div>

        </div>

    </div>

</section>


<x-cta />


</div>

@endsection
