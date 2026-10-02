@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white py-10">

    <div class="mx-auto max-w-4xl px-6">

        {{-- Header --}}
        <div class="mb-8">

            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#e40046]">
                Admin / News
            </p>

            <h1 class="mt-2 text-3xl font-bold text-black">
                Tambah Berita
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Tambahkan berita atau insight baru untuk website BRAMAX.
            </p>

        </div>


        {{-- Validation Error --}}
        @if ($errors->any())

            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5">

                <p class="font-semibold text-red-700">
                    Terdapat kesalahan
                </p>

                <ul class="mt-2 list-disc pl-5 text-sm text-red-600">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Form --}}
        <form
            action="{{ route('admin.news.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm"
        >

            @csrf


            <div class="space-y-6 p-6 md:p-8">


                {{-- Judul --}}
                <div>

                    <label
                        for="title"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Judul Berita
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        placeholder="Contoh: BRAMAX Mengembangkan Solusi Digital untuk Bisnis"
                        class="w-full rounded-xl border border-gray-200
                               bg-white px-4 py-3 text-sm text-black
                               outline-none transition
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                    >

                    @error('title')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Kategori --}}
                <div>

                    <label
                        for="news_category_id"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Kategori Berita
                    </label>

                    <select
                        id="news_category_id"
                        name="news_category_id"
                        required
                        class="w-full rounded-xl border border-gray-200
                               bg-white px-4 py-3 text-sm text-black
                               outline-none transition
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                    >

                        <option value="">
                            Pilih Kategori
                        </option>

                        @foreach ($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('news_category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                    @error('news_category_id')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Isi Berita --}}
                <div>

                    <label
                        for="content"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Isi Berita
                    </label>

                    <textarea
                        id="content"
                        name="content"
                        rows="14"
                        required
                        placeholder="Tulis isi berita di sini..."
                        class="w-full rounded-xl border border-gray-200
                               bg-white px-4 py-3 text-sm leading-relaxed text-black
                               outline-none transition
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                    >{{ old('content') }}</textarea>

                    @error('content')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Featured Image --}}
                <div>

                    <label
                        for="featured_image"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Featured Image
                    </label>

                    <input
                        type="file"
                        id="featured_image"
                        name="featured_image"
                        accept="image/jpeg,image/png,image/jpg,image/webp"
                        class="w-full rounded-xl border border-gray-200
                               bg-white px-4 py-3 text-sm text-gray-700
                               file:mr-4
                               file:rounded-lg
                               file:border-0
                               file:bg-[#e40046]
                               file:px-4
                               file:py-2
                               file:font-semibold
                               file:text-white
                               hover:file:bg-[#c9003d]"
                    >

                    <p class="mt-2 text-xs text-gray-400">
                        Format JPG PNG atau WEBP. Maksimal 5 MB.
                    </p>

                    @error('featured_image')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Status --}}
                <div>

                    <label
                        for="status"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full rounded-xl border border-gray-200
                               bg-white px-4 py-3 text-sm text-black
                               outline-none transition
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                    >

                        <option
                            value="Draft"
                            {{ old('status', 'Draft') === 'Draft' ? 'selected' : '' }}
                        >
                            Draft
                        </option>

                        <option
                            value="Published"
                            {{ old('status') === 'Published' ? 'selected' : '' }}
                        >
                            Published
                        </option>

                    </select>

                    @error('status')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>


            {{-- Footer --}}
            <div class="flex flex-col-reverse gap-3 border-t border-gray-100
                        bg-gray-50 px-6 py-5
                        sm:flex-row sm:justify-end md:px-8">

                <a
                    href="{{ route('admin.news.index') }}"
                    class="inline-flex items-center justify-center rounded-lg
                           border border-gray-200 bg-white px-6 py-3
                           text-sm font-semibold text-gray-600
                           transition hover:bg-gray-100"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg
                           bg-[#e40046] px-6 py-3
                           text-sm font-semibold text-white
                           transition hover:bg-[#c9003d]
                           hover:shadow-lg"
                >
                    Simpan Berita
                </button>

            </div>

        </form>

    </div>

</div>

@endsection

