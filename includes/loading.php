<!-- ============================================================
   LOADING SCREEN - GEONEXUS (VERSÃO SUAVE)
   ============================================================ -->
<div class="loading-cinematic" id="loadingScreen">
    <div class="cinematic-background">
        <div class="bg-gradient"></div>
        <div class="grid-overlay"></div>
    </div>
    
    <div class="light-rings">
        <div class="ring ring-1"></div>
        <div class="ring ring-2"></div>
        <div class="ring ring-3"></div>
        <div class="ring ring-4"></div>
    </div>
    
    <div class="light-effects">
        <div class="flare flare-1"></div>
        <div class="flare flare-2"></div>
        <div class="scan-line"></div>
    </div>
    
    <div class="cinematic-content">
        <div class="logo-container">
            <div class="logo-glow"></div>
            <div class="logo-wrapper">
                <img src="../assets/images/logo.png" alt="GeoNexus" class="logo-image">
            </div>
            <div class="logo-line">
                <div class="line-progress"></div>
            </div>
            <div class="company-name">GeoNexus</div>
            <div class="slogan-container">
                <span class="slogan-text">Conectando o Território, a Engenharia e o Futuro</span>
                <span class="slogan-sub">— Ecossistema de Geotecnologia —</span>
            </div>
        </div>
        
        <!-- ===== CÍRCULO DE PROGRESSO ===== -->
        <div class="progress-circular-container">
            <svg class="progress-circular" viewBox="0 0 120 120">
                <!-- Definição do gradiente -->
                <defs>
                    <linearGradient id="progressGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#E63946" />
                        <stop offset="50%" stop-color="#2ECC71" />
                        <stop offset="100%" stop-color="#00D4FF" />
                    </linearGradient>
                </defs>
                <!-- Fundo do círculo -->
                <circle class="progress-bg" cx="60" cy="60" r="54" />
                <!-- Preenchimento do círculo -->
                <circle class="progress-fill-circle" id="progressCircle" cx="60" cy="60" r="54" />
            </svg>
            <div class="progress-center">
                <span class="progress-percentage" id="progressPercentage">0%</span>
                <span class="progress-label">CARREGANDO</span>
            </div>
        </div>
        
        <div class="status-container">
            <div class="status-dot">
                <div class="dot-pulse"></div>
            </div>
            <span class="status-text" id="statusText">CONECTANDO AOS SATÉLITES GNSS</span>
        </div>
        
       
    </div>
    
    <div class="vignette"></div>
    <div class="film-grain"></div>
    
    <div class="system-version">
        <span class="version-tag">Sistema GeoNexus</span>
        <span class="version-status">● OPERACIONAL</span>
    </div>
</div>

<style>
    /* ============================================================
   LOADING CINEMATOGRÁFICO - GEONEXUS (VERSÃO SUAVE)
   ============================================================ */

