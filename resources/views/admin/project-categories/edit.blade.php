@extends('layouts.admin')

@section('title', 'Edit Kategori Portfolio')

@section('content')

<div class="min-h-screen bg-white text-black">

    <div class="max-w-3xl mx-auto px-6 py-10">

        <a
            href="{{ route('admin.project-categories.index') }}"
            class="text-sm font-semibold text-gray-500 hover:text-[#D90000]"
        >
            ← Kembali ke Kategori
        </a>


        <div class="mt-8 mb-8">

            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
                Portfolio
            </p>

            <h1 class="mt-3 text-3xl font-bold">
                Edit Kategori
            </h1>

        </div>


        @if ($errors->any())

            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5">

                <ul class="list-disc pl-5 text-sm text-gray-600">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('admin.project-categories.update', $projectCategory) }}"
            method="POST"
            class="space-y-6"
        >

            @csrf
            @method('PUT')


            <div class="rounded-2xl border border-gray-200 p-6 shadow-sm">

                <div>

                    <label
                        for="name"
                        class="block text-sm font-semibold"
                    >
                        Nama Kategori
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $projectCategory->name) }}"
                        required
                        class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-3 outline-none focus:border-[#D90000]"
                    >

                </div>


                <div class="mt-5">

                    <label
                        for="description"
                        class="block text-sm font-semibold"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-3 outline-none focus:border-[#D90000]"
                    >{{ old('description', $projectCategory->description) }}</textarea>

                </div>

            </div>


            <div class="flex justify-end gap-3">

                <a
                    href="{{ route('admin.project-categories.index') }}"
                    class="rounded-xl border border-gray-200 px-5 py-3 font-semibold hover:bg-gray-50"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-[#D90000] px-6 py-3 font-semibold text-white hover:bg-[#B00000]"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection     