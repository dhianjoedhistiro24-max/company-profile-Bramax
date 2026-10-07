<section id="solutions" class="bg-white px-[7%] py-10 text-black">


<div class="mx-auto max-w-[1200px]">

    {{-- Header --}}
    <div class="mb-6">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-red-600">
            Solutions
        </p>

        <h2 class="mt-2 text-2xl font-bold">
            Solusi untuk Kebutuhan Bisnis Anda
        </h2>
    </div>

    {{-- Cards --}}
    <div class="flex gap-5 overflow-x-auto px-1 py-2 pb-5 snap-x snap-mandatory">

        @forelse($solutions as $solution)

            <a
                href="{{ route('solutions.show', $solution->slug) }}"
                class="group flex h-[150px] min-w-[280px] w-[280px] flex-shrink-0
                       snap-start flex-col justify-between rounded-2xl
                       border border-gray-200 bg-white p-6
                       shadow-sm transition duration-300
                       hover:border-red-500 hover:shadow-md"
            >

                {{-- Icon --}}
                <div class="flex items-start justify-between">

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl
                               bg-black text-white text-xl
                               transition duration-300
                               group-hover:bg-red-600"
                    >

                        @switch($solution->icon)

                            @case('code')
                                💻
                                @break

                            @case('monitor')
                                🖥️
                                @break

                            @case('smartphone')
                                📱
                                @break

                            @case('globe')
                                🌐
                                @break

                            @case('shopping-cart')
                                🛒
                                @break

                            @case('briefcase')
                                💼
                                @break

                            @case('users')
                                👥
                                @break

                            @case('settings')
                                ⚙️
                                @break

                            @case('database')
                                🗄️
                                @break

                            @case('cloud')
                                ☁️
                                @break

                            @case('palette')
                                🎨
                                @break

                            @case('megaphone')
                                📢
                                @break

                            @case('chart')
                                📊
                                @break

                            @case('shield')
                                🛡️
                                @break

                            @case('lightbulb')
                                💡
                                @break

                            @case('rocket')
                                🚀
                                @break

                            @default
                                ✓

                        @endswitch

                    </div>

                    <span class="text-lg text-black/30 transition group-hover:text-red-600">
                        ↗
                    </span>

                </div>

                {{-- Content --}}
                <div>

                    <h3 class="line-clamp-1 text-sm font-bold text-black">
                        {{ $solution->title }}
                    </h3>

                    <p class="mt-1 line-clamp-2 text-xs leading-relaxed text-black/60">
                        {{ $solution->short_description ?? 'Solusi teknologi dan bisnis untuk kebutuhan Anda' }}
                    </p>

                </div>

            </a>

        @empty

            <div class="w-full rounded-2xl border border-gray-200 bg-white py-8 text-center text-sm text-black/60">
                Belum ada solution yang tersedia.
            </div>

        @endforelse

    </div>

    {{-- Scroll hint --}}
    @if($solutions->count() > 4)

        <div class="mt-2 flex items-center justify-between text-xs text-black/50">

            <span>
                Geser untuk melihat solution lainnya
            </span>

            <span>
                ← Geser →
            </span>

        </div>

    @endif

</div>


</section>
