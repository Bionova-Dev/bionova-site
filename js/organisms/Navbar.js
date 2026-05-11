/* ============================================================
   BIONOVA — Organism: Navbar
   VERSION: 20260511
   Depends on: icons.js (ShoppingCartIcon, UserIcon, XIcon, SearchIcon)
   ============================================================ */

const Navbar = ({ cartItemCount, currentPage, onNavigate }) => {
  const [isScrolled, setIsScrolled] = React.useState(false);
  const [mobileOpen, setMobileOpen] = React.useState(false);

  React.useEffect(() => {
    const handleScroll = () => setIsScrolled(window.scrollY > 50);
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const navLinks = [
    { page: 'home', label: 'Accueil', url: BIONOVA_HOME_URL },
    { page: 'products', label: 'Boutique', url: BIONOVA_HOME_URL + 'boutique/' },
    { page: 'blog', label: 'Astuces', url: BIONOVA_HOME_URL + 'astuces/' },
    { page: 'about', label: 'Expertise', url: BIONOVA_HOME_URL + 'expertise/' },
    { page: 'contact', label: 'Contact', url: BIONOVA_HOME_URL + 'contact/' },
  ];

  const handleLinkClick = (e, link) => {
    e.preventDefault();
    if (currentPage === 'home' && ['products', 'blog', 'about', 'contact'].includes(link.page)) {
      const sectionMap = { 'products': 'products', 'blog': 'astuces', 'about': 'expertise', 'contact': 'contact' };
      const targetId = sectionMap[link.page];
      const element = document.getElementById(targetId);
      if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
        window.history.pushState({}, '', link.url);
        setMobileOpen(false);
        return;
      }
    }
    onNavigate(link.page);
    setMobileOpen(false);
    window.history.pushState({}, '', link.url);
  };

  return (
    <>
      {/* Mobile Menu Overlay */}
      <div className={`fixed inset-0 bg-white z-[80] transition-all duration-500 transform flex flex-col p-8 lg:hidden ${mobileOpen ? 'translate-x-0 opacity-100' : 'translate-x-full opacity-0 pointer-events-none'}`}>
        <div className="flex justify-between items-center mb-16">
          <img src={THEME_URI + "/assets/brand/logo-bionova.png"} alt="Bionova" className="h-12 object-contain" />
          <button onClick={() => setMobileOpen(false)} className="p-2 text-gray-900"><XIcon className="h-10 w-10" /></button>
        </div>
        <div className="flex flex-col space-y-6">
          {navLinks.map((link) => (
            <a
              key={link.page}
              href={link.url}
              onClick={(e) => handleLinkClick(e, link)}
              className={`text-2xl font-black uppercase tracking-widest py-4 border-b-2 transition-all font-display ${currentPage === link.page ? 'text-bionova-red border-bionova-red' : 'text-black border-transparent hover:text-bionova-red'}`}
            >{link.label}</a>
          ))}
        </div>
      </div>

      {/* Desktop/Mobile Navbar */}
      <header className={`fixed w-full z-50 h-[60px] lg:h-[90px] transition-all duration-500 flex items-center ${currentPage === 'home' && !isScrolled ? 'bg-transparent border-b border-white/20' : 'bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100'}`}>
        <nav className="max-w-[1800px] mx-auto px-4 lg:px-12 w-full h-full" aria-label="Navigation principale">
          <div className="flex justify-between items-center h-full gap-4 lg:gap-8">

            {/* Logo */}
            <a href={BIONOVA_HOME_URL} onClick={(e) => { e.preventDefault(); onNavigate('home'); window.history.pushState({}, '', BIONOVA_HOME_URL); }} className="flex items-center cursor-pointer px-2 group shrink-0">
              <img src={THEME_URI + "/assets/brand/logo-bionova.png"} alt="Logo Bionova" className="transition-all duration-500 object-contain h-[50px] lg:h-[80px] transform lg:scale-[2.0] origin-left group-hover:scale-[2.1]" />
            </a>

            {/* Desktop Menu */}
            <div className="hidden lg:flex flex-grow justify-center items-center space-x-12">
              {navLinks.map((link) => (
                <a
                  key={link.page}
                  href={link.url}
                  onClick={(e) => handleLinkClick(e, link)}
                  className={`text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 font-display ${
                    currentPage === link.page
                      ? (currentPage === 'home' && !isScrolled ? 'text-white border-white' : 'text-bionova-red border-bionova-red')
                      : (currentPage === 'home' && !isScrolled ? 'text-white border-transparent hover:text-white/80 hover:border-white/60' : 'text-black border-transparent hover:text-bionova-red hover:border-bionova-red')
                  }`}
                >{link.label}</a>
              ))}
            </div>

            {/* Right Icons */}
            <div className="flex items-center space-x-2 sm:space-x-6 shrink-0">
              {/* My Account */}
              <button onClick={() => onNavigate('login')} className={`hidden sm:flex p-3 rounded-2xl transition-all group ${currentPage === 'home' && !isScrolled ? 'text-white hover:bg-white/10' : 'text-black hover:bg-gray-100'}`} title="Mon compte">
                <UserIcon className="h-7 w-7 group-hover:scale-110 transition-transform" />
              </button>

              {/* Cart */}
              <button onClick={() => onNavigate('cart')} className={`relative p-3 sm:p-4 rounded-2xl transition-all group ${currentPage === 'home' && !isScrolled ? 'text-white hover:bg-white/10' : 'text-black hover:text-bionova-red hover:bg-gray-50'}`} title="Voir le panier">
                <ShoppingCartIcon className="h-6 w-6 lg:h-7 lg:w-7 group-hover:scale-110 transition-transform" />
                {cartItemCount > 0 && (
                  <span className="absolute -top-1 -right-1 bg-bionova-red text-white text-[10px] lg:text-[11px] font-black w-5 h-5 lg:w-6 lg:h-6 rounded-full flex items-center justify-center shadow-lg">{cartItemCount}</span>
                )}
              </button>

              {/* Mobile Hamburger */}
              <button onClick={() => setMobileOpen(true)} className={`flex lg:hidden items-center justify-center p-2 rounded-xl transition-colors min-w-[48px] min-h-[48px] ${currentPage === 'home' && !isScrolled ? 'text-white hover:bg-white/10' : 'text-gray-900 hover:bg-gray-100'}`} aria-label="Ouvrir le menu">
                <svg className="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2.5" d="M4 6h16M4 12h16M4 18h16" /></svg>
              </button>
            </div>
          </div>
        </nav>
      </header>
    </>
  );
};
