@extends('layouts.admin')

@section('title', 'Detail Contact Message')

@section('content')

<div class="min-h-screen bg-white text-black">

    {{-- Header --}}
    <section class="border-b border-gray-200 bg-white">

        <div class="max-w-5xl mx-auto px-6 py-10">

            <a
                href="{{ route('admin.contact-messages.index') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-[#D90000] transition"
            >
                <span>←</span>
                <span>Kembali ke Messages</span>
            </a>

            <div class="mt-8">

                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                    Contact Message
                </p>

                <h1 class="mt-3 text-3xl md:text-4xl font-bold text-black">
                    {{ $contactMessage->name }}
                </h1>

                <p class="mt-2 text-gray-500">
                    {{ $contactMessage->email }}
                </p>

            </div>

        </div>

    </section>


    {{-- Content --}}
    <section class="py-12">

        <div class="max-w-5xl mx-auto px-6">

            @if (session('success'))

                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
                    {{ session('success') }}
                </div>

            @endif


            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">

                {{-- Message --}}
                <div class="lg:col-span-2">

                    <div class="rounded-2xl border border-gray-200 bg-white p-7 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">
                                    Pesan
                                </p>

                                <h2 class="mt-2 text-2xl font-bold text-black">
                                    Pesan dari Pengunjung
                                </h2>
                            </div>

                            @if ($contactMessage->status === 'new')

                                <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-[#D90000]">
                                    New
                                </span>

                            @elseif ($contactMessage->status === 'read')

                                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                    Read
                                </span>

                            @else

                                <span class="rounded-full bg-pink-100 px-3 py-1 text-xs font-semibold text-pink-700">
                                    Replied
                                </span>

                            @endif

                        </div>


                        <div class="mt-8 rounded-xl bg-gray-50 p-6">

                            <p class="whitespace-pre-line leading-relaxed text-gray-700">
                                {{ $contactMessage->message }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Information --}}
                <div>

                    <div class="rounded-2xl border border-gray-200 bg-white p-7 shadow-sm">

                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">
                            Informasi
                        </p>


                        <div class="mt-6 space-y-5">

                            <div>

                                <p class="text-xs font-semibold uppercase text-gray-400">
                                    Nama
                                </p>

                                <p class="mt-1 font-semibold text-black">
                                    {{ $contactMessage->name }}
                                </p>

                            </div>


                            <div>

                                <p class="text-xs font-semibold uppercase text-gray-400">
                                    Email
                                </p>

                                <a
                                    href="mailto:{{ $contactMessage->email }}"
                                    class="mt-1 block break-all font-semibold text-[#D90000] hover:underline"
                                >
                                    {{ $contactMessage->email }}
                                </a>

                            </div>


                            <div>

                                <p class="text-xs font-semibold uppercase text-gray-400">
                                    Dikirim
                                </p>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ $contactMessage->created_at->format('d M Y H:i') }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Status --}}
                    <div class="mt-6 rounded-2xl border border-gray-200 bg-white p-7 shadow-sm">

                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">
                            Status Pesan
                        </p>

                        <form
                            action="{{ route('admin.contact-messages.update-status', $contactMessage) }}"
                            method="POST"
                            class="mt-5"
                        >

                            @csrf
                            @method('PATCH')

                            <select
                                name="status"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-black outline-none focus:border-[#D90000] focus:ring-1 focus:ring-[#D90000]"
                            >

                                <option
                                    value="new"
                                    {{ $contactMessage->status === 'new' ? 'selected' : '' }}
                                >
                                    New
                                </option>

                                <option
                                    value="read"
                                    {{ $contactMessage->status === 'read' ? 'selected' : '' }}
                                >
                                    Read
                                </option>

                                <option
                                    value="replied"
                                    {{ $contactMessage->status === 'replied' ? 'selected' : '' }}
                                >
                                    Replied
                                </option>

                            </select>


                            <button
                                type="submit"
                                class="mt-4 w-full rounded-xl bg-[#D90000] px-5 py-3 font-semibold text-white hover:bg-[#B00000] transition"
                            >
                                Update Status
                            </button>

                        </form>

                    </div>


                    {{-- Delete --}}
                    <form
                        action="{{ route('admin.contact-messages.destroy', $contactMessage) }}"
                        method="POST"
                        class="mt-6"
                        onsubmit="return confirm('Hapus pesan ini?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="w-full rounded-xl border border-red-200 px-5 py-3 font-semibold text-[#D90000] hover:bg-red-50 transition"
                        >
                            Hapus Pesan
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection