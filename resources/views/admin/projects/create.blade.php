@extends('layouts.admin')
@section('title', 'Tambah Project')

@section('content')

<div class="min-h-screen bg-white text-black">

    <div class="max-w-4xl mx-auto px-6 py-10">

        {{-- Header --}}
        <div class="mb-8">

            <a
                href="{{ route('admin.projects.index') }}"
                class="text-sm font-semibold text-gray-500 hover:text-[#D90000]"
            >
                ← Kembali ke Portfolio
            </a>

            <p class="mt-6 text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                Portfolio
            </p>

            <h1 class="mt-3 text-3xl font-bold">
                Tambah Project
            </h1>

            <p class="mt-2 text-gray-500">
                Tambahkan project baru ke portfolio BRAMAX.
            </p>

        </div>


        {{-- Error --}}
        @if ($errors->any())

            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5">

                <p class="font-semibold text-[#D90000]">
                    Periksa kembali data Anda.
                </p>

                <ul class="mt-2 list-disc pl-5 text-sm text-gray-600">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('admin.projects.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6"
        >

            @csrf


            {{-- Informasi Project --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <h2 class="text-xl font-bold">
                    Informasi Project
                </h2>

                <div class="mt-6 space-y-5">

                    {{-- Judul --}}
                    <div>

                        <label
                            for="title"
                            class="block text-sm font-semibold"
                        >
                            Judul Project
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            required
                            class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-3 outline-none focus:border-[#D90000]"
                            placeholder="Contoh: Website Company Profile BRAMAX"
                        >

                    </div>


                    {{-- Scope --}}
                    <div>

                        <label
                            for="scope"
                            class="block text-sm font-semibold"
                        >
                            Scope
                        </label>

                        <textarea
                            id="scope"
                            name="scope"
                            rows="5"
                            class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-3 outline-none focus:border-[#D90000]"
                            placeholder="Jelaskan pekerjaan atau ruang lingkup project..."
                        >{{ old('scope') }}</textarea>

                    </div>


                    {{-- Location & Year --}}
                    <div class="grid gap-5 md:grid-cols-2">

                        <div>

                            <label
                                for="location"
                                class="block text-sm font-semibold"
                            >
                                Lokasi
                            </label>

                            <input
                                type="text"
                                id="location"
                                name="location"
                                value="{{ old('location') }}"
                                class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-3 outline-none focus:border-[#D90000]"
                                placeholder="Contoh: Jakarta"
                            >

                        </div>


                        <div>

                            <label
                                for="year"
                                class="block text-sm font-semibold"
                            >
                                Tahun
                            </label>

                            <input
                                type="number"
                                id="year"
                                name="year"
                                value="{{ old('year') }}"
                                min="1900"
                                max="2100"
                                class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-3 outline-none focus:border-[#D90000]"
                                placeholder="2026"
                            >

                        </div>

                    </div>


                    {{-- Project Category --}}
                    <div>

                        <label
                            for="project_category_id"
                            class="block text-sm font-semibold"
                        >
                            Kategori Project
                        </label>

                        <select
                            id="project_category_id"
                            name="project_category_id"
                            required
                            class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 outline-none focus:border-[#D90000]"
                        >

                            <option value="">
                                Pilih kategori
                            </option>

                            @foreach ($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    @selected(old('project_category_id') == $category->id)
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                        @if ($categories->isEmpty())

                            <p class="mt-2 text-sm text-[#D90000]">
                                Belum ada kategori project.
                            </p>

                        @endif

                    </div>


                    {{-- Status --}}
                    <div>

                        <label
                            for="status"
                            class="block text-sm font-semibold"
                        >
                            Status
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                            class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 outline-none focus:border-[#D90000]"
                        >

                            <option
                                value="Completed"
                                @selected(old('status', 'Completed') === 'Completed')
                            >
                                Completed
                            </option>

                            <option
                                value="Ongoing"
                                @selected(old('status') === 'Ongoing')
                            >
                                Ongoing
                            </option>

                            <option
                                value="Planned"
                                @selected(old('status') === 'Planned')
                            >
                                Planned
                            </option>

                        </select>

                    </div>


                    {{-- Featured --}}
                    <div class="flex items-center gap-3">

                        <input
                            type="hidden"
                            name="featured"
                            value="0"
                        >

                        <input
                            type="checkbox"
                            name="featured"
                            value="1"
                            id="featured"
                            @checked(old('featured'))
                            class="h-5 w-5 rounded border-gray-300 text-[#D90000] focus:ring-[#D90000]"
                        >

                        <label
                            for="featured"
                            class="text-sm font-semibold"
                        >
                            Tampilkan sebagai Featured Project
                        </label>

                    </div>

                </div>

            </div>


            {{-- Gallery --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <h2 class="text-xl font-bold">
                    Gallery Project
                </h2>

                <p class="mt-2 text-sm text-gray-500">
                    Pilih satu atau beberapa foto project.
                </p>


                <div class="mt-5">

                    <input
                        type="file"
                        name="images[]"
                        multiple
                        accept="image/jpeg,image/png,image/webp"
                        class="block w-full rounded-xl border border-gray-200 p-3 text-sm"
                    >

                </div>


                <p class="mt-2 text-xs text-gray-400">
                    Format JPG PNG atau WEBP. Maksimal 5MB per foto.
                </p>

            </div>


            {{-- Button --}}
            <div class="flex justify-end gap-3">

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="rounded-xl border border-gray-200 px-5 py-3 font-semibold hover:bg-gray-50"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-[#D90000] px-6 py-3 font-semibold text-white hover:bg-[#B00000]"
                >
                    Simpan Project
                </button>

            </div>

        </form>

    </div>

</div>

@endsection