@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white text-[#111111]">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <section class="border-b border-gray-100">

        <div class="max-w-7xl mx-auto px-6 py-16">

            {{-- Breadcrumb --}}
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">

                <a
                    href="{{ url('/') }}"
                    class="hover:text-red-600 transition"
                >
                    Home
                </a>

                <span>/</span>

                <span class="text-gray-900">
                    {{ $category->name }}
                </span>

            </div>


            {{-- Heading --}}
            <div class="max-w-4xl">

                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-red-600 mb-4">
                    Business Category
                </p>

                <h1 class="text-4xl md:text-6xl font-bold tracking-tight">
                    {{ $category->name }}
                </h1>

                @if($category->description)

                    <p class="mt-6 text-lg leading-relaxed text-gray-600 max-w-3xl">
                        {{ $category->description }}
                    </p>

                @endif

                <div class="mt-6 text-sm text-gray-500">
                    {{ $category->services->count() }} Services Available
                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
        SERVICES
    ========================================================== --}}
    <section class="py-20 overflow-hidden">

        <div class="max-w-7xl mx-auto px-6">


            {{-- Section Header --}}
            <div class="flex items-end justify-between gap-6 mb-10">

                <div>

                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-red-600 mb-3">
                        Our Services
                    </p>

                    <h2 class="text-3xl md:text-4xl font-bold tracking-tight">
                        Explore Our Services
                    </h2>

                    <p class="mt-3 text-gray-500 max-w-2xl">
                        Pilih layanan yang sesuai dengan kebutuhan bisnis dan proyek Anda.
                    </p>

                </div>


                {{-- Navigation Buttons --}}
                <div class="flex gap-2 flex-shrink-0">

                    {{-- Previous --}}
                    <button
                        id="service-prev"
                        type="button"
                        aria-label="Previous services"
                        class="w-11 h-11 border border-gray-200 bg-white text-black flex items-center justify-center hover:bg-black hover:text-white transition duration-300"
                    >

                        <svg
                            class="w-5 h-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >

                            <path d="M19 12H5"/>

                            <path d="m12 19-7-7 7-7"/>

                        </svg>

                    </button>


                    {{-- Next --}}
                    <button
                        id="service-next"
                        type="button"
                        aria-label="Next services"
                        class="w-11 h-11 border border-gray-200 bg-white text-black flex items-center justify-center hover:bg-black hover:text-white transition duration-300"
                    >

                        <svg
                            class="w-5 h-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >

                            <path d="M5 12h14"/>

                            <path d="m12 5 7 7-7 7"/>

                        </svg>

                    </button>

                </div>

            </div>



            {{-- =================================================
                CAROUSEL
            ================================================== --}}
            <div
                id="service-carousel-viewport"
                class="overflow-hidden"
            >

                <div
                    id="service-carousel-track"
                    class="flex gap-6"
                >


                    @foreach($category->services as $service)

                        <article
                            class="service-carousel-card flex-shrink-0 w-[280px] md:w-[320px]"
                        >

                            <div
                                class="service-card-inner bg-white border border-gray-200 overflow-hidden h-full"
                            >


                                {{-- IMAGE --}}
                                <div
                                    class="relative aspect-square overflow-hidden bg-gray-100"
                                >

                                    @if($service->image)

                                        <img
                                            src="{{ asset('storage/' . $service->image) }}"
                                            alt="{{ $service->name }}"
                                            class="service-image w-full h-full object-cover"
                                            draggable="false"
                                        >

                                    @else

                                        <div
                                            class="w-full h-full flex items-center justify-center bg-gray-100"
                                        >

                                            <span class="text-gray-400 text-sm">
                                                No Image
                                            </span>

                                        </div>

                                    @endif

                                </div>



                                {{-- CONTENT --}}
                                <div class="p-6">


                                    {{-- Category --}}
                                    <div
                                        class="text-xs font-semibold uppercase tracking-[0.15em] text-red-600 mb-3"
                                    >
                                        {{ $category->name }}
                                    </div>


                                    {{-- Name --}}
                                    <h3 class="text-xl font-bold leading-tight">
                                        {{ $service->name }}
                                    </h3>


                                    {{-- Description --}}
                                    @if($service->description)

                                        <p class="mt-3 text-sm text-gray-500 leading-relaxed line-clamp-3">
                                            {{ $service->description }}
                                        </p>

                                    @endif


                                    {{-- Explore Service --}}
                                    <a
                                        href="{{ route('services.show', $service->slug) }}"
                                        class="explore-service inline-flex items-center gap-2 mt-6 text-sm font-semibold text-black hover:text-red-600 transition"
                                    >

                                        <span>
                                            Explore Service
                                        </span>

                                        <svg
                                            class="w-4 h-4 transition-transform duration-300"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >

                                            <path d="M5 12h14"/>

                                            <path d="m13 6 6 6-6 6"/>

                                        </svg>

                                    </a>

                                </div>

                            </div>

                        </article>

                    @endforeach


                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
        CTA
    ========================================================== --}}
    <x-cta />

</div>



