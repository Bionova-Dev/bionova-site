/* ============================================================
   BIONOVA — Home Section: Packs
   ============================================================ */

const HomePacks = ({ products, onProductClick, onAddToCart }) => {
  const packs = products.filter(p => p.type === 'pack');

  return (
    <div className="py-28 bg-medical-light/30 relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex flex-col md:flex-row justify-between items-end mb-16">
          <div className="md:w-2/3">
            <h2 className="text-sm text-[#be123c] font-bold tracking-widest uppercase mb-3">Offres Limitées</h2>
            <p className="font-display text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">Nos Packs Exclusifs</p>
            <p className="mt-6 text-xl text-gray-500">Optimisez vos résultats avec nos synergies d'actifs soigneusement sélectionnées.</p>
          </div>
        </div>
        <div className="grid grid-cols-1 gap-12">
          {packs.map(pack => (
            <div key={pack.id} onClick={() => onProductClick(pack)} className="bg-white rounded-[4rem] overflow-hidden flex flex-col lg:flex-row items-center gold-border hover:shadow-2xl transition-all duration-500 relative group cursor-pointer">
              <div className="lg:w-1/2 p-12 lg:p-20 relative flex justify-center items-center bg-gray-50/50 w-full">
                <div className="absolute top-10 left-10 badge-shiny text-white text-[12px] font-black px-6 py-3 rounded-full shadow-xl tracking-widest uppercase z-20">{pack.badge}</div>
                <div className="relative w-full max-w-md aspect-square flex justify-center items-center">
                  <div className="relative w-64 h-64 sm:w-80 sm:h-80">
                    <img src={pack.image} alt={pack.name} className="absolute top-0 left-0 w-3/4 h-3/4 object-cover object-center drop-shadow-2xl z-10 transform -rotate-6 group-hover:-rotate-12 transition-transform duration-500" loading="lazy" />
                    <img src={pack.image2} alt={pack.name} className="absolute bottom-0 right-0 w-3/4 h-3/4 object-cover object-center drop-shadow-2xl z-0 transform rotate-6 translate-x-4 translate-y-4 group-hover:rotate-12 group-hover:translate-x-8 transition-transform duration-500" loading="lazy" />
                  </div>
                </div>
              </div>
              <div className="lg:w-1/2 p-12 lg:p-20 flex flex-col justify-center">
                <div className="inline-block px-4 py-1.5 bg-rose-50 text-[#be123c] rounded-full text-[10px] font-bold tracking-widest uppercase mb-6 self-start">Nutricosmétique Premium</div>
                <h3 className="font-display text-4xl lg:text-5xl font-black text-gray-900 mb-2 group-hover:text-[#be123c] transition-colors">{pack.name}</h3>
                <p className="text-xl text-gray-500 mb-6 leading-relaxed line-clamp-3">{pack.description}</p>
                <div className="flex items-center space-x-1 mb-10">
                  {[...Array(5)].map((_, i) => (<StarIcon key={i} className={`w-4 h-4 ${i < Math.floor(pack.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`} />))}
                  <span className="text-xs font-bold text-gray-400 ml-2">{pack.rating}/5 - {pack.reviews} avis</span>
                </div>
                <div className="flex items-end space-x-6 mb-12">
                  <div><p className="text-sm text-gray-400 font-bold uppercase tracking-widest mb-1">Prix normal</p><p className="text-2xl text-gray-300 line-through font-bold">{pack.oldPrice.toFixed(2)} DT</p></div>
                  <div><p className="text-sm text-[#be123c] font-bold uppercase tracking-widest mb-1">Prix Pack</p><p className="text-5xl font-black text-[#be123c]">{pack.price.toFixed(2)} <span className="text-xl">DT</span></p></div>
                </div>
                <button onClick={(e) => { e.preventDefault(); e.stopPropagation(); onAddToCart(pack); }} className="w-full py-6 px-10 bg-[#be123c] text-white text-xl font-bold rounded-2xl shadow-xl hover:shadow-2xl transition-all transform hover:-translate-y-1 text-center cursor-pointer">Ajouter le pack au panier</button>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};
