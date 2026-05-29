# 📦 Page Design — Fiche Produit (ProductDetailPage)

> Overrides `MASTER.md` for the product detail page.

---

## Layout

```
Header (90px) + Category Bar
─────────────────────────────────────────
← Retour à la boutique (uppercase, hover:text-bionova-red)
─────────────────────────────────────────
2 Colonnes (lg:grid-cols-2, gap-24)
  ├── LEFT: Image (aspect-square, rounded-[3rem], sticky top-28)
  │   ├── Pack: 2 images superposées (-rotate-6, rotate-6)
  │   └── Badge (absolute top-8 right-8, bg-bionova-red)
  │
  └── RIGHT: Détails
      ├── Type badge (bg-gray-100, text-xs uppercase)
      ├── H1 (text-5xl font-extrabold)
      ├── Stars + Reviews
      ├── Prix (text-4xl text-bionova-red) + ancien prix barré
      ├── Description (text-lg text-gray-600)
      ├── Bienfaits (bg-medical-light/30, grid 2 cols, check icons)
      ├── Accordion: Composition
      ├── Accordion: Conseils d'utilisation
      ├── Précautions (bg-[#FCF9F2], border-[#E8DCC4])
      ├── Conservation (bg-gray-50/50)
      └── Quantité + Add to Cart (bg-[#be123c], full-width)
─────────────────────────────────────────
Cross-sell "Vous aimerez aussi" (3 ProductCards)
─────────────────────────────────────────
Trust Bar + Footer
```

## Spécificités

- **Image sticky :** `sticky top-28` pour rester visible au scroll
- **Prix :** `text-bionova-red font-extrabold`, ancien prix en `text-gray-300 line-through`
- **Bouton Ajouter :** `bg-[#be123c] hover:bg-gray-900`, inline style backup `backgroundColor:'#be123c'`
- **Quantity selector :** `rounded-2xl border`, boutons ± avec `font-bold text-lg`
- **Accordion :** Expand/collapse avec animation

## Fichier Source
`js/pages/ProductDetailPage.js`
