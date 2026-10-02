
<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - BRAMAX</title>

    @vite(['resources/css/app.css'])

</head>

<body class="min-h-screen bg-[#0b0b0b] text-white">

    <div
        class="relative flex min-h-screen items-center justify-center overflow-hidden px-6 py-10"
    >

        {{-- Background Glow --}}
        <div
            class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-[#D90000]/15 blur-3xl"
        ></div>

        <div
            class="absolute -bottom-32 -right-32 h-96 w-96 rounded-full bg-[#e91e63]/10 blur-3xl"
        ></div>


        {{-- Login Card --}}
        <div
            class="relative w-full max-w-md rounded-3xl border border-white/10 bg-[#151515]/95 p-8 shadow-2xl backdrop-blur-xl sm:p-10"
        >

            {{-- Logo --}}
            <div class="mb-8 text-center">

                <div
                    class="mb-7 bg-gradient-to-r from-[#D90000] to-[#e91e63] bg-clip-text text-3xl font-extrabold tracking-tight text-transparent"
                >
                    BRAMAX
                </div>

                <p
                    class="mb-2 text-[11px] font-bold uppercase tracking-[0.25em] text-[#e91e63]"
                >
                    Admin Panel
                </p>

                <h1 class="text-3xl font-bold text-white">
                    Login Admin
                </h1>

                <p class="mt-2 text-sm text-white/40">
                    Masuk untuk mengelola website BRAMAX
                </p>

            </div>


            {{-- Error --}}
            @if ($errors->any())

                <div
                    class="mb-5 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-300"
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
                        class="mb-2 block text-sm font-semibold text-white"
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
                        class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-white/25 focus:border-[#e91e63] focus:ring-4 focus:ring-[#e91e63]/10"
                    >

                </div>


                {{-- Password --}}
                <div>

                    <label
                        for="password"
                        class="mb-2 block text-sm font-semibold text-white"
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
                        class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-white/25 focus:border-[#e91e63] focus:ring-4 focus:ring-[#e91e63]/10"
                    >

                </div>


                {{-- Button --}}
                <button
                    type="submit"
                    class="w-full rounded-xl bg-gradient-to-r from-[#D90000] to-[#e91e63] px-5 py-3.5 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:shadow-[0_10px_30px_rgba(217,0,0,0.25)]"
                >
                    Login
                </button>

            </form>


            {{-- Footer --}}
            <div class="mt-8 text-center">

                <p class="text-[11px] text-white/30">
                    BRAMAX Teknologi Indonesia
                </p>

            </div>

        </div>

    </div>

</body>

</html>

