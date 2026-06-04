/**
 * form.js — Professional Registration Form Logic
 * Pre-fills promo code from URL, auto-generates login/password,
 * creates account via WooCommerce API, sends message via WhatsApp/SMS/Mail.
 */
const API_BASE = 'https://bionova.tn/wp-json/bionova/v1';

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('pro-form');
    const promoInput = document.getElementById('promo-code');
    const nomInput = document.getElementById('pro-nom');
    const prenomInput = document.getElementById('pro-prenom');
    const emailInput = document.getElementById('pro-email');
    const phoneInput = document.getElementById('pro-phone');
    const specialitySelect = document.getElementById('pro-speciality');
    const loginInput = document.getElementById('pro-login');
    const passwordInput = document.getElementById('pro-password');
    const formMsg = document.getElementById('form-msg');
    const actionButtons = document.querySelectorAll('.form-actions .btn');

    // 1. Read promo code from URL
    const urlParams = new URLSearchParams(window.location.search);
    const promoCode = urlParams.get('promo') || urlParams.get('code') || '';
    if (promoCode) {
        promoInput.value = promoCode.toUpperCase();
    } else {
        promoInput.value = '⚠️ Aucun code — Scannez un QR code';
    }

    // 2. Auto-generate login when name changes
    function updateLogin() {
        const nom = nomInput.value.trim().toLowerCase()
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '') // remove accents
            .replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
        if (nom) {
            loginInput.value = 'dr.' + nom;
        } else {
            loginInput.value = '';
        }
    }
    nomInput.addEventListener('input', updateLogin);

    // 3. Auto-generate password
    function generatePassword(length) {
        const uppers = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
        const lowers = 'abcdefghjkmnpqrstuvwxyz';
        const nums = '23456789';
        const all = uppers + lowers + nums;
        
        // Guarantee at least 1 uppercase
        let pw = uppers.charAt(Math.floor(Math.random() * uppers.length));
        
        for (let i = 1; i < length; i++) {
            pw += all.charAt(Math.floor(Math.random() * all.length));
        }
        
        // Shuffle the characters
        return pw.split('').sort(() => 0.5 - Math.random()).join('');
    }
    const autoPassword = generatePassword(6);
    passwordInput.value = autoPassword;

    // 4. Enable buttons only when form is valid
    function checkFormValidity() {
        const isValid = promoCode && nomInput.value.trim() && prenomInput.value.trim()
            && emailInput.value.trim() && phoneInput.value.trim()
            && specialitySelect.value && loginInput.value;
        actionButtons.forEach(btn => { btn.disabled = !isValid; });
    }
    [nomInput, prenomInput, emailInput, phoneInput, specialitySelect].forEach(el => {
        el.addEventListener('input', checkFormValidity);
        el.addEventListener('change', checkFormValidity);
    });

    // 5. Handle validation buttons
    let isSubmitting = false;

    actionButtons.forEach(button => {
        button.addEventListener('click', async () => {
            if (isSubmitting) return;
            if (!form.checkValidity()) { form.reportValidity(); return; }

            const action = button.getAttribute('data-action');
            isSubmitting = true;
            actionButtons.forEach(b => { b.disabled = true; });

            showMsg('info', '⏳ Création du compte en cours...');

            try {
                // Call API to create customer
                const res = await fetch(API_BASE + '/create-pro-customer', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        email: emailInput.value.trim(),
                        username: loginInput.value.trim(),
                        password: autoPassword,
                        first_name: prenomInput.value.trim(),
                        last_name: nomInput.value.trim(),
                        phone: '+216' + phoneInput.value.trim().replace(/\s/g, ''),
                        speciality: specialitySelect.value,
                        code_promo: promoCode
                    })
                });

                const data = await res.json();

                if (!res.ok) {
                    throw new Error(data.message || 'Erreur lors de la création du compte');
                }

                // Build the message with password reset link
                const resetUrl = data.reset_url || 'https://bionova.tn/mon-compte/lost-password/';
                const doctorName = prenomInput.value.trim() + ' ' + nomInput.value.trim();
                const message = buildMessage(doctorName, loginInput.value, promoCode, resetUrl);

                showMsg('success', `✅ Compte créé avec succès !<br><br><em>Préparation de l'envoi du message...</em>`);

                // Open the correct app
                setTimeout(() => {
                    // Nettoyer le numéro : on ne garde que les 8 chiffres saisis
                    let rawPhone = phoneInput.value.trim().replace(/[^0-9]/g, '');
                    
                    // Format pour WhatsApp (indicatif sans +)
                    let cleanPhone = '216' + rawPhone;

                    if (action === 'whatsapp') {
                        window.open('https://wa.me/' + cleanPhone + '?text=' + encodeURIComponent(message), '_blank');
                    } else if (action === 'sms') {
                        // Format pour SMS (avec le +)
                        const smsPhone = '+' + cleanPhone;
                        
                        // Détection basique iOS vs Android
                        const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
                        const separator = isIOS ? '&' : '?';
                        
                        window.open('sms:' + smsPhone + separator + 'body=' + encodeURIComponent(message), '_self');
                    } else if (action === 'mail') {
                        window.open('mailto:' + emailInput.value.trim()
                            + '?subject=' + encodeURIComponent('Bienvenue dans l\'Espace Pro Bionova')
                            + '&body=' + encodeURIComponent(message), '_self');
                    }
                }, 500);

            } catch (err) {
                showMsg('error', '❌ ' + err.message);
                isSubmitting = false;
                checkFormValidity();
            }
        });
    });

    function buildMessage(name, login, code, resetUrl) {
        return `Bonjour Dr. ${name},

Bienvenue dans l'Espace Pro !

Votre identifiant : ${login}
Votre code promo : ${code}

Pour créer votre mot de passe et accéder à votre Espace Pro, cliquez ici :
${resetUrl}

À très bientôt !
L'équipe Bionova`;
    }

    function showMsg(type, htmlContent) {
        formMsg.style.display = 'block';
        formMsg.className = 'msg msg--' + type;
        formMsg.innerHTML = htmlContent;
    }
});
