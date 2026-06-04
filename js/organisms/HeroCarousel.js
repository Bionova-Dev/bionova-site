/* ============================================================
   BIONOVA — Organism: HeroCarousel
   VERSION: 20260514
   Auto-rotating hero with dot indicators + parallax + progress bar
   ============================================================ */

const HeroCarousel = ({ onNavigate }) => {
  const urls = {
    'home': BIONOVA_HOME_URL,
    'products': BIONOVA_ROUTES.products,
    'blog': BIONOVA_ROUTES.blog,
    'about': BIONOVA_ROUTES.about,
    'contact': BIONOVA_ROUTES.contact,
  };

  const slides = [
    {
      image: THEME_URI + "/assets/hero/hero-banner-new.webp",
      badge: "L'Excellence Micronutritionnelle",
      title1: "La science au",
      title2: "service de la vie.",
      titleColor: "text-rose-200",
      subtitle: "Bionova redéfinit la vitalité à travers des formules de haute biodisponibilité, conçues au cœur de nos laboratoires tunisiens.",
      cta1: { label: "Découvrir la collection", page: "products" },
      cta2: { label: "Notre héritage", page: "about" },
    },
    {
      image: THEME_URI + "/assets/hero/hero-lab-innovation.webp",
      badge: "Qualité Pharmaceutique",
      title1: "Formulé par",
      title2: "des scientifiques.",
      titleColor: "text-amber-300",
      subtitle: "Chaque formule est le fruit de 24 mois de recherche par notre équipe de biochimistes et pharmaciens.",
      cta1: { label: "Nos engagements", page: "about" },
      cta2: { label: "Contactez-nous", page: "contact" },
    },
    {
      image: THEME_URI + "/assets/hero/hero-factory-production.webp",
      badge: "Made in Tunisia",
      title1: "Fabriqué dans",
      title2: "nos laboratoires.",
      titleColor: "text-emerald-300",
      subtitle: "Chaque produit est conçu, formulé et conditionné en Tunisie dans le respect des normes les plus strictes.",
      cta1: { label: "Voir nos produits", page: "products" },
      cta2: { label: "Contactez-nous", page: "contact" },
    },
    {
      image: THEME_URI + "/assets/hero/hero-ingredients-natural.webp",
      badge: "100% Naturel",
      title1: "Des actifs purs,",
      title2: "des résultats prouvés.",
      titleColor: "text-sky-300",
      subtitle:   "Une énergie débordante au quotidien. Nos compléments vous accompagnent dans votre mode de vie actif et sportif pour des résultats prouvés.",
      cta1: { label: "Explorer la boutique", page: "products" },
      cta2: { label: "Nos astuces santé",    page: "blog"     },
    },
  ];

  const SLIDE_DURATION = 7000;
  const [current, setCurrent] = React.useState(0);
  const [fade, setFade] = React.useState(true);
  const [progress, setProgress] = React.useState(0);
  const timerRef = React.useRef(null);
  const progressRef = React.useRef(null);

  const startProgressBar = () => {
    setProgress(0);
    if (progressRef.current) cancelAnimationFrame(progressRef.current);
    const startTime = performance.now();
    const animate = (now) => {
      const elapsed = now - startTime;
      const pct = Math.min((elapsed / SLIDE_DURATION) * 100, 100);
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
    <section className="relative h-[85vh] min-h-[480px] lg:min-h-[650px] flex items-center overflow-hidden" aria-label="Carrousel principal">
      {/* Background Images with Ken Burns */}
      {slides.map((s, i) => (
        <div
          key={i}
          className={`absolute inset-0 transition-opacity duration-1000 ${i === current ? 'opacity-100' : 'opacity-0'}`}
          aria-hidden="true"
        >
          <img
            src={s.image}
            alt=""
            className={`w-full h-full object-cover ${i === current ? 'scale-105' : 'scale-100'}`}
            style={{ transition: 'transform 8s ease-out', transformOrigin: i % 2 === 0 ? 'center center' : 'top right' }}
            loading={i === 0 ? "eager" : "lazy"}
            decoding={i === 0 ? "sync" : "async"}
            width="1920"
            height="1080"
            fetchpriority={i === 0 ? "high" : "low"}
          />
        </div>
      ))}

      {/* Gradient overlays */}
      <div className="absolute inset-0 bg-gradient-to-r from-gray-900/70 via-gray-900/40 to-transparent"></div>
      <div className="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-gray-900/20"></div>

      {/* Content */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div
          className="md:w-[65%] transition-all duration-700 ease-out"
          style={{ opacity: fade ? 1 : 0, transform: fade ? 'translateY(0)' : 'translateY(20px)' }}
        >
          <div className="inline-flex items-center px-5 py-2.5 bg-white/15 backdrop-blur-md text-white font-bold tracking-widest uppercase text-xs rounded-full mb-8 border border-white/25 shadow-lg gap-2">
            <span className="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
            {slide.badge}
          </div>
          <h1 className="font-display text-3xl sm:text-4xl lg:text-6xl xl:text-7xl tracking-tight font-extrabold text-white leading-[1.1]">
            <span className="block mb-2">{slide.title1}</span>
            <span className={`block ${slide.titleColor}`}>{slide.title2}</span>
          </h1>
          <p className="mt-8 text-lg text-gray-200 sm:text-xl max-w-2xl leading-relaxed">
            {slide.subtitle}
          </p>
          <div className="mt-12 flex flex-col sm:flex-row gap-4">
            <a
              href={urls[slide.cta1.page] || "#"}
              className="flex items-center justify-center px-6 py-3.5 sm:px-10 sm:py-4 text-base sm:text-lg font-bold rounded-2xl text-white bg-bionova-red hover:bg-red-800 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-1 group cursor-pointer"
              title={slide.cta1.label}
            >
              {slide.cta1.label}
              <svg className="w-5 h-5 ml-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
            <a
              href={urls[slide.cta2.page] || "#"}
              className="flex items-center justify-center px-6 py-3.5 sm:px-10 sm:py-4 border border-white/30 backdrop-blur-sm text-base sm:text-lg font-bold rounded-2xl text-white bg-white/10 hover:bg-white/20 transition-all shadow-sm cursor-pointer"
              title={slide.cta2.label}
            >
              {slide.cta2.label}
            </a>
          </div>
        </div>
      </div>

      {/* Bottom: Progress dots + slide counter */}
      <div className="absolute bottom-8 left-0 right-0 z-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
          {/* Dots */}
          <div className="flex items-center gap-3">
            {slides.map((_, i) => (
              <button
                key={i}
                onClick={() => goTo(i)}
                aria-label={`Slide ${i + 1}`}
                className="relative cursor-pointer"
              >
                <div className={`rounded-full transition-all duration-300 ${i === current ? "w-10 h-3 bg-white shadow-lg" : "w-3 h-3 bg-white/40 hover:bg-white/70"}`}>
                  {i === current && (
                    <div 
                      className="absolute inset-0 bg-bionova-red rounded-full"
                      style={{ width: `${progress}%`, transition: 'width 100ms linear' }}
                    />
                  )}
                </div>
              </button>
            ))}
          </div>
          {/* Slide counter */}
          <div className="hidden sm:flex items-center gap-2 text-white/60 text-sm font-bold">
            <span className="text-white text-lg">{String(current + 1).padStart(2, '0')}</span>
            <span className="w-8 h-px bg-white/40"></span>
            <span>{String(slides.length).padStart(2, '0')}</span>
          </div>
        </div>
      </div>
    </section>
  );
};
