
@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white px-6 py-10 text-[#252525]">

    <div class="mx-auto max-w-4xl">

        {{-- HEADER --}}
        <div class="mb-8">

            <a
                href="{{ route('admin.business-categories.index') }}"
                class="mb-5 inline-flex items-center gap-2 text-sm text-gray-500 transition hover:text-[#D90000]"
            >
                ← Kembali ke Business Categories
            </a>

            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                Business Management
            </p>

            <h1 class="mt-2 text-3xl font-bold tracking-tight text-[#111111]">
                Edit Business Category
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Perbarui informasi kategori bisnis BRAMAX
            </p>

        </div>


        {{-- ERROR --}}
        @if ($errors->any())

            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4">

                <p class="mb-2 text-sm font-semibold text-[#D90000]">
                    Periksa kembali data yang diinput
                </p>

                <ul class="space-y-1 text-xs text-red-600">

                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORM --}}
        <form
            action="{{ route('admin.business-categories.update', $businessCategory) }}"
            method="POST"
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-[0_8px_30px_rgba(0,0,0,0.04)]"
        >

            @csrf
            @method('PUT')


            {{-- FORM CONTENT --}}
            <div class="space-y-7 p-6 md:p-8">


                {{-- NAME --}}
                <div>

                    <label
                        for="name"
                        class="mb-2 block text-sm font-semibold text-[#111111]"
                    >
                        Nama Category
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $businessCategory->name) }}"
                        required
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-[#252525] outline-none transition placeholder:text-gray-400 focus:border-[#D90000] focus:ring-1 focus:ring-[#D90000]"
                    >

                    @error('name')
                        <p class="mt-2 text-xs text-[#D90000]">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- SLUG --}}
                <div>

                    <label
                        for="slug"
                        class="mb-2 block text-sm font-semibold text-[#111111]"
                    >
                        Slug
                    </label>

                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        value="{{ old('slug', $businessCategory->slug) }}"
                        required
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-[#252525] outline-none transition placeholder:text-gray-400 focus:border-[#D90000] focus:ring-1 focus:ring-[#D90000]"
                    >

                    <p class="mt-2 text-xs text-gray-400">
                        Gunakan huruf kecil dan tanda strip
                    </p>

                    @error('slug')
                        <p class="mt-2 text-xs text-[#D90000]">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ICON --}}
                <div>

                    <label
                        for="icon"
                        class="mb-2 block text-sm font-semibold text-[#111111]"
                    >
                        Icon
                    </label>

                    <input
                        type="text"
                        id="icon"
                        name="icon"
                        value="{{ old('icon', $businessCategory->icon) }}"
                        placeholder="Contoh: code"
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-[#252525] outline-none transition placeholder:text-gray-400 focus:border-[#D90000] focus:ring-1 focus:ring-[#D90000]"
                    >

                    <p class="mt-2 text-xs text-gray-400">
                        Isi nama icon yang digunakan pada website
                    </p>

                    @error('icon')
                        <p class="mt-2 text-xs text-[#D90000]">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- DESCRIPTION --}}
                <div>

                    <label
                        for="description"
                        class="mb-2 block text-sm font-semibold text-[#111111]"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        placeholder="Masukkan deskripsi kategori bisnis..."
                        class="w-full resize-none rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm leading-6 text-[#252525] outline-none transition placeholder:text-gray-400 focus:border-[#D90000] focus:ring-1 focus:ring-[#D90000]"
                    >{{ old('description', $businessCategory->description) }}</textarea>

                    @error('description')
                        <p class="mt-2 text-xs text-[#D90000]">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>


            {{-- FORM FOOTER --}}
            <div class="flex flex-col-reverse gap-3 border-t border-gray-100 bg-gray-50 px-6 py-5 sm:flex-row sm:justify-between md:px-8">

                {{-- HAPUS --}}
                <form
                    action="{{ route('admin.business-categories.destroy', $businessCategory) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus category ini?')"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl border border-red-200 bg-white px-5 py-3 text-sm font-semibold text-[#D90000] transition duration-300 hover:bg-red-50"
                    >
                        Hapus Category
                    </button>

                </form>


                <div class="flex flex-col gap-3 sm:flex-row">

                    {{-- BATAL --}}
                    <a
                        href="{{ route('admin.business-categories.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-semibold text-gray-600 transition duration-300 hover:border-gray-300 hover:bg-gray-100 hover:text-[#111111]"
                    >
                        Batal
                    </a>


                    {{-- UPDATE --}}
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-[#D90000] px-5 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-[#B00000] hover:shadow-lg"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection

