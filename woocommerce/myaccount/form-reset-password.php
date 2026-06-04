<?php
/**
 * Reset Password Form — Bionova Custom
 * 2 password fields with eye toggle + validate → redirect to account
 *
 * @see https://woocommerce.com/document/template-structure/
 * Variables available: $key, $login (extracted by wc_get_template)
 */

defined( 'ABSPATH' ) || exit;

// Variables are extracted by wc_get_template() via extract()
$rp_key   = isset( $key )   ? $key   : '';
$rp_login = isset( $login ) ? $login : '';
?>

<style>
.bionova-reset-wrap {
  max-width: 480px;
  margin: 2rem auto;
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}
.bionova-reset-card {
  background: white;
  border-radius: 1.5rem;
  box-shadow: 0 8px 30px rgba(0,0,0,0.06);
  padding: 2.5rem 2rem;
  border: 1px solid #f1f5f9;
}
@media (min-width: 640px) {
  .bionova-reset-card { padding: 3rem 2.5rem; }
}
.bionova-reset-card .reset-logo {
  display: block;
  margin: 0 auto 1.5rem;
  height: 50px;
  width: auto;
}
.bionova-reset-card .reset-title {
  font-size: 1.5rem;
  font-weight: 800;
  text-align: center;
  margin-bottom: 0.4rem;
  color: #0f172a;
}
.bionova-reset-card .reset-subtitle {
  text-align: center;
  color: #64748b;
  font-size: 1rem;
  margin-bottom: 2rem;
  line-height: 1.5;
}
.bionova-reset-card .rform-group {
  margin-bottom: 1.5rem;
}
.bionova-reset-card .rform-group label {
  display: block !important;
  font-size: 0.95rem !important;
  font-weight: 700 !important;
  color: #475569 !important;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  margin-bottom: 0.5rem !important;
}
.bionova-reset-card .rinput-wrapper {
  position: relative;
}
.bionova-reset-card .rinput-wrapper input[type="password"],
.bionova-reset-card .rinput-wrapper input[type="text"] {
  width: 100% !important;
  padding: 1rem 3.2rem 1rem 1.15rem !important;
  border: 2px solid #e2e8f0 !important;
  border-radius: 0.85rem !important;
  font-size: 1.1rem !important;
  font-family: inherit;
  color: #0f172a !important;
  background: #f8fafc !important;
  outline: none;
  transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
  box-sizing: border-box;
  margin: 0 !important;
}
.bionova-reset-card .rinput-wrapper input:focus {
  border-color: #e4002b !important;
  box-shadow: 0 0 0 4px rgba(228, 0, 43, 0.08) !important;
  background: white !important;
}
.bionova-reset-card .rtoggle-eye {
  position: absolute;
  right: 1rem;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  cursor: pointer;
  color: #94a3b8;
  padding: 0.25rem;
  transition: color 0.2s;
  display: flex;
  align-items: center;
}
.bionova-reset-card .rtoggle-eye:hover { color: #475569; }
.bionova-reset-card .rtoggle-eye svg { width: 22px; height: 22px; }

.bionova-reset-card .rbtn-validate {
  width: 100%;
  padding: 1.1rem;
  background: #e4002b;
  color: white;
  border: none;
  border-radius: 0.85rem;
  font-size: 1.15rem;
  font-weight: 700;
  font-family: inherit;
  cursor: pointer;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  transition: all 0.25s;
  margin-top: 0.5rem;
}
.bionova-reset-card .rbtn-validate:hover {
  background: #c50025;
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(228, 0, 43, 0.25);
}
.bionova-reset-card .rbtn-validate:active { transform: scale(0.98); }

.bionova-reset-card .rpassword-rules {
  display: flex;
  gap: 1rem;
  margin-top: 0.4rem;
  flex-wrap: wrap;
}
.bionova-reset-card .rpassword-rules span {
  font-size: 0.82rem;
  color: #94a3b8;
  display: flex;
  align-items: center;
  gap: 0.3rem;
}
.bionova-reset-card .rpassword-rules span.rvalid { color: #16a34a; }
.bionova-reset-card .rcheck-icon { width: 14px; height: 14px; }

/* Hide WooCommerce default elements on this page */
.woocommerce-ResetPassword .form-row,
.woocommerce-ResetPassword > p { display: none !important; }
</style>

<div class="bionova-reset-wrap">
  <div class="bionova-reset-card">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/brand/logo-bionova.webp' ); ?>" alt="Bionova" class="reset-logo">
    <h2 class="reset-title">Créer votre mot de passe</h2>
    <p class="reset-subtitle">Choisissez un mot de passe sécurisé pour accéder à votre Espace Pro.</p>

    <form method="post" id="bionova-reset-form">

      <div class="rform-group">
        <label for="password_1">Nouveau mot de passe</label>
        <div class="rinput-wrapper">
          <input type="password" id="password_1" name="password_1" autocomplete="new-password" required placeholder="••••••••">
          <button type="button" class="rtoggle-eye" data-target="password_1" aria-label="Afficher le mot de passe">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
        <div class="rpassword-rules">
          <span id="rrule-length"><svg class="rcheck-icon" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8" fill="none" stroke="currentColor" stroke-width="2"/></svg> 6 caractères min.</span>
          <span id="rrule-upper"><svg class="rcheck-icon" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8" fill="none" stroke="currentColor" stroke-width="2"/></svg> 1 majuscule</span>
        </div>
      </div>

      <div class="rform-group">
        <label for="password_2">Confirmer le mot de passe</label>
        <div class="rinput-wrapper">
          <input type="password" id="password_2" name="password_2" autocomplete="new-password" required placeholder="••••••••">
          <button type="button" class="rtoggle-eye" data-target="password_2" aria-label="Afficher le mot de passe">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
      </div>

      <input type="hidden" name="reset_key" value="<?php echo esc_attr( $rp_key ); ?>" />
      <input type="hidden" name="reset_login" value="<?php echo esc_attr( $rp_login ); ?>" />
      <?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>
      <input type="hidden" name="wc_reset_password" value="true" />

      <button type="submit" class="rbtn-validate">Valider le mot de passe</button>
    </form>
  </div>
</div>

<script>
(function() {
  // Toggle password visibility
  document.querySelectorAll('.rtoggle-eye').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var input = document.getElementById(btn.getAttribute('data-target'));
      var isPassword = input.type === 'password';
      input.type = isPassword ? 'text' : 'password';
      btn.innerHTML = isPassword
        ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>'
        : '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>';
    });
  });

  // Live validation indicators
  var pw1 = document.getElementById('password_1');
  var ruleLength = document.getElementById('rrule-length');
  var ruleUpper = document.getElementById('rrule-upper');
  var checkSvg = '<svg class="rcheck-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>';
  var circleSvg = '<svg class="rcheck-icon" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8" fill="none" stroke="currentColor" stroke-width="2"/></svg>';

  if (pw1) {
    pw1.addEventListener('input', function() {
      var val = pw1.value;
      var hasLength = val.length >= 6;
      var hasUpper = /[A-Z]/.test(val);
      ruleLength.className = hasLength ? 'rvalid' : '';
      ruleLength.innerHTML = (hasLength ? checkSvg : circleSvg) + ' 6 caractères min.';
      ruleUpper.className = hasUpper ? 'rvalid' : '';
      ruleUpper.innerHTML = (hasUpper ? checkSvg : circleSvg) + ' 1 majuscule';
    });
  }

  // Client-side validation
  var form = document.getElementById('bionova-reset-form');
  if (form) {
    form.addEventListener('submit', function(e) {
      var p1 = document.getElementById('password_1').value;
      var p2 = document.getElementById('password_2').value;
      if (p1.length < 6) { e.preventDefault(); alert('Le mot de passe doit contenir au moins 6 caractères.'); return; }
      if (!/[A-Z]/.test(p1)) { e.preventDefault(); alert('Le mot de passe doit contenir au moins une lettre majuscule.'); return; }
      if (p1 !== p2) { e.preventDefault(); alert('Les deux mots de passe ne correspondent pas.'); return; }
    });
  }
})();
</script>
