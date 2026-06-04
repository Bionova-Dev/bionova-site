/* ============================================================
   BIONOVA — Molecule: ProductCard
   VERSION: 20260522
   Depends on: icons.js (StarIcon, ShoppingCartIcon)
   ============================================================ */

const ProductCard = ({ product, onAddToCart, onClick }) => {
  const motion = window.Motion ? window.Motion.motion : null;
  const CardWrapper = motion ? motion.article : 'article';

  const motionProps = motion ? {
    layout: true,
    initial: { opacity: 0, y: 20 },
    animate: { opacity: 1, y: 0 },
    exit: { opacity: 0, y: -20 },
    transition: { duration: 0.3 },
    whileHover: { y: -5 }
  } : {};

  return (
    <CardWrapper
      {...motionProps}
      onClick={() => onClick(product)}
      className="bg-gray-50 rounded-2xl sm:rounded-[2.5rem] p-5 sm:p-7 lg:p-8 flex flex-col h-full items-center text-center group border border-gray-100 hover:shadow-2xl hover:border-medical-blue/20 transition-shadow duration-500 relative cursor-pointer"
    >
      {/* Dynamic Product Badge (Premium, Économisez 10%, etc.) */}
      {product.badge && (
        <div className="absolute top-6 right-6 bg-[#e4002b] text-white text-[10px] font-black px-4 py-2 rounded-full shadow-lg tracking-wider uppercase z-20">
          {product.badge}
        </div>
      )}

      {/* Product Image / Interactive Viewer */}
      {product.image2 ? (
        <div className="w-36 h-36 sm:w-44 sm:h-44 lg:w-48 lg:h-48 mb-8 sm:mb-10 relative flex items-center justify-center p-2 gap-2">
          <img
            src={product.image}
            alt={product.name}
            className="w-1/2 h-full object-contain transform -rotate-6 transition-all duration-500 group-hover:scale-110 group-hover:-rotate-12"
            loading="lazy"
            decoding="async"
            width="150"
            height="300"
          />
          <img
            src={product.image2}
            alt={product.name}
            className="w-1/2 h-full object-contain transform rotate-6 transition-all duration-500 group-hover:scale-110 group-hover:rotate-12"
            loading="lazy"
            decoding="async"
            width="150"
            height="300"
          />
        </div>
      ) : (
        <InteractiveProductViewer
          src={product.image}
          alt={`Produit Bionova : ${product.name}`}
          className="w-36 h-36 sm:w-44 sm:h-44 lg:w-48 lg:h-48 mb-8 sm:mb-10"
          noShadow={true}
        />
      )}

      {/* Product Info */}
      <h3 className="font-display text-2xl font-black text-gray-900 mb-2 group-hover:text-bionova-red transition-colors leading-tight">
        {product.name}
      </h3>

      {/* Description */}
      <p className="text-gray-600 text-sm mb-5 leading-relaxed line-clamp-2 font-medium px-1">
        {product.description}
      </p>

      {/* Star Rating */}
      <div className="flex items-center space-x-1 mb-6">
        {[...Array(5)].map((_, i) => (
          <StarIcon
            key={i}
            className={`w-3.5 h-3.5 ${i < Math.floor(product.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`}
          />
        ))}
        <span className="text-[10px] font-bold text-gray-400 ml-2">
          {product.rating}/5 - {product.reviews || 0} avis
        </span>
      </div>

      {/* Bottom Actions Row */}
      <div className="mt-auto w-full flex items-center justify-between">
        <p className="text-3xl font-black text-bionova-red font-sans">
          {product.price.toFixed(2)} <span className="text-[10px] font-black ml-1 text-gray-400">DT</span>
        </p>
        <div className="flex space-x-2">
          <button
            onClick={(e) => {
              e.stopPropagation();
              onClick(product);
            }}
            className="flex items-center justify-center p-4 border border-gray-200 text-gray-500 hover:text-bionova-red hover:border-medical-blue rounded-xl transition-all cursor-pointer bg-white"
            aria-label="Voir les détails"
          >
            <ChevronDownIcon className="w-5 h-5 -rotate-90" />
          </button>
          <a
            href="javascript:void(0)"
            onClick={(e) => {
              e.preventDefault();
              e.stopPropagation();
              onAddToCart(product);
            }}
            className="flex items-center justify-center bg-gray-900 text-white w-12 h-12 rounded-xl shadow-lg hover:bg-bionova-red transition-all cursor-pointer"
            aria-label="Ajouter au panier"
          >
            <ShoppingCartIcon className="w-5 h-5" />
          </a>
        </div>
      </div>
    </CardWrapper>
  );
};
