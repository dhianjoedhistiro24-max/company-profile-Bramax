<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        PT BRAMAX Teknologi Indonesia
    </title>

    @vite([
        'resources/css/style.css',
        'resources/js/app.js'
    ])

</head>

<body>

    <!-- =========================
         NAVBAR
    ========================== -->

   <nav class="navbar">
    <div class="navbar-container">

        <!-- Logo -->
        <a href="/" class="navbar-logo">
            BRAMAX
        </a>

        <!-- Menu -->
        <div class="navbar-menu">
            <a href="/" class="nav-link">Home</a>
            <a href="/about" class="nav-link">About</a>

            <div class="nav-dropdown">
                <button class="nav-link dropdown-toggle">
                    Solutions
                    <span>⌄</span>
                </button>

                <div class="dropdown-menu">
                    <a href="/solutions/digital">Digital & Software</a>
                    <a href="/solutions/business">Business Support</a>
                    <a href="/solutions/creative">Creative & Media</a>
                    <a href="/solutions/commerce">Commerce & Procurement</a>
                    <a href="/solutions/operational">Operational Support</a>
                </div>
            </div>

            <a href="/portfolio" class="nav-link">Portfolio</a>
            <a href="/insights" class="nav-link">Insights</a>
            <a href="/download" class="nav-link">Download</a>

            <a href="/contact" class="nav-button">
                Contact
            </a>
        </div>

        <!-- Mobile Button -->
        <button class="mobile-menu-button" id="mobileMenuButton">
            ☰
        </button>

    </div>
</nav>

    <!-- =========================
         HERO
    ========================== -->

    <section
        class="hero"
        id="home"
    >

        <!-- Threads Background -->

        <div
            class="threads-background"
            id="threads-background"
        ></div>


        <!-- Hero Content -->

        <div class="hero-content">

            <p class="hero-subtitle">
                PT BRAMAX TEKNOLOGI INDONESIA
            </p>

            <h1>
                Solusi Teknologi
                untuk Masa Depan
            </h1>

            <p class="hero-description">
                Menghadirkan solusi teknologi yang inovatif
                untuk mendukung perkembangan bisnis di era digital.
            </p>

            <a
                href="#about"
                class="hero-button"
            >
                Pelajari Selengkapnya
            </a>

        </div>

    </section>

</body>

</html>