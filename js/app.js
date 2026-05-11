/* ============================================================
   BIONOVA — App Entry Point (Router + State)
   VERSION: 20260511
   This is the last script loaded. All components are global.
   ============================================================ */

const App = () => {
  const getInitialPage = () => {
    const path = window.location.pathname;
    if (path.includes('/boutique')) return 'products';
    if (path.includes('/astuces')) return 'blog';
    if (path.includes('/expertise')) return 'about';
    if (path.includes('/contact')) return 'contact';
    
    const hash = window.location.hash.replace('#', '');
    if (['home', 'products', 'blog', 'about', 'contact'].includes(hash)) return hash;
    return window.BIONOVA_INITIAL_PAGE || 'home';
  };

  const [currentPage, setCurrentPage] = React.useState(getInitialPage());
  const [selectedProduct, setSelectedProduct] = React.useState(null);
  const [selectedArticle, setSelectedArticle] = React.useState(null);
  const [cartItemsCount, setCartItemsCount] = React.useState(WC_INITIAL_COUNT);
  const [isTransitioning, setIsTransitioning] = React.useState(false);

  React.useEffect(() => {
    const titles = {
      'home': 'Accueil | Bionova - Micronutrition Premium',
      'products': 'Boutique | Bionova - Compléments Naturels',
      'product': selectedProduct ? `${selectedProduct.name} | Bionova` : 'Produit | Bionova',
      'blog': 'Magazine | Bionova - Astuces & Santé',
      'article': selectedArticle ? `${selectedArticle.title} | Bionova` : 'Article | Bionova',
      'about': 'Expertise | Bionova - Laboratoire Scientifique',
      'contact': 'Contact | Bionova - Support Experts',
    };
    if (titles[currentPage]) document.title = titles[currentPage];
  }, [currentPage, selectedProduct, selectedArticle]);

  React.useEffect(() => {
    const handlePopState = () => {
      setCurrentPage(getInitialPage());
      window.scrollTo({ top: 0, behavior: 'smooth' });
    };
    window.addEventListener('popstate', handlePopState);
    return () => window.removeEventListener('popstate', handlePopState);
  }, []);

  const handleNavigate = (page, data = null) => {
    if (page === 'cart') { window.location.href = WC_CART_URL; return; }
    if (page === 'login') { window.location.href = window.BIONOVA_ACCOUNT_URL || '/mon-compte/'; return; }
    
    setIsTransitioning(true);
    setTimeout(() => {
      const urls = {
        'home': BIONOVA_HOME_URL,
        'products': BIONOVA_ROUTES.products,
        'blog': BIONOVA_ROUTES.blog,
        'about': BIONOVA_ROUTES.about,
        'contact': BIONOVA_ROUTES.contact,
      };
      if (urls[page]) window.history.pushState({}, '', urls[page]);

      setCurrentPage(page);
      if (page === 'product' && data) setSelectedProduct(data);
      else if (page !== 'product' && page !== 'cart' && page !== 'login') setSelectedProduct(null);
      
      if (page === 'article' && data) setSelectedArticle(data);
      else if (page !== 'article') setSelectedArticle(null);

      window.scrollTo({ top: 0, behavior: 'smooth' });
      setTimeout(() => setIsTransitioning(false), 300);
    }, 300);
  };

  const handleProductClick = (product) => {
    setSelectedProduct(product);
    setCurrentPage('product');
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const handleArticleClick = (article) => {
    setSelectedArticle(article);
    setCurrentPage('article');
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const handleAddToCart = (product, redirect = false) => {
    const wcId = WC_PRODUCT_MAP[product.id] || product.id;
    const addUrl = (window.BIONOVA_HOME_URL || '/') + '?add-to-cart=' + wcId;
    fetch(addUrl).then(() => {
      setCartItemsCount(prev => prev + 1);
      const cartBadge = document.querySelector('.cart-count-badge');
      if (cartBadge) cartBadge.innerText = parseInt(cartBadge.innerText) + 1;
      if (redirect || product.type === 'pack') { window.location.href = WC_CART_URL; }
    });

    if (!redirect && product.type !== 'pack') {
      const toast = document.createElement('div');
      toast.className = 'fixed bottom-10 right-10 bg-gray-900 text-white px-6 py-4 rounded-xl shadow-2xl font-bold z-50 transform transition-all duration-500 translate-y-0 opacity-100 flex items-center';
      toast.innerHTML = '<svg class="w-6 h-6 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Ajouté au panier';
      document.body.appendChild(toast);
      setTimeout(() => { toast.style.opacity = '0'; toast.style.transform = 'translateY(20px)'; setTimeout(() => toast.remove(), 500); }, 3000);
    }
  };

  const renderPage = () => {
    switch (currentPage) {
      case 'home': return <HomePage onNavigate={handleNavigate} products={products} onProductClick={handleProductClick} onAddToCart={handleAddToCart} />;
      case 'products': return <ProductsPage products={products} onAddToCart={handleAddToCart} onProductClick={handleProductClick} />;
      case 'product': return selectedProduct ? <ProductDetailPage product={selectedProduct} onAddToCart={handleAddToCart} onBack={() => handleNavigate('products')} /> : <ProductsPage products={products} onAddToCart={handleAddToCart} onProductClick={handleProductClick} />;
      case 'blog': return <BlogPage onArticleClick={handleArticleClick} />;
      case 'article': return selectedArticle ? <ArticlePage article={selectedArticle} onBack={() => handleNavigate('blog')} onProductClick={handleProductClick} /> : <BlogPage onArticleClick={handleArticleClick} />;
      case 'about': return <AboutPage />;
      case 'contact': return <ContactPage />;
      default: return <HomePage onNavigate={handleNavigate} products={products} onProductClick={handleProductClick} onAddToCart={handleAddToCart} />;
    }
  };

  return (
    <div className="text-gray-900 bg-white selection:bg-bionova-red selection:text-white pb-16">
      <main className={`transition-all duration-300 ${isTransitioning ? 'opacity-0 translate-y-4' : 'opacity-100 translate-y-0'}`}>
        {renderPage()}
      </main>
    </div>
  );
};

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<App />);

