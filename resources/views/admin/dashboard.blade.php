
@extends('layouts.admin')

@section('content')

<div class="p-5 lg:p-8">

    <div class="mb-7">

        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D90000]">
            Overview
        </p>

        <h2 class="mt-2 text-2xl lg:text-3xl font-bold text-black">
            Content Overview
        </h2>

        <p class="mt-2 text-sm text-gray-500">
            Pantau jumlah konten yang tersedia di website BRAMAX.
        </p>

    </div>

    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">

        <div class="bg-white border border-gray-200 rounded-2xl p-5">
            <p class="text-xs text-gray-400">
                Categories
            </p>

            <p class="mt-2 text-3xl font-bold text-black">
                {{ $stats['categories'] }}
            </p>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl p-5">
            <p class="text-xs text-gray-400">
                Solutions
            </p>

            <p class="mt-2 text-3xl font-bold text-black">
                {{ $stats['solutions'] }}
            </p>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl p-5">
            <p class="text-xs text-gray-400">
                Services
            </p>

            <p class="mt-2 text-3xl font-bold text-black">
                {{ $stats['services'] }}
            </p>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl p-5">
            <p class="text-xs text-gray-400">
                Projects
            </p>

            <p class="mt-2 text-3xl font-bold text-black">
                {{ $stats['projects'] }}
            </p>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl p-5">
            <p class="text-xs text-gray-400">
                News
            </p>

            <p class="mt-2 text-3xl font-bold text-black">
                {{ $stats['news'] }}
            </p>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl p-5">
            <p class="text-xs text-gray-400">
                Downloads
            </p>

            <p class="mt-2 text-3xl font-bold text-black">
                {{ $stats['downloads'] }}
            </p>
        </div>

    </div>

    <div class="mt-6 bg-white border border-gray-200 rounded-2xl p-5 lg:p-7">

        <div class="mb-6">

            <p class="text-sm font-semibold text-black">
                Content Statistics
            </p>

            <p class="text-xs text-gray-400 mt-1">
                Jumlah konten yang telah dibuat oleh admin.
            </p>

        </div>

        <div class="h-80">
            <canvas id="contentChart"></canvas>
        </div>

    </div>

</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('contentChart');

new Chart(ctx, {
    type: 'bar',

    data: {
        labels: [
            'Categories',
            'Solutions',
            'Services',
            'Projects',
            'News',
            'Downloads'
        ],

        datasets: [
            {
                label: 'Jumlah Konten',

                data: [
                    {{ $stats['categories'] }},
                    {{ $stats['solutions'] }},
                    {{ $stats['services'] }},
                    {{ $stats['projects'] }},
                    {{ $stats['news'] }},
                    {{ $stats['downloads'] }}
                ],

                borderWidth: 1,
                borderRadius: 8
            }
        ]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                display: false
            }
        },

        scales: {
            y: {
                beginAtZero: true,

                ticks: {
                    precision: 0
                }
            }
        }
    }
});

</script>

@endpush


