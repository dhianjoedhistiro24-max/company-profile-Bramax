
@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white px-6 py-10 text-[#252525]">

    <div class="mx-auto max-w-7xl">

        {{-- HEADER --}}
        <div class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                    Business Management
                </p>

                <h1 class="mt-2 text-3xl font-bold tracking-tight text-[#111111]">
                    Business Categories
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Kelola kategori bisnis BRAMAX
                </p>
            </div>


            {{-- TAMBAH --}}
            <a
                href="{{ route('admin.business-categories.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#D90000] px-5 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-[#B00000] hover:shadow-lg"
            >
                <span class="text-lg leading-none">+</span>
                Tambah Category
            </a>

        </div>


        {{-- SUCCESS --}}
        @if (session('success'))

            <div class="mb-6 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                <span class="font-semibold">✓</span>

                {{ session('success') }}
            </div>

        @endif


        {{-- ERROR --}}
        @if ($errors->any())

            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4">

                <p class="mb-2 text-sm font-semibold text-[#D90000]">
                    Terjadi kesalahan
                </p>

                <ul class="space-y-1 text-xs text-red-600">

                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        {{-- TABLE --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-[0_8px_30px_rgba(0,0,0,0.04)]">

            {{-- TABLE HEADER --}}
            <div class="border-b border-gray-200 bg-gray-50 px-6 py-5">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-sm font-semibold text-[#111111]">
                            Daftar Business Categories
                        </h2>

                        <p class="mt-1 text-xs text-gray-500">
                            {{ $categories->count() }} kategori terdaftar
                        </p>

                    </div>

                </div>

            </div>


            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="border-b border-gray-200 bg-white">

                        <tr>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                                #
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Category
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Slug
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Icon
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse ($categories as $category)

                            <tr class="transition duration-200 hover:bg-[#fffafa]">

                                {{-- NUMBER --}}
                                <td class="px-6 py-5 text-sm text-gray-400">
                                    {{ $loop->iteration }}
                                </td>


                                {{-- CATEGORY --}}
                                <td class="px-6 py-5">

                                    <div>

                                        <p class="font-semibold text-[#111111]">
                                            {{ $category->name }}
                                        </p>

                                        @if ($category->description)

                                            <p class="mt-1 max-w-md truncate text-xs text-gray-500">
                                                {{ $category->description }}
                                            </p>

                                        @endif

                                    </div>

                                </td>


                                {{-- SLUG --}}
                                <td class="px-6 py-5">

                                    <span class="inline-flex rounded-lg bg-gray-100 px-3 py-1.5 text-xs text-gray-600">
                                        {{ $category->slug }}
                                    </span>

                                </td>


                                {{-- ICON --}}
                                <td class="px-6 py-5">

                                    @if ($category->icon)

                                        <span class="inline-flex rounded-lg bg-[#fff1f1] px-3 py-1.5 text-xs font-medium text-[#D90000]">
                                            {{ $category->icon }}
                                        </span>

                                    @else

                                        <span class="text-xs text-gray-300">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- ACTION --}}
                                <td class="px-6 py-5">

                                    <div class="flex justify-end gap-2">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.business-categories.edit', $category) }}"
                                            class="inline-flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 text-xs font-semibold text-gray-600 transition duration-300 hover:border-[#D90000] hover:text-[#D90000]"
                                        >
                                            Edit
                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('admin.business-categories.destroy', $category) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus category ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex items-center rounded-lg bg-[#D90000] px-4 py-2 text-xs font-semibold text-white transition duration-300 hover:bg-[#B00000] hover:shadow-md"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="px-6 py-16 text-center">

                                    <div class="mx-auto max-w-md">

                                        <p class="text-lg font-semibold text-gray-400">
                                            Belum ada Business Category
                                        </p>

                                        <p class="mt-2 text-sm text-gray-500">
                                            Tambahkan category pertama untuk BRAMAX.
                                        </p>

                                        <a
                                            href="{{ route('admin.business-categories.create') }}"
                                            class="mt-6 inline-flex rounded-xl bg-[#D90000] px-5 py-2.5 text-xs font-semibold text-white transition hover:bg-[#B00000]"
                                        >
                                            Tambah Category
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

