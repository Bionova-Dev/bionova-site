/* ============================================================
   BIONOVA — Page: ProductsPage
   VERSION: 20260522
   Depends on: ProductCard, SearchIcon, framer-motion
   ============================================================ */

const ProductsPage = ({ products, onAddToCart, onProductClick, activeCategory, onCategoryChange }) => {
  const [searchQuery, setSearchQuery] = React.useState(() => {
    const params = new URLSearchParams(window.location.search);
    return params.get('s') || '';
  });
  const [sortBy, setSortBy] = React.useState('default');

  const motion = window.Motion ? window.Motion.motion : null;
  const AnimatePresence = window.Motion ? window.Motion.AnimatePresence : ({children}) => <>{children}</>;
  const GridWrapper = motion ? motion.div : 'div';

  const filtered = React.useMemo(() => {
    let list = products;
    if (activeCategory !== 'all') {
      const cat = BIONOVA_CATEGORIES.find(c => c.id === activeCategory);
      if (cat && cat.match) list = list.filter(p => cat.match.includes(p.id));
    }
    if (searchQuery.trim()) {
      const q = searchQuery.toLowerCase();
      list = list.filter(p => p.name.toLowerCase().includes(q) || p.description.toLowerCase().includes(q));
    }
    if (sortBy === 'price-asc') list = [...list].sort((a, b) => a.price - b.price);
    else if (sortBy === 'price-desc') list = [...list].sort((a, b) => b.price - a.price);
    else if (sortBy === 'rating') list = [...list].sort((a, b) => b.rating - a.rating);
    return list;
  }, [activeCategory, searchQuery, sortBy, products]);

  // Framer Motion variants for grid stagger
  const containerVariants = {
    hidden: { opacity: 0 },
    show: {
      opacity: 1,
      transition: { staggerChildren: 0.1 }
    }
  };

  return (
    <div className="bg-white min-h-screen">
      {/* Catalog Header */}
      <section className="pt-20 lg:pt-24 pb-8 bg-gray-50 border-b border-gray-100">
        <div className="max-w-[1800px] mx-auto px-4 sm:px-6 lg:px-12">
          
          <div className="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8 mt-6">
            <div>
              <h1 className="font-display text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-black text-gray-900 mb-2">
                {activeCategory === 'all' ? 'La Boutique Bionova' : BIONOVA_CATEGORIES.find(c => c.id === activeCategory)?.label}
              </h1>
              <p className="text-lg text-gray-500 max-w-2xl">
                {activeCategory === 'all' 
                  ? 'Tous nos compléments alimentaires sur une seule page.'
                  : BIONOVA_CATEGORIES.find(c => c.id === activeCategory)?.description}
              </p>
            </div>
            
            {/* Sort Dropdown */}
            <div className="shrink-0 w-full md:w-auto">
              <select
                value={sortBy}
                onChange={(e) => setSortBy(e.target.value)}
                className="py-3 px-5 bg-white border border-gray-200 rounded-2xl text-gray-700 text-sm font-bold outline-none focus:border-bionova-red transition-all appearance-none cursor-pointer w-full md:w-64 shadow-sm"
              >
                <option value="default">Trier par défaut</option>
                <option value="price-asc">Prix croissant</option>
                <option value="price-desc">Prix décroissant</option>
                <option value="rating">Meilleures notes</option>
              </select>
            </div>
          </div>
          
        </div>
      </section>

      {/* Results count */}
      <div className="max-w-[1800px] mx-auto px-4 sm:px-6 lg:px-12 py-6">
        <p className="text-sm text-gray-400 font-bold">{filtered.length} produit{filtered.length > 1 ? 's' : ''} trouvé{filtered.length > 1 ? 's' : ''}</p>
      </div>

      {/* Grid */}
      <section className="pb-24">
        <div className="max-w-[1800px] mx-auto px-4 sm:px-6 lg:px-12">
          {filtered.length > 0 ? (
            <GridWrapper 
              {...(motion ? { variants: containerVariants, initial: "hidden", animate: "show" } : {})}
              className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-6 sm:gap-8"
            >
              <AnimatePresence mode={motion ? "popLayout" : undefined}>
                {filtered.map(product => (
                  <ProductCard 
                    key={product.id} 
                    product={product} 
                    onAddToCart={onAddToCart} 
                    onClick={onProductClick} 
                  />
                ))}
              </AnimatePresence>
            </GridWrapper>
          ) : (
            <div className="text-center py-20 bg-gray-50 rounded-3xl border border-gray-100">
              <SearchIcon className="w-16 h-16 text-gray-300 mx-auto mb-6" />
              <p className="text-2xl font-bold text-gray-400 mb-2">Aucun produit trouvé</p>
              <p className="text-gray-500 mb-8">Essayez d'ajuster vos critères de recherche ou de catégorie.</p>
              <button 
                onClick={() => { onCategoryChange('all'); setSearchQuery(''); }} 
                className="px-8 py-3 bg-gray-900 text-white font-bold rounded-2xl hover:bg-bionova-red transition-colors cursor-pointer shadow-lg"
              >
                Voir tous les produits
              </button>
            </div>
          )}
        </div>
      </section>
    </div>
  );
};
