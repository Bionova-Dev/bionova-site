/* ============================================================
   BIONOVA — Home Section: Blog Teaser
   ============================================================ */

const HomeBlog = ({ onNavigate }) => {
  return (
    <section className="py-28 bg-white">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex flex-col md:flex-row justify-between items-end mb-16">
          <div className="md:w-2/3">
            <h2 className="text-sm text-[#e4002b] font-bold tracking-widest uppercase mb-3">Le Magazine</h2>
            <p className="font-display text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">Astuces & Conseils Santé</p>
          </div>
          <a href={BIONOVA_ROUTES.blog} className="mt-8 md:mt-0 font-bold text-[#e4002b] hover:text-gray-900 transition-colors flex items-center group cursor-pointer">Voir tous les articles <span className="ml-2 transform group-hover:translate-x-1 transition-transform">&rarr;</span></a>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {articlesData.slice(0, 3).map((article) => (
            <a key={article.id} href={BIONOVA_ROUTES.blog} className="group cursor-pointer block">
              <div className="relative aspect-video rounded-3xl overflow-hidden mb-6 shadow-lg">
                <img src={article.image} alt={article.title} className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                <div className="absolute top-4 left-4"><span className="bg-[#e4002b] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">{article.category}</span></div>
              </div>
              <h3 className="font-display text-xl font-bold text-gray-900 group-hover:text-[#e4002b] transition-colors mb-2">{article.title}</h3>
              <p className="text-gray-500 text-sm line-clamp-2">{article.excerpt}</p>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
};
