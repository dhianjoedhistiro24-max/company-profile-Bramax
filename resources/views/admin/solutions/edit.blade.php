
@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white py-12">

    <div class="max-w-5xl mx-auto px-6">

        {{-- Header --}}
        <div class="mb-10">

            <div class="flex items-center gap-3 mb-4">

                <div class="w-10 h-1 rounded-full bg-gradient-to-r from-red-600 to-pink-500"></div>

                <span class="text-sm font-semibold uppercase tracking-[0.2em] text-red-600">
                    Admin Panel
                </span>

            </div>

            <h1 class="text-4xl font-bold text-gray-900">
                Edit Solution
            </h1>

            <p class="mt-3 text-gray-600">
                Perbarui informasi solution yang sudah tersedia.
            </p>

        </div>


        {{-- Form --}}
        <div class="relative">

            <div class="absolute -top-1 left-8 right-8 h-1 rounded-full bg-gradient-to-r from-red-600 via-pink-500 to-red-400"></div>

            <form
                action="{{ route('admin.solutions.update', $solution) }}"
                method="POST"
                enctype="multipart/form-data"
                class="bg-white border border-gray-200 rounded-2xl shadow-lg p-8 md:p-10"
            >

                @csrf
                @method('PUT')


                {{-- Basic Information --}}
                <div class="mb-10">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-9 h-9 rounded-lg bg-red-50 flex items-center justify-center">
                            <span class="text-red-600 font-bold">
                                01
                            </span>
                        </div>

                        <div>

                            <h2 class="text-xl font-bold text-gray-900">
                                Basic Information
                            </h2>

                            <p class="text-sm text-gray-500">
                                Informasi utama solution.
                            </p>

                        </div>

                    </div>


                    {{-- Title --}}
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Title
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $solution->title) }}"
                            required
                            class="w-full bg-white text-gray-900 placeholder-gray-400 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition"
                        >

                        @error('title')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Slug --}}
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Slug
                        </label>

                        <input
                            type="text"
                            name="slug"
                            value="{{ old('slug', $solution->slug) }}"
                            class="w-full bg-white text-gray-900 placeholder-gray-400 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition"
                        >

                        <p class="mt-2 text-xs text-gray-500">
                            Slug digunakan sebagai alamat URL solution.
                        </p>

                        @error('slug')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Short Description --}}
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Short Description
                        </label>

                        <textarea
                            name="short_description"
                            rows="3"
                            class="w-full bg-white text-gray-900 placeholder-gray-400 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition resize-none"
                        >{{ old('short_description', $solution->short_description) }}</textarea>

                    </div>


                    {{-- Description --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            class="w-full bg-white text-gray-900 placeholder-gray-400 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition resize-y"
                        >{{ old('description', $solution->description) }}</textarea>

                    </div>

                </div>


                {{-- Visual --}}
                <div class="mb-10 pt-8 border-t border-gray-100">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-9 h-9 rounded-lg bg-pink-50 flex items-center justify-center">
                            <span class="text-pink-600 font-bold">
                                02
                            </span>
                        </div>

                        <div>

                            <h2 class="text-xl font-bold text-gray-900">
                                Visual
                            </h2>

                            <p class="text-sm text-gray-500">
                                Icon dan gambar solution.
                            </p>

                        </div>

                    </div>


                    {{-- Icon --}}
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Icon
                        </label>

                        <input
                            type="text"
                            name="icon"
                            value="{{ old('icon', $solution->icon) }}"
                            class="w-full bg-white text-gray-900 placeholder-gray-400 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition"
                        >

                    </div>


                    {{-- Current Image --}}
                    @if($solution->image)

                        <div class="mb-6">

                            <label class="block mb-2 text-sm font-semibold text-gray-900">
                                Current Image
                            </label>

                            <img
                                src="{{ asset('storage/' . $solution->image) }}"
                                alt="{{ $solution->title }}"
                                class="w-48 h-32 object-cover rounded-xl border border-gray-200"
                            >

                        </div>

                    @endif


                    {{-- New Image --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            {{ $solution->image ? 'Change Image' : 'Image' }}
                        </label>

                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 hover:border-red-400 transition">

                            <input
                                type="file"
                                name="image"
                                accept=".jpg,.jpeg,.png,.webp"
                                class="w-full text-gray-900 text-sm"
                            >

                            <p class="mt-3 text-xs text-gray-500">
                                JPG PNG atau WEBP maksimal 2 MB.
                            </p>

                        </div>

                        @error('image')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- Features --}}
                <div class="mb-10 pt-8 border-t border-gray-100">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-9 h-9 rounded-lg bg-red-50 flex items-center justify-center">
                            <span class="text-red-600 font-bold">
                                03
                            </span>
                        </div>

                        <div>

                            <h2 class="text-xl font-bold text-gray-900">
                                Features
                            </h2>

                            <p class="text-sm text-gray-500">
                                Fitur yang dimiliki solution.
                            </p>

                        </div>

                    </div>


                    <label class="block mb-2 text-sm font-semibold text-gray-900">
                        Solution Features
                    </label>

                    <textarea
                        name="features"
                        rows="6"
                        class="w-full bg-white text-gray-900 placeholder-gray-400 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition resize-y"
                    >{{ old('features', is_array($solution->features) ? implode("\n", $solution->features) : $solution->features) }}</textarea>

                    <p class="mt-2 text-xs text-gray-500">
                        Satu feature per baris.
                    </p>

                </div>


                {{-- Settings --}}
                <div class="mb-10 pt-8 border-t border-gray-100">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-9 h-9 rounded-lg bg-pink-50 flex items-center justify-center">
                            <span class="text-pink-600 font-bold">
                                04
                            </span>
                        </div>

                        <div>

                            <h2 class="text-xl font-bold text-gray-900">
                                Settings
                            </h2>

                            <p class="text-sm text-gray-500">
                                Pengaturan tampilan solution.
                            </p>

                        </div>

                    </div>


                    {{-- Sort Order --}}
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Sort Order
                        </label>

                        <input
                            type="number"
                            name="sort_order"
                            value="{{ old('sort_order', $solution->sort_order) }}"
                            min="0"
                            class="w-full bg-white text-gray-900 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition"
                        >

                        <p class="mt-2 text-xs text-gray-500">
                            Angka lebih kecil akan ditampilkan lebih dahulu.
                        </p>

                    </div>


                    {{-- Active --}}
                    <div class="flex items-center justify-between p-4 bg-pink-50 border border-pink-100 rounded-xl">

                        <div>

                            <p class="font-semibold text-gray-900">
                                Active
                            </p>

                            <p class="text-sm text-gray-600">
                                Tampilkan solution pada website.
                            </p>

                        </div>

                        <label class="relative inline-flex items-center cursor-pointer">

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                {{ old('is_active', $solution->is_active) ? 'checked' : '' }}
                                class="sr-only peer"
                            >

                            <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-red-600 transition"></div>

                            <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition peer-checked:translate-x-5"></div>

                        </label>

                    </div>

                </div>


                {{-- Actions --}}
                <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row gap-3 sm:justify-end">

                    <a
                        href="{{ route('admin.solutions.index') }}"
                        class="px-6 py-3.5 border border-gray-300 text-gray-900 rounded-xl font-semibold text-center hover:border-red-400 hover:text-red-600 transition"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-7 py-3.5 bg-gradient-to-r from-red-600 to-pink-600 text-white rounded-xl font-semibold shadow-md hover:shadow-lg hover:from-red-700 hover:to-pink-700 transition"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
```
