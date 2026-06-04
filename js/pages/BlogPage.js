/* ============================================================
   BIONOVA — Page: BlogPage
   VERSION: 20260511
   ============================================================ */

const BlogPage = ({ onArticleClick }) => (
  <div className="bg-gray-50 min-h-screen">
    {/* Featured Header */}
    <section className="pt-40 pb-20 bg-white border-b border-gray-100">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="max-w-3xl">
          <h2 className="text-bionova-red font-black tracking-widest uppercase mb-4">Le Magazine Santé</h2>
          <h1 className="font-display text-3xl sm:text-5xl lg:text-7xl font-black text-gray-900 mb-8 leading-tight">Comprendre la science du bien-être.</h1>
          <p className="text-xl text-gray-500 leading-relaxed">Découvrez les dossiers exclusifs de nos experts sur la micronutrition, le métabolisme et les dernières avancées biotechnologiques.</p>
        </div>
      </div>
    </section>

    {/* Articles Grid */}
    <section className="py-24">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-12">
          {articlesData.map((article) => (
            <article key={article.id} className="bg-white rounded-[3rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 group flex flex-col border border-gray-100">
              <div className="relative aspect-video overflow-hidden cursor-pointer" onClick={() => onArticleClick(article)}>
                <img src={article.image} alt={article.title} className="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
                <div className="absolute inset-0 bg-gradient-to-t from-gray-900/40 to-transparent"></div>
              </div>
              <div className="p-6 sm:p-8 lg:p-12 flex flex-col flex-grow">
                <div className="text-xs font-black text-bionova-red uppercase tracking-widest mb-4">{article.category}</div>
                <h2 className="font-display text-2xl font-black text-gray-900 mb-4 group-hover:text-bionova-red transition-colors leading-tight cursor-pointer" onClick={() => onArticleClick(article)}>{article.title}</h2>
                <p className="text-gray-500 text-base leading-relaxed mb-8 flex-grow">{article.excerpt}</p>
                <button onClick={() => onArticleClick(article)} className="inline-flex items-center text-sm font-black uppercase tracking-widest text-gray-900 group-hover:text-bionova-red transition-all">
                  Lire l'article <span className="ml-2 transform group-hover:translate-x-2 transition-transform">&rarr;</span>
                </button>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>

    {/* Newsletter Teaser */}
    <section className="py-32 bg-gray-900 text-white">
      <div className="max-w-5xl mx-auto px-4 text-center">
        <h2 className="font-display text-4xl font-black mb-8">Ne manquez aucune avancée scientifique.</h2>
        <p className="text-xl text-gray-400 mb-12">Rejoignez plus de 5 000 lecteurs passionnés par la santé naturelle et la micronutrition.</p>
        <div className="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
          <input type="email" placeholder="votre@email.com" className="flex-grow py-5 px-8 bg-gray-800 border-none rounded-2xl outline-none focus:ring-2 focus:ring-bionova-red transition-all" />
          <button className="py-5 px-10 bg-bionova-red text-white font-bold rounded-2xl hover:bg-white hover:text-gray-900 transition-all">S'inscrire</button>
        </div>
      </div>
    </section>
  </div>
);
