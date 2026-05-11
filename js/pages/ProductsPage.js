/* ============================================================
   BIONOVA — Page: ProductsPage
   VERSION: 20260511
   Depends on: ProductCard
   ============================================================ */

const ProductsPage = ({ products, onAddToCart, onProductClick }) => {
  return (
    <div id="products" className="pt-32 pb-32 bg-white min-h-screen">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-24">
          <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Notre Gamme</h2>
          <p className="font-display text-5xl leading-tight font-extrabold text-gray-900">
            L'expertise micronutrition
          </p>
          <p className="mt-6 max-w-2xl text-xl text-gray-500 mx-auto leading-relaxed">
            Découvrez nos compléments alimentaires naturels et laissez-vous guider par la science.
          </p>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 lg:gap-10">
          {products.map(product => (
            <ProductCard key={product.id} product={product} onAddToCart={onAddToCart} onClick={onProductClick} />
          ))}
        </div>
      </div>
    </div>
  );
};
