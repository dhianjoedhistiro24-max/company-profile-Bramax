```blade
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white text-black">

    {{-- =========================
         HERO CATEGORY
    ========================== --}}
    <section class="border-b border-gray-100 bg-white">

        <div class="mx-auto max-w-7xl px-6 py-20 md:py-24">

            {{-- Breadcrumb --}}
            <div class="mb-8">

                <a
                    href="{{ url('/') }}"
                    class="text-sm font-normal text-gray-500 transition hover:text-red-600"
                >
                    Home
                </a>

                <span class="mx-2 text-gray-300">
                    /
                </span>

                <span class="text-sm font-medium text-red-600">
                    Business Category
                </span>

            </div>

            {{-- Label --}}
            <p class="text-xs font-medium uppercase tracking-[0.25em] text-red-600">
                Business Category
            </p>

            {{-- Title --}}
            <h1
                class="mt-4 text-4xl font-medium tracking-[-0.03em] text-black md:text-6xl"
            >
                {{ $category->name }}
            </h1>

            {{-- Description --}}
            @if ($category->description)

                <p
                    class="mt-6 max-w-3xl text-base font-normal leading-7 text-gray-500 md:text-lg"
                >
                    {{ $category->description }}
                </p>

            @endif

            {{-- Service Count --}}
            <div class="mt-8">

                <span
                    class="inline-flex items-center rounded-full border border-red-100 bg-red-50 px-4 py-2 text-xs font-medium text-red-600"
                >
                    {{ $category->services->count() }} Services
                </span>

            </div>

        </div>

    </section>


    {{-- =========================
         SERVICES
    ========================== --}}
    <section class="bg-gray-50 py-20 md:py-24">

        <div class="mx-auto max-w-7xl px-6">

            {{-- Section Header --}}
            <div class="max-w-2xl">

                <p
                    class="text-xs font-medium uppercase tracking-[0.25em] text-red-600"
                >
                    Our Services
                </p>

                <h2
                    class="mt-3 text-3xl font-medium tracking-[-0.03em] text-black md:text-4xl"
                >
                    Services in this Category
                </h2>

                <p
                    class="mt-4 text-base font-normal leading-7 text-gray-500"
                >
                    Explore the services available in
                    {{ $category->name }}.
                </p>

            </div>


            {{-- =========================
                 SERVICE GRID
            ========================== --}}
            <div
                class="mt-14 grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3"
            >

                @forelse ($category->services as $service)

                    {{-- TILT CARD --}}
                    <div
                        class="tilt-card group relative"
                        style="perspective: 1000px;"
                    >

                        <a
                            href="{{ route('services.show', $service->slug) }}"
                            class="block"
                        >

                            <div
                                class="tilt-inner relative overflow-hidden rounded-3xl bg-gray-100 shadow-[0_20px_50px_rgba(0,0,0,0.12)] transition-transform duration-200 ease-out will-change-transform"
                            >

                                {{-- IMAGE --}}
                                <div
                                    class="relative aspect-[4/5] w-full overflow-hidden"
                                >

                                    @if ($service->image)

                                        <img
                                            src="{{ asset('storage/' . $service->image) }}"
                                            alt="{{ $service->name }}"
                                            class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                                        >

                                    @else

                                        <div
                                            class="flex h-full w-full items-center justify-center bg-gray-100"
                                        >

                                            <div class="text-center">

                                                <div
                                                    class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-red-50 text-xl font-medium text-red-600"
                                                >
                                                    +
                                                </div>

                                                <p
                                                    class="text-sm font-normal text-gray-400"
                                                >
                                                    No Image
                                                </p>

                                            </div>

                                        </div>

                                    @endif


                                    {{-- DARK OVERLAY --}}
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-black/5 transition-all duration-500 group-hover:from-black/90 group-hover:via-black/30"
                                    ></div>


                                    {{-- CATEGORY BADGE --}}
                                    <div
                                        class="absolute left-5 top-5"
                                    >

                                        <span
                                            class="rounded-full bg-white/90 px-4 py-2 text-[11px] font-medium tracking-wide text-gray-900 shadow-lg backdrop-blur-sm"
                                        >
                                            {{ $category->name }}
                                        </span>

                                    </div>


                                    {{-- TEXT ON IMAGE --}}
                                    <div
                                        class="absolute inset-x-0 bottom-0 p-6 md:p-7"
                                    >

                                        {{-- SERVICE TITLE --}}
                                        <h3
                                            class="text-2xl font-medium leading-tight tracking-[-0.02em] text-white drop-shadow-lg md:text-3xl"
                                        >
                                            {{ $service->name }}
                                        </h3>


                                        {{-- DESCRIPTION --}}
                                        @if ($service->description)

                                            <p
                                                class="mt-3 line-clamp-3 max-w-xl text-sm font-normal leading-6 text-white/85 drop-shadow-md md:text-base"
                                            >
                                                {{ $service->description }}
                                            </p>

                                        @else

                                            <p
                                                class="mt-3 text-sm font-normal leading-6 text-white/70"
                                            >
                                                Discover more about this service
                                                from BRAMAX.
                                            </p>

                                        @endif

                                    </div>


                                    {{-- ARROW --}}
                                    <div
                                        class="absolute bottom-6 right-6 flex h-11 w-11 items-center justify-center rounded-full bg-white/90 text-black shadow-lg backdrop-blur-sm transition-all duration-300 group-hover:-translate-y-1 group-hover:translate-x-1"
                                    >

                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M7 17L17 7M8 7h9v9"
                                            />
                                        </svg>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                @empty

                    {{-- EMPTY STATE --}}
                    <div
                        class="col-span-full rounded-3xl border border-gray-200 bg-white p-12 text-center"
                    >

                        <div
                            class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-red-50 text-xl text-red-600"
                        >
                            !
                        </div>

                        <h3
                            class="mt-5 text-lg font-medium text-black"
                        >
                            Belum ada service
                        </h3>

                        <p
                            class="mt-2 text-sm font-normal text-gray-500"
                        >
                            Belum ada service yang tersedia untuk kategori ini.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- =========================
         CTA
    ========================== --}}
    <x-cta />

</div>


{{-- =========================
     TILT CARD SCRIPT
========================== --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const cards = document.querySelectorAll('.tilt-card');

        cards.forEach(card => {

            const inner = card.querySelector('.tilt-inner');

            card.addEventListener('mousemove', function (event) {

                const rect = card.getBoundingClientRect();

                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateY =
                    ((x - centerX) / centerX) * 7;

                const rotateX =
                    ((centerY - y) / centerY) * 7;

                inner.style.transform = `
                    rotateX(${rotateX}deg)
                    rotateY(${rotateY}deg)
                    scale(1.025)
                `;

            });

            card.addEventListener('mouseleave', function () {

                inner.style.transform = `
                    rotateX(0deg)
                    rotateY(0deg)
                    scale(1)
                `;

            });

        });

    });
</script>

@endsection
```
