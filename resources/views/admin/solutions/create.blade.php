@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white py-12">

    <div class="max-w-5xl mx-auto px-6">

        {{-- Header --}}
        <div class="mb-10">

            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-1 rounded-full bg-red-600"></div>
                <span class="text-sm font-semibold uppercase tracking-[0.2em] text-red-600">
                    Admin Panel
                </span>
            </div>

            <h1 class="text-4xl font-bold text-gray-900">
                Tambah Solution
            </h1>

            <p class="mt-3 text-gray-600">
                Tambahkan solution baru yang dapat dikelola melalui admin.
            </p>

        </div>


        {{-- Form Card --}}
        <div class="relative">

            {{-- Pink accent --}}
            <div class="absolute -top-1 left-8 right-8 h-1 rounded-full bg-gradient-to-r from-red-600 via-pink-500 to-red-400"></div>

            <form
                action="{{ route('admin.solutions.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="bg-white border border-gray-200 rounded-2xl shadow-lg p-8 md:p-10"
            >

                @csrf


                {{-- Basic Information --}}
                <div class="mb-10">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-9 h-9 rounded-lg bg-red-50 flex items-center justify-center">
                            <span class="text-red-600 font-bold">
                                01
                            </span>
                        </div>

                        <div>
                            <h2 class="text-xl font-bold text-gray-900">
                                Basic Information
                            </h2>

                            <p class="text-sm text-gray-500">
                                Informasi utama solution.
                            </p>
                        </div>

                    </div>


                    {{-- Title --}}
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Title
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            required
                            placeholder="Contoh: Digital Transformation"
                            class="w-full bg-white text-gray-900 placeholder-gray-400 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition"
                        >

                        @error('title')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Slug --}}
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Slug
                        </label>

                        <input
                            type="text"
                            name="slug"
                            value="{{ old('slug') }}"
                            placeholder="digital-transformation"
                            class="w-full bg-white text-gray-900 placeholder-gray-400 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition"
                        >

                        <p class="mt-2 text-xs text-gray-500">
                            Kosongkan jika ingin dibuat otomatis dari Title.
                        </p>

                        @error('slug')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Short Description --}}
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Short Description
                        </label>

                        <textarea
                            name="short_description"
                            rows="3"
                            placeholder="Tulis deskripsi singkat solution..."
                            class="w-full bg-white text-gray-900 placeholder-gray-400 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition resize-none"
                        >{{ old('short_description') }}</textarea>

                    </div>


                    {{-- Description --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            placeholder="Tulis deskripsi lengkap solution..."
                            class="w-full bg-white text-gray-900 placeholder-gray-400 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition resize-y"
                        >{{ old('description') }}</textarea>

                    </div>

                </div>


                {{-- Visual --}}
                <div class="mb-10 pt-8 border-t border-gray-100">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-9 h-9 rounded-lg bg-pink-50 flex items-center justify-center">
                            <span class="text-pink-600 font-bold">
                                02
                            </span>
                        </div>

                        <div>
                            <h2 class="text-xl font-bold text-gray-900">
                                Visual
                            </h2>

                            <p class="text-sm text-gray-500">
                                Icon dan gambar solution.
                            </p>
                        </div>

                    </div>


                   {{-- Icon --}}
<div class="mb-6">

    <label class="block mb-2 text-sm font-semibold text-gray-900">
        Icon
    </label>

    <select
        name="icon"
        class="w-full bg-white text-gray-900 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition"
    >

        <option value="">Pilih Icon</option>

        <option value="code" {{ old('icon') == 'code' ? 'selected' : '' }}>
            💻 Code / Digital
        </option>

        <option value="monitor" {{ old('icon') == 'monitor' ? 'selected' : '' }}>
            🖥️ Monitor
        </option>

        <option value="smartphone" {{ old('icon') == 'smartphone' ? 'selected' : '' }}>
            📱 Smartphone
        </option>

        <option value="globe" {{ old('icon') == 'globe' ? 'selected' : '' }}>
            🌐 Globe / Internet
        </option>

        <option value="shopping-cart" {{ old('icon') == 'shopping-cart' ? 'selected' : '' }}>
            🛒 Shopping
        </option>

        <option value="briefcase" {{ old('icon') == 'briefcase' ? 'selected' : '' }}>
            💼 Business
        </option>

        <option value="users" {{ old('icon') == 'users' ? 'selected' : '' }}>
            👥 Users
        </option>

        <option value="settings" {{ old('icon') == 'settings' ? 'selected' : '' }}>
            ⚙️ Settings
        </option>

        <option value="database" {{ old('icon') == 'database' ? 'selected' : '' }}>
            🗄️ Database
        </option>

        <option value="cloud" {{ old('icon') == 'cloud' ? 'selected' : '' }}>
            ☁️ Cloud
        </option>

        <option value="palette" {{ old('icon') == 'palette' ? 'selected' : '' }}>
            🎨 Creative
        </option>

        <option value="megaphone" {{ old('icon') == 'megaphone' ? 'selected' : '' }}>
            📢 Marketing
        </option>

        <option value="chart" {{ old('icon') == 'chart' ? 'selected' : '' }}>
            📊 Analytics
        </option>

        <option value="shield" {{ old('icon') == 'shield' ? 'selected' : '' }}>
            🛡️ Security
        </option>

        <option value="lightbulb" {{ old('icon') == 'lightbulb' ? 'selected' : '' }}>
            💡 Innovation
        </option>

        <option value="rocket" {{ old('icon') == 'rocket' ? 'selected' : '' }}>
            🚀 Growth
        </option>

    </select>

    <p class="mt-2 text-xs text-gray-500">
        Pilih icon yang sesuai dengan solution.
    </p>

    @error('icon')
        <p class="mt-2 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>

                    {{-- Image --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Image
                        </label>

                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 hover:border-red-400 transition">

                            <input
                                type="file"
                                name="image"
                                accept=".jpg,.jpeg,.png,.webp"
                                class="w-full text-gray-900 text-sm"
                            >

                            <p class="mt-3 text-xs text-gray-500">
                                JPG PNG atau WEBP maksimal 2 MB.
                            </p>

                        </div>

                        @error('image')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- Features --}}
                <div class="mb-10 pt-8 border-t border-gray-100">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-9 h-9 rounded-lg bg-red-50 flex items-center justify-center">
                            <span class="text-red-600 font-bold">
                                03
                            </span>
                        </div>

                        <div>
                            <h2 class="text-xl font-bold text-gray-900">
                                Features
                            </h2>

                            <p class="text-sm text-gray-500">
                                Fitur yang dimiliki solution.
                            </p>
                        </div>

                    </div>


                    <label class="block mb-2 text-sm font-semibold text-gray-900">
                        Solution Features
                    </label>

                    <textarea
                        name="features"
                        rows="6"
                        placeholder="Digital Strategy
Business Process Automation
System Integration
Cloud Integration"
                        class="w-full bg-white text-gray-900 placeholder-gray-400 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition resize-y"
                    >{{ old('features') }}</textarea>

                    <p class="mt-2 text-xs text-gray-500">
                        Satu feature per baris.
                    </p>

                </div>


                {{-- Settings --}}
                <div class="mb-10 pt-8 border-t border-gray-100">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-9 h-9 rounded-lg bg-pink-50 flex items-center justify-center">
                            <span class="text-pink-600 font-bold">
                                04
                            </span>
                        </div>

                        <div>
                            <h2 class="text-xl font-bold text-gray-900">
                                Settings
                            </h2>

                            <p class="text-sm text-gray-500">
                                Pengaturan tampilan solution.
                            </p>
                        </div>

                    </div>


                    {{-- Sort Order --}}
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-semibold text-gray-900">
                            Sort Order
                        </label>

                        <input
                            type="number"
                            name="sort_order"
                            value="{{ old('sort_order', 0) }}"
                            min="0"
                            class="w-full bg-white text-gray-900 border border-gray-300 rounded-xl px-4 py-3.5 focus:border-red-500 focus:ring-2 focus:ring-red-100 focus:outline-none transition"
                        >

                        <p class="mt-2 text-xs text-gray-500">
                            Angka lebih kecil akan ditampilkan lebih dahulu.
                        </p>

                    </div>


                    {{-- Active --}}
                    <div class="flex items-center justify-between p-4 bg-pink-50 border border-pink-100 rounded-xl">

                        <div>

                            <p class="font-semibold text-gray-900">
                                Active
                            </p>

                            <p class="text-sm text-gray-600">
                                Tampilkan solution pada website.
                            </p>

                        </div>

                        <label class="relative inline-flex items-center cursor-pointer">

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                {{ old('is_active', true) ? 'checked' : '' }}
                                class="sr-only peer"
                            >

                            <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-red-600 transition"></div>

                            <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition peer-checked:translate-x-5"></div>

                        </label>

                    </div>

                </div>


                {{-- Actions --}}
                <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row gap-3 sm:justify-end">

                    <a
                        href="{{ route('admin.solutions.index') }}"
                        class="px-6 py-3.5 border border-gray-300 text-gray-900 rounded-xl font-semibold text-center hover:border-red-400 hover:text-red-600 transition"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-7 py-3.5 bg-gradient-to-r from-red-600 to-pink-600 text-white rounded-xl font-semibold shadow-md hover:shadow-lg hover:from-red-700 hover:to-pink-700 transition"
                    >
                        Simpan Solution
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
```
