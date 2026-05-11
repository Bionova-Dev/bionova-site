/* ============================================================
   BIONOVA — Organism: HeroCarousel
   VERSION: 20260511
   Auto-rotating hero with dot indicators
   ============================================================ */

const HeroCarousel = ({ onNavigate }) => {
  const slides = [
    {
      image: THEME_URI + "/assets/hero/hero-banner.png",
      badge: "Laboratoire Bionova",
      title1: "L'innovation",
      title2: "micronutrition.",
      titleColor: "text-red-300",
      subtitle: "Des formules ultra-concentrées, développées par des experts pour sublimer votre vitalité au quotidien.",
      cta1: { label: "Découvrir la gamme", page: "products" },
      cta2: { label: "Notre expertise", page: "about" },
    },
    {
      image: THEME_URI + "/assets/hero/hero-factory-production.png",
      badge: "Made in Tunisia",
      title1: "Fabriqué dans",
      title2: "nos laboratoires.",
      titleColor: "text-green-300",
      subtitle: "Chaque produit est conçu, formulé et conditionné en Tunisie dans le respect des normes les plus strictes.",
      cta1: { label: "Voir nos produits", page: "products" },
      cta2: { label: "Contactez-nous", page: "contact" },
    },
    {
      image: THEME_URI + "/assets/hero/hero-usine-falling-capsules.png",
      badge: "Qualité Pharmaceutique",
      title1: "Des actifs purs,",
      title2: "des résultats prouvés.",
      titleColor: "text-sky-300",
      subtitle: "Zéro additif controversé. Des dosages cliniques. La transparence totale sur chaque ingrédient.",
      cta1: { label: "Explorer la boutique", page: "products" },
      cta2: { label: "Nos engagements", page: "about" },
    },
  ];

  const [current, setCurrent] = React.useState(0);
  const [fade, setFade] = React.useState(true);
  const timerRef = React.useRef(null);

  const goTo = (idx) => {
    setFade(false);
    setTimeout(() => {
      setCurrent(idx);
      setFade(true);
    }, 300);
  };

  React.useEffect(() => {
    timerRef.current = setInterval(() => {
      setFade(false);
      setTimeout(() => {
        setCurrent((prev) => (prev + 1) % slides.length);
        setFade(true);
      }, 300);
    }, 7000);
    return () => clearInterval(timerRef.current);
  }, []);

  const slide = slides[current];

  return (
    <section className="relative h-[85vh] min-h-[600px] flex items-center overflow-hidden">
      {/* Background Images */}
      {slides.map((s, i) => (
        <img
          key={i}
          src={s.image}
          alt=""
          className={`absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ${i === current ? 'opacity-100' : 'opacity-0'}`}
          loading={i === 0 ? "eager" : "lazy"}
          decoding={i === 0 ? "sync" : "async"}
          width="1920"
          height="1080"
          aria-hidden="true"
        />
      ))}

      {/* Dark overlay */}
      <div className="absolute inset-0 bg-gray-900/45 backdrop-blur-[2px]"></div>

      {/* Content */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div
          className="text-center md:text-left md:w-[65%] transition-opacity duration-700 ease-in-out"
          style={{ opacity: fade ? 1 : 0 }}
        >
          <div className="inline-block px-4 py-2 bg-white/20 backdrop-blur-md text-white font-bold tracking-widest uppercase text-xs rounded-full mb-8 border border-white/30 shadow-lg">
            {slide.badge}
          </div>
          <h1 className="font-display text-3xl sm:text-5xl lg:text-7xl tracking-tight font-extrabold text-white leading-tight">
            <span className="block mb-2">{slide.title1}</span>
            <span className={`block ${slide.titleColor}`}>{slide.title2}</span>
          </h1>
          <p className="mt-8 text-lg text-gray-200 sm:text-xl max-w-2xl leading-relaxed">
            {slide.subtitle}
          </p>
          <div className="mt-12 sm:flex sm:justify-center md:justify-start gap-4">
            <button
              onClick={() => onNavigate(slide.cta1.page)}
              className="w-full sm:w-auto flex items-center justify-center px-10 py-4 text-lg font-bold rounded-2xl text-white bg-bionova-red hover:bg-blue-600 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-1"
              title={slide.cta1.label}
            >
              {slide.cta1.label}
            </button>
            <button
              onClick={() => onNavigate(slide.cta2.page)}
              className="mt-4 sm:mt-0 w-full sm:w-auto flex items-center justify-center px-10 py-4 border border-white/30 backdrop-blur-sm text-lg font-bold rounded-2xl text-white bg-white/10 hover:bg-white/20 transition-all shadow-sm"
              title={slide.cta2.label}
            >
              {slide.cta2.label}
            </button>
          </div>
        </div>
      </div>

      {/* Dot indicators */}
      <div className="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 flex items-center gap-3">
        {slides.map((_, i) => (
          <button
            key={i}
            onClick={() => goTo(i)}
            aria-label={`Slide ${i + 1}`}
            className={`rounded-full transition-all duration-300 ${
              i === current
                ? "w-8 h-3 bg-white shadow-lg"
                : "w-3 h-3 bg-white/50 hover:bg-white/80"
            }`}
          />
        ))}
      </div>
    </section>
  );
};
