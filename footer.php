  <?php if (!is_front_page()) : ?>
  </div>
  <footer class="bg-white py-12 border-t border-gray-100 text-center">
    <img src="<?php echo get_template_directory_uri(); ?>/logo-bionova.png" alt="Bionova" class="h-12 mx-auto mb-6 grayscale opacity-50" loading="lazy" decoding="async" width="120" height="48" />
    <p class="text-gray-400 text-[11px] font-bold uppercase tracking-widest leading-relaxed">
      &copy; 2026 Bionova - Par un professionnel de santé. Tous droits réservés.
    </p>
  </footer>
  <?php endif; ?>
  <?php wp_footer(); ?>
</body>
</html>
