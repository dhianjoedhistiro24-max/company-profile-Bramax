<footer class="bg-[#262626] px-6 pt-[35px] text-white sm:px-8">

    @php
        $footerSolutions = \App\Models\Solution::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    @endphp

    <div class="mx-auto grid max-w-[1000px] grid-cols-1 gap-6 pb-[30px] sm:grid-cols-2 lg:grid-cols-4">

        {{-- COMPANY --}}
        <div>

            <a
                href="{{ route('home') }}"
                class="text-2xl font-extrabold tracking-[-0.5px] text-[#D90000]"
            >
                {{ $setting?->site_name ?? 'BRAMAX' }}
            </a>

            <p class="mt-4 text-sm leading-relaxed text-[#D1D1D1]">
                {{ $setting?->site_name ?? 'PT Bramax Teknologi Indonesia' }}
                adalah mitra terpercaya dalam menghadirkan solusi
                teknologi dan bisnis untuk mendukung pertumbuhan.
            </p>

        </div>


        {{-- MENU UTAMA --}}
        <div>

            <h4 class="mb-4 text-base font-semibold text-white">
                Menu Utama
            </h4>

            <ul class="space-y-2">

                <li>
                    <a
                        href="{{ route('home') }}"
                        class="text-sm text-[#B5B5B5] transition hover:text-[#D90000]"
                    >
                        Home
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('home') }}#about"
                        class="text-sm text-[#B5B5B5] transition hover:text-[#D90000]"
                    >
                        About Us
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('home') }}#services"
                        class="text-sm text-[#B5B5B5] transition hover:text-[#D90000]"
                    >
                        Solutions
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('home') }}#portfolio"
                        class="text-sm text-[#B5B5B5] transition hover:text-[#D90000]"
                    >
                        Portfolio
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('insights') }}"
                        class="text-sm text-[#B5B5B5] transition hover:text-[#D90000]"
                    >
                        Insights
                    </a>
                </li>

            </ul>

        </div>


        {{-- SOLUTIONS --}}
        <div>

            <h4 class="mb-4 text-base font-semibold text-white">
                Solusi & Layanan
            </h4>

            <ul class="space-y-2">

                @forelse($footerSolutions as $solution)

                    <li>
                        <a
                            href="{{ route('solutions.show', $solution->slug) }}"
                            class="text-sm text-[#B5B5B5] transition hover:text-[#D90000]"
                        >
                            {{ $solution->name }}
                        </a>
                    </li>

                @empty

                    <li>
                        <span class="text-sm text-[#999999]">
                            Belum ada Solution
                        </span>
                    </li>

                @endforelse

            </ul>

        </div>


        {{-- CONTACT --}}
        <div>

            <h4 class="mb-4 text-base font-semibold text-white">
                Kontak Kami
            </h4>

            <div class="space-y-2 text-sm text-[#B5B5B5]">

                {{-- Email --}}
                @if($setting?->email)

                    <p>
                        Email:

                        <a
                            href="mailto:{{ $setting->email }}"
                            class="transition hover:text-[#D90000]"
                        >
                            {{ $setting->email }}
                        </a>
                    </p>

                @endif


                {{-- Phone --}}
                @if($setting?->phone)

                    <p>
                        Telepon:

                        <a
                            href="tel:{{ $setting->phone }}"
                            class="transition hover:text-[#D90000]"
                        >
                            {{ $setting->phone }}
                        </a>
                    </p>

                @endif


                {{-- WhatsApp --}}
                @if($setting?->whatsapp)

                    <p>
                        WhatsApp:

                        <a
                            href="https://wa.me/{{ preg_replace('/\D/', '', $setting->whatsapp) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="transition hover:text-[#D90000]"
                        >
                            {{ $setting->whatsapp }}
                        </a>
                    </p>

                @endif


                {{-- Address --}}
                @if($setting?->address)

                    <p class="leading-relaxed">
                        {{ $setting->address }}
                    </p>

                @endif

            </div>

        </div>

    </div>


    {{-- FOOTER BOTTOM --}}
    <div class="border-t border-white/10 py-4 text-center">

        <p class="text-sm text-[#999999]">
            © {{ date('Y') }}
            {{ $setting?->site_name ?? 'PT Bramax Teknologi Indonesia' }}.
            All rights reserved.
        </p>

    </div>
    

</footer>