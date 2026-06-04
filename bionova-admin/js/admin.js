/**
 * admin.js — Dashboard Logic
 * Fetches WooCommerce coupons and displays them as QR codes.
 * Allows adding new coupons.
 */
const API_BASE = 'https://bionova.tn/wp-json/bionova/v1';
const FORM_BASE_URL = 'https://bionova.tn/inscription-pro/';

document.addEventListener('DOMContentLoaded', () => {
    const qrGrid = document.getElementById('qr-grid');
    const loadingEl = document.getElementById('loading');
    const emptyMsg = document.getElementById('empty-msg');
    const addForm = document.getElementById('add-coupon-form');
    const addMsg = document.getElementById('add-coupon-msg');

    // ---- Load coupons from API ----
    async function loadCoupons() {
        loadingEl.style.display = 'block';
        emptyMsg.style.display = 'none';
        qrGrid.innerHTML = '';

        try {
            const res = await fetch(API_BASE + '/list-coupons');
            if (!res.ok) throw new Error('Erreur serveur');
            const coupons = await res.json();

            loadingEl.style.display = 'none';

            if (!coupons.length) {
                emptyMsg.style.display = 'block';
                return;
            }

            coupons.forEach(coupon => {
                createQRCard(coupon);
            });
        } catch (err) {
            loadingEl.textContent = 'Erreur de chargement : ' + err.message;
        }
    }

    // ---- Create a QR card ----
    function createQRCard(coupon) {
        const card = document.createElement('div');
        card.className = 'qr-card';

        // QR code container
        const qrContainer = document.createElement('div');
        const formUrl = FORM_BASE_URL + '?promo=' + encodeURIComponent(coupon.code);
        new QRCode(qrContainer, {
            text: formUrl,
            width: 140,
            height: 140,
            colorDark: '#e4002b',
            colorLight: '#ffffff',
            correctLevel: QRCode.CorrectLevel.H
        });
        card.appendChild(qrContainer);

        // Code name
        const codeEl = document.createElement('div');
        codeEl.className = 'qr-card__code';
        codeEl.textContent = coupon.code.toUpperCase();
        card.appendChild(codeEl);

        // Discount info
        const infoEl = document.createElement('div');
        infoEl.className = 'qr-card__info';
        infoEl.textContent = coupon.discount + (coupon.type === 'percent' ? '%' : ' DT') + ' de réduction';
        card.appendChild(infoEl);

        // Assigned status
        if (coupon.assigned_to) {
            const assignedEl = document.createElement('div');
            assignedEl.className = 'qr-card__assigned';
            assignedEl.textContent = '✓ ' + coupon.assigned_to;
            card.appendChild(assignedEl);

            const badge = document.createElement('span');
            badge.className = 'qr-card__badge qr-card__badge--taken';
            badge.textContent = 'Attribué';
            card.appendChild(badge);
        } else {
            const badge = document.createElement('span');
            badge.className = 'qr-card__badge qr-card__badge--free';
            badge.textContent = 'Disponible';
            card.appendChild(badge);
        }

        qrGrid.appendChild(card);
    }

    // ---- Add new coupon ----
    addForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const code = document.getElementById('new-coupon-code').value.trim();
        const discount = document.getElementById('new-coupon-discount').value;

        if (!code) return;

        addMsg.style.display = 'block';
        addMsg.className = 'msg msg--info';
        addMsg.textContent = 'Création en cours...';

        try {
            const res = await fetch(API_BASE + '/create-coupon', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ code: code, discount: parseFloat(discount), type: 'percent' })
            });

            const data = await res.json();

            if (!res.ok) {
                throw new Error(data.message || 'Erreur lors de la création');
            }

            addMsg.className = 'msg msg--success';
            addMsg.textContent = '✅ Code "' + data.code + '" créé avec succès !';
            addForm.reset();

            // Reload the grid
            loadCoupons();

        } catch (err) {
            addMsg.className = 'msg msg--error';
            addMsg.textContent = '❌ ' + err.message;
        }

        setTimeout(() => { addMsg.style.display = 'none'; }, 4000);
    });

    // Initial load
    loadCoupons();
});
