<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="bionova-auth-container min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50 bg-[url('<?php echo get_template_directory_uri(); ?>/assets/hero/hero-bg-texture.webp')] bg-cover bg-center">
    
    <div class="max-w-4xl w-full space-y-8 bg-white/80 backdrop-blur-xl p-8 lg:p-12 rounded-[2rem] shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] border border-white/50">
        
        <div class="text-center mb-10">
            <h2 class="text-3xl font-black text-gray-900 tracking-tight" style="font-family:'Montserrat',sans-serif">
                Bienvenue sur Bionova
            </h2>
            <p class="mt-2 text-sm text-gray-600">Sélectionnez votre type de compte pour continuer</p>
        </div>

        <!-- Toggle Type de Compte -->
        <div class="flex justify-center mb-8">
            <div class="bg-gray-100 p-1.5 rounded-2xl inline-flex relative shadow-inner">
                <div id="auth-slider" class="absolute top-1.5 left-1.5 bottom-1.5 w-[calc(50%-6px)] bg-white rounded-xl shadow-sm transition-transform duration-300 ease-out z-0"></div>
                
                <button type="button" id="btn-client" class="auth-toggle-btn relative z-10 px-8 py-3 text-sm font-bold rounded-xl text-[#be123c] transition-colors w-40 sm:w-48" onclick="switchAuthTab('client')">
                    Compte Client
                </button>
                <button type="button" id="btn-pro" class="auth-toggle-btn relative z-10 px-8 py-3 text-sm font-bold rounded-xl text-gray-500 transition-colors w-40 sm:w-48" onclick="switchAuthTab('pro')">
                    Professionnel
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 relative overflow-hidden">
            
            <!-- Colonne Connexion (Commune) -->
            <div class="flex flex-col justify-center">
                <h3 class="text-2xl font-bold mb-6 text-gray-800">Se connecter</h3>
                <form class="woocommerce-form woocommerce-form-login login space-y-5" method="post">
                    <?php do_action( 'woocommerce_login_form_start' ); ?>

                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?> &nbsp;<span class="required text-[#be123c]">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#be123c]/20 focus:border-[#be123c] transition-all bg-gray-50/50" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1"><?php esc_html_e( 'Password', 'woocommerce' ); ?> &nbsp;<span class="required text-[#be123c]">*</span></label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#be123c]/20 focus:border-[#be123c] transition-all bg-gray-50/50" type="password" name="password" id="password" autocomplete="current-password" />
                    </div>

                    <?php do_action( 'woocommerce_login_form' ); ?>

                    <div class="flex items-center justify-between">
                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme flex items-center">
                            <input class="woocommerce-form__input woocommerce-form__input-checkbox text-[#be123c] focus:ring-[#be123c] rounded border-gray-300" name="rememberme" type="checkbox" id="rememberme" value="forever" /> 
                            <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                        </label>
                        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="text-sm font-medium text-[#be123c] hover:text-gray-900 transition-colors">Mot de passe oublié ?</a>
                    </div>

                    <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                    <button type="submit" class="woocommerce-button button woocommerce-form-login__submit w-full py-4 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-[#be123c] hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#be123c] transition-all transform hover:scale-[1.02]" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
                    
                    <?php do_action( 'woocommerce_login_form_end' ); ?>
                </form>
            </div>

            <!-- Colonne Inscription (Dynamique) -->
            <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
            <div class="flex flex-col justify-center border-t md:border-t-0 md:border-l border-gray-200 pt-10 md:pt-0 md:pl-12">
                
                <h3 id="register-title" class="text-2xl font-bold mb-6 text-gray-800 transition-opacity duration-300">Créer un compte Client</h3>
                
                <div id="client-register-wrap">
                    <form method="post" class="woocommerce-form woocommerce-form-register register space-y-5" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
                        <?php do_action( 'woocommerce_register_form_start' ); ?>

                        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                            <div>
                                <label for="reg_username" class="block text-sm font-medium text-gray-700 mb-1"><?php esc_html_e( 'Username', 'woocommerce' ); ?> &nbsp;<span class="required text-[#be123c]">*</span></label>
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#be123c]/20 focus:border-[#be123c] transition-all bg-gray-50/50" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                            </div>
                        <?php endif; ?>

                        <div>
                            <label for="reg_email" class="block text-sm font-medium text-gray-700 mb-1"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> &nbsp;<span class="required text-[#be123c]">*</span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#be123c]/20 focus:border-[#be123c] transition-all bg-gray-50/50" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                        </div>

                        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                            <div>
                                <label for="reg_password" class="block text-sm font-medium text-gray-700 mb-1"><?php esc_html_e( 'Password', 'woocommerce' ); ?> &nbsp;<span class="required text-[#be123c]">*</span></label>
                                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#be123c]/20 focus:border-[#be123c] transition-all bg-gray-50/50" name="password" id="reg_password" autocomplete="new-password" />
                            </div>
                        <?php else : ?>
                            <p class="text-sm text-gray-500 bg-gray-50 p-3 rounded-xl border border-gray-100"><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>
                        <?php endif; ?>

                        <?php do_action( 'woocommerce_register_form' ); ?>

                        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                        
                        <button type="submit" id="btn-register-submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit w-full py-4 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-gray-900 hover:bg-[#be123c] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-all transform hover:scale-[1.02]" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>

                        <?php do_action( 'woocommerce_register_form_end' ); ?>
                    </form>
                </div>
                
                <div id="pro-contact-wrap" class="hidden flex-col items-center justify-center text-center space-y-6 py-10 h-full">
                    <div class="w-20 h-20 bg-[#be123c]/10 rounded-full flex items-center justify-center text-[#be123c] mb-2 shadow-inner">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-2xl font-black text-gray-900 mb-3" style="font-family:'Montserrat',sans-serif">Vous n'avez pas de compte ?</h4>
                        <p class="text-gray-600 leading-relaxed max-w-sm mx-auto">
                            L'accès à l'Espace Professionnel est réservé aux partenaires Bionova.<br><br>
                            <span class="font-bold text-[#be123c]">Veuillez contacter votre délégué(e) médical(e)</span> pour générer votre accès et obtenir votre Code Partenaire exclusif.
                        </p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function switchAuthTab(tab) {
    const slider = document.getElementById('auth-slider');
    const btnClient = document.getElementById('btn-client');
    const btnPro = document.getElementById('btn-pro');
    
    const registerTitle = document.getElementById('register-title');
    const clientWrap = document.getElementById('client-register-wrap');
    const proWrap = document.getElementById('pro-contact-wrap');
    
    // Reset all
    btnClient.classList.remove('text-[#be123c]');
    btnClient.classList.add('text-gray-500');
    btnPro.classList.remove('text-[#be123c]');
    btnPro.classList.add('text-gray-500');
    
    if (tab === 'pro') {
        slider.style.transform = 'translateX(100%)';
        btnPro.classList.add('text-[#be123c]');
        btnPro.classList.remove('text-gray-500');
        
        if (registerTitle) {
            registerTitle.innerText = "Accès Professionnel";
            clientWrap.classList.add('hidden');
            proWrap.classList.remove('hidden');
            proWrap.classList.add('flex');
        }
        
    } else {
        slider.style.transform = 'translateX(0)';
        btnClient.classList.add('text-[#be123c]');
        btnClient.classList.remove('text-gray-500');
        
        if (registerTitle) {
            registerTitle.innerText = "Créer un compte Client";
            proWrap.classList.add('hidden');
            proWrap.classList.remove('flex');
            clientWrap.classList.remove('hidden');
        }
    }
}
</script>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
