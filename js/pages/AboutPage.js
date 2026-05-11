/* ============================================================
   BIONOVA — Page: AboutPage
   VERSION: 20260511
   Depends on: BeakerIcon, LeafIcon, ShieldIcon
   ============================================================ */

const AboutPage = () => (
  <div className="bg-white min-h-screen">
    {/* Hero Section */}
    <section className="relative pt-40 pb-32 overflow-hidden bg-gray-900 text-white">
      <div className="absolute inset-0 z-0">
        <img src={THEME_URI + "/assets/brand/expertise-hero.png"} alt="Laboratoire Bionova" className="w-full h-full object-cover opacity-30" />
        <div className="absolute inset-0 bg-gradient-to-b from-gray-900 via-transparent to-gray-900"></div>
      </div>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="max-w-3xl">
          <h2 className="text-bionova-red font-black tracking-[0.3em] uppercase mb-6">Notre ADN Scientifique</h2>
          <h1 className="font-display text-5xl sm:text-7xl font-black mb-8 leading-tight">L'excellence au service de la cellule.</h1>
          <p className="text-xl text-gray-300 leading-relaxed mb-8">Fondé par des experts en biotechnologie, Bionova repousse les limites de la micronutrition pour offrir des solutions de santé hautement biodisponibles.</p>
        </div>
      </div>
    </section>

    {/* Philosophy Section */}
    <section className="py-32 bg-white">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
          <div className="relative group">
            <div className="absolute -inset-4 bg-bionova-red/10 rounded-[3rem] blur-2xl group-hover:bg-bionova-red/20 transition-all"></div>
            <img src={THEME_URI + "/assets/brand/expertise-hero.png"} alt="Innovation" className="relative rounded-[3rem] shadow-2xl z-10" />
          </div>
          <div>
            <h2 className="font-display text-4xl font-black text-gray-900 mb-8">Une vision sans compromis sur la pureté.</h2>
            <div className="space-y-8">
              <div className="flex gap-6">
                <div className="shrink-0 w-14 h-14 rounded-2xl bg-medical-light flex items-center justify-center text-bionova-red font-black text-2xl">01</div>
                <div>
                  <h3 className="text-xl font-bold mb-2">Sélection Drastique</h3>
                  <p className="text-gray-500 leading-relaxed">Nous sélectionnons uniquement des matières premières dont l'efficacité est validée par des études cliniques rigoureuses.</p>
                </div>
              </div>
              <div className="flex gap-6">
                <div className="shrink-0 w-14 h-14 rounded-2xl bg-medical-light flex items-center justify-center text-bionova-red font-black text-2xl">02</div>
                <div>
                  <h3 className="text-xl font-bold mb-2">Zéro Controversé</h3>
                  <p className="text-gray-500 leading-relaxed">Bionova bannit systématiquement les nanoparticules, les colorants artificiels et les excipients chimiques de ses formules.</p>
                </div>
              </div>
              <div className="flex gap-6">
                <div className="shrink-0 w-14 h-14 rounded-2xl bg-medical-light flex items-center justify-center text-bionova-red font-black text-2xl">03</div>
                <div>
                  <h3 className="text-xl font-bold mb-2">Biodisponibilité Maximale</h3>
                  <p className="text-gray-500 leading-relaxed">Nous utilisons des formes galéniques et des vecteurs d'actifs qui garantissent une absorption optimale par votre organisme.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {/* Standards Section */}
    <section className="py-32 bg-gray-50 border-y border-gray-100">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-20">
          <h2 className="text-bionova-red font-bold tracking-widest uppercase mb-4">Engagements Qualité</h2>
          <p className="font-display text-4xl font-extrabold text-gray-900">Nos Standards Internationaux</p>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-12">
          {[
            { icon: BeakerIcon, title: "Recherche & Développement", desc: "Plus de 24 mois de R&D pour chaque nouvelle formule avant sa mise sur le marché." },
            { icon: LeafIcon, title: "Fabrication Certifiée", desc: "Production sous atmosphère contrôlée respectant les normes GMP et ISO 22000." },
            { icon: ShieldIcon, title: "Contrôles Tiers", desc: "Chaque lot est analysé par un laboratoire indépendant pour garantir pureté et dosage." },
          ].map((pillar) => (
            <div key={pillar.title} className="bg-white p-12 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all text-center">
              <div className="w-20 h-20 rounded-3xl bg-gray-50 flex items-center justify-center mx-auto mb-8 text-bionova-red">
                <pillar.icon className="w-10 h-10" />
              </div>
              <h3 className="font-display text-2xl font-bold mb-4">{pillar.title}</h3>
              <p className="text-gray-500 leading-relaxed">{pillar.desc}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  </div>
);
