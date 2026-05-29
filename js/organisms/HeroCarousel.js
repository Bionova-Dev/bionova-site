/* ============================================================
   BIONOVA — Organism: HeroCarousel
   VERSION: 20260529
   Zoom-safe · Fully responsive · Header-aware
   ============================================================ */

const HeroCarousel = ({ onNavigate }) => {
  const urls = {
    'home':     BIONOVA_HOME_URL,
    'products': BIONOVA_ROUTES.products,
    'blog':     BIONOVA_ROUTES.blog,
    'about':    BIONOVA_ROUTES.about,
    'contact':  BIONOVA_ROUTES.contact,
  };

  const slides = [
    {
      image:      THEME_URI + "/assets/hero/hero-banner-glowy.webp?v=4",
      badge:      "L'Éclat au Naturel",
      title1:     "Révélez la beauté",
      title2:     "de votre peau.",
      titleColor: "#fda4af",   /* rose-300 */
      subtitle:   "Des formules micronutritionnelles hydratantes et anti-âge pour un teint glowy et une peau éclatante de santé.",
      cta1: { label: "Découvrir la collection", page: "products" },
      cta2: { label: "Nos conseils beauté",     page: "blog"     },
    },
    {
      image:      THEME_URI + "/assets/hero/hero-banner-yoga.webp?v=4",
      badge:      "Équilibre & Sérénité",
      title1:     "L'harmonie parfaite",
      title2:     "du corps et de l'esprit.",
      titleColor: "#fcd34d",   /* amber-300 */
      subtitle:   "Retrouvez un sommeil réparateur et une paix intérieure grâce à nos actifs naturels ciblés pour votre bien-être mental.",
      cta1: { label: "Voir les compléments", page: "products" },
      cta2: { label: "Notre expertise",      page: "about"    },
    },
    {
      image:      THEME_URI + "/assets/hero/hero-factory-production.webp?v=4",
      badge:      "Made in Tunisia",
      title1:     "L'excellence",
      title2:     "de nos laboratoires.",
      titleColor: "#6ee7b7",   /* emerald-300 */
      subtitle:   "Chaque formule est le fruit de longs mois de recherche, conçue et fabriquée selon les normes pharmaceutiques les plus strictes.",
      cta1: { label: "Nos engagements", page: "about"   },
      cta2: { label: "Contactez-nous",  page: "contact" },
    },
    {
      image:      THEME_URI + "/assets/hero/hero-banner-sports.webp?v=4",
      badge:      "Vitalité & Performance",
      title1:     "Dépassez",
      title2:     "vos limites.",
      titleColor: "#7dd3fc",   /* sky-300 */
      subtitle:   "Une énergie débordante au quotidien. Nos compléments vous accompagnent dans votre mode de vie actif et sportif pour des résultats prouvés.",
      cta1: { label: "Explorer la boutique", page: "products" },
      cta2: { label: "Nos astuces santé",    page: "blog"     },
    },
  ];

  const SLIDE_DURATION = 7000;
  const [current, setCurrent]   = React.useState(0);
  const [fade, setFade]         = React.useState(true);
  const [progress, setProgress] = React.useState(0);
  const timerRef    = React.useRef(null);
  const progressRef = React.useRef(null);

  const startProgressBar = () => {
    setProgress(0);
    if (progressRef.current) cancelAnimationFrame(progressRef.current);
    const startTime = performance.now();
    const animate = (now) => {
      const pct = Math.min(((now - startTime) / SLIDE_DURATION) * 100, 100);
      setProgress(pct);
      if (pct < 100) progressRef.current = requestAnimationFrame(animate);
    };
    progressRef.current = requestAnimationFrame(animate);
  };

  const goTo = (idx) => {
    setFade(false);
    clearInterval(timerRef.current);
    if (progressRef.current) cancelAnimationFrame(progressRef.current);
    setTimeout(() => {
      setCurrent(idx);
      setFade(true);
      startProgressBar();
      startAutoPlay();
    }, 300);
  };

  const startAutoPlay = () => {
    timerRef.current = setInterval(() => {
      setFade(false);
      setTimeout(() => {
        setCurrent((prev) => (prev + 1) % slides.length);
        setFade(true);
        startProgressBar();
      }, 300);
    }, SLIDE_DURATION);
  };

  React.useEffect(() => {
    startProgressBar();
    startAutoPlay();
    return () => {
      clearInterval(timerRef.current);
      if (progressRef.current) cancelAnimationFrame(progressRef.current);
    };
  }, []);

  const slide = slides[current];

  /* ── Styles partagés ── */
  const S = {
    section: {
      position: 'relative',
      width: '100%',
      /* Pleine hauteur viewport — le contenu commence SOUS le header fixe (90px) */
      minHeight: '100vh',
      display: 'flex',
      flexDirection: 'column',
      overflow: 'hidden',
    },
    imgWrap: (active) => ({
      position: 'absolute',
      inset: 0,
      width: '100%',
      height: '100%',
      opacity: active ? 1 : 0,
      transition: 'opacity 1000ms ease',
    }),
    img: (active, idx) => ({
      width: '100%',
      height: '100%',
      objectFit: 'cover',
      objectPosition: 'center center',
      display: 'block',
      transform: active ? 'scale(1.06)' : 'scale(1)',
      transformOrigin: idx % 2 === 0 ? 'center center' : 'top right',
      transition: 'transform 8s ease-out',
    }),
    overlay1: {
      position: 'absolute', inset: 0, pointerEvents: 'none',
      background: 'linear-gradient(to right, rgba(10,15,30,0.82) 0%, rgba(10,15,30,0.50) 55%, rgba(10,15,30,0.10) 100%)',
    },
    overlay2: {
      position: 'absolute', inset: 0, pointerEvents: 'none',
      background: 'linear-gradient(to top, rgba(10,15,30,0.75) 0%, transparent 45%, rgba(10,15,30,0.20) 100%)',
    },
    content: {
      position: 'relative',
      zIndex: 10,
      width: '100%',
      maxWidth: '1280px',
      margin: '0 auto',
      boxSizing: 'border-box',
      /* Compense le header fixe (90px desktop / 60px mobile) + espace visuel */
      paddingTop: 'calc(var(--header-h-desktop, 90px) + clamp(2rem, 6vh, 5rem))',
      paddingBottom: 'clamp(5rem, 10vh, 8rem)',
      paddingLeft:  'clamp(1.25rem, 5vw, 4rem)',
      paddingRight: 'clamp(1.25rem, 5vw, 4rem)',
    },
    inner: (visible) => ({
      maxWidth: 'min(60%, 680px)',
      width: '100%',
      opacity: visible ? 1 : 0,
      transform: visible ? 'translateY(0)' : 'translateY(22px)',
      transition: 'opacity 700ms ease, transform 700ms ease',
    }),
    badge: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: '0.5rem',
      padding: '0.45rem 1.1rem',
      background: 'rgba(255,255,255,0.14)',
      backdropFilter: 'blur(14px)',
      WebkitBackdropFilter: 'blur(14px)',
      border: '1px solid rgba(255,255,255,0.28)',
      borderRadius: '9999px',
      color: '#fff',
      fontWeight: 700,
      fontSize: 'clamp(0.6rem, 1.3vw, 0.72rem)',
      letterSpacing: '0.13em',
      textTransform: 'uppercase',
      marginBottom: 'clamp(0.9rem, 2.5vw, 1.75rem)',
      whiteSpace: 'nowrap',
    },
    dot: {
      width: '8px', height: '8px', borderRadius: '50%',
      background: '#4ade80', flexShrink: 0,
    },
    h1: {
      fontFamily: "'Montserrat', sans-serif",
      fontWeight: 800,
      fontSize: 'clamp(1.75rem, 5.5vw, 4.5rem)',
      lineHeight: 1.08,
      color: '#fff',
      margin: 0,
      padding: 0,
      height: 'auto',
      wordBreak: 'break-word',
      overflowWrap: 'break-word',
      letterSpacing: '-0.01em',
    },
    p: {
      marginTop: 'clamp(0.8rem, 2.5vw, 1.75rem)',
      marginBottom: 0,
      fontSize: 'clamp(0.875rem, 1.9vw, 1.15rem)',
      lineHeight: 1.68,
      color: 'rgba(226,232,240,0.92)',
      maxWidth: '560px',
      wordBreak: 'break-word',
    },
    ctaRow: {
      marginTop: 'clamp(1.25rem, 3.5vw, 2.75rem)',
      display: 'flex',
      flexWrap: 'wrap',
      gap: 'clamp(0.65rem, 1.8vw, 1rem)',
      alignItems: 'center',
    },
    cta1: {
      display: 'inline-flex', alignItems: 'center', justifyContent: 'center', gap: '0.45rem',
      padding: 'clamp(0.7rem, 1.8vw, 0.95rem) clamp(1.1rem, 3vw, 2rem)',
      background: '#be123c',
      color: '#fff',
      fontWeight: 700,
      fontSize: 'clamp(0.82rem, 1.7vw, 1rem)',
      borderRadius: '0.875rem',
      textDecoration: 'none',
      boxShadow: '0 8px 22px -4px rgba(190,18,60,0.45)',
      whiteSpace: 'nowrap',
      transition: 'background 0.25s, transform 0.25s, box-shadow 0.25s',
      border: 'none',
      cursor: 'pointer',
    },
    cta2: {
      display: 'inline-flex', alignItems: 'center', justifyContent: 'center',
      padding: 'clamp(0.7rem, 1.8vw, 0.95rem) clamp(1.1rem, 3vw, 2rem)',
      background: 'rgba(255,255,255,0.10)',
      backdropFilter: 'blur(8px)',
      WebkitBackdropFilter: 'blur(8px)',
      border: '1px solid rgba(255,255,255,0.32)',
      color: '#fff',
      fontWeight: 700,
      fontSize: 'clamp(0.82rem, 1.7vw, 1rem)',
      borderRadius: '0.875rem',
      textDecoration: 'none',
      whiteSpace: 'nowrap',
      transition: 'background 0.25s',
      cursor: 'pointer',
    },
    dotsBar: {
      position: 'absolute',
      bottom: 'clamp(1.25rem, 3vh, 2.25rem)',
      left: 0, right: 0,
      zIndex: 20,
      padding: '0 clamp(1.25rem, 5vw, 4rem)',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      boxSizing: 'border-box',
    },
  };

  return (
    <section aria-label="Carrousel principal" style={S.section}>

      {/* ── Images background ── */}
      {slides.map((s, i) => (
        <div key={i} aria-hidden="true" style={S.imgWrap(i === current)}>
          <img
            src={s.image}
            alt=""
            loading={i === 0 ? "eager" : "lazy"}
            decoding={i === 0 ? "sync" : "async"}
            fetchpriority={i === 0 ? "high" : "low"}
            width="1920" height="1080"
            style={S.img(i === current, i)}
          />
        </div>
      ))}

      {/* ── Overlays ── */}
      <div style={S.overlay1} />
      <div style={S.overlay2} />

      {/* ── Contenu centré verticalement ── */}
      <div style={{ position: 'relative', zIndex: 10, flex: 1, display: 'flex', alignItems: 'center' }}>
        <div style={S.content}>
          <div style={S.inner(fade)}>

            {/* Badge */}
            <div style={S.badge}>
              <span style={S.dot} />
              {slide.badge}
            </div>

            {/* Titre */}
            <h1 style={S.h1}>
              <span style={{ display: 'block', marginBottom: '0.12em' }}>{slide.title1}</span>
              <span style={{ display: 'block', color: slide.titleColor }}>{slide.title2}</span>
            </h1>

            {/* Sous-titre */}
            <p style={S.p}>{slide.subtitle}</p>

            {/* CTAs */}
            <div style={S.ctaRow}>
              <a
                href={urls[slide.cta1.page] || "#"}
                title={slide.cta1.label}
                style={S.cta1}
                onMouseEnter={e => { e.currentTarget.style.background='#9d0e31'; e.currentTarget.style.transform='translateY(-2px)'; e.currentTarget.style.boxShadow='0 14px 28px -6px rgba(190,18,60,0.5)'; }}
                onMouseLeave={e => { e.currentTarget.style.background='#be123c'; e.currentTarget.style.transform='translateY(0)';   e.currentTarget.style.boxShadow='0 8px 22px -4px rgba(190,18,60,0.45)'; }}
              >
                {slide.cta1.label}
                <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24" style={{flexShrink:0}}>
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2.2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
              </a>
              <a
                href={urls[slide.cta2.page] || "#"}
                title={slide.cta2.label}
                style={S.cta2}
                onMouseEnter={e => { e.currentTarget.style.background='rgba(255,255,255,0.20)'; }}
                onMouseLeave={e => { e.currentTarget.style.background='rgba(255,255,255,0.10)'; }}
              >
                {slide.cta2.label}
              </a>
            </div>

          </div>
        </div>
      </div>

      {/* ── Dots + compteur ── */}
      <div style={S.dotsBar}>
        <div style={{ display:'flex', alignItems:'center', gap:'0.7rem' }}>
          {slides.map((_, i) => (
            <button
              key={i}
              onClick={() => goTo(i)}
              aria-label={`Slide ${i + 1}`}
              style={{ position:'relative', cursor:'pointer', background:'none', border:'none', padding:0 }}
            >
              <div style={{
                borderRadius: '9999px',
                transition: 'all 300ms',
                width: i === current ? '2.5rem' : '0.75rem',
                height: '0.75rem',
                background: i === current ? 'rgba(255,255,255,0.9)' : 'rgba(255,255,255,0.35)',
                overflow: 'hidden',
                position: 'relative',
              }}>
                {i === current && (
                  <div style={{
                    position:'absolute', inset:0,
                    background:'#be123c',
                    borderRadius:'9999px',
                    width:`${progress}%`,
                    transition:'width 100ms linear',
                  }} />
                )}
              </div>
            </button>
          ))}
        </div>

        {/* Compteur */}
        <div style={{ display:'flex', alignItems:'center', gap:'0.5rem', color:'rgba(255,255,255,0.55)', fontSize:'clamp(0.72rem,1.4vw,0.85rem)', fontWeight:700 }}>
          <span style={{ color:'#fff', fontSize:'clamp(0.95rem,1.9vw,1.1rem)' }}>
            {String(current + 1).padStart(2, '0')}
          </span>
          <span style={{ width:'1.75rem', height:'1px', background:'rgba(255,255,255,0.38)', display:'inline-block' }} />
          <span>{String(slides.length).padStart(2, '0')}</span>
        </div>
      </div>

    </section>
  );
};