:root {
    --vermelho-acionet: #E63946;
    --vermelho-escuro: #CC007D;
    --azul-acionet: #00D4FF;
    --azul-escuro: #0A1628;
    --azul-profundo: #060B1A;
    --azul-meio: #0D1B3E;
    --verde-geo: #2ECC71;
    --gradiente-principal: linear-gradient(135deg, #E63946, #FF6B7A);
    --gradiente-azul: linear-gradient(135deg, #00D4FF, #0066FF);
    --gradiente-duplo: linear-gradient(135deg, #E63946, #2ECC71);
    --gradiente-geo: linear-gradient(135deg, #E63946, #2ECC71);
    --fonte-cinema: 'Space Grotesk', 'Orbitron', sans-serif;
}

/* ============================================
   CONTAINER PRINCIPAL - FUNDO AZUL ESCURO
============================================ */
.loading-cinematic {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: var(--azul-profundo);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99999;
    overflow: hidden;
    transition: opacity 1.5s cubic-bezier(0.4, 0, 0.2, 1), visibility 1.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.loading-cinematic.hidden {
    opacity: 0;
    pointer-events: none;
    visibility: hidden;
}

/* ============================================
   CAMADA 1: FUNDO COM EFEITOS
============================================ */
.cinematic-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.bg-gradient {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(ellipse at 30% 20%, rgba(46, 204, 113, 0.05) 0%, transparent 60%),
        radial-gradient(ellipse at 70% 80%, rgba(230, 57, 70, 0.05) 0%, transparent 60%),
        radial-gradient(ellipse at 50% 50%, rgba(0, 212, 255, 0.02) 0%, transparent 70%);
}

.grid-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        linear-gradient(rgba(46, 204, 113, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(46, 204, 113, 0.03) 1px, transparent 1px);
    background-size: 60px 60px;
    animation: gridMove 30s linear infinite;
    perspective: 500px;
}

@keyframes gridMove {
    0% {
        transform: perspective(500px) rotateX(2deg) translateY(0);
    }
    100% {
        transform: perspective(500px) rotateX(2deg) translateY(60px);
    }
}

/* ============================================
   ANÉIS DE LUZ
============================================ */
.light-rings {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 90%;
    height: 90%;
    z-index: 1;
}

.ring {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    border: 1px solid rgba(230, 57, 70, 0.08);
    animation: ringPulse 6s ease-in-out infinite;
}

.ring-1 {
    width: 40%;
    height: 40%;
    animation-delay: 0s;
    border-color: rgba(46, 204, 113, 0.15);
}

.ring-2 {
    width: 60%;
    height: 60%;
    animation-delay: 1.5s;
    border-color: rgba(0, 212, 255, 0.10);
}

.ring-3 {
    width: 80%;
    height: 80%;
    animation-delay: 3s;
    border-color: rgba(230, 57, 70, 0.08);
}

.ring-4 {
    width: 95%;
    height: 95%;
    animation-delay: 4.5s;
    border-color: rgba(46, 204, 113, 0.06);
}

@keyframes ringPulse {
    0%, 100% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 0.3;
    }
    50% {
        transform: translate(-50%, -50%) scale(1.08);
        opacity: 0.8;
    }
}

/* ============================================
   CAMADA 2: EFEITOS DE LUZ
============================================ */
.light-effects {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
    pointer-events: none;
}

.flare {
    position: absolute;
    border-radius: 50%;
    filter: blur(100px);
    animation: flarePulse 5s ease-in-out infinite;
}

.flare-1 {
    width: 50%;
    height: 50%;
    top: -15%;
    right: -15%;
    background: rgba(46, 204, 113, 0.10);
    animation-delay: 0s;
}

.flare-2 {
    width: 40%;
    height: 40%;
    bottom: -15%;
    left: -15%;
    background: rgba(230, 57, 70, 0.08);
    animation-delay: 2s;
}

@keyframes flarePulse {
    0%, 100% {
        transform: scale(1) rotate(0deg);
        opacity: 0.5;
    }
    50% {
        transform: scale(1.3) rotate(10deg);
        opacity: 1;
    }
}

.scan-line {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(46, 204, 113, 0.2), transparent);
    animation: scanLine 6s linear infinite;
    box-shadow: 0 0 30px rgba(46, 204, 113, 0.1);
}

@keyframes scanLine {
    0% {
        top: -2px;
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        top: 100%;
        opacity: 0;
    }
}

/* ============================================
   CAMADA 3: CONTEÚDO PRINCIPAL
============================================ */
.cinematic-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 2rem;
    max-width: 800px;
    width: 100%;
}

/* ============================================
   LOGO
============================================ */
.logo-container {
    position: relative;
    margin-bottom: 1.8rem;
}

.logo-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(46, 204, 113, 0.15) 0%, transparent 70%);
    animation: glowPulse 3s ease-in-out infinite;
    pointer-events: none;
    border-radius: 50%;
}

@keyframes glowPulse {
    0%, 100% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 0.5;
    }
    50% {
        transform: translate(-50%, -50%) scale(1.2);
        opacity: 1;
    }
}

.logo-wrapper {
    position: relative;
    display: inline-block;
    animation: logoFloat 5s ease-in-out infinite;
}

@keyframes logoFloat {
    0%, 100% {
        transform: translateY(0) scale(1);
    }
    50% {
        transform: translateY(-10px) scale(1.02);
    }
}

