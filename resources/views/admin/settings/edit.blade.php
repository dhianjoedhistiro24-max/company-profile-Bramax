@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white text-gray-900 py-10">

<div class="max-w-5xl mx-auto px-6">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Settings
        </h1>

        <p class="text-gray-500 mt-2">
            Kelola pengaturan umum website BRAMAX.
        </p>
    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 rounded-xl bg-green-50 border border-green-200 px-5 py-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif


    {{-- Error Message --}}
    @if($errors->any())
        <div class="mb-6 rounded-xl bg-red-50 border border-red-200 px-5 py-4 text-red-600">

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
        <div class="bg-white border border-gray-200 text-gray-900 rounded-2xl shadow-sm p-8 mb-6">

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
                    class="block font-semibold mb-2 text-gray-800"
                >
                    Nama Website
                </label>

                <input
                    type="text"
                    id="site_name"
                    name="site_name"
                    value="{{ old('site_name', $setting->site_name) }}"
                    class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 outline-none transition focus:border-[#D90000] focus:ring-4 focus:ring-[#D90000]/10"
                    placeholder="PT BRAMAX Teknologi Indonesia"
                >

            </div>


            {{-- Email --}}
            <div class="mb-6">

                <label
                    for="email"
                    class="block font-semibold mb-2 text-gray-800"
                >
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $setting->email) }}"
                    class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 outline-none transition focus:border-[#D90000] focus:ring-4 focus:ring-[#D90000]/10"
                    placeholder="info@bramax.co.id"
                >

            </div>


            {{-- Phone --}}
            <div class="mb-6">

                <label
                    for="phone"
                    class="block font-semibold mb-2 text-gray-800"
                >
                    Nomor Telepon
                </label>

                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{ old('phone', $setting->phone) }}"
                    class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 outline-none transition focus:border-[#D90000] focus:ring-4 focus:ring-[#D90000]/10"
                    placeholder="+62..."
                >

            </div>


            {{-- WhatsApp --}}
            <div>

                <label
                    for="whatsapp"
                    class="block font-semibold mb-2 text-gray-800"
                >
                    WhatsApp
                </label>

                <input
                    type="text"
                    id="whatsapp"
                    name="whatsapp"
                    value="{{ old('whatsapp', $setting->whatsapp) }}"
                    class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 outline-none transition focus:border-[#D90000] focus:ring-4 focus:ring-[#D90000]/10"
                    placeholder="628xxxxxxxxxx"
                >

            </div>

        </div>


        {{-- Contact --}}
        <div class="bg-white border border-gray-200 text-gray-900 rounded-2xl shadow-sm p-8 mb-6">

            <h2 class="text-xl font-bold mb-1">
                Contact
            </h2>

            <p class="text-sm text-gray-500 mb-6">
                Informasi kontak yang digunakan pada website.
            </p>


            <div>

                <label
                    for="address"
                    class="block font-semibold mb-2 text-gray-800"
                >
                    Alamat
                </label>

                <textarea
                    id="address"
                    name="address"
                    rows="4"
                    class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 outline-none transition focus:border-[#D90000] focus:ring-4 focus:ring-[#D90000]/10"
                    placeholder="Alamat perusahaan"
                >{{ old('address', $setting->address) }}</textarea>

            </div>

        </div>


        {{-- Social Media --}}
        <div class="bg-white border border-gray-200 text-gray-900 rounded-2xl shadow-sm p-8 mb-6">

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
                    class="block font-semibold mb-2 text-gray-800"
                >
                    Facebook
                </label>

                <input
                    type="text"
                    id="facebook"
                    name="facebook"
                    value="{{ old('facebook', $setting->facebook) }}"
                    class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 outline-none transition focus:border-[#D90000] focus:ring-4 focus:ring-[#D90000]/10"
                    placeholder="https://facebook.com/..."
                >

            </div>


            {{-- Instagram --}}
            <div class="mb-6">

                <label
                    for="instagram"
                    class="block font-semibold mb-2 text-gray-800"
                >
                    Instagram
                </label>

                <input
                    type="text"
                    id="instagram"
                    name="instagram"
                    value="{{ old('instagram', $setting->instagram) }}"
                    class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 outline-none transition focus:border-[#D90000] focus:ring-4 focus:ring-[#D90000]/10"
                    placeholder="https://instagram.com/..."
                >

            </div>


            {{-- LinkedIn --}}
            <div class="mb-6">

                <label
                    for="linkedin"
                    class="block font-semibold mb-2 text-gray-800"
                >
                    LinkedIn
                </label>

                <input
                    type="text"
                    id="linkedin"
                    name="linkedin"
                    value="{{ old('linkedin', $setting->linkedin) }}"
                    class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 outline-none transition focus:border-[#D90000] focus:ring-4 focus:ring-[#D90000]/10"
                    placeholder="https://linkedin.com/company/..."
                >

            </div>


            {{-- YouTube --}}
            <div>

                <label
                    for="youtube"
                    class="block font-semibold mb-2 text-gray-800"
                >
                    YouTube
                </label>

                <input
                    type="text"
                    id="youtube"
                    name="youtube"
                    value="{{ old('youtube', $setting->youtube) }}"
                    class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 outline-none transition focus:border-[#D90000] focus:ring-4 focus:ring-[#D90000]/10"
                    placeholder="https://youtube.com/..."
                >

            </div>

        </div>


        {{-- Action --}}
        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.dashboard') }}"
                class="px-6 py-3 rounded-xl border border-gray-300 text-gray-600 hover:bg-gray-100 transition"
            >
                Batal
            </a>

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-[#D90000] text-white font-semibold hover:bg-[#b80000] transition"
            >
                Simpan Pengaturan
            </button>

        </div>

    </form>

</div>


</div>  

@endsection
