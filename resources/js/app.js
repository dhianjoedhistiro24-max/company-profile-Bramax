import './bootstrap';
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

// =========================
// HERO SCROLL
// =========================

window.addEventListener('scroll', function () {


const container = document.querySelector('.hero-scroll-container');
const expandImage = document.getElementById('scroll-expand-image');
const textInitial = document.getElementById('hero-text-initial');
const textOverlay = document.getElementById('hero-text-overlay');

if (!container || !expandImage) {
    return;
}

const rect = container.getBoundingClientRect();

const scrollPercent = Math.max(
    0,
    Math.min(
        1,
        -rect.top / (rect.height - window.innerHeight)
    )
);

const size = 50 + (50 * scrollPercent);
const radius = 30 - (30 * scrollPercent);

expandImage.style.width = size + 'vw';
expandImage.style.height = size + 'vh';
expandImage.style.borderRadius = radius + 'px';

if (textInitial && textOverlay) {

    if (scrollPercent < 0.3) {

        textInitial.style.opacity =
            1 - (scrollPercent * 3);

        textOverlay.style.opacity = 0;
        textOverlay.style.pointerEvents = 'none';

    } else {

        textInitial.style.opacity = 0;

        textOverlay.style.opacity = 1;
        textOverlay.style.pointerEvents = 'auto';

    }

}


});


// NAVBAR


let lastScrollTop = 0;

window.addEventListener('scroll', function () {


const navbar = document.getElementById('navbar');

if (!navbar) {
    return;
}

const currentScroll =
    window.pageYOffset ||
    document.documentElement.scrollTop;

if (currentScroll > lastScrollTop && currentScroll > 100) {

    navbar.style.transform = 'translateY(-100%)';

} else {

    navbar.style.transform = 'translateY(0)';

}

lastScrollTop =
    currentScroll <= 0
        ? 0
        : currentScroll;


});

// =========================
// MOBILE NAVBAR
// =========================

document.addEventListener('DOMContentLoaded', function () {


const mobileMenuButton =
    document.getElementById('mobileMenuButton');

const mobileMenu =
    document.getElementById('mobileMenu');

if (!mobileMenuButton || !mobileMenu) {
    return;
}

mobileMenuButton.addEventListener('click', function () {

    mobileMenu.classList.toggle('hidden');

    const isOpen =
        !mobileMenu.classList.contains('hidden');

    mobileMenuButton.setAttribute(
        'aria-expanded',
        isOpen
    );

    mobileMenuButton.textContent =
        isOpen ? '✕' : '☰';

});


mobileMenu.querySelectorAll('a').forEach(function (link) {

    link.addEventListener('click', function () {

        mobileMenu.classList.add('hidden');

        mobileMenuButton.setAttribute(
            'aria-expanded',
            'false'
        );

        mobileMenuButton.textContent = '☰';

    });

});


});

