/* ============================================================
   BIONOVA — Page: BlogPage
   VERSION: 20260511
   ============================================================ */

const BlogPage = ({ onArticleClick }) => (
  <div className="pt-32 pb-32 bg-gray-50 min-h-screen">
    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div className="text-center mb-24">
        <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Le Magazine</h2>
        <h1 className="font-display text-5xl font-extrabold text-gray-900 mb-6">Astuces &amp; Santé</h1>
        <p className="text-xl text-gray-500 max-w-2xl mx-auto leading-relaxed">Découvrez les dernières avancées scientifiques et nos conseils micronutrition.</p>
      </div>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
        {articlesData.map((article) => (
          <article key={article.id} className="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100 group flex flex-col h-full hover:shadow-2xl transition-all duration-500">
            <div className="relative aspect-video overflow-hidden cursor-pointer" onClick={() => onArticleClick(article)}>
              <img src={article.image} alt={article.title} className="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
              <div className="absolute inset-0 bg-gray-900/20 group-hover:bg-gray-900/40 transition-colors duration-500"></div>
            </div>
            <div className="p-10 flex flex-col flex-grow">
              <h2 className="font-display text-2xl font-bold text-gray-900 mb-4 group-hover:text-bionova-red transition-colors line-clamp-3 leading-tight cursor-pointer" onClick={() => onArticleClick(article)}>{article.title}</h2>
              <p className="text-gray-500 text-base leading-relaxed mb-8 flex-grow">{article.excerpt}</p>
              <footer className="mt-auto">
                <button onClick={() => onArticleClick(article)} className="w-full flex items-center justify-center py-4 px-6 border border-gray-200 text-gray-700 hover:bg-bionova-red hover:text-white hover:border-medical-blue rounded-2xl font-bold uppercase tracking-wider text-sm transition-all duration-300">Lire la suite</button>
                <p className="text-[10px] text-gray-400 text-center mt-5 uppercase tracking-widest">Conseils de santé certifiés Bionova</p>
              </footer>
            </div>
          </article>
        ))}
      </div>
    </div>
  </div>
);
