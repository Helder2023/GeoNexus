<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoNexus — Login</title>

    <!-- Meta Tags -->
    <meta name="description" content="Acesse a sua conta GeoNexus como Individual, Empresarial, Institucional ou Cliente.">
    <meta name="keywords" content="login, acesso, conta, geonexus, individual, empresarial, institucional, cliente, portal">
    <meta name="author" content="GeoNexus">

    <!-- Open Graph -->
    <meta property="og:title" content="GeoNexus — Login">
    <meta property="og:description" content="Acesse a sua conta GeoNexus.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://geonnexus.com/login">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../assets/imgs/favicon.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Principal -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <!-- ============================================================
   LOADING SCREEN
============================================================ -->
    <?php include '../includes/loading.php'; ?>

    <!-- ============================================================
   PÁGINA DE LOGIN (SEM NAVBAR)
============================================================ -->
    <div class="login-page">

        <!-- Background com efeitos -->
        <div class="login-background">
            <div class="bg-particles">
                <div class="particle" style="left: 10%; animation-duration: 18s; animation-delay: 0s;"></div>
                <div class="particle" style="left: 25%; animation-duration: 22s; animation-delay: 2s;"></div>
                <div class="particle" style="left: 40%; animation-duration: 20s; animation-delay: 4s;"></div>
                <div class="particle" style="left: 55%; animation-duration: 25s; animation-delay: 1s;"></div>
                <div class="particle" style="left: 70%; animation-duration: 19s; animation-delay: 3s;"></div>
                <div class="particle" style="left: 85%; animation-duration: 23s; animation-delay: 5s;"></div>
                <div class="particle" style="left: 15%; animation-duration: 21s; animation-delay: 6s;"></div>
                <div class="particle" style="left: 50%; animation-duration: 24s; animation-delay: 7s;"></div>
                <div class="particle" style="left: 75%; animation-duration: 17s; animation-delay: 8s;"></div>
                <div class="particle" style="left: 90%; animation-duration: 26s; animation-delay: 9s;"></div>
            </div>
            <div class="bg-gradient-overlay"></div>
            <div class="bg-grid"></div>
        </div>

        <!-- Container do Login -->
        <div class="login-container">
            <div class="login-card">

                <!-- Logo -->
                <div class="login-logo">
                    <a href="index.php">
                        <img src="../assets/images/logo-nav.png" alt="GeoNexus">
                    </a>
                </div>

                <!-- Título -->
                <div class="login-header">
                    <h1>Bem-vindo de volta</h1>
                    <p>Entre na sua conta para continuar</p>
                </div>

                <!-- ============================================================
                SELETOR DE PERFIL - VERSÃO OTIMIZADA
                ============================================================ -->
                <div class="login-profile-selector">
                    <!-- Individual -->
                    <button class="profile-btn active" data-profile="individual" onclick="selectProfile('individual')">
                        <span class="profile-icon-wrapper" style="background: rgba(46, 204, 113, 0.12); color: #2ECC71;">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="profile-label">
                            <span class="profile-name">Individual</span>
                            <span class="profile-subtitle">Profissional autónomo</span>
                        </span>
                    </button>

                    <!-- Empresarial -->
                    <button class="profile-btn" data-profile="empresarial" onclick="selectProfile('empresarial')">
                        <span class="profile-icon-wrapper" style="background: rgba(230, 57, 70, 0.12); color: #E63946;">
                            <i class="fas fa-building"></i>
                        </span>
                        <span class="profile-label">
                            <span class="profile-name">Empresarial</span>
                            <span class="profile-subtitle">Empresas e organizações</span>
                        </span>
                    </button>

                    <!-- Institucional -->
                    <button class="profile-btn" data-profile="institucional" onclick="selectProfile('institucional')">
                        <span class="profile-icon-wrapper" style="background: rgba(249, 168, 37, 0.12); color: #F9A825;">
                            <i class="fas fa-university"></i>
                        </span>
                        <span class="profile-label">
                            <span class="profile-name">Institucional</span>
                            <span class="profile-subtitle">Universidades e governos</span>
                        </span>
                    </button>

                    <!-- Cliente -->
                    <button class="profile-btn" data-profile="cliente" onclick="selectProfile('cliente')">
                        <span class="profile-icon-wrapper" style="background: rgba(0, 188, 212, 0.12); color: #00BCD4;">
                            <i class="fas fa-user-check"></i>
                        </span>
                        <span class="profile-label">
                            <span class="profile-name">Cliente</span>
                            <span class="profile-subtitle">Portal do Cliente</span>
                        </span>
                    </button>
                </div>

                <!-- Formulário de Login -->
                <form class="login-form" id="loginForm" method="POST" action="../api/auth/login.php">

                    <!-- ==========================================
                    CAMPOS INDIVIDUAIS (COM CÓDIGO DE VERIFICAÇÃO - MESMO ESTILO)
                    ========================================== -->
                    <div id="individual-fields" class="profile-fields active">
                        <div class="form-group">
                            <label for="email-individual">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input type="email" id="email-individual" name="email" placeholder="seu@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password-individual">
                                <i class="fas fa-lock"></i> Senha
                            </label>
                            <div class="password-wrapper">
                                <input type="password" id="password-individual" name="password" placeholder="••••••••" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('password-individual', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Código de Verificação (MESMO ESTILO dos outros campos) -->
                        <div class="form-group" id="codigo-individual-group">
                            <label for="codigo-individual">
                                <i class="fas fa-shield-alt"></i> Código de Verificação
                            </label>
                            <input type="text" id="codigo-individual" name="codigo" placeholder="Digite o código de 6 dígitos" maxlength="6" required>
                            <span class="field-hint"><i class="fas fa-info-circle"></i> Um código de 6 dígitos foi enviado para o seu email</span>
                        </div>
                    </div>

                    <!-- ==========================================
                    CAMPOS EMPRESARIAIS
                    ========================================== -->
                    <div id="empresarial-fields" class="profile-fields">
                        <div class="form-group">
                            <label for="email-empresarial">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input type="email" id="email-empresarial" name="email" placeholder="seu@empresa.com" required>
                        </div>
                        <div class="form-group">
                            <label for="codigo-empresarial">
                                <i class="fas fa-building"></i> Código da Empresa
                            </label>
                            <input type="text" id="codigo-empresarial" name="codigo" placeholder="EX: EMP-12345" required>
                            <span class="field-hint"><i class="fas fa-info-circle"></i> O código foi enviado no email de confirmação</span>
                        </div>
                        <div class="form-group">
                            <label for="password-empresarial">
                                <i class="fas fa-lock"></i> Senha
                            </label>
                            <div class="password-wrapper">
                                <input type="password" id="password-empresarial" name="password" placeholder="••••••••" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('password-empresarial', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                    CAMPOS INSTITUCIONAIS
                    ========================================== -->
                    <div id="institucional-fields" class="profile-fields">
                        <div class="form-group">
                            <label for="email-institucional">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input type="email" id="email-institucional" name="email" placeholder="seu@instituicao.edu" required>
                        </div>
                        <div class="form-group">
                            <label for="codigo-institucional">
                                <i class="fas fa-university"></i> Código da Instituição
                            </label>
                            <input type="text" id="codigo-institucional" name="codigo" placeholder="EX: INST-67890" required>
                            <span class="field-hint"><i class="fas fa-info-circle"></i> O código foi enviado no email de confirmação</span>
                        </div>
                        <div class="form-group">
                            <label for="password-institucional">
                                <i class="fas fa-lock"></i> Senha
                            </label>
                            <div class="password-wrapper">
                                <input type="password" id="password-institucional" name="password" placeholder="••••••••" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('password-institucional', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                    CAMPOS DO CLIENTE (PORTAL)
                    ========================================== -->
                    <div id="cliente-fields" class="profile-fields">
                        <div class="form-group">
                            <label for="email-cliente">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input type="email" id="email-cliente" name="email" placeholder="seu@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="codigo-cliente">
                                <i class="fas fa-hashtag"></i> Código do Projeto
                            </label>
                            <input type="text" id="codigo-cliente" name="codigo" placeholder="EX: PROJ-12345" required>
                            <span class="field-hint"><i class="fas fa-info-circle"></i> O código foi enviado no email de confirmação do projeto</span>
                        </div>
                        <div class="form-group">
                            <label for="password-cliente">
                                <i class="fas fa-lock"></i> Senha
                            </label>
                            <div class="password-wrapper">
                                <input type="password" id="password-cliente" name="password" placeholder="••••••••" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('password-cliente', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Opções extras -->
                    <div class="login-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember">
                            <span>Lembrar-me</span>
                        </label>
                        <a href="recuperar-senha.php" class="forgot-password">Esqueceu a senha?</a>
                    </div>

                    <!-- Botão de Login -->
                    <button type="submit" class="btn-login" id="loginBtn">
                        <span>Entrar</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>

                    <!-- Divider -->
                    <div class="login-divider">
                        <span>ou</span>
                    </div>

                    <!-- Registar -->
                    <div class="login-register">
                        <p>Não tem conta? <a href="registo.php">Criar conta agora</a></p>
                    </div>
                </form>

                <!-- Footer do Login -->
                <div class="login-footer">
                    <p><a href="politicas.php">Política de Privacidade</a> • <a href="termos.php">Termos de Uso</a></p>
                    <p>&copy; <?php echo date('Y'); ?> GeoNexus. Todos os direitos reservados.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- ============================================================
   SCRIPTS
============================================================ -->
    <script src="../assets/js/site.js"></script>

    <script>
        // ============================================================
        // LOADING SCREEN
        // ============================================================
        document.addEventListener('DOMContentLoaded', function() {
            const loadingScreen = document.getElementById('loadingScreen');
            const progressFill = document.getElementById('progressFill');
            const progressPercentage = document.getElementById('progressPercentage');
            const progressMarker = document.getElementById('progressMarker');
            const statusText = document.getElementById('statusText');

            let progress = 0;
            const statusMessages = [
                'PREPARANDO O LOGIN',
                'SEGURANÇA ATIVADA',
                'TUDO PRONTO'
            ];
            let statusIndex = 0;

            const interval = setInterval(() => {
                progress += Math.random() * 3 + 1;
                if (progress > 100) progress = 100;

                progressFill.style.width = progress + '%';
                progressPercentage.textContent = Math.round(progress) + '%';

                if (progress > 40 && statusIndex === 0) {
                    statusIndex = 1;
                    statusText.textContent = statusMessages[1];
                }
                if (progress > 80 && statusIndex === 1) {
                    statusIndex = 2;
                    statusText.textContent = statusMessages[2];
                }

                if (progress >= 100) {
                    clearInterval(interval);
                    progressMarker.classList.add('visible');

                    setTimeout(() => {
                        loadingScreen.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }, 800);
                }
            }, 120);
        });

        // ============================================================
        // SELEÇÃO DE PERFIL
        // ============================================================
        function selectProfile(profile) {
            // Atualiza botões
            document.querySelectorAll('.profile-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.querySelector(`.profile-btn[data-profile="${profile}"]`).classList.add('active');

            // Atualiza campos
            document.querySelectorAll('.profile-fields').forEach(fields => {
                fields.classList.remove('active');
            });
            document.getElementById(`${profile}-fields`).classList.add('active');

            // Atualiza o texto do botão de login
            const btn = document.getElementById('loginBtn');
            const profileNames = {
                'individual': 'Entrar como Individual',
                'empresarial': 'Entrar como Empresa',
                'institucional': 'Entrar como Instituição',
                'cliente': 'Entrar como Cliente'
            };
            btn.querySelector('span').textContent = profileNames[profile];

            // Animação suave
            const fields = document.getElementById(`${profile}-fields`);
            fields.style.animation = 'none';
            setTimeout(() => {
                fields.style.animation = 'fadeInUp 0.4s ease forwards';
            }, 10);
        }

        // ============================================================
        // MOSTRAR/OCULTAR SENHA
        // ============================================================
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const icon = button.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // ============================================================
        // SUBMISSÃO DO FORMULÁRIO
        // ============================================================
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Pega o perfil ativo
            const activeProfile = document.querySelector('.profile-btn.active').getAttribute('data-profile');

            // Coleta os dados
            const formData = new FormData(this);
            formData.append('perfil', activeProfile);

            // Validação adicional
            let isValid = true;

            if (activeProfile === 'individual') {
                const email = document.getElementById('email-individual').value.trim();
                const password = document.getElementById('password-individual').value.trim();
                const codigo = document.getElementById('codigo-individual').value.trim();
                if (!email || !password || !codigo) isValid = false;
            } else if (activeProfile === 'empresarial') {
                const email = document.getElementById('email-empresarial').value.trim();
                const codigo_empresa = document.getElementById('codigo-empresarial').value.trim();
                const password = document.getElementById('password-empresarial').value.trim();
                if (!email || !codigo_empresa || !password) isValid = false;
            } else if (activeProfile === 'institucional') {
                const email = document.getElementById('email-institucional').value.trim();
                const codigo_inst = document.getElementById('codigo-institucional').value.trim();
                const password = document.getElementById('password-institucional').value.trim();
                if (!email || !codigo_inst || !password) isValid = false;
            } else if (activeProfile === 'cliente') {
                const email = document.getElementById('email-cliente').value.trim();
                const codigo_projeto = document.getElementById('codigo-cliente').value.trim();
                const password = document.getElementById('password-cliente').value.trim();
                if (!email || !codigo_projeto || !password) isValid = false;
            }

            if (!isValid) {
                // Feedback visual de erro
                const btn = document.getElementById('loginBtn');
                btn.style.background = 'var(--gradiente-vermelho)';
                btn.innerHTML = '<i class="fas fa-exclamation-circle"></i> Preencha todos os campos';
                setTimeout(() => {
                    btn.innerHTML = '<span>Entrar</span><i class="fas fa-arrow-right"></i>';
                    btn.style.background = '';
                }, 2500);
                return;
            }

            // Simula envio
            const btn = document.getElementById('loginBtn');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> A verificar...';
            btn.disabled = true;

            // Define o destino do redirecionamento
            let redirectUrl = 'dashboard.php';
            if (activeProfile === 'cliente') {
                redirectUrl = '../painel/cliente/index.php';
            }

            // Simula autenticação
            setTimeout(() => {
                // Sucesso
                btn.innerHTML = '<i class="fas fa-check"></i> Autenticado!';
                btn.style.background = 'var(--gradiente-accent)';

                setTimeout(() => {
                    // Redireciona
                    window.location.href = redirectUrl;
                }, 800);

            }, 2000);
        });

        // ============================================================
        // ENTER PARA SUBMETER
        // ============================================================
        document.querySelectorAll('.profile-fields input').forEach(input => {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    document.getElementById('loginForm').dispatchEvent(new Event('submit'));
                }
            });
        });

        // ============================================================
        // ANIMAÇÃO DE SCROLL - INTERSECTION OBSERVER
        // ============================================================
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-fade-up, .animate-fade-left, .animate-fade-right').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>

</body>

<style>
    /* ============================================================
   PÁGINA LOGIN - ESTILOS MELHORADOS
   ============================================================ */

    /* ============================================
       PÁGINA DE LOGIN
    ============================================ */
    .login-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        position: relative;
        background: #0A1628;
        overflow: hidden;
    }

    /* Background */
    .login-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        background: radial-gradient(ellipse at 30% 20%, rgba(46, 204, 113, 0.06) 0%, transparent 60%),
            radial-gradient(ellipse at 70% 80%, rgba(230, 57, 70, 0.06) 0%, transparent 60%);
    }

    .bg-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        pointer-events: none;
    }

    .bg-particles .particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: rgba(255, 255, 255, 0.06);
        border-radius: 50%;
        animation: floatParticle 20s linear infinite;
    }

    .bg-gradient-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(10, 22, 40, 0.7);
        z-index: 2;
    }

    .bg-grid {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
        background-size: 50px 50px;
        z-index: 1;
        pointer-events: none;
    }

    @keyframes floatParticle {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100vh) rotate(720deg);
            opacity: 0;
        }
    }

    /* Container do Login - Ampliado */
    .login-container {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 560px;
        margin: 0 auto;
    }

    /* Card de Login - Mais espaçoso */
    .login-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: 28px;
        padding: 3rem 2.8rem;
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.08);
        animation: fadeInUp 0.6s ease forwards;
    }

    /* Logo */
    .login-logo {
        text-align: center;
        margin-bottom: 2rem;
    }

    .login-logo a {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
    }

    .login-logo img {
        height: 48px;
        width: auto;
    }

    .login-logo span {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: 1.6rem;
        color: #1D3557;
    }

    .login-logo span .highlight {
        color: #E63946;
    }

    /* Header */
    .login-header {
        text-align: center;
        margin-bottom: 2.2rem;
    }

    .login-header h1 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 2rem;
        font-weight: 700;
        color: #1D3557;
        margin-bottom: 0.3rem;
    }

    .login-header p {
        color: #6B7280;
        font-size: 0.95rem;
        margin: 0;
    }

    /* ============================================
       SELETOR DE PERFIL - VERSÃO OTIMIZADA
    ============================================ */
    .login-profile-selector {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.6rem;
        margin-bottom: 2rem;
        background: transparent;
        padding: 0;
    }

    .profile-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 0.6rem;
        background: #F3F4F6;
        border: 2px solid transparent;
        border-radius: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: left;
        position: relative;
        overflow: hidden;
        min-height: 56px;
    }

    /* Efeito de brilho no hover */
    .profile-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .profile-btn:hover::before {
        opacity: 1;
    }

    /* Ícone do Perfil */
    .profile-icon-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        flex-shrink: 0;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    /* Label do Perfil */
    .profile-label {
        display: flex;
        flex-direction: column;
        line-height: 1.2;
        flex: 1;
        min-width: 0;
    }

    .profile-name {
        font-size: 0.8rem;
        font-weight: 700;
        color: #1D3557;
        transition: color 0.3s ease;
    }

    .profile-subtitle {
        font-size: 0.6rem;
        color: #9CA3AF;
        font-weight: 400;
        transition: color 0.3s ease;
    }

    /* Estado Ativo */
    .profile-btn.active {
        background: white;
        border-color: #E63946;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .profile-btn.active .profile-name {
        color: #1D3557;
    }

    .profile-btn.active .profile-subtitle {
        color: #6B7280;
    }

    .profile-btn.active .profile-icon-wrapper {
        transform: scale(1.05);
    }

    /* Badge de seleção (checkmark) */
    .profile-btn.active::after {
        content: '✓';
        position: absolute;
        top: 4px;
        right: 6px;
        font-size: 0.5rem;
        font-weight: 700;
        color: #E63946;
        background: rgba(230, 57, 70, 0.1);
        width: 16px;
        height: 16px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Cores específicas por perfil */
    .profile-btn[data-profile="individual"].active {
        border-color: #2ECC71;
    }

    .profile-btn[data-profile="individual"].active .profile-icon-wrapper {
        background: #2ECC71 !important;
        color: white !important;
    }

    .profile-btn[data-profile="individual"].active::after {
        color: #2ECC71;
        background: rgba(46, 204, 113, 0.1);
    }

    .profile-btn[data-profile="empresarial"].active {
        border-color: #E63946;
    }

    .profile-btn[data-profile="empresarial"].active .profile-icon-wrapper {
        background: #E63946 !important;
        color: white !important;
    }

    .profile-btn[data-profile="empresarial"].active::after {
        color: #E63946;
        background: rgba(230, 57, 70, 0.1);
    }

    .profile-btn[data-profile="institucional"].active {
        border-color: #F9A825;
    }

    .profile-btn[data-profile="institucional"].active .profile-icon-wrapper {
        background: #F9A825 !important;
        color: white !important;
    }

    .profile-btn[data-profile="institucional"].active::after {
        color: #F9A825;
        background: rgba(249, 168, 37, 0.1);
    }

    .profile-btn[data-profile="cliente"].active {
        border-color: #00BCD4;
    }

    .profile-btn[data-profile="cliente"].active .profile-icon-wrapper {
        background: #00BCD4 !important;
        color: white !important;
    }

    .profile-btn[data-profile="cliente"].active::after {
        color: #00BCD4;
        background: rgba(0, 188, 212, 0.1);
    }

    /* ============================================
       CAMPOS DO FORMULÁRIO
    ============================================ */
    .profile-fields {
        display: none;
        animation: fadeInUp 0.4s ease forwards;
    }

    .profile-fields.active {
        display: block;
    }

    .form-group {
        margin-bottom: 1.2rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        font-size: 0.85rem;
        color: #1D3557;
        margin-bottom: 0.4rem;
    }

    .form-group label i {
        color: #E63946;
        margin-right: 0.4rem;
        width: 16px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 0.9rem 1rem;
        border: 2px solid #E5E7EB;
        border-radius: 12px;
        font-size: 0.95rem;
        color: #1A1A2E;
        transition: all 0.3s ease;
        background: #FAFAFA;
        font-family: 'Inter', sans-serif;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #E63946;
        background: white;
        box-shadow: 0 0 0 4px rgba(230, 57, 70, 0.08);
    }

    .form-group input::placeholder {
        color: #9CA3AF;
    }

    .field-hint {
        display: block;
        font-size: 0.7rem;
        color: #9CA3AF;
        margin-top: 0.3rem;
        line-height: 1.4;
    }

    .field-hint i {
        color: #2ECC71;
        margin-right: 0.3rem;
    }

    /* Password Wrapper */
    .password-wrapper {
        position: relative;
    }

    .password-wrapper input {
        padding-right: 3rem;
    }

    .toggle-password {
        position: absolute;
        right: 0.8rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #9CA3AF;
        cursor: pointer;
        padding: 0.3rem;
        transition: color 0.3s ease;
        font-size: 1rem;
    }

    .toggle-password:hover {
        color: #1D3557;
    }

    /* Opções de Login */
    .login-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 1.5rem 0;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        color: #6B7280;
        cursor: pointer;
    }

    .remember-me input[type="checkbox"] {
        width: 16px;
        height: 16px;
        accent-color: #E63946;
        cursor: pointer;
        border-radius: 4px;
    }

    .forgot-password {
        font-size: 0.85rem;
        color: #E63946;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .forgot-password:hover {
        color: #C0392B;
        text-decoration: underline;
    }

    /* Botão de Login - Mais alto */
    .btn-login {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #E63946, #FF6B7A);
        color: white;
        border: none;
        border-radius: 9999px;
        font-weight: 700;
        font-size: 1.05rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(230, 57, 70, 0.3);
        font-family: 'Inter', sans-serif;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(230, 57, 70, 0.4);
    }

    .btn-login:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }

    .btn-login i {
        font-size: 1rem;
        transition: transform 0.3s ease;
    }

    .btn-login:hover i {
        transform: translateX(4px);
    }

    /* Divider */
    .login-divider {
        display: flex;
        align-items: center;
        margin: 1.5rem 0;
        color: #9CA3AF;
    }

    .login-divider::before,
    .login-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #E5E7EB;
    }

    .login-divider span {
        padding: 0 1rem;
        font-size: 0.85rem;
        color: #9CA3AF;
    }

    /* Registar */
    .login-register {
        text-align: center;
    }

    .login-register p {
        color: #6B7280;
        font-size: 0.9rem;
        margin: 0;
    }

    .login-register a {
        color: #E63946;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .login-register a:hover {
        color: #C0392B;
        text-decoration: underline;
    }

    /* Footer do Login */
    .login-footer {
        text-align: center;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #E5E7EB;
    }

    .login-footer p {
        font-size: 0.75rem;
        color: #9CA3AF;
        margin: 0.2rem 0;
    }

    .login-footer a {
        color: #9CA3AF;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .login-footer a:hover {
        color: #1D3557;
    }

    /* ============================================
       ANIMAÇÕES
    ============================================ */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ============================================
       RESPONSIVIDADE
    ============================================ */
    @media (max-width: 768px) {
        .login-container {
            max-width: 480px;
        }

        .login-card {
            padding: 2.2rem 1.8rem;
        }

        .login-profile-selector {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
        }

        .profile-btn {
            padding: 0.5rem 0.6rem;
            min-height: 48px;
        }

        .profile-icon-wrapper {
            width: 34px;
            height: 34px;
            font-size: 0.85rem;
        }

        .profile-name {
            font-size: 0.75rem;
        }

        .profile-subtitle {
            font-size: 0.55rem;
        }
    }

    @media (max-width: 520px) {
        .login-card {
            padding: 1.8rem 1.2rem;
        }

        .login-header h1 {
            font-size: 1.5rem;
        }

        .login-options {
            flex-direction: column;
            gap: 0.8rem;
            align-items: flex-start;
        }

        .btn-login {
            font-size: 0.9rem;
            padding: 0.8rem;
        }

        .login-footer p {
            font-size: 0.65rem;
        }

        .form-group label {
            font-size: 0.8rem;
        }

        .form-group input {
            font-size: 0.9rem;
            padding: 0.7rem 0.8rem;
        }

        .profile-btn {
            padding: 0.4rem 0.5rem;
            min-height: 44px;
            border-radius: 10px;
        }

        .profile-icon-wrapper {
            width: 30px;
            height: 30px;
            font-size: 0.75rem;
            border-radius: 8px;
        }

        .profile-name {
            font-size: 0.7rem;
        }

        .profile-subtitle {
            font-size: 0.5rem;
        }

        .profile-btn.active::after {
            width: 14px;
            height: 14px;
            font-size: 0.4rem;
            top: 3px;
            right: 4px;
        }
    }

    @media (max-width: 400px) {
        .login-card {
            padding: 1.2rem 0.8rem;
        }

        .login-logo img {
            height: 32px;
        }

        .login-logo span {
            font-size: 1.1rem;
        }

        .login-header h1 {
            font-size: 1.3rem;
        }

        .login-profile-selector {
            grid-template-columns: 1fr 1fr;
            gap: 0.4rem;
        }

        .profile-btn {
            padding: 0.3rem 0.3rem;
            min-height: 38px;
            gap: 0.3rem;
        }

        .profile-icon-wrapper {
            width: 26px;
            height: 26px;
            font-size: 0.65rem;
            border-radius: 6px;
        }

        .profile-name {
            font-size: 0.6rem;
        }

        .profile-subtitle {
            display: none;
        }

        .profile-btn.active::after {
            width: 12px;
            height: 12px;
            font-size: 0.35rem;
            top: 2px;
            right: 3px;
        }

        .form-group input {
            font-size: 0.8rem;
            padding: 0.6rem 0.7rem;
        }

        .btn-login {
            font-size: 0.8rem;
            padding: 0.7rem;
        }

        .login-footer p {
            font-size: 0.55rem;
        }
    }
</style>

</html>