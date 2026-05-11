/* ============================================================
   BIONOVA — Page: ProductsPage
   VERSION: 20260511
   Depends on: ProductCard
   ============================================================ */

const ProductsPage = ({ products, onAddToCart, onProductClick }) => {
  return (
    <div className="bg-white min-h-screen">
      {/* Catalog Header */}
      <section className="pt-40 pb-16 bg-gray-50 border-b border-gray-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 className="font-display text-4xl sm:text-6xl font-black text-gray-900 mb-8">La Boutique Bionova</h1>
          
          {/* Categories bar (Visual only) */}
          <div className="flex overflow-x-auto pb-4 gap-4 no-scrollbar">
            {['Tous les produits', 'Vitalité', 'Sommeil', 'Peau & Cheveux', 'Stress', 'Packs'].map((cat, i) => (
              <button key={cat} className={`whitespace-nowrap px-8 py-3 rounded-2xl font-bold text-sm transition-all ${i === 0 ? 'bg-bionova-red text-white shadow-lg' : 'bg-white text-gray-600 hover:bg-gray-100'}`}>
                {cat}
              </button>
            ))}
          </div>
        </div>
      </section>

      {/* Grid */}
      <section className="py-24">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
            {products.map(product => (
              <ProductCard key={product.id} product={product} onAddToCart={onAddToCart} onClick={onProductClick} />
            ))}
          </div>
        </div>
      </section>
    </div>
  );
};
