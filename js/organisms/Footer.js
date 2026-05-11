/* ============================================================
   BIONOVA — Organism: Footer
   VERSION: 20260511
   ============================================================ */

const Footer = () => (
  <footer className="bg-white pt-24 pb-12 mt-auto border-t border-gray-100">
    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div className="grid grid-cols-1 md:grid-cols-4 gap-12 mb-20">
        {/* Logo & Info */}
        <div className="flex flex-col items-center md:items-start">
          <img src={THEME_URI + "/assets/brand/logo-bionova.png"} alt="Bionova Logo" className="h-20 object-contain mb-8" loading="lazy" decoding="async" width="200" height="80" />
          <p className="text-gray-500 text-sm leading-relaxed text-center md:text-left font-medium">
            Votre partenaire bien-être au quotidien. Des formules scientifiques et naturelles conçues par des experts pour votre vitalité.
          </p>
        </div>
        {/* Boutique Links */}
        <div className="text-center md:text-left">
          <h4 className="text-xl font-bold text-bionova-red uppercase tracking-widest mb-8 font-display">Boutique</h4>
          <ul className="space-y-4">
            <li><a href="#products" className="text-gray-600 hover:text-bionova-red transition-colors font-bold text-sm">Tous les produits</a></li>
            <li><a href="#products" className="text-gray-600 hover:text-bionova-red transition-colors font-bold text-sm">Packs Synergie</a></li>
            <li><a href="#products" className="text-gray-600 hover:text-bionova-red transition-colors font-bold text-sm">Nouveautés</a></li>
            <li><a href="#products" className="text-gray-600 hover:text-bionova-red transition-colors font-bold text-sm">Meilleures Ventes</a></li>
          </ul>
        </div>
        {/* Contact & Support */}
        <div className="text-center md:text-left">
          <h4 className="text-xl font-bold text-bionova-red uppercase tracking-widest mb-8 font-display">Assistance</h4>
          <ul className="space-y-4">
            <li className="flex items-center justify-center md:justify-start text-gray-600 font-bold text-sm">
              <svg className="w-5 h-5 mr-3 text-bionova-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
              contact@bionova.tn
            </li>
            <li className="flex items-center justify-center md:justify-start text-gray-600 font-bold text-sm">
              <svg className="w-5 h-5 mr-3 text-bionova-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
              +216 71 000 000
            </li>
          </ul>
        </div>
        {/* Social & Legal */}
        <div className="text-center md:text-right">
          <h4 className="text-xl font-bold text-bionova-red uppercase tracking-widest mb-8 font-display">Rejoignez-nous</h4>
          <div className="flex justify-center md:justify-end space-x-4 mb-8">
            <a href="https://www.facebook.com/bionova" target="_blank" rel="noopener noreferrer" className="w-12 h-12 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-bionova-red hover:text-white transition-all shadow-sm">
              <svg className="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.31.975.975 1.247 2.242 1.31 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.31 3.608-.975.975-2.242 1.247-3.608 1.31-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.31-.975-.975-1.247-2.242-1.31-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.334-2.633 1.31-3.608.975-.975 2.242-1.247 3.608-1.31 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.337 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.337-.2 6.78-2.618 6.98-6.98.058-1.281.072-1.689.072-4.948s-.014-3.667-.072-4.947c-.2-4.337-2.618-6.78-6.98-6.98-1.28-.058-1.688-.072-4.947-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" /></svg>
            </a>
            <a href="https://www.instagram.com/bionova" target="_blank" rel="noopener noreferrer" className="w-12 h-12 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-bionova-red hover:text-white transition-all shadow-sm">
              <svg className="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.324v-21.35c0-.732-.593-1.325-1.325-1.325z" /></svg>
            </a>
          </div>
          <div className="flex flex-col space-y-2 items-center md:items-end">
            <a href="javascript:void(0)" className="text-[10px] font-black text-gray-400 hover:text-bionova-red transition-colors uppercase tracking-widest">Mentions Légales &amp; CGV</a>
            <a href="javascript:void(0)" className="text-[10px] font-black text-gray-400 hover:text-bionova-red transition-colors uppercase tracking-widest">Politique de confidentialité</a>
          </div>
        </div>
      </div>

      <div className="border-t border-gray-100 pt-10 text-center">
        <p className="text-gray-400 text-[11px] font-bold uppercase tracking-widest leading-relaxed">
          &copy; 2026 Bionova - Par un professionnel de santé. Tous droits réservés.
        </p>
      </div>
    </div>
  </footer>
);
