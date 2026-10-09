@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white px-6 py-10 text-[#252525]">

    <div class="mx-auto max-w-4xl">

        {{-- Header --}}
        <div class="mb-8">

            <a
                href="{{ route('admin.downloads.index') }}"
                class="mb-4 inline-block text-sm text-gray-500 transition hover:text-[#D90000]"
            >
                ← Kembali ke Download
            </a>

            <h1 class="text-2xl font-bold text-[#252525]">
                Tambah Download
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Tambahkan dokumen yang dapat diunduh oleh pengunjung
            </p>

        </div>


        {{-- Validation Error --}}
        @if($errors->any())

            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-5 py-4">

                <ul class="space-y-1 text-sm text-red-600">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Form --}}
        <form
            action="{{ route('admin.downloads.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6"
        >

            @csrf


            {{-- Title --}}
            <div>

                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Judul Dokumen
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    required
                    placeholder="Contoh: Company Profile BRAMAX"
                    class="w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-[#252525] placeholder-gray-400 outline-none transition focus:border-[#D90000] focus:ring-1 focus:ring-[#D90000]"
                >

            </div>


            {{-- Description --}}
            <div>

                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="5"
                    placeholder="Deskripsi singkat mengenai dokumen..."
                    class="w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-[#252525] placeholder-gray-400 outline-none transition focus:border-[#D90000] focus:ring-1 focus:ring-[#D90000]"
                >{{ old('description') }}</textarea>

            </div>


            {{-- File --}}
            <div>

                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    File PDF
                </label>

                <input
                    type="file"
                    name="file"
                    accept=".pdf,application/pdf"
                    class="block w-full rounded-lg border border-gray-200 bg-white text-sm text-gray-500 file:mr-4 file:border-0 file:bg-[#D90000] file:px-4 file:py-3 file:text-sm file:font-semibold file:text-white hover:file:bg-red-700"
                >

                <p class="mt-2 text-xs text-gray-400">
                    Format PDF dengan ukuran maksimal 10 MB.
                </p>

            </div>


            {{-- Status --}}
            <div class="rounded-lg border border-gray-200 bg-gray-50 p-5">

                <label class="flex cursor-pointer items-center gap-3">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ old('is_active', true) ? 'checked' : '' }}
                        class="h-5 w-5 rounded border-gray-300 text-[#D90000] focus:ring-[#D90000]"
                    >

                    <div>

                        <div class="text-sm font-semibold text-gray-700">
                            Aktifkan dokumen
                        </div>

                        <div class="mt-1 text-xs text-gray-500">
                            Dokumen aktif akan ditampilkan pada halaman Download.
                        </div>

                    </div>

                </label>

            </div>


            {{-- Buttons --}}
            <div class="flex items-center justify-end gap-3 pt-4">

                <a
                    href="{{ route('admin.downloads.index') }}"
                    class="rounded-lg border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-600 transition hover:bg-gray-50"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-[#D90000] px-6 py-3 text-sm font-semibold text-white transition hover:bg-red-700"
                >
                    Simpan Download
                </button>

            </div>

        </form>

    </div>

</div>

@endsection

