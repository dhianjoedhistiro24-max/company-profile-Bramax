@extends('layouts.admin')

@section('title', 'Kategori Portfolio')

@section('content')

<div class="min-h-screen bg-white text-black">

    <section class="border-b border-gray-200 bg-white">
        <div class="max-w-6xl mx-auto px-6 py-10">

            <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

                <div>

                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                        Portfolio
                    </p>

                    <h1 class="mt-3 text-3xl md:text-4xl font-bold">
                        Kategori Portfolio
                    </h1>

                    <p class="mt-2 text-gray-500">
                        Kelola kategori project BRAMAX.
                    </p>

                </div>

                <a
                    href="{{ route('admin.project-categories.create') }}"
                    class="inline-flex items-center justify-center rounded-xl bg-[#D90000] px-5 py-3 font-semibold text-white hover:bg-[#B00000]"
                >
                    + Tambah Kategori
                </a>

            </div>

        </div>
    </section>


    @if (session('success'))

        <div class="max-w-6xl mx-auto px-6 pt-6">

            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                {{ session('success') }}
            </div>

        </div>

    @endif


    @if (session('error'))

        <div class="max-w-6xl mx-auto px-6 pt-6">

            <div class="rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                {{ session('error') }}
            </div>

        </div>

    @endif


    <section class="py-10">

        <div class="max-w-6xl mx-auto px-6">

            @if ($categories->count())

                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[700px]">

                            <thead class="border-b border-gray-200 bg-gray-50">

                                <tr>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Kategori
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Slug
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Project
                                    </th>

                                    <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-gray-100">

                                @foreach ($categories as $category)

                                    <tr class="hover:bg-gray-50">

                                        <td class="px-6 py-5">

                                            <p class="font-semibold">
                                                {{ $category->name }}
                                            </p>

                                            @if ($category->description)

                                                <p class="mt-1 text-sm text-gray-500">
                                                    {{ $category->description }}
                                                </p>

                                            @endif

                                        </td>


                                        <td class="px-6 py-5 text-sm text-gray-500">
                                            {{ $category->slug }}
                                        </td>


                                        <td class="px-6 py-5 text-sm text-gray-600">
                                            {{ $category->projects_count }} project
                                        </td>


                                        <td class="px-6 py-5">

                                            <div class="flex justify-end gap-2">

                                                <a
                                                    href="{{ route('admin.project-categories.edit', $category) }}"
                                                    class="rounded-lg border border-gray-200 px-4 py-2 text-sm font-semibold hover:border-[#D90000] hover:text-[#D90000]"
                                                >
                                                    Edit
                                                </a>


                                                <form
                                                    action="{{ route('admin.project-categories.destroy', $category) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Hapus kategori ini?')"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="rounded-lg border border-red-200 px-4 py-2 text-sm font-semibold text-[#D90000] hover:bg-red-50"
                                                    >
                                                        Hapus
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            @else

                <div class="rounded-2xl border border-gray-200 px-6 py-16 text-center">

                    <h2 class="text-2xl font-bold">
                        Belum ada kategori
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Tambahkan kategori Portfolio pertama BRAMAX.
                    </p>

                    <a
                        href="{{ route('admin.project-categories.create') }}"
                        class="mt-6 inline-flex rounded-xl bg-[#D90000] px-5 py-3 font-semibold text-white hover:bg-[#B00000]"
                    >
                        Tambah Kategori
                    </a>

                </div>

            @endif

        </div>

    </section>

</div>

@endsection