# 📰 Page Design — Astuces / Blog (BlogPage)

> Overrides `MASTER.md` for the blog page.

---

## Layout

```
Header (90px) + Category Bar
─────────────────────────────────────────
Blog Header (pt-36, bg-gray-50)
  ├── H1: "Magazine Santé Bionova" (text-6xl)
  └── Subtitle (text-gray-500)
─────────────────────────────────────────
Articles Grid (3 cols desktop, 1 mobile, gap-8)
  └── Article Card × N
      ├── Image (aspect-video, rounded-3xl, scale-105 on hover)
      ├── Category badge (bg-[#e4002b], absolute top-4 left-4)
      ├── Title (font-bold, hover:text-[#e4002b])
      └── Excerpt (text-gray-500 line-clamp-2)
─────────────────────────────────────────
Trust Bar + Footer
```

## Spécificités

- **Image hover :** `group-hover:scale-105 transition-transform duration-500`
- **Category badge :** `bg-[#e4002b] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest`
- **Title hover :** `group-hover:text-[#e4002b] transition-colors`

## Fichier Source
`js/pages/BlogPage.js`

---

# 📄 Page Design — Article (ArticlePage)

## Layout

```
Header (90px) + Category Bar
─────────────────────────────────────────
Banner Image (h-[400px], rounded-3xl, dark overlay 60%)
  ├── Category badge
  ├── Title (text-4xl text-white)
  └── Meta (date, lecture time)
─────────────────────────────────────────
Article Content (max-w-3xl, prose styling)
─────────────────────────────────────────
← Retour aux articles
─────────────────────────────────────────
Trust Bar + Footer
```

## Fichier Source
`js/pages/ArticlePage.js`
