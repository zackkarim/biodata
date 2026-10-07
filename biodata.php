<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dzaky Alfarizi Karim — Web Developer & Pelajar RPL</title>
  
  <!-- Security & Privacy Meta -->
  <meta http-equiv="X-Content-Type-Options" content="nosniff">
  <meta name="referrer" content="strict-origin-when-cross-origin">

  <!-- Google Fonts (Inter & Plus Jakarta Sans) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --bg: #0a0d14;
      --card-bg: #111622;
      --card-border: #1e2638;
      --card-hover: #171f30;
      --accent: #3b82f6;
      --accent-glow: rgba(59, 130, 246, 0.25);
      --accent-light: #60a5fa;
      --text-main: #f3f4f6;
      --text-muted: #94a3b8;
      --text-dim: #64748b;
      --badge-bg: #192233;
      --nav-bg: rgba(10, 13, 20, 0.85);
      --font-main: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
      --font-mono: 'JetBrains Mono', monospace;
      --radius: 14px;
      --radius-sm: 8px;
      --transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html {
      scroll-behavior: smooth;
      scroll-padding-top: 86px;
    }

    body {
      background-color: var(--bg);
      color: var(--text-main);
      font-family: var(--font-main);
      line-height: 1.6;
      overflow-x: hidden;
      background-image: 
        radial-gradient(circle at 15% 20%, rgba(59, 130, 246, 0.08) 0%, transparent 40%),
        radial-gradient(circle at 85% 65%, rgba(99, 102, 241, 0.06) 0%, transparent 40%);
      background-attachment: fixed;
    }

    /* Scrollbar */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb { background: #242f45; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #3b4c6e; }

    /* Container */
    .container {
      width: 100%;
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 24px;
    }

    /* Navbar */
    header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 100;
      background: var(--nav-bg);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-bottom: 1px solid var(--card-border);
      transition: var(--transition);
    }

    nav {
      height: 72px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .brand {
      font-size: 1.15rem;
      font-weight: 800;
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
      letter-spacing: -0.5px;
    }

    .brand span {
      color: var(--accent);
    }

    .nav-menu {
      display: flex;
      align-items: center;
      list-style: none;
      gap: 24px;
    }

    .nav-link {
      color: var(--text-muted);
      text-decoration: none;
      font-size: 0.92rem;
      font-weight: 500;
      transition: var(--transition);
      position: relative;
      padding: 6px 0;
    }

    .nav-link:hover, .nav-link.active {
      color: #fff;
    }

    .nav-link.active::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 2px;
      background: var(--accent);
      border-radius: 2px;
    }

    .nav-btn {
      background: var(--accent);
      color: #fff;
      font-weight: 600;
      font-size: 0.88rem;
      padding: 9px 18px;
      border-radius: var(--radius-sm);
      text-decoration: none;
      transition: var(--transition);
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .nav-btn:hover {
      background: var(--accent-light);
      box-shadow: 0 4px 14px var(--accent-glow);
      transform: translateY(-1px);
    }

    /* Mobile toggle */
    .menu-toggle {
      display: none;
      background: none;
      border: 1px solid var(--card-border);
      border-radius: var(--radius-sm);
      width: 40px;
      height: 40px;
      cursor: pointer;
      color: #fff;
      padding: 8px;
      flex-direction: column;
      justify-content: center;
      gap: 5px;
    }

    .menu-toggle span {
      display: block;
      width: 100%;
      height: 2px;
      background: var(--text-main);
      border-radius: 2px;
      transition: var(--transition);
    }

    /* Hero Section */
    .hero {
      padding: 150px 0 80px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 48px;
    }

    .hero-content {
      flex: 1;
      max-width: 620px;
    }

    .badge-status {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(59, 130, 246, 0.1);
      border: 1px solid rgba(59, 130, 246, 0.25);
      color: var(--accent-light);
      padding: 6px 14px;
      border-radius: 50px;
      font-size: 0.82rem;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .status-dot {
      width: 8px;
      height: 8px;
      background: #22c55e;
      border-radius: 50%;
      box-shadow: 0 0 10px #22c55e;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.6; transform: scale(1.15); }
    }

    .hero-title {
      font-size: 2.8rem;
      font-weight: 800;
      letter-spacing: -1.2px;
      line-height: 1.2;
      margin-bottom: 16px;
      color: #fff;
    }

    .hero-title .highlight {
      background: linear-gradient(90deg, #60a5fa, #a855f7);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .hero-desc {
      font-size: 1.08rem;
      color: var(--text-muted);
      line-height: 1.7;
      margin-bottom: 32px;
    }

    .hero-actions {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 12px 24px;
      border-radius: var(--radius-sm);
      font-weight: 600;
      font-size: 0.95rem;
      text-decoration: none;
      transition: var(--transition);
      cursor: pointer;
    }

    .btn-primary {
      background: var(--accent);
      color: #fff;
      border: 1px solid transparent;
      box-shadow: 0 4px 16px var(--accent-glow);
    }

    .btn-primary:hover {
      background: var(--accent-light);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    .btn-secondary {
      background: var(--card-bg);
      color: var(--text-main);
      border: 1px solid var(--card-border);
    }

    .btn-secondary:hover {
      background: var(--card-hover);
      border-color: #2e3a54;
      transform: translateY(-2px);
    }

    /* Hero Avatar */
    .hero-avatar {
      flex-shrink: 0;
      position: relative;
    }

    .avatar-wrapper {
      width: 230px;
      height: 230px;
      border-radius: 50%;
      padding: 6px;
      background: linear-gradient(135deg, rgba(59, 130, 246, 0.4), rgba(168, 85, 247, 0.2));
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.5);
      position: relative;
    }

    .avatar-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center 20%;
      border-radius: 50%;
      background: var(--card-bg);
      display: block;
      transition: var(--transition);
    }

    .avatar-wrapper:hover .avatar-img {
      transform: scale(1.03);
    }

    /* Section Global */
    section {
      padding: 70px 0;
    }

    .section-header {
      margin-bottom: 40px;
    }

    .section-tag {
      font-family: var(--font-mono);
      font-size: 0.8rem;
      color: var(--accent);
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 6px;
    }

    .section-title {
      font-size: 2rem;
      font-weight: 800;
      letter-spacing: -0.8px;
      color: #fff;
    }

    /* About Grid */
    .about-grid {
      display: grid;
      grid-template-columns: 1.2fr 1fr;
      gap: 24px;
    }

    .card {
      background: var(--card-bg);
      border: 1px solid var(--card-border);
      border-radius: var(--radius);
      padding: 28px;
      transition: var(--transition);
    }

    .card:hover {
      border-color: #2b374e;
      background: var(--card-hover);
    }

    .info-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .info-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-bottom: 12px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .info-item:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .info-label {
      font-size: 0.88rem;
      color: var(--text-dim);
      font-weight: 500;
    }

    .info-value {
      font-size: 0.95rem;
      font-weight: 600;
      color: #fff;
    }

    .skills-wrap {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 14px;
    }

    .skill-chip {
      background: var(--badge-bg);
      border: 1px solid var(--card-border);
      color: var(--text-main);
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 0.88rem;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: var(--transition);
    }

    .skill-chip:hover {
      border-color: var(--accent);
      background: rgba(59, 130, 246, 0.1);
      transform: translateY(-2px);
    }

    /* Project Filter */
    .filter-bar {
      display: flex;
      gap: 10px;
      margin-bottom: 28px;
      flex-wrap: wrap;
    }

    .filter-btn {
      background: var(--card-bg);
      border: 1px solid var(--card-border);
      color: var(--text-muted);
      padding: 8px 16px;
      border-radius: 8px;
      font-size: 0.86rem;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
    }

    .filter-btn:hover, .filter-btn.active {
      background: var(--accent);
      border-color: var(--accent);
      color: #fff;
    }

    /* Projects Grid */
    .projects-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 22px;
    }

    .project-card {
      background: var(--card-bg);
      border: 1px solid var(--card-border);
      border-radius: var(--radius);
      padding: 24px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: var(--transition);
      position: relative;
    }

    .project-card:hover {
      border-color: #3b82f6;
      transform: translateY(-4px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
    }

    .project-head {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 14px;
    }

    .project-icon {
      font-size: 1.6rem;
      width: 44px;
      height: 44px;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.04);
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .project-tag {
      font-size: 0.75rem;
      font-weight: 600;
      padding: 4px 10px;
      border-radius: 6px;
      background: rgba(59, 130, 246, 0.1);
      color: var(--accent-light);
      border: 1px solid rgba(59, 130, 246, 0.2);
    }

    .project-title {
      font-size: 1.15rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 8px;
    }

    .project-desc {
      font-size: 0.9rem;
      color: var(--text-muted);
      line-height: 1.55;
      margin-bottom: 18px;
      flex-grow: 1;
    }

    .project-stack {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      margin-bottom: 20px;
    }

    .stack-badge {
      font-size: 0.75rem;
      font-family: var(--font-mono);
      background: rgba(255, 255, 255, 0.04);
      color: #cbd5e1;
      padding: 3px 8px;
      border-radius: 4px;
      border: 1px solid rgba(255, 255, 255, 0.07);
    }

    .project-link-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      color: var(--accent-light);
      text-decoration: none;
      font-weight: 600;
      font-size: 0.88rem;
      transition: var(--transition);
      padding-top: 14px;
      border-top: 1px solid rgba(255, 255, 255, 0.06);
    }

    .project-link-btn:hover {
      color: #fff;
      transform: translateX(3px);
    }

    /* Education Timeline */
    .timeline {
      display: flex;
      flex-direction: column;
      gap: 16px;
      position: relative;
    }

    .timeline-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 24px;
      background: var(--card-bg);
      border: 1px solid var(--card-border);
      border-radius: var(--radius);
      transition: var(--transition);
    }

    .timeline-item:hover {
      border-color: #2b374e;
      background: var(--card-hover);
    }

    .timeline-school {
      font-size: 1.05rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 4px;
    }

    .timeline-detail {
      font-size: 0.85rem;
      color: var(--text-muted);
    }

    .timeline-period {
      font-family: var(--font-mono);
      font-size: 0.82rem;
      color: var(--accent-light);
      background: rgba(59, 130, 246, 0.08);
      border: 1px solid rgba(59, 130, 246, 0.2);
      padding: 4px 12px;
      border-radius: 50px;
      white-space: nowrap;
    }

    /* Contact Grid */
    .contact-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 16px;
    }

    .contact-card {
      background: var(--card-bg);
      border: 1px solid var(--card-border);
      border-radius: var(--radius);
      padding: 20px;
      text-decoration: none;
      color: inherit;
      display: flex;
      flex-direction: column;
      gap: 8px;
      transition: var(--transition);
      cursor: pointer;
    }

    .contact-card:hover {
      border-color: var(--accent);
      background: var(--card-hover);
      transform: translateY(-3px);
    }

    .contact-icon {
      font-size: 1.5rem;
      margin-bottom: 4px;
    }

    .contact-label {
      font-size: 0.78rem;
      color: var(--text-dim);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .contact-val {
      font-size: 0.95rem;
      font-weight: 600;
      color: #fff;
      word-break: break-all;
    }

    /* Toast Notification */
    .toast {
      position: fixed;
      bottom: 28px;
      right: 28px;
      background: #1e293b;
      color: #fff;
      border: 1px solid var(--accent);
      padding: 12px 20px;
      border-radius: 8px;
      font-size: 0.9rem;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.4);
      opacity: 0;
      pointer-events: none;
      transform: translateY(16px);
      transition: var(--transition);
      z-index: 999;
    }

    .toast.show {
      opacity: 1;
      pointer-events: auto;
      transform: translateY(0);
    }

    /* Footer */
    footer {
      border-top: 1px solid var(--card-border);
      padding: 40px 0;
      text-align: center;
      font-size: 0.88rem;
      color: var(--text-dim);
      margin-top: 40px;
    }

    footer a {
      color: var(--accent-light);
      text-decoration: none;
    }

    /* Responsive */
    @media (max-width: 860px) {
      .hero {
        flex-direction: column-reverse;
        text-align: center;
        padding-top: 120px;
        gap: 32px;
      }

      .hero-content {
        max-width: 100%;
      }

      .hero-actions {
        justify-content: center;
      }

      .about-grid {
        grid-template-columns: 1fr;
      }

      .menu-toggle {
        display: flex;
      }

      .nav-menu {
        position: fixed;
        top: 72px;
        left: 0;
        right: 0;
        background: var(--bg);
        border-bottom: 1px solid var(--card-border);
        flex-direction: column;
        padding: 24px;
        gap: 16px;
        transform: translateY(-150%);
        transition: var(--transition);
        box-shadow: 0 16px 30px rgba(0,0,0,0.5);
      }

      .nav-menu.open {
        transform: translateY(0);
      }

      .nav-btn {
        display: none;
      }
    }

    @media (max-width: 580px) {
      .hero-title {
        font-size: 2.1rem;
      }
      .avatar-wrapper {
        width: 170px;
        height: 170px;
      }
      .timeline-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
      }
    }
  </style>
