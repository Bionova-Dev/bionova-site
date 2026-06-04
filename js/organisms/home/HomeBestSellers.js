/* ============================================================
   BIONOVA — Home Section: BestSellers
   ============================================================ */

const HomeBestSellers = ({ products, onProductClick, onAddToCart, onNavigate }) => {
  const bestSellers = products.filter(p => p.type !== 'pack').slice(0, 6);

  return (
    <section className="py-28 bg-white relative border-t border-gray-100">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-20">
          <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Sélection Premium</h2>
          <p className="font-display text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">Nos Meilleures Ventes</p>
          <p className="mt-6 text-xl text-gray-500 max-w-2xl mx-auto">Les formules les plus plébiscitées pour des résultats optimaux en Tunisie.</p>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
          {bestSellers.map(product => (
            <article key={product.id} onClick={() => onProductClick(product)} className="bg-gray-50 rounded-[3rem] p-10 flex flex-col items-center text-center group border border-gray-100 hover:shadow-2xl hover:border-medical-blue/20 transition-all duration-500 relative cursor-pointer">
              <div className="absolute top-6 right-6 bg-[#e4002b] text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg tracking-wider uppercase z-20">Best Seller</div>
              <InteractiveProductViewer src={product.image} alt={`Produit Bionova : ${product.name}`} className="w-56 h-56 mb-10" noShadow={true} />
              <h3 className="font-display text-2xl font-black text-gray-900 mb-2 group-hover:text-bionova-red transition-colors">{product.name}</h3>
              <p className="text-gray-500 mb-4 line-clamp-2 leading-relaxed text-sm">{product.description}</p>
              <div className="flex items-center space-x-1 mb-8">
                {[...Array(5)].map((_, i) => (
                  <StarIcon key={i} className={`w-3.5 h-3.5 ${i < Math.floor(product.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`} />
                ))}
                <span className="text-[10px] font-bold text-gray-400 ml-2">{product.rating}/5 - {product.reviews} avis</span>
              </div>
              <div className="mt-auto w-full flex items-center justify-between">
                <p className="text-3xl font-black text-bionova-red">{product.price.toFixed(2)} DT</p>
                <div className="flex space-x-2">
                  <button onClick={(e) => { e.stopPropagation(); onProductClick(product); }} className="flex items-center justify-center p-4 border border-gray-200 text-gray-500 hover:text-bionova-red hover:border-medical-blue rounded-xl transition-all cursor-pointer">
                    <ChevronDownIcon className="w-5 h-5 -rotate-90" />
                  </button>
                  <a href="javascript:void(0)" onClick={(e) => { e.preventDefault(); e.stopPropagation(); onAddToCart(product); }} className="flex items-center justify-center bg-gray-900 text-white w-12 h-12 rounded-xl shadow-lg hover:bg-bionova-red transition-all">
                    <ShoppingCartIcon className="w-5 h-5" />
                  </a>
                </div>
              </div>
            </article>
          ))}
        </div>
        <div className="text-center mt-20">
          <a href={BIONOVA_ROUTES.products} className="px-8 py-4 sm:px-12 sm:py-5 bg-[#e4002b] text-white font-bold rounded-2xl hover:bg-gray-900 transition-all shadow-xl hover:-translate-y-1 cursor-pointer">Voir toute la boutique &rarr;</a>
        </div>
      </div>
    </section>
  );
};
