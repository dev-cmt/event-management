document.addEventListener('DOMContentLoaded', function () {
    /* 1. AOS Scroll Animation */
    AOS.init({ duration: 800, once: true, offset: 100 });

    /* 2. GLightbox Gallery Plugin */
    const lightbox = GLightbox({ selector: '.glightbox', touchNavigation: true, loop: true, zoomable: true });

    /* 2b. Desktop navbar dropdowns - keep only one open at a time */
    const desktopDropdownQuery = window.matchMedia('(min-width: 992px)');
    const navDropdownItems = document.querySelectorAll('.main-navbar .nav-item.dropdown');

    function closeOtherDropdowns(activeItem) {
        navDropdownItems.forEach(item => {
            if (item !== activeItem) {
                const toggle = item.querySelector('[data-bs-toggle="dropdown"]');
                const dropdown = bootstrap.Dropdown.getInstance(toggle);
                if (dropdown) {
                    dropdown.hide();
                }
                item.classList.remove('show');
                const menu = item.querySelector('.dropdown-menu');
                if (menu) menu.classList.remove('show');
            }
        });
    }

    function bindDesktopDropdownBehavior() {
        navDropdownItems.forEach(item => {
            const toggle = item.querySelector('[data-bs-toggle="dropdown"]');
            if (!toggle) return;

            toggle.addEventListener('mouseenter', () => {
                if (!desktopDropdownQuery.matches) return;
                closeOtherDropdowns(item);
                bootstrap.Dropdown.getOrCreateInstance(toggle).show();
            });

            toggle.addEventListener('click', (e) => {
                if (!desktopDropdownQuery.matches) return;
                e.preventDefault();
                closeOtherDropdowns(item);
                const dropdown = bootstrap.Dropdown.getOrCreateInstance(toggle);
                const menu = item.querySelector('.dropdown-menu');
                const isOpen = item.classList.contains('show') || (menu && menu.classList.contains('show'));
                if (isOpen) {
                    dropdown.hide();
                } else {
                    dropdown.show();
                }
            });
        });

        document.addEventListener('click', (e) => {
            if (!desktopDropdownQuery.matches) return;
            if (!e.target.closest('.main-navbar')) {
                navDropdownItems.forEach(item => {
                    const toggle = item.querySelector('[data-bs-toggle="dropdown"]');
                    const dropdown = bootstrap.Dropdown.getInstance(toggle);
                    if (dropdown) dropdown.hide();
                });
            }
        });
    }

    bindDesktopDropdownBehavior();

    /* 3. Our Services Swiper Plugin */
    const swiperServices = new Swiper('.swiper-services', {
        slidesPerView: 1,
        spaceBetween: 25,
        loop: true,
        autoplay: { delay: 4000, disableOnInteraction: false },
        pagination: { el: '.swiper-services .swiper-pagination', clickable: true },
        navigation: { nextEl: '.services-next', prevEl: '.services-prev' },
        breakpoints: {
            768: { slidesPerView: 2 },
            992: { slidesPerView: 3 }
        }
    });

    /* 4. About Story Gallery Swiper */
    const swiperAboutGallery = new Swiper('.swiper-about-gallery', {
        slidesPerView: 1,
        spaceBetween: 16,
        loop: true,
        autoplay: { delay: 3500, disableOnInteraction: false, pauseOnMouseEnter: true },
        pagination: { el: '.about-gallery-pagination', clickable: true },
        breakpoints: {
            480: { slidesPerView: 2, spaceBetween: 14 },
            768: { slidesPerView: 3, spaceBetween: 16 }
        }
    });

    /* 5. Our Presence Venues Swiper Plugin (3D Flip Cards) */
    const swiperVenues = new Swiper('.swiper-venues', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false, pauseOnMouseEnter: true },
        pagination: { el: '.venues-pagination', clickable: true },
        navigation: { nextEl: '.venues-next', prevEl: '.venues-prev' },
        breakpoints: {
            576: { slidesPerView: 2 },
            992: { slidesPerView: 3 },
            1200: { slidesPerView: 4 }
        }
    });

    /* 5. Gallery Filter Handler */
    const filterBtns = document.querySelectorAll('.gallery-filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.getAttribute('data-filter');

            galleryItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                    item.classList.add('animate__animated', 'animate__fadeIn');
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    /* 6. Dark/Light Theme Mode Toggle */
    const themeToggleBtn = document.getElementById('darkThemeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const themeText = document.getElementById('themeText');
    const htmlElement = document.documentElement;

    const savedTheme = localStorage.getItem('ncs_theme') || 'light';
    setTheme(savedTheme);

    themeToggleBtn.addEventListener('click', () => {
        const currentTheme = htmlElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        setTheme(newTheme);
    });

    function setTheme(theme) {
        htmlElement.setAttribute('data-bs-theme', theme);
        htmlElement.setAttribute('data-theme', theme);
        localStorage.setItem('ncs_theme', theme);

        if (theme === 'dark') {
            themeIcon.className = 'fas fa-sun me-1 text-warning';
            themeText.textContent = 'Light Mode';
        } else {
            themeIcon.className = 'fas fa-moon me-1';
            themeText.textContent = 'Dark Mode';
        }
    }

    /* 7. Floating Dynamic Color Customizer */
    const paletteToggleBtn = document.getElementById('paletteToggleBtn');
    const colorPalettePanel = document.getElementById('colorPalettePanel');
    const swatches = document.querySelectorAll('.color-swatch');

    paletteToggleBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        colorPalettePanel.classList.toggle('show');
    });

    document.addEventListener('click', (e) => {
        if (!colorPalettePanel.contains(e.target) && e.target !== paletteToggleBtn) {
            colorPalettePanel.classList.remove('show');
        }
    });

    swatches.forEach(swatch => {
        swatch.addEventListener('click', () => {
            const primary = swatch.getAttribute('data-primary');
            const rgb = swatch.getAttribute('data-rgb');
            const accent = swatch.getAttribute('data-accent');

            document.documentElement.style.setProperty('--primary-color', primary);
            document.documentElement.style.setProperty('--primary-rgb', rgb);
            document.documentElement.style.setProperty('--accent-color', accent);

            colorPalettePanel.classList.remove('show');
        });
    });

    /* 8. Reservation Form Toast Simulation */
    const reservationForm = document.getElementById('reservationForm');
    const bookingToast = document.getElementById('bookingToast');

    if (reservationForm && bookingToast) {
        reservationForm.addEventListener('submit', function (e) {
            e.preventDefault();
            bookingToast.style.display = 'block';
            reservationForm.reset();
            setTimeout(() => { bookingToast.style.display = 'none'; }, 4000);
        });
    }

    /* 9. Clients Brand Carousel Swiper */
    if (document.querySelector('.swiper-clients')) {
        const clientsSwiper = new Swiper('.swiper-clients', {
            slidesPerView: 2,
            spaceBetween: 16,
            loop: true,
            speed: 600,
            autoplay: { delay: 2500, disableOnInteraction: false, pauseOnMouseEnter: true },
            breakpoints: {
                480: { slidesPerView: 3, spaceBetween: 16 },
                768: { slidesPerView: 4, spaceBetween: 18 },
                992: { slidesPerView: 5, spaceBetween: 20 },
                1200: { slidesPerView: 6, spaceBetween: 20 }
            }
        });

        /* Hover → pause / resume */
        const clientsEl = document.querySelector('.swiper-clients');
        clientsEl.addEventListener('mouseenter', () => clientsSwiper.autoplay.stop());
        clientsEl.addEventListener('mouseleave', () => clientsSwiper.autoplay.start());
    }

    /* 10. Scroll To Top */
    const scrollBtn = document.querySelector('.scroll-to-top');
    if (scrollBtn) {
        // Show / hide on scroll
        const toggleScrollBtn = () => {
            scrollBtn.classList.toggle('open', window.scrollY > 300);
        };

        toggleScrollBtn();
        window.addEventListener('scroll', toggleScrollBtn, { passive: true });

        // Click → smooth scroll to target
        scrollBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
});
