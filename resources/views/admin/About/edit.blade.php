@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gray-50">

    {{-- Header --}}
    <div class="border-b border-gray-200 bg-white">
        <div class="mx-auto max-w-6xl px-6 py-8">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#e40046]">
                        Website Content
                    </p>

                    <h1 class="mt-2 text-3xl font-bold text-black">
                        About BRAMAX
                    </h1>

                    <p class="mt-2 text-sm text-gray-500">
                        Kelola informasi About yang ditampilkan pada website.
                    </p>
                </div>

                <a
                    href="{{ url('/about') }}"
                    target="_blank"
                    class="inline-flex items-center justify-center rounded-lg
                           border border-gray-200 bg-white px-5 py-2.5
                           text-sm font-semibold text-gray-700
                           transition hover:border-[#e40046] hover:text-[#e40046]"
                >
                    Lihat Halaman
                    <span class="ml-2">↗</span>
                </a>

            </div>

        </div>
    </div>


    {{-- Content --}}
    <div class="mx-auto max-w-4xl px-6 py-10">

        {{-- Success --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif


        {{-- Error --}}
        @if($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4">

                <p class="font-semibold text-red-700">
                    Terdapat kesalahan:
                </p>

                <ul class="mt-2 list-disc pl-5 text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif


        {{-- Form --}}
        <form
            action="{{ route('admin.about.update') }}"
            method="POST"
            enctype="multipart/form-data"
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm"
        >

            @csrf
            @method('PUT')


            {{-- Form Header --}}
            <div class="border-b border-gray-100 px-6 py-6 md:px-8">

                <h2 class="text-xl font-bold text-black">
                    Informasi About
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Perubahan di sini akan ditampilkan pada halaman About.
                </p>

            </div>


            {{-- Form Body --}}
            <div class="space-y-6 px-6 py-8 md:px-8">


                {{-- Title --}}
                <div>

                    <label
                        for="title"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Judul
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $about->title) }}"
                        required
                        class="w-full rounded-xl border border-gray-200
                               px-4 py-3 text-sm text-black
                               outline-none transition
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                        placeholder="Teknologi yang Mendorong Pertumbuhan"
                    >

                    @error('title')
                        <p class="mt-2 text-xs text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Banner --}}
                <div>

                    <label
                        for="banner"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Foto About
                    </label>

                    <input
                        type="file"
                        id="banner"
                        name="banner"
                        accept="image/jpeg,image/png,image/webp"
                        class="w-full rounded-xl border border-gray-200
                               bg-white px-4 py-3 text-sm text-gray-600
                               outline-none transition
                               file:mr-4 file:rounded-lg file:border-0
                               file:bg-[#fff0f3] file:px-4 file:py-2
                               file:text-sm file:font-semibold
                               file:text-[#e40046]
                               hover:file:bg-[#ffe5eb]
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                    >

                    <p class="mt-2 text-xs text-gray-400">
                        Format JPG, PNG, atau WEBP. Maksimal 2 MB.
                    </p>


                    {{-- Current Banner --}}
                    @if($about->banner)

                        <div class="mt-5">

                            <p class="mb-2 text-xs font-semibold uppercase tracking-[0.15em] text-gray-400">
                                Foto Saat Ini
                            </p>

                            <div class="overflow-hidden rounded-xl border border-gray-200 bg-gray-100">

                                <img
                                    src="{{ asset('storage/' . $about->banner) }}"
                                    alt="About BRAMAX"
                                    class="h-64 w-full object-cover"
                                >

                            </div>

                        </div>

                    @endif

                </div>


                {{-- Content --}}
                <div>

                    <label
                        for="content"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Deskripsi About
                    </label>

                    <textarea
                        id="content"
                        name="content"
                        rows="10"
                        required
                        class="w-full rounded-xl border border-gray-200
                               px-4 py-3 text-sm leading-relaxed text-black
                               outline-none transition
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                        placeholder="Masukkan deskripsi About BRAMAX..."
                    >{{ old('content', $about->content) }}</textarea>

                    <p class="mt-2 text-xs text-gray-400">
                        Gunakan baris baru untuk memisahkan paragraf.
                    </p>

                    @error('content')
                        <p class="mt-2 text-xs text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


               
{{-- Vision --}}
<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

    <div class="flex items-start gap-4">

        {{-- Number --}}
        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#fff0f3] text-sm font-bold text-[#e40046]">
            01
        </div>

        {{-- Label --}}
        <div class="flex-1">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <label
                        for="vision"
                        class="block text-base font-bold text-gray-900"
                    >
                        Visi
                    </label>

                    <p class="mt-1 text-sm text-gray-500">
                        Arah dan tujuan utama BRAMAX
                    </p>
                </div>

                <span class="hidden rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-500 sm:inline-flex">
                    About
                </span>
            </div>
        </div>

    </div>

    {{-- Input --}}
    <div class="mt-6">

        <textarea
            id="vision"
            name="vision"
            rows="5"
            class="w-full resize-y rounded-xl border border-gray-200
                   bg-gray-50 px-4 py-4
                   text-sm leading-7 text-gray-900
                   placeholder:text-gray-400
                   outline-none transition
                   hover:border-gray-300
                   focus:border-[#e40046]
                   focus:bg-white
                   focus:ring-4 focus:ring-[#e40046]/10"
            placeholder="Contoh: Menjadi perusahaan teknologi yang memberikan solusi inovatif dan berdampak bagi pertumbuhan bisnis..."
        >{{ old('vision', $about->vision) }}</textarea>

        @error('vision')
            <p class="mt-2 flex items-center gap-2 text-xs font-medium text-red-600">
                <span>●</span>
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Helper --}}
    <div class="mt-4 flex items-start gap-3 rounded-xl bg-gray-50 px-4 py-3">

        <div class="mt-0.5 text-gray-400">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"
                />
            </svg>
        </div>

        <p class="text-xs leading-5 text-gray-500">
            Tulis visi perusahaan secara singkat, jelas, dan menggambarkan arah BRAMAX ke depan.
        </p>

    </div>

</div>


                {{-- Mission --}}
                <div>

                    <label
                        for="mission"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Misi
                    </label>

                    <textarea
                        id="mission"
                        name="mission"
                        rows="8"
                        class="w-full rounded-xl border border-gray-200
                               px-4 py-3 text-sm leading-relaxed text-black
                               outline-none transition
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                        placeholder="Masukkan misi BRAMAX..."
                    >{{ old('mission', $about->mission) }}</textarea>

                    <p class="mt-2 text-xs text-gray-400">
                        Gunakan baris baru untuk memisahkan setiap poin misi.
                    </p>

                    @error('mission')
                        <p class="mt-2 text-xs text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- CTA --}}
                <div>

                    <label
                        for="cta"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Teks Tombol
                    </label>

                    <input
                        type="text"
                        id="cta"
                        name="cta"
                        value="{{ old('cta', $about->cta) }}"
                        class="w-full rounded-xl border border-gray-200
                               px-4 py-3 text-sm text-black
                               outline-none transition
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                        placeholder="Tentang Kami"
                    >

                    @error('cta')
                        <p class="mt-2 text-xs text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Preview --}}
                <div class="rounded-xl border border-gray-200 bg-[#fffdfb] p-5">

                    <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#e40046]">
                        Preview Struktur
                    </p>

                    <div class="mt-4">

                        <h3 class="text-xl font-bold text-black">
                            {{ old('title', $about->title) }}
                        </h3>

                        <p class="mt-3 whitespace-pre-line text-sm leading-relaxed text-gray-500">
                            {{ old('content', $about->content) }}
                        </p>

                        <div class="mt-5">

                            <p class="text-sm font-bold text-black">
                                Visi
                            </p>

                            <p class="mt-2 whitespace-pre-line text-sm leading-relaxed text-gray-500">
                                {{ old('vision', $about->vision) }}
                            </p>

                        </div>

                        <div class="mt-5">

                            <p class="text-sm font-bold text-black">
                                Misi
                            </p>

                            <p class="mt-2 whitespace-pre-line text-sm leading-relaxed text-gray-500">
                                {{ old('mission', $about->mission) }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div class="flex flex-col-reverse gap-3 border-t border-gray-100
                        px-6 py-5 sm:flex-row sm:justify-end md:px-8">

                <a
                    href="{{ route('admin.about.edit') }}"
                    class="inline-flex items-center justify-center rounded-lg
                           border border-gray-200 bg-white px-6 py-3
                           text-sm font-semibold text-gray-600
                           transition hover:bg-gray-50"
                >
                    Reset
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg
                           bg-[#e40046] px-6 py-3
                           text-sm font-semibold text-white
                           transition hover:bg-[#c9003d]
                           hover:shadow-lg"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection