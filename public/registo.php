<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoNexus — Criar Conta</title>

    <!-- Meta Tags -->
    <meta name="description" content="Crie a sua conta GeoNexus como Individual, Empresarial, Institucional ou Cliente.">
    <meta name="keywords" content="registo, criar conta, geonexus, individual, empresarial, institucional, cliente">
    <meta name="author" content="GeoNexus">

    <!-- Open Graph -->
    <meta property="og:title" content="GeoNexus — Criar Conta">
    <meta property="og:description" content="Crie a sua conta GeoNexus.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://geonnexus.com/registo">

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
   PÁGINA DE REGISTO (SEM NAVBAR)
============================================================ -->
    <div class="register-page">

        <!-- Background com efeitos -->
        <div class="register-background">
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

        <!-- Container do Registo -->
        <div class="register-container">
            <div class="register-card">

                <!-- Logo -->
                <div class="register-logo">
                    <a href="index.php">
                        <img src="../assets/images/logo-nav.png" alt="GeoNexus">
                    </a>
                </div>

                <!-- Título -->
                <div class="register-header">
                    <h1>Criar conta</h1>
                    <p>Escolha o tipo de conta e preencha os dados</p>
                </div>

                <!-- ============================================================
                SELETOR DE PERFIL - MESMO ESTILO DO LOGIN
                ============================================================ -->
                <div class="register-profile-selector">
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

                <!-- Formulário de Registo -->
                <form class="register-form" id="registerForm" method="POST" action="../api/auth/registo.php" enctype="multipart/form-data">

                    <!-- ==========================================
                    PERFIL INDIVIDUAL
                    ========================================== -->
                    <div id="individual-fields" class="profile-fields active">

                        <!-- Dados Pessoais -->
                        <div class="form-section">
                            <h3><i class="fas fa-user-circle"></i> Dados Pessoais</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nome-individual"><i class="fas fa-user"></i> Nome Completo</label>
                                    <input type="text" id="nome-individual" name="nome" placeholder="Seu nome completo" required>
                                </div>
                                <div class="form-group">
                                    <label for="email-individual"><i class="fas fa-envelope"></i> Email</label>
                                    <input type="email" id="email-individual" name="email" placeholder="seu@email.com" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="telefone-individual"><i class="fas fa-phone"></i> Telefone</label>
                                    <input type="tel" id="telefone-individual" name="telefone" placeholder="+244 900 000 000">
                                </div>
                                <div class="form-group">
                                    <label for="profissao-individual"><i class="fas fa-briefcase"></i> Profissão</label>
                                    <input type="text" id="profissao-individual" name="profissao" placeholder="Topógrafo, Engenheiro, ...">
                                </div>
                            </div>
                        </div>

                        <!-- Documento (BI) -->
                        <div class="form-section">
                            <h3><i class="fas fa-id-card"></i> Documento de Identificação</h3>
                            <div class="form-group">
                                <label for="bi-individual"><i class="fas fa-file-pdf"></i> Cópia do BI (PDF)</label>
                                <div class="file-upload-wrapper">
                                    <input type="file" id="bi-individual" name="documento" accept=".pdf" required>
                                    <label for="bi-individual" class="file-upload-label">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span>Selecione o arquivo PDF</span>
                                        <small>Máx. 5MB</small>
                                    </label>
                                    <span class="file-name" id="bi-filename">Nenhum arquivo selecionado</span>
                                </div>
                                <span class="field-hint"><i class="fas fa-info-circle"></i> Envie uma cópia do seu Bilhete de Identidade em formato PDF (máx. 5MB)</span>
                            </div>
                        </div>

                        <!-- Senha -->
                        <div class="form-section">
                            <h3><i class="fas fa-lock"></i> Segurança</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="password-individual"><i class="fas fa-lock"></i> Senha</label>
                                    <div class="password-wrapper">
                                        <input type="password" id="password-individual" name="password" placeholder="••••••••" required minlength="6">
                                        <button type="button" class="toggle-password" onclick="togglePassword('password-individual', this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm-individual"><i class="fas fa-check-circle"></i> Confirmar Senha</label>
                                    <div class="password-wrapper">
                                        <input type="password" id="password-confirm-individual" name="password_confirm" placeholder="••••••••" required minlength="6">
                                        <button type="button" class="toggle-password" onclick="togglePassword('password-confirm-individual', this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                    PERFIL EMPRESARIAL
                    ========================================== -->
                    <div id="empresarial-fields" class="profile-fields">

                        <!-- Dados da Empresa -->
                        <div class="form-section">
                            <h3><i class="fas fa-building"></i> Dados da Empresa</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nome-empresarial"><i class="fas fa-building"></i> Nome da Empresa</label>
                                    <input type="text" id="nome-empresarial" name="nome_empresa" placeholder="Nome da sua empresa" required>
                                </div>
                                <div class="form-group">
                                    <label for="nif-empresarial"><i class="fas fa-hashtag"></i> NIF</label>
                                    <input type="text" id="nif-empresarial" name="nif" placeholder="Número de Identificação Fiscal" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email-empresarial"><i class="fas fa-envelope"></i> Email</label>
                                    <input type="email" id="email-empresarial" name="email" placeholder="contato@empresa.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefone-empresarial"><i class="fas fa-phone"></i> Telefone</label>
                                    <input type="tel" id="telefone-empresarial" name="telefone" placeholder="+244 900 000 000" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="endereco-empresarial"><i class="fas fa-map-marker-alt"></i> Endereço</label>
                                    <input type="text" id="endereco-empresarial" name="endereco" placeholder="Endereço da empresa" required>
                                </div>
                                <div class="form-group">
                                    <label for="website-empresarial"><i class="fas fa-globe"></i> Website</label>
                                    <input type="url" id="website-empresarial" name="website" placeholder="https://www.empresa.com">
                                </div>
                            </div>
                        </div>

                        <!-- Documentos -->
                        <div class="form-section">
                            <h3><i class="fas fa-file-pdf"></i> Documentos de Legalização</h3>
                            <div class="form-group">
                                <label for="certidao-empresarial"><i class="fas fa-file-pdf"></i> Certidão Comercial (PDF)</label>
                                <div class="file-upload-wrapper">
                                    <input type="file" id="certidao-empresarial" name="documento_certidao" accept=".pdf" required>
                                    <label for="certidao-empresarial" class="file-upload-label">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span>Selecione o arquivo PDF</span>
                                        <small>Máx. 5MB</small>
                                    </label>
                                    <span class="file-name" id="certidao-filename">Nenhum arquivo selecionado</span>
                                </div>
                                <span class="field-hint"><i class="fas fa-info-circle"></i> Envie a Certidão Comercial da empresa (máx. 5MB)</span>
                            </div>
                            <div class="form-group">
                                <label for="alvara-empresarial"><i class="fas fa-file-pdf"></i> Alvará / Licença (PDF) <span style="color: #9CA3AF; font-weight: 400;">(opcional)</span></label>
                                <div class="file-upload-wrapper">
                                    <input type="file" id="alvara-empresarial" name="documento_alvara" accept=".pdf">
                                    <label for="alvara-empresarial" class="file-upload-label">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span>Selecione o arquivo PDF</span>
                                        <small>Máx. 5MB</small>
                                    </label>
                                    <span class="file-name" id="alvara-filename">Nenhum arquivo selecionado</span>
                                </div>
                                <span class="field-hint"><i class="fas fa-info-circle"></i> Envie o Alvará ou Licença de funcionamento (máx. 5MB)</span>
                            </div>
                        </div>

                        <!-- Dados do Responsável -->
                        <div class="form-section">
                            <h3><i class="fas fa-user-tie"></i> Dados do Responsável</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="responsavel-empresarial"><i class="fas fa-user"></i> Nome do Responsável</label>
                                    <input type="text" id="responsavel-empresarial" name="responsavel" placeholder="Nome do responsável" required>
                                </div>
                                <div class="form-group">
                                    <label for="cargo-empresarial"><i class="fas fa-briefcase"></i> Cargo</label>
                                    <input type="text" id="cargo-empresarial" name="cargo" placeholder="Diretor, Gerente, ..." required>
                                </div>
                            </div>
                        </div>

                        <!-- Senha -->
                        <div class="form-section">
                            <h3><i class="fas fa-lock"></i> Segurança</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="password-empresarial"><i class="fas fa-lock"></i> Senha</label>
                                    <div class="password-wrapper">
                                        <input type="password" id="password-empresarial" name="password" placeholder="••••••••" required minlength="6">
                                        <button type="button" class="toggle-password" onclick="togglePassword('password-empresarial', this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm-empresarial"><i class="fas fa-check-circle"></i> Confirmar Senha</label>
                                    <div class="password-wrapper">
                                        <input type="password" id="password-confirm-empresarial" name="password_confirm" placeholder="••••••••" required minlength="6">
                                        <button type="button" class="toggle-password" onclick="togglePassword('password-confirm-empresarial', this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                    PERFIL INSTITUCIONAL
                    ========================================== -->
                    <div id="institucional-fields" class="profile-fields">

                        <!-- Dados da Instituição -->
                        <div class="form-section">
                            <h3><i class="fas fa-university"></i> Dados da Instituição</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nome-institucional"><i class="fas fa-university"></i> Nome da Instituição</label>
                                    <input type="text" id="nome-institucional" name="nome_instituicao" placeholder="Nome da instituição" required>
                                </div>
                                <div class="form-group">
                                    <label for="tipo-institucional"><i class="fas fa-tag"></i> Tipo de Instituição</label>
                                    <select id="tipo-institucional" name="tipo_instituicao" required>
                                        <option value="">Selecione...</option>
                                        <option value="universidade">Universidade</option>
                                        <option value="instituto">Instituto Técnico</option>
                                        <option value="centro_formacao">Centro de Formação</option>
                                        <option value="ministerio">Ministério / Órgão Público</option>
                                        <option value="municipio">Município / Governo Local</option>
                                        <option value="ong">ONG / Organização sem fins lucrativos</option>
                                        <option value="outro">Outro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email-institucional"><i class="fas fa-envelope"></i> Email</label>
                                    <input type="email" id="email-institucional" name="email" placeholder="instituicao@email.edu" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefone-institucional"><i class="fas fa-phone"></i> Telefone</label>
                                    <input type="tel" id="telefone-institucional" name="telefone" placeholder="+244 900 000 000" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="endereco-institucional"><i class="fas fa-map-marker-alt"></i> Endereço</label>
                                    <input type="text" id="endereco-institucional" name="endereco" placeholder="Endereço da instituição" required>
                                </div>
                                <div class="form-group">
                                    <label for="website-institucional"><i class="fas fa-globe"></i> Website</label>
                                    <input type="url" id="website-institucional" name="website" placeholder="https://www.instituicao.edu">
                                </div>
                            </div>
                        </div>

                        <!-- Documentos -->
                        <div class="form-section">
                            <h3><i class="fas fa-file-pdf"></i> Documentos de Legalização</h3>
                            <div class="form-group">
                                <label for="estatuto-institucional"><i class="fas fa-file-pdf"></i> Estatuto / Documento de Criação (PDF)</label>
                                <div class="file-upload-wrapper">
                                    <input type="file" id="estatuto-institucional" name="documento_estatuto" accept=".pdf" required>
                                    <label for="estatuto-institucional" class="file-upload-label">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span>Selecione o arquivo PDF</span>
                                        <small>Máx. 5MB</small>
                                    </label>
                                    <span class="file-name" id="estatuto-filename">Nenhum arquivo selecionado</span>
                                </div>
                                <span class="field-hint"><i class="fas fa-info-circle"></i> Envie o Estatuto ou Documento de Criação da instituição (máx. 5MB)</span>
                            </div>
                            <div class="form-group">
                                <label for="certidao-institucional"><i class="fas fa-file-pdf"></i> Certidão / Registo (PDF) <span style="color: #9CA3AF; font-weight: 400;">(opcional)</span></label>
                                <div class="file-upload-wrapper">
                                    <input type="file" id="certidao-institucional" name="documento_certidao" accept=".pdf">
                                    <label for="certidao-institucional" class="file-upload-label">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span>Selecione o arquivo PDF</span>
                                        <small>Máx. 5MB</small>
                                    </label>
                                    <span class="file-name" id="certidao-inst-filename">Nenhum arquivo selecionado</span>
                                </div>
                                <span class="field-hint"><i class="fas fa-info-circle"></i> Envie a Certidão ou Registo da instituição (máx. 5MB)</span>
                            </div>
                        </div>

                        <!-- Dados do Responsável -->
                        <div class="form-section">
                            <h3><i class="fas fa-user-tie"></i> Dados do Responsável</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="responsavel-institucional"><i class="fas fa-user"></i> Nome do Responsável</label>
                                    <input type="text" id="responsavel-institucional" name="responsavel" placeholder="Nome do responsável" required>
                                </div>
                                <div class="form-group">
                                    <label for="cargo-institucional"><i class="fas fa-briefcase"></i> Cargo</label>
                                    <input type="text" id="cargo-institucional" name="cargo" placeholder="Diretor, Reitor, ..." required>
                                </div>
                            </div>
                        </div>

                        <!-- Senha -->
                        <div class="form-section">
                            <h3><i class="fas fa-lock"></i> Segurança</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="password-institucional"><i class="fas fa-lock"></i> Senha</label>
                                    <div class="password-wrapper">
                                        <input type="password" id="password-institucional" name="password" placeholder="••••••••" required minlength="6">
                                        <button type="button" class="toggle-password" onclick="togglePassword('password-institucional', this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm-institucional"><i class="fas fa-check-circle"></i> Confirmar Senha</label>
                                    <div class="password-wrapper">
                                        <input type="password" id="password-confirm-institucional" name="password_confirm" placeholder="••••••••" required minlength="6">
                                        <button type="button" class="toggle-password" onclick="togglePassword('password-confirm-institucional', this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==========================================
                    PERFIL CLIENTE (NOVO)
                    ========================================== -->
                    <div id="cliente-fields" class="profile-fields">

                        <!-- Dados Pessoais -->
                        <div class="form-section">
                            <h3><i class="fas fa-user-circle"></i> Dados Pessoais</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nome-cliente"><i class="fas fa-user"></i> Nome Completo</label>
                                    <input type="text" id="nome-cliente" name="nome" placeholder="Seu nome completo" required>
                                </div>
                                <div class="form-group">
                                    <label for="email-cliente"><i class="fas fa-envelope"></i> Email</label>
                                    <input type="email" id="email-cliente" name="email" placeholder="seu@email.com" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="telefone-cliente"><i class="fas fa-phone"></i> Telefone</label>
                                    <input type="tel" id="telefone-cliente" name="telefone" placeholder="+244 900 000 000" required>
                                </div>
                                <div class="form-group">
                                    <label for="endereco-cliente"><i class="fas fa-map-marker-alt"></i> Endereço</label>
                                    <input type="text" id="endereco-cliente" name="endereco" placeholder="Seu endereço" required>
                                </div>
                            </div>
                        </div>

                        <!-- Documento (BI) -->
                        <div class="form-section">
                            <h3><i class="fas fa-id-card"></i> Documento de Identificação</h3>
                            <div class="form-group">
                                <label for="bi-cliente"><i class="fas fa-file-pdf"></i> Cópia do BI (PDF)</label>
                                <div class="file-upload-wrapper">
                                    <input type="file" id="bi-cliente" name="documento" accept=".pdf" required>
                                    <label for="bi-cliente" class="file-upload-label">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span>Selecione o arquivo PDF</span>
                                        <small>Máx. 5MB</small>
                                    </label>
                                    <span class="file-name" id="bi-cliente-filename">Nenhum arquivo selecionado</span>
                                </div>
                                <span class="field-hint"><i class="fas fa-info-circle"></i> Envie uma cópia do seu Bilhete de Identidade em formato PDF (máx. 5MB)</span>
                            </div>
                        </div>

                        <!-- Senha -->
                        <div class="form-section">
                            <h3><i class="fas fa-lock"></i> Segurança</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="password-cliente"><i class="fas fa-lock"></i> Senha</label>
                                    <div class="password-wrapper">
                                        <input type="password" id="password-cliente" name="password" placeholder="••••••••" required minlength="6">
                                        <button type="button" class="toggle-password" onclick="togglePassword('password-cliente', this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm-cliente"><i class="fas fa-check-circle"></i> Confirmar Senha</label>
                                    <div class="password-wrapper">
                                        <input type="password" id="password-confirm-cliente" name="password_confirm" placeholder="••••••••" required minlength="6">
                                        <button type="button" class="toggle-password" onclick="togglePassword('password-confirm-cliente', this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Termos e Condições -->
                    <div class="form-group terms-group">
                        <label class="terms-label">
                            <input type="checkbox" name="terms" required>
                            <span>Li e aceito os <a href="termos.php" target="_blank">Termos de Uso</a> e a <a href="politicas.php" target="_blank">Política de Privacidade</a></span>
                        </label>
                    </div>

                    <!-- Botão de Registo -->
                    <button type="submit" class="btn-register" id="registerBtn">
                        <span>Criar Conta</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>

                    <!-- Divider -->
                    <div class="register-divider">
                        <span>ou</span>
                    </div>

                    <!-- Login -->
                    <div class="register-login">
                        <p>Já tem conta? <a href="login.php">Fazer Login</a></p>
                    </div>
                </form>

                <!-- Footer do Registo -->
                <div class="register-footer">
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
                'PREPARANDO O REGISTO',
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
        // SELEÇÃO DE PERFIL (4 opções - mesmo estilo do login)
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

            // Atualiza o texto do botão de registo
            const btn = document.getElementById('registerBtn');
            const profileNames = {
                'individual': 'Criar Conta Individual',
                'empresarial': 'Criar Conta Empresarial',
                'institucional': 'Criar Conta Institucional',
                'cliente': 'Criar Conta Cliente'
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
        // UPLOAD DE FICHEIROS - VALIDAÇÃO 5MB
        // ============================================================
        document.querySelectorAll('.file-upload-wrapper input[type="file"]').forEach(input => {
            input.addEventListener('change', function() {
                const maxSize = 5 * 1024 * 1024; // 5MB
                const fileName = this.files[0] ? this.files[0].name : 'Nenhum arquivo selecionado';
                const fileSize = this.files[0] ? this.files[0].size : 0;
                const fileSizeMB = (fileSize / (1024 * 1024)).toFixed(2);

                // Atualiza o nome do arquivo
                const fileNameSpan = this.parentElement.querySelector('.file-name');
                if (fileNameSpan) {
                    fileNameSpan.textContent = fileName;
                    if (this.files[0]) {
                        fileNameSpan.style.color = '#2ECC71';
                        fileNameSpan.innerHTML = `<i class="fas fa-check-circle"></i> ${fileName} (${fileSizeMB} MB)`;
                    } else {
                        fileNameSpan.style.color = '#9CA3AF';
                        fileNameSpan.textContent = 'Nenhum arquivo selecionado';
                    }
                }

                // Valida o tamanho
                if (fileSize > maxSize) {
                    alert(`O arquivo "${fileName}" excede o tamanho máximo de 5MB (${fileSizeMB} MB).`);
                    this.value = '';
                    if (fileNameSpan) {
                        fileNameSpan.style.color = '#E63946';
                        fileNameSpan.textContent = '⚠️ Arquivo excede 5MB';
                    }
                }
            });
        });

        // ============================================================
        // SUBMISSÃO DO FORMULÁRIO - VALIDAÇÃO
        // ============================================================
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Pega o perfil ativo
            const activeProfile = document.querySelector('.profile-btn.active').getAttribute('data-profile');

            // Validação de senhas
            let passwordId, confirmId;
            if (activeProfile === 'individual') {
                passwordId = 'password-individual';
                confirmId = 'password-confirm-individual';
            } else if (activeProfile === 'empresarial') {
                passwordId = 'password-empresarial';
                confirmId = 'password-confirm-empresarial';
            } else if (activeProfile === 'institucional') {
                passwordId = 'password-institucional';
                confirmId = 'password-confirm-institucional';
            } else {
                passwordId = 'password-cliente';
                confirmId = 'password-confirm-cliente';
            }

            const password = document.getElementById(passwordId).value;
            const confirm = document.getElementById(confirmId).value;

            if (password !== confirm) {
                alert('As senhas não coincidem. Por favor, verifique.');
                return;
            }

            if (password.length < 6) {
                alert('A senha deve ter pelo menos 6 caracteres.');
                return;
            }

            // Validação de documentos
            const fileInputs = this.querySelectorAll('input[type="file"][required]');
            let allFilesValid = true;

            fileInputs.forEach(input => {
                if (!input.files || input.files.length === 0) {
                    allFilesValid = false;
                    input.style.borderColor = '#E63946';
                    alert(`Por favor, faça o upload do documento: ${input.previousElementSibling.querySelector('span')?.textContent || 'Documento'}`);
                }
            });

            if (!allFilesValid) {
                return;
            }

            // Simula envio
            const btn = document.getElementById('registerBtn');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> A criar conta...';
            btn.disabled = true;

            // Define redirecionamento baseado no perfil
            let redirectUrl = 'login.php?registro=sucesso';
            if (activeProfile === 'cliente') {
                redirectUrl = 'login.php?registro=sucesso&perfil=cliente';
            }

            // Simula processamento
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-check"></i> Conta criada!';
                btn.style.background = 'var(--gradiente-accent)';

                setTimeout(() => {
                    window.location.href = redirectUrl;
                }, 1500);

            }, 2500);
        });

        // ============================================================
        // ANIMAÇÃO DE SCROLL
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
   PÁGINA REGISTO - ESTILOS (UNIFORMIZADO COM LOGIN)
   ============================================================ */

    /* ============================================
       PÁGINA DE REGISTO
    ============================================ */
    .register-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        position: relative;
        background: #0A1628;
        overflow: hidden;
    }

    /* Background */
    .register-background {
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

    /* Container do Registo */
    .register-container {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 720px;
        margin: 0 auto;
    }

    /* Card de Registo */
    .register-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 2.5rem 2.2rem;
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.08);
        animation: fadeInUp 0.6s ease forwards;
    }

    /* Logo */
    .register-logo {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .register-logo a {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
    }

    .register-logo img {
        height: 42px;
        width: auto;
    }

    .register-logo span {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: 1.4rem;
        color: #1D3557;
    }

    .register-logo span .highlight {
        color: #E63946;
    }

    /* Header */
    .register-header {
        text-align: center;
        margin-bottom: 1.8rem;
    }

    .register-header h1 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: #1D3557;
        margin-bottom: 0.2rem;
    }

    .register-header p {
        color: #6B7280;
        font-size: 0.95rem;
        margin: 0;
    }

    /* ============================================
       SELETOR DE PERFIL - MESMO ESTILO DO LOGIN
    ============================================ */
    .register-profile-selector {
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
       FORMULÁRIO
    ============================================ */
    .register-form {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .profile-fields {
        display: none;
        animation: fadeInUp 0.4s ease forwards;
    }

    .profile-fields.active {
        display: block;
    }

    /* Secções do Formulário */
    .form-section {
        background: #F8FAFC;
        border-radius: 16px;
        padding: 1.2rem 1.5rem;
        margin-bottom: 1rem;
        border: 1px solid #E5E7EB;
    }

    .form-section h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 0.95rem;
        font-weight: 600;
        color: #1D3557;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-section h3 i {
        color: #E63946;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-group {
        margin-bottom: 0.8rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        font-size: 0.8rem;
        color: #1D3557;
        margin-bottom: 0.3rem;
    }

    .form-group label i {
        color: #E63946;
        margin-right: 0.3rem;
        width: 16px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 0.7rem 1rem;
        border: 2px solid #E5E7EB;
        border-radius: 12px;
        font-size: 0.9rem;
        color: #1A1A2E;
        transition: all 0.3s ease;
        background: white;
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

    /* File Upload */
    .file-upload-wrapper {
        position: relative;
    }

    .file-upload-wrapper input[type="file"] {
        position: absolute;
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        z-index: -1;
    }

    .file-upload-label {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.7rem 1rem;
        border: 2px dashed #D1D5DB;
        border-radius: 12px;
        background: #FAFAFA;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #6B7280;
        font-size: 0.85rem;
    }

    .file-upload-label:hover {
        border-color: #E63946;
        background: #FEF2F2;
    }

    .file-upload-label i {
        font-size: 1.5rem;
        color: #E63946;
    }

    .file-upload-label small {
        font-size: 0.65rem;
        color: #9CA3AF;
        margin-left: auto;
    }

    .file-name {
        display: block;
        font-size: 0.75rem;
        color: #9CA3AF;
        margin-top: 0.3rem;
        padding: 0.2rem 0.5rem;
        background: #F3F4F6;
        border-radius: 6px;
        word-break: break-all;
    }

    .file-name i {
        margin-right: 0.3rem;
    }

    /* Terms */
    .terms-group {
        margin: 0.5rem 0 1rem;
    }

    .terms-label {
        display: flex;
        align-items: flex-start;
        gap: 0.6rem;
        font-size: 0.85rem;
        color: #6B7280;
        cursor: pointer;
        line-height: 1.5;
    }

    .terms-label input[type="checkbox"] {
        width: 18px;
        height: 18px;
        min-width: 18px;
        margin-top: 2px;
        accent-color: #E63946;
        cursor: pointer;
    }

    .terms-label a {
        color: #E63946;
        text-decoration: none;
        font-weight: 500;
    }

    .terms-label a:hover {
        text-decoration: underline;
    }

    /* Botão de Registo */
    .btn-register {
        width: 100%;
        padding: 0.9rem;
        background: linear-gradient(135deg, #E63946, #FF6B7A);
        color: white;
        border: none;
        border-radius: 9999px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(230, 57, 70, 0.3);
        font-family: 'Inter', sans-serif;
        margin-top: 0.5rem;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(230, 57, 70, 0.4);
    }

    .btn-register:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }

    .btn-register i {
        font-size: 0.9rem;
        transition: transform 0.3s ease;
    }

    .btn-register:hover i {
        transform: translateX(4px);
    }

    /* Divider */
    .register-divider {
        display: flex;
        align-items: center;
        margin: 1.5rem 0 1rem;
        color: #9CA3AF;
    }

    .register-divider::before,
    .register-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #E5E7EB;
    }

    .register-divider span {
        padding: 0 1rem;
        font-size: 0.85rem;
        color: #9CA3AF;
    }

    /* Login */
    .register-login {
        text-align: center;
    }

    .register-login p {
        color: #6B7280;
        font-size: 0.9rem;
        margin: 0;
    }

    .register-login a {
        color: #E63946;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .register-login a:hover {
        color: #C0392B;
        text-decoration: underline;
    }

    /* Footer */
    .register-footer {
        text-align: center;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #E5E7EB;
    }

    .register-footer p {
        font-size: 0.75rem;
        color: #9CA3AF;
        margin: 0.2rem 0;
    }

    .register-footer a {
        color: #9CA3AF;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .register-footer a:hover {
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
        .register-card {
            padding: 1.8rem 1.2rem;
        }

        .register-profile-selector {
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

        .form-row {
            grid-template-columns: 1fr;
            gap: 0.5rem;
        }

        .register-header h1 {
            font-size: 1.5rem;
        }

        .btn-register {
            font-size: 0.9rem;
            padding: 0.8rem;
        }

        .register-footer p {
            font-size: 0.65rem;
        }

        .form-group label {
            font-size: 0.8rem;
        }

        .form-group input {
            font-size: 0.9rem;
            padding: 0.7rem 0.8rem;
        }

        .form-section {
            padding: 1rem;
        }

        .file-upload-label {
            font-size: 0.8rem;
            padding: 0.6rem 0.8rem;
            flex-wrap: wrap;
        }

        .file-upload-label small {
            margin-left: 0;
            width: 100%;
        }
    }

    @media (max-width: 520px) {
        .register-card {
            padding: 1.2rem 0.8rem;
        }

        .register-logo img {
            height: 32px;
        }

        .register-logo span {
            font-size: 1.1rem;
        }

        .register-header h1 {
            font-size: 1.3rem;
        }

        .register-profile-selector {
            grid-template-columns: 1fr 1fr;
            gap: 0.4rem;
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

        .form-group input {
            font-size: 0.85rem;
            padding: 0.6rem 0.7rem;
        }

        .btn-register {
            font-size: 0.85rem;
            padding: 0.7rem;
        }

        .register-footer p {
            font-size: 0.55rem;
        }

        .form-section h3 {
            font-size: 0.85rem;
        }

        .terms-label {
            font-size: 0.75rem;
        }

        .file-upload-label {
            font-size: 0.7rem;
            padding: 0.5rem 0.6rem;
        }

        .file-upload-label i {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 400px) {
        .register-card {
            padding: 1rem 0.6rem;
        }

        .register-profile-selector {
            grid-template-columns: 1fr 1fr;
            gap: 0.3rem;
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
            padding: 0.5rem 0.6rem;
        }

        .btn-register {
            font-size: 0.8rem;
            padding: 0.6rem;
        }

        .form-section {
            padding: 0.8rem;
        }

        .form-section h3 {
            font-size: 0.8rem;
        }

        .register-footer p {
            font-size: 0.5rem;
        }
    }
</style>

</html>