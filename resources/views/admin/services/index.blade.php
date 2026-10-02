@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white text-[#252525] py-10">

    <div class="max-w-7xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-8">

            <div>
                <p class="text-sm font-semibold text-[#D90000] uppercase tracking-widest">
                    Admin
                </p>

                <h1 class="mt-2 text-3xl font-bold text-black">
                    Services
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Kelola service berdasarkan kategori.
                </p>
            </div>

            <a
                href="{{ route('admin.services.create') }}"
                class="px-5 py-3 rounded-xl bg-[#D90000] text-white hover:bg-[#b80000] transition font-semibold shadow-sm"
            >
                + Tambah Service
            </a>

        </div>


        {{-- SUCCESS --}}
        @if (session('success'))

            <div class="mb-6 p-4 rounded-xl bg-[#E91E63]/10 border border-[#E91E63]/20 text-[#c2185b]">
                {{ session('success') }}
            </div>

        @endif


        {{-- CATEGORY FILTER --}}
        <div class="mb-6">

            <div class="flex flex-wrap gap-2">

                {{-- SEMUA --}}
                <a
                    href="{{ route('admin.services.index') }}"
                    class="px-4 py-2 rounded-lg text-sm font-semibold border transition
                    {{ !$selectedCategory
                        ? 'bg-[#D90000] text-white border-[#D90000]'
                        : 'bg-white text-gray-700 border-gray-200 hover:border-[#D90000] hover:text-[#D90000]'
                    }}"
                >
                    Semua

                    <span class="ml-1 opacity-80">
                        {{ $categories->sum('services_count') }}
                    </span>
                </a>


                {{-- KATEGORI --}}
                @foreach ($categories as $category)

                    <a
                        href="{{ route('admin.services.index', ['category' => $category->id]) }}"
                        class="px-4 py-2 rounded-lg text-sm font-semibold border transition
                        {{ (string) $selectedCategory === (string) $category->id
                            ? 'bg-[#D90000] text-white border-[#D90000]'
                            : 'bg-white text-gray-700 border-gray-200 hover:border-[#D90000] hover:text-[#D90000]'
                        }}"
                    >

                        {{ $category->name }}

                        <span class="ml-1 opacity-70">
                            {{ $category->services_count }}
                        </span>

                    </a>

                @endforeach

            </div>

        </div>


        {{-- ACTIVE CATEGORY --}}
        @if ($selectedCategory)

            @php
                $activeCategory = $categories->firstWhere('id', $selectedCategory);
            @endphp

            @if ($activeCategory)

                <div class="mb-5">

                    <h2 class="text-xl font-bold text-black">
                        {{ $activeCategory->name }}
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ $activeCategory->services_count }} service
                    </p>

                </div>

            @endif

        @else

            <div class="mb-5">

                <h2 class="text-xl font-bold text-black">
                    Semua Service
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    {{ $services->total() }} service
                </p>

            </div>

        @endif


        {{-- TABLE --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-[#fafafa] border-b border-gray-200">

                        <tr>

                            <th class="px-6 py-4 text-sm font-semibold text-black">
                                Foto
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-black">
                                Service
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-black">
                                Category
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-black">
                                Slug
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-black text-right">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse ($services as $service)

                            <tr class="hover:bg-[#fff5f7] transition">


                                {{-- FOTO --}}
                                <td class="px-6 py-4">

                                    @if ($service->image)

                                        <img
                                            src="{{ asset('storage/' . $service->image) }}"
                                            alt="{{ $service->name }}"
                                            class="w-20 h-14 object-cover rounded-lg border border-gray-200"
                                        >

                                    @else

                                        <div class="w-20 h-14 rounded-lg bg-gray-50 border border-gray-200 flex items-center justify-center">

                                            <span class="text-xs text-gray-400">
                                                No Image
                                            </span>

                                        </div>

                                    @endif

                                </td>


                                {{-- SERVICE --}}
                                <td class="px-6 py-4">

                                    <div class="font-semibold text-black">
                                        {{ $service->name }}
                                    </div>

                                    @if ($service->description)

                                        <div class="mt-1 text-sm text-gray-500">
                                            {{ Str::limit($service->description, 80) }}
                                        </div>

                                    @endif

                                </td>


                                {{-- CATEGORY --}}
                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center rounded-full bg-[#D90000]/10 px-3 py-1 text-xs font-semibold text-[#D90000]">

                                        {{ $service->serviceCategory->name ?? '-' }}

                                    </span>

                                </td>


                                {{-- SLUG --}}
                                <td class="px-6 py-4 text-sm text-gray-500">

                                    {{ $service->slug }}

                                </td>


                                {{-- ACTION --}}
                                <td class="px-6 py-4">

                                    <div class="flex justify-end gap-2">

                                        <a
                                            href="{{ route('admin.services.edit', $service) }}"
                                            class="px-4 py-2 rounded-lg border border-gray-200 bg-white text-[#252525] hover:border-[#E91E63] hover:text-[#D90000] transition"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            action="{{ route('admin.services.destroy', $service) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus service ini?');"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="px-4 py-2 rounded-lg bg-[#D90000] text-white hover:bg-[#b80000] transition"
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
                                    colspan="5"
                                    class="px-6 py-16 text-center"
                                >

                                    <div class="text-gray-400">

                                        <div class="text-4xl mb-3">
                                            +
                                        </div>

                                        <p class="text-sm">
                                            Belum ada service pada kategori ini.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if ($services->hasPages())

                <div class="px-6 py-4 border-t border-gray-200">

                    {{ $services->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection