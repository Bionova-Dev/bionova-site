<?php 
/**
 * BIONOVA — Footer Loader
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
  <?php // Global Footer and Trust Bar ?>
  <div id="footer-container">

  <!-- Trust Bar — Premium Style -->
  <div class="bg-white border-t border-b border-gray-100 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 py-8 sm:py-12">
        <div class="flex flex-col sm:flex-row items-center text-center sm:text-left group cursor-pointer transition-all duration-300 hover:-translate-y-1">
          <div class="mb-4 sm:mb-0 sm:mr-5 p-4 rounded-2xl bg-white border border-gray-100 text-black shadow-sm transition-all duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
          </div>
          <div>
            <h4 class="font-black text-sm text-gray-900 leading-tight uppercase tracking-wider" style="font-family:'Montserrat',sans-serif">Paiement à la livraison</h4>
            <p class="text-[11px] text-gray-400 font-medium uppercase tracking-widest mt-1">Simple et sécurisé</p>
          </div>
        </div>
        <div class="flex flex-col sm:flex-row items-center text-center sm:text-left group cursor-pointer transition-all duration-300 hover:-translate-y-1">
          <div class="mb-4 sm:mb-0 sm:mr-5 p-4 rounded-2xl bg-white border border-gray-100 text-black shadow-sm transition-all duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
          </div>
          <div>
            <h4 class="font-black text-sm text-gray-900 leading-tight uppercase tracking-wider" style="font-family:'Montserrat',sans-serif">Service client à l'écoute</h4>
            <p class="text-[11px] text-gray-400 font-medium uppercase tracking-widest mt-1">Support 7j/7</p>
          </div>
        </div>
        <div class="flex flex-col sm:flex-row items-center text-center sm:text-left group cursor-pointer transition-all duration-300 hover:-translate-y-1">
          <div class="mb-4 sm:mb-0 sm:mr-5 p-4 rounded-2xl bg-white border border-gray-100 text-black shadow-sm transition-all duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3m-1 4a2 2 0 100-4 2 2 0 000 4zm-8 0a2 2 0 100-4 2 2 0 000 4z"></path></svg>
          </div>
          <div>
            <h4 class="font-black text-sm text-gray-900 leading-tight uppercase tracking-wider" style="font-family:'Montserrat',sans-serif">Livraison gratuite</h4>
            <p class="text-[11px] text-gray-400 font-medium uppercase tracking-widest mt-1">Dès 150 DT d'achat</p>
          </div>
        </div>
        <div class="flex flex-col sm:flex-row items-center text-center sm:text-left group cursor-pointer transition-all duration-300 hover:-translate-y-1">
          <div class="mb-4 sm:mb-0 sm:mr-5 p-4 rounded-2xl bg-white border border-gray-100 text-black shadow-sm transition-all duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
          </div>
          <div>
            <h4 class="font-black text-sm text-gray-900 leading-tight uppercase tracking-wider" style="font-family:'Montserrat',sans-serif">Meilleur prix garanti</h4>
            <p class="text-[11px] text-gray-400 font-medium uppercase tracking-widest mt-1">Direct laboratoire</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer — Dark Theme -->
  <footer class="bg-[#fdfafb] pt-24 pb-12 mt-auto border-t border-rose-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-20">
        <div class="flex flex-col items-center md:items-start">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/brand/logo-bionova.webp" alt="Bionova Logo" class="h-16 lg:h-20 object-contain mb-8" loading="lazy" decoding="async" width="200" height="80" />
          <p class="text-gray-600 text-sm leading-relaxed text-center md:text-left font-medium">
            Votre partenaire bien-être au quotidien. Des formules scientifiques et naturelles conçues par des experts pour votre vitalité.
          </p>
        </div>
        <div class="text-center md:text-left">
          <h4 class="text-lg font-bold text-gray-900 uppercase tracking-widest mb-8" style="font-family:'Montserrat',sans-serif">Boutique</h4>
          <ul class="space-y-4">
            <li><a href="<?php echo get_permalink( get_page_by_path( 'boutique' ) ); ?>" class="text-gray-600 hover:text-[#be123c] transition-colors font-bold text-sm">Tous les produits</a></li>
            <li><a href="<?php echo get_permalink( get_page_by_path( 'boutique' ) ); ?>" class="text-gray-600 hover:text-[#be123c] transition-colors font-bold text-sm">Packs Synergie</a></li>
            <li><a href="<?php echo get_permalink( get_page_by_path( 'astuces' ) ); ?>" class="text-gray-600 hover:text-[#be123c] transition-colors font-bold text-sm">Astuces Santé</a></li>
            <li><a href="<?php echo get_permalink( get_page_by_path( 'expertise' ) ); ?>" class="text-gray-600 hover:text-[#be123c] transition-colors font-bold text-sm">Notre Expertise</a></li>
          </ul>
        </div>
        <div class="text-center md:text-left">
          <h4 class="text-lg font-bold text-gray-900 uppercase tracking-widest mb-8" style="font-family:'Montserrat',sans-serif">Assistance</h4>
          <ul class="space-y-4">
            <li class="flex items-center justify-center md:justify-start text-gray-600 font-bold text-sm">
              <svg class="w-5 h-5 mr-3 text-[#be123c] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
              contact@bionova.tn
            </li>
            <li class="flex items-center justify-center md:justify-start text-gray-600 font-bold text-sm">
              <svg class="w-5 h-5 mr-3 text-[#be123c] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
              +216 71 000 000
            </li>
          </ul>
        </div>
        <div class="text-center md:text-right">
          <h4 class="text-lg font-bold text-gray-900 uppercase tracking-widest mb-8" style="font-family:'Montserrat',sans-serif">Rejoignez-nous</h4>
          <div class="flex justify-center md:justify-end space-x-4 mb-8">
            <a href="https://www.instagram.com/bionova" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-white shadow-sm border border-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#be123c] hover:border-[#be123c] hover:text-white transition-all" aria-label="Instagram">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.31.975.975 1.247 2.242 1.31 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.31 3.608-.975.975-2.242 1.247-3.608 1.31-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.31-.975-.975-1.247-2.242-1.31-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.334-2.633 1.31-3.608.975-.975 2.242-1.247 3.608-1.31 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.337 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.337-.2 6.78-2.618 6.98-6.98.058-1.281.072-1.689.072-4.948s-.014-3.667-.072-4.947c-.2-4.337-2.618-6.78-6.98-6.98-1.28-.058-1.688-.072-4.947-.072z" /></svg>
            </a>
            <a href="https://www.facebook.com/bionova" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-white shadow-sm border border-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#be123c] hover:border-[#be123c] hover:text-white transition-all" aria-label="Facebook">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.324v-21.35c0-.732-.593-1.325-1.325-1.325z" /></svg>
            </a>
          </div>
          <div class="flex flex-col space-y-2 items-center md:items-end">
            <a href="javascript:void(0)" class="text-[10px] font-black text-gray-500 hover:text-[#be123c] transition-colors uppercase tracking-widest">Mentions Légales &amp; CGV</a>
            <a href="javascript:void(0)" class="text-[10px] font-black text-gray-500 hover:text-[#be123c] transition-colors uppercase tracking-widest">Politique de confidentialité</a>
          </div>
        </div>
      </div>

      <div class="border-t border-gray-200 pt-10 text-center">
        <p class="text-gray-500 text-[11px] font-bold uppercase tracking-widest leading-relaxed">
          &copy; 2026 Bionova — Par un professionnel de santé. Tous droits réservés.
        </p>
      </div>
    </div>
  </footer>
  </div> <!-- End #footer-container -->
  <?php wp_footer(); ?>
</body></html>
