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

      {/* Advantages Section (Expertise preview) */}
      <section id="expertise" className="py-32 bg-gray-50 border-t border-gray-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="lg:text-center mb-24">
            <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Notre Expertise</h2>
            <p className="font-display text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">L'excellence au service de votre santé</p>
          </div>
          <div className="space-y-12 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-12 md:gap-y-16 mb-20">
            {features.map((feature) => (
              <div key={feature.name} className="relative bg-white p-10 rounded-[2.5rem] shadow-sm border border-silver/40 hover:shadow-xl transition-all group">
                <div className="absolute flex items-center justify-center h-20 w-20 rounded-2xl bg-gradient-to-br from-medical-blue to-blue-400 text-white -top-10 left-10 shadow-lg transform group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                  <feature.icon className="h-10 w-10 text-black" aria-hidden="true" />
                </div>
                <p className="mt-8 font-display text-2xl font-bold text-gray-900 mb-4">{feature.name}</p>
                <p className="text-lg text-gray-500 leading-relaxed">{feature.description}</p>
              </div>
            ))}
          </div>
          <div className="text-center">
            <button onClick={() => onNavigate('about')} className="inline-flex items-center px-8 py-4 border-2 border-bionova-red text-bionova-red font-bold rounded-2xl hover:bg-bionova-red hover:text-white transition-all">
              En savoir plus sur notre laboratoire
            </button>
          </div>
        </div>
      </section>

      {/* Blog Section (Astuces preview) */}
      <section id="astuces" className="py-32 bg-white border-t border-gray-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-20">
            <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Le Magazine</h2>
            <p className="font-display text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">Dernières Astuces & Santé</p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            {articlesData.slice(0, 3).map((article) => (
              <article key={article.id} className="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100 group flex flex-col h-full hover:shadow-2xl transition-all duration-500">
                <div className="relative aspect-video overflow-hidden cursor-pointer" onClick={() => onNavigate('article', article)}>
                  <img src={article.image} alt={article.title} className="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
                </div>
                <div className="p-10 flex flex-col flex-grow">
                  <h3 className="font-display text-xl font-bold text-gray-900 mb-4 group-hover:text-bionova-red transition-colors line-clamp-2 leading-tight cursor-pointer" onClick={() => onNavigate('article', article)}>{article.title}</h3>
                  <p className="text-gray-500 text-sm leading-relaxed mb-8 flex-grow">{article.excerpt}</p>
                  <button onClick={() => onNavigate('article', article)} className="text-bionova-red font-bold text-sm uppercase tracking-widest hover:underline">Lire la suite &rarr;</button>
                </div>
              </article>
            ))}
          </div>
          <div className="text-center">
            <button onClick={() => onNavigate('blog')} className="inline-flex items-center px-10 py-5 bg-gray-900 text-white font-bold rounded-2xl hover:bg-bionova-red transition-all shadow-xl">
              Voir tous nos conseils
            </button>
          </div>
        </div>
      </section>

      {/* Contact Section */}
      <section id="contact" className="py-32 bg-medical-light/20 border-t border-gray-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="bg-white rounded-[4rem] p-12 md:p-20 shadow-2xl border border-gray-100 flex flex-col lg:flex-row gap-16 items-center">
            <div className="lg:w-1/2">
              <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Contact</h2>
              <p className="font-display text-4xl font-extrabold text-gray-900 mb-8">Besoin d'un conseil ?</p>
              <p className="text-xl text-gray-500 mb-10 leading-relaxed">Nos experts santé sont à votre écoute pour vous guider dans vos choix et répondre à toutes vos questions.</p>
              <div className="space-y-4">
                <p className="flex items-center text-gray-600 font-bold"><svg className="w-6 h-6 mr-4 text-bionova-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg> +216 71 000 000</p>
                <p className="flex items-center text-gray-600 font-bold"><svg className="w-6 h-6 mr-4 text-bionova-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg> contact@bionova.tn</p>
              </div>
            </div>
            <div className="lg:w-1/2 w-full">
              <button onClick={() => onNavigate('contact')} className="w-full py-8 text-2xl font-black bg-bionova-red text-white rounded-[2rem] shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all">
                Nous envoyer un message
              </button>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
};
