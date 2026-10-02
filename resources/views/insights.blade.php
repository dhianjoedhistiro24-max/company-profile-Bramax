@extends('layouts.app')

@section('title', 'Insights & Berita - PT Bramax Teknologi Indonesia')

@section('content')

<main class="min-h-screen bg-[#111111] px-4 pb-16 pt-24 text-white sm:px-6 sm:pt-28 md:px-[7%] md:pb-20 md:pt-32 lg:pb-[100px] lg:pt-[140px]">

    <div class="mx-auto max-w-[1200px]">

        <!-- HEADER -->
        <div class="mx-auto mb-10 max-w-[600px] text-center sm:mb-12 md:mb-[60px]">

            <span class="text-xs font-semibold tracking-[0.15em] text-[#e40046] sm:text-sm sm:tracking-[0.2em]">
                PUSAT INFORMASI
            </span>

            <h1 class="mt-3 mb-4 text-3xl font-bold leading-tight text-white sm:text-4xl md:text-[clamp(32px,4vw,46px)]">
                Berita &

                <span class="bg-gradient-to-r from-[#e40046] to-[#ff4f81] bg-clip-text text-transparent">
                    Artikel Terbaru
                </span>
            </h1>

            <p class="text-sm leading-relaxed text-[#a0a0a0] sm:text-base sm:leading-[1.6]">
                Temukan berbagai artikel mendalam seputar teknologi,
                inovasi IoT, dan perkembangan terbaru dari@extends('layouts.app')

@section('title', 'Insights & Berita - PT Bramax Teknologi Indonesia')

@section('content')

<main class="min-h-screen bg-white px-4 pb-16 pt-24 text-[#171717] sm:px-6 sm:pt-28 md:px-[7%] md:pb-20 md:pt-32 lg:pb-[100px] lg:pt-[140px]">

    <div class="mx-auto max-w-[1200px]">

        <!-- HEADER -->
        <div class="mx-auto mb-10 max-w-[650px] text-center sm:mb-12 md:mb-[60px]">

            <span class="text-xs font-semibold tracking-[0.15em] text-[#D90000] sm:text-sm sm:tracking-[0.2em]">
                PUSAT INFORMASI
            </span>

            <h1 class="mt-3 mb-4 text-3xl font-bold leading-tight text-[#171717] sm:text-4xl md:text-[clamp(32px,4vw,46px)]">
                Berita &

                <span class="bg-gradient-to-r from-[#D90000] to-[#e91e63] bg-clip-text text-transparent">
                    Artikel Terbaru
                </span>
            </h1>

            <p class="text-sm leading-relaxed text-[#666666] sm:text-base sm:leading-[1.6]">
                Temukan berbagai artikel mendalam seputar teknologi,
                inovasi IoT, dan perkembangan terbaru dari
                PT Bramax Teknologi Indonesia.
            </p>

        </div>


        <!-- NEWS GRID -->
        <div class="grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3 lg:gap-x-8 lg:gap-y-14">

            @forelse ($news as $item)

                <article class="group">

                    <!-- IMAGE -->
                    <a
                        href="{{ route('insights.show', $item->slug) }}"
                        class="block overflow-hidden rounded-2xl bg-gray-100"
                    >

                        @if ($item->featured_image)

                            <img
                                src="{{ asset('storage/' . $item->featured_image) }}"
                                alt="{{ $item->title }}"
                                class="h-[180px] w-full object-cover transition-transform duration-500 group-hover:scale-105 sm:h-[190px] lg:h-[200px]"
                            >

                        @else

                            <div class="flex h-[180px] w-full items-center justify-center bg-gradient-to-br from-[#f5f5f5] to-[#eeeeee] text-4xl sm:h-[190px] lg:h-[200px]">
                                📰
                            </div>

                        @endif

                    </a>


                    <!-- CONTENT -->
                    <div class="pt-5">

                        <!-- DATE -->
                        @if ($item->published_at)

                            <span class="mb-3 block text-xs font-semibold text-[#D90000] sm:text-sm">
                                {{ $item->published_at->format('d M Y') }}
                            </span>

                        @endif


                        <!-- TITLE -->
                        <h2 class="text-lg font-semibold leading-[1.45] text-[#171717] sm:text-xl">

                            <a
                                href="{{ route('insights.show', $item->slug) }}"
                                class="transition-colors duration-200 hover:text-[#D90000]"
                            >
                                {{ $item->title }}
                            </a>

                        </h2>


                        <!-- DESCRIPTION -->
                        <p class="mt-3 text-sm leading-relaxed text-[#666666]">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 130) }}
                        </p>


                        <!-- READ MORE -->
                        <a
                            href="{{ route('insights.show', $item->slug) }}"
                            class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#D90000] transition duration-200 hover:text-[#e91e63]"
                        >
                            Baca Selengkapnya

                            <span class="transition-transform duration-200 group-hover:translate-x-1">
                                →
                            </span>

                        </a>

                    </div>

                </article>

            @empty

                <div class="col-span-full py-12 text-center sm:py-16">

                    <h2 class="text-xl font-bold text-[#171717] sm:text-2xl">
                        Belum ada berita
                    </h2>

                    <p class="mt-3 text-sm text-[#666666] sm:text-base">
                        Saat ini belum ada berita yang dipublikasikan.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</main>

