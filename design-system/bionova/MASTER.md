# 🎨 Design System — Bionova Pro Max

> **LOGIC:** When building a specific page, first check `design-system/pages/[page-name].md`.
> If that file exists, its rules **override** this Master file.
> If not, strictly follow the rules below.

---

**Project:** Bionova — Micronutrition Premium  
**Updated:** 2026-05-15  
**Category:** E-commerce Santé / Luxury Healthcare  
**URL:** bionova.tn

---

## Global Rules

### Color Palette — Rouge Bionova Identity

| Role | Hex | CSS Variable | Usage |
|------|-----|--------------|-------|
| **Primary (Rouge Bionova)** | `#be123c` | `--color-bionova-red` | Boutons CTA, badges, liens actifs, panier |
| Primary Dark | `#9d0e31` | `--color-bionova-red-dark` | Hover des boutons principaux |
| Primary Light | `#fb7185` | `--color-bionova-red-light` | Accents, fonds légers |
| Background | `#ffffff` | `--color-white` | Fond principal |
| Surface | `#f8fafc` | `--color-gray-50` | Sections alternées, cartes |
| Border | `#f1f5f9` | `--color-gray-100` | Séparateurs, bordures de cartes |
| Text Primary | `#1e293b` | `--color-text-primary` | Titres, texte principal |
| Text Muted | `#64748b` | `--color-text-muted` | Descriptions, sous-titres |
| Dark Surface | `#0f172a` | `--color-gray-900` | Sections hero sombres, footer |
| Success | `#059669` | `--color-success` | Confirmations, ajout panier |
| Warning BG | `#FCF9F2` | `--color-warning-bg` | Précautions produit |
| Warning Border | `#E8DCC4` | `--color-warning-border` | Bordures précautions |

**Règle absolue :** Le Rouge Bionova `#be123c` est la SEULE couleur d'accentuation. Ne jamais utiliser de bleu, vert ou violet pour les CTA.

### Typography

- **Heading Font:** Montserrat (700, 800, 900)
- **Body Font:** Inter (400, 500, 600, 700, 800, 900)
- **Accent Font:** Outfit (300, 400, 600, 700)
- **Mood:** Premium, scientifique, confiance, santé, luxe accessible

**Google Fonts:**
```css
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Montserrat:wght@700;800;900&family=Outfit:wght@300;400;600;700&display=swap');
```

**Utilisation :**
| Élément | Font | Weight | Size | Tracking |
|---------|------|--------|------|----------|
| H1 (Hero) | Montserrat | 900 (black) | 48-72px | -0.025em |
| H2 (Section) | Montserrat | 800 | 36-48px | normal |
| H3 (Card) | Montserrat | 800 | 24-30px | normal |
| Label/Badge | Montserrat | 700 | 10-12px | 0.15em (uppercase) |
| Body | Inter | 400-500 | 14-16px | normal |
| Button | Inter | 700-900 | 14-18px | 0.12-0.15em (uppercase) |
| Nav Link | Montserrat | 900 | 18-20px | 0.12em (uppercase) |
| Price | Montserrat | 900 | 24-48px | normal |

### Spacing Variables

| Token | Value | Usage |
|-------|-------|-------|
| `--space-1` | `0.25rem` (4px) | Micro gaps |
| `--space-2` | `0.5rem` (8px) | Icon gaps, inline |
| `--space-3` | `0.75rem` (12px) | Tight padding |
| `--space-4` | `1rem` (16px) | Standard padding |
| `--space-6` | `1.5rem` (24px) | Card padding |
| `--space-8` | `2rem` (32px) | Section gaps |
| `--space-12` | `3rem` (48px) | Large spacing |
| `--space-16` | `4rem` (64px) | Section margins |
| `--space-20` | `5rem` (80px) | Hero padding |
| `--space-24` | `6rem` (96px) | Full section padding (`py-24`) |
| `--space-32` | `8rem` (128px) | Extra large sections (`py-32`) |

### Border Radius

| Token | Value | Usage |
|-------|-------|-------|
| `--radius-sm` | `0.5rem` (8px) | Inputs, small buttons |
| `--radius-md` | `0.75rem` (12px) | Badges |
| `--radius-lg` | `1rem` (16px) | Standard cards |
| `--radius-xl` | `1.25rem` (20px) | Buttons principaux |
| `--radius-2xl` | `1.5rem` (24px) | Cards premium |
| `--radius-3xl` | `2rem` (32px) | Product cards |
| `--radius-4xl` | `2.5rem` (40px) | Hero cards |
| `--radius-full` | `9999px` | Badges ronds, pills |

