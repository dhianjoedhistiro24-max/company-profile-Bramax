@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-[#0b0b0b] text-white py-10">

    <div class="max-w-5xl mx-auto px-6">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold">
                Settings
            </h1>

            <p class="text-gray-400 mt-2">
                Kelola pengaturan umum website BRAMAX.
            </p>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-green-500/10 border border-green-500/30 px-5 py-4 text-green-400">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if($errors->any())
            <div class="mb-6 rounded-xl bg-red-500/10 border border-red-500/30 px-5 py-4 text-red-400">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('admin.settings.update') }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            {{-- General --}}
            <div class="bg-white text-[#252525] rounded-2xl shadow-xl p-8 mb-6">

                <h2 class="text-xl font-bold mb-1">
                    General
                </h2>

                <p class="text-sm text-gray-500 mb-6">
                    Informasi umum website.
                </p>

                {{-- Site Name --}}
                <div class="mb-6">

                    <label
                        for="site_name"
                        class="block font-semibold mb-2"
                    >
                        Nama Website
                    </label>

                    <input
                        type="text"
                        id="site_name"
                        name="site_name"
                        value="{{ old('site_name', $setting->site_name) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-red-500 focus:ring-red-500"
                        placeholder="PT BRAMAX Teknologi Indonesia"
                    >

                </div>

                {{-- Email --}}
                <div class="mb-6">

                    <label
                        for="email"
                        class="block font-semibold mb-2"
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $setting->email) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-red-500 focus:ring-red-500"
                        placeholder="info@bramax.co.id"
                    >

                </div>

                {{-- Phone --}}
                <div class="mb-6">

                    <label
                        for="phone"
                        class="block font-semibold mb-2"
                    >
                        Nomor Telepon
                    </label>

                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ old('phone', $setting->phone) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-red-500 focus:ring-red-500"
                        placeholder="+62..."
                    >

                </div>

                {{-- WhatsApp --}}
                <div>

                    <label
                        for="whatsapp"
                        class="block font-semibold mb-2"
                    >
                        WhatsApp
                    </label>

                    <input
                        type="text"
                        id="whatsapp"
                        name="whatsapp"
                        value="{{ old('whatsapp', $setting->whatsapp) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-red-500 focus:ring-red-500"
                        placeholder="628xxxxxxxxxx"
                    >

                </div>

            </div>

            {{-- Address --}}
            <div class="bg-white text-[#252525] rounded-2xl shadow-xl p-8 mb-6">

                <h2 class="text-xl font-bold mb-1">
                    Contact
                </h2>

                <p class="text-sm text-gray-500 mb-6">
                    Informasi kontak yang digunakan pada website.
                </p>

                <div>

                    <label
                        for="address"
                        class="block font-semibold mb-2"
                    >
                        Alamat
                    </label>

                    <textarea
                        id="address"
                        name="address"
                        rows="4"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-red-500 focus:ring-red-500"
                        placeholder="Alamat perusahaan"
                    >{{ old('address', $setting->address) }}</textarea>

                </div>

            </div>

            {{-- Social Media --}}
            <div class="bg-white text-[#252525] rounded-2xl shadow-xl p-8 mb-6">

                <h2 class="text-xl font-bold mb-1">
                    Social Media
                </h2>

                <p class="text-sm text-gray-500 mb-6">
                    Masukkan link media sosial resmi BRAMAX.
                </p>

                {{-- Facebook --}}
                <div class="mb-6">

                    <label
                        for="facebook"
                        class="block font-semibold mb-2"
                    >
                        Facebook
                    </label>

                    <input
                        type="text"
                        id="facebook"
                        name="facebook"
                        value="{{ old('facebook', $setting->facebook) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-red-500 focus:ring-red-500"
                        placeholder="https://facebook.com/..."
                    >

                </div>

                {{-- Instagram --}}
                <div class="mb-6">

                    <label
                        for="instagram"
                        class="block font-semibold mb-2"
                    >
                        Instagram
                    </label>

                    <input
                        type="text"
                        id="instagram"
                        name="instagram"
                        value="{{ old('instagram', $setting->instagram) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-red-500 focus:ring-red-500"
                        placeholder="https://instagram.com/..."
                    >

                </div>

                {{-- LinkedIn --}}
                <div class="mb-6">

                    <label
                        for="linkedin"
                        class="block font-semibold mb-2"
                    >
                        LinkedIn
                    </label>

                    <input
                        type="text"
                        id="linkedin"
                        name="linkedin"
                        value="{{ old('linkedin', $setting->linkedin) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-red-500 focus:ring-red-500"
                        placeholder="https://linkedin.com/company/..."
                    >

                </div>

                {{-- YouTube --}}
                <div>

                    <label
                        for="youtube"
                        class="block font-semibold mb-2"
                    >
                        YouTube
                    </label>

                    <input
                        type="text"
                        id="youtube"
                        name="youtube"
                        value="{{ old('youtube', $setting->youtube) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-red-500 focus:ring-red-500"
                        placeholder="https://youtube.com/..."
                    >

                </div>

            </div>

            {{-- Action --}}
            <div class="flex justify-end gap-3">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="px-6 py-3 rounded-lg border border-gray-600 text-gray-300 hover:bg-white/10 transition"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="px-6 py-3 rounded-lg bg-[#e40046] text-white font-semibold hover:bg-[#c9003e] transition"
                >
                    Simpan Pengaturan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection