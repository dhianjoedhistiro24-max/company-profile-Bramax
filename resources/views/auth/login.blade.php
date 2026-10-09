<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Login Admin - BRAMAX</title>

@vite(['resources/css/app.css'])
```

</head>

<body class="min-h-screen bg-white text-gray-900">

```
<div
    class="relative flex min-h-screen items-center justify-center overflow-hidden px-6 py-10"
>

    {{-- Background Accent --}}
    <div
        class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-[#D90000]/5 blur-3xl"
    ></div>

    <div
        class="absolute -bottom-32 -right-32 h-96 w-96 rounded-full bg-[#D90000]/5 blur-3xl"
    ></div>


    {{-- Login Card --}}
    <div
        class="relative w-full max-w-md rounded-3xl border border-gray-200 bg-white p-8 shadow-xl sm:p-10"
    >

        {{-- Logo --}}
        <div class="mb-8 text-center">

            <div
                class="mb-7 text-3xl font-extrabold tracking-tight text-[#D90000]"
            >
                BRAMAX
            </div>

            <p
                class="mb-2 text-[11px] font-bold uppercase tracking-[0.25em] text-[#D90000]"
            >
                Admin Panel
            </p>

            <h1 class="text-3xl font-bold text-gray-900">
                Login Admin
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Masuk untuk mengelola website BRAMAX
            </p>

        </div>


        {{-- Error --}}
        @if ($errors->any())

            <div
                class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600"
            >
                {{ $errors->first() }}
            </div>

        @endif


        {{-- Form --}}
        <form
            action="{{ route('login') }}"
            method="POST"
            class="space-y-5"
        >

            @csrf


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
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                    autocomplete="email"
                    class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#D90000] focus:bg-white focus:ring-4 focus:ring-[#D90000]/10"
                >

            </div>


            {{-- Password --}}
            <div>

                <label
                    for="password"
                    class="mb-2 block text-sm font-semibold text-gray-800"
                >
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                    autocomplete="current-password"
                    class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-[#D90000] focus:bg-white focus:ring-4 focus:ring-[#D90000]/10"
                >

            </div>


            {{-- Button --}}
            <button
                type="submit"
                class="w-full rounded-xl bg-[#D90000] px-5 py-3.5 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-[#b80000] hover:shadow-[0_10px_30px_rgba(217,0,0,0.20)]"
            >
                Login
            </button>

        </form>


        {{-- Footer --}}
        <div class="mt-8 text-center">

            <p class="text-[11px] text-gray-400">
                BRAMAX Teknologi Indonesia
            </p>

        </div>

    </div>

</div>
     

</body>

</html>