</head>
<body>

  <!-- Header / Navigation -->
  <header>
    <div class="container">
      <nav>
        <a href="#home" class="brand">Dzaky<span>.dev</span></a>
        
        <ul class="nav-menu" id="navMenu">
          <li><a href="#home" class="nav-link active">Beranda</a></li>
          <li><a href="#about" class="nav-link">Tentang</a></li>
          <li><a href="#projects" class="nav-link">Projek</a></li>
          <li><a href="#education" class="nav-link">Pendidikan</a></li>
          <li><a href="#contact" class="nav-link">Kontak</a></li>
        </ul>

        <a href="#contact" class="nav-btn">Hubungi Saya ↗</a>

        <button class="menu-toggle" id="menuToggle" aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero" id="home">
    <div class="container" style="display: contents;">
      <div class="hero-content">
        <div class="badge-status">
          <span class="status-dot"></span> Terbuka untuk Kolaborasi &amp; Belajar
        </div>
        <h1 class="hero-title">
          Halo, saya <span class="highlight">Dzaky Alfarizi Karim</span>
        </h1>
        <p class="hero-desc">
          Pelajar SMK Jurusan Rekayasa Perangkat Lunak (RPL). Senang mengembangkan aplikasi web fungsional, mempelajari arsitektur kode bersih, serta mengeksplorasi teknologi baru.
        </p>
        <div class="hero-actions">
          <a href="#projects" class="btn btn-primary">Lihat Projek Portofolio</a>
          <a href="#contact" class="btn btn-secondary">Hubungi Saya</a>
        </div>
      </div>

      <div class="hero-avatar">
        <div class="avatar-wrapper">
          <img src="img/zack.png" alt="Dzaky Alfarizi Karim" class="avatar-img">
        </div>
      </div>
    </div>
  </section>

  <!-- About & Skills Section -->
  <section id="about">
    <div class="container">
      <div class="section-header">
        <div class="section-tag">// Ringkasan Profil</div>
        <h2 class="section-title">Tentang Saya</h2>
      </div>

      <div class="about-grid">
        <!-- Biodata Card -->
        <div class="card">
          <h3 style="font-size: 1.15rem; color: #fff; margin-bottom: 20px;">Informasi Pribadi</h3>
          <div class="info-list">
            <div class="info-item">
              <span class="info-label">Nama Lengkap</span>
              <span class="info-value">Dzaky Alfarizi Karim</span>
            </div>
            <div class="info-item">
              <span class="info-label">Bidang Keahlian</span>
              <span class="info-value">Rekayasa Perangkat Lunak (RPL)</span>
            </div>
            <div class="info-item">
              <span class="info-label">Status</span>
              <span class="info-value">Pelajar Aktif</span>
            </div>
            <div class="info-item">
              <span class="info-label">Domisili</span>
              <span class="info-value">Medan, Sumatera Utara</span>
            </div>
            <div class="info-item">
              <span class="info-label">Minat Utama</span>
              <span class="info-value">Web Development &amp; Software Logic</span>
            </div>
          </div>
        </div>

        <!-- Tech Stack Card -->
        <div class="card">
          <h3 style="font-size: 1.15rem; color: #fff; margin-bottom: 8px;">Keahlian &amp; Teknologi</h3>
          <p style="font-size: 0.88rem; color: var(--text-muted); margin-bottom: 16px;">
            Bahasa pemrograman dan peralatan yang biasa saya gunakan:
          </p>
          <div class="skills-wrap">
            <span class="skill-chip">🐘 PHP</span>
            <span class="skill-chip">🐬 MySQL</span>
            <span class="skill-chip">⚡ JavaScript</span>
            <span class="skill-chip">🐍 Python</span>
            <span class="skill-chip">🌐 HTML5 &amp; CSS3</span>
            <span class="skill-chip">🎨 Bootstrap</span>
            <span class="skill-chip">🐙 Git &amp; GitHub</span>
            <span class="skill-chip">💻 OOP Programming</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Projects Section with Filter -->
  <section id="projects">
    <div class="container">
      <div class="section-header">
        <div class="section-tag">// Showcase Projek</div>
        <h2 class="section-title">Projek Pilihan</h2>
      </div>

      <!-- Filter Interaktif -->
      <div class="filter-bar">
        <button class="filter-btn active" data-filter="all">Semua Projek (8)</button>
        <button class="filter-btn" data-filter="php">PHP &amp; Database</button>
        <button class="filter-btn" data-filter="js">JavaScript &amp; API</button>
        <button class="filter-btn" data-filter="other">Python &amp; AI</button>
      </div>

      <div class="projects-grid" id="projectGrid">

        <!-- PRJ-01 -->
        <div class="project-card" data-category="php">
          <div>
            <div class="project-head">
              <div class="project-icon">🍽️</div>
              <span class="project-tag">Web App</span>
            </div>
            <h3 class="project-title">Dapur Tyas</h3>
            <p class="project-desc">Aplikasi Point of Sale (POS) dan pemesanan makanan berbasis web dengan fitur multi-role, pencatatan transaksi, dan cetak struk.</p>
            <div class="project-stack">
              <span class="stack-badge">PHP</span>
              <span class="stack-badge">MySQL</span>
              <span class="stack-badge">Bootstrap</span>
            </div>
          </div>
          <a href="../dapur_tyas/" target="_blank" rel="noopener noreferrer" class="project-link-btn">
            Buka Projek <span>↗</span>
          </a>
        </div>

        <!-- PRJ-02 -->
        <div class="project-card" data-category="php">
          <div>
            <div class="project-head">
              <div class="project-icon">💳</div>
              <span class="project-tag">Web App</span>
            </div>
            <h3 class="project-title">Aplikasi Perbankan</h3>
            <p class="project-desc">Simulasi perbankan digital dengan mutasi rekening, transfer saldo antar nasabah, autentikasi terenkripsi, dan top-up voucher.</p>
            <div class="project-stack">
              <span class="stack-badge">PHP</span>
              <span class="stack-badge">MySQL</span>
              <span class="stack-badge">CSS3</span>
            </div>
          </div>
          <a href="../aplikasi_perbankan/" target="_blank" rel="noopener noreferrer" class="project-link-btn">
            Buka Projek <span>↗</span>
          </a>
        </div>

        <!-- PRJ-03 -->
        <div class="project-card" data-category="php">
          <div>
            <div class="project-head">
              <div class="project-icon">📁</div>
              <span class="project-tag">MVC Architecture</span>
            </div>
            <h3 class="project-title">SIPAS (Arsip Surat)</h3>
            <p class="project-desc">Sistem informasi pengarsipan surat digital berbasis MVC. Manajemen surat masuk &amp; keluar, penomoran otomatis, dan upload dokumen.</p>
            <div class="project-stack">
              <span class="stack-badge">PHP MVC</span>
              <span class="stack-badge">MySQL</span>
              <span class="stack-badge">Bootstrap</span>
            </div>
          </div>
          <a href="../SIPAS_PROJEK/" target="_blank" rel="noopener noreferrer" class="project-link-btn">
            Buka Projek <span>↗</span>
          </a>
        </div>

        <!-- PRJ-04 -->
        <div class="project-card" data-category="js">
          <div>
            <div class="project-head">
              <div class="project-icon">📖</div>
              <span class="project-tag">API Integration</span>
            </div>
            <h3 class="project-title">Al-Qur'an Digital</h3>
            <p class="project-desc">Aplikasi Al-Qur'an digital interaktif dengan teks Arab, terjemahan bahasa Indonesia, navigasi surah, serta pemutar audio murottal.</p>
            <div class="project-stack">
              <span class="stack-badge">JavaScript</span>
              <span class="stack-badge">REST API</span>
              <span class="stack-badge">Audio API</span>
            </div>
          </div>
          <a href="../al_qur'an_digital/" target="_blank" rel="noopener noreferrer" class="project-link-btn">
            Buka Projek <span>↗</span>
          </a>
        </div>

        <!-- PRJ-05 -->
        <div class="project-card" data-category="js">
          <div>
            <div class="project-head">
              <div class="project-icon">🎬</div>
              <span class="project-tag">Dashboard</span>
            </div>
            <h3 class="project-title">AniTrack</h3>
            <p class="project-desc">Portal pelacak daftar tontonan dengan fitur pencarian serial anime, penanda status tayangan, rating pengguna, dan ringkasan episode.</p>
            <div class="project-stack">
              <span class="stack-badge">JavaScript</span>
              <span class="stack-badge">Anime API</span>
              <span class="stack-badge">Glassmorphism</span>
            </div>
          </div>
          <a href="../anitrack/" target="_blank" rel="noopener noreferrer" class="project-link-btn">
            Buka Projek <span>↗</span>
          </a>
        </div>

        <!-- PRJ-06 -->
        <div class="project-card" data-category="php">
          <div>
            <div class="project-head">
              <div class="project-icon">🏎️</div>
              <span class="project-tag">Clean Code OOP</span>
            </div>
            <h3 class="project-title">Garasi Mobil OOP</h3>
            <p class="project-desc">Implementasi komprehensif paradigma Object-Oriented Programming (OOP) dalam pengelolaan dan simulasi armada kendaraan.</p>
            <div class="project-stack">
              <span class="stack-badge">PHP OOP</span>
              <span class="stack-badge">Classes</span>
              <span class="stack-badge">Inheritance</span>
            </div>
          </div>
          <a href="../garasi-mobil-oop/" target="_blank" rel="noopener noreferrer" class="project-link-btn">
            Buka Projek <span>↗</span>
          </a>
        </div>

        <!-- PRJ-07 -->
        <div class="project-card" data-category="php">
          <div>
            <div class="project-head">
              <div class="project-icon">🏪</div>
              <span class="project-tag">Inventory System</span>
            </div>
            <h3 class="project-title">Minimarket Sederhana</h3>
            <p class="project-desc">Aplikasi inventaris dan kasir retail dengan manajemen kategori produk, pemantauan stok otomatis, dan pencatatan kasir.</p>
            <div class="project-stack">
              <span class="stack-badge">PHP Native</span>
              <span class="stack-badge">MySQL</span>
              <span class="stack-badge">CSS3</span>
            </div>
          </div>
          <a href="../minimarket_sederhana/" target="_blank" rel="noopener noreferrer" class="project-link-btn">
            Buka Projek <span>↗</span>
          </a>
        </div>

        <!-- PRJ-08 -->
        <div class="project-card" data-category="other">
          <div>
            <div class="project-head">
              <div class="project-icon">👤</div>
              <span class="project-tag">AI &amp; Vision</span>
            </div>
            <h3 class="project-title">Tugas FaceScan AI</h3>
            <p class="project-desc">Eksperimen Computer Vision dan pemindaian wajah real-time dengan pengolahan citra digital untuk deteksi landmark wajah otomatis.</p>
            <div class="project-stack">
              <span class="stack-badge">Python</span>
              <span class="stack-badge">OpenCV</span>
              <span class="stack-badge">Computer Vision</span>
            </div>
          </div>
          <a href="../tugas_facescan/" target="_blank" rel="noopener noreferrer" class="project-link-btn">
            Buka Direktori <span>↗</span>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- Education Timeline -->
  <section id="education">
    <div class="container">
      <div class="section-header">
        <div class="section-tag">// Rekam Jejak</div>
        <h2 class="section-title">Riwayat Pendidikan</h2>
      </div>

      <div class="timeline">
        <div class="timeline-item">
          <div>
            <div class="timeline-school">SMK Jurusan Rekayasa Perangkat Lunak (RPL)</div>
            <div class="timeline-detail">Fokus: Web Development, Algoritma Pemrograman, dan Database Management</div>
          </div>
          <span class="timeline-period">Sekarang (Aktif)</span>
        </div>

        <div class="timeline-item">
          <div>
            <div class="timeline-school">SMP Annur Prima</div>
            <div class="timeline-detail">Sekolah Menengah Pertama</div>
          </div>
          <span class="timeline-period">2023 – 2025</span>
        </div>

        <div class="timeline-item">
          <div>
            <div class="timeline-school">Madrasah</div>
            <div class="timeline-detail">Pendidikan Tingkat Menengah Pertama</div>
          </div>
          <span class="timeline-period">2019 – 2021</span>
        </div>

        <div class="timeline-item">
          <div>
            <div class="timeline-school">SD Negeri 69</div>
            <div class="timeline-detail">Pendidikan Sekolah Dasar</div>
          </div>
          <span class="timeline-period">2017 – 2022</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact">
    <div class="container">
      <div class="section-header">
        <div class="section-tag">// Terhubung</div>
        <h2 class="section-title">Hubungi Saya</h2>
      </div>

      <div class="contact-grid">
        <!-- Email Copy Card -->
        <div class="contact-card" id="emailCard" title="Klik untuk menyalin alamat email">
          <div class="contact-icon">✉️</div>
          <div class="contact-label">Email (Klik untuk Salin)</div>
          <div class="contact-val">dzakykarem@gmail.com</div>
        </div>

        <!-- WhatsApp -->
        <a class="contact-card" href="https://wa.me/6288201709364" target="_blank" rel="noopener noreferrer">
          <div class="contact-icon">💬</div>
          <div class="contact-label">WhatsApp</div>
          <div class="contact-val">+62 882-0170-9364</div>
        </a>

        <!-- Instagram -->
        <a class="contact-card" href="https://www.instagram.com/zack_thesigmaboy?stkn=enkzcTk4cnd1MzMz" target="_blank" rel="noopener noreferrer">
          <div class="contact-icon">📸</div>
          <div class="contact-label">Instagram</div>
          <div class="contact-val">@zack_thesigmaboy</div>
        </a>

        <!-- TikTok -->
        <a class="contact-card" href="https://www.tiktok.com/@bang_zack27boom?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener noreferrer">
          <div class="contact-icon">🎵</div>
          <div class="contact-label">TikTok</div>
          <div class="contact-val">@bang_zack27boom</div>
        </a>

        <!-- Lokasi -->
        <div class="contact-card" style="cursor: default;">
          <div class="contact-icon">📍</div>
          <div class="contact-label">Domisili</div>
          <div class="contact-val">Medan, Sumatera Utara</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Toast Notification -->
  <div class="toast" id="toastBox">
    <span>✓</span> Email berhasil disalin ke clipboard!
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p>&copy; <span id="currentYear"></span> <strong>Dzaky Alfarizi Karim</strong>. Dibuat dengan HTML, CSS, dan JavaScript murni.</p>
    </div>
  </footer>

  <script>
    // Tahun Otomatis di Footer
    document.getElementById('currentYear').textContent = new Date().getFullYear();

    // Responsive Mobile Menu
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');
    menuToggle.addEventListener('click', () => {
      navMenu.classList.toggle('open');
    });

    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('open');
      });
    });

    // Active Nav Indicator on Scroll
    const sections = document.querySelectorAll('section[id]');
    window.addEventListener('scroll', () => {
      const scrollY = window.pageYOffset + 120;
      sections.forEach(sec => {
        const top = sec.offsetTop;
        const height = sec.offsetHeight;
        const id = sec.getAttribute('id');
        if (scrollY >= top && scrollY < top + height) {
          document.querySelectorAll('.nav-link').forEach(a => {
            a.classList.toggle('active', a.getAttribute('href') === '#' + id);
          });
        }
      });
    });

    // Interactive Project Filter
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filter = btn.dataset.filter;
        projectCards.forEach(card => {
          if (filter === 'all' || card.dataset.category === filter) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });

    // Interactive Copy Email with Toast Feedback
    const emailCard = document.getElementById('emailCard');
    const toastBox = document.getElementById('toastBox');

    emailCard.addEventListener('click', () => {
      const email = 'dzakykarem@gmail.com';
      if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(email).then(showToast);
      } else {
        const tempInput = document.createElement('input');
        tempInput.value = email;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        showToast();
      }
    });

    function showToast() {
      toastBox.classList.add('show');
      setTimeout(() => {
        toastBox.classList.remove('show');
      }, 2500);
    }
  </script>
</body>
</html>