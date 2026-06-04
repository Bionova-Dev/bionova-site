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

// Le code promo est désormais uniquement géré via le paramètre de l'URL lors de l'inscription.

$orders = get_user_meta( $user_id, 'bionova_pro_orders', true );

if ( ! is_array( $orders ) ) {
    $orders = array();
}

// Reverse sort orders by date
usort($orders, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

?>

<div class="pro-dashboard animate-fade-in-up">
    <!-- Header premium -->
    <div class="pro-dashboard-header">
        <h2 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight" style="font-family:'Montserrat',sans-serif; margin-bottom: 0.5rem;">
            Espace Partenaire Bionova Pro
        </h2>
        <p class="text-gray-600" style="margin: 0; font-size: 1rem;">
            Suivez vos performances, gérez votre code et consultez vos points partenaires en temps réel.
        </p>
    </div>

    <!-- Grid des KPIs -->
    <div class="pro-cards-grid">
        <!-- Carte 1: Points cumulés -->
        <div class="pro-card pro-card-gradient-red">
            <div class="absolute -right-10 -top-10 opacity-10" style="position: absolute; right: -40px; top: -40px; opacity: 0.1;">
                <svg width="150" height="150" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            </div>
            <div style="position: relative; z-index: 10;">
                <div class="pro-card-label">Points Cumulés</div>
                <div class="pro-card-value">
                    <?php echo esc_html($points); ?>
                    <span class="pro-card-value-unit" style="color: rgba(255,255,255,0.7);">pts</span>
                </div>
            </div>
        </div>

        <!-- Carte 2: Prescriptions réussies -->
        <div class="pro-card pro-card-white">
            <div class="absolute -right-10 -top-10 opacity-5" style="position: absolute; right: -45px; top: -45px; opacity: 0.05; color: #000;">
                <svg width="150" height="150" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
            </div>
            <div style="position: relative; z-index: 10;">
                <div class="pro-card-label">Prescriptions Réussies</div>
                <div class="pro-card-value">
                    <?php echo esc_html(count($orders)); ?>
                    <span class="pro-card-value-unit">recom.</span>
                </div>
            </div>
        </div>

        <!-- Carte 3: Code Promo -->
        <div class="pro-card pro-card-white flex flex-col justify-center" style="display: flex; flex-direction: column; justify-content: center;">
            <div class="pro-card-label">Votre Code Partenaire</div>
            <?php if ( $coupon ) : ?>
                <div class="pro-coupon-box">
                    <div class="pro-coupon-display" id="pro-coupon-code">
                        <?php echo esc_html($coupon); ?>
                    </div>
                    <button onclick="copyProCode('<?php echo esc_js($coupon); ?>')" class="pro-copy-btn" title="Copier le code">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                    </button>
                </div>
                <p class="text-xs text-gray-400" style="margin: 0.5rem 0 0 0; font-size: 0.75rem; text-align: center; color: #94a3b8;">
                    <strong>10% de remise</strong> immédiate pour vos patients.
                </p>
            <?php else : ?>
                <p class="text-gray-400 italic" style="margin: 0;">Code en cours de génération...</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Historique des prescriptions -->
    <div class="pro-history-card">
        <h3 class="pro-history-title">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="color:#e4002b;"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18M16 10a4 4 0 0 1-8 0"/></svg>
            Historique des Prescriptions
        </h3>
        
        <?php if ( empty( $orders ) ) : ?>
            <div class="text-center py-10 rounded-2xl" style="text-align: center; padding: 3rem; background: #f8fafc; border: 2px dashed #e2e8f0; border-radius: 1.5rem;">
                <svg class="text-gray-300 mx-auto" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" style="margin: 0 auto 1rem auto; color: #94a3b8;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                <p class="text-gray-500 font-medium" style="margin: 0; color: #64748b; font-weight: 600;">Aucune commande n'a encore été passée avec votre code.</p>
            </div>
        <?php else : ?>
            <div class="pro-table-wrapper">
                <table class="pro-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Patient</th>
                            <th>Commande</th>
                            <th style="text-align: right;">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $orders as $order ) : 
                            $patient_name = esc_html($order['client_name']);
                            $initials = '';
                            if ($patient_name) {
                                $words = explode(' ', $patient_name);
                                foreach ($words as $w) {
                                    $initials .= strtoupper(substr($w, 0, 1));
                                }
                                $initials = substr($initials, 0, 2);
                            }
                            if (empty($initials)) { $initials = 'P'; }
                        ?>
                            <tr>
                                <td style="color: #64748b; font-weight: 500;">
                                    <?php echo date_i18n( 'd M Y', strtotime( $order['date'] ) ); ?>
                                </td>
                                <td>
                                    <div class="pro-patient-cell">
                                        <div class="pro-patient-avatar"><?php echo $initials; ?></div>
                                        <span class="pro-patient-name"><?php echo $patient_name; ?></span>
                                    </div>
                                </td>
                                <td>
                                    <span class="pro-badge-order">#<?php echo esc_html( $order['order_id'] ); ?></span>
                                </td>
                                <td style="text-align: right;">
                                    <span class="pro-badge-points">+<?php echo esc_html( $order['points'] ); ?> pts</span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Custom Toast -->
<div id="pro-toast" class="pro-toast">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
    Code partenaire copié !
</div>

<!-- Script d'interaction -->
<script>
function copyProCode(code) {
    navigator.clipboard.writeText(code).then(function() {
        var toast = document.getElementById('pro-toast');
        toast.classList.add('show');
        setTimeout(function() {
            toast.classList.remove('show');
        }, 3000);
    }).catch(function() {
        alert('Code partenaire copié !');
    });
}
</script>

