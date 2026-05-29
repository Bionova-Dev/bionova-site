/* ============================================================
   BIONOVA — Home Section: Expertise Teaser
   ============================================================ */

const HomeExpertise = ({ onNavigate }) => {
  return (
    <section className="py-28 bg-gray-50 border-t border-gray-100">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="bg-white rounded-[4rem] p-12 md:p-20 shadow-xl border border-gray-100 flex flex-col lg:flex-row items-center gap-16">
          <div className="lg:w-1/2">
            <h2 className="text-sm text-[#be123c] font-bold tracking-widest uppercase mb-3">Notre Laboratoire</h2>
            <p className="font-display text-4xl font-extrabold text-gray-900 mb-8">L'expertise scientifique au service de votre vitalité</p>
            <p className="text-xl text-gray-500 mb-10 leading-relaxed">Découvrez comment nos experts en micronutrition développent les formules les plus pures et les plus efficaces du marché tunisien.</p>
            <a href={BIONOVA_ROUTES.about} className="px-10 py-5 bg-[#be123c] text-white font-bold rounded-2xl hover:bg-gray-900 transition-all shadow-xl cursor-pointer">Découvrir notre expertise &rarr;</a>
          </div>
          <div className="lg:w-1/2 relative rounded-[3rem] overflow-hidden h-[400px] w-full">
            <img src={THEME_URI + "/assets/brand/about-team-lab.webp"} alt="Équipe scientifique Bionova" className="w-full h-full object-cover" loading="lazy" />
          </div>
        </div>
      </div>
    </section>
  );
};
