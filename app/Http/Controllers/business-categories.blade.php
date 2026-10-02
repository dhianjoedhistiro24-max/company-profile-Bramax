<div class="max-w-7xl mx-auto px-6">

    <div class="mb-12">
        <p class="text-sm font-semibold text-red-500 uppercase tracking-widest">
            Business Categories
        </p>

        <h2 class="mt-3 text-4xl font-bold text-gray-900">
            Our Business Categories
        </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        @foreach ($businessCategories as $category)

            <a href="#"
               class="group p-6 rounded-2xl border border-gray-200 hover:shadow-lg transition">

                <h3 class="text-xl font-semibold text-gray-900 group-hover:text-red-500">
                    {{ $category->name }}
                </h3>

                <p class="mt-3 text-gray-600">
                    {{ $category->description }}
                </p>

            </a>

        @endforeach

    </div>

</div>