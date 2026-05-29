/* ============================================================
   BIONOVA — Organism: HeroCarousel
   VERSION: 20260529-fix
   Restauré + 3 corrections : offset header, dots sous boutons, full-width
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
      titleColor: "text-rose-200",
      subtitle:   "Des formules micronutritionnelles hydratantes et anti-âge pour un teint glowy et une peau éclatante de santé.",
      cta1: { label: "Découvrir la collection", page: "products" },
      cta2: { label: "Nos conseils beauté",     page: "blog"     },
    },
    {
      image:      THEME_URI + "/assets/hero/hero-banner-yoga.webp?v=4",
      badge:      "Équilibre & Sérénité",
      title1:     "L'harmonie parfaite",
      title2:     "du corps et de l'esprit.",
      titleColor: "text-amber-300",
      subtitle:   "Retrouvez un sommeil réparateur et une paix intérieure grâce à nos actifs naturels ciblés pour votre bien-être mental.",
      cta1: { label: "Voir les compléments", page: "products" },
      cta2: { label: "Notre expertise",      page: "about"    },
    },
    {
      image:      THEME_URI + "/assets/hero/hero-factory-production.webp?v=4",
      badge:      "Made in Tunisia",
      title1:     "L'excellence",
      title2:     "de nos laboratoires.",
      titleColor: "text-emerald-300",
      subtitle:   "Chaque formule est le fruit de longs mois de recherche, conçue et fabriquée selon les normes pharmaceutiques les plus strictes.",
      cta1: { label: "Nos engagements", page: "about"   },
      cta2: { label: "Contactez-nous",  page: "contact" },
    },
    {
      image:      THEME_URI + "/assets/hero/hero-banner-sports.webp?v=4",
      badge:      "Vitalité & Performance",
      title1:     "Dépassez",
      title2:     "vos limites.",
      titleColor: "text-sky-300",
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

  return (
    /*
      FIX — Section plein écran. L'image couvre tout (y compris derrière le header).
      Le CONTENU est poussé sous le header via paddingTop.
    */
    <section
      className="relative w-full overflow-hidden flex flex-col"
      style={{
        height: '100vh',
        minHeight: '600px',
      }}
      aria-label="Carrousel principal"
    >
      {/* ── Images de fond (Ken Burns) ── */}
      {slides.map((s, i) => (
        <div
          key={i}
          aria-hidden="true"
          className={`absolute inset-0 transition-opacity duration-1000 ${i === current ? 'opacity-100' : 'opacity-0'}`}
        >
          <img
            src={s.image}
            alt=""
            className="w-full h-full object-cover object-center"
            style={{
              transform: i === current ? 'scale(1.05)' : 'scale(1)',
              transformOrigin: i % 2 === 0 ? 'center center' : 'top right',
              transition: 'transform 8s ease-out',
            }}
            loading={i === 0 ? "eager" : "lazy"}
            decoding={i === 0 ? "sync" : "async"}
            width="1920"
            height="1080"
            fetchpriority={i === 0 ? "high" : "low"}
          />
        </div>
      ))}

      {/* ── Overlays ── */}
      <div className="absolute inset-0 bg-gradient-to-r from-gray-900/75 via-gray-900/45 to-transparent" />
      <div className="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-gray-900/20" />

      {/* ── Contenu — poussé sous le header par paddingTop ── */}
      <div className="relative z-10 flex-1 flex items-center w-full">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full"
          style={{ paddingTop: '50px', paddingBottom: '5rem' }}>
          <div
            className="md:w-[60%] transition-all duration-700 ease-out"
            style={{ opacity: fade ? 1 : 0, transform: fade ? 'translateY(0)' : 'translateY(20px)' }}
          >
            {/* Badge */}
            <div className="inline-flex items-center gap-2 px-5 py-2.5 bg-white/15 backdrop-blur-md text-white font-bold tracking-widest uppercase text-xs rounded-full mb-6 border border-white/25 shadow-lg">
              <span className="w-2 h-2 rounded-full bg-green-400 animate-pulse flex-shrink-0" />
              {slide.badge}
            </div>

            {/* Titre */}
            <h1 className="font-display font-extrabold text-white leading-tight"
              style={{ fontSize: 'clamp(2rem, 5.5vw, 4.5rem)', lineHeight: 1.1 }}>
              <span className="block mb-1">{slide.title1}</span>
              <span className={`block ${slide.titleColor}`}>{slide.title2}</span>
            </h1>

            {/* Sous-titre */}
            <p className="mt-6 text-gray-200 leading-relaxed max-w-xl"
              style={{ fontSize: 'clamp(0.95rem, 1.8vw, 1.15rem)' }}>
              {slide.subtitle}
            </p>

            {/* FIX 2 — Boutons CTA (flex-wrap pour ne jamais déborder) */}
            <div className="mt-10 flex flex-wrap gap-4 items-center">
              <a
                href={urls[slide.cta1.page] || "#"}
                title={slide.cta1.label}
                className="inline-flex items-center gap-2 px-8 py-4 text-base font-bold rounded-2xl text-white bg-[#be123c] hover:bg-[#9d0e31] transition-all shadow-xl hover:-translate-y-1 whitespace-nowrap"
              >
                {slide.cta1.label}
                <svg className="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
              </a>
              <a
                href={urls[slide.cta2.page] || "#"}
                title={slide.cta2.label}
                className="inline-flex items-center justify-center px-8 py-4 text-base font-bold rounded-2xl text-white border border-white/30 bg-white/10 hover:bg-white/20 backdrop-blur-sm transition-all whitespace-nowrap"
              >
                {slide.cta2.label}
              </a>
            </div>

            {/* FIX 3 — Dots EN DESSOUS des boutons, dans le flux normal */}
            <div className="mt-10 flex items-center justify-between">
              {/* Dots de navigation */}
              <div className="flex items-center gap-3">
                {slides.map((_, i) => (
                  <button
                    key={i}
                    onClick={() => goTo(i)}
                    aria-label={`Slide ${i + 1}`}
                    className="relative cursor-pointer p-1"
                  >
                    <div style={{
                      borderRadius: '9999px',
                      transition: 'all 300ms',
                      width: i === current ? '2.5rem' : '0.75rem',
                      height: '0.75rem',
                      background: i === current ? 'rgba(255,255,255,0.9)' : 'rgba(255,255,255,0.4)',
                      overflow: 'hidden',
                      position: 'relative',
                    }}>
                      {i === current && (
                        <div style={{
                          position: 'absolute', inset: 0,
                          background: '#be123c',
                          borderRadius: '9999px',
                          width: `${progress}%`,
                          transition: 'width 100ms linear',
                        }} />
                      )}
                    </div>
                  </button>
                ))}
              </div>

              {/* Compteur */}
              <div className="flex items-center gap-2 text-white/60 text-sm font-bold">
                <span className="text-white text-lg">{String(current + 1).padStart(2, '0')}</span>
                <span className="w-8 h-px bg-white/40 inline-block" />
                <span>{String(slides.length).padStart(2, '0')}</span>
              </div>
            </div>

          </div>
        </div>
      </div>

    </section>
  );
};
