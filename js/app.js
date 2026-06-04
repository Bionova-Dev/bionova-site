/* ============================================================
   BIONOVA — App Entry Point (Router + State)
   VERSION: 20260515
   This is the last script loaded. All components are global.
   ============================================================ */

const App = () => {
  const getProductFromPath = (path) => {
    const cleanPath = path.toLowerCase();
    let slug = '';
    if (cleanPath.includes('/produit/')) {
      slug = cleanPath.split('/produit/')[1].replace(/\//g, '');
    } else if (cleanPath.includes('/product/')) {
      slug = cleanPath.split('/product/')[1].replace(/\//g, '');
    }
    if (!slug) return null;
    
    const target = slug.trim().toLowerCase().replace(/-+/g, '-');
    let found = products.find(p => p.slug === target);
    if (!found) {
      if (target === 'collagene-marin-complexe' || target === 'collagene-marin' || target === 'collagene') {
        found = products.find(p => p.id === 5);
      } else if (target === 'curcumine-boswellia' || target === 'curcumin-boswellia' || target === 'curcumine') {
        found = products.find(p => p.id === 6);
      } else if (target === 'lions-mane') {
        found = products.find(p => p.id === 8);
      }
    }
    return found;
  };

  const getInitialCategory = () => {
    const path = window.location.pathname.toLowerCase();
    let slug = '';
    if (path.includes('/categorie/')) {
      slug = path.split('/categorie/')[1].replace(/\//g, '').trim();
    } else if (path.includes('/product-category/')) {
      slug = path.split('/product-category/')[1].replace(/\//g, '').trim();
    } else if (path.includes('/categorie-produit/')) {
      slug = path.split('/categorie-produit/')[1].replace(/\//g, '').trim();
    }
    
    if (slug) {
      // Direct match first
      if (typeof BIONOVA_CATEGORIES !== 'undefined' && BIONOVA_CATEGORIES.some(c => c.id === slug)) {
        return slug;
      }
      // Slug tolerance mapping for common variations
      const slugMap = {
        'antioxydants': 'antioxydant',
        'antioxidant': 'antioxydant',
        'antioxidants': 'antioxydant',
        'stress-sommeil': 'stress',
        'stress-et-sommeil': 'stress',
        'sommeil': 'stress',
        'beaute': 'beaute',
        'beauty': 'beaute',
        'peau-beaute': 'beaute',
        'peau-et-beaute': 'beaute',
        'peau': 'beaute',
        'articulations': 'articulation',
        'cognitif': 'cognitive',
        'cognition': 'cognitive',
        'detox-immunite': 'detox',
        'detox-et-immunite': 'detox',
        'immunite': 'detox',
        'anti-age': 'antiage',
        'antiaging': 'antiage',
        'pack': 'packs',
        'tous': 'all',
        'tous-les-produits': 'all',
        'all-products': 'all',
      };
      if (slugMap[slug]) return slugMap[slug];
    }

    const hash = window.location.hash.replace('#', '').toLowerCase();
    if (hash && typeof BIONOVA_CATEGORIES !== 'undefined' && BIONOVA_CATEGORIES.some(c => c.id === hash)) {
      return hash;
    }
    return 'all';
  };

  const getInitialPage = () => {
    const path = window.location.pathname.toLowerCase();
    if (path.includes('/boutique')) return 'products';
    if (path.includes('/categorie/') || path.includes('/product-category/') || path.includes('/categorie-produit/')) return 'products';
    if (path.includes('/astuces')) return 'blog';
    if (path.includes('/expertise')) return 'about';
    if (path.includes('/contact')) return 'contact';
    if (path.includes('/produit/') || path.includes('/product/')) return 'product';
    
    const hash = window.location.hash.replace('#', '');
    if (['home', 'products', 'blog', 'about', 'contact'].includes(hash)) return hash;
    return window.BIONOVA_INITIAL_PAGE || 'home';
  };

  const [currentPage, setCurrentPage] = React.useState(getInitialPage());
  const [activeCategory, setActiveCategory] = React.useState(() => getInitialCategory());
  const [selectedProduct, setSelectedProduct] = React.useState(() => getProductFromPath(window.location.pathname));
  const [selectedArticle, setSelectedArticle] = React.useState(null);
  const [cartItemsCount, setCartItemsCount] = React.useState(WC_INITIAL_COUNT);
  const [isTransitioning, setIsTransitioning] = React.useState(false);
  const [showScrollTop, setShowScrollTop] = React.useState(false);

  // Handle Hash/Path Category on Load
  React.useEffect(() => {
    const cat = getInitialCategory();
    if (cat !== 'all') {
      setActiveCategory(cat);
    }
  }, []);

  // Track scroll for scroll-to-top button
  React.useEffect(() => {
    const handleScroll = () => setShowScrollTop(window.scrollY > 600);
    window.addEventListener('scroll', handleScroll, { passive: true });
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);


  React.useEffect(() => {
    const titles = {
      'home': 'Accueil | Bionova — Micronutrition Premium en Tunisie',
      'products': 'Boutique | Bionova — Compléments Alimentaires Naturels',
      'product': selectedProduct ? `${selectedProduct.name} | Bionova` : 'Produit | Bionova',
      'blog': 'Magazine Santé | Bionova — Astuces & Bien-être',
      'article': selectedArticle ? `${selectedArticle.title} | Bionova` : 'Article | Bionova',
      'about': 'Notre Expertise | Bionova — Laboratoire Scientifique',
      'contact': 'Contactez-nous | Bionova — Support Expert',
    };
    if (titles[currentPage]) document.title = titles[currentPage];

    // Update meta description dynamically
    const metaDesc = document.querySelector('meta[name="description"]');
    const descriptions = {
      'home': 'Bionova — Laboratoire tunisien de micronutrition premium. Compléments alimentaires naturels haute biodisponibilité. Livraison gratuite dès 150 DT.',
      'products': 'Découvrez notre gamme de compléments alimentaires naturels : NMN, Ashwagandha, Collagène Marin, Astaxanthine. Qualité pharmaceutique, fabriqué en Tunisie.',
      'blog': 'Conseils santé et astuces bien-être par nos experts en micronutrition. Articles scientifiques sur la longévité, le stress et la beauté naturelle.',
      'about': 'Découvrez l\'expertise scientifique de Bionova. Notre laboratoire tunisien développe des formules hautement biodisponibles depuis plus de 24 mois de R&D.',
      'contact': 'Contactez l\'équipe Bionova pour un conseil personnalisé. Support expert 7j/7 par email, téléphone ou WhatsApp.',
    };
    if (metaDesc && descriptions[currentPage]) {
      metaDesc.setAttribute('content', descriptions[currentPage]);
    }
  }, [currentPage, selectedProduct, selectedArticle]);

  const updateMenuHighlights = (page) => {
    const pageMap = {
      'home': 'Accueil',
      'products': 'Boutique',
      'blog': 'Astuces',
      'about': 'Expertise',
      'contact': 'Contact'
    };
    const targetLabel = pageMap[page] || 'Accueil';
    
    document.querySelectorAll('#main-header .nav-item').forEach(el => {
      if (el.textContent.trim() === targetLabel) {
        el.classList.add('text-[#e4002b]', 'border-[#e4002b]');
        el.classList.remove('text-black', 'border-transparent');
      } else {
        el.classList.remove('text-[#e4002b]', 'border-[#e4002b]');
        el.classList.add('text-black', 'border-transparent');
      }
    });

    document.querySelectorAll('#mobile-menu a').forEach(el => {
      if (el.textContent.trim() === targetLabel) {
        el.classList.add('text-[#e4002b]', 'bg-gray-50');
        el.classList.remove('text-black');
      } else {
        el.classList.remove('text-[#e4002b]', 'bg-gray-50');
        el.classList.add('text-black');
      }
    });
  };

  React.useEffect(() => {
    const handlePopState = () => {
      const page = getInitialPage();
      setCurrentPage(page);
      
      const prod = getProductFromPath(window.location.pathname);
      setSelectedProduct(prod);

      const cat = getInitialCategory();
      setActiveCategory(cat);
      
      window.scrollTo({ top: 0, behavior: 'smooth' });
      updateMenuHighlights(page);
    };
    window.addEventListener('popstate', handlePopState);
    return () => window.removeEventListener('popstate', handlePopState);
  }, []);

  const handleNavigate = (page, data = null, customUrl = null) => {
    // 1. External/Special Routes
    if (page === 'cart') { window.location.href = WC_CART_URL; return; }
    if (page === 'login') { window.location.href = window.BIONOVA_ACCOUNT_URL || '/mon-compte/'; return; }
    
    // 2. Map of Page IDs to Real URLs
    const urls = {
      'home': BIONOVA_HOME_URL,
      'products': BIONOVA_ROUTES.products,
      'blog': BIONOVA_ROUTES.blog,
      'about': BIONOVA_ROUTES.about,
      'contact': BIONOVA_ROUTES.contact,
    };

    setIsTransitioning(true);
    setTimeout(() => {
      if (page === 'product' && data) setSelectedProduct(data);
      else if (page !== 'product' && page !== 'cart' && page !== 'login') setSelectedProduct(null);
      
      if (page === 'article' && data) setSelectedArticle(data);
      else if (page !== 'article') setSelectedArticle(null);

      // Async history push state for SPA transitions
      if (page !== currentPage) {
        const finalUrl = customUrl || urls[page];
        if (finalUrl) window.history.pushState(null, '', finalUrl);
        setCurrentPage(page);
        updateMenuHighlights(page);
      } else {
        if (customUrl) window.history.pushState(null, '', customUrl);
        setCurrentPage(page);
      }

      window.scrollTo({ top: 0, behavior: 'smooth' });
      setTimeout(() => setIsTransitioning(false), 300);
    }, 300);
  };

  const handleCategoryChange = (categoryId) => {
    setActiveCategory(categoryId);
    window.scrollTo({ top: 0, behavior: 'smooth' });
    
    // Sync the PHP category bar visual state
    window.dispatchEvent(new CustomEvent('bionova:categoryChange', {
      detail: { category: categoryId }
    }));
    
    // Update URL without reloading
    const targetUrl = categoryId === 'all' 
      ? '/boutique/' 
      : `/categorie/${categoryId}/`;
      
    if (currentPage !== 'products') {
      handleNavigate('products', null, targetUrl);
    } else {
      window.history.pushState(null, '', targetUrl);
    }
  };

  // Expose handleCategoryChange globally so PHP bar can call it directly
  React.useEffect(() => {
    window.BIONOVA_HANDLE_CATEGORY = handleCategoryChange;
    return () => { window.BIONOVA_HANDLE_CATEGORY = null; };
  }, [currentPage]);

  const handleProductClick = (product) => {
    setSelectedProduct(product);
    setCurrentPage('product');
    const productUrl = (window.BIONOVA_HOME_URL || '/') + 'produit/' + product.slug + '/';
    window.history.pushState(null, '', productUrl);
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const handleArticleClick = (article) => {
    setSelectedArticle(article);
    setCurrentPage('article');
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const handleAddToCart = (product, redirect = false) => {
    const wcId = WC_PRODUCT_MAP[product.id] || product.id;
    // Ajout d'un cache-buster pour éviter que WP Fastest Cache ne bloque la requête GET
    const addUrl = (window.BIONOVA_HOME_URL || '/') + '?add-to-cart=' + wcId + '&_=' + Date.now();

    if (!redirect && product.type !== 'pack') {
      const toast = document.createElement('div');
      toast.className = 'fixed bottom-6 right-6 bg-gray-900 text-white px-6 py-4 rounded-2xl shadow-2xl font-bold z-[9999] flex items-center gap-3 animate-slide-up';
      toast.style.animation = 'slideUp 0.4s ease-out';
      toast.innerHTML = `
        <div class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center shrink-0">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <div>
          <p class="text-sm font-bold">${product.name}</p>
          <p class="text-xs text-gray-300">Ajouté au panier</p>
        </div>
      `;
      document.body.appendChild(toast);
      setTimeout(() => { toast.style.opacity = '0'; toast.style.transform = 'translateY(20px)'; toast.style.transition = 'all 0.4s ease'; setTimeout(() => toast.remove(), 500); }, 3000);
    }
  };

  const scrollToTop = () => window.scrollTo({ top: 0, behavior: 'smooth' });

  const renderPage = () => (
    <AppRouter 
      currentPage={currentPage}
      handleNavigate={handleNavigate}
      products={products}
      handleProductClick={handleProductClick}
      handleAddToCart={handleAddToCart}
      activeCategory={activeCategory}
      setActiveCategory={handleCategoryChange}
      selectedProduct={selectedProduct}
      handleArticleClick={handleArticleClick}
      selectedArticle={selectedArticle}
    />
  );

  return (
    <div className="text-gray-900 bg-white selection:bg-bionova-red selection:text-white">
      {/* Category Bar — Now handled by PHP in header.php for ALL pages */}
      {/* <CategoryBar activeCategory={activeCategory} onCategoryChange={handleCategoryChange} /> */}

      {/* Page Content */}
      <main className={`transition-all duration-300 ${isTransitioning ? 'opacity-0 translate-y-4' : 'opacity-100 translate-y-0'}`}>
        {renderPage()}
      </main>

      {/* Scroll to Top Button */}
      <button
        onClick={scrollToTop}
        className={`fixed bottom-6 right-6 z-40 w-12 h-12 bg-white shadow-xl border border-gray-200 rounded-full flex items-center justify-center text-gray-700 hover:text-bionova-red hover:shadow-2xl hover:border-bionova-red/20 transition-all duration-300 cursor-pointer ${showScrollTop ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4 pointer-events-none'}`}
        aria-label="Retour en haut"
        title="Retour en haut"
      >
        <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2.5} d="M5 15l7-7 7 7" /></svg>
      </button>

      {/* WhatsApp Floating Button */}
      <a
        href="https://wa.me/21671000000?text=Bonjour%20Bionova%2C%20je%20souhaite%20un%20conseil"
        target="_blank"
        rel="noopener noreferrer"
        className="fixed bottom-6 left-6 z-40 w-14 h-14 bg-[#25D366] rounded-full flex items-center justify-center text-white shadow-xl hover:shadow-2xl hover:scale-110 transition-all duration-300 cursor-pointer group"
        aria-label="Contactez-nous sur WhatsApp"
        title="Conseil gratuit sur WhatsApp"
      >
        <svg className="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.05 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        <span className="absolute left-full ml-3 bg-white text-gray-900 text-xs font-bold px-3 py-2 rounded-xl shadow-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">Conseil gratuit</span>
      </a>
    </div>
  );
};

const rootElement = document.getElementById('root');
if (rootElement) {
  const root = ReactDOM.createRoot(rootElement);
  root.render(<App />);
}
