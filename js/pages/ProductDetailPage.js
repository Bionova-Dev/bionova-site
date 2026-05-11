/* ============================================================
   BIONOVA — Page: ProductDetailPage
   VERSION: 20260511
   Depends on: Accordion, StarIcon, ShoppingCartIcon
   ============================================================ */

const ProductDetailPage = ({ product, onAddToCart, onBack }) => {
  return (
    <div className="min-h-screen bg-white pt-32 pb-32">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <button onClick={onBack} className="group flex items-center text-gray-500 hover:text-bionova-red font-semibold tracking-wide uppercase text-sm transition-colors mb-16">
          <span className="transform transition-transform group-hover:-translate-x-2 mr-3 text-lg">&larr;</span> Retour à la boutique
        </button>
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

          <div className="relative w-full aspect-square rounded-[3rem] bg-gray-50 border border-gray-100 shadow-sm flex items-center justify-center overflow-hidden group">
            {product.image2 ? (
              <div className="flex h-full w-full items-center justify-center p-8 gap-4">
                <img src={product.image} alt={product.name} className="w-1/2 h-full object-contain transform -rotate-6 transition-transform group-hover:rotate-0" loading="lazy" decoding="async" />
                <img src={product.image2} alt={product.name} className="w-1/2 h-full object-contain transform rotate-6 transition-transform group-hover:rotate-0" loading="lazy" decoding="async" />
              </div>
            ) : (
              <img src={product.image} alt={product.name} className="w-full h-full p-12 object-contain transition-transform group-hover:scale-105" loading="lazy" decoding="async" />
            )}
            {product.badge && (
              <div className="absolute top-8 right-8 bg-bionova-red text-white text-sm font-bold px-5 py-2.5 rounded-full shadow-lg tracking-wider uppercase z-10">
                {product.badge}
              </div>
            )}
          </div>

          <div className="flex flex-col h-full justify-center lg:py-10">
            <div className="inline-block mb-4">
              <span className="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-bold tracking-widest uppercase">{product.type === 'pack' ? 'Pack Promo' : 'Complément'}</span>
            </div>
            <h1 className="font-display text-4xl sm:text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-4">{product.name}</h1>

            <div className="flex items-center space-x-1 mb-8">
              {[...Array(5)].map((_, i) => (
                <StarIcon key={i} className={`w-5 h-5 ${i < Math.floor(product.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`} />
              ))}
              <span className="text-sm font-bold text-gray-400 ml-3">({product.rating}/5 - {product.reviews} avis)</span>
            </div>

            <div className="flex items-baseline space-x-4 mb-10">
              <p className="text-4xl font-extrabold text-bionova-red">{product.price.toFixed(2)} DT</p>
              {product.oldPrice && <p className="text-xl text-gray-300 line-through font-bold">{product.oldPrice.toFixed(2)} DT</p>}
            </div>
            <p className="text-xl text-gray-600 leading-relaxed mb-10">{product.description}</p>

            <div className="mb-12 space-y-6">
              <div className="bg-medical-light/30 rounded-3xl p-8 border border-medical-blue/10">
                <h4 className="font-display font-bold text-gray-900 mb-6 flex items-center uppercase tracking-widest text-sm">Principaux Bienfaits</h4>
                <ul className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  {product.benefits.map((benefit, i) => (
                    <li key={i} className="flex items-start text-sm text-gray-700 font-medium">
                      <div className="w-5 h-5 rounded-full bg-blue-100 flex items-center justify-center mr-3 mt-0.5 shrink-0">
                        <svg className="w-3 h-3 text-bionova-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="4" d="M5 13l4 4L19 7" /></svg>
                      </div>
                      {benefit}
                    </li>
                  ))}
                </ul>
              </div>

              <Accordion title="Composition (pour 1 gélule)" content={<div className="bg-gray-50 p-6 rounded-2xl border border-gray-100 text-sm font-medium text-gray-700">{product.composition}</div>} />
              <Accordion title="Conseils d'utilisation" content={<div className="flex items-start p-2"><p className="text-gray-600 leading-relaxed pt-1">{product.usage}</p></div>} />

              {/* Medical Safety Block */}
              <div className="mt-10 mb-10 space-y-4">
                {product.precautions && (
                  <div className="p-6 rounded-[2rem] border border-[#E8DCC4] bg-[#FCF9F2] shadow-sm animate-fade-in">
                    <h4 className="text-[11px] font-black uppercase tracking-[0.2em] text-[#A68B6D] mb-3 flex items-center">
                      <svg className="w-4 h-4 mr-2 text-[#A68B6D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.27 16.5c-.77.833.192 2.5 1.732 2.5z" /></svg>
                      Précautions d'emploi
                    </h4>
                    <p className="text-sm font-medium text-gray-700 leading-relaxed">{product.precautions}</p>
                  </div>
                )}
                {product.storage && (
                  <div className="flex items-center px-6 py-4 bg-gray-50/50 rounded-2xl border border-gray-100/50">
                    <svg className="w-5 h-5 mr-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                    <p className="text-sm font-bold text-gray-500 italic tracking-wide">
                      Conservation : <span className="text-gray-700 not-italic ml-1">{product.storage}</span>
                    </p>
                  </div>
                )}
              </div>
            </div>

            <a
              href="javascript:void(0)"
              onClick={(e) => { e.preventDefault(); onAddToCart(product); }}
              style={{ position: 'relative', zIndex: 9999, cursor: 'pointer', display: 'flex', backgroundColor: '#be123c', color: '#ffffff' }}
              className="w-full flex justify-center items-center py-6 px-8 shadow-xl text-xl font-bold uppercase tracking-wider rounded-2xl text-white bg-bionova-red hover:bg-gray-900 hover:-translate-y-1 hover:shadow-2xl transition-all text-center"
            >
              <ShoppingCartIcon className="w-6 h-6 mr-3" />
              Ajouter au panier
            </a>
          </div>
        </div>
      </div>
    </div>
  );
};