.logo-image {
    width: 150px;
    height: auto;
    filter: drop-shadow(0 0 30px rgba(46, 204, 113, 0.3));
    animation: logoPulse 3s ease-in-out infinite;
    display: block;
    margin: 0 auto;
}

@keyframes logoPulse {
    0%, 100% {
        filter: drop-shadow(0 0 30px rgba(46, 204, 113, 0.3));
    }
    50% {
        filter: drop-shadow(0 0 60px rgba(46, 204, 113, 0.6)) drop-shadow(0 0 90px rgba(230, 57, 70, 0.3));
    }
}

.logo-line {
    width: 0;
    height: 2px;
    margin: 1rem auto 0.8rem;
    background: var(--gradiente-geo);
    position: relative;
    animation: lineExpand 2s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    max-width: 200px;
    border-radius: 2px;
}

@keyframes lineExpand {
    0% {
        width: 0;
        opacity: 0;
    }
    100% {
        width: 80%;
        opacity: 1;
    }
}

.line-progress {
    position: absolute;
    top: -2px;
    left: 0;
    width: 100%;
    height: 4px;
    background: var(--gradiente-geo);
    filter: blur(6px);
    animation: lineGlow 2.5s ease-in-out infinite;
    border-radius: 2px;
}

@keyframes lineGlow {
    0%, 100% {
        opacity: 0.4;
    }
    50% {
        opacity: 1;
    }
}

.company-name {
    font-family: var(--fonte-cinema);
    font-size: clamp(1.5rem, 4vw, 2.5rem);
    font-weight: 800;
    background: var(--gradiente-geo);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    letter-spacing: 0.15em;
    margin: 0.3rem 0 0.2rem;
    text-shadow: 0 0 40px rgba(46, 204, 113, 0.2);
    opacity: 0;
    animation: fadeUp 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.3s forwards;
}

.slogan-container {
    margin-top: 0.3rem;
    opacity: 0;
    animation: fadeUp 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.6s forwards;
}

.slogan-text {
    display: block;
    font-size: clamp(0.5rem, 0.9vw, 0.75rem);
    color: rgba(255, 255, 255, 0.4);
    letter-spacing: 0.3em;
    font-weight: 300;
    font-family: var(--fonte-cinema);
    text-transform: uppercase;
}

.slogan-sub {
    display: block;
    font-size: clamp(0.4rem, 0.6vw, 0.5rem);
    color: rgba(255, 255, 255, 0.15);
    letter-spacing: 0.2em;
    margin-top: 0.2rem;
    font-weight: 300;
}

@keyframes fadeUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ============================================
   CÍRCULO DE PROGRESSO (VERSÃO SUAVE)
============================================ */
.progress-circular-container {
    position: relative;
    width: 120px;
    height: 120px;
    margin: 1.5rem auto;
    opacity: 0;
    animation: fadeUp 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.9s forwards;
}

.progress-circular {
    width: 100%;
    height: 100%;
    transform: rotate(-90deg);
}

.progress-bg {
    fill: none;
    stroke: rgba(255, 255, 255, 0.06);
    stroke-width: 4;
    transition: stroke 0.8s ease;
}

