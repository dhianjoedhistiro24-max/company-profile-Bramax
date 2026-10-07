
{{-- CTA --}}
<section class="border-t border-gray-100 bg-white py-20 md:py-24">

    <div class="mx-auto max-w-6xl px-6">

        <div
            class="group relative overflow-hidden rounded-3xl
                   border border-gray-200 bg-white
                   px-8 py-12
                   shadow-[0_10px_40px_rgba(0,0,0,0.05)]
                   transition duration-300
                   hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)]
                   md:px-14 md:py-14"
        >

            {{-- Red Accent --}}
            <div
                class="absolute left-0 top-0 h-full w-1.5 bg-[#D90000]"
            ></div>


            {{-- Background BRAMAX --}}
            <div
                class="pointer-events-none absolute -right-12 -top-10
                       select-none whitespace-nowrap
                       text-[110px] font-black uppercase
                       tracking-[-0.08em] text-gray-50
                       transition duration-500
                       group-hover:text-[#fff5f5]
                       md:text-[170px]"
            >
                BRAMAX
            </div>


            <div
                class="relative z-10 flex flex-col gap-10
                       md:flex-row md:items-center
                       md:justify-between"
            >

                {{-- Text --}}
                <div class="max-w-2xl">

                    <p
                        class="text-xs font-semibold uppercase
                               tracking-[0.2em] text-[#D90000]"
                    >
                        Let's Work Together
                    </p>


                    <h2
                        class="mt-4 text-3xl font-bold leading-tight
                               tracking-tight text-black
                               md:text-4xl"
                    >
                        Punya kebutuhan bisnis?
                    </h2>


                    <p
                        class="mt-5 max-w-xl text-base leading-7 text-gray-500"
                    >
                        Diskusikan kebutuhan Anda bersama
                        {{ $setting?->site_name ?? 'BRAMAX' }}.
                    </p>

                </div>


                {{-- Buttons --}}
                <div
                    class="flex shrink-0 flex-col gap-3
                           sm:flex-row md:flex-col lg:flex-row"
                >

                    {{-- WhatsApp --}}
                    @if($setting?->whatsapp)

                        <a
                            href="https://wa.me/{{ preg_replace('/\D/', '', $setting->whatsapp) }}?text=Halo%20{{ urlencode($setting->site_name ?? 'BRAMAX') }}%20saya%20ingin%20berkonsultasi%20mengenai%20layanan%20BRAMAX"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group/btn inline-flex items-center
                                   justify-center rounded-full
                                   bg-[#D90000] px-7 py-3.5
                                   text-sm font-semibold text-white
                                   transition duration-300
                                   hover:-translate-y-0.5
                                   hover:bg-[#B00000]
                                   hover:shadow-lg"
                        >
                            Chat via WhatsApp

                            <span
                                class="ml-2 transition-transform
                                       duration-300
                                       group-hover/btn:translate-x-1"
                            >
                                →
                            </span>
                        </a>

                    @endif


                    {{-- Live Chat --}}
                    <button
                        type="button"
                        onclick="window.dispatchEvent(new CustomEvent('open-live-chat'))"
                        class="group/btn inline-flex items-center
                               justify-center rounded-full
                               border border-black bg-white
                               px-7 py-3.5
                               text-sm font-semibold text-black
                               transition duration-300
                               hover:-translate-y-0.5
                               hover:bg-black
                               hover:text-white
                               hover:shadow-lg"
                    >
                        Hubungi Kami

                        <span
                            class="ml-2 transition-transform
                                   duration-300
                                   group-hover/btn:translate-x-1"
                        >
                            →
                        </span>
                    </button>

                </div>

            </div>

        </div>

    </div>

</section>
