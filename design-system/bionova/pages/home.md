# 🏠 Page Design — Accueil (HomePage)

> Overrides `MASTER.md` for the homepage only.

---

## Layout

```
Header (90px fixed) + Category Bar (sticky)
─────────────────────────────────────────
Hero Carousel (fullscreen, 3 slides, auto-rotate 5s)
─────────────────────────────────────────
Stats Counter Bar (bg-gray-900, 4 colonnes)
─────────────────────────────────────────
Catégories Grid (bg-gray-50, 2x4 mobile, 5 cols desktop)
─────────────────────────────────────────
Best Sellers (bg-white, 3 cols, rounded-[3rem] cards)
─────────────────────────────────────────
Packs Exclusifs (bg-medical-light/30, gold-border)
─────────────────────────────────────────
Témoignages (bg-white, 3 cols)
─────────────────────────────────────────
Expertise Teaser (bg-gray-50, image + texte)
─────────────────────────────────────────
Blog Teaser (bg-white, 3 articles)
─────────────────────────────────────────
Contact CTA (bg-gray-900, gradient #be123c/20)
─────────────────────────────────────────
Trust Bar + Footer
```

## Spécificités

- **Hero :** Fullscreen avec overlay sombre, CTA Rouge Bionova, texte blanc
- **Stats :** Compteurs animés, hover → couleur rouge
- **Best Sellers :** Badge "Best Seller" `bg-[#be123c]`, prix en rouge, bouton panier `bg-gray-900 hover:bg-bionova-red`
- **Packs :** `gold-border`, images superposées avec rotation au hover, prix barré + prix pack en rouge
- **Témoignages :** Guillemets décoratifs `text-[#be123c]/10`, étoiles jaunes
- **Section spacing :** `py-28` entre chaque section

## Fichier Source
`js/pages/HomePage.js`
