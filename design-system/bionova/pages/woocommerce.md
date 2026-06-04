# 🛒 Page Design — Panier & Checkout (WooCommerce)

> Overrides `MASTER.md` for WooCommerce cart/checkout pages.

---

## Architecture

Ces pages utilisent le template **PHP natif** (`woocommerce.php`), pas React.  
Le header PHP (90px + category bar) est affiché via `get_header()`.

## Layout

```
Header PHP (90px) + Category Bar PHP
─────────────────────────────────────────
Content (pt-[142px], max-w-[1100px])
  └── WooCommerce native content
      ├── Cart table (shop_table)
      ├── Product thumbnails (rounded-[1.5rem])
      ├── Cart totals
      └── Checkout button
─────────────────────────────────────────
Trust Bar PHP + Footer PHP
```

## Styles Appliqués (`woocommerce-custom.css`)

| Élément | Style |
|---------|-------|
| Prix | `font-family: Montserrat, font-weight: 800, color: #e4002b` |
| Bouton Checkout | `bg-[#e4002b], rounded-[1.25rem], uppercase, tracking-[0.15em]` |
| Bouton Checkout hover | `bg-[#9d0e31], translateY(-3px), shadow-bionova` |
| Table borders | `none`, spacing `15px`, bottom border `#f1f5f9` |
| Product images | `rounded-[1.5rem], bg-[#f8fafc], padding: 0.75rem` |
| Cart totals | `margin-top: 4rem` |
| Badges (.onsale) | `bg-[#e4002b], text-white, font-weight: 900` |

## Fichier Source
- Template : `woocommerce.php`
- CSS : `woocommerce-custom.css`
- Image fallback : `inc/woocommerce.php` (bionova_wc_fallback_product_image)
