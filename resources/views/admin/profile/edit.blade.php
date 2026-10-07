@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gray-50">

    {{-- Header --}}
    <div class="border-b border-gray-200 bg-white">
        <div class="mx-auto max-w-6xl px-6 py-8">

            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#e40046]">
                    Account Settings
                </p>

                <h1 class="mt-2 text-3xl font-bold text-black">
                    Edit Profile
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Kelola informasi akun dan password administrator.
                </p>
            </div>

        </div>
    </div>


    {{-- Content --}}
    <div class="mx-auto max-w-4xl px-6 py-10">

        {{-- Success --}}
        @if(session('status'))

            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4">

                <p class="text-sm font-medium text-green-700">
                    {{ session('status') }}
                </p>

            </div>

        @endif


        {{-- Validation Error --}}
        @if($errors->any())

            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4">

                <p class="font-semibold text-red-700">
                    Terdapat kesalahan:
                </p>

                <ul class="mt-2 list-disc pl-5 text-sm text-red-600">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Profile Form --}}
        <form
            action="{{ route('admin.profile.update') }}"
            method="POST"
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm"
        >

            @csrf
            @method('PATCH')


            {{-- Profile Information --}}
            <div class="border-b border-gray-100 px-6 py-6 md:px-8">

                <h2 class="text-xl font-bold text-black">
                    Profile Information
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Perbarui nama dan email akun administrator.
                </p>

            </div>


            <div class="space-y-6 px-6 py-8 md:px-8">

                {{-- Name --}}
                <div>

                    <label
                        for="name"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Nama
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        required
                        autocomplete="name"
                        class="w-full rounded-xl border border-gray-200
                               bg-white px-4 py-3
                               text-sm text-black
                               outline-none transition
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                    >

                </div>


                {{-- Email --}}
                <div>

                    <label
                        for="email"
                        class="mb-2 block text-sm font-semibold text-gray-800"
                    >
                        Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        required
                        autocomplete="email"
                        class="w-full rounded-xl border border-gray-200
                               bg-white px-4 py-3
                               text-sm text-black
                               outline-none transition
                               focus:border-[#e40046]
                               focus:ring-2 focus:ring-[#e40046]/10"
                    >

                </div>

            </div>


            {{-- Password --}}
            <div class="border-t border-gray-100">

                <div class="px-6 py-6 md:px-8">

                    <h2 class="text-xl font-bold text-black">
                        Update Password
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Kosongkan password baru jika tidak ingin mengubahnya.
                    </p>

                </div>


                <div class="space-y-6 px-6 pb-8 md:px-8">

                    {{-- Current Password --}}
                    <div>

                        <label
                            for="current_password"
                            class="mb-2 block text-sm font-semibold text-gray-800"
                        >
                            Password Saat Ini
                        </label>

                        <input
                            id="current_password"
                            type="password"
                            name="current_password"
                            autocomplete="current-password"
                            class="w-full rounded-xl border border-gray-200
                                   bg-white px-4 py-3
                                   text-sm text-black
                                   outline-none transition
                                   focus:border-[#e40046]
                                   focus:ring-2 focus:ring-[#e40046]/10"
                            placeholder="Masukkan password saat ini"
                        >

                        <p class="mt-2 text-xs text-gray-400">
                            Wajib diisi jika ingin mengganti password.
                        </p>

                    </div>


                    {{-- New Password --}}
                    <div>

                        <label
                            for="password"
                            class="mb-2 block text-sm font-semibold text-gray-800"
                        >
                            Password Baru
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            autocomplete="new-password"
                            class="w-full rounded-xl border border-gray-200
                                   bg-white px-4 py-3
                                   text-sm text-black
                                   outline-none transition
                                   focus:border-[#e40046]
                                   focus:ring-2 focus:ring-[#e40046]/10"
                            placeholder="Masukkan password baru"
                        >

                        <p class="mt-2 text-xs text-gray-400">
                            Minimal 8 karakter.
                        </p>

                    </div>


                    {{-- Confirm Password --}}
                    <div>

                        <label
                            for="password_confirmation"
                            class="mb-2 block text-sm font-semibold text-gray-800"
                        >
                            Konfirmasi Password Baru
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            autocomplete="new-password"
                            class="w-full rounded-xl border border-gray-200
                                   bg-white px-4 py-3
                                   text-sm text-black
                                   outline-none transition
                                   focus:border-[#e40046]
                                   focus:ring-2 focus:ring-[#e40046]/10"
                            placeholder="Ulangi password baru"
                        >

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div class="flex flex-col-reverse gap-3 border-t border-gray-100
                        px-6 py-5 sm:flex-row sm:justify-end md:px-8">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center justify-center rounded-lg
                           border border-gray-200 bg-white px-6 py-3
                           text-sm font-semibold text-gray-600
                           transition hover:bg-gray-50"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg
                           bg-[#e40046] px-6 py-3
                           text-sm font-semibold text-white
                           transition hover:bg-[#c9003d]
                           hover:shadow-lg"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection