
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white text-[#252525]">

    {{-- =========================
         HEADER
    ========================== --}}
    <section class="border-b border-gray-100 bg-white">

        <div class="mx-auto max-w-6xl px-6 py-20 md:py-24">

            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#D90000]">
                Contact
            </p>

            <h1 class="mt-4 text-4xl font-medium tracking-[-0.03em] text-black md:text-6xl">
                Let's Work Together
            </h1>

            <p class="mt-6 max-w-2xl text-base leading-7 text-gray-500 md:text-lg">
                Punya kebutuhan bisnis, teknologi, atau proyek?
                Hubungi BRAMAX dan diskusikan kebutuhan Anda bersama tim kami.
            </p>

        </div>

    </section>


    {{-- =========================
         CONTACT CONTENT
    ========================== --}}
    <section class="bg-gray-50 py-16 md:py-20">

        <div class="mx-auto grid max-w-6xl gap-10 px-6 lg:grid-cols-5">


            {{-- =========================
                 CONTACT INFORMATION
            ========================== --}}
            <div class="lg:col-span-2">

                <div class="rounded-3xl border border-gray-200 bg-white p-7 md:p-8">

                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                        Get in Touch
                    </p>

                    <h2 class="mt-3 text-2xl font-medium tracking-tight text-black">
                        Contact Information
                    </h2>


                    <div class="mt-8 space-y-6">


                        {{-- EMAIL --}}
                        @if($setting?->email)

                            <div class="flex gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-50 text-[#D90000]">

                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M4 6h16v12H4V6zm0 1l8 6 8-6"
                                        />
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                        Email
                                    </p>

                                    <a
                                        href="mailto:{{ $setting->email }}"
                                        class="mt-1 block break-all text-sm font-medium text-gray-800 transition hover:text-[#D90000]"
                                    >
                                        {{ $setting->email }}
                                    </a>

                                </div>

                            </div>

                        @endif


                        {{-- PHONE --}}
                        @if($setting?->phone)

                            <div class="flex gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-50 text-[#D90000]">

                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M6.5 3.5l3 1.5-1.5 4-2 .5a12 12 0 005.5 5.5l.5-2 4-1.5 1.5 3c.3.7 0 1.5-.7 1.8A4 4 0 0115 15.5C10 13.5 7.5 11 5.5 6a4 4 0 01.7-3.2c.3-.3.8-.4 1.3-.3z"
                                        />
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                        Phone
                                    </p>

                                    <a
                                        href="tel:{{ $setting->phone }}"
                                        class="mt-1 block text-sm font-medium text-gray-800 transition hover:text-[#D90000]"
                                    >
                                        {{ $setting->phone }}
                                    </a>

                                </div>

                            </div>

                        @endif


                        {{-- WHATSAPP --}}
                        @if($setting?->whatsapp)

                            @php
                                $whatsapp = preg_replace('/[^0-9]/', '', $setting->whatsapp);

                                if (str_starts_with($whatsapp, '0')) {
                                    $whatsapp = '62' . substr($whatsapp, 1);
                                }
                            @endphp

                            <div class="flex gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-50 text-[#D90000]">

                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M20 11.5a8 8 0 01-11.8 7L4 20l1.5-4.1A8 8 0 1120 11.5z"
                                        />
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                        WhatsApp
                                    </p>

                                    <a
                                        href="https://wa.me/{{ $whatsapp }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="mt-1 block text-sm font-medium text-gray-800 transition hover:text-[#D90000]"
                                    >
                                        {{ $setting->whatsapp }}
                                    </a>

                                </div>

                            </div>

                        @endif


                        {{-- ADDRESS --}}
                        @if($setting?->address)

                            <div class="flex gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-50 text-[#D90000]">

                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M12 21s7-6.2 7-12a7 7 0 10-14 0c0 5.8 7 12 7 12z"
                                        />

                                        <circle
                                            cx="12"
                                            cy="9"
                                            r="2.2"
                                            stroke-width="1.8"
                                        />
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                        Address
                                    </p>

                                    <p class="mt-1 text-sm leading-6 text-gray-700">
                                        {{ $setting->address }}
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            </div>


            {{-- =========================
                 CONTACT FORM
            ========================== --}}
            <div class="lg:col-span-3">

                <div class="rounded-3xl border border-gray-200 bg-white p-7 md:p-8">

                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                        Send Message
                    </p>

                    <h2 class="mt-3 text-2xl font-medium tracking-tight text-black">
                        Tell Us About Your Needs
                    </h2>


                    {{-- SUCCESS MESSAGE --}}

                    @if(session('success'))

                        <div class="mt-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                            {{ session('success') }}
                        </div>

                    @endif


                    {{-- VALIDATION ERROR --}}

                    @if($errors->any())

                        <div class="mt-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3">

                            <ul class="space-y-1 text-sm text-red-600">

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form
                        action="{{ route('contact.message') }}"
                        method="POST"
                        class="mt-8 space-y-6"
                    >

                        @csrf


                        {{-- NAME --}}

                        <div>

                            <label
                                for="name"
                                class="mb-2 block text-sm font-medium text-gray-700"
                            >
                                Nama
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Nama Anda"
                                required
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#D90000] focus:ring-2 focus:ring-red-100"
                            >

                        </div>


                        {{-- EMAIL --}}

                        <div>

                            <label
                                for="email"
                                class="mb-2 block text-sm font-medium text-gray-700"
                            >
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                required
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#D90000] focus:ring-2 focus:ring-red-100"
                            >

                        </div>


                        {{-- PHONE --}}

                        <div>

                            <label
                                for="phone"
                                class="mb-2 block text-sm font-medium text-gray-700"
                            >
                                Nomor Telepon
                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="08xxxxxxxxxx"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#D90000] focus:ring-2 focus:ring-red-100"
                            >

                        </div>


                        {{-- SUBJECT --}}

                        <div>

                            <label
                                for="subject"
                                class="mb-2 block text-sm font-medium text-gray-700"
                            >
                                Subject
                            </label>

                            <input
                                type="text"
                                id="subject"
                                name="subject"
                                value="{{ old('subject') }}"
                                placeholder="Kebutuhan atau topik yang ingin dibahas"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#D90000] focus:ring-2 focus:ring-red-100"
                            >

                        </div>


                        {{-- MESSAGE --}}

                        <div>

                            <label
                                for="message"
                                class="mb-2 block text-sm font-medium text-gray-700"
                            >
                                Pesan
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                placeholder="Ceritakan kebutuhan atau proyek yang ingin Anda diskusikan..."
                                required
                                class="w-full resize-none rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm leading-6 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#D90000] focus:ring-2 focus:ring-red-100"
                            >{{ old('message') }}</textarea>

                        </div>


                        {{-- BUTTON --}}

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center rounded-full bg-[#D90000] px-7 py-3 text-sm font-semibold text-white transition hover:bg-[#b80000]"
                        >
                            Kirim Pesan

                            <svg
                                class="ml-2 h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M5 12h14M13 6l6 6-6 6"
                                />
                            </svg>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>


    {{-- CTA --}}

    <x-cta />

</div>

@endsection

