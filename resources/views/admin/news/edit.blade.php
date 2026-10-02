@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white py-10">

    <div class="mx-auto max-w-4xl px-6">

        {{-- Header --}}
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <p class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-[#e40046]">
                    Admin / News / Edit
                </p>

                <h1 class="text-3xl font-bold tracking-tight text-[#111111]">
                    Edit Berita
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Perbarui informasi dan konten berita BRAMAX
                </p>

            </div>


            <a
                href="{{ route('admin.news.index') }}"
                class="inline-flex items-center justify-center rounded-lg
                       border border-gray-200 bg-white px-4 py-2.5
                       text-sm font-semibold text-gray-700
                       transition hover:border-gray-300 hover:bg-gray-50"
            >
                ← Kembali
            </a>

        </div>


        {{-- Validation Error --}}
        @if ($errors->any())

            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5">

                <div class="flex gap-3">

                    <div class="flex h-8 w-8 shrink-0 items-center justify-center
                                rounded-full bg-red-100">

                        <span class="text-sm font-bold text-[#e40046]">
                            !
                        </span>

                    </div>

                    <div>

                        <p class="font-semibold text-[#b00035]">
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

                </div>

            </div>

        @endif


        {{-- Form Card --}}
        <form
            action="{{ route('admin.news.update', $news->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="overflow-hidden rounded-2xl border border-gray-200
                   bg-white shadow-sm"
        >

            @csrf

            @method('PUT')


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
                        value="{{ old('title', $news->title) }}"
                        required
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

                        @foreach ($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('news_category_id', $news->news_category_id) == $category->id ? 'selected' : '' }}
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


                {{-- Konten --}}
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
                        class="w-full rounded-xl border border-gray-200
                               bg-white px-4 py-3 text-sm leading-relaxed text-black
                               outline-none transition
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                    >{{ old('content', $news->content) }}</textarea>

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


                    @if ($news->featured_image)

                        <div class="mb-4 rounded-xl border border-gray-200
                                    bg-gray-50 p-4">

                            <p class="mb-3 text-xs font-semibold uppercase
                                      tracking-wide text-gray-500">
                                Foto Saat Ini
                            </p>

                            <img
                                src="{{ asset('storage/' . $news->featured_image) }}"
                                alt="{{ $news->title }}"
                                class="h-auto max-h-64 w-full rounded-lg
                                       object-cover sm:w-[360px]"
                            >

                        </div>

                    @else

                        <div class="mb-4 flex h-32 items-center justify-center
                                    rounded-xl border border-dashed border-gray-300
                                    bg-gray-50">

                            <span class="text-sm text-gray-400">
                                Belum ada foto
                            </span>

                        </div>

                    @endif


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
                        Kosongkan jika tidak ingin mengganti foto.
                        Format JPG PNG atau WEBP maksimal 5 MB.
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
                            {{ old('status', $news->status) === 'Draft' ? 'selected' : '' }}
                        >
                            Draft
                        </option>

                        <option
                            value="Published"
                            {{ old('status', $news->status) === 'Published' ? 'selected' : '' }}
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
                           shadow-sm transition
                           hover:bg-[#c9003d] hover:shadow-md"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection

