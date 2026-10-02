@extends('layouts.admin')

@section('title', 'Projects')

@section('content')

<div class="min-h-screen bg-white text-black">

    <section class="border-b border-gray-200 bg-white">
        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                        Admin
                    </p>

                    <h1 class="mt-3 text-3xl md:text-4xl font-bold">
                        Portfolio
                    </h1>

                    <p class="mt-2 text-gray-500">
                        Kelola project dan portfolio BRAMAX.
                    </p>
                </div>

                <a
                    href="{{ route('admin.projects.create') }}"
                    class="inline-flex items-center justify-center rounded-xl bg-[#D90000] px-5 py-3 font-semibold text-white transition hover:bg-[#B00000]"
                >
                    + Tambah Project
                </a>

            </div>

        </div>
    </section>


    @if (session('success'))

        <div class="max-w-7xl mx-auto px-6 pt-6">

            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                {{ session('success') }}
            </div>

        </div>

    @endif


    <section class="py-10">

        <div class="max-w-7xl mx-auto px-6">

            @if ($projects->count())

                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[900px]">

                            <thead class="border-b border-gray-200 bg-gray-50">

                                <tr>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Project
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Category
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Tahun
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Status
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Featured
                                    </th>

                                    <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-gray-100">

                                @foreach ($projects as $project)

                                    <tr class="transition hover:bg-gray-50">

                                        <td class="px-6 py-5">

                                            <p class="font-semibold text-black">
                                                {{ $project->title }}
                                            </p>

                                            @if ($project->location)

                                                <p class="mt-1 text-sm text-gray-500">
                                                    {{ $project->location }}
                                                </p>

                                            @endif

                                        </td>


                                        <td class="px-6 py-5">

                                            @if ($project->category)

                                                <span class="text-sm text-gray-600">
                                                    {{ $project->category->name }}
                                                </span>

                                            @else

                                                <span class="text-sm text-gray-400">
                                                    Tidak ada kategori
                                                </span>

                                            @endif

                                        </td>


                                        <td class="px-6 py-5 text-sm text-gray-600">

                                            {{ $project->year ?? '-' }}

                                        </td>


                                        <td class="px-6 py-5">

                                            <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                                {{ $project->status }}
                                            </span>

                                        </td>


                                        <td class="px-6 py-5">

                                            @if ($project->featured)

                                                <span class="inline-flex rounded-full bg-pink-100 px-3 py-1 text-xs font-semibold text-[#D90000]">
                                                    Featured
                                                </span>

                                            @else

                                                <span class="text-sm text-gray-400">
                                                    -
                                                </span>

                                            @endif

                                        </td>


                                        <td class="px-6 py-5">

                                            <div class="flex justify-end gap-2">

                                                <a
                                                    href="{{ route('admin.projects.edit', $project) }}"
                                                    class="rounded-lg border border-gray-200 px-4 py-2 text-sm font-semibold hover:border-[#D90000] hover:text-[#D90000]"
                                                >
                                                    Edit
                                                </a>


                                                <form
                                                    action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Hapus project ini?')"
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

                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-pink-50">

                        <span class="text-2xl">
                            📁
                        </span>

                    </div>

                    <h2 class="mt-6 text-2xl font-bold">
                        Belum ada project
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Tambahkan project pertama BRAMAX.
                    </p>

                    <a
                        href="{{ route('admin.projects.create') }}"
                        class="mt-6 inline-flex rounded-xl bg-[#D90000] px-5 py-3 font-semibold text-white hover:bg-[#B00000]"
                    >
                        Tambah Project
                    </a>

                </div>

            @endif

        </div>

    </section>

</div>

@endsection