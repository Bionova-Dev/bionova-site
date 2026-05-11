/* ============================================================
   BIONOVA — Page: AboutPage
   VERSION: 20260511
   Depends on: BeakerIcon, LeafIcon, ShieldIcon
   ============================================================ */

const AboutPage = () => (
  <div className="pt-32 pb-32 bg-white min-h-screen">
    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
        <div>
          <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Notre Laboratoire</h2>
          <h1 className="font-display text-5xl sm:text-6xl font-extrabold text-gray-900 mb-8 leading-tight">L'innovation au service de la cellule.</h1>
          <p className="text-xl text-gray-600 leading-relaxed mb-6">Fondé par des passionnés de micronutrition et de biotechnologie, le laboratoire Bionova repousse les limites de la supplémentation naturelle.</p>
          <p className="text-xl text-gray-600 leading-relaxed">Nous croyons fermement que la nature offre les principes actifs les plus puissants. Notre mission est de les isoler, de les concentrer et de les rendre hautement biodisponibles.</p>
        </div>
        <div className="relative rounded-[3rem] overflow-hidden shadow-2xl h-[500px]">
          <img src={THEME_URI + "/assets/brand/expertise-hero.png"} alt="Laboratoire" className="w-full h-full object-cover" loading="lazy" decoding="async" width="800" height="600" />
          <div className="absolute inset-0 bg-bionova-red opacity-10 mix-blend-multiply"></div>
        </div>
      </div>
      <div className="bg-gray-50 rounded-[4rem] p-16 md:p-24 border border-gray-100 text-center">
        <h2 className="font-display text-4xl font-extrabold text-gray-900 mb-16">Nos piliers fondateurs</h2>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-12">
          {[
            { icon: BeakerIcon, title: "Innovation Scientifique", desc: "Des formules basées sur les dernières études cliniques, optimisant les synergies entre actifs." },
            { icon: LeafIcon, title: "Pureté Absolue", desc: "Zéro additif chimique, nanoparticule ou excipient controversé. Le meilleur, et rien d'autre." },
            { icon: ShieldIcon, title: "Traçabilité Totale", desc: "Des matières premières rigoureusement sélectionnées et des lots testés par des laboratoires indépendants." },
          ].map((pillar) => (
            <div key={pillar.title}>
              <div className="bg-white w-20 h-20 rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-8 text-bionova-red"><pillar.icon className="w-10 h-10" /></div>
              <h3 className="font-display text-2xl font-bold mb-4">{pillar.title}</h3>
              <p className="text-gray-500 leading-relaxed">{pillar.desc}</p>
            </div>
          ))}
        </div>
      </div>
    </div>
  </div>
);
