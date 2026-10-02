@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gray-50 px-6 py-10">

```
<div class="mx-auto max-w-5xl">

    {{-- HEADER --}}
    <div class="mb-8">

        <a
            href="{{ route('admin.projects.index') }}"
            class="text-sm font-medium text-gray-500 transition hover:text-[#e40046]"
        >
            ← Kembali ke Projects
        </a>

        <div class="mt-5">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#e40046]">
                Portfolio
            </p>

            <h1 class="mt-2 text-3xl font-bold text-gray-900">
                Edit Project
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Perbarui informasi dan dokumentasi project.
            </p>
        </div>

    </div>


    {{-- VALIDATION ERROR --}}
    @if ($errors->any())

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">

            <p class="font-semibold text-red-700">
                Terdapat kesalahan:
            </p>

            <ul class="mt-2 list-inside list-disc text-sm text-red-600">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- SUCCESS --}}
    @if (session('success'))

        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
            {{ session('success') }}
        </div>

    @endif


    {{-- FORM --}}
    <form
        action="{{ route('admin.projects.update', $project) }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf
        @method('PUT')


        {{-- BASIC INFORMATION --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <h2 class="text-lg font-bold text-gray-900">
                Informasi Project
            </h2>

            <div class="mt-6 grid gap-6 md:grid-cols-2">


                {{-- TITLE --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-semibold text-gray-700">
                        Judul Project
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $project->title) }}"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-[#e40046] focus:ring-2 focus:ring-[#e40046]/10"
                    >

                </div>


                {{-- SCOPE --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-semibold text-gray-700">
                        Scope Project
                    </label>

                    <textarea
                        name="scope"
                        rows="5"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-[#e40046] focus:ring-2 focus:ring-[#e40046]/10"
                    >{{ old('scope', $project->scope) }}</textarea>

                </div>


                {{-- LOCATION --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-gray-700">
                        Lokasi
                    </label>

                    <input
                        type="text"
                        name="location"
                        value="{{ old('location', $project->location) }}"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-[#e40046] focus:ring-2 focus:ring-[#e40046]/10"
                    >

                </div>


                {{-- YEAR --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-gray-700">
                        Tahun
                    </label>

                    <input
                        type="number"
                        name="year"
                        value="{{ old('year', $project->year) }}"
                        min="1900"
                        max="2100"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-[#e40046] focus:ring-2 focus:ring-[#e40046]/10"
                    >

                </div>


                {{-- CATEGORY --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-gray-700">
                        Kategori
                    </label>

                    <select
                        name="project_category_id"
                        required
                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#e40046] focus:ring-2 focus:ring-[#e40046]/10"
                    >

                        <option value="">
                            Pilih Kategori
                        </option>

                        @foreach ($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                @selected(old('project_category_id', $project->project_category_id) == $category->id)
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- STATUS --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-gray-700">
                        Status
                    </label>

                    <select
                        name="status"
                        required
                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#e40046] focus:ring-2 focus:ring-[#e40046]/10"
                    >

                        <option
                            value="Completed"
                            @selected(old('status', $project->status) === 'Completed')
                        >
                            Completed
                        </option>

                        <option
                            value="Ongoing"
                            @selected(old('status', $project->status) === 'Ongoing')
                        >
                            Ongoing
                        </option>

                        <option
                            value="Planned"
                            @selected(old('status', $project->status) === 'Planned')
                        >
                            Planned
                        </option>

                    </select>

                </div>


                {{-- FEATURED --}}
                <div class="md:col-span-2">

                    <label class="flex cursor-pointer items-center gap-3">

                        <input
                            type="checkbox"
                            name="featured"
                            value="1"
                            @checked(old('featured', $project->featured))
                            class="h-4 w-4 rounded border-gray-300 text-[#e40046] focus:ring-[#e40046]"
                        >

                        <span class="text-sm font-medium text-gray-700">
                            Tampilkan project ini sebagai Featured di homepage
                        </span>

                    </label>

                </div>

            </div>

        </div>


        {{-- CURRENT IMAGES --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <div>

                <h2 class="text-lg font-bold text-gray-900">
                    Foto Project
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Foto yang sudah tersimpan pada project ini.
                </p>

            </div>


            @if ($project->images->count())

                <div class="mt-6 grid grid-cols-2 gap-4 md:grid-cols-4">

                    @foreach ($project->images->sortBy('sort_order') as $image)

                        <div class="group overflow-hidden rounded-xl border border-gray-200 bg-gray-50">

                            <div class="relative aspect-square overflow-hidden">

                                <img
                                    src="{{ asset('storage/' . $image->image) }}"
                                    alt="{{ $image->alt_text ?? $project->title }}"
                                    class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                                >

                            </div>


                            <div class="p-3">

                                <p class="truncate text-xs text-gray-500">
                                    {{ $image->alt_text ?? $project->title }}
                                </p>

                                <form
                                    action="{{ route('admin.project-images.destroy', $image) }}"
                                    method="POST"
                                    class="mt-3"
                                    onsubmit="return confirm('Hapus foto ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="w-full rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50"
                                    >
                                        Hapus Foto
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="mt-6 rounded-xl border border-dashed border-gray-300 bg-gray-50 px-6 py-10 text-center">

                    <p class="text-sm text-gray-500">
                        Belum ada foto pada project ini.
                    </p>

                </div>

            @endif

        </div>


        {{-- ADD NEW IMAGES --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <h2 class="text-lg font-bold text-gray-900">
                Tambah Foto
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Tambahkan foto baru tanpa menghapus foto yang sudah ada.
            </p>

            <div class="mt-5">

                <input
                    type="file"
                    name="images[]"
                    multiple
                    accept="image/jpeg,image/png,image/webp"
                    class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-600"
                >

                <p class="mt-2 text-xs text-gray-400">
                    JPG, JPEG, PNG atau WEBP. Maksimal 5MB per foto.
                </p>

            </div>

        </div>


        {{-- ACTION --}}
        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

            <a
                href="{{ route('admin.projects.index') }}"
                class="rounded-xl border border-gray-300 bg-white px-6 py-3 text-center text-sm font-semibold text-gray-700 transition hover:bg-gray-50"
            >
                Batal
            </a>

            <button
                type="submit"
                class="rounded-xl bg-[#e40046] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#c9003d]"
            >
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>
```

</div>

@endsection
