@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-white text-[#171717] py-10">

    <div class="max-w-3xl mx-auto px-6">

        <div class="mb-8">

            <p class="text-sm font-semibold text-[#D90000] uppercase tracking-widest">
                Admin / Services
            </p>

            <h1 class="mt-2 text-3xl font-bold text-[#171717]">
                Edit Service
            </h1>

        </div>


        <form action="{{ route('admin.services.update', $service) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')


            {{-- Business Category --}}
            <div>

                <label class="block mb-2 font-medium text-[#171717]">
                    Business Category
                </label>

                <select
                    name="service_category_id"
                    required
                    class="w-full px-4 py-3 rounded-xl
                           bg-white
                           border border-gray-200
                           text-[#171717]
                           focus:border-[#D90000]
                           focus:ring-2
                           focus:ring-[#D90000]/10
                           outline-none
                           transition">

                    @foreach ($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('service_category_id', $service->service_category_id) == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

                @error('service_category_id')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Solution --}}
            <div>

                <label class="block mb-2 font-medium text-[#171717]">
                    Solution
                </label>

                <select
                    name="solution_id"
                    class="w-full px-4 py-3 rounded-xl
                           bg-white
                           border border-gray-200
                           text-[#171717]
                           focus:border-[#D90000]
                           focus:ring-2
                           focus:ring-[#D90000]/10
                           outline-none
                           transition">

                    <option value="">
                        Pilih Solution
                    </option>

                    @foreach ($solutions as $solution)

                        <option
                            value="{{ $solution->id }}"
                            {{ old('solution_id', $service->solution_id) == $solution->id ? 'selected' : '' }}>

                            {{ $solution->title }}

                        </option>

                    @endforeach

                </select>

                @error('solution_id')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Nama Service --}}
            <div>

                <label class="block mb-2 font-medium text-[#171717]">
                    Nama Service
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $service->name) }}"
                    required
                    class="w-full px-4 py-3 rounded-xl
                           bg-white
                           border border-gray-200
                           text-[#171717]
                           placeholder-gray-400
                           focus:border-[#D90000]
                           focus:ring-2
                           focus:ring-[#D90000]/10
                           outline-none
                           transition">

                @error('name')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Slug --}}
            <div>

                <label class="block mb-2 font-medium text-[#171717]">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug', $service->slug) }}"
                    placeholder="Kosongkan untuk dibuat otomatis"
                    class="w-full px-4 py-3 rounded-xl
                           bg-white
                           border border-gray-200
                           text-[#171717]
                           placeholder-gray-400
                           focus:border-[#D90000]
                           focus:ring-2
                           focus:ring-[#D90000]/10
                           outline-none
                           transition">

                @error('slug')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Deskripsi --}}
            <div>

                <label class="block mb-2 font-medium text-[#171717]">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="6"
                    placeholder="Jelaskan service ini..."
                    class="w-full px-4 py-3 rounded-xl
                           bg-white
                           border border-gray-200
                           text-[#171717]
                           placeholder-gray-400
                           focus:border-[#D90000]
                           focus:ring-2
                           focus:ring-[#D90000]/10
                           outline-none
                           transition">{{ old('description', $service->description) }}</textarea>

                @error('description')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Icon --}}
            <div>

                <label class="block mb-2 font-medium text-[#171717]">
                    Icon
                </label>

                <input
                    type="text"
                    name="icon"
                    value="{{ old('icon', $service->icon) }}"
                    placeholder="Contoh: code"
                    class="w-full px-4 py-3 rounded-xl
                           bg-white
                           border border-gray-200
                           text-[#171717]
                           placeholder-gray-400
                           focus:border-[#D90000]
                           focus:ring-2
                           focus:ring-[#D90000]/10
                           outline-none
                           transition">

                @error('icon')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Current Image --}}
            @if ($service->image)

                <div>

                    <label class="block mb-2 font-medium text-[#171717]">
                        Gambar Saat Ini
                    </label>

                    <img
                        src="{{ asset('storage/' . $service->image) }}"
                        alt="{{ $service->name }}"
                        class="w-48 h-32 object-cover rounded-xl border border-gray-200">

                </div>

            @endif


            {{-- Image --}}
            <div>

                <label class="block mb-2 font-medium text-[#171717]">
                    Ganti Gambar
                </label>

                <input
                    type="file"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                    class="w-full px-4 py-3 rounded-xl
                           bg-white
                           border border-gray-200
                           text-[#171717]
                           file:mr-4
                           file:py-2
                           file:px-4
                           file:rounded-lg
                           file:border-0
                           file:bg-[#D90000]
                           file:text-white
                           file:font-semibold
                           hover:file:bg-[#b80000]
                           transition">

                <p class="mt-2 text-sm text-gray-400">
                    JPG PNG atau WEBP maksimal 2 MB
                </p>

                @error('image')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Button --}}
            <div class="flex gap-3 pt-4">

                <a
                    href="{{ route('admin.services.index') }}"
                    class="px-6 py-3 rounded-xl
                           bg-gray-100
                           text-[#171717]
                           hover:bg-gray-200
                           transition">

                    Batal

                </a>

                <button
                    type="submit"
                    class="px-6 py-3 rounded-xl
                           bg-[#D90000]
                           hover:bg-[#b80000]
                           text-white
                           transition
                           font-semibold">

                    Update Service

                </button>

            </div>

        </form>

    </div>
    

</div>

@endsection

