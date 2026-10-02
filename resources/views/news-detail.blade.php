@extends('layouts.app')

@section('title', $news->title . ' - PT Bramax Teknologi Indonesia')

@section('content')

<main class="min-h-screen bg-white px-4 pb-16 pt-24 text-[#171717] sm:px-6 sm:pt-28 md:px-[7%] md:pb-20 md:pt-32 lg:pb-[100px] lg:pt-[140px]">

    <div class="mx-auto max-w-[1000px]">

        {{-- KEMBALI --}}
        <div class="mb-8">

            <a
                href="{{ route('insights') }}"
                class="inline-flex items-center gap-2 text-sm font-semibold text-[#D90000] transition hover:text-[#e91e63]"
            >
                <span>←</span>
                Kembali ke Insights
            </a>

        </div>


        <article>

            {{-- KATEGORI --}}
            <span
                class="text-xs font-bold uppercase tracking-[0.2em] text-[#D90000] sm:text-sm"
            >
                {{ $news->category->name ?? 'News' }}
            </span>


            {{-- JUDUL --}}
            <h1
                class="mt-4 max-w-[900px] text-3xl font-bold leading-tight text-[#171717] sm:text-4xl md:text-5xl lg:text-[clamp(40px,5vw,64px)]"
            >
                {{ $news->title }}
            </h1>


            {{-- TANGGAL --}}
            @if ($news->published_at)

                <p class="mt-5 text-sm font-medium text-[#777777]">
                    {{ $news->published_at->format('d M Y') }}
                </p>

            @endif


            {{-- FOTO --}}
            @if ($news->featured_image)

                <div class="mt-8 overflow-hidden rounded-2xl sm:mt-10">

                    <img
                        src="{{ asset('storage/' . $news->featured_image) }}"
                        alt="{{ $news->title }}"
                        class="max-h-[550px] w-full object-cover"
                    >

                </div>

            @endif


            {{-- KONTEN --}}
            <div
                class="prose prose-lg mt-10 max-w-none text-[#444444] prose-headings:text-[#171717] prose-a:text-[#D90000] prose-strong:text-[#171717] sm:mt-12"
            >

                {!! nl2br(e($news->content)) !!}

            </div>


            {{-- AUTHOR --}}
            <div class="mt-12 border-t border-gray-200 pt-6">

                <p class="text-sm text-[#777777]">

                    <span class="font-semibold text-[#171717]">
                        Penulis:
                    </span>

                    {{ $news->author->name ?? 'Administrator' }}

                </p>

            </div>

        </article>

    </div>

</main>

@endsection