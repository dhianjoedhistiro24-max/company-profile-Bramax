@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-50/50">

    {{-- Hero --}}
    <section class="relative bg-white border-b border-gray-100 overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-pink-50/60 rounded-full blur-3xl -z-10 transform translate-x-1/3 -translate-y-1/3"></div>
        <div class="max-w-7xl mx-auto px-6 py-20 lg:py-24">

            <div class="max-w-4xl">

                <div class="inline-flex items-center gap-3 px-3.5 py-1.5 rounded-full bg-pink-50 border border-pink-100 mb-6">
                    <span class="w-2 h-2 bg-red-700 rounded-full animate-pulse"></span>
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-red-700">
                        Digital & Software
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-[1.15] text-black">
                    Digital Solutions
                    <span class="block text-red-700 mt-1">
                        for Modern Business
                    </span>
                </h1>

                <p class="mt-6 max-w-2xl text-base sm:text-lg leading-relaxed text-gray-600 font-normal">
                    Solusi digital dan software yang dirancang untuk membantu
                    bisnis meningkatkan efisiensi mengembangkan layanan dan
                    beradaptasi dengan kebutuhan teknologi.
                </p>

            </div>

        </div>
    </section>


    {{-- Solutions --}}
    <section class="py-20 bg-white">

        <div class="max-w-7xl mx-auto px-6">

            {{-- Section Header --}}
            <div class="max-w-2xl mb-14">

                <div class="inline-block text-xs font-bold uppercase tracking-[0.2em] text-red-700 bg-red-50 px-3 py-1 rounded-md mb-3">
                    Our Solutions
                </div>

                <h2 class="text-3xl md:text-4xl font-extrabold text-black tracking-tight">
                    Solusi Digital untuk Kebutuhan Bisnis
                </h2>

                <p class="mt-4 text-base text-gray-600 leading-relaxed">
                    Temukan solusi teknologi yang dapat disesuaikan
                    dengan kebutuhan dan tujuan bisnis Anda.
                </p>

            </div>


            {{-- Solution Grid --}}
            @if($solutions->count())

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach($solutions as $solution)

                        <a
                            href="{{ route('solutions.show', $solution->slug) }}"
                            class="group relative flex flex-col bg-white border border-gray-200/80 rounded-2xl overflow-hidden hover:border-red-700/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
                        >

                            {{-- Image --}}
                            @if($solution->image)

                                <div class="relative h-56 overflow-hidden bg-gray-100">

                                    <img
                                        src="{{ asset('storage/' . $solution->image) }}"
                                        alt="{{ $solution->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                    >
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

                                </div>

                            @else

                                <div class="h-56 bg-gradient-to-br from-pink-50 to-white flex items-center justify-center">

                                    <div class="w-16 h-16 rounded-2xl bg-white border border-pink-200/80 shadow-sm flex items-center justify-center group-hover:scale-110 transition duration-300">

                                        <span class="text-2xl font-bold text-red-700">
                                            +
                                        </span>

                                    </div>

                                </div>

                            @endif


                            {{-- Content --}}
                            <div class="p-7 flex-1 flex flex-col justify-between">

                                <div>
                                    <div class="flex items-center justify-between mb-5">

                                        <span class="text-xs font-bold uppercase tracking-wider text-pink-600 bg-pink-50 px-2.5 py-1 rounded-md">
                                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </span>

                                        <span class="w-10 h-10 rounded-xl border border-gray-200 bg-gray-50 flex items-center justify-center text-gray-700 group-hover:bg-red-700 group-hover:border-red-700 group-hover:text-white transition shadow-sm">
                                            →
                                        </span>

                                    </div>


                                    <h3 class="text-xl font-bold text-black group-hover:text-red-700 transition leading-snug">

                                        {{ $solution->title }}

                                    </h3>


                                    @if($solution->short_description)

                                        <p class="mt-3 text-sm text-gray-600 leading-relaxed line-clamp-3">

                                            {{ $solution->short_description }}

                                        </p>

                                    @endif


                                    @if($solution->features && count($solution->features))

                                        <div class="mt-6 pt-5 border-t border-gray-100">

                                            <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 mb-3">
                                                Key Features
                                            </p>

                                            <ul class="space-y-2">

                                                @foreach(array_slice($solution->features, 0, 3) as $feature)

                                                    <li class="flex items-start gap-2.5 text-sm text-gray-600">

                                                        <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-red-700 flex-shrink-0"></span>

                                                        <span class="line-clamp-1">
                                                            {{ $feature }}
                                                        </span>

                                                    </li>

                                                @endforeach

                                            </ul>

                                        </div>

                                    @endif
                                </div>


                                <div class="mt-7 pt-4 border-t border-gray-50 flex items-center text-sm font-bold text-red-700">

                                    Learn More

                                    <span class="ml-2 group-hover:ml-3 transition-all">
                                        →
                                    </span>

                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            @else

                {{-- Empty State --}}
                <div class="py-20 px-6 text-center border border-dashed border-gray-300 rounded-2xl bg-white max-w-xl mx-auto shadow-sm">

                    <div class="w-16 h-16 mx-auto rounded-2xl bg-pink-50 border border-pink-200 flex items-center justify-center shadow-sm">

                        <span class="text-2xl font-bold text-red-700">
                            +
                        </span>

                    </div>

                    <h3 class="mt-5 text-xl font-bold text-black">
                        Solution Belum Tersedia
                    </h3>

                    <p class="mt-2 text-sm text-gray-500 max-w-sm mx-auto">
                        Solution digital akan ditampilkan di sini.
                    </p>

                </div>

            @endif

        </div>

    </section>




        

        </div>

    </div>

</section>
 <x-cta />
</div>
@endsection