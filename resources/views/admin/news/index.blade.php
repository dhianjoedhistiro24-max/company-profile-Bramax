@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white py-10">

    <div class="mx-auto max-w-7xl px-6">

        {{-- Header --}}
        <div class="mb-8 flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

            <div>

                <p class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-[#e40046]">
                    Admin / News
                </p>

                <h1 class="text-3xl font-bold tracking-tight text-[#111111]">
                    Daftar Berita
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Kelola berita dan insight BRAMAX
                </p>

            </div>


            <div class="flex items-center gap-3">

                <a
                    href="{{ route('home') }}"
                    class="rounded-lg border border-gray-200 bg-white px-4 py-2.5
                           text-sm font-semibold text-gray-700
                           transition hover:border-gray-300 hover:bg-gray-50"
                >
                    ← Kembali
                </a>

                <a
                    href="{{ route('admin.news.create') }}"
                    class="rounded-lg bg-[#e40046] px-5 py-2.5
                           text-sm font-semibold text-white
                           shadow-sm transition hover:bg-[#c9003d] hover:shadow-md"
                >
                    + Tambah Berita
                </a>

            </div>

        </div>


        {{-- Success Message --}}
        @if (session('success'))

            <div class="mb-6 flex items-center gap-3 rounded-xl
                        border border-green-200 bg-green-50 px-5 py-4">

                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100">

                    <span class="text-sm text-green-600">
                        ✓
                    </span>

                </div>

                <p class="text-sm font-medium text-green-700">
                    {{ session('success') }}
                </p>

            </div>

        @endif


        {{-- News Table Card --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">


            {{-- Table Header --}}
            <div class="flex flex-col gap-2 border-b border-gray-100 px-6 py-5
                        md:flex-row md:items-center md:justify-between">

                <div>

                    <h2 class="text-lg font-bold text-[#111111]">
                        Semua Berita
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Daftar berita yang tersimpan di sistem
                    </p>

                </div>

                <div class="text-sm text-gray-400">
                    {{ $news->count() }} berita
                </div>

            </div>


            {{-- Table --}}
            <div class="overflow-x-auto">

                <table class="w-full min-w-[1000px] text-left">

                    <thead class="border-b border-gray-100 bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                Foto
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                Judul Berita
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                Kategori
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                Author
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                Publish
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse ($news as $item)

                            <tr class="transition hover:bg-gray-50/70">


                                {{-- Foto --}}
                                <td class="px-6 py-5">

                                    @if ($item->featured_image)

                                        <img
                                            src="{{ asset('storage/' . $item->featured_image) }}"
                                            alt="{{ $item->title }}"
                                            class="h-14 w-20 rounded-lg border border-gray-200 object-cover"
                                        >

                                    @else

                                        <div class="flex h-14 w-20 items-center justify-center
                                                    rounded-lg border border-dashed border-gray-300
                                                    bg-gray-50">

                                            <span class="text-[11px] text-gray-400">
                                                No Image
                                            </span>

                                        </div>

                                    @endif

                                </td>


                                {{-- Judul --}}
                                <td class="max-w-[280px] px-6 py-5">

                                    <p class="font-semibold leading-snug text-[#111111]">
                                        {{ $item->title }}
                                    </p>

                                </td>


                                {{-- Kategori --}}
                                <td class="px-6 py-5">

                                    <span class="inline-flex rounded-full
                                                 bg-[#fff1f4] px-3 py-1.5
                                                 text-xs font-semibold text-[#e40046]">

                                        {{ $item->category->name ?? 'Tanpa Kategori' }}

                                    </span>

                                </td>


                                {{-- Author --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-2">

                                        <div class="flex h-8 w-8 items-center justify-center
                                                    rounded-full bg-gray-100">

                                            <span class="text-xs font-bold text-gray-500">
                                                {{ strtoupper(substr($item->author->name ?? 'A', 0, 1)) }}
                                            </span>

                                        </div>

                                        <span class="text-sm text-gray-600">
                                            {{ $item->author->name ?? 'Admin' }}
                                        </span>

                                    </div>

                                </td>


                                {{-- Tanggal Publish --}}
                                <td class="px-6 py-5">

                                    @if ($item->published_at)

                                        <span class="text-sm text-gray-600">
                                            {{ $item->published_at->format('d M Y') }}
                                        </span>

                                    @else

                                        <span class="text-sm text-gray-400">
                                            Belum publish
                                        </span>

                                    @endif

                                </td>


                                {{-- Status --}}
                                <td class="px-6 py-5">

                                    @if ($item->status === 'Published')

                                        <span class="inline-flex items-center gap-1.5
                                                     rounded-full bg-green-50 px-3 py-1.5
                                                     text-xs font-semibold text-green-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                            Published

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5
                                                     rounded-full bg-orange-50 px-3 py-1.5
                                                     text-xs font-semibold text-orange-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span>

                                            Draft

                                        </span>

                                    @endif

                                </td>


                                {{-- Aksi --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-2">


                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.news.edit', $item->id) }}"
                                            class="rounded-lg border border-gray-200
                                                   bg-white px-3 py-2
                                                   text-xs font-semibold text-gray-700
                                                   transition hover:border-gray-300
                                                   hover:bg-gray-50"
                                        >
                                            Edit
                                        </a>


                                        {{-- Publish --}}
                                        @if ($item->status !== 'Published')

                                            <form
                                                action="{{ route('admin.news.publish', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Publish berita ini?')"
                                            >

                                                @csrf

                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="rounded-lg bg-[#e40046]
                                                           px-3 py-2 text-xs font-semibold
                                                           text-white transition
                                                           hover:bg-[#c9003d]"
                                                >
                                                    Publish
                                                </button>

                                            </form>

                                        @endif


                                        {{-- Hapus --}}
                                        <form
                                            action="{{ route('admin.news.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg border border-red-200
                                                       bg-white px-3 py-2
                                                       text-xs font-semibold text-[#e40046]
                                                       transition hover:bg-red-50"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="px-6 py-20 text-center"
                                >

                                    <div class="mx-auto max-w-sm">

                                        <div class="mx-auto mb-4 flex h-14 w-14
                                                    items-center justify-center rounded-full
                                                    bg-gray-100">

                                            <span class="text-xl text-gray-400">
                                                +
                                            </span>

                                        </div>

                                        <h3 class="font-semibold text-[#111111]">
                                            Belum ada berita
                                        </h3>

                                        <p class="mt-1 text-sm text-gray-500">
                                            Tambahkan berita pertama untuk website BRAMAX.
                                        </p>

                                        <a
                                            href="{{ route('admin.news.create') }}"
                                            class="mt-5 inline-block rounded-lg
                                                   bg-[#e40046] px-5 py-2.5
                                                   text-sm font-semibold text-white
                                                   transition hover:bg-[#c9003d]"
                                        >
                                            + Tambah Berita
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
```
