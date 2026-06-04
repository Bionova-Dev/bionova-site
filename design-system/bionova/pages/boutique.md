# 🛒 Page Design — Boutique (ProductsPage)

> Overrides `MASTER.md` for the products page.

---

## Layout

```
Header (90px) + Category Bar (sticky, filtrage actif)
─────────────────────────────────────────
Catalog Header (pt-36, bg-gray-50)
  ├── H1: "La Boutique Bionova" (text-6xl)
  ├── Search Bar (rounded-2xl, pl-12 icon)
  └── Sort Select (prix, notes)
─────────────────────────────────────────
Results Count (text-sm text-gray-400)
─────────────────────────────────────────
Product Grid (4 cols desktop, 2 mobile)
  └── ProductCard × N
─────────────────────────────────────────
Empty State (si filtrage = 0 résultats)
─────────────────────────────────────────
Trust Bar + Footer
```

## Spécificités

- **Category Bar :** Filtre actif = `bg-[#e4002b] text-white scale-105`, inactif = `bg-white text-gray-500 border`
- **Search :** `focus:border-bionova-red focus:ring-2 focus:ring-bionova-red/10`
- **Product Cards :** `rounded-[2.5rem]`, image flottante au hover (`translateY(-12px)`), badge `bg-bionova-red`
- **Grid gaps :** `gap-10`
- **Empty state :** Icône loupe grise, bouton reset filtres

## Source de Données
- Produits : `js/data/products.js`
- Catégories : `js/data/categories.js` (BIONOVA_CATEGORIES)

## Fichier Source
`js/pages/ProductsPage.js`