.progress-fill-circle {
    fill: none;
    stroke: url(#progressGradient);
    stroke-width: 4.5;
    stroke-linecap: round;
    stroke-dasharray: 339.292;
    stroke-dashoffset: 339.292;
    transition: stroke-dashoffset 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    filter: drop-shadow(0 0 8px rgba(46, 204, 113, 0.2));
}

/* Gradiente do círculo */
.progress-circular defs {
    position: absolute;
}

.progress-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.progress-percentage {
    display: block;
    font-family: var(--fonte-cinema);
    font-size: 1.8rem;
    font-weight: 800;
    background: var(--gradiente-geo);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1;
    transition: all 0.3s ease;
}

.progress-label {
    display: block;
    font-family: var(--fonte-cinema);
    font-size: 0.5rem;
    color: rgba(255, 255, 255, 0.3);
    letter-spacing: 0.15em;
    margin-top: 0.15rem;
    font-weight: 600;
    animation: pulseText 2s ease-in-out infinite;
}

@keyframes pulseText {
    0%, 100% {
        opacity: 0.6;
    }
    50% {
        opacity: 1;
    }
}

/* ============================================
   STATUS DINÂMICO
============================================ */
.status-container {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin: 1rem 0;
    opacity: 0;
    animation: fadeUp 1.2s cubic-bezier(0.4, 0, 0.2, 1) 1.2s forwards;
}

.status-dot {
    position: relative;
    width: 12px;
    height: 12px;
}

.dot-pulse {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 8px;
    height: 8px;
    background: var(--verde-geo);
    border-radius: 50%;
    box-shadow: 0 0 20px rgba(46, 204, 113, 0.4);
    animation: dotPulse 1.8s ease-in-out infinite;
}

.dot-pulse::before {
    content: '';
    position: absolute;
    top: -4px;
    left: -4px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border: 1px solid rgba(46, 204, 113, 0.2);
    animation: dotRing 1.8s ease-in-out infinite;
}

@keyframes dotPulse {
    0%, 100% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
    }
    50% {
        transform: translate(-50%, -50%) scale(1.5);
        opacity: 0.5;
    }
}

@keyframes dotRing {
    0%, 100% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.8);
        opacity: 0;
    }
}

.status-text {
    font-family: var(--fonte-cinema);
    font-size: clamp(0.6rem, 0.9vw, 0.75rem);
    font-weight: 600;
    color: rgba(255, 255, 255, 0.7);
    letter-spacing: 0.15em;
    transition: opacity 0.5s ease;
}

.status-code {
    font-family: 'Courier New', monospace;
    font-size: 0.6rem;
    color: rgba(255, 255, 255, 0.2);
    padding: 0.15rem 0.5rem;
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 4px;
    background: rgba(255, 255, 255, 0.02);
}

/* ============================================
   TERMINAL
============================================ */
.terminal-container {
    margin: 1rem auto 0;
    font-family: 'Courier New', monospace;
    font-size: 0.6rem;
    color: rgba(46, 204, 113, 0.3);
    text-align: left;
    max-width: 380px;
    padding: 0.4rem 0.8rem;
    background: rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(46, 204, 113, 0.05);
    border-radius: 8px;
    opacity: 0;
    animation: fadeUp 1.2s cubic-bezier(0.4, 0, 0.2, 1) 1.5s forwards;
}

.terminal-line {
    padding: 0.1rem 0;
    opacity: 0;
    animation: typeWriter 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    animation-delay: calc(1.5s + var(--i, 0) * 0.4s);
}

.terminal-line::before {
    content: '> ';
    color: rgba(230, 57, 70, 0.4);
}

