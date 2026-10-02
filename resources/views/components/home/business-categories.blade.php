<section id="business-categories" class="py-20 bg-white relative overflow-hidden" 
         style="background-image: linear-gradient(to right, rgba(0,0,0,0.05) 1px, transparent 1px), linear-gradient(to bottom, rgba(0,0,0,0.05) 1px, transparent 1px); background-size: 20px 20px;">
    <div class="max-w-6xl mx-auto px-6 relative z-10">

    {{-- Header --}}
    <div class="text-center mb-10">

        <p class="text-sm uppercase tracking-[0.3em] text-[#D90000] mb-3">
            Our Business
        </p>

        <h2 class="text-3xl md:text-4xl font-bold text-black">
            Business Categories
        </h2>

        <p class="mt-3 text-gray-400 max-w-2xl mx-auto text-black">
            Solusi dan layanan BRAMAX untuk berbagai kebutuhan bisnis
            dan sektor industri.
        </p>

    </div>


    {{-- Business Categories --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

        @foreach ($businessCategories as $category)

            <a
                href="{{ route('business-categories.show', $category->slug) }}"
                class="group flex flex-col rounded-xl bg-white border border-black/10 shadow-xl overflow-hidden transition duration-300 hover:-translate-y-1 hover:border-[#ff4f81]/50 hover:shadow-lg"
            >

                <!-- Header Card (Titik-titik Window Control) -->
                <div class="flex items-center gap-2 px-6 pt-5 pb-2">
                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                    <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                    <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                </div>

                <!-- Konten Utama di dalam Card -->
                <div class="p-6 pt-2 flex flex-col flex-grow justify-between">
                    
                    {{-- Bagian Atas: Judul Kategori --}}
                    <div class="flex flex-col mb-6 pt-2">
                        <h3 class="text-lg font-semibold text-[#0f172a] transition group-hover:text-[#B01A1A]">
                            {{ $category->name }}
                        </h3>
                    </div>

                    {{-- Kotak Bawah --}}
                    <div class="rounded-xl bg-[#EDEDED] border border-black/10 p-6 transition duration-300">
                        <span class="text-gray-900 text-xs font-medium block mb-1">{{ $category->description }}</span>
                        
                        <h4 class="text-xl font-bold leading-tight m-0 text-gray-900 transition group-hover:text-[#ff4f81]">
                            {{-- Masukkan judul jika ada --}}
                        </h4>

                        <div class="mt-4 text-sm text-[#B01A1A] font-medium flex items-center gap-1">
                            Lihat Layanan →
                        </div>
                    </div>

                </div>

            </a>

        @endforeach

    </div>

</div>

</section>