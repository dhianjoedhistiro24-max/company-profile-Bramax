@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white px-6 py-10 text-[#252525]">

    <div class="mx-auto max-w-7xl">

        {{-- Header --}}
        <div class="mb-8 flex items-center justify-between">

            <div>
                <h1 class="text-2xl font-bold text-[#252525]">
                    Download
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Kelola dokumen yang dapat diunduh oleh pengunjung
                </p>
            </div>

            <a
                href="{{ route('admin.downloads.create') }}"
                class="rounded-lg bg-[#D90000] px-5 py-3 text-sm font-semibold text-white transition hover:bg-red-700"
            >
                + Tambah Download
            </a>

        </div>


        {{-- Success --}}
        @if(session('success'))

            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                {{ session('success') }}
            </div>

        @endif


        {{-- Table --}}
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="border-b border-gray-200 bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-700">
                                Judul
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-700">
                                File
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-700">
                                Status
                            </th>

                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($downloads as $download)

                            <tr class="transition hover:bg-gray-50">

                                {{-- Title --}}
                                <td class="px-6 py-5">

                                    <div class="font-semibold text-[#252525]">
                                        {{ $download->title }}
                                    </div>

                                    @if($download->description)

                                        <div class="mt-1 max-w-xl truncate text-sm text-gray-500">
                                            {{ $download->description }}
                                        </div>

                                    @endif

                                </td>


                                {{-- File --}}
                                <td class="px-6 py-5">

                                    @if($download->file)

                                        <a
                                            href="{{ asset('storage/' . $download->file) }}"
                                            target="_blank"
                                            class="text-sm font-semibold text-[#D90000] hover:text-red-700"
                                        >
                                            Lihat PDF
                                        </a>

                                    @else

                                        <span class="text-sm text-gray-400">
                                            Belum ada file
                                        </span>

                                    @endif

                                </td>


                                {{-- Status --}}
                                <td class="px-6 py-5">

                                    @if($download->is_active)

                                        <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-600">
                                            Aktif
                                        </span>

                                    @else

                                        <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-500">
                                            Nonaktif
                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td class="px-6 py-5">

                                    <div class="flex justify-end gap-2">

                                        <a
                                            href="{{ route('admin.downloads.edit', $download) }}"
                                            class="rounded-lg border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:border-[#D90000] hover:text-[#D90000]"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            action="{{ route('admin.downloads.destroy', $download) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus download ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg border border-red-200 px-4 py-2 text-sm font-medium text-[#D90000] transition hover:bg-red-50"
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
                                    colspan="4"
                                    class="px-6 py-16 text-center"
                                >

                                    <div class="text-gray-400">
                                        Belum ada dokumen download.
                                    </div>

                                    <a
                                        href="{{ route('admin.downloads.create') }}"
                                        class="mt-3 inline-block text-sm font-semibold text-[#D90000] hover:text-red-700"
                                    >
                                        Tambahkan dokumen pertama
                                    </a>

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