@keyframes typeWriter {
    0% {
        opacity: 0;
        transform: translateX(-10px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

/* ============================================
   VERSÃO DO SISTEMA
============================================ */
.system-version {
    position: fixed;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    gap: 1rem;
    font-family: var(--fonte-cinema);
    font-size: 0.5rem;
    color: rgba(255, 255, 255, 0.1);
    letter-spacing: 0.1em;
    z-index: 20;
    opacity: 0;
    animation: fadeUp 1.2s cubic-bezier(0.4, 0, 0.2, 1) 2s forwards;
}

.version-tag {
    padding: 0.15rem 0.5rem;
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 4px;
    background: rgba(255, 255, 255, 0.02);
}

.version-status {
    color: rgba(46, 204, 113, 0.2);
}

/* ============================================
   CAMADA 4: VIGNETTE
============================================ */
.vignette {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 5;
    pointer-events: none;
    background: radial-gradient(ellipse at center, transparent 55%, rgba(6, 11, 26, 0.7) 100%);
}

/* ============================================
   CAMADA 5: FILM GRAIN
============================================ */
.film-grain {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 3;
    pointer-events: none;
    opacity: 0.03;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
    animation: grain 0.5s steps(2) infinite;
}

@keyframes grain {
    0%, 100% { transform: translate(0); }
    10% { transform: translate(-5%, -5%); }
    20% { transform: translate(5%, 5%); }
    30% { transform: translate(-5%, 5%); }
    40% { transform: translate(5%, -5%); }
    50% { transform: translate(-5%, -2%); }
    60% { transform: translate(2%, 5%); }
    70% { transform: translate(5%, -5%); }
    80% { transform: translate(-5%, 2%); }
    90% { transform: translate(2%, -5%); }
}

/* ============================================
   RESPONSIVIDADE
============================================ */
@media (max-width: 768px) {
    .logo-image {
        width: clamp(100px, 25vw, 120px);
    }
    
    .logo-glow {
        width: 150px;
        height: 150px;
    }
    
    .company-name {
        font-size: clamp(1.2rem, 5vw, 1.8rem);
    }
    
    .light-rings {
        width: 95%;
        height: 95%;
    }
    
    .ring-1 { width: 50%; height: 50%; }
    .ring-2 { width: 70%; height: 70%; }
    .ring-3 { width: 85%; height: 85%; }
    .ring-4 { width: 95%; height: 95%; }
    
    .terminal-container {
        font-size: 0.5rem;
        max-width: 90%;
        padding: 0.3rem 0.6rem;
    }
    
    .progress-circular-container {
        width: 100px;
        height: 100px;
    }
    
    .progress-percentage {
        font-size: 1.5rem;
    }
    
    .system-version {
        bottom: 1rem;
        font-size: 0.4rem;
        gap: 0.5rem;
        flex-wrap: wrap;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .logo-image {
        width: clamp(80px, 30vw, 90px);
    }
    
    .logo-glow {
        width: 120px;
        height: 120px;
    }
    
    .company-name {
        font-size: clamp(1rem, 6vw, 1.4rem);
        letter-spacing: 0.1em;
    }
    
    .slogan-text {
        font-size: 0.45rem;
        letter-spacing: 0.15em;
    }
    
    .slogan-sub {
        font-size: 0.35rem;
    }
    
    .status-text {
        font-size: 0.5rem;
        letter-spacing: 0.1em;
    }
    
    .status-code {
        font-size: 0.4rem;
        padding: 0.1rem 0.4rem;
    }
    
    .progress-circular-container {
        width: 80px;
        height: 80px;
        margin: 1rem auto;
    }
    
    .progress-percentage {
        font-size: 1.2rem;
    }
    
    .progress-label {
        font-size: 0.4rem;
    }
    
    .terminal-container {
        font-size: 0.4rem;
        padding: 0.2rem 0.4rem;
    }
    
    .cinematic-content {
        padding: 0.8rem;
    }
}

/* ============================================
   ACESSIBILIDADE - REDUÇÃO DE MOVIMENTO
============================================ */
@media (prefers-reduced-motion: reduce) {
    .loading-cinematic * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
    
    .logo-image {
        animation: none !important;
    }
    
    .ring {
        animation: none !important;
        opacity: 0.2 !important;
    }
    
    .scan-line {
        animation: none !important;
        display: none !important;
    }
    
    .film-grain {
        animation: none !important;
        display: none !important;
    }
    
    .logo-glow {
        animation: none !important;
    }
}
</style>

<script>
    // ============================================================
// LOADING SCREEN - GEONEXUS (VERSÃO SUAVE)
// ============================================================

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============================================
    // ELEMENTOS
    // ============================================
    const loadingScreen = document.getElementById('loadingScreen');
    const progressCircle = document.getElementById('progressCircle');
    const progressPercentage = document.getElementById('progressPercentage');
    const statusText = document.getElementById('statusText');

    // ============================================
    // CONSTANTES
    // ============================================
    const CIRCUMFERENCE = 339.292; // 2 * PI * 54

    // ============================================
    // CONFIGURAÇÕES
    // ============================================
    const CONFIG = {
        intervalSpeed: 80, // Mais rápido para suavidade
        statusMessages: [
            'CONECTANDO AOS SATÉLITES GNSS',
            'INICIALIZANDO MÓDULO DE LEVANTAMENTO',
            'CARREGANDO DADOS GEOESPACIAIS',
            'SISTEMA PRONTO PARA USO'
        ],
        statusThresholds: [0, 25, 55, 80],
        displayTime: 600
    };

    // ============================================
    // ESTADO
    // ============================================
    let progress = 0;
    let statusIndex = 0;
    let intervalId = null;
    let animationFrameId = null;

    // ============================================
    // FUNÇÕES
    // ============================================

    function startLoading() {
        if (document.readyState === 'complete') {
            initProgress();
        } else {
            window.addEventListener('load', function() {
                setTimeout(initProgress, 300);
            });
        }
    }

    function initProgress() {
        if (!progressCircle || !progressPercentage || !statusText) {
            console.warn('Loading: Elementos não encontrados');
            return;
        }
        // Inicia com um pequeno atraso para suavidade
        setTimeout(() => {
            intervalId = setInterval(updateProgress, CONFIG.intervalSpeed);
        }, 200);
    }

    function updateProgress() {
        // Incremento mais suave e variável
        const increment = Math.random() * 2.5 + 0.5;
        progress = Math.min(progress + increment, 100);

        // Atualiza o círculo com easing suave
        const offset = CIRCUMFERENCE - (progress / 100) * CIRCUMFERENCE;
        
        // Usa requestAnimationFrame para suavidade
        if (animationFrameId) {
            cancelAnimationFrame(animationFrameId);
        }
        animationFrameId = requestAnimationFrame(() => {
            progressCircle.style.strokeDashoffset = offset;
        });

        // Atualiza o texto
        const roundedProgress = Math.round(progress);
        progressPercentage.textContent = roundedProgress + '%';
        progressPercentage.style.opacity = '1';

        // Atualiza o status
        updateStatus(progress);

        if (progress >= 100) {
            completeLoading();
        }
    }

    function updateStatus(currentProgress) {
        for (let i = CONFIG.statusThresholds.length - 1; i >= 0; i--) {
            if (currentProgress >= CONFIG.statusThresholds[i] && statusIndex !== i) {
                statusIndex = i;
                // Transição suave de texto
                statusText.style.opacity = '0';
                setTimeout(() => {
                    statusText.textContent = CONFIG.statusMessages[i];
                    statusText.style.opacity = '1';
                }, 200);
                break;
            }
        }
    }

    function completeLoading() {
        if (intervalId) {
            clearInterval(intervalId);
            intervalId = null;
        }

        if (animationFrameId) {
            cancelAnimationFrame(animationFrameId);
            animationFrameId = null;
        }

        // Pequeno delay para mostrar 100%
        setTimeout(() => {
            loadingScreen.classList.add('hidden');
            document.body.style.overflow = 'auto';

            const event = new CustomEvent('loadingComplete');
            document.dispatchEvent(event);

            if (typeof window.onLoadingComplete === 'function') {
                window.onLoadingComplete();
            }
        }, CONFIG.displayTime);
    }

    function forceComplete() {
        if (intervalId) {
            clearInterval(intervalId);
            intervalId = null;
        }

        progress = 100;
        const offset = CIRCUMFERENCE - (100 / 100) * CIRCUMFERENCE;
        progressCircle.style.strokeDashoffset = offset;
        progressPercentage.textContent = '100%';

        setTimeout(() => {
            loadingScreen.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, CONFIG.displayTime);
    }

    // ============================================
    // TIMEOUT DE SEGURANÇA (mais longo)
    // ============================================
    setTimeout(() => {
        if (!loadingScreen.classList.contains('hidden')) {
            console.warn('Loading: Timeout de segurança acionado (18s)');
            forceComplete();
        }
    }, 18000);

    // ============================================
    // EXPOSIÇÃO PÚBLICA
    // ============================================
    window.GeoNexusLoading = {
        start: startLoading,
        complete: forceComplete,
        forceComplete: forceComplete,
        isVisible: () => !loadingScreen.classList.contains('hidden')
    };

    // ============================================
    // INÍCIO
    // ============================================
    startLoading();

    console.log('🌍 GeoNexus Loading Screen (Versão Suave) inicializada com sucesso!');
});
</script>