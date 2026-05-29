/* ============================================================
   BIONOVA — App Router (Modular Component)
   VERSION: 20260515
   Handles page rendering based on state.
   ============================================================ */

const AppRouter = ({ 
  currentPage, 
  handleNavigate, 
  products, 
  handleProductClick, 
  handleAddToCart, 
  activeCategory, 
  setActiveCategory,
  selectedProduct,
  handleArticleClick,
  selectedArticle
}) => {
  switch (currentPage) {
    case 'home': 
      return (
        <HomePage 
          onNavigate={handleNavigate} 
          products={products} 
          onProductClick={handleProductClick} 
          onAddToCart={handleAddToCart} 
          onCategoryChange={setActiveCategory}
        />
      );
    case 'products': 
      return (
        <ProductsPage 
          products={products} 
          onAddToCart={handleAddToCart} 
          onProductClick={handleProductClick} 
          activeCategory={activeCategory} 
          onCategoryChange={setActiveCategory} 
        />
      );
    case 'product': 
      return selectedProduct ? (
        <ProductDetailPage 
          product={selectedProduct} 
          onAddToCart={handleAddToCart} 
          onBack={() => handleNavigate('products')} 
          onProductClick={handleProductClick} 
          products={products} 
        />
      ) : (
        <ProductsPage 
          products={products} 
          onAddToCart={handleAddToCart} 
          onProductClick={handleProductClick} 
          activeCategory={activeCategory} 
          onCategoryChange={setActiveCategory} 
        />
      );
    case 'blog': 
      return <BlogPage onArticleClick={handleArticleClick} />;
    case 'article': 
      return selectedArticle ? (
        <ArticlePage 
          article={selectedArticle} 
          onBack={() => handleNavigate('blog')} 
          onNavigate={handleNavigate} 
        />
      ) : (
        <BlogPage onArticleClick={handleArticleClick} />
      );
    case 'about': 
      return <AboutPage onNavigate={handleNavigate} />;
    case 'contact': 
      return <ContactPage />;
    default: 
      return (
        <HomePage 
          onNavigate={handleNavigate} 
          products={products} 
          onProductClick={handleProductClick} 
          onAddToCart={handleAddToCart} 
        />
      );
  }
};
