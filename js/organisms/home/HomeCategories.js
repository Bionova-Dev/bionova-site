/* ============================================================
   BIONOVA — Home Section: Categories
   VERSION: 20260522
   Design premium unifié — chaque catégorie a son propre style
   ============================================================ */

const HomeCategories = ({ onNavigate, onCategoryChange }) => {
  // Filter out 'all' — show only real categories
  const cats = BIONOVA_CATEGORIES.filter(c => c.id !== 'all');

  return (
    <section className="py-24 bg-white">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {/* Section Header */}
        <div className="text-center mb-16">
          <span className="inline-block text-xs font-black tracking-[0.25em] uppercase text-[#e4002b] mb-4 px-4 py-1.5 bg-[#e4002b]/8 rounded-full">
            Parcourir
          </span>
          <h2 className="font-display text-4xl sm:text-5xl font-black text-gray-900 mt-3">
            Nos Catégories
          </h2>
          <p className="mt-4 text-gray-400 text-base max-w-xl mx-auto">
            Des formules ciblées pour chaque besoin — choisissez votre objectif santé.
          </p>
        </div>

        {/* Category Grid — identical design for ALL categories */}
        <div className="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-6">
          {cats.map((cat) => (
            <a
              key={cat.id}
              href={`/categorie/${cat.id}/`}
              onClick={(e) => {
                if (onCategoryChange) {
                  e.preventDefault();
                  onCategoryChange(cat.id);
                }
              }}
              className="group relative overflow-hidden rounded-3xl border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-400 cursor-pointer"
              style={{ backgroundColor: cat.bg || '#f8fafc' }}
            >
              {/* Gradient accent top-right */}
              <div
                className="absolute -top-10 -right-10 w-32 h-32 sm:w-40 sm:h-40 rounded-full opacity-15 group-hover:opacity-25 transition-opacity duration-400"
                style={{ background: `radial-gradient(circle, ${cat.color}, transparent)` }}
              />

              <div className="relative p-4 sm:p-8 flex flex-col h-full min-h-[160px] sm:min-h-[200px]">
                {/* Icon badge */}
                <div
                  className="w-10 h-10 sm:w-14 sm:h-14 rounded-[12px] sm:rounded-2xl flex items-center justify-center mb-3 sm:mb-6 shadow-md transition-transform duration-300 group-hover:scale-110 shrink-0"
                  style={{ background: `linear-gradient(135deg, ${cat.color}22, ${cat.color}44)` }}
                >
                  <svg
                    className="w-5 h-5 sm:w-7 sm:h-7 transition-colors duration-300"
                    style={{ color: cat.color }}
                    fill="none"
                    stroke="currentColor"
                    strokeWidth="1.75"
                    viewBox="0 0 24 24"
                  >
                    <path strokeLinecap="round" strokeLinejoin="round" d={cat.icon} />
                  </svg>
                </div>

                {/* Label */}
                <h3
                  className="font-display text-sm sm:text-xl font-black uppercase tracking-wide mb-1 sm:mb-2 transition-colors duration-300 line-clamp-1"
                  style={{ color: cat.color }}
                  title={cat.label}
                >
                  {cat.label}
                </h3>

                {/* Description */}
                <p className="text-[10px] sm:text-sm text-gray-500 leading-snug sm:leading-relaxed flex-1 line-clamp-2 sm:line-clamp-none">
                  {cat.description}
                </p>

                {/* CTA arrow */}
                <div className="mt-3 sm:mt-6 flex items-center gap-1.5 sm:gap-2 text-[10px] sm:text-xs font-bold uppercase tracking-widest transition-all duration-300 group-hover:gap-2 sm:group-hover:gap-3"
                  style={{ color: cat.color }}
                >
                  <span className="hidden xs:inline">Découvrir</span>
                  <span className="inline xs:hidden">Voir</span>
                  <svg className="w-3 h-3 sm:w-4 sm:h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                  </svg>
                </div>
              </div>

              {/* Bottom color bar */}
              <div
                className="h-1 w-0 group-hover:w-full transition-all duration-500"
                style={{ background: `linear-gradient(90deg, ${cat.color}, ${cat.color}88)` }}
              />
            </a>
          ))}
        </div>
      </div>
    </section>
  );
};
