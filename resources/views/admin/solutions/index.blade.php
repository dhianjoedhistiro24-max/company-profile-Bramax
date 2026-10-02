@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white py-12">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10">

            <div>

                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-1 rounded-full bg-gradient-to-r from-red-600 to-pink-500"></div>

                    <span class="text-sm font-semibold uppercase tracking-[0.2em] text-red-600">
                        Admin Panel
                    </span>
                </div>

                <h1 class="text-4xl font-bold text-gray-900">
                    Solutions
                </h1>

                <p class="mt-3 text-gray-600">
                    Kelola solution yang ditampilkan pada website.
                </p>

            </div>


            {{-- Add Button --}}
            <a
                href="{{ route('admin.solutions.create') }}"
                class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-gradient-to-r from-red-600 to-pink-600 text-white rounded-xl font-semibold shadow-md hover:shadow-lg hover:from-red-700 hover:to-pink-700 transition"
            >

                <span class="text-xl leading-none">
                    +
                </span>

                Tambah Solution

            </a>

        </div>


        {{-- Success Message --}}
        @if(session('success'))

            <div class="mb-6 flex items-center gap-3 p-4 bg-pink-50 border border-pink-100 rounded-xl">

                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                    <span class="text-red-600 font-bold">
                        ✓
                    </span>
                </div>

                <p class="text-sm font-medium text-gray-900">
                    {{ session('success') }}
                </p>

            </div>

        @endif


        {{-- Table Card --}}
        <div class="relative">

            {{-- Gradient Accent --}}
            <div class="absolute top-0 left-8 right-8 h-1 bg-gradient-to-r from-red-600 via-pink-500 to-red-400 rounded-full"></div>


            <div class="bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden">

                {{-- Table Header --}}
                <div class="px-6 md:px-8 py-5 border-b border-gray-100">

                    <div class="flex items-center justify-between">

                        <div>

                            <h2 class="text-lg font-bold text-gray-900">
                                Solution List
                            </h2>

                            <p class="mt-1 text-sm text-gray-500">
                                Daftar solution yang tersedia.
                            </p>

                        </div>

                        <div class="px-4 py-2 bg-red-50 rounded-lg">
                            <span class="text-sm font-semibold text-red-600">
                                {{ $solutions->count() }} Solution
                            </span>
                        </div>

                    </div>

                </div>


                {{-- Responsive Table --}}
                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="bg-pink-50/60">

                                <th class="px-6 md:px-8 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-700">
                                    Image
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-700">
                                    Solution
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-700">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-700">
                                    Order
                                </th>

                                <th class="px-6 md:px-8 py-4 text-right text-xs font-bold uppercase tracking-wider text-gray-700">
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            @forelse($solutions as $solution)

                                <tr class="group hover:bg-pink-50/30 transition">


                                    {{-- Image --}}
                                    <td class="px-6 md:px-8 py-5">

                                        @if($solution->image)

                                            <img
                                                src="{{ asset('storage/' . $solution->image) }}"
                                                alt="{{ $solution->title }}"
                                                class="w-20 h-14 object-cover rounded-xl border border-gray-200 group-hover:border-pink-300 transition"
                                            >

                                        @else

                                            <div class="w-20 h-14 rounded-xl bg-pink-50 border border-pink-100 flex items-center justify-center">

                                                <span class="text-xs font-medium text-pink-500">
                                                    No Image
                                                </span>

                                            </div>

                                        @endif

                                    </td>


                                    {{-- Solution --}}
                                    <td class="px-6 py-5">

                                        <div class="max-w-md">

                                            <p class="font-bold text-gray-900">
                                                {{ $solution->title }}
                                            </p>

                                            @if($solution->short_description)

                                                <p class="mt-1 text-sm text-gray-500 line-clamp-2">
                                                    {{ $solution->short_description }}
                                                </p>

                                            @endif

                                            <p class="mt-2 text-xs text-pink-600">
                                                /{{ $solution->slug }}
                                            </p>

                                        </div>

                                    </td>


                                    {{-- Status --}}
                                    <td class="px-6 py-5">

                                        @if($solution->is_active)

                                            <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-pink-50 border border-pink-100 rounded-full">

                                                <span class="w-2 h-2 rounded-full bg-red-500"></span>

                                                <span class="text-xs font-semibold text-red-600">
                                                    Active
                                                </span>

                                            </span>

                                        @else

                                            <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-gray-50 border border-gray-200 rounded-full">

                                                <span class="w-2 h-2 rounded-full bg-gray-400"></span>

                                                <span class="text-xs font-semibold text-gray-600">
                                                    Inactive
                                                </span>

                                            </span>

                                        @endif

                                    </td>


                                    {{-- Order --}}
                                    <td class="px-6 py-5">

                                        <span class="inline-flex items-center justify-center min-w-9 h-9 px-3 bg-red-50 text-red-600 rounded-lg font-bold text-sm">
                                            {{ $solution->sort_order }}
                                        </span>

                                    </td>


                                    {{-- Actions --}}
                                    <td class="px-6 md:px-8 py-5">

                                        <div class="flex items-center justify-end gap-2">


                                            {{-- Edit --}}
                                            <a
                                                href="{{ route('admin.solutions.edit', $solution) }}"
                                                class="px-4 py-2.5 bg-white border border-gray-200 text-gray-900 rounded-lg text-sm font-semibold hover:border-red-400 hover:text-red-600 transition"
                                            >
                                                Edit
                                            </a>


                                            {{-- Delete --}}
                                            <form
                                                action="{{ route('admin.solutions.destroy', $solution) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah kamu yakin ingin menghapus solution ini?')"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="px-4 py-2.5 bg-red-600 text-white rounded-lg text-sm font-semibold hover:bg-red-700 transition"
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

                                        <div class="flex flex-col items-center">

                                            <div class="w-16 h-16 rounded-2xl bg-pink-50 flex items-center justify-center mb-4">

                                                <span class="text-2xl font-bold text-pink-500">
                                                    +
                                                </span>

                                            </div>

                                            <h3 class="text-lg font-bold text-gray-900">
                                                Belum ada Solution
                                            </h3>

                                            <p class="mt-2 text-sm text-gray-500">
                                                Tambahkan solution pertama untuk website.
                                            </p>

                                            <a
                                                href="{{ route('admin.solutions.create') }}"
                                                class="mt-5 px-5 py-3 bg-gradient-to-r from-red-600 to-pink-600 text-white rounded-xl font-semibold hover:from-red-700 hover:to-pink-700 transition"
                                            >
                                                Tambah Solution
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

</div>

@endsection

