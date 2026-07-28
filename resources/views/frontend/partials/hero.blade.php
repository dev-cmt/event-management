@php
    $bgImage = asset('frontend/images/sliders/bg_hero.jpg');
    $mainTitle = data_get($page->content, 'slider.title', 'TEAMWORK MAKES THE DREAM WORK');
    $subTitle = data_get($page->content, 'slider.sub_title', 'WELCOME');
    $buttonText = data_get($page->content, 'slider.button_text', 'Explore');
    $buttonUrl = data_get($page->content, 'slider.button_url', '#');
@endphp

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/intro-effect.css') }}">
@endpush

<style>
    /*--------------------------------------------------------------
        # Hero Section
    --------------------------------------------------------------*/
    .hero-section {
        width: 100%;
        height: 100vh;
        background-image: url({{ $bgImage }});
        background-color: rgba(17, 17, 17, 0.8);
        overflow: hidden;
        position: relative;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-section .hero-container {
        width: 100%;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-section .intro-wrapper {
        position: relative;
        z-index: 2;
    }

    .click-burst-canvas {
        position: fixed;
        inset: 0;
        width: 100vw;
        height: 100vh;
        z-index: 9998;
        pointer-events: none;
    }

    #particles-js {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    @media (max-width: 768px) {
        .hero-section {
            height: auto;
            min-height: 80vh;
            padding: 120px 0;
            background-image: none;
            background: #DBDBDB;
        }
    }
</style>

<section class="hero-section">
    <div id="particles-js"></div>
    <div class="hero-container">
        <div class="intro-wrapper">
            <div class="intro-logo mb-4">
                <img loading="lazy" src="{{ asset($settings->logo_dark ?? 'images/logo_dark.png') }}" alt="Hero Logo"
                    style="max-height: 80px;">
            </div>

            <div class="intro-cover">
                <h1 class="intro-title">{!! nl2br(e($mainTitle)) !!}</h1>
            </div>

            <div class="intro-text">
                <span class="animate__animated animate__fadeInUp">
                    <h4>{{ $subTitle }}</h4>
                </span>
            </div>

            @if ($buttonText)
                <div class="mt-4">
                    <a href="{{ $buttonUrl }}" id="hero-button" class="theme-btn btn-style-one animate__animated animate__fadeInUp">{{ $buttonText }}</a>
                </div>
            @endif
        </div>
    </div>
</section>

@push('js')
    <script src="{{ asset('frontend/js/intro-effect.js') }}"></script>
    <script src="{{ asset('frontend/js/particles.min.js') }}"></script>
    <script src="{{ asset('frontend/js/particles-config.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var burstCanvas = document.getElementById('click-burst-canvas');
            var heroButton = document.querySelector('#hero-button');

            if (!burstCanvas) {
                burstCanvas = document.createElement('canvas');
                burstCanvas.id = 'click-burst-canvas';
                burstCanvas.className = 'click-burst-canvas';
                document.body.appendChild(burstCanvas);
            }

            if (burstCanvas) {
                var ctx = burstCanvas.getContext('2d');
                var particles = [];
                var colors = ['#2EB67D', '#ECB22E', '#E01E5B', '#0099ff', '#ffffff'];

                function resizeCanvas() {
                    burstCanvas.width = window.innerWidth;
                    burstCanvas.height = window.innerHeight;
                }

                function createParticle(x, y) {
                    var angle = Math.random() * Math.PI * 2;
                    var speed = 2 + Math.random() * 6;

                    return {
                        x: x,
                        y: y,
                        vx: Math.cos(angle) * speed,
                        vy: Math.sin(angle) * speed,
                        radius: 2 + Math.random() * 4,
                        alpha: 1,
                        decay: 0.018 + Math.random() * 0.02,
                        color: colors[Math.floor(Math.random() * colors.length)]
                    };
                }

                function burstAt(x, y) {
                    for (var i = 0; i < 36; i++) {
                        particles.push(createParticle(x, y));
                    }
                }

                function renderParticles() {
                    ctx.clearRect(0, 0, burstCanvas.width, burstCanvas.height);

                    particles = particles.filter(function(particle) {
                        particle.x += particle.vx;
                        particle.y += particle.vy;
                        particle.vy += 0.05;
                        particle.alpha -= particle.decay;

                        if (particle.alpha <= 0) {
                            return false;
                        }

                        ctx.beginPath();
                        ctx.fillStyle = particle.color;
                        ctx.globalAlpha = Math.max(particle.alpha, 0);
                        ctx.arc(particle.x, particle.y, particle.radius, 0, Math.PI * 2);
                        ctx.fill();
                        return true;
                    });

                    ctx.globalAlpha = 1;
                    window.requestAnimationFrame(renderParticles);
                }

                resizeCanvas();
                window.addEventListener('resize', resizeCanvas);

                document.addEventListener('click', function(event) {
                    burstAt(event.clientX, event.clientY);
                });

                window.requestAnimationFrame(renderParticles);
            }

            if (!heroButton) {
                return;
            }

            heroButton.addEventListener('click', function(event) {
                event.preventDefault();

                var targetSection = document.querySelector('.about-section, .services-section, .services-section-three, .team-section');

                if (!targetSection) {
                    return;
                }

                var startPosition = window.pageYOffset;
                var targetPosition = targetSection.getBoundingClientRect().top + window.pageYOffset - 80;
                var distance = targetPosition - startPosition;
                var duration = 900;
                var startTime = null;

                function easeInOutCubic(time) {
                    return time < 0.5
                        ? 4 * time * time * time
                        : 1 - Math.pow(-2 * time + 2, 3) / 2;
                }

                function animateScroll(currentTime) {
                    if (!startTime) {
                        startTime = currentTime;
                    }

                    var elapsedTime = currentTime - startTime;
                    var progress = Math.min(elapsedTime / duration, 1);
                    var easedProgress = easeInOutCubic(progress);

                    window.scrollTo(0, startPosition + distance * easedProgress);

                    if (progress < 1) {
                        window.requestAnimationFrame(animateScroll);
                    }
                }

                window.requestAnimationFrame(animateScroll);
            });
        });
    </script>
@endpush
