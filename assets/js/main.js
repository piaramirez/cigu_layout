document.addEventListener('DOMContentLoaded', function () {
            /* ============ MENÚ ============ */
            const menuToggle = document.querySelector('.menu-toggle');
            const mainNav = document.getElementById('mainNav');
            const dropdownToggles = document.querySelectorAll('.has-dropdown > .dropdown-toggle');
            const isMobile = () => window.innerWidth <= 992;

            function closeMobileMenu() {
                mainNav.classList.remove('open');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.setAttribute('aria-label', 'Abrir menú principal');
                const icon = menuToggle.querySelector('i');
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
                document.body.style.overflow = '';
            }

            menuToggle.addEventListener('click', function () {
                const isOpen = mainNav.classList.toggle('open');
                menuToggle.setAttribute('aria-expanded', isOpen);
                menuToggle.setAttribute('aria-label', isOpen ? 'Cerrar menú principal' : 'Abrir menú principal');
                const icon = menuToggle.querySelector('i');
                icon.classList.toggle('fa-bars', !isOpen);
                icon.classList.toggle('fa-times', isOpen);
                if (isOpen && isMobile()) document.body.style.overflow = 'hidden';
                else document.body.style.overflow = '';
            });

            dropdownToggles.forEach(function (toggle) {
                toggle.addEventListener('click', function (e) {
                    e.preventDefault();
                    const parent = this.parentElement;

                    if (isMobile()) {
                        document.querySelectorAll('.has-dropdown.open').forEach(function (other) {
                            if (other !== parent) {
                                other.classList.remove('open');
                                other.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'false');
                            }
                        });
                        const nowOpen = parent.classList.toggle('open');
                        this.setAttribute('aria-expanded', nowOpen);
                    } else {
                        const nowOpen = parent.classList.toggle('open');
                        this.setAttribute('aria-expanded', nowOpen);
                    }
                });
            });

            document.querySelectorAll('.nav-list a:not(.dropdown-toggle)').forEach(function (link) {
                link.addEventListener('click', function () {
                    if (isMobile()) closeMobileMenu();
                });
            });

            document.addEventListener('click', function (e) {
                if (isMobile() && mainNav.classList.contains('open') &&
                    !mainNav.contains(e.target) && !menuToggle.contains(e.target)) {
                    closeMobileMenu();
                }
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.has-dropdown.open').forEach(function (li) {
                        li.classList.remove('open');
                        li.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'false');
                    });
                    if (mainNav.classList.contains('open')) closeMobileMenu();
                }
            });

            window.addEventListener('resize', function () {
                if (!isMobile()) {
                    mainNav.classList.remove('open');
                    const icon = menuToggle.querySelector('i');
                    icon.classList.add('fa-bars');
                    icon.classList.remove('fa-times');
                    menuToggle.setAttribute('aria-expanded', 'false');
                    document.body.style.overflow = '';
                }
            });

            /* ============ CARRUSEL ACCESIBLE ============ */
            const track = document.getElementById('carouselTrack');
            if (!track) return;

            const slides = Array.from(track.querySelectorAll('.carousel-slide'));
            const dots = Array.from(document.querySelectorAll('#carouselDots .dot'));
            const prevBtn = document.querySelector('.carousel-btn.prev');
            const nextBtn = document.querySelector('.carousel-btn.next');
            const carousel = document.getElementById('newsCarousel');
            const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            let current = 0;
            let autoplay = null;

            function updateA11y() {
                slides.forEach((slide, i) => {
                    const isActive = i === current;
                    slide.setAttribute('aria-hidden', !isActive);
                    if (isActive) {
                        slide.removeAttribute('inert');
                    } else {
                        slide.setAttribute('inert', '');
                    }
                });
                dots.forEach((dot, i) => {
                    const isActive = i === current;
                    dot.classList.toggle('active', isActive);
                    dot.setAttribute('aria-selected', isActive);
                    if (isActive) dot.setAttribute('aria-current', 'true');
                    else dot.removeAttribute('aria-current');
                });
            }

            function goTo(index) {
                current = (index + slides.length) % slides.length;
                track.style.transform = `translateX(-${current * 100}%)`;
                updateA11y();
            }

            function next() { goTo(current + 1); }
            function prev() { goTo(current - 1); }

            nextBtn.addEventListener('click', () => { next(); restartAutoplay(); });
            prevBtn.addEventListener('click', () => { prev(); restartAutoplay(); });

            dots.forEach((dot, i) => {
                dot.addEventListener('click', () => { goTo(i); restartAutoplay(); });
            });

            function startAutoplay() {
                if (reduceMotion) return;
                autoplay = setInterval(next, 7000);
            }
            function restartAutoplay() {
                clearInterval(autoplay);
                startAutoplay();
            }

            carousel.addEventListener('mouseenter', () => clearInterval(autoplay));
            carousel.addEventListener('mouseleave', startAutoplay);

            // Pausa autoplay cuando el foco entra al carrusel
            carousel.addEventListener('focusin', () => clearInterval(autoplay));
            carousel.addEventListener('focusout', () => startAutoplay());

            // Swipe táctil
            let startX = 0;
            track.addEventListener('touchstart', e => startX = e.touches[0].clientX, {passive: true});
            track.addEventListener('touchend', e => {
                const diff = startX - e.changedTouches[0].clientX;
                if (Math.abs(diff) > 50) {
                    diff > 0 ? next() : prev();
                    restartAutoplay();
                }
            }, {passive: true});

            // Teclado
            carousel.addEventListener('keydown', e => {
                if (e.key === 'ArrowRight') { e.preventDefault(); next(); restartAutoplay(); }
                if (e.key === 'ArrowLeft') { e.preventDefault(); prev(); restartAutoplay(); }
            });

            goTo(0);
            startAutoplay();

            /* ============ BUSCADOR ============ */
            const searchToggle = document.getElementById('searchToggle');
            const searchForm = document.getElementById('searchForm');
            const searchInput = document.getElementById('searchInput');
            const searchClose = document.getElementById('searchClose');

            if (searchToggle && searchForm) {
                searchToggle.addEventListener('click', function () {
                    const isOpen = searchForm.classList.toggle('open');
                    searchToggle.setAttribute('aria-expanded', isOpen);
                    if (isOpen) {
                        searchInput.focus();
                    }
                });

                searchClose.addEventListener('click', function () {
                    searchForm.classList.remove('open');
                    searchToggle.setAttribute('aria-expanded', 'false');
                    searchToggle.focus();
                });

                // Cerrar con Escape
                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape' && searchForm.classList.contains('open')) {
                        searchForm.classList.remove('open');
                        searchToggle.setAttribute('aria-expanded', 'false');
                        searchToggle.focus();
                    }
                });

                // Cerrar al hacer clic fuera
                document.addEventListener('click', function (e) {
                    if (searchForm.classList.contains('open') &&
                        !searchForm.contains(e.target) &&
                        !searchToggle.contains(e.target)) {
                        searchForm.classList.remove('open');
                        searchToggle.setAttribute('aria-expanded', 'false');
                    }
                });

                // Al pasar a desktop, limpiar estado móvil
                window.addEventListener('resize', function () {
                    if (window.innerWidth > 992 && searchForm.classList.contains('open')) {
                        searchForm.classList.remove('open');
                        searchToggle.setAttribute('aria-expanded', 'false');
                    }
                });
            }


                        /* ============ CUENTA REGRESIVA PODCAST ============ */
            (function initPodcastCountdown() {
                const elDays = document.getElementById('cd-days');
                const elHours = document.getElementById('cd-hours');
                const elMins = document.getElementById('cd-mins');
                const elSecs = document.getElementById('cd-secs');
                if (!elDays) return;

                // 👇 Ajusta aquí la fecha/hora del próximo episodio
                // Por defecto: próximo viernes a las 18:00 (hora local)
                function getNextEpisodeDate() {
                    const now = new Date();
                    const target = new Date(now);
                    const day = now.getDay(); // 0=Dom, 5=Vie
                    const daysUntilFriday = (5 - day + 7) % 7;
                    target.setDate(now.getDate() + daysUntilFriday);
                    target.setHours(18, 0, 0, 0);
                    // Si ya pasó la hora del viernes, saltar al siguiente viernes
                    if (target <= now) {
                        target.setDate(target.getDate() + 7);
                    }
                    return target;
                }

                let targetDate = getNextEpisodeDate();
                const pad = n => String(n).padStart(2, '0');

                function tick() {
                    const now = new Date();
                    let diff = targetDate - now;

                    // Si llegó a cero, reiniciar al siguiente episodio
                    if (diff <= 0) {
                        targetDate = getNextEpisodeDate();
                        diff = targetDate - now;
                    }

                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                    const mins = Math.floor((diff / (1000 * 60)) % 60);
                    const secs = Math.floor((diff / 1000) % 60);

                    elDays.textContent = pad(days);
                    elHours.textContent = pad(hours);
                    elMins.textContent = pad(mins);
                    elSecs.textContent = pad(secs);
                }

                tick();
                setInterval(tick, 1000);
            })();
        });