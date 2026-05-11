/* ============================================================
   BIONOVA — Page: HomePage
   VERSION: 20260511
   Depends on: HeroCarousel, InteractiveViewer, StarIcon,
               ShoppingCartIcon, ChevronDownIcon, BeakerIcon,
               LeafIcon, ShieldIcon
   ============================================================ */

const HomePage = ({ onNavigate, products, onProductClick, onAddToCart }) => {

  const bestSellers = products.filter(p => p.type !== 'pack');
  const features = [
    { name: "Formules Bioactives Brevetées", description: "Des associations d'actifs développées en interne, protégées par un savoir-faire unique.", icon: BeakerIcon },
    { name: "Ingrédients 100% Naturels", description: "Origine contrôlée, sans OGM ni substances controversées, respectant l'organisme.", icon: LeafIcon },
    { name: "Pureté Certifiée en Laboratoire", description: "Chaque lot est analysé par un laboratoire indépendant pour garantir sécurité et efficacité.", icon: ShieldIcon },
  ];

  return (
    <div>
      {/* Hero Carousel */}
      <HeroCarousel onNavigate={onNavigate} />

      {/* Best Sellers Section */}
      <section className="py-32 bg-white relative border-t border-gray-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-20">
            <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Sélection Premium</h2>
            <p className="font-display text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">Nos Meilleures Ventes</p>
            <p className="mt-6 text-xl text-gray-500">Les formules les plus plébiscitées pour des résultats optimaux en Tunisie.</p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
            {bestSellers.map(product => (
              <article key={product.id} onClick={() => onProductClick(product)} className="bg-gray-50 rounded-[3rem] p-10 flex flex-col items-center text-center group border border-gray-100 hover:shadow-2xl hover:border-medical-blue/20 transition-all duration-500 relative cursor-pointer">
                <div className="absolute top-6 right-6 bg-[#be123c] text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg tracking-wider uppercase z-20">Best Seller</div>
                <InteractiveProductViewer src={product.image} alt={`Produit Bionova : ${product.name}`} className="w-56 h-56 mb-10" noShadow={true} />
                <h3 className="font-display text-2xl font-black text-gray-900 mb-2 group-hover:text-bionova-red transition-colors">{product.name}</h3>

                {/* Star Rating */}
                <div className="flex items-center space-x-1 mb-4">
                  {[...Array(5)].map((_, i) => (
                    <StarIcon key={i} className={`w-3.5 h-3.5 ${i < Math.floor(product.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`} />
                  ))}
                  <span className="text-[10px] font-bold text-gray-400 ml-2">{product.rating}/5 - {product.reviews} avis clients</span>
                </div>

                <p className="text-gray-500 mb-8 line-clamp-2">{product.description}</p>
                <div className="mt-auto w-full flex items-center justify-between">
                  <p className="text-3xl font-black text-bionova-red">{product.price.toFixed(2)} DT</p>
                  <div className="flex space-x-2">
                    <button
                      onClick={(e) => { e.stopPropagation(); onProductClick(product); }}
                      className="flex items-center justify-center p-4 border border-gray-200 text-gray-500 hover:text-bionova-red hover:border-medical-blue rounded-xl transition-all"
                      title={`Voir les détails de ${product.name}`}
                    >
                      <ChevronDownIcon className="w-5 h-5 -rotate-90" />
                    </button>
                    <a
                      href="javascript:void(0)"
                      onClick={(e) => { e.preventDefault(); e.stopPropagation(); onAddToCart(product); }}
                      style={{ position: 'relative', zIndex: 9999, cursor: 'pointer' }}
                      className="flex items-center justify-center bg-gray-900 text-white w-12 h-12 rounded-xl shadow-lg hover:bg-bionova-red transition-all"
                      title={`Ajouter ${product.name} au panier`}
                      aria-label={`Ajouter ${product.name} au panier`}
                    >
                      <ShoppingCartIcon className="w-5 h-5" />
                    </a>
                  </div>
                </div>
              </article>
            ))}
          </div>
        </div>
      </section>

      {/* Exclusive Packs Section */}
      <div className="py-32 bg-medical-light/30 relative">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col md:flex-row justify-between items-end mb-16">
            <div className="md:w-2/3">
              <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Offres Limitées</h2>
              <p className="font-display text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">Nos Packs Exclusifs</p>
              <p className="mt-6 text-xl text-gray-500">Optimisez vos résultats avec nos synergies d'actifs soigneusement sélectionnées par nos experts.</p>
            </div>
            <button onClick={() => onNavigate('products')} className="mt-8 md:mt-0 font-bold text-bionova-red hover:text-blue-700 transition-colors flex items-center group">
              Voir tous les packs <span className="ml-2 transform group-hover:translate-x-1 transition-transform">&rarr;</span>
            </button>
          </div>

          <div className="grid grid-cols-1 lg:grid-cols-1 gap-12">
            {products.filter(p => p.type === 'pack').map(pack => (
              <div key={pack.id} onClick={() => onProductClick(pack)} className="bg-white rounded-[4rem] overflow-hidden flex flex-col lg:flex-row items-center gold-border hover:shadow-2xl transition-all duration-500 relative group cursor-pointer">
                {/* Visual Part */}
                <div className="lg:w-1/2 p-12 lg:p-20 relative flex justify-center items-center bg-gray-50/50 w-full">
                  <div className="absolute top-10 left-10 badge-shiny text-white text-[12px] font-black px-6 py-3 rounded-full shadow-xl tracking-widest uppercase z-20">
                    {pack.badge}
                  </div>
                  <div className="relative w-full max-w-md aspect-square flex justify-center items-center">
                    <div className="relative w-64 h-64 sm:w-80 sm:h-80">
                      <img src={pack.image} alt={pack.name} className="absolute top-0 left-0 w-3/4 h-3/4 object-contain drop-shadow-2xl z-10 transform -rotate-6 group-hover:-rotate-12 transition-transform duration-500" loading="lazy" decoding="async" />
                      <img src={pack.image2} alt={pack.name} className="absolute bottom-0 right-0 w-3/4 h-3/4 object-contain drop-shadow-2xl z-0 transform rotate-6 translate-x-4 translate-y-4 group-hover:rotate-12 group-hover:translate-x-8 transition-transform duration-500" loading="lazy" decoding="async" />
                    </div>
                  </div>
                </div>

                {/* Content Part */}
                <div className="lg:w-1/2 p-12 lg:p-20 flex flex-col justify-center">
                  <div className="inline-block px-4 py-1.5 bg-blue-50 text-bionova-red rounded-full text-[10px] font-bold tracking-widest uppercase mb-6 self-start">Nutricosmétique Premium</div>
                  <h3 className="font-display text-4xl lg:text-5xl font-black text-gray-900 mb-2 group-hover:text-bionova-red transition-colors">{pack.name}</h3>

                  <div className="flex items-center space-x-1 mb-6">
                    {[...Array(5)].map((_, i) => (
                      <StarIcon key={i} className={`w-4 h-4 ${i < Math.floor(pack.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`} />
                    ))}
                    <span className="text-xs font-bold text-gray-400 ml-2">{pack.rating}/5 - {pack.reviews} avis</span>
                  </div>

                  <p className="text-xl text-gray-500 mb-10 leading-relaxed line-clamp-3">{pack.description}</p>

                  <div className="flex items-end space-x-6 mb-12">
                    <div>
                      <p className="text-sm text-gray-400 font-bold uppercase tracking-widest mb-1">Prix normal</p>
                      <p className="text-2xl text-gray-300 line-through font-bold">{pack.oldPrice.toFixed(2)} DT</p>
                    </div>
                    <div>
                      <p className="text-sm text-bionova-red font-bold uppercase tracking-widest mb-1">Prix Pack</p>
                      <p className="text-5xl font-black text-bionova-red">{pack.price.toFixed(2)} <span className="text-xl">DT</span></p>
                    </div>
                  </div>

                  <a
                    href="javascript:void(0)"
                    onClick={(e) => { e.preventDefault(); e.stopPropagation(); onAddToCart(pack); }}
                    style={{ position: 'relative', zIndex: 9999, cursor: 'pointer' }}
                    className="w-full py-6 px-10 btn-gradient text-white text-xl font-bold rounded-2xl shadow-xl hover:shadow-2xl transition-all transform hover:-translate-y-1 text-center"
                  >
                    Ajouter le pack au panier
                  </a>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>

      {/* Teaser Expertise */}
      <section className="py-32 bg-gray-50 border-t border-gray-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="bg-white rounded-[4rem] p-12 md:p-20 shadow-xl border border-gray-100 flex flex-col lg:flex-row items-center gap-16">
            <div className="lg:w-1/2">
              <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Notre Laboratoire</h2>
              <p className="font-display text-4xl font-extrabold text-gray-900 mb-8">L'expertise scientifique au service de votre vitalité</p>
              <p className="text-xl text-gray-500 mb-10 leading-relaxed">Découvrez comment nos experts en micronutrition développent les formules les plus pures et les plus efficaces du marché tunisien.</p>
              <button onClick={() => onNavigate('about')} className="px-10 py-5 bg-gray-900 text-white font-bold rounded-2xl hover:bg-bionova-red transition-all shadow-xl">Découvrir notre expertise &rarr;</button>
            </div>
            <div className="lg:w-1/2 relative rounded-[3rem] overflow-hidden h-[400px] w-full">
               <img src={THEME_URI + "/assets/brand/expertise-hero.png"} alt="Expertise Bionova" className="w-full h-full object-cover" />
            </div>
          </div>
        </div>
      </section>

      {/* Teaser Blog (Magazine) */}
      <section className="py-32 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col md:flex-row justify-between items-end mb-16">
            <div className="md:w-2/3">
              <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Le Magazine</h2>
              <p className="font-display text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">Astuces & Conseils Santé</p>
            </div>
            <button onClick={() => onNavigate('blog')} className="mt-8 md:mt-0 font-bold text-bionova-red hover:text-blue-700 transition-colors flex items-center group">
              Voir tous les articles <span className="ml-2 transform group-hover:translate-x-1 transition-transform">&rarr;</span>
            </button>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {articlesData.slice(0, 3).map((article) => (
              <article key={article.id} className="group cursor-pointer" onClick={() => onNavigate('article', article)}>
                <div className="relative aspect-video rounded-3xl overflow-hidden mb-6 shadow-lg">
                  <img src={article.image} alt={article.title} className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>
                <h3 className="font-display text-xl font-bold text-gray-900 group-hover:text-bionova-red transition-colors mb-2">{article.title}</h3>
                <p className="text-gray-500 text-sm line-clamp-2">{article.excerpt}</p>
              </article>
            ))}
          </div>
        </div>
      </section>

      {/* Teaser Contact */}
      <section className="py-24 bg-medical-light/30 border-t border-gray-100">
        <div className="max-w-5xl mx-auto px-4 text-center">
          <h2 className="font-display text-4xl font-extrabold text-gray-900 mb-8">Une question ? Un conseil personnalisé ?</h2>
          <p className="text-xl text-gray-500 mb-12">Nos conseillers santé sont à votre disposition pour vous accompagner dans votre routine bien-être.</p>
          <button onClick={() => onNavigate('contact')} className="px-16 py-6 bg-bionova-red text-white text-xl font-black rounded-3xl shadow-2xl hover:bg-gray-900 transition-all transform hover:-translate-y-1">Contactez-nous maintenant</button>
        </div>
      </section>
    </div>
  );
};
