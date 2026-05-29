/* ============================================================
   BIONOVA — Page: HomePage (Clean & Modular)
   VERSION: 20260515
   Max lines: 300 (Actual: ~35)
   ============================================================ */

const HomePage = ({ onNavigate, products, onProductClick, onAddToCart, onCategoryChange }) => {
  return (
    <div className="home-page-container">
      {/* Hero Section */}
      <HeroCarousel onNavigate={onNavigate} />

      {/* Stats Counter */}
      <HomeStats />

      {/* Browse by Category */}
      <HomeCategories onNavigate={onNavigate} onCategoryChange={onCategoryChange} />

      {/* Best Sellers Selection */}
      <HomeBestSellers 
        products={products} 
        onProductClick={onProductClick} 
        onAddToCart={onAddToCart} 
        onNavigate={onNavigate} 
      />

      {/* Exclusive Synergy Packs */}
      <HomePacks 
        products={products} 
        onProductClick={onProductClick} 
        onAddToCart={onAddToCart} 
      />

      {/* Customer Testimonials */}
      <HomeTestimonials />

      {/* Expertise & Laboratory Teaser */}
      <HomeExpertise onNavigate={onNavigate} />

      {/* Magazine & Health Tips Teaser */}
      <HomeBlog onNavigate={onNavigate} />

      {/* Final Contact CTA */}
      <HomeContact onNavigate={onNavigate} />
    </div>
  );
};
