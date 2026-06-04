/* ============================================================
   BIONOVA — Molecule: CategoryBar
   VERSION: 20260521
   Secondary navigation bar for product categories — VISIBLE ON ALL PAGES
   Smart scroll arrows: hide left arrow at start, hide right at end.
   ============================================================ */

const CategoryBar = ({ activeCategory, onCategoryChange }) => {
  const scrollRef = React.useRef(null);
  const [canScrollLeft, setCanScrollLeft] = React.useState(false);
  const [canScrollRight, setCanScrollRight] = React.useState(true);

  const updateScrollState = React.useCallback(() => {
    const el = scrollRef.current;
    if (!el) return;
    setCanScrollLeft(el.scrollLeft > 5);
    setCanScrollRight(el.scrollLeft < el.scrollWidth - el.clientWidth - 5);
  }, []);

  React.useEffect(() => {
    const el = scrollRef.current;
    if (!el) return;
    updateScrollState();
    el.addEventListener('scroll', updateScrollState, { passive: true });
    window.addEventListener('resize', updateScrollState, { passive: true });
    return () => {
      el.removeEventListener('scroll', updateScrollState);
      window.removeEventListener('resize', updateScrollState);
    };
  }, [updateScrollState]);

  const scroll = (offset) => {
    const container = scrollRef.current;
    if (container) {
      container.scrollBy({ left: offset, behavior: 'smooth' });
    }
  };

  return (
    <div className="w-full bg-gray-50 border-b border-gray-100 py-4 sticky top-16 lg:top-[90px] z-40 transition-all duration-300">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative flex items-center">
        {/* Left Arrow Button */}
        {canScrollLeft && (
          <div className="absolute left-2 lg:left-6 z-50 transition-all duration-300 hidden md:block">
            <button 
              onClick={() => scroll(-200)}
              className="p-2.5 rounded-xl bg-white/90 backdrop-blur-md shadow-md border border-gray-200 text-gray-700 hover:text-[#e4002b] hover:border-[#e4002b]/20 hover:scale-105 active:scale-95 transition-all cursor-pointer flex items-center justify-center min-w-[44px] min-h-[44px]"
              aria-label="Défiler à gauche"
            >
              <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={3} d="M15 19l-7-7 7-7" /></svg>
            </button>
          </div>
        )}

        {/* Scrollable Container */}
        <div 
          ref={scrollRef}
          className="flex overflow-x-auto gap-3 py-1 scroll-smooth w-full no-scrollbar px-10"
          style={{ scrollbarWidth: 'none', msOverflowStyle: 'none' }}
        >
          {BIONOVA_CATEGORIES.map((cat) => (
            <a
              key={cat.id}
              href={cat.id === 'all' ? '/boutique/' : `/categorie/${cat.id}/`}
              onClick={(e) => {
                e.preventDefault();
                onCategoryChange(cat.id);
              }}
              className={`whitespace-nowrap px-5 py-3 rounded-xl font-bold text-xs uppercase tracking-wider transition-all cursor-pointer inline-flex items-center justify-center ${
                activeCategory === cat.id 
                  ? 'bg-[#e4002b] text-white shadow-lg shadow-[#e4002b]/20 scale-105' 
                  : 'bg-white text-gray-500 hover:bg-gray-100 border border-gray-200'
              }`}
            >
              {cat.label}
            </a>
          ))}
        </div>

        {/* Right Arrow Button */}
        {canScrollRight && (
          <div className="absolute right-2 lg:right-6 z-50 transition-all duration-300 hidden md:block">
            <button 
              onClick={() => scroll(200)}
              className="p-2.5 rounded-xl bg-white/90 backdrop-blur-md shadow-md border border-gray-200 text-gray-700 hover:text-[#e4002b] hover:border-[#e4002b]/20 hover:scale-105 active:scale-95 transition-all cursor-pointer flex items-center justify-center min-w-[44px] min-h-[44px]"
              aria-label="Défiler à droite"
            >
              <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={3} d="M9 5l7 7-7 7" /></svg>
            </button>
          </div>
        )}
      </div>
    </div>
  );
};
