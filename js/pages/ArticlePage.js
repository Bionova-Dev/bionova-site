/* ============================================================
   BIONOVA — Page: ArticlePage
   VERSION: 20260511
   Depends on: ShieldIcon, ShoppingCartIcon, products
   ============================================================ */

const ArticlePage = ({ article, onBack, onProductClick }) => {
  const product = products.find(p => p.id === article.productId);
  return (
    <div className="bg-white min-h-screen">
      {/* Hero */}
      <div className="relative h-[400px] flex items-end pb-12 overflow-hidden">
        <img src={article.image} alt={article.title} className="absolute inset-0 w-full h-full object-cover" loading="eager" decoding="sync" width="1920" height="1080" />
        <div className="absolute inset-0 bg-gray-900/50 backdrop-blur-[1px]"></div>
        <div className="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-transparent to-transparent"></div>
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center">
          <button onClick={onBack} className="inline-flex items-center text-white/80 hover:text-white font-bold tracking-wide uppercase text-sm transition-colors mb-8 bg-white/10 hover:bg-white/20 px-5 py-2.5 rounded-full backdrop-blur-md border border-white/20">
            <span className="mr-2">&larr;</span> Retour aux astuces
          </button>
          <div className="mb-6"><span className="bg-bionova-red text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest">{article.category}</span></div>
          <h1 className="font-display text-4xl sm:text-5xl md:text-6xl font-extrabold text-white leading-tight drop-shadow-lg">{article.title}</h1>
        </div>
      </div>

      {/* Content */}
      <div className="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <article className="prose prose-lg prose-blue max-w-none">
          <section className="mb-14">
            <h2 className="font-display text-3xl font-bold text-gray-900 mb-6 flex items-center"><span className="bg-blue-50 text-bionova-red w-12 h-12 rounded-full flex items-center justify-center mr-5 text-xl">1</span> Le problème</h2>
            <p className="text-gray-600 leading-relaxed text-lg">{article.problem}</p>
          </section>
          <section className="mb-14">
            <h2 className="font-display text-3xl font-bold text-gray-900 mb-6 flex items-center"><span className="bg-blue-50 text-bionova-red w-12 h-12 rounded-full flex items-center justify-center mr-5 text-xl">2</span> La solution naturelle</h2>
            <p className="text-gray-600 leading-relaxed text-lg">{article.solution}</p>
          </section>
          <section className="mb-16 bg-gray-50 p-5 sm:p-8 lg:p-14 rounded-[3rem] border border-gray-100 relative mt-20">
            <div className="absolute top-0 left-10 transform -translate-y-1/2 bg-white w-20 h-20 rounded-full flex items-center justify-center shadow-xl border border-gray-50">
              <ShieldIcon className="w-10 h-10 text-bionova-red" />
            </div>
            <h2 className="font-display text-2xl font-bold text-gray-900 mb-6 mt-4">Le conseil de l'expert Bionova</h2>
            <p className="text-gray-600 leading-relaxed italic text-lg">"{article.expert}"</p>
          </section>
        </article>

        {/* Recommended Product */}
        {product && (
          <div className="mt-24 pt-16 border-t border-gray-100">
            <h3 className="text-center font-display text-2xl font-bold text-gray-900 mb-12 uppercase tracking-widest text-sm text-bionova-red">Le protocole recommandé</h3>
            <div className="bg-white rounded-[3rem] border border-gray-100 shadow-lg overflow-hidden flex flex-col sm:flex-row hover:shadow-2xl transition-all duration-500 cursor-pointer group" onClick={() => onProductClick(product)}>
              <div className="sm:w-2/5 bg-gray-50 p-8 flex items-center justify-center">
                <img src={product.image} alt={product.name} className="w-56 h-56 object-contain transform group-hover:scale-110 transition-transform duration-700" loading="lazy" decoding="async" width="224" height="224" />
              </div>
              <div className="sm:w-3/5 p-10 sm:p-12 flex flex-col justify-center">
                <div className="flex justify-between items-start mb-4">
                  <h4 className="font-display text-3xl font-extrabold text-gray-900 group-hover:text-bionova-red transition-colors">{product.name}</h4>
                  <span className="text-2xl font-bold text-bionova-red">{product.price.toFixed(2)} DT</span>
                </div>
                <p className="text-gray-500 mb-8 leading-relaxed line-clamp-3">{product.description}</p>
                <button className="inline-flex items-center text-white bg-gray-900 hover:bg-bionova-red py-4 px-8 rounded-2xl font-bold uppercase tracking-wider text-sm transition-colors self-start shadow-md">
                  Voir le produit <span className="ml-3">&rarr;</span>
                </button>
              </div>
            </div>
          </div>
        )}

        <div className="mt-20 text-center bg-gray-50 py-8 px-6 rounded-2xl">
          <p className="text-xs text-gray-500 uppercase tracking-widest font-bold">Avertissement</p>
          <p className="text-sm text-gray-400 mt-2">Les informations contenues dans cet article sont à but éducatif. Consultez votre médecin.</p>
        </div>
      </div>
    </div>
  );
};
