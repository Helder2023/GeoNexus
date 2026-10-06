// ============================================================
// 📊 GEONEXUS - ANIMAÇÃO DE CONTADORES
// ============================================================

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============================================
    // CONFIGURAÇÕES
    // ============================================
    const CONFIG = {
        duration: 2500,        // Duração total da animação (ms)
        delayBetween: 200,     // Delay entre cada contador (ms)
        startDelay: 300,       // Delay antes de iniciar (ms)
        easing: 'easeOut',     // Tipo de easing
        observerThreshold: 0.3 // Percentual de visibilidade para iniciar
    };

    // ============================================
    // ELEMENTOS
    // ============================================
    const counters = document.querySelectorAll('.hero-stat .number');

    // ============================================
    // FUNÇÕES DE EASING
    // ============================================
    const easings = {
        easeOut: function(t) {
            return 1 - Math.pow(1 - t, 3);
        },
        easeInOut: function(t) {
            return t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
        },
        easeOutQuart: function(t) {
            return 1 - Math.pow(1 - t, 4);
        },
        linear: function(t) {
            return t;
        }
    };

    // ============================================
    // FUNÇÃO PARA ANIMAR UM CONTADOR
    // ============================================
    function animateCounter(element, target, duration, easingFn) {
        const startTime = performance.now();
        const startValue = 0;

        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = easingFn(progress);
            
            const currentValue = Math.floor(easedProgress * target);
            element.textContent = currentValue.toLocaleString('pt-PT');
            
            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                element.textContent = target.toLocaleString('pt-PT');
            }
        }

        requestAnimationFrame(update);
    }

    // ============================================
    // FUNÇÃO PARA INICIAR TODOS OS CONTADORES
    // ============================================
    function startCounters() {
        const easingFn = easings[CONFIG.easing] || easings.easeOut;

        counters.forEach((counter, index) => {
            const target = parseInt(counter.getAttribute('data-count'), 10);
            if (isNaN(target) || target <= 0) return;

            const delay = index * CONFIG.delayBetween;
            
            setTimeout(() => {
                animateCounter(counter, target, CONFIG.duration, easingFn);
            }, delay);
        });
    }

    // ============================================
    // OBSERVER PARA DETECTAR VISIBILIDADE
    // ============================================
    function setupObserver() {
        const heroSection = document.querySelector('.hero-section') || document.querySelector('.hero-stats');
        
        if (!heroSection) {
            // Fallback: Inicia após 1.5s se não encontrar a seção
            setTimeout(startCounters, 1500);
            return;
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounters();
                    observer.disconnect(); // Para de observar após iniciar
                }
            });
        }, {
            threshold: CONFIG.observerThreshold,
            rootMargin: '0px 0px -50px 0px'
        });

        observer.observe(heroSection);

        // Fallback: Se não iniciar após 5 segundos, força início
        setTimeout(() => {
            observer.disconnect();
            // Verifica se já foi iniciado
            const firstCounter = counters[0];
            if (firstCounter && firstCounter.textContent === '0') {
                startCounters();
            }
        }, 5000);
    }

    // ============================================
    // INÍCIO
    // ============================================
    // Aguarda o loading completo
    const startAnimation = function() {
        // Pequeno delay para garantir que tudo está carregado
        setTimeout(setupObserver, CONFIG.startDelay);
    };

    // Verifica se o loading já foi concluído
    if (document.querySelector('.loading-cinematic.hidden')) {
        startAnimation();
    } else {
        document.addEventListener('loadingComplete', startAnimation);
        
        // Fallback: Se o evento não disparar, inicia após 3 segundos
        setTimeout(function() {
            if (counters[0] && counters[0].textContent === '0') {
                startAnimation();
            }
        }, 3000);
    }

    console.log('📊 GeoNexus: Contadores inicializados!');
});