{{-- =============================================================
    STYLE
============================================================= --}}
<style>

    /*
    |--------------------------------------------------------------------------
    | Carousel
    |--------------------------------------------------------------------------
    */

    #service-carousel-viewport {
        overflow: hidden;
        user-select: none;
    }


    #service-carousel-track {
        width: max-content;
        will-change: transform;
    }


    /*
    |--------------------------------------------------------------------------
    | Card
    |--------------------------------------------------------------------------
    */

    .service-carousel-card {
        flex-shrink: 0;
    }


    .service-card-inner {
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);

        transition:
            transform 0.35s ease,
            box-shadow 0.35s ease;
    }


    .service-card-inner:hover {

        transform: translateY(-6px);

        box-shadow:
            0 18px 45px rgba(0, 0, 0, 0.10);

    }


    /*
    |--------------------------------------------------------------------------
    | Image
    |--------------------------------------------------------------------------
    */

    .service-image {

        transition:
            transform 0.6s ease;

        pointer-events: none;

    }


    .service-card-inner:hover .service-image {

        transform: scale(1.05);

    }


    /*
    |--------------------------------------------------------------------------
    | Button
    |--------------------------------------------------------------------------
    */

    #service-prev,
    #service-next {

        cursor: pointer;

    }


    /*
    |--------------------------------------------------------------------------
    | Mobile
    |--------------------------------------------------------------------------
    */

    @media (max-width: 640px) {

        .service-carousel-card {

            width: 260px;

        }

    }

</style>



{{-- =============================================================
    JAVASCRIPT
============================================================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const viewport =
        document.getElementById('service-carousel-viewport');

    const track =
        document.getElementById('service-carousel-track');

    const prevButton =
        document.getElementById('service-prev');

    const nextButton =
        document.getElementById('service-next');


    if (!viewport || !track) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Variables
    |--------------------------------------------------------------------------
    */

    let position = 0;

    let isHovering = false;

    let lastTime = performance.now();


    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    */

    const AUTO_SPEED = 35;

    const GAP = 24;


    /*
    |--------------------------------------------------------------------------
    | Get Card Width
    |--------------------------------------------------------------------------
    */

    function getCardWidth() {

        const card =
            track.querySelector('.service-carousel-card');

        if (!card) {
            return 320;
        }

        return card.offsetWidth + GAP;

    }


    /*
    |--------------------------------------------------------------------------
    | Maximum Position
    |--------------------------------------------------------------------------
    */

    function getMaxPosition() {

        return Math.max(
            0,
            track.scrollWidth - viewport.clientWidth
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Render
    |--------------------------------------------------------------------------
    */

    function render() {

        track.style.transform =
            `translate3d(${-position}px, 0, 0)`;

    }


    /*
    |--------------------------------------------------------------------------
    | Next
    |--------------------------------------------------------------------------
    */

    function nextService() {

        const cardWidth =
            getCardWidth();

        const maxPosition =
            getMaxPosition();


        position += cardWidth;


        if (position >= maxPosition) {

            position = 0;

        }


        render();

    }


    /*
    |--------------------------------------------------------------------------
    | Previous
    |--------------------------------------------------------------------------
    */

    function previousService() {

        const cardWidth =
            getCardWidth();

        const maxPosition =
            getMaxPosition();


        position -= cardWidth;


        if (position < 0) {

            position = maxPosition;

        }


        render();

    }


    /*
    |--------------------------------------------------------------------------
    | Button Events
    |--------------------------------------------------------------------------
    */

    if (nextButton) {

        nextButton.addEventListener(
            'click',
            nextService
        );

    }


    if (prevButton) {

        prevButton.addEventListener(
            'click',
            previousService
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Pause When Hover
    |--------------------------------------------------------------------------
    */

    viewport.addEventListener(
        'mouseenter',
        function () {

            isHovering = true;

        }
    );


    viewport.addEventListener(
        'mouseleave',
        function () {

            isHovering = false;

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Automatic Movement
    |--------------------------------------------------------------------------
    */

    function animate(currentTime) {

        const delta =
            (currentTime - lastTime) / 1000;

        lastTime =
            currentTime;


        /*
        | Bergerak otomatis ke kiri
        */

        if (!isHovering) {

            position +=
                AUTO_SPEED * delta;

        }


        /*
        | Jika sudah sampai ujung,
        | kembali ke awal
        */

        const maxPosition =
            getMaxPosition();


        if (
            maxPosition > 0 &&
            position >= maxPosition
        ) {

            position = 0;

        }


        render();


        requestAnimationFrame(animate);

    }


    /*
    |--------------------------------------------------------------------------
    | Initial Render
    |--------------------------------------------------------------------------
    */

    render();


    /*
    |--------------------------------------------------------------------------
    | Start Animation
    |--------------------------------------------------------------------------
    */

    requestAnimationFrame(animate);


    /*
    |--------------------------------------------------------------------------
    | Resize
    |--------------------------------------------------------------------------
    */

    window.addEventListener(
        'resize',
        function () {

            const maxPosition =
                getMaxPosition();


            if (position > maxPosition) {

                position = maxPosition;

            }


            render();

        }
    );

});

</script>

@endsection