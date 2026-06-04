/* ============================================================
   BIONOVA — Données Produits
   VERSION: 20260511
   Scope: Global (window.BIONOVA_PRODUCTS)
   ============================================================ */

const THEME_URI = window.THEME_URI || '';

const products = [
  {
    id: 1, slug: "acide-alpha-lipoique", name: "Acide Alpha Lipoïque", description: "L'antioxydant universel par excellence, capable d'agir aussi bien en milieu aqueux que lipidique pour une protection cellulaire totale. Il recycle et régénère d'autres antioxydants majeurs tels que les vitamines C et E, le glutathion et la coenzyme Q10. L'acide alpha-lipoïque joue un rôle clé dans le métabolisme énergétique en soutenant la conversion du glucose en ATP. Reconnu par la recherche scientifique, il contribue également à la protection du système nerveux contre le stress oxydatif. Un allié incontournable pour préserver la jeunesse de vos cellules et optimiser les défenses naturelles de l'organisme.", price: 45.00, image: THEME_URI + "/assets/products/acide-alpha-lipoique.webp",
    rating: 4.8, reviews: 124,
    composition: "Acide Alpha Lipoïque (Forme R & S) : 300mg, Gélule végétale.",
    benefits: ["Régénération des antioxydants (Vit. C, E)", "Soutien du métabolisme du glucose", "Protection neurologique"],
    usage: "1 gélule par jour, de préférence 30 minutes avant un repas.",
    precautions: "Déconseillé en cas de traitement antidiabétique (demander avis médical).",
    contraindications: "Déconseillé aux personnes sous traitement hypoglycémiant sans avis médical préalable.",
    storage: "À conserver au frais et au sec."
  },
  {
    id: 2, slug: "ashwagandha", name: "Ashwagandha", description: "Plante adaptogène majeure de l'Ayurvéda, l'Ashwagandha aide l'organisme à résister au stress physique et mental tout en favorisant l'équilibre émotionnel. Notre formule utilise l'extrait breveté KSM-66, le plus étudié cliniquement, avec une concentration optimale en withanolides bioactifs. Elle contribue à réduire naturellement les niveaux de cortisol, l'hormone du stress, pour un apaisement profond et durable. L'Ashwagandha soutient également la qualité du sommeil, la vitalité globale et les performances cognitives au quotidien. Plébiscitée depuis plus de 3000 ans, cette racine sacrée est aujourd'hui validée par la science moderne pour ses bienfaits adaptogènes exceptionnels.", price: 38.50, image: THEME_URI + "/assets/products/ashwagandha.webp",
    rating: 4.9, reviews: 92,
    composition: "Extrait de racine d'Ashwagandha (KSM-66) : 500mg, Gélule végétale.",
    benefits: ["Réduction du cortisol (stress)", "Amélioration de la qualité du sommeil", "Soutien de la vitalité masculine"],
    usage: "1 gélule le matin et 1 gélule le soir.",
    precautions: "Déconseillé en cas d'hyperthyroïdie ou de grossesse.",
    contraindications: "Contre-indiqué en cas d'hyperthyroïdie, de grossesse et d'allaitement.",
    storage: "À conserver dans un endroit sec."
  },
  {
    id: 3, slug: "astaxanthine", name: "Astaxanthine", description: "L'antioxydant le plus puissant du monde marin, jusqu'à 6000 fois supérieur à la vitamine C en capacité de neutralisation des radicaux libres. Extraite de la micro-algue Haematococcus pluvialis, l'Astaxanthine protège efficacement les cellules contre le vieillissement prématuré et les dommages causés par les rayons UV. Elle traverse la barrière hémato-encéphalique et hémato-rétinienne, offrant une protection unique pour le cerveau et les yeux. Les sportifs l'apprécient également pour sa capacité à réduire l'inflammation post-effort et à accélérer la récupération musculaire. Un bouclier naturel complet pour la peau, la vision et la performance physique.", price: 65.00, image: THEME_URI + "/assets/products/astaxanthine.webp",
    rating: 4.9, reviews: 156,
    composition: "Astaxanthine naturelle (H. pluvialis) : 4mg, Huile de carthame, Vitamine E.",
    benefits: ["Protection oculaire", "Récupération après l'effort", "Santé de la peau (élasticité)"],
    usage: "1 gélule par jour pendant le repas principal.",
    precautions: "Demander avis médical en cas de traitement anticoagulant.",
    contraindications: "Déconseillé aux personnes sous traitement anticoagulant sans avis de leur médecin.",
    storage: "À conserver à l'abri de la lumière."
  },
  {
    id: 4, slug: "biotine", name: "Biotine", description: "Vitamine B8 hautement dosée à 10 000 µg, indispensable pour la beauté et la vitalité des cheveux, des ongles et de la peau. La Biotine agit en cofacteur essentiel de plusieurs enzymes impliquées dans le métabolisme des acides gras, des glucides et des acides aminés. Elle stimule la production de kératine, la protéine structurelle qui donne force et brillance à vos cheveux tout en renforçant les ongles cassants. Son rôle dans le renouvellement cellulaire contribue à maintenir une peau éclatante, lisse et saine au quotidien. Une cure idéale aux changements de saison pour restaurer la beauté de l'intérieur et soutenir un métabolisme énergétique optimal.", price: 29.90, image: THEME_URI + "/assets/products/biotine.webp",
    rating: 4.7, reviews: 210,
    composition: "Biotine (Vitamine B8) : 10mg (20000% AR), Gélule végétale.",
    benefits: ["Croissance des cheveux", "Solidité des ongles", "Métabolisme des macronutriments"],
    usage: "1 gélule par jour avec un verre d'eau.",
    precautions: "Arrêter la prise 3 jours avant une analyse de sang (thyroïde).",
    contraindications: "Aucune contre-indication majeure connue aux doses recommandées.",
    storage: "À conserver au sec."
  },
  {
    id: 5, slug: "collagene-marin-complex", name: "Collagène Marin Complex", description: "Peptides de collagène marin hydrolysé de haute qualité, associés à l'acide hyaluronique et à la vitamine C pour une régénération profonde des tissus. Cette formule synergique apporte 5000 mg de collagène de type I, le plus abondant dans la peau, les tendons et les os. L'acide hyaluronique renforce l'hydratation du derme en captant jusqu'à 1000 fois son poids en eau, tandis que la vitamine C stimule la synthèse naturelle de collagène. Les résultats sont visibles dès 4 à 6 semaines : peau plus ferme, rides atténuées et articulations plus souples. Le complément anti-âge de référence pour une beauté durable et un confort articulaire retrouvé.", price: 32.00, image: THEME_URI + "/assets/products/collagene-marin.webp",
    rating: 4.8, reviews: 342,
    composition: "Collagène Marin Hydrolysé : 5000mg, Acide Hyaluronique : 50mg, Vitamine C : 80mg.",
    benefits: ["Densité de la peau", "Hydratation du derme", "Mobilité articulaire"],
    usage: "1 dose (10g) par jour diluée dans un verre d'eau.",
    precautions: "Allergènes : Poisson. Ne convient pas aux végétariens.",
    contraindications: "Contre-indiqué chez les personnes présentant une allergie avérée au poisson ou aux produits de la mer.",
    storage: "À conserver au frais et au sec après ouverture."
  },
  {
    id: 6, slug: "curcumine-et-boswellia", name: "Curcumine et Boswellia", description: "Synergie anti-inflammatoire naturelle puissante combinant deux trésors de la médecine traditionnelle pour le confort articulaire et digestif. La curcumine, concentrée à 95 % en curcuminoïdes, est reconnue pour ses propriétés antioxydantes et anti-inflammatoires remarquables. Le Boswellia Serrata, ou encens indien, complète cette action en inhibant les enzymes pro-inflammatoires 5-LOX responsables des douleurs articulaires. Ensemble, ces deux actifs offrent une réponse naturelle aux raideurs matinales, aux inconforts de mobilité et aux troubles digestifs légers. Une formule idéale pour les personnes actives souhaitant préserver la souplesse de leurs articulations sans recourir aux anti-inflammatoires classiques.", price: 25.00, image: THEME_URI + "/assets/products/curcumine-boswellia.webp",
    rating: 4.6, reviews: 88,
    composition: "Extrait de Curcuma (95% curcuminoïdes) : 300mg, Boswellia Serrata : 200mg.",
    benefits: ["Flexibilité articulaire", "Réduction des douleurs", "Soutien digestif"],
    usage: "2 gélules par jour au cours des repas.",
    precautions: "Déconseillé en cas d'obstruction des voies biliaires.",
    contraindications: "Contre-indiqué en cas d'obstruction des voies biliaires, d'ulcère gastroduodénal ou de calculs biliaires.",
    storage: "À conserver à température ambiante."
  },
  {
    id: 7, slug: "l-carnosine", name: "L-Carnosine", description: "Di-peptide d'exception composé de bêta-alanine et d'histidine, la L-Carnosine est un pilier de la stratégie anti-âge cellulaire. Elle agit principalement en inhibant la glycation des protéines, un processus délétère par lequel les sucres endommagent les fibres de collagène et d'élastine. Naturellement présente dans les muscles et le cerveau, sa concentration diminue significativement avec l'âge, rendant la supplémentation particulièrement pertinente après 40 ans. La L-Carnosine possède également des propriétés antioxydantes et neuroprotectrices, soutenant la clarté mentale et la réparation tissulaire. Un actif de pointe pour ceux qui recherchent une approche scientifique et ciblée du vieillissement en bonne santé.", price: 28.50, image: THEME_URI + "/assets/products/lcarnosine.webp",
    rating: 4.5, reviews: 41,
    composition: "L-Carnosine pure : 500mg, Gélule végétale.",
    benefits: ["Protection contre la glycation", "Réparation tissulaire", "Longévité cellulaire"],
    usage: "1 gélule 1 à 2 fois par jour entre les repas.",
    precautions: "Usage réservé à l'adulte.",
    contraindications: "Déconseillé aux enfants, aux femmes enceintes ou allaitantes par manque de données de sécurité.",
    storage: "À conserver au sec."
  },
  {
    id: 8, slug: "lion-mane", name: "Lion's Mane", description: "Champignon nootropique d'exception, le Lion's Mane (Hericium erinaceus) est réputé pour stimuler la concentration, la mémoire et la régénération neuronale. Il favorise la synthèse du facteur de croissance nerveuse (NGF), une protéine essentielle à la survie et à la plasticité des neurones. Notre extrait est standardisé à 30 % de polysaccharides bioactifs pour garantir une efficacité maximale à chaque gélule. Utilisé depuis des siècles dans la médecine traditionnelle chinoise, il est aujourd'hui plébiscité par les biohackers et les professionnels recherchant des performances cognitives optimales. Idéal pour les étudiants, les créatifs et toute personne souhaitant protéger son capital neurologique sur le long terme.", price: 55.00, image: THEME_URI + "/assets/products/lion-mane.webp",
    rating: 4.7, reviews: 112, badge: "Premium",
    composition: "Hericium Erinaceus (30% polysaccharides) : 600mg, Gélule végétale.",
    benefits: ["Focus et concentration", "Mémoire à court terme", "Protection du système nerveux"],
    usage: "1 gélule matin et midi avant les repas.",
    precautions: "Déconseillé en cas d'allergie aux champignons.",
    contraindications: "Contre-indiqué en cas d'hypersensibilité ou d'allergie connue aux champignons.",
    storage: "À conserver au frais."
  },
  {
    id: 9, slug: "neem", name: "Neem", description: "Purifiant ancestral de la peau et du sang, le Neem est un pilier de la pharmacopée ayurvédique depuis plus de 4000 ans. Ses feuilles concentrent des principes actifs antibactériens, antifongiques et anti-inflammatoires qui assainissent l'organisme en profondeur. Notre extrait concentré 10:1 offre une puissance optimale pour lutter contre les imperfections cutanées, notamment l'acné, l'eczéma et les irritations chroniques. Le Neem soutient également la fonction hépatique et favorise l'élimination des toxines accumulées pour une détoxification complète. Un trésor de la nature pour retrouver une peau nette, un teint unifié et un système immunitaire renforcé.", price: 42.00, image: THEME_URI + "/assets/products/neem.webp",
    rating: 4.4, reviews: 54,
    composition: "Extrait de feuilles de Neem (10:1) : 400mg, Gélule végétale.",
    benefits: ["Peau saine (acné)", "Détoxification sanguine", "Soutien immunitaire"],
    usage: "1 gélule par jour avec un grand verre d'eau.",
    precautions: "Contre-indiqué pour les femmes enceintes.",
    contraindications: "Strictement contre-indiqué chez la femme enceinte, allaitante ou en cas de projet de grossesse (effet spermicide/anti-implantatoire potentiel).",
    storage: "À conserver à l'abri de l'humidité."
  },
  {
    id: 10, slug: "nmn", name: "NMN", description: "Le précurseur ultime du NAD+, la Nicotinamide Mononucléotide représente une avancée scientifique majeure pour l'énergie cellulaire et la réparation de l'ADN. Le NAD+ est un coenzyme vital présent dans chacune de nos cellules, dont les niveaux chutent de près de 50 % entre 40 et 60 ans. Notre NMN Uthever® est la forme la plus pure et la mieux étudiée, garantissant une biodisponibilité maximale et une conversion rapide en NAD+. En restaurant les niveaux de NAD+, le NMN active les sirtuines, ces enzymes de longévité impliquées dans la réparation de l'ADN et la résistance au stress cellulaire. Le complément de référence de la médecine anti-âge pour retrouver une vitalité cellulaire digne de vos plus jeunes années.", price: 22.50, image: THEME_URI + "/assets/products/nmn.webp",
    rating: 5.0, reviews: 67,
    composition: "Uthever® NMN (Bêta-Nicotinamide Mononucléotide) : 250mg.",
    benefits: ["Boost d'ATP (énergie)", "Réparation de l'ADN", "Optimisation métabolique"],
    usage: "1 gélule le matin à jeun (sublingual possible).",
    precautions: "Destiné à un usage adulte uniquement.",
    contraindications: "Déconseillé aux enfants, aux femmes enceintes ou allaitantes sans avis médical.",
    storage: "À conserver de préférence au réfrigérateur."
  },
  {
    id: 11, slug: "pack-glowy", name: "Pack Glowy", description: "L'alliance parfaite de l'Astaxanthine et du Collagène Marin pour une peau régénérée, un teint éclatant et une protection cellulaire optimale. Ce duo premium combine la puissance antioxydante de l'Astaxanthine avec les peptides restructurants du Collagène Marin hydrolysé pour une action anti-âge complète. L'Astaxanthine protège les cellules cutanées contre les UV et les radicaux libres, tandis que le Collagène restaure la densité, l'élasticité et l'hydratation profonde du derme. Ensemble, ils créent une synergie scientifiquement complémentaire qui agit sur toutes les couches de la peau, de l'intérieur vers l'extérieur. Profitez d'une économie de 10 % par rapport à l'achat séparé, tout en offrant à votre peau le protocole beauté le plus complet de notre gamme.", price: 87.30, oldPrice: 97.00, image: THEME_URI + "/assets/products/astaxanthine.webp", image2: THEME_URI + "/assets/products/collagene-marin.webp",
    rating: 5.0, reviews: 45, type: "pack", badge: "Économisez 10%",
    composition: "1 flacon d'Astaxanthine (30 gélules) + 1 pot de Collagène Marin (300g).",
    benefits: ["Synergie antioxydante peau & derme", "Action anti-âge complète", "Hydratation profonde et fermeté"],
    usage: "Astaxanthine : 1 gélule le midi. Collagène : 10g le matin.",
    precautions: "Allergènes : Poisson.",
    contraindications: "Contre-indiqué en cas d'allergie avérée au poisson ou aux produits de la mer, et déconseillé sous anticoagulants sans avis médical.",
  }
];
