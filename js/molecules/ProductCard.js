/* ============================================================
   BIONOVA — Molecule: ProductCard
   VERSION: 20260511
   Depends on: icons.js (StarIcon, ShoppingCartIcon)
   ============================================================ */

const ProductCard = ({ product, onAddToCart, onClick }) => {
  return (
    <div className="bg-white rounded-[2.5rem] overflow-hidden border border-silver/50 product-card-hover flex flex-col h-full cursor-pointer group" onClick={() => onClick(product)}>
      <div className="relative pt-[100%] bg-medical-light/30 border-b border-silver/30 overflow-hidden flex items-center justify-center">
        {product.image2 ? (
          <div className="absolute inset-0 flex items-center justify-center p-6 gap-2">
            <img src={product.image} alt={product.name} className="w-1/2 h-full object-contain transform -rotate-6 transition-transform group-hover:scale-110" loading="lazy" decoding="async" />
            <img src={product.image2} alt={product.name} className="w-1/2 h-full object-contain transform rotate-6 transition-transform group-hover:scale-110" loading="lazy" decoding="async" />
          </div>
        ) : (
          <img src={product.image} alt={product.name} className="absolute inset-0 w-full h-full object-contain p-10 product-image-float" loading="lazy" decoding="async" width="300" height="300" />
        )}
        {product.badge && (
          <div className="absolute top-6 left-6 bg-[#be123c] text-white text-[10px] font-black px-4 py-2 rounded-xl shadow-md tracking-widest uppercase z-20">
            {product.badge}
          </div>
        )}
      </div>
      <div className="p-10 flex flex-col flex-grow bg-white">
        <h3 className="font-display text-2xl font-black text-gray-900 mb-2 leading-tight group-hover:text-bionova-red transition-colors">{product.name}</h3>

        {/* Star Rating */}
        <div className="flex items-center space-x-1 mb-4">
          {[...Array(5)].map((_, i) => (
            <StarIcon key={i} className={`w-3.5 h-3.5 ${i < Math.floor(product.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`} />
          ))}
          <span className="text-[10px] font-bold text-gray-400 ml-2">{product.rating}/5</span>
        </div>

        <p className="text-gray-500 text-sm mb-8 leading-relaxed line-clamp-2">{product.description}</p>

        <div className="flex items-center justify-between mt-auto">
          <span className="text-2xl font-black text-bionova-red">{product.price.toFixed(2)} <span className="text-[10px] font-black ml-1 text-gray-400">DT</span></span>
          <a
            href="javascript:void(0)"
            onClick={(e) => { e.preventDefault(); e.stopPropagation(); onAddToCart(product); }}
            style={{ position: 'relative', zIndex: 9999, cursor: 'pointer' }}
            className="flex items-center justify-center btn-gradient text-white w-14 h-14 rounded-[1.2rem] shadow-lg"
            aria-label="Ajouter au panier"
          >
            <ShoppingCartIcon className="w-6 h-6" />
          </a>
        </div>
      </div>
    </div>
  );
};