### Shadow Depths

| Level | Value | Usage |
|-------|-------|-------|
| `--shadow-sm` | `0 1px 3px rgba(0,0,0,0.05)` | Lift subtil |
| `--shadow-md` | `0 4px 6px -1px rgba(0,0,0,0.07)` | Cartes au repos |
| `--shadow-lg` | `0 10px 15px -3px rgba(0,0,0,0.08)` | Cartes hover |
| `--shadow-xl` | `0 20px 25px -5px rgba(0,0,0,0.1)` | Cartes featured |
| `--shadow-2xl` | `0 25px 50px -12px rgba(0,0,0,0.15)` | Modals, hero |
| `--shadow-bionova` | `0 15px 30px -10px rgba(190,18,60,0.3)` | Boutons CTA hover |

---

## Layout Architecture

### Header — Fixe & Universel

```
┌──────────────────────────────────────────────────────────┐
│  HEADER (90px, fixed, z-50, bg-white/95 backdrop-blur)   │
│  ┌─────┐  ┌─────────────────────────┐  ┌──────────────┐ │
│  │ Logo│  │ Accueil Boutique Astuces│  │ 👤  🛒  ☰   │ │
│  │ x2.0│  │ Expertise Contact       │  │              │ │
│  └─────┘  └─────────────────────────┘  └──────────────┘ │
├──────────────────────────────────────────────────────────┤
│  CATEGORY BAR (sticky top-[90px], z-40, bg-gray-50)      │
│  [Tous] [Antioxydants] [Stress] [Beauté] [Packs] ...    │
└──────────────────────────────────────────────────────────┘
```

- **Hauteur :** 90px fixe — JAMAIS MODIFIABLE
- **Logo :** `scale-[2.0]`, origin-left
- **Nav :** Centré avec `absolute left-1/2 -translate-x-1/2`
- **Couleur active :** Rouge Bionova + border-bottom 4px
- **Mobile :** Hamburger → Overlay fullscreen

### Content Spacing

| Page Type | Padding Top | Raison |
|-----------|-------------|--------|
| SPA Pages (React) | Géré par composants | Header fixed + CategoryBar |
| WooCommerce/WP | `pt-[142px]` | 90px header + 52px category bar |

### Max Widths

| Usage | Value |
|-------|-------|
| Content max | `1800px` (nav) |
| Page sections | `max-w-7xl` (80rem / 1280px) |
| Text content | `max-w-5xl` (64rem) |
| Narrow content | `max-w-3xl` (48rem) |

---

## Component Specs

### Buttons

```css
/* CTA Principal — Rouge Bionova */
.btn-cta {
  background: #be123c;
  color: white;
  padding: 1.25rem 2.5rem;
  border-radius: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.15em;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  cursor: pointer;
  box-shadow: 0 15px 30px -10px rgba(190, 18, 60, 0.3);
}

.btn-cta:hover {
  background: #0f172a; /* gray-900 */
  transform: translateY(-3px);
  box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.3);
}
```

### Product Cards

```css
.product-card {
  background: #f8fafc;
  border-radius: 3rem;
  padding: 2.5rem;
  border: 1px solid #f1f5f9;
  transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
  cursor: pointer;
}

.product-card:hover {
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
  border-color: rgba(190, 18, 60, 0.2);
  transform: translateY(-8px);
}
```

### Category Pills

```css
.category-pill {
  padding: 0.625rem 1.5rem;
  border-radius: 0.75rem;
  font-weight: 700;
  font-size: 0.75rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  transition: all 0.3s ease;
  cursor: pointer;
}

.category-pill.active {
  background: #be123c;
  color: white;
  box-shadow: 0 10px 15px -3px rgba(190, 18, 60, 0.2);
  transform: scale(1.05);
}
```

### Inputs

```css
.input {
  padding: 0.875rem 1.5rem;
  border: 1px solid #e2e8f0;
  border-radius: 1rem;
  font-size: 0.875rem;
  font-weight: 500;
  transition: all 0.3s ease;
}

.input:focus {
  border-color: #be123c;
  outline: none;
  box-shadow: 0 0 0 3px rgba(190, 18, 60, 0.1);
}
```

---

## Page Sections Pattern

