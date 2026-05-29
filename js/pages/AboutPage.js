/* ============================================================
   BIONOVA — Page: AboutPage
   VERSION: 20260514
   Depends on: BeakerIcon, LeafIcon, ShieldIcon
   ============================================================ */

const AboutPage = ({ onNavigate }) => (
  <div className="bg-white min-h-screen">
    {/* Hero Section */}
    <section className="relative pt-36 pb-32 overflow-hidden bg-gray-900 text-white">
      <div className="absolute inset-0 z-0">
        <img src={THEME_URI + "/assets/brand/about-team-lab.webp"} alt="Laboratoire Bionova" className="w-full h-full object-cover opacity-30" loading="eager" decoding="sync" width="1920" height="1080" />
        <div className="absolute inset-0 bg-gradient-to-b from-gray-900 via-transparent to-gray-900"></div>
      </div>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="max-w-3xl">
          <h2 className="text-bionova-red font-black tracking-[0.3em] uppercase mb-6">Notre ADN Scientifique</h2>
          <h1 className="font-display text-5xl sm:text-7xl font-black mb-8 leading-tight">L'excellence au service de la cellule.</h1>
          <p className="text-xl text-gray-300 leading-relaxed mb-10">Fondé par des experts en biotechnologie, Bionova repousse les limites de la micronutrition pour offrir des solutions de santé hautement biodisponibles.</p>
          {onNavigate && (
            <button onClick={() => onNavigate('products')} className="px-10 py-5 bg-bionova-red text-white font-bold rounded-2xl hover:bg-white hover:text-gray-900 transition-all shadow-xl cursor-pointer">Découvrir nos produits &rarr;</button>
          )}
        </div>
      </div>
    </section>

    {/* Philosophy */}
    <section className="py-28 bg-white">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
          <div className="relative group">
            <div className="absolute -inset-4 bg-bionova-red/10 rounded-[3rem] blur-2xl group-hover:bg-bionova-red/20 transition-all"></div>
            <img src={THEME_URI + "/assets/brand/expertise-hero.webp"} alt="Innovation" className="relative rounded-[3rem] shadow-2xl z-10" loading="lazy" decoding="async" width="600" height="400" />
          </div>
          <div>
            <h2 className="font-display text-4xl font-black text-gray-900 mb-8">Une vision sans compromis sur la pureté.</h2>
            <div className="space-y-8">
              {[
                { num: "01", title: "Sélection Drastique", desc: "Nous sélectionnons uniquement des matières premières dont l'efficacité est validée par des études cliniques rigoureuses." },
                { num: "02", title: "Zéro Controversé", desc: "Bionova bannit systématiquement les nanoparticules, les colorants artificiels et les excipients chimiques de ses formules." },
                { num: "03", title: "Biodisponibilité Maximale", desc: "Nous utilisons des formes galéniques et des vecteurs d'actifs qui garantissent une absorption optimale par votre organisme." },
              ].map((item) => (
                <div key={item.num} className="flex gap-6">
                  <div className="shrink-0 w-14 h-14 rounded-2xl bg-medical-light flex items-center justify-center text-bionova-red font-black text-2xl">{item.num}</div>
                  <div>
                    <h3 className="text-xl font-bold mb-2">{item.title}</h3>
                    <p className="text-gray-500 leading-relaxed">{item.desc}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>

    {/* Standards */}
    <section className="py-28 bg-gray-50 border-y border-gray-100">
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
            <div key={pillar.title} className="bg-white p-12 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all text-center group cursor-pointer">
              <div className="w-20 h-20 rounded-3xl bg-gray-50 group-hover:bg-bionova-red/5 flex items-center justify-center mx-auto mb-8 text-bionova-red transition-colors">
                <pillar.icon className="w-10 h-10" />
              </div>
              <h3 className="font-display text-2xl font-bold mb-4">{pillar.title}</h3>
              <p className="text-gray-500 leading-relaxed">{pillar.desc}</p>
            </div>
          ))}
        </div>
      </div>
    </section>

    {/* CTA */}
    <section className="py-24 bg-gray-900 relative overflow-hidden">
      <div className="absolute inset-0 bg-gradient-to-br from-bionova-red/20 to-transparent"></div>
      <div className="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h2 className="font-display text-4xl font-black text-white mb-8">Prêt à transformer votre santé ?</h2>
        <p className="text-xl text-gray-300 mb-12">Découvrez nos formules développées par des experts en biotechnologie.</p>
        {onNavigate && (
          <button onClick={() => onNavigate('products')} className="px-16 py-6 bg-bionova-red text-white text-xl font-black rounded-3xl shadow-2xl hover:bg-white hover:text-gray-900 transition-all transform hover:-translate-y-1 cursor-pointer">Explorer la boutique</button>
        )}
      </div>
    </section>
  </div>
);
