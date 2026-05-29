/* ============================================================
   BIONOVA — Données Catégories
   VERSION: 20260522
   ============================================================ */

const BIONOVA_CATEGORIES = [
  {
    id: 'all',
    label: 'Tous les produits',
    description: 'Toute notre gamme de micronutrition',
    color: '#1e293b',
    gradient: 'from-slate-600 to-slate-800',
    bg: '#f8fafc',
    icon: 'M4 6h16M4 10h16M4 14h16M4 18h16'
  },
  {
    id: 'longevite',
    label: 'Anti-Âge Absolu',
    description: 'NMN, Astaxanthine & Longévité cellulaire',
    color: '#7c3aed',
    gradient: 'from-violet-500 to-purple-700',
    bg: '#f5f3ff',
    icon: 'M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z',
    match: [10, 3, 7, 11]
  },
  {
    id: 'beaute',
    label: 'Beauté Radieuse',
    description: 'Collagène, Biotine & Éclat naturel',
    color: '#db2777',
    gradient: 'from-pink-400 to-rose-600',
    bg: '#fdf2f8',
    icon: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
    match: [5, 4, 11]
  },
  {
    id: 'cerveau',
    label: 'Sérénité & Esprit',
    description: "Ashwagandha, Lion's Mane & Clarté mentale",
    color: '#0891b2',
    gradient: 'from-cyan-500 to-blue-600',
    bg: '#ecfeff',
    icon: 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m1.636-6.364l.707.707M12 21v-1m-6.364-1.636l.707-.707M15 12a3 3 0 11-6 0 3 3 0 016 0z',
    match: [2, 8]
  },
  {
    id: 'articulations',
    label: 'Mobilité Active',
    description: 'Curcumine, Boswellia & Souplesse articulaire',
    color: '#d97706',
    gradient: 'from-amber-400 to-orange-600',
    bg: '#fffbeb',
    icon: 'M13 10V3L4 14h7v7l9-11h-7z',
    match: [6, 5]
  },
  {
    id: 'detox',
    label: 'Détox & Pureté',
    description: 'Neem, ALA & Purification cellulaire',
    color: '#16a34a',
    gradient: 'from-emerald-400 to-green-600',
    bg: '#f0fdf4',
    icon: 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
    match: [9, 1]
  }
];