@endsection
                PT Bramax Teknologi Indonesia.
            </p>

        </div>


        <!-- NEWS GRID -->
        <div class="grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3 lg:gap-x-8 lg:gap-y-14">

            @forelse ($news as $item)

                <article class="group">

                    <!-- IMAGE -->
                    <a
                        href="{{ route('insights.show', $item->slug) }}"
                        class="block overflow-hidden rounded-md"
                    >

                        @if ($item->featured_image)

                            <img
                                src="{{ asset('storage/' . $item->featured_image) }}"
                                alt="{{ $item->title }}"
                                class="h-[180px] w-full object-cover transition-transform duration-300 group-hover:scale-105 sm:h-[190px] lg:h-[200px]"
                            >

                        @else

                            <div class="flex h-[180px] w-full items-center justify-center bg-gradient-to-br from-[#222222] to-[#2a2a2a] text-4xl sm:h-[190px] lg:h-[200px]">
                                📰
                            </div>

                        @endif

                    </a>


                    <!-- CONTENT -->
                    <div class="pt-4">

                        <!-- DATE / CATEGORY -->
                        @if ($item->published_at)

                            <span class="mb-3 block text-xs font-semibold text-[#e40046] sm:text-sm">
                                {{ $item->published_at->format('d M Y') }}
                            </span>

                        @endif


                        <!-- TITLE -->
                        <h2 class="text-lg font-semibold leading-[1.45] text-white sm:text-xl">
                            <a
                                href="{{ route('insights.show', $item->slug) }}"
                                class="transition-colors duration-200 hover:text-[#ff4f81]"
                            >
                                {{ $item->title }}
                            </a>
                        </h2>


                        <!-- DESCRIPTION -->
                        <p class="mt-3 text-sm leading-relaxed text-[#a0a0a0]">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 130) }}
                        </p>


                        <!-- READ MORE -->
                        <a
                            href="{{ route('insights.show', $item->slug) }}"
                            class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#ff4f81] transition duration-200 hover:text-white"
                        >
                            Baca Selengkapnya
                            <span class="transition-transform duration-200 group-hover:translate-x-1">
                                →
                            </span>
                        </a>

                    </div>

                </article>

            @empty

                <div class="col-span-full py-12 text-center sm:py-16">

                    <h2 class="text-xl font-bold text-white sm:text-2xl">
                        Belum ada berita
                    </h2>

                    <p class="mt-3 text-sm text-[#a0a0a0] sm:text-base">
                        Saat ini belum ada berita yang dipublikasikan.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</main>

@endsection