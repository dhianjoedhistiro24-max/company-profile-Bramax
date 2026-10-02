@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')

<div class="min-h-screen bg-white text-black">

    {{-- Header --}}
    <section class="border-b border-gray-200 bg-white">
        <div class="max-w-7xl mx-auto px-6 py-10">

            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                Admin
            </p>

            <div class="mt-3 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-black">
                        Contact Messages
                    </h1>

                    <p class="mt-2 text-gray-500">
                        Pesan yang dikirim pengunjung melalui Live Chat.
                    </p>
                </div>

                <div class="rounded-xl bg-[#FCE7F3] px-5 py-3">
                    <span class="text-sm text-gray-600">
                        Total Pesan
                    </span>

                    <span class="ml-2 text-xl font-bold text-[#D90000]">
                        {{ $messages->count() }}
                    </span>
                </div>

            </div>

        </div>
    </section>


    {{-- Success Message --}}
    @if (session('success'))
        <div class="max-w-7xl mx-auto px-6 pt-6">

            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                {{ session('success') }}
            </div>

        </div>
    @endif


    {{-- Messages --}}
    <section class="py-10">
        <div class="max-w-7xl mx-auto px-6">

            @if ($messages->count())

                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[800px]">

                            <thead class="border-b border-gray-200 bg-gray-50">

                                <tr>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Pengunjung
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Pesan
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Status
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Tanggal
                                    </th>

                                    <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-gray-100">

                                @foreach ($messages as $message)

                                    <tr class="hover:bg-gray-50 transition">

                                        {{-- Visitor --}}
                                        <td class="px-6 py-5">

                                            <div>
                                                <p class="font-semibold text-black">
                                                    {{ $message->name }}
                                                </p>

                                                <p class="mt-1 text-sm text-gray-500">
                                                    {{ $message->email }}
                                                </p>
                                            </div>

                                        </td>


                                        {{-- Message --}}
                                        <td class="px-6 py-5">

                                            <p class="max-w-md truncate text-sm text-gray-600">
                                                {{ $message->message }}
                                            </p>

                                        </td>


                                        {{-- Status --}}
                                        <td class="px-6 py-5">

                                            @if ($message->status === 'new')

                                                <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-[#D90000]">
                                                    New
                                                </span>

                                            @elseif ($message->status === 'read')

                                                <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                                    Read
                                                </span>

                                            @elseif ($message->status === 'replied')

                                                <span class="inline-flex rounded-full bg-pink-100 px-3 py-1 text-xs font-semibold text-pink-700">
                                                    Replied
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Date --}}
                                        <td class="px-6 py-5">

                                            <p class="text-sm text-gray-500">
                                                {{ $message->created_at->format('d M Y') }}
                                            </p>

                                            <p class="mt-1 text-xs text-gray-400">
                                                {{ $message->created_at->format('H:i') }}
                                            </p>

                                        </td>


                                        {{-- Action --}}
                                        <td class="px-6 py-5 text-right">

                                            <div class="flex items-center justify-end gap-2">

                                                <a
                                                    href="{{ route('admin.contact-messages.show', $message) }}"
                                                    class="rounded-lg border border-gray-200 px-4 py-2 text-sm font-semibold text-black hover:border-[#D90000] hover:text-[#D90000] transition"
                                                >
                                                    Lihat
                                                </a>

                                                <form
                                                    action="{{ route('admin.contact-messages.destroy', $message) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Hapus pesan ini?')"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="rounded-lg border border-red-200 px-4 py-2 text-sm font-semibold text-[#D90000] hover:bg-red-50 transition"
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

                {{-- Empty State --}}
                <div class="rounded-2xl border border-gray-200 bg-white px-6 py-16 text-center shadow-sm">

                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#FCE7F3]">
                        <span class="text-2xl">
                            💬
                        </span>
                    </div>

                    <h2 class="mt-6 text-2xl font-bold text-black">
                        Belum ada pesan
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Pesan dari pengunjung akan muncul di halaman ini.
                    </p>

                </div>

            @endif

        </div>
    </section>

</div>

@endsection