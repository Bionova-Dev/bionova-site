/* ============================================================
   BIONOVA — Home Section: Testimonials
   ============================================================ */

const HomeTestimonials = () => {
  const testimonials = [
    { name: "Sonia B.", city: "Tunis", rating: 5, text: "Le NMN a changé ma vie. Plus d'énergie, meilleur sommeil. Je recommande à 100%.", product: "NMN" },
    { name: "Karim M.", city: "Sousse", rating: 5, text: "Ashwagandha incroyable pour gérer le stress au travail. Résultats en 2 semaines.", product: "Ashwagandha" },
    { name: "Amira T.", city: "Sfax", rating: 5, text: "Le Pack Glowy m'a redonné un teint lumineux. Mon entourage me demande mon secret !", product: "Pack Glowy" },
  ];

  return (
    <section className="py-28 bg-white border-t border-gray-100">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-20">
          <h2 className="text-sm text-[#be123c] font-bold tracking-widest uppercase mb-3">Témoignages</h2>
          <p className="font-display text-4xl font-extrabold text-gray-900 sm:text-5xl">Ce que disent nos clients</p>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {testimonials.map((t, i) => (
            <div key={i} className="bg-gray-50 rounded-[2.5rem] p-10 border border-gray-100 hover:shadow-xl transition-all duration-500 relative group">
              <div className="absolute -top-4 left-10 text-6xl text-[#be123c]/10 font-display font-black leading-none">"</div>
              <div className="flex items-center mb-2">
                {[...Array(5)].map((_, j) => (<StarIcon key={j} className="w-4 h-4 text-yellow-400 fill-yellow-400" />))}
              </div>
              <p className="text-gray-600 leading-relaxed mb-8 text-lg italic">"{t.text}"</p>
              <div className="flex items-center justify-between">
                <div>
                  <p className="font-bold text-gray-900">{t.name}</p>
                  <p className="text-xs text-gray-400 font-bold uppercase tracking-widest">{t.city}</p>
                </div>
                <span className="px-3 py-1 bg-[#be123c]/5 text-[#be123c] text-xs font-bold rounded-full">{t.product}</span>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};
