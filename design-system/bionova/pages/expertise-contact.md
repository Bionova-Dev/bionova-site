# 🧬 Page Design — Expertise (AboutPage)

> Overrides `MASTER.md` for the expertise/about page.

---

## Layout

```
Header (90px) + Category Bar
─────────────────────────────────────────
Hero Section (bg-gray-50)
  ├── H1: Notre Expertise Scientifique
  └── Subtitle descriptif
─────────────────────────────────────────
Valeurs / Piliers (3 cols, icônes SVG)
─────────────────────────────────────────
Processus R&D (timeline / steps)
─────────────────────────────────────────
Équipe / Laboratoire (image + texte)
─────────────────────────────────────────
CTA → Contact
─────────────────────────────────────────
Trust Bar + Footer
```

## Spécificités

- **Tons :** Plus sobre, accent sur la crédibilité scientifique
- **Images :** Laboratoire, équipe, processus de fabrication
- **CTA :** `bg-[#be123c]` vers la page Contact

## Fichier Source
`js/pages/AboutPage.js`

---

# 📞 Page Design — Contact (ContactPage)

## Layout

```
Header (90px) + Category Bar
─────────────────────────────────────────
Contact Header (bg-gray-50)
  ├── H1: Contactez-nous
  └── Subtitle
─────────────────────────────────────────
2 Colonnes
  ├── LEFT: Formulaire
  │   ├── Nom (input, rounded-2xl)
  │   ├── Email (input)
  │   ├── Sujet (select)
  │   ├── Message (textarea)
  │   └── Envoyer (bg-[#be123c])
  │
  └── RIGHT: Infos
      ├── Adresse
      ├── Téléphone
      ├── Email
      └── WhatsApp (bg-[#25D366])
─────────────────────────────────────────
Trust Bar + Footer
```

## Spécificités

- **Inputs focus :** `border-bionova-red ring-bionova-red/10`
- **Bouton submit :** `bg-[#be123c] hover:bg-gray-900`
- **WhatsApp :** `bg-[#25D366] hover:bg-[#128C7E]`

## Fichiers Source
`js/pages/ContactPage.js`