### Homepage Flow

```
1. Hero Carousel (fullscreen, dark overlay)
2. Stats Counter Bar (bg-gray-900)
3. Category Grid (bg-gray-50)
4. Best Sellers Grid (bg-white, 3 colonnes)
5. Exclusive Packs (bg-medical-light/30, gold-border)
6. Testimonials (bg-white, 3 colonnes)
7. Expertise Teaser (bg-gray-50, image + text)
8. Blog Teaser (bg-white, 3 articles)
9. Contact CTA (bg-gray-900, gradient rouge)
```

### Section Anatomy

```
<section className="py-28 bg-white border-t border-gray-100">
  <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div className="text-center mb-20">
      <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">
        Label
      </h2>
      <p className="font-display text-4xl font-extrabold text-gray-900 sm:text-5xl">
        Titre Principal
      </p>
      <p className="mt-6 text-xl text-gray-500 max-w-2xl mx-auto">
        Description
      </p>
    </div>
    <!-- Content Grid -->
  </div>
</section>
```

---

## File Architecture

```
h:\bionova site\
├── header.php          # Menu PHP global (90px + category bar)
├── footer.php          # Trust Bar + Footer PHP
├── index.php           # SPA Shell (React mount point)
├── page.php            # Generic WP pages
├── woocommerce.php     # Cart / Checkout
├── single.php          # Single post
├── archive.php         # Archive listings
├── search.php          # Search results
├── 404.php             # Error page
├── page-boutique.php   # → index.php (initial_page='products')
├── page-astuces.php    # → index.php (initial_page='blog')
├── page-expertise.php  # → index.php (initial_page='about')
├── page-contact.php    # → index.php (initial_page='contact')
├── css/
│   ├── design-tokens.css   # Source de vérité CSS
│   ├── base.css            # Reset + utilitaires
│   └── animations.css      # Keyframes + transitions
├── js/
│   ├── data/
│   │   ├── products.js     # Données produits
│   │   ├── articles.js     # Données blog
│   │   ├── categories.js   # Catégories partagées
│   │   └── wc-config.js    # Config WooCommerce
│   ├── icons/icons.js      # SVG icons (Heroicons)
│   ├── atoms/              # Accordion, InteractiveViewer
│   ├── molecules/          # ProductCard, TrustBar, CategoryBar
│   ├── organisms/          # Navbar, Footer, HeroCarousel
│   ├── pages/              # HomePage, ProductsPage, BlogPage, etc.
│   └── app.js              # Main React App
└── assets/
    ├── brand/              # logo-bionova.png
    ├── hero/               # hero-banner.png
    ├── products/           # NMN, Ashwagandha, etc. (.png)
    └── blog/               # Article images
```

---

## Anti-Patterns (INTERDIT)

- ❌ **Couleurs autres que #be123c pour les CTA** — Pas de bleu, vert, violet
- ❌ **Emojis comme icônes** — Utiliser des SVG (Heroicons)
- ❌ **`cursor: default` sur des éléments cliquables** — Toujours `cursor: pointer`
- ❌ **Transitions instantanées** — Minimum 150ms, préférer 300ms
- ❌ **Header transparent sur la page d'accueil** — Toujours blanc/glassmorphism
- ❌ **Polices système** — Toujours Inter/Montserrat via Google Fonts
- ❌ **Contenu caché derrière le header fixe** — Respecter `pt-[142px]`
- ❌ **Scroll horizontal sur mobile** — `overflow-x: hidden` si nécessaire
- ❌ **Contraste insuffisant** — Minimum 4.5:1 pour le texte

---

## Pre-Delivery Checklist

Avant toute livraison de code UI, vérifier :

- [ ] Couleur CTA = `#be123c` (Rouge Bionova) uniquement
- [ ] Tous les SVG icons (pas d'emojis)
- [ ] `cursor: pointer` sur tous les éléments cliquables
- [ ] Hover states avec transitions (300ms)
- [ ] Contraste texte minimum 4.5:1
- [ ] Focus states visibles (`:focus-visible`)
- [ ] Responsive : 375px, 768px, 1024px, 1440px
- [ ] Header 90px + Category Bar visibles sur toutes les pages
- [ ] Contenu non caché derrière les barres fixes
- [ ] `prefers-reduced-motion` respecté
- [ ] Lazy loading sur toutes les images (`loading="lazy"`)
- [ ] `get_header()` présent dans chaque template PHP
