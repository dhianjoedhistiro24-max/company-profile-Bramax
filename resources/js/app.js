import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// =====================================================
// HERO SCROLL
// =====================================================

window.addEventListener('scroll', function () {

    const container =
        document.querySelector('.hero-scroll-container');

    const expandImage =
        document.getElementById('scroll-expand-image');

    const textInitial =
        document.getElementById('hero-text-initial');

    const textOverlay =
        document.getElementById('hero-text-overlay');


    if (!container || !expandImage) {
        return;
    }


    const rect =
        container.getBoundingClientRect();


    const scrollPercent = Math.max(
        0,
        Math.min(
            1,
            -rect.top /
            (rect.height - window.innerHeight)
        )
    );


    const size =
        50 + (50 * scrollPercent);


    const radius =
        30 - (30 * scrollPercent);


    expandImage.style.width =
        size + 'vw';

    expandImage.style.height =
        size + 'vh';

    expandImage.style.borderRadius =
        radius + 'px';


    if (textInitial && textOverlay) {

        if (scrollPercent < 0.3) {

            textInitial.style.opacity =
                1 - (scrollPercent * 3);

            textOverlay.style.opacity = 0;

            textOverlay.style.pointerEvents =
                'none';

        } else {

            textInitial.style.opacity = 0;

            textOverlay.style.opacity = 1;

            textOverlay.style.pointerEvents =
                'auto';

        }

    }

});


// =====================================================
// NAVBAR SCROLL
// =====================================================

let lastScrollTop = 0;


window.addEventListener('scroll', function () {

    const navbar =
        document.getElementById('navbar');


    if (!navbar) {
        return;
    }


    const currentScroll =
        window.pageYOffset ||
        document.documentElement.scrollTop;


    if (
        currentScroll > lastScrollTop &&
        currentScroll > 100
    ) {

        navbar.style.transform =
            'translateY(-100%)';

    } else {

        navbar.style.transform =
            'translateY(0)';

    }


    lastScrollTop =
        currentScroll <= 0
            ? 0
            : currentScroll;

});


// =====================================================
// MOBILE NAVBAR
// =====================================================

function initMobileNavbar() {

    const mobileMenuButton =
        document.getElementById(
            'mobileMenuButton'
        );


    const mobileMenu =
        document.getElementById(
            'mobileMenu'
        );


    const mobileMenuOpenIcon =
        document.getElementById(
            'mobileMenuOpenIcon'
        );


    const mobileMenuCloseIcon =
        document.getElementById(
            'mobileMenuCloseIcon'
        );


    const mobileSolutionsButton =
        document.getElementById(
            'mobileSolutionsButton'
        );


    const mobileSolutionsMenu =
        document.getElementById(
            'mobileSolutionsMenu'
        );


    const mobileSolutionsIcon =
        document.getElementById(
            'mobileSolutionsIcon'
        );


    // -----------------------------------------------
    // MOBILE MENU UTAMA
    // -----------------------------------------------

    if (
        mobileMenuButton &&
        mobileMenu
    ) {

        mobileMenuButton.addEventListener(
            'click',
            function () {

                const isClosed =
                    mobileMenu.classList.contains(
                        'hidden'
                    );


                if (isClosed) {

                    // BUKA
                    mobileMenu.classList.remove(
                        'hidden'
                    );


                    mobileMenuButton.setAttribute(
                        'aria-expanded',
                        'true'
                    );


                    if (mobileMenuOpenIcon) {

                        mobileMenuOpenIcon.classList.add(
                            'hidden'
                        );

                    }


                    if (mobileMenuCloseIcon) {

                        mobileMenuCloseIcon.classList.remove(
                            'hidden'
                        );

                    }

                } else {

                    // TUTUP
                    mobileMenu.classList.add(
                        'hidden'
                    );


                    mobileMenuButton.setAttribute(
                        'aria-expanded',
                        'false'
                    );


                    if (mobileMenuOpenIcon) {

                        mobileMenuOpenIcon.classList.remove(
                            'hidden'
                        );

                    }


                    if (mobileMenuCloseIcon) {

                        mobileMenuCloseIcon.classList.add(
                            'hidden'
                        );

                    }


                    // Tutup Solutions juga
                    if (mobileSolutionsMenu) {

                        mobileSolutionsMenu.classList.add(
                            'hidden'
                        );

                    }


                    if (mobileSolutionsIcon) {

                        mobileSolutionsIcon.classList.remove(
                            'rotate-180'
                        );

                    }

                }

            }
        );

    }


    // -----------------------------------------------
    // MOBILE SOLUTIONS
    // -----------------------------------------------

    if (
        mobileSolutionsButton &&
        mobileSolutionsMenu
    ) {

        mobileSolutionsButton.addEventListener(
            'click',
            function () {

                const isClosed =
                    mobileSolutionsMenu.classList.contains(
                        'hidden'
                    );


                if (isClosed) {

                    mobileSolutionsMenu.classList.remove(
                        'hidden'
                    );


                    mobileSolutionsButton.setAttribute(
                        'aria-expanded',
                        'true'
                    );


                    if (mobileSolutionsIcon) {

                        mobileSolutionsIcon.classList.add(
                            'rotate-180'
                        );

                    }

                } else {

                    mobileSolutionsMenu.classList.add(
                        'hidden'
                    );


                    mobileSolutionsButton.setAttribute(
                        'aria-expanded',
                        'false'
                    );


                    if (mobileSolutionsIcon) {

                        mobileSolutionsIcon.classList.remove(
                            'rotate-180'
                        );

                    }

                }

            }
        );

    }


    // -----------------------------------------------
    // TUTUP MENU SAAT LINK DIKLIK
    // -----------------------------------------------

    if (mobileMenu) {

        const mobileLinks =
            mobileMenu.querySelectorAll('a');


        mobileLinks.forEach(function (link) {

            link.addEventListener(
                'click',
                function () {

                    mobileMenu.classList.add(
                        'hidden'
                    );


                    if (mobileMenuButton) {

                        mobileMenuButton.setAttribute(
                            'aria-expanded',
                            'false'
                        );

                    }


                    if (mobileMenuOpenIcon) {

                        mobileMenuOpenIcon.classList.remove(
                            'hidden'
                        );

                    }


                    if (mobileMenuCloseIcon) {

                        mobileMenuCloseIcon.classList.add(
                            'hidden'
                        );

                    }

                }
            );

        });

    }

}


// =====================================================
// JALANKAN MOBILE NAVBAR
// =====================================================

if (document.readyState === 'loading') {

    document.addEventListener(
        'DOMContentLoaded',
        initMobileNavbar
    );

} else {

    initMobileNavbar();

}