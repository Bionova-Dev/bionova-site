<?php
/**
 * Professional Dashboard for WooCommerce My Account
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$user_id = get_current_user_id();
$points = get_user_meta( $user_id, 'bionova_pro_points', true );
$points = $points ? (int) $points : 0;
$coupon = get_user_meta( $user_id, 'bionova_pro_coupon', true );

// Fallback: Generate coupon if it wasn't generated during registration
if ( ! $coupon ) {
    $last_name = get_user_meta( $user_id, 'billing_last_name', true );
    if ( ! $last_name ) {
        $last_name = get_user_meta( $user_id, 'last_name', true );
    }
    if ( ! $last_name ) {
        $user_info = get_userdata($user_id);
        $last_name = $user_info->user_login; // Fallback to username
    }
    
    if ( $last_name ) {
        $base_code = 'DR-' . strtoupper( sanitize_title( $last_name ) );
        $coupon_code = $base_code;
        $counter = 1;
        while ( wc_get_coupon_id_by_code( $coupon_code ) ) {
            $coupon_code = $base_code . '-' . $counter;
            $counter++;
        }
        
        $new_coupon = new WC_Coupon();
        $new_coupon->set_code( $coupon_code );
        $new_coupon->set_discount_type( 'percent' );
        $new_coupon->set_amount( 10 );
        $new_coupon->set_individual_use( false );
        $new_coupon->set_usage_limit( 0 );
        $new_coupon->set_usage_limit_per_user( 0 );
        $new_coupon->set_description( 'Code auto-généré pour Pro ID ' . $user_id );
        $new_coupon->add_meta_data( 'professional_user_id', $user_id, true );
        $new_coupon->save();

        update_user_meta( $user_id, 'bionova_pro_coupon', $coupon_code );
        $coupon = $coupon_code;
    }
}

$orders = get_user_meta( $user_id, 'bionova_pro_orders', true );

if ( ! is_array( $orders ) ) {
    $orders = array();
}

// Reverse sort orders by date
usort($orders, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

?>

<div class="pro-dashboard w-full space-y-8 animate-fade-in-up">
    <div class="mb-8">
        <h2 class="text-3xl font-black text-gray-900 tracking-tight" style="font-family:'Montserrat',sans-serif">
            Espace Professionnel
        </h2>
        <p class="mt-2 text-gray-600">Bienvenue sur votre tableau de bord partenaire Bionova.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Card Points -->
        <div class="bg-gradient-to-br from-sky-400 to-blue-600 rounded-[2rem] p-8 text-white shadow-xl relative overflow-hidden transform transition-all hover:scale-[1.02] border border-blue-300/30">
            <div class="absolute -right-10 -top-10 opacity-10">
                <svg width="150" height="150" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            </div>
            <div class="relative z-10">
                <p class="text-white/80 text-sm font-bold uppercase tracking-wider mb-2">Total des points</p>
                <div class="flex items-baseline space-x-2">
                    <span class="text-6xl font-black font-display"><?php echo esc_html($points); ?></span>
                    <span class="text-xl text-white/60 font-medium">pts</span>
                </div>
            </div>
        </div>

        <!-- Card Code Promo -->
        <div class="bg-white rounded-[2rem] p-8 border border-gray-100 shadow-xl relative overflow-hidden flex flex-col justify-center">
            <p class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-4">Votre Code Partenaire</p>
            <?php if ( $coupon ) : ?>
                <div class="flex items-center space-x-4">
                    <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl px-6 py-4 flex-1 text-center">
                        <span class="text-2xl font-black text-blue-600 font-display uppercase tracking-widest" id="pro-coupon-code"><?php echo esc_html($coupon); ?></span>
                    </div>
                    <button onclick="navigator.clipboard.writeText('<?php echo esc_js($coupon); ?>'); alert('Code copié !');" class="bg-blue-600 text-white p-4 rounded-xl hover:bg-sky-500 transition-colors shadow-lg shadow-blue-500/30 group" aria-label="Copier le code">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                    </button>
                </div>
                <p class="text-xs text-gray-400 mt-4 text-center">Partagez ce code avec vos patients (10% de réduction).</p>
            <?php else : ?>
                <p class="text-gray-400 italic">Code en cours de génération...</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Historique des commandes -->
    <div class="bg-white rounded-[2rem] p-8 border border-gray-100 shadow-xl mt-8">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Historique des prescriptions</h3>
        
        <?php if ( empty( $orders ) ) : ?>
            <div class="text-center py-10 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                <p class="text-gray-500 font-medium">Aucune commande n'a encore utilisé votre code.</p>
            </div>
        <?php else : ?>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 text-gray-400 text-xs uppercase tracking-wider font-bold">
                            <th class="pb-4 pl-4">Date</th>
                            <th class="pb-4">Patient</th>
                            <th class="pb-4">Commande</th>
                            <th class="pb-4 text-right pr-4">Points</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php foreach ( $orders as $order ) : ?>
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="py-4 pl-4 text-sm text-gray-600">
                                    <?php echo date_i18n( 'd M Y', strtotime( $order['date'] ) ); ?>
                                </td>
                                <td class="py-4 text-sm font-semibold text-gray-900">
                                    <?php echo esc_html( $order['client_name'] ); ?>
                                </td>
                                <td class="py-4 text-sm text-gray-500">
                                    #<?php echo esc_html( $order['order_id'] ); ?>
                                </td>
                                <td class="py-4 text-sm font-black text-emerald-500 text-right pr-4">
                                    +<?php echo esc_html( $order['points'] ); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
