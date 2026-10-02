<div
    x-data="{ open: false }"
    x-init="
        window.addEventListener('open-live-chat', () => {
            open = true
        })
    "
    class="fixed bottom-6 right-6 z-50"
>

    {{-- Chat Button --}}
    <button
        type="button"
        @click="open = !open"
        class="flex items-center gap-3 rounded-full bg-[#D90000] px-6 py-4 text-white font-semibold shadow-lg hover:bg-[#B00000] transition"
    >
        <span class="text-xl">💬</span>

        <span>
            Chat with BRAMAX
        </span>
    </button>


    {{-- Chat Box --}}
    <div
        x-show="open"
        x-transition
        class="absolute bottom-20 right-0 w-[350px] max-w-[calc(100vw-32px)] overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-2xl"
    >

        {{-- Header --}}
        <div class="bg-[#D90000] px-6 py-5 text-white">

            <p class="text-sm font-medium text-white/80">
                BRAMAX
            </p>

            <h3 class="mt-1 text-xl font-bold">
                How can we help?
            </h3>

        </div>


        {{-- Content --}}
        <div class="p-6">

            @if (session('chat_success'))

                <div class="mb-5 rounded-xl border border-pink-200 bg-pink-50 p-4 text-sm text-black">
                    {{ session('chat_success') }}
                </div>

            @endif


            @if ($errors->any())

                <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-black">

                    <p class="font-semibold text-[#D90000]">
                        Periksa kembali data Anda.
                    </p>

                    <ul class="mt-2 list-disc pl-5 text-gray-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif


            <form
                action="{{ route('contact.message') }}"
                method="POST"
                class="space-y-4"
            >

                @csrf


                {{-- Name --}}
                <div>

                    <label
                        for="chat-name"
                        class="block text-sm font-semibold text-black"
                    >
                        Nama
                    </label>

                    <input
                        id="chat-name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        placeholder="Nama Anda"
                        class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-3 text-sm text-black outline-none focus:border-[#D90000] focus:ring-1 focus:ring-[#D90000]"
                    >

                </div>


                {{-- Email --}}
                <div>

                    <label
                        for="chat-email"
                        class="block text-sm font-semibold text-black"
                    >
                        Email
                    </label>

                    <input
                        id="chat-email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        placeholder="email@example.com"
                        class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-3 text-sm text-black outline-none focus:border-[#D90000] focus:ring-1 focus:ring-[#D90000]"
                    >

                </div>


                {{-- Message --}}
                <div>

                    <label
                        for="chat-message"
                        class="block text-sm font-semibold text-black"
                    >
                        Pesan
                    </label>

                    <textarea
                        id="chat-message"
                        name="message"
                        rows="4"
                        required
                        placeholder="Ceritakan kebutuhan Anda..."
                        class="mt-2 w-full resize-none rounded-xl border border-gray-200 px-4 py-3 text-sm text-black outline-none focus:border-[#D90000] focus:ring-1 focus:ring-[#D90000]"
                    >{{ old('message') }}</textarea>

                </div>


                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full rounded-xl bg-[#D90000] px-5 py-3 font-semibold text-white hover:bg-[#B00000] transition"
                >
                    Kirim Pesan
                </button>

            </form>

        </div>

    </div>

</div>