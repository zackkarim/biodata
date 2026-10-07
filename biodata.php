<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>ZK//SYSTEM — Dzaky Alfarizi Karim</title>

<!-- Security & Privacy Meta -->
<meta http-equiv="X-Content-Type-Options" content="nosniff">
<meta name="referrer" content="strict-origin-when-cross-origin">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&family=Rajdhani:wght@400;500;600;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
<style>
:root{
  /* Skema Warna: Sleek Dark Sapphire & Slate (Elegan, Sejuk, Tidak Menyilaukan) */
  --void:#080c14;
  --panel:#0f1626;
  --panel-2:#151f33;
  --cyan:#38bdf8;          /* Ice Blue / Sky sejuk pengganti cyan neon */
  --accent:#3b82f6;        /* Modern Sapphire Blue */
  --accent-light:#60a5fa;
  --magenta:#818cf8;       /* Indigo Lavender sejuk pengganti pink neon */
  --violet:#6366f1;        /* Modern Indigo */
  --gold:#f59e0b;          /* Amber hangat pengganti kuning menyengat */
  --ghost:#8896b3;         /* Muted Slate Text */
  --text:#f1f5f9;          /* Crisp White Text */
  --line:rgba(59,130,246,0.18);
  --line-subtle:rgba(148,163,184,0.12);
}
*{margin:0;padding:0;box-sizing:border-box;}
html{
  scroll-behavior:smooth;
  scroll-padding-top:82px;
}
body{
  background:var(--void);
  color:var(--text);
  font-family:'Rajdhani',sans-serif;
  overflow-x:hidden;
  position:relative;
  -webkit-tap-highlight-color:transparent;
}
::selection{background:var(--accent);color:#fff;}

/* scrollbar */
::-webkit-scrollbar{width:8px;}
::-webkit-scrollbar-track{background:var(--void);}
::-webkit-scrollbar-thumb{background:#1e293b;border-radius:6px;}
::-webkit-scrollbar-thumb:hover{background:#334155;}

/* ===== CANVAS BACKGROUND ===== */
#bgCanvas{
  position:fixed; inset:0; width:100%; height:100%;
  z-index:0; opacity:0.65; pointer-events:none;
}
.grid-overlay{
  position:fixed; inset:0; z-index:1; pointer-events:none;
  background-image:
    linear-gradient(rgba(59,130,246,0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(59,130,246,0.04) 1px, transparent 1px);
  background-size:42px 42px;
  mask-image:radial-gradient(ellipse 80% 60% at 50% 0%, black 40%, transparent 90%);
  -webkit-mask-image:radial-gradient(ellipse 80% 60% at 50% 0%, black 40%, transparent 90%);
}
.vignette{
  position:fixed; inset:0; z-index:1; pointer-events:none;
  box-shadow:inset 0 0 200px rgba(0,0,0,0.85);
}
.scanline{
  position:fixed; inset:0; z-index:2; pointer-events:none; opacity:0.02;
  background:repeating-linear-gradient(0deg, #fff 0px, transparent 1px, transparent 3px);
}

/* ===== NAV ===== */
nav{
  position:fixed; top:0; left:0; right:0; z-index:100;
  display:flex; align-items:center; justify-content:space-between;
  padding:16px 6vw;
  backdrop-filter:blur(16px);
  -webkit-backdrop-filter:blur(16px);
  background:rgba(8,12,20,0.88);
  border-bottom:1px solid var(--line-subtle);
  transition:all .3s ease;
}
.logo{
  font-family:'Orbitron',sans-serif; font-weight:900; font-size:1.1rem;
  letter-spacing:2px; color:#fff; text-decoration:none;
  display:inline-flex; align-items:center;
}
.logo span{color:var(--accent); text-shadow:0 0 10px rgba(59,130,246,0.4);}
.navlinks{display:flex; gap:2.2rem; list-style:none; align-items:center;}
.navlinks a{
  color:var(--ghost); text-decoration:none; font-weight:600; font-size:0.85rem;
  letter-spacing:2px; text-transform:uppercase; position:relative;
  transition:color .25s ease;
}
.navlinks a::after{
  content:''; position:absolute; left:0; bottom:-6px; width:0; height:2px;
  background:linear-gradient(90deg,var(--cyan),var(--accent));
  transition:width .3s cubic-bezier(0.16, 1, 0.3, 1);
  box-shadow:0 0 8px rgba(59,130,246,0.5);
}
.navlinks a:hover, .navlinks a.active{color:#fff;}
.navlinks a:hover::after, .navlinks a.active::after{width:100%;}

/* Hamburger toggle for mobile */
.nav-toggle{
  display:none;
  background:transparent;
  border:1px solid var(--line-subtle);
  border-radius:6px;
  width:40px; height:40px;
  cursor:pointer;
  flex-direction:column;
  align-items:center;
  justify-content:center;
  gap:5px;
  padding:0;
  transition:all .3s ease;
  z-index:101;
}
.nav-toggle:hover{
  border-color:var(--accent);
  box-shadow:0 0 10px rgba(59,130,246,0.25);
}
.nav-toggle span{
  display:block; width:20px; height:2px;
  background:var(--accent);
  border-radius:2px;
  transition:transform .3s cubic-bezier(0.16, 1, 0.3, 1), opacity .25s ease;
}
.nav-toggle.open span:nth-child(1){
  transform:translateY(7px) rotate(45deg);
}
.nav-toggle.open span:nth-child(2){
  opacity:0;
}
.nav-toggle.open span:nth-child(3){
  transform:translateY(-7px) rotate(-45deg);
}

.nav-backdrop{
  display:none;
}

@media(max-width:820px){
  .nav-toggle{ display:flex; }
  .nav-backdrop{
    display:block;
    position:fixed; inset:0; background:rgba(0,0,0,0.65);
    backdrop-filter:blur(4px);
    -webkit-backdrop-filter:blur(4px);
    opacity:0; pointer-events:none;
    transition:opacity .35s ease;
    z-index:98;
  }
  .nav-backdrop.open{
    opacity:1; pointer-events:auto;
  }
  .navlinks{
    position:fixed;
    top:0; right:0; width:100%; max-width:300px; height:100vh;
    background:rgba(11,16,27,0.98);
    backdrop-filter:blur(22px);
    -webkit-backdrop-filter:blur(22px);
    border-left:1px solid var(--line-subtle);
    flex-direction:column;
    justify-content:center;
    align-items:flex-start;
    gap:1.6rem;
    padding:40px 36px;
    transform:translateX(100%);
    transition:transform .38s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow:-15px 0 50px rgba(0,0,0,0.85);
    z-index:99;
  }
  .navlinks.open{
    transform:translateX(0);
  }
  .navlinks a{
    font-size:1.05rem;
    letter-spacing:3px;
    display:inline-block;
    padding:6px 0;
  }
}

/* ===== SECTION BASE ===== */
section{
  position:relative; z-index:5; padding:130px 6vw 90px; max-width:1300px; margin:0 auto;
}
@media(max-width:992px){
  section{ padding:100px 5vw 70px; }
}
@media(max-width:640px){
  section{ padding:75px 4vw 45px; }
}
.eyebrow{
  font-family:'Share Tech Mono', monospace; color:var(--accent-light); font-size:0.8rem;
  letter-spacing:4px; text-transform:uppercase; margin-bottom:14px;
  display:flex; align-items:center; gap:10px;
}
.eyebrow::before{content:'//'; color:var(--cyan);}
.sec-title{
  font-family:'Orbitron',sans-serif; font-weight:900; font-size:clamp(1.7rem,4vw,3rem);
  color:#fff; margin-bottom:45px; text-transform:uppercase; letter-spacing:1px;
}
@media(max-width:640px){
  .sec-title{ font-size:clamp(1.5rem, 6.5vw, 2.2rem); margin-bottom:28px; }
  .eyebrow{ font-size:0.75rem; letter-spacing:3px; margin-bottom:10px; }
}

/* ===== HERO ===== */
.hero{
  min-height:100vh; display:flex; flex-direction:column; align-items:center; justify-content:center;
  text-align:center; padding:120px 5vw 80px; position:relative;
}
.aura-frame{
  position:relative; width:190px; height:190px; margin-bottom:34px;
  display:flex; align-items:center; justify-content:center;
  transition:all .3s ease;
}
.aura-ring{
  position:absolute; inset:0; border-radius:50%;
  border:2px solid transparent;
  background:conic-gradient(from 0deg, var(--accent), var(--cyan), var(--violet), var(--accent)) border-box;
  -webkit-mask:linear-gradient(#000 0 0) padding-box, linear-gradient(#000 0 0);
  -webkit-mask-composite:xor; mask-composite:exclude;
  animation:spin 8s linear infinite;
  filter:drop-shadow(0 0 10px rgba(59,130,246,0.4));
}
.aura-ring.r2{ inset:-14px; animation-duration:12s; animation-direction:reverse; opacity:0.5; }
@keyframes spin{ to{ transform:rotate(360deg); } }
.avatar-core{
  width:150px; height:150px; border-radius:50%;
  background:radial-gradient(circle at 35% 30%, #17233d, #080c14 75%);
  display:flex; align-items:center; justify-content:center;
  font-family:'Orbitron',sans-serif; font-weight:900; font-size:2.6rem;
  color:#fff; text-shadow:0 0 14px rgba(59,130,246,0.4);
  box-shadow:0 0 30px rgba(59,130,246,0.25), inset 0 0 20px rgba(56,189,248,0.15);
  animation:pulseAura 3.2s ease-in-out infinite;
  z-index:2;
  overflow:hidden;
  position:relative;
  transition:all .3s ease;
}
.avatar-img{
  width:100%; height:100%;
  object-fit:cover;
  object-position:center 20%;
  border-radius:50%;
  display:block;
  transition:transform .4s ease, filter .4s ease;
}
.avatar-core:hover .avatar-img{
  transform:scale(1.06);
  filter:brightness(1.05);
}

/* ===== MINI BINI BADGES ===== */
.bini-badge{
  position:absolute; bottom:0; z-index:3;
  display:flex; flex-direction:column; align-items:center; gap:4px;
  animation:biniFloat 3s ease-in-out infinite;
}
.bini-badge.left{ left:-88px; }
.bini-badge.right{ right:-88px; }
.bini-badge.right .bini-circle{
  border-color:var(--cyan);
  box-shadow:0 0 12px rgba(56,189,248,0.35), 0 0 0 3px rgba(8,12,20,1);
}

.bini-circle{
  width:62px; height:62px; border-radius:50%; overflow:hidden;
  border:2px solid var(--accent-light);
  background:#0f1626; position:relative;
  box-shadow:0 0 12px rgba(59,130,246,0.35), 0 0 0 3px rgba(8,12,20,1);
}
.bini-img{ width:100%; height:100%; object-fit:cover; object-position:center 20%; display:block; border-radius:50%; }
@keyframes biniFloat{ 0%,100%{ transform:translateY(0); } 50%{ transform:translateY(-6px); } }
@keyframes pulseAura{
  0%,100%{ box-shadow:0 0 30px rgba(59,130,246,0.25), inset 0 0 20px rgba(56,189,248,0.15); }
  50%{ box-shadow:0 0 45px rgba(59,130,246,0.4), inset 0 0 28px rgba(99,102,241,0.2); }
}
.hero-tag{
  font-family:'Share Tech Mono',monospace; color:var(--gold); letter-spacing:5px;
  font-size:0.8rem; margin-bottom:18px; text-transform:uppercase;
}

/* Judul Hero: Bersih, Tajam, Berbayang Halus (Tidak Menyilaukan) */
h1.glitch{
  font-family:'Orbitron',sans-serif; font-weight:900; font-size:clamp(1.8rem,5.5vw,4.4rem);
  letter-spacing:2px; color:#fff; position:relative; line-height:1.15;
  text-shadow:0 4px 20px rgba(0,0,0,0.6);
  max-width:1000px;
}
h1.glitch span{ position:relative; display:inline-block; }
h1.glitch::before, h1.glitch::after{
  content:attr(data-text); position:absolute; left:0; top:0; width:100%; height:100%;
  overflow:hidden; color:#fff;
}
h1.glitch::before{
  left:1px; text-shadow:-1px 0 var(--magenta); clip-path:inset(0 0 55% 0);
  opacity:0.65;
  animation:glitchTop 4s infinite linear alternate-reverse;
}
h1.glitch::after{
  left:-1px; text-shadow:1px 0 var(--cyan); clip-path:inset(55% 0 0 0);
  opacity:0.65;
  animation:glitchBot 3.2s infinite linear alternate-reverse;
}
@keyframes glitchTop{ 0%{transform:translate(0,0);} 20%{transform:translate(-1px,-1px);} 40%{transform:translate(1px,0px);} 60%{transform:translate(0px,1px);} 80%{transform:translate(1px,-1px);} 100%{transform:translate(0,0);} }
@keyframes glitchBot{ 0%{transform:translate(0,0);} 25%{transform:translate(1px,1px);} 50%{transform:translate(-1px,0px);} 75%{transform:translate(1px,-1px);} 100%{transform:translate(0,0);} }

.hero-sub{
  margin-top:22px; font-size:1.15rem; color:var(--ghost); max-width:600px;
  font-weight:500; min-height:1.6em; line-height:1.6;
}
.hero-sub .cursor{ display:inline-block; width:9px; height:1.1em; background:var(--accent); margin-left:4px; vertical-align:middle; animation:blink 1s step-end infinite; }
@keyframes blink{ 50%{ opacity:0; } }

.hero-btns{ display:flex; gap:16px; margin-top:40px; flex-wrap:wrap; justify-content:center; }
.scroll-hint{
  position:absolute; bottom:30px; left:50%; transform:translateX(-50%);
  font-family:'Share Tech Mono',monospace; font-size:0.7rem; color:var(--ghost);
  letter-spacing:3px; display:flex; flex-direction:column; align-items:center; gap:8px;
}
.scroll-hint .bar{ width:1px; height:34px; background:linear-gradient(var(--accent),transparent); animation:scrollDown 1.8s infinite; }
@keyframes scrollDown{ 0%{ opacity:0; transform:scaleY(0); transform-origin:top;} 40%{opacity:1; transform:scaleY(1); transform-origin:top;} 100%{opacity:0; transform:scaleY(1); transform-origin:bottom;} }

@media(max-width:640px){
  .hero{ min-height:92vh; padding-top:80px; padding-bottom:60px; }
  .aura-frame{ width:155px; height:155px; margin-bottom:28px; }
  .aura-ring.r2{ inset:-10px; }
  .avatar-core{ width:125px; height:125px; }
  .bini-badge.left{ left:-38px; bottom:-14px; }
  .bini-badge.right{ right:-38px; bottom:-14px; }
  .bini-circle{ width:48px; height:48px; }
  .hero-tag{ font-size:0.72rem; letter-spacing:3px; margin-bottom:12px; }
  .hero-sub{ font-size:0.95rem; margin-top:14px; max-width:92%; }
  .hero-btns{ margin-top:26px; gap:10px; width:100%; max-width:320px; }
  .btn{ width:100%; justify-content:center; padding:13px 20px; font-size:0.72rem; }
  .scroll-hint{ bottom:14px; }
}

/* buttons */
.btn{
  font-family:'Orbitron',sans-serif; font-weight:700; font-size:0.75rem; letter-spacing:2px;
  text-transform:uppercase; padding:14px 28px; border-radius:6px; cursor:pointer;
  border:1px solid rgba(59,130,246,0.35); color:var(--accent-light); background:rgba(59,130,246,0.06);
  position:relative; overflow:hidden; text-decoration:none; display:inline-flex; align-items:center; gap:10px;
  transition:all .28s cubic-bezier(0.2, 0.8, 0.2, 1);
  -webkit-tap-highlight-color:transparent;
}
.btn.solid{
  background:linear-gradient(90deg, #2563eb, #3b82f6);
  color:#fff;
  border:none;
  box-shadow:0 4px 16px rgba(37,99,235,0.35);
}
.btn:hover{
  border-color:var(--accent);
  color:#fff;
  box-shadow:0 6px 20px rgba(59,130,246,0.3);
  transform:translateY(-2px);
}
.btn.solid:hover{
  box-shadow:0 6px 24px rgba(37,99,235,0.5);
  transform:translateY(-2px);
}
.btn:active{ transform:scale(0.97); }
.btn .ripple{
  position:absolute; border-radius:50%; background:rgba(255,255,255,0.4); transform:scale(0);
  animation:rippleAnim .6s ease-out;
  pointer-events:none;
}
@keyframes rippleAnim{ to{ transform:scale(3.5); opacity:0; } }

/* ===== PANEL / GLASS CARD BASE ===== */
.panel{
  background:linear-gradient(160deg, rgba(17,24,38,0.85), rgba(11,16,26,0.85));
  border:1px solid var(--line-subtle);
  border-radius:14px;
  backdrop-filter:blur(14px);
  -webkit-backdrop-filter:blur(14px);
  position:relative;
  transition:transform .35s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow .35s ease, border-color .35s ease;
  will-change:transform;
}
.panel::before{
  content:''; position:absolute; inset:-1px; border-radius:14px; padding:1px;
  background:linear-gradient(120deg, var(--accent), transparent 30%, transparent 70%, var(--cyan));
  -webkit-mask:linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
  -webkit-mask-composite:xor; mask-composite:exclude;
  opacity:0; transition:opacity .4s ease;
  pointer-events:none;
}
.panel:hover::before{ opacity:1; }
.panel:hover{
  border-color:rgba(59,130,246,0.3);
  box-shadow:0 16px 40px rgba(0,0,0,0.5), 0 0 0 1px rgba(59,130,246,0.15);
}

/* ===== STATUS / STATS SCREEN ===== */
.status-grid{
  display:grid; grid-template-columns:1.1fr 1.4fr; gap:30px;
}
@media(max-width:880px){ .status-grid{ grid-template-columns:1fr; gap:20px; } }
.status-card{ padding:34px; }
.status-header{ display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; border-bottom:1px dashed var(--line-subtle); padding-bottom:16px;}
.status-header h3{ font-family:'Orbitron',sans-serif; color:#fff; font-size:1.1rem; letter-spacing:1px;}
.status-header .lvl{ font-family:'Share Tech Mono',monospace; color:var(--gold); font-size:0.85rem; }
.stat-row{ display:flex; justify-content:space-between; align-items:center; padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.04); }
.stat-row:last-child{ border-bottom:none; }
.stat-key{ font-size:0.72rem; text-transform:uppercase; letter-spacing:2px; color:var(--ghost); display:flex; align-items:center; gap:10px; flex-shrink:0;}
.stat-key .dot{ width:6px; height:6px; border-radius:50%; background:var(--accent); box-shadow:0 0 6px var(--accent);}
.stat-val{ font-weight:600; color:#f1f5f9; font-size:1rem; text-align:right; max-width:65%; word-break:break-word; }
.stat-val a{ color:#f1f5f9; text-decoration:none; border-bottom:1px dotted var(--accent); }
.stat-val a:hover{ color:var(--accent-light); }

@media(max-width:540px){
  .status-card{ padding:24px 18px; }
  .stat-row{
    flex-direction:column;
    align-items:flex-start;
    gap:4px;
    padding:10px 0;
  }
  .stat-val{
    max-width:100%;
    text-align:left;
    font-size:0.95rem;
  }
  .status-header h3{ font-size:0.95rem; }
}

.core-attrs{ display:flex; flex-direction:column; gap:20px; padding:34px; }
@media(max-width:540px){ .core-attrs{ padding:24px 18px; } }
.attr{ }
.attr-top{ display:flex; justify-content:space-between; margin-bottom:8px; font-family:'Share Tech Mono',monospace; font-size:0.75rem; letter-spacing:1px;}
.attr-top .name{ color:#fff; text-transform:uppercase; }
.attr-top .pct{ color:var(--accent-light); }
.bar-track{ height:10px; border-radius:6px; background:rgba(255,255,255,0.05); overflow:hidden; position:relative; }
.bar-fill{
  height:100%; border-radius:6px; width:0%;
  background:linear-gradient(90deg, #2563eb, #38bdf8);
  box-shadow:0 0 10px rgba(59,130,246,0.4);
  transition:width 1.6s cubic-bezier(.16,.84,.44,1);
  position:relative;
}
.bar-fill::after{
  content:''; position:absolute; inset:0;
  background:linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
  width:40px; animation:barShine 2.4s infinite;
}
@keyframes barShine{ 0%{ transform:translateX(-40px);} 100%{ transform:translateX(340px);} }

/* ===== PROJECTS / DEPLOYED MODULES ===== */
.projects-grid{
  display:grid;
  grid-template-columns:repeat(auto-fit, minmax(min(100%, 310px), 1fr));
  gap:24px;
}
.project-card{
  padding:28px 24px;
  display:flex;
  flex-direction:column;
  justify-content:space-between;
  position:relative;
  overflow:hidden;
}
.project-card::after{
  content:'';
  position:absolute;
  top:0; right:0;
  width:42px; height:42px;
  background:linear-gradient(135deg, transparent 50%, rgba(59,130,246,0.15) 50%);
  border-top-right-radius:14px;
  pointer-events:none;
}
.project-top{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:16px;
}
.project-icon{
  width:44px; height:44px; border-radius:10px;
  background:rgba(59,130,246,0.08);
  border:1px solid var(--line-subtle);
  display:flex; align-items:center; justify-content:center;
  font-size:1.35rem;
  box-shadow:0 0 12px rgba(59,130,246,0.1);
  flex-shrink:0;
}
.project-status-tag{
  font-family:'Share Tech Mono', monospace;
  font-size:0.7rem;
  letter-spacing:1.5px;
  color:var(--accent-light);
  background:rgba(59,130,246,0.08);
  border:1px solid rgba(59,130,246,0.25);
  padding:3px 10px;
  border-radius:4px;
  text-transform:uppercase;
  white-space:nowrap;
}
.project-status-tag.exp{
  color:var(--magenta);
  background:rgba(129,140,248,0.08);
  border-color:rgba(129,140,248,0.25);
}
.project-title{
  font-family:'Orbitron', sans-serif;
  font-weight:700;
  font-size:1.15rem;
  color:#fff;
  letter-spacing:0.5px;
  margin-bottom:10px;
}
.project-desc{
  font-size:0.92rem;
  color:var(--ghost);
  line-height:1.55;
  margin-bottom:18px;
  flex-grow:1;
}
.project-techs{
  display:flex;
  flex-wrap:wrap;
  gap:7px;
  margin-bottom:20px;
}
.tech-badge{
  font-family:'Share Tech Mono', monospace;
  font-size:0.7rem;
  color:var(--text);
  background:rgba(255,255,255,0.04);
  border:1px solid rgba(255,255,255,0.08);
  padding:3px 10px;
  border-radius:20px;
  letter-spacing:0.5px;
}
.project-footer{
  display:flex;
  justify-content:space-between;
  align-items:center;
  border-top:1px solid rgba(255,255,255,0.05);
  padding-top:14px;
}
.project-id{
  font-family:'Share Tech Mono', monospace;
  font-size:0.72rem;
  color:var(--ghost);
}
.project-link{
  font-family:'Orbitron', sans-serif;
  font-size:0.75rem;
  font-weight:700;
  letter-spacing:1px;
  color:var(--accent-light);
  text-decoration:none;
  display:inline-flex;
  align-items:center;
  gap:6px;
  transition:all 0.25s cubic-bezier(0.2, 0.8, 0.2, 1);
  padding:4px 0;
}
.project-link:hover{
  color:#fff;
  text-shadow:0 0 10px rgba(59,130,246,0.5);
  transform:translateX(3px);
}

@media(max-width:640px){
  .projects-grid{
    grid-template-columns:1fr;
    gap:18px;
  }
  .project-card{
    padding:22px 18px;
  }
  .project-title{
    font-size:1.1rem;
  }
  .project-desc{
    font-size:0.88rem;
  }
}

/* ===== QUEST LOG / EDUCATION ===== */
.quest-log{ display:flex; flex-direction:column; gap:16px; }
.quest{
  display:grid; grid-template-columns:auto 1fr auto; align-items:center; gap:20px;
  padding:22px 26px;
}
.quest-icon{
  width:46px; height:46px; border-radius:10px; flex-shrink:0;
  background:rgba(59,130,246,0.1);
  border:1px solid var(--line-subtle);
  display:flex; align-items:center; justify-content:center;
  font-family:'Orbitron',sans-serif; font-weight:700; color:var(--accent-light); font-size:0.8rem;
}
.quest-title{ font-weight:700; color:#fff; font-size:1.1rem; letter-spacing:0.5px; }
.quest-status{ font-family:'Share Tech Mono',monospace; font-size:0.68rem; color:var(--gold); letter-spacing:1px; text-transform:uppercase; margin-top:3px;}
.quest-year{
  font-family:'Share Tech Mono',monospace; font-size:0.8rem; color:var(--accent-light);
  background:rgba(59,130,246,0.08); border:1px solid var(--line-subtle); padding:6px 14px; border-radius:50px; white-space:nowrap;
}
@media(max-width:640px){
  .quest{
    grid-template-columns:46px 1fr;
    gap:14px;
    padding:18px 16px;
  }
  .quest-year{
    grid-column:2 / -1;
    align-self:flex-start;
    font-size:0.72rem;
    padding:4px 10px;
  }
}

/* ===== RADAR + HOBBIES ===== */
.hobby-wrap{ display:grid; grid-template-columns:1fr 1fr; gap:30px; align-items:center; }
@media(max-width:880px){ .hobby-wrap{ grid-template-columns:1fr; gap:24px; } }
.radar-card{ padding:26px; display:flex; align-items:center; justify-content:center; }
#radarSvg{ max-width:320px; width:100%; height:auto; }
.tag-cloud{ display:flex; flex-wrap:wrap; gap:12px; padding:10px; }
.hobby-tag{
  display:flex; align-items:center; gap:10px; padding:12px 20px;
  border:1px solid var(--line-subtle); border-radius:50px; font-weight:600; font-size:0.95rem;
  background:rgba(255,255,255,0.02);
  transition:all .3s cubic-bezier(0.2, 0.8, 0.2, 1);
  cursor:default;
}
.hobby-tag:hover{ border-color:var(--accent); box-shadow:0 0 16px rgba(59,130,246,0.25); transform:translateY(-3px); }
.hobby-tag .emo{ font-size:1.2rem; }

@media(max-width:480px){
  .radar-card{ padding:16px 8px; }
  .tag-cloud{ justify-content:center; gap:10px; }
  .hobby-tag{ padding:9px 15px; font-size:0.85rem; }
}

/* ===== CONTACT ===== */
.contact-grid{ display:grid; grid-template-columns:repeat(auto-fit,minmax(min(100%, 240px),1fr)); gap:20px; }
.contact-card{
  padding:28px 24px; display:flex; flex-direction:column; gap:14px; text-decoration:none; color:inherit;
  transition:transform .3s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow .3s ease, border-color .3s ease;
}
.contact-card i.icon-box{
  width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;
  background:rgba(59,130,246,0.08); border:1px solid var(--line-subtle); font-style:normal; font-family:'Orbitron',sans-serif; font-weight:700; color:var(--accent-light);
}
.contact-card .clabel{ font-family:'Share Tech Mono',monospace; font-size:0.68rem; letter-spacing:2px; color:var(--ghost); text-transform:uppercase; }
.contact-card .cvalue{ font-weight:700; color:#fff; font-size:1.02rem; word-break:break-word; }
.contact-card:hover{ transform:translateY(-6px); }

@media(max-width:640px){
  .contact-card{ padding:22px 18px; }
  .contact-card:hover{ transform:translateY(-3px); }
}

footer{
  position:relative; z-index:5; text-align:center; padding:45px 20px 35px;
  font-family:'Share Tech Mono',monospace; font-size:0.75rem; color:var(--ghost); letter-spacing:1px;
  border-top:1px solid var(--line-subtle);
}
footer .accent{ color:var(--accent-light); }

.reveal{
  opacity:0;
  transform:translateY(32px);
  transition:opacity .75s cubic-bezier(0.16, 1, 0.3, 1), transform .75s cubic-bezier(0.16, 1, 0.3, 1);
  will-change:opacity, transform;
}
.reveal.in{
  opacity:1;
  transform:translateY(0);
}
</style>
</head>
<body>

<canvas id="bgCanvas"></canvas>
<div class="grid-overlay"></div>
<div class="vignette"></div>
<div class="scanline"></div>

<nav>
  <a href="#home" class="logo">ZK<span>//</span>SYSTEM</a>
  <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
    <span></span>
    <span></span>
    <span></span>
  </button>
  <ul class="navlinks" id="navLinks">
    <li><a href="#home" class="active">Home</a></li>
    <li><a href="#status">Status</a></li>
    <li><a href="#projects">Projek</a></li>
    <li><a href="#quests">Riwayat</a></li>
    <li><a href="#interests">Minat</a></li>
    <li><a href="#contact">Kontak</a></li>
  </ul>
</nav>
<div class="nav-backdrop" id="navBackdrop"></div>

<!-- HERO -->
<section class="hero" id="home">
  <div class="aura-frame">
    <div class="aura-ring"></div>
    <div class="aura-ring r2"></div>
    <div class="avatar-core">
      <img src="img/zack.png" alt="Dzaky Alfarizi Karim" class="avatar-img">
    </div>
    <div class="bini-badge left">
      <div class="bini-circle">
        <img src="img/nephy.png" alt="Nephy" class="bini-img">
      </div>
    </div>
    <div class="bini-badge right">
      <div class="bini-circle">
        <img src="img/mahiru.png" alt="Mahiru" class="bini-img">
      </div>
    </div>
  </div>
  <div class="hero-tag">Character Loaded — SMK Jurusan RPL</div>
  <h1 class="glitch" data-text="WELCOME TO THE ZACK-SYSTEM">WELCOME TO THE ZACK-SYSTEM</h1>
  <p class="hero-sub" id="typedLine"><span class="cursor"></span></p>
  <div class="hero-btns">
    <a href="#status" class="btn solid">▶ Load Status</a>
    <a href="#projects" class="btn">★ View Projects</a>
    <a href="#contact" class="btn">Establish Link</a>
  </div>
  <div class="scroll-hint"><div class="bar"></div>SCROLL</div>
</section>

<!-- STATUS -->
<section id="status">
  <div class="eyebrow">Character Sheet</div>
  <h2 class="sec-title">Status Screen</h2>
  <div class="status-grid">
    <div class="panel status-card reveal">
      <div class="status-header">
        <h3>DZAKY ALFARIZI KARIM</h3>
        <div class="lvl">LV. 15</div>
      </div>
      <div class="stat-row"><span class="stat-key"><span class="dot"></span>Kelas</span><span class="stat-val">Pelajar SMK — RPL</span></div>
      <div class="stat-row"><span class="stat-key"><span class="dot"></span>T.T.L</span><span class="stat-val">Medan, 27 Nov 2010</span></div>
      <div class="stat-row"><span class="stat-key"><span class="dot"></span>Gender</span><span class="stat-val">Laki-laki</span></div>
      <div class="stat-row"><span class="stat-key"><span class="dot"></span>Alamat</span><span class="stat-val">Jl. Rawe VI Lr. Tengah Pasar 6, Martubung</span></div>
      <div class="stat-row"><span class="stat-key"><span class="dot"></span>Faksi</span><span class="stat-val">Islam</span></div>
      <div class="stat-row"><span class="stat-key"><span class="dot"></span>Alignment</span><span class="stat-val">Indonesia</span></div>
      <div class="stat-row"><span class="stat-key"><span class="dot"></span>Status</span><span class="stat-val">Pelajar — Aktif</span></div>
    </div>

    <div class="panel core-attrs reveal">
      <div class="attr">
        <div class="attr-top"><span class="name">Fokus Belajar</span><span class="pct">88%</span></div>
        <div class="bar-track"><div class="bar-fill" data-w="88"></div></div>
      </div>
      <div class="attr">
        <div class="attr-top"><span class="name">Kreativitas</span><span class="pct">92%</span></div>
        <div class="bar-track"><div class="bar-fill" data-w="92"></div></div>
      </div>
      <div class="attr">
        <div class="attr-top"><span class="name">Logika RPL</span><span class="pct">80%</span></div>
        <div class="bar-track"><div class="bar-fill" data-w="80"></div></div>
      </div>
      <div class="attr">
        <div class="attr-top"><span class="name">Semangat Tim</span><span class="pct">85%</span></div>
        <div class="bar-track"><div class="bar-fill" data-w="85"></div></div>
      </div>
      <div class="attr">
        <div class="attr-top"><span class="name">Stamina Grinding</span><span class="pct">95%</span></div>
        <div class="bar-track"><div class="bar-fill" data-w="95"></div></div>
      </div>
    </div>
  </div>
</section>

<!-- PROJECTS -->
<section id="projects">
  <div class="eyebrow">Mission Archives</div>
  <h2 class="sec-title">Projek yang Pernah Dibuat</h2>
  <div class="projects-grid">

    <div class="panel project-card reveal">
      <div class="project-top">
        <div class="project-icon">🍽️</div>
        <span class="project-status-tag">Live / Local</span>
      </div>
      <h3 class="project-title">Dapur Tyas</h3>
      <p class="project-desc">Aplikasi kasir (POS) &amp; pemesanan makanan berbasis web dengan manajemen multi-role (Admin, Kasir, Pelanggan), pesanan real-time, cetak struk, dan laporan omzet harian.</p>
      <div class="project-techs">
        <span class="tech-badge">PHP</span>
        <span class="tech-badge">MySQL</span>
        <span class="tech-badge">JavaScript</span>
        <span class="tech-badge">Bootstrap</span>
      </div>
      <div class="project-footer">
        <span class="project-id">#PRJ-01</span>
        <a href="../dapur_tyas/" target="_blank" rel="noopener noreferrer" class="project-link">Buka Projek ↗</a>
      </div>
    </div>

    <div class="panel project-card reveal">
      <div class="project-top">
        <div class="project-icon">💳</div>
        <span class="project-status-tag">Live / Local</span>
      </div>
      <h3 class="project-title">Aplikasi Perbankan</h3>
      <p class="project-desc">Platform simulasi perbankan digital modern dengan pencatatan mutasi rekening, transfer saldo antar-pengguna, autentikasi terenkripsi, serta fitur top-up saldo game &amp; voucher.</p>
      <div class="project-techs">
        <span class="tech-badge">PHP</span>
        <span class="tech-badge">MySQL</span>
        <span class="tech-badge">Cyber UI</span>
        <span class="tech-badge">Composer</span>
      </div>
      <div class="project-footer">
        <span class="project-id">#PRJ-02</span>
        <a href="../aplikasi_perbankan/" target="_blank" rel="noopener noreferrer" class="project-link">Buka Projek ↗</a>
      </div>
    </div>

    <div class="panel project-card reveal">
      <div class="project-top">
        <div class="project-icon">📁</div>
        <span class="project-status-tag">Live / Local</span>
      </div>
      <h3 class="project-title">SIPAS (Arsip Surat)</h3>
      <p class="project-desc">Sistem Informasi Pengarsipan Surat digital berbasis arsitektur MVC. Mengelola alur surat masuk &amp; surat keluar, penomoran otomatis, upload berkas, dan pencarian arsip instan.</p>
      <div class="project-techs">
        <span class="tech-badge">PHP MVC</span>
        <span class="tech-badge">MySQL</span>
        <span class="tech-badge">Document Mgmt</span>
      </div>
      <div class="project-footer">
        <span class="project-id">#PRJ-03</span>
        <a href="../SIPAS_PROJEK/" target="_blank" rel="noopener noreferrer" class="project-link">Buka Projek ↗</a>
      </div>
    </div>

    <div class="panel project-card reveal">
      <div class="project-top">
        <div class="project-icon">📖</div>
        <span class="project-status-tag">Live / Local</span>
      </div>
      <h3 class="project-title">Al-Qur'an Digital</h3>
      <p class="project-desc">Aplikasi web Al-Qur'an digital interaktif dengan teks Arab, transliterasi latin, terjemahan bahasa Indonesia, pemutar audio murottal per ayat, serta navigasi responsif.</p>
      <div class="project-techs">
        <span class="tech-badge">JavaScript</span>
        <span class="tech-badge">REST API</span>
        <span class="tech-badge">Audio API</span>
        <span class="tech-badge">CSS3</span>
      </div>
      <div class="project-footer">
        <span class="project-id">#PRJ-04</span>
        <a href="../al_qur'an_digital/" target="_blank" rel="noopener noreferrer" class="project-link">Buka Projek ↗</a>
      </div>
    </div>

    <div class="panel project-card reveal">
      <div class="project-top">
        <div class="project-icon">🎬</div>
        <span class="project-status-tag">Live / Local</span>
      </div>
      <h3 class="project-title">AniTrack</h3>
      <p class="project-desc">Portal pelacak daftar tontonan anime dengan dashboard modern. Fitur pencarian serial, penandaan status (Watching, Completed, Plan to Watch), rating, dan update episode.</p>
      <div class="project-techs">
        <span class="tech-badge">JavaScript</span>
        <span class="tech-badge">Anime API</span>
        <span class="tech-badge">Glassmorphism</span>
      </div>
      <div class="project-footer">
        <span class="project-id">#PRJ-05</span>
        <a href="../anitrack/" target="_blank" rel="noopener noreferrer" class="project-link">Buka Projek ↗</a>
      </div>
    </div>

    <div class="panel project-card reveal">
      <div class="project-top">
        <div class="project-icon">🏎️</div>
        <span class="project-status-tag">Live / Local</span>
      </div>
      <h3 class="project-title">Garasi Mobil OOP</h3>
      <p class="project-desc">Sistem manajemen dan simulasi armada kendaraan yang mengimplementasikan paradigma OOP (Class, Object, Inheritance, Encapsulation, Polymorphism) secara komprehensif.</p>
      <div class="project-techs">
        <span class="tech-badge">PHP OOP</span>
        <span class="tech-badge">Classes &amp; Objects</span>
        <span class="tech-badge">Clean Code</span>
      </div>
      <div class="project-footer">
        <span class="project-id">#PRJ-06</span>
        <a href="../garasi-mobil-oop/" target="_blank" rel="noopener noreferrer" class="project-link">Buka Projek ↗</a>
      </div>
    </div>

    <div class="panel project-card reveal">
      <div class="project-top">
        <div class="project-icon">🏪</div>
        <span class="project-status-tag">Live / Local</span>
      </div>
      <h3 class="project-title">Minimarket Sederhana</h3>
      <p class="project-desc">Sistem informasi penjualan retail minimarket dengan pencatatan transaksi kasir, inventaris barang, pengelolaan kategori produk, dan pelaporan stok secara terstruktur.</p>
      <div class="project-techs">
        <span class="tech-badge">PHP Native</span>
        <span class="tech-badge">MySQL</span>
        <span class="tech-badge">Inventory POS</span>
      </div>
      <div class="project-footer">
        <span class="project-id">#PRJ-07</span>
        <a href="../minimarket_sederhana/" target="_blank" rel="noopener noreferrer" class="project-link">Buka Projek ↗</a>
      </div>
    </div>

    <div class="panel project-card reveal">
      <div class="project-top">
        <div class="project-icon">👤</div>
        <span class="project-status-tag exp">AI / Computer Vision</span>
      </div>
      <h3 class="project-title">Tugas FaceScan AI</h3>
      <p class="project-desc">Eksperimen Computer Vision dan pemindaian wajah real-time dengan pengolahan citra digital untuk deteksi landmark wajah dan klasifikasi dataset secara otomatis.</p>
      <div class="project-techs">
        <span class="tech-badge">Python</span>
        <span class="tech-badge">OpenCV</span>
        <span class="tech-badge">Face Detection</span>
      </div>
      <div class="project-footer">
        <span class="project-id">#PRJ-08</span>
        <a href="../tugas_facescan/" target="_blank" rel="noopener noreferrer" class="project-link">Buka Direktori ↗</a>
      </div>
    </div>

  </div>
</section>

<!-- QUEST LOG / EDUCATION -->
<section id="quests">
  <div class="eyebrow">Progression Log</div>
  <h2 class="sec-title">Riwayat Pendidikan</h2>
  <div class="quest-log">
    <div class="panel quest reveal">
      <div class="quest-icon">SD</div>
      <div><div class="quest-title">SD 69</div><div class="quest-status">✓ Quest Completed</div></div>
      <div class="quest-year">2017 – 2022</div>
    </div>
    <div class="panel quest reveal">
      <div class="quest-icon">MTs</div>
      <div><div class="quest-title">Madrasah</div><div class="quest-status">✓ Quest Completed</div></div>
      <div class="quest-year">2019 – 2021</div>
    </div>
    <div class="panel quest reveal">
      <div class="quest-icon">SMP</div>
      <div><div class="quest-title">SMP Annur Prima</div><div class="quest-status">◆ In Progress</div></div>
      <div class="quest-year">2023 – 2025</div>
    </div>
  </div>
</section>

<!-- INTERESTS / RADAR -->
<section id="interests">
  <div class="eyebrow">Affinity Scan</div>
  <h2 class="sec-title">Minat &amp; Hobi</h2>
  <div class="hobby-wrap">
    <div class="panel radar-card reveal">
      <svg id="radarSvg" viewBox="0 0 320 320" width="100%" height="320"></svg>
    </div>
    <div class="tag-cloud reveal">
      <div class="panel hobby-tag"><span class="emo">🏋🏼‍♀️</span> Olahraga</div>
      <div class="panel hobby-tag"><span class="emo">🎮</span> Main Game</div>
      <div class="panel hobby-tag"><span class="emo">🎵</span> Mendengarkan Lagu</div>
      <div class="panel hobby-tag"><span class="emo">🎞️</span> Nonton Anime</div>
      <div class="panel hobby-tag"><span class="emo">🎨</span> Menggambar</div>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section id="contact">
  <div class="eyebrow">Uplink</div>
  <h2 class="sec-title">Kontak</h2>
  <div class="contact-grid">
    <a class="panel contact-card reveal" href="https://www.instagram.com/zack_thesigmaboy?stkn=enkzcTk4cnd1MzMz" target="_blank" rel="noopener noreferrer">
      <i class="icon-box">📸</i>
      <span class="clabel">Instagram</span>
      <span class="cvalue">@zack_thesigmaboy</span>
    </a>
    <a class="panel contact-card reveal" href="https://www.tiktok.com/@bang_zack27boom?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener noreferrer">
      <i class="icon-box">🎵</i>
      <span class="clabel">TikTok</span>
      <span class="cvalue">@bang_zack27boom</span>
    </a>
    <a class="panel contact-card reveal" href="mailto:dzakykarem@gmail.com">
      <i class="icon-box">@</i>
      <span class="clabel">Email</span>
      <span class="cvalue">dzakykarem@gmail.com</span>
    </a>
    <a class="panel contact-card reveal" href="tel:+6288201709364">
      <i class="icon-box">☎</i>
      <span class="clabel">Telepon</span>
      <span class="cvalue">+62 882 0170 9364</span>
    </a>
    <div class="panel contact-card reveal">
      <i class="icon-box">⚑</i>
      <span class="clabel">Lokasi</span>
      <span class="cvalue">Medan, Sumatera Utara</span>
    </div>
  </div>
</section>

<footer>
  <p>&lt; SYSTEM LOG &gt; Curriculum Vitae © <span class="accent" id="year"></span> Dzaky Alfarizi Karim — All rights reserved.</p>
</footer>

<script>
/* ===== YEAR ===== */
document.getElementById('year').textContent = new Date().getFullYear();

/* ===== MOBILE NAV & SCROLLSPY ===== */
const navToggle = document.getElementById('navToggle');
const navLinks = document.getElementById('navLinks');
const navBackdrop = document.getElementById('navBackdrop');
const navAnchors = document.querySelectorAll('.navlinks a');

function toggleMenu(forceState){
  const isOpen = typeof forceState === 'boolean' ? forceState : !navLinks.classList.contains('open');
  navToggle.classList.toggle('open', isOpen);
  navLinks.classList.toggle('open', isOpen);
  navBackdrop.classList.toggle('open', isOpen);
  document.body.style.overflow = isOpen && window.innerWidth <= 820 ? 'hidden' : '';
}

if(navToggle){
  navToggle.addEventListener('click', ()=>toggleMenu());
  navBackdrop.addEventListener('click', ()=>toggleMenu(false));
  navAnchors.forEach(a=>{
    a.addEventListener('click', ()=>toggleMenu(false));
  });
}
window.addEventListener('resize', ()=>{
  if(window.innerWidth > 820 && navLinks.classList.contains('open')){
    toggleMenu(false);
  }
});

// Scrollspy for smooth active nav highlighting
const sections = document.querySelectorAll('section[id]');
window.addEventListener('scroll', ()=>{
  const scrollPos = window.scrollY + 140;
  sections.forEach(sec=>{
    const top = sec.offsetTop;
    const height = sec.offsetHeight;
    const id = sec.getAttribute('id');
    if(scrollPos >= top && scrollPos < top + height){
      navAnchors.forEach(a=>{
        a.classList.toggle('active', a.getAttribute('href') === '#' + id);
      });
    }
  });
}, { passive: true });

/* ===== PARTICLE / MATRIX-LIKE BACKGROUND ===== */
const canvas = document.getElementById('bgCanvas');
const ctx = canvas.getContext('2d');
let w, h, particles = [];
const mouse = { x: null, y: null };
let dpr = 1;

function resize(){
  dpr = Math.min(window.devicePixelRatio || 1, 2);
  w = window.innerWidth;
  h = window.innerHeight;
  canvas.width = Math.floor(w * dpr);
  canvas.height = Math.floor(h * dpr);
  ctx.setTransform(1, 0, 0, 1, 0, 0);
  ctx.scale(dpr, dpr);
}
resize();

window.addEventListener('resize', ()=>{
  resize();
  initParticles();
});
window.addEventListener('mousemove', e => { mouse.x = e.clientX; mouse.y = e.clientY; }, { passive: true });
window.addEventListener('mouseleave', () => { mouse.x = null; mouse.y = null; });

/* Partikel Bintang / Tech Halus: Slate Blue & Sky */
const COLORS = ['#3b82f6', '#60a5fa', '#818cf8'];

function initParticles(){
  particles = [];
  const isMobile = window.innerWidth < 768;
  const count = isMobile ? Math.min(32, Math.floor(w / 22)) : Math.min(65, Math.floor(w / 20));
  for(let i=0; i<count; i++){
    particles.push({
      x: Math.random() * w,
      y: Math.random() * h,
      vx: (Math.random() - 0.5) * (isMobile ? 0.22 : 0.32),
      vy: (Math.random() - 0.5) * (isMobile ? 0.22 : 0.32),
      r: Math.random() * 1.4 + 0.5,
      c: COLORS[Math.floor(Math.random() * COLORS.length)]
    });
  }
}
initParticles();

function tick(){
  ctx.clearRect(0, 0, w, h);
  const maxLineDist = window.innerWidth < 768 ? 85 : 110;
  for(const p of particles){
    p.x += p.vx; p.y += p.vy;
    if(mouse.x !== null){
      const dx = p.x - mouse.x, dy = p.y - mouse.y;
      const dist = Math.sqrt(dx*dx + dy*dy);
      if(dist < 130){
        const force = (130 - dist) / 130;
        p.x += dx / dist * force * 1.1;
        p.y += dy / dist * force * 1.1;
      }
    }
    if(p.x < 0) p.x = w; if(p.x > w) p.x = 0;
    if(p.y < 0) p.y = h; if(p.y > h) p.y = 0;
    ctx.beginPath();
    ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
    ctx.fillStyle = p.c;
    ctx.globalAlpha = 0.65;
    ctx.fill();
  }
  ctx.globalAlpha = 1;
  const len = particles.length;
  for(let i=0; i<len; i++){
    for(let j=i+1; j<len; j++){
      const a = particles[i], b = particles[j];
      const dx = a.x - b.x, dy = a.y - b.y;
      const dist = Math.sqrt(dx*dx + dy*dy);
      if(dist < maxLineDist){
        ctx.beginPath();
        ctx.strokeStyle = `rgba(59,130,246,${(0.12 * (1 - dist / maxLineDist)).toFixed(3)})`;
        ctx.lineWidth = 1;
        ctx.moveTo(a.x, a.y);
        ctx.lineTo(b.x, b.y);
        ctx.stroke();
      }
    }
  }
  requestAnimationFrame(tick);
}
tick();

/* ===== TYPING EFFECT ===== */
const lines = [
  'Loading identity module... OK',
  'Pelajar SMK Jurusan Rekayasa Perangkat Lunak.',
  'Menyusun logika, mengejar mimpi, satu baris kode setiap hari.'
];
const typedEl = document.getElementById('typedLine');
let lineIdx = 0, charIdx = 0;
function typeLoop(){
  if(lineIdx >= lines.length) return;
  const current = lines[lineIdx];
  if(charIdx <= current.length){
    typedEl.innerHTML = current.slice(0,charIdx) + '<span class="cursor"></span>';
    charIdx++;
    setTimeout(typeLoop, 36);
  } else {
    setTimeout(()=>{
      lineIdx++; charIdx=0;
      if(lineIdx < lines.length) typeLoop();
    }, 1100);
  }
}
typeLoop();

/* ===== RIPPLE BUTTONS ===== */
document.querySelectorAll('.btn').forEach(btn=>{
  btn.addEventListener('click', function(e){
    const rect = this.getBoundingClientRect();
    const ripple = document.createElement('span');
    const size = Math.max(rect.width, rect.height);
    ripple.className='ripple';
    ripple.style.width = ripple.style.height = size+'px';
    ripple.style.left = (e.clientX-rect.left-size/2)+'px';
    ripple.style.top = (e.clientY-rect.top-size/2)+'px';
    this.appendChild(ripple);
    setTimeout(()=>ripple.remove(),650);
  });
});

/* ===== TILT ON PANELS (DESKTOP RAF-OPTIMIZED) ===== */
const canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
if(canHover){
  document.querySelectorAll('.panel').forEach(card=>{
    let rafId = null;
    card.addEventListener('mousemove', e=>{
      if(rafId) cancelAnimationFrame(rafId);
      rafId = requestAnimationFrame(()=>{
        const r = card.getBoundingClientRect();
        const x = e.clientX - r.left, y = e.clientY - r.top;
        const rx = ((y / r.height) - 0.5) * -7;
        const ry = ((x / r.width) - 0.5) * 7;
        card.style.transform = `perspective(800px) rotateX(${rx.toFixed(2)}deg) rotateY(${ry.toFixed(2)}deg) translateY(-4px)`;
      });
    });
    card.addEventListener('mouseleave', ()=>{
      if(rafId) cancelAnimationFrame(rafId);
      card.style.transform = '';
    });
  });
}

/* ===== SCROLL REVEAL ===== */
const io = new IntersectionObserver((entries)=>{
  entries.forEach(en=>{
    if(en.isIntersecting){
      en.target.classList.add('in');
      io.unobserve(en.target);
    }
  });
}, { threshold:0.12 });
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));

/* ===== STAT BARS ANIMATE ON VIEW ===== */
const barIo = new IntersectionObserver((entries)=>{
  entries.forEach(en=>{
    if(en.isIntersecting){
      en.target.style.width = en.target.dataset.w + '%';
      barIo.unobserve(en.target);
    }
  });
},{threshold:0.35});
document.querySelectorAll('.bar-fill').forEach(el=>barIo.observe(el));

/* ===== RADAR CHART (HOBBIES WITH CLEAN SAPPHIRE BLUE) ===== */
const radarData = [
  {label:'Olahraga', v:0.7},
  {label:'Game', v:0.92},
  {label:'Musik', v:0.8},
  {label:'Anime', v:0.95},
  {label:'Gambar', v:0.78}
];
(function drawRadar(){
  const svg = document.getElementById('radarSvg');
  if(!svg) return;
  const cx=160, cy=160, R=105;
  const n = radarData.length;
  const ns = 'http://www.w3.org/2000/svg';

  function pt(i, scale){
    const ang = (Math.PI*2*i/n) - Math.PI/2;
    return [cx + Math.cos(ang)*R*scale, cy + Math.sin(ang)*R*scale];
  }

  // rings
  [0.25,0.5,0.75,1].forEach(scale=>{
    let d='';
    for(let i=0;i<n;i++){
      const [x,y] = pt(i,scale);
      d += (i===0?'M':'L') + x.toFixed(1) + ',' + y.toFixed(1) + ' ';
    }
    d+='Z';
    const path = document.createElementNS(ns,'path');
    path.setAttribute('d', d);
    path.setAttribute('fill','none');
    path.setAttribute('stroke','rgba(148,163,184,0.14)');
    path.setAttribute('stroke-width','1');
    svg.appendChild(path);
  });

  // axes + labels
  for(let i=0;i<n;i++){
    const [x,y] = pt(i,1);
    const line = document.createElementNS(ns,'line');
    line.setAttribute('x1',cx); line.setAttribute('y1',cy);
    line.setAttribute('x2',x.toFixed(1)); line.setAttribute('y2',y.toFixed(1));
    line.setAttribute('stroke','rgba(148,163,184,0.12)');
    svg.appendChild(line);

    const [lx,ly] = pt(i,1.24);
    const text = document.createElementNS(ns,'text');
    text.setAttribute('x',lx.toFixed(1)); text.setAttribute('y',ly.toFixed(1));
    text.setAttribute('fill','#94a3b8');
    text.setAttribute('font-size','11');
    text.setAttribute('font-family','Share Tech Mono, monospace');
    text.setAttribute('text-anchor','middle');
    text.textContent = radarData[i].label;
    svg.appendChild(text);
  }

  const poly = document.createElementNS(ns,'polygon');
  poly.setAttribute('fill','rgba(59,130,246,0.22)');
  poly.setAttribute('stroke','#3b82f6');
  poly.setAttribute('stroke-width','2');
  svg.appendChild(poly);

  function setScale(s){
    let ptsStr='';
    for(let i=0;i<n;i++){
      const [x,y] = pt(i, radarData[i].v * s);
      ptsStr += x.toFixed(1)+','+y.toFixed(1)+' ';
    }
    poly.setAttribute('points', ptsStr);
  }
  setScale(0);

  const radarIo = new IntersectionObserver((entries)=>{
    entries.forEach(en=>{
      if(en.isIntersecting){
        let start = null;
        const duration = 850;
        function step(timestamp){
          if(!start) start = timestamp;
          const progress = Math.min((timestamp - start) / duration, 1);
          const ease = 1 - Math.pow(1 - progress, 3);
          setScale(ease);
          if(progress < 1){
            requestAnimationFrame(step);
          }
        }
        requestAnimationFrame(step);
        radarIo.unobserve(en.target);
      }
    });
  },{threshold:0.25});
  radarIo.observe(svg);
})();

/* ===== COPY HELPER ===== */
function copyServerIp(el, text){
  if(navigator.clipboard && window.isSecureContext){
    navigator.clipboard.writeText(text).then(()=>{
      showCopiedFeedback(el);
    }).catch(()=>{
      fallbackCopy(text);
      showCopiedFeedback(el);
    });
  } else {
    fallbackCopy(text);
    showCopiedFeedback(el);
  }
}
function fallbackCopy(text){
  const ta = document.createElement('textarea');
  ta.value = text;
  ta.style.position = 'fixed';
  ta.style.opacity = '0';
  document.body.appendChild(ta);
  ta.focus();
  ta.select();
  try{ document.execCommand('copy'); }catch(e){}
  document.body.removeChild(ta);
}
function showCopiedFeedback(el){
  const hint = el.querySelector('.copy-hint');
  if(hint){
    const orig = hint.textContent;
    hint.textContent = '✓ Tersalin!';
    hint.style.color = '#38bdf8';
    setTimeout(()=>{
      hint.textContent = orig;
      hint.style.color = 'var(--cyan)';
    }, 2200);
  }
}
</script>
</body>
</html>