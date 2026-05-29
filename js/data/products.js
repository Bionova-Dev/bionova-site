/* ============================================================
   BIONOVA — Données Produits
   VERSION: 20260511
   Scope: Global (window.BIONOVA_PRODUCTS)
   ============================================================ */

const THEME_URI = window.THEME_URI || '';

const products = [
  {
    id: 1, slug: "acide-alpha-lipoique", name: "Acide Alpha Lipoïque", description: "L'antioxydant universel par excellence. Agit aussi bien en milieu aqueux que lipidique pour une protection cellulaire totale.", price: 45.00, image: THEME_URI + "/assets/products/acide-alpha-lipoique.webp",
    rating: 4.8, reviews: 124,
    composition: "Acide Alpha Lipoïque (Forme R & S) : 300mg, Gélule végétale.",
    benefits: ["Régénération des antioxydants (Vit. C, E)", "Soutien du métabolisme du glucose", "Protection neurologique"],
    usage: "1 gélule par jour, de préférence 30 minutes avant un repas.",
    precautions: "Déconseillé en cas de traitement antidiabétique (demander avis médical).",
    contraindications: "Déconseillé aux personnes sous traitement hypoglycémiant sans avis médical préalable.",
    storage: "À conserver au frais et au sec."
  },
  {
    id: 2, slug: "ashwagandha", name: "Ashwagandha", description: "Plante adaptogène majeure de l'Ayurvéda. Aide l'organisme à résister au stress et favorise l'équilibre émotionnel.", price: 38.50, image: THEME_URI + "/assets/products/ashwagandha.webp",
    rating: 4.9, reviews: 92,
    composition: "Extrait de racine d'Ashwagandha (KSM-66) : 500mg, Gélule végétale.",
    benefits: ["Réduction du cortisol (stress)", "Amélioration de la qualité du sommeil", "Soutien de la vitalité masculine"],
    usage: "1 gélule le matin et 1 gélule le soir.",
    precautions: "Déconseillé en cas d'hyperthyroïdie ou de grossesse.",
    contraindications: "Contre-indiqué en cas d'hyperthyroïdie, de grossesse et d'allaitement.",
    storage: "À conserver dans un endroit sec."
  },
  {
    id: 3, slug: "astaxanthine", name: "Astaxanthine", description: "L'antioxydant le plus puissant du monde marin. Protège efficacement contre le vieillissement cellulaire et les UV.", price: 65.00, image: THEME_URI + "/assets/products/astaxanthine.webp",
    rating: 4.9, reviews: 156,
    composition: "Astaxanthine naturelle (H. pluvialis) : 4mg, Huile de carthame, Vitamine E.",
    benefits: ["Protection oculaire", "Récupération après l'effort", "Santé de la peau (élasticité)"],
    usage: "1 gélule par jour pendant le repas principal.",
    precautions: "Demander avis médical en cas de traitement anticoagulant.",
    contraindications: "Déconseillé aux personnes sous traitement anticoagulant sans avis de leur médecin.",
    storage: "À conserver à l'abri de la lumière."
  },
  {
    id: 4, slug: "biotine", name: "Biotine", description: "Vitamine B8 hautement dosée. Indispensable pour la beauté des cheveux, des ongles et l'éclat de la peau.", price: 29.90, image: THEME_URI + "/assets/products/biotine.webp",
    rating: 4.7, reviews: 210,
    composition: "Biotine (Vitamine B8) : 10mg (20000% AR), Gélule végétale.",
    benefits: ["Croissance des cheveux", "Solidité des ongles", "Métabolisme des macronutriments"],
    usage: "1 gélule par jour avec un verre d'eau.",
    precautions: "Arrêter la prise 3 jours avant une analyse de sang (thyroïde).",
    contraindications: "Aucune contre-indication majeure connue aux doses recommandées.",
    storage: "À conserver au sec."
  },
  {
    id: 5, slug: "collagene-marin-complex", name: "Collagène Marin Complex", description: "Peptides de collagène brevetés associés à l'acide hyaluronique pour une régénération profonde des tissus.", price: 32.00, image: THEME_URI + "/assets/products/collagene-marin.webp",
    rating: 4.8, reviews: 342,
    composition: "Collagène Marin Hydrolysé : 5000mg, Acide Hyaluronique : 50mg, Vitamine C : 80mg.",
    benefits: ["Densité de la peau", "Hydratation du derme", "Mobilité articulaire"],
    usage: "1 dose (10g) par jour diluée dans un verre d'eau.",
    precautions: "Allergènes : Poisson. Ne convient pas aux végétariens.",
    contraindications: "Contre-indiqué chez les personnes présentant une allergie avérée au poisson ou aux produits de la mer.",
    storage: "À conserver au frais et au sec après ouverture."
  },
  {
    id: 6, slug: "curcumine-et-boswellia", name: "Curcumine et Boswellia", description: "Synergie anti-inflammatoire naturelle puissante pour le confort articulaire et digestif.", price: 25.00, image: THEME_URI + "/assets/products/curcumine-boswellia.webp",
    rating: 4.6, reviews: 88,
    composition: "Extrait de Curcuma (95% curcuminoïdes) : 300mg, Boswellia Serrata : 200mg.",
    benefits: ["Flexibilité articulaire", "Réduction des douleurs", "Soutien digestif"],
    usage: "2 gélules par jour au cours des repas.",
    precautions: "Déconseillé en cas d'obstruction des voies biliaires.",
    contraindications: "Contre-indiqué en cas d'obstruction des voies biliaires, d'ulcère gastroduodénal ou de calculs biliaires.",
    storage: "À conserver à température ambiante."
  },
  {
    id: 7, slug: "l-carnosine", name: "L-Carnosine", description: "Di-peptide d'exception contre la glycation des protéines. Un pilier de la stratégie anti-âge cellulaire.", price: 28.50, image: THEME_URI + "/assets/products/lcarnosine.webp",
    rating: 4.5, reviews: 41,
    composition: "L-Carnosine pure : 500mg, Gélule végétale.",
    benefits: ["Protection contre la glycation", "Réparation tissulaire", "Longévité cellulaire"],
    usage: "1 gélule 1 à 2 fois par jour entre les repas.",
    precautions: "Usage réservé à l'adulte.",
    contraindications: "Déconseillé aux enfants, aux femmes enceintes ou allaitantes par manque de données de sécurité.",
    storage: "À conserver au sec."
  },
  {
    id: 8, slug: "lion-mane", name: "Lion's Mane", description: "Champignon nootropique réputé pour stimuler la concentration, la mémoire et la régénération neuronale.", price: 55.00, image: THEME_URI + "/assets/products/lion-mane.webp",
    rating: 4.7, reviews: 112, badge: "Premium",
    composition: "Hericium Erinaceus (30% polysaccharides) : 600mg, Gélule végétale.",
    benefits: ["Focus et concentration", "Mémoire à court terme", "Protection du système nerveux"],
    usage: "1 gélule matin et midi avant les repas.",
    precautions: "Déconseillé en cas d'allergie aux champignons.",
    contraindications: "Contre-indiqué en cas d'hypersensibilité ou d'allergie connue aux champignons.",
    storage: "À conserver au frais."
  },
  {
    id: 9, slug: "neem", name: "Neem", description: "Purifiant ancestral de la peau et du sang. Utilisé en Ayurvéda pour ses propriétés détoxifiantes.", price: 42.00, image: THEME_URI + "/assets/products/neem.webp",
    rating: 4.4, reviews: 54,
    composition: "Extrait de feuilles de Neem (10:1) : 400mg, Gélule végétale.",
    benefits: ["Peau saine (acné)", "Détoxification sanguine", "Soutien immunitaire"],
    usage: "1 gélule par jour avec un grand verre d'eau.",
    precautions: "Contre-indiqué pour les femmes enceintes.",
    contraindications: "Strictement contre-indiqué chez la femme enceinte, allaitante ou en cas de projet de grossesse (effet spermicide/anti-implantatoire potentiel).",
    storage: "À conserver à l'abri de l'humidité."
  },
  {
    id: 10, slug: "nmn", name: "NMN", description: "Le précurseur ultime du NAD+. Une avancée scientifique majeure pour l'énergie cellulaire et la réparation de l'ADN.", price: 22.50, image: THEME_URI + "/assets/products/nmn.webp",
    rating: 5.0, reviews: 67,
    composition: "Uthever® NMN (Bêta-Nicotinamide Mononucléotide) : 250mg.",
    benefits: ["Boost d'ATP (énergie)", "Réparation de l'ADN", "Optimisation métabolique"],
    usage: "1 gélule le matin à jeun (sublingual possible).",
    precautions: "Destiné à un usage adulte uniquement.",
    contraindications: "Déconseillé aux enfants, aux femmes enceintes ou allaitantes sans avis médical.",
    storage: "À conserver de préférence au réfrigérateur."
  },
  {
    id: 11, slug: "pack-glowy", name: "Pack Glowy", description: "L'alliance parfaite de l'Astaxanthine et du Collagène Marin pour une peau régénérée, un teint éclatant et une protection cellulaire optimale.", price: 87.30, oldPrice: 97.00, image: THEME_URI + "/assets/products/astaxanthine.webp", image2: THEME_URI + "/assets/products/collagene-marin.webp",
    rating: 5.0, reviews: 45, type: "pack", badge: "Économisez 10%",
    composition: "1 flacon d'Astaxanthine (30 gélules) + 1 pot de Collagène Marin (300g).",
    benefits: ["Synergie antioxydante peau & derme", "Action anti-âge complète", "Hydratation profonde et fermeté"],
    usage: "Astaxanthine : 1 gélule le midi. Collagène : 10g le matin.",
    precautions: "Allergènes : Poisson.",
    contraindications: "Contre-indiqué en cas d'allergie avérée au poisson ou aux produits de la mer, et déconseillé sous anticoagulants sans avis médical.",
  }
];
