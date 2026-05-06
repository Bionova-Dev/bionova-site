<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bionova | Laboratoire de Parapharmacie & Compléments Alimentaires Naturels</title>

  <!-- SEO Meta Tags -->
  <meta name="description"
    content="Découvrez Bionova, votre laboratoire de parapharmacie expert en micronutrition. Compléments alimentaires naturels de haute qualité : Ashwagandha, NMN, Collagène, et plus. Santé et bien-être livrés en Tunisie.">
  <meta name="keywords"
    content="Bionova, parapharmacie Tunisie, compléments alimentaires, bien-être naturel, vitamines, micronutrition, Ashwagandha, NMN, Collagène marin, santé naturelle, laboratoire parapharmacie">
  <meta name="author" content="Bionova Laboratory">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="https://bionova.tn">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://bionova.tn/">
  <meta property="og:title" content="Bionova | L'Excellence de la Micronutrition Naturelle">
  <meta property="og:description"
    content="Des formules scientifiques et naturelles pour votre vitalité. Livraison rapide sur toute la Tunisie.">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/logo-bionova.png">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://bionova.tn/">
  <meta property="twitter:title" content="Bionova | Compléments Alimentaires Premium">
  <meta property="twitter:description"
    content="Le meilleur de la science et de la nature pour votre santé au quotidien.">
  <meta property="twitter:image" content="<?php echo get_template_directory_uri(); ?>/logo-bionova.png">

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "MedicalOrganization",
      "name": "Bionova",
      "alternateName": "Laboratoire Bionova",
      "url": "https://bionova.tn",
      "logo": "<?php echo get_template_directory_uri(); ?>/logo-bionova.png",
      "description": "Laboratoire de Parapharmacie spécialisé en compléments alimentaires naturels et expertise micronutritionnelle en Tunisie.",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "TN",
        "addressRegion": "Tunis"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+216-71-000-000",
        "contactType": "customer service",
        "areaServed": "TN",
        "availableLanguage": ["French", "Arabic"]
      },
      "sameAs": [
        "https://www.facebook.com/bionova",
        "https://www.instagram.com/bionova"
      ]
    }
  </script>

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ItemList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "url": "https://bionova.tn/#products",
          "name": "Acide Alpha Lipoïque"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "url": "https://bionova.tn/#products",
          "name": "Ashwagandha"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "url": "https://bionova.tn/#products",
          "name": "Astaxanthine"
        },
        {
          "@type": "ListItem",
          "position": 4,
          "url": "https://bionova.tn/#products",
          "name": "NMN"
        }
      ]
    }
  </script>

  <script src="https://cdn.tailwindcss.com" defer></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'medical-blue': '#075985', // Deep blue
            'medical-light': '#f0fdf4', // Very light aqua/green
            'bionova-red': '#be123c',
            'silver': '#f1f5f9',
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            display: ['Montserrat', 'sans-serif'],
          }
        }
      }
    }
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://unpkg.com">
  <link rel="preconnect" href="https://cdn.tailwindcss.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@500;600;700;800;900&display=swap"
    rel="stylesheet">

  <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
  <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #ffffff;
      color: #1e293b;
    }

    html {
      scroll-behavior: smooth;
    }

    .glassmorphism {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.5);
    }

    .card-glass {
      background: rgba(255, 255, 255, 0.8);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .line-clamp-2 {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    /* Elevation & Shadow Effects */
    .product-card-hover {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card-hover:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.1);
    }

    .product-image-float {
      transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card-hover:hover .product-image-float {
      transform: translateY(-12px) scale(1.05);
      filter: drop-shadow(0 15px 15px rgba(0, 0, 0, 0.08));
    }

    /* CTA Button Styles */
    .btn-gradient {
      background: #075985;
      transition: all 0.4s ease;
    }

    .btn-gradient:hover {
      background: #0c4a6e;
      transform: translateY(-2px);
    }

    /* Transition classes */
    .nav-link-hover:hover {
      background-color: #FDF8F6;
    }

    .animate-fade-in {
      animation: fadeIn 0.8s ease-out forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .badge-shiny {
      background: linear-gradient(110deg, #be123c 0%, #fb7185 25%, #be123c 50%, #fb7185 75%, #be123c 100%);
      background-size: 200% 100%;
      animation: shine 3s linear infinite;
    }

    @keyframes shine {
      0% {
        background-position: 200% 0;
      }

      100% {
        background-position: -200% 0;
      }
    }

    .gold-border {
      border: 1px solid rgba(212, 175, 55, 0.3);
      box-shadow: 0 0 15px rgba(212, 175, 55, 0.1);
    }
  </style>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="root"></div>

  <noscript>
    <div style="padding: 20px; text-align: center; font-family: sans-serif;">
      <h1>Bionova | Laboratoire de Parapharmacie</h1>
      <p>Votre partenaire bien-être au quotidien. Découvrez nos compléments alimentaires naturels : Ashwagandha, NMN,
        Collagène, et bien d'autres.</p>
      <p>Veuillez activer JavaScript pour profiter de l'expérience complète de notre boutique en ligne.</p>
    </div>
  </noscript>

  <script type="text/babel">
    const WC_INITIAL_COUNT = <?php echo (class_exists('WooCommerce') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0; ?>;
    const WC_CART_URL = '<?php echo function_exists('wc_get_cart_url') ? esc_url( wc_get_cart_url() ) : home_url("/panier/"); ?>';
    const WC_PRODUCT_MAP = {
      1: 33,  // Acide Alpha Lipoïque
      2: 35,  // Ashwagandha
      3: 37,  // Astaxanthine
      4: 41,  // Biotine
      5: 47,  // Collagène Marin Complex
      6: 50,  // Curcumine et Boswellia
      7: 51,  // L-Carnosine
      8: 52,  // Lion's Mane
      9: 53,  // Neem
      10: 54, // NMN
      11: 113 // Pack Glowy
    };

    const products = [
      {
        id: 1, name: "Acide Alpha Lipoïque", description: "L'antioxydant universel par excellence. Agit aussi bien en milieu aqueux que lipidique pour une protection cellulaire totale.", price: 45.00, image: "<?php echo get_template_directory_uri(); ?>/acide alpha lipoique.png",
        rating: 4.8, reviews: 124,
        composition: "Acide Alpha Lipoïque (Forme R & S) : 300mg, Gélule végétale.",
        benefits: ["Régénération des antioxydants (Vit. C, E)", "Soutien du métabolisme du glucose", "Protection neurologique"],
        usage: "1 gélule par jour, de préférence 30 minutes avant un repas.",
        precautions: "Déconseillé en cas de traitement antidiabétique (demander avis médical).",
        storage: "À conserver au frais et au sec."
      },
      {
        id: 2, name: "Ashwagandha", description: "Plante adaptogène majeure de l'Ayurvéda. Aide l'organisme à résister au stress et favorise l'équilibre émotionnel.", price: 38.50, image: "<?php echo get_template_directory_uri(); ?>/ashwagandha.png",
        rating: 4.9, reviews: 92,
        composition: "Extrait de racine d'Ashwagandha (KSM-66) : 500mg, Gélule végétale.",
        benefits: ["Réduction du cortisol (stress)", "Amélioration de la qualité du sommeil", "Soutien de la vitalité masculine"],
        usage: "1 gélule le matin et 1 gélule le soir.",
        precautions: "Déconseillé en cas d'hyperthyroïdie ou de grossesse.",
        storage: "À conserver dans un endroit sec."
      },
      {
        id: 3, name: "Astaxanthine", description: "L'antioxydant le plus puissant du monde marin. Protège efficacement contre le vieillissement cellulaire et les UV.", price: 65.00, image: "<?php echo get_template_directory_uri(); ?>/astaxanthine.png",
        rating: 4.9, reviews: 156,
        composition: "Astaxanthine naturelle (H. pluvialis) : 4mg, Huile de carthame, Vitamine E.",
        benefits: ["Protection oculaire", "Récupération après l'effort", "Santé de la peau (élasticité)"],
        usage: "1 gélule par jour pendant le repas principal.",
        precautions: "Demander avis médical en cas de traitement anticoagulant.",
        storage: "À conserver à l'abri de la lumière."
      },
      {
        id: 4, name: "Biotine", description: "Vitamine B8 hautement dosée. Indispensable pour la beauté des cheveux, des ongles et l'éclat de la peau.", price: 29.90, image: "<?php echo get_template_directory_uri(); ?>/biotine.png",
        rating: 4.7, reviews: 210,
        composition: "Biotine (Vitamine B8) : 10mg (20000% AR), Gélule végétale.",
        benefits: ["Croissance des cheveux", "Solidité des ongles", "Métabolisme des macronutriments"],
        usage: "1 gélule par jour avec un verre d'eau.",
        precautions: "Arrêter la prise 3 jours avant une analyse de sang (thyroïde).",
        storage: "À conserver au sec."
      },
      {
        id: 5, name: "Collagène Marin Complex", description: "Peptides de collagène brevetés associés à l'acide hyaluronique pour une régénération profonde des tissus.", price: 32.00, image: "<?php echo get_template_directory_uri(); ?>/collagene marin complex.png",
        rating: 4.8, reviews: 342,
        composition: "Collagène Marin Hydrolysé : 5000mg, Acide Hyaluronique : 50mg, Vitamine C : 80mg.",
        benefits: ["Densité de la peau", "Hydratation du derme", "Mobilité articulaire"],
        usage: "1 dose (10g) par jour diluée dans un verre d'eau.",
        precautions: "Allergènes : Poisson. Ne convient pas aux végétariens.",
        storage: "À conserver au frais et au sec après ouverture."
      },
      {
        id: 6, name: "Curcumine et Boswellia", description: "Synergie anti-inflammatoire naturelle puissante pour le confort articulaire et digestif.", price: 25.00, image: "<?php echo get_template_directory_uri(); ?>/curcumine et boswellia.png",
        rating: 4.6, reviews: 88,
        composition: "Extrait de Curcuma (95% curcuminoïdes) : 300mg, Boswellia Serrata : 200mg.",
        benefits: ["Flexibilité articulaire", "Réduction des douleurs", "Soutien digestif"],
        usage: "2 gélules par jour au cours des repas.",
        precautions: "Déconseillé en cas d'obstruction des voies biliaires.",
        storage: "À conserver à température ambiante."
      },
      {
        id: 7, name: "L-Carnosine", description: "Di-peptide d'exception contre la glycation des protéines. Un pilier de la stratégie anti-âge cellulaire.", price: 28.50, image: "<?php echo get_template_directory_uri(); ?>/lcarnosine.png",
        rating: 4.5, reviews: 41,
        composition: "L-Carnosine pure : 500mg, Gélule végétale.",
        benefits: ["Protection contre la glycation", "Réparation tissulaire", "Longévité cellulaire"],
        usage: "1 gélule 1 à 2 fois par jour entre les repas.",
        precautions: "Usage réservé à l'adulte.",
        storage: "À conserver au sec."
      },
      {
        id: 8, name: "Lion's Mane", description: "Champignon nootropique réputé pour stimuler la concentration, la mémoire et la régénération neuronale.", price: 55.00, image: "<?php echo get_template_directory_uri(); ?>/lion mane.png",
        rating: 4.7, reviews: 112, badge: "Premium",
        composition: "Hericium Erinaceus (30% polysaccharides) : 600mg, Gélule végétale.",
        benefits: ["Focus et concentration", "Mémoire à court terme", "Protection du système nerveux"],
        usage: "1 gélule matin et midi avant les repas.",
        precautions: "Déconseillé en cas d'allergie aux champignons.",
        storage: "À conserver au frais."
      },
      {
        id: 9, name: "Neem", description: "Purifiant ancestral de la peau et du sang. Utilisé en Ayurvéda pour ses propriétés détoxifiantes.", price: 42.00, image: "<?php echo get_template_directory_uri(); ?>/neem.png",
        rating: 4.4, reviews: 54,
        composition: "Extrait de feuilles de Neem (10:1) : 400mg, Gélule végétale.",
        benefits: ["Peau saine (acné)", "Détoxification sanguine", "Soutien immunitaire"],
        usage: "1 gélule par jour avec un grand verre d'eau.",
        precautions: "Contre-indiqué pour les femmes enceintes.",
        storage: "À conserver à l'abri de l'humidité."
      },
      {
        id: 10, name: "NMN", description: "Le précurseur ultime du NAD+. Une avancée scientifique majeure pour l'énergie cellulaire et la réparation de l'ADN.", price: 22.50, image: "<?php echo get_template_directory_uri(); ?>/nmn.png",
        rating: 5.0, reviews: 67,
        composition: "Uthever® NMN (Bêta-Nicotinamide Mononucléotide) : 250mg.",
        benefits: ["Boost d'ATP (énergie)", "Réparation de l'ADN", "Optimisation métabolique"],
        usage: "1 gélule le matin à jeun (sublingual possible).",
        precautions: "Destiné à un usage adulte uniquement.",
        storage: "À conserver de préférence au réfrigérateur."
      },
      {
        id: 11, name: "Pack Glowy", description: "L'alliance parfaite de l'Astaxanthine et du Collagène Marin pour une peau régénérée, un teint éclatant et une protection cellulaire optimale.", price: 87.30, oldPrice: 97.00, image: "<?php echo get_template_directory_uri(); ?>/astaxanthine.png", image2: "<?php echo get_template_directory_uri(); ?>/collagene marin complex.png",
        rating: 5.0, reviews: 45, type: "pack", badge: "Économisez 10%",
        composition: "1 flacon d'Astaxanthine (30 gélules) + 1 pot de Collagène Marin (300g).",
        benefits: ["Synergie antioxydante peau & derme", "Action anti-âge complète", "Hydratation profonde et fermeté"],
        usage: "Astaxanthine : 1 gélule le midi. Collagène : 10g le matin.",
        precautions: "Allergènes : Poisson.",
        storage: "À conserver au frais et au sec."
      }
    ];

    const articlesData = [
      {
        id: 1,
        category: "Immunité",
        title: "Comment booster son immunité naturellement avant l'hiver ?",
        image: "<?php echo get_template_directory_uri(); ?>/neem.png",
        excerpt: "Découvrez les réflexes quotidiens et les compléments essentiels pour préparer votre organisme aux agressions extérieures.",
        problem: "À l'approche de la saison froide, notre organisme est mis à rude épreuve : baisse d'énergie, vulnérabilité aux virus. Le système immunitaire s'affaiblit sous l'effet du manque de lumière, de la fatigue accumulée et du refroidissement général. Ce phénomène est naturel, mais il peut considérablement altérer votre qualité de vie et votre tonus quotidien.",
        solution: "La nature offre de puissants boucliers biologiques pour soutenir nos défenses. Outre une alimentation riche en vitamines C et en zinc, ainsi qu'un sommeil réparateur, l'utilisation de plantes médicinales purifiantes permet de renforcer le terrain biologique. L'ayurveda utilise depuis des millénaires des extraits végétaux capables de stimuler la réponse immunitaire et de détoxifier le sang.",
        expert: "Une supplémentation ciblée est souvent la clé pour passer l'hiver sereinement. Je recommande particulièrement les cures de Neem (Margousier), une plante exceptionnelle surnommée 'la pharmacie du village' en Inde. Son action antibactérienne, antivirale et antifongique purifie l'organisme en profondeur. Une cure de trois semaines à l'entrée de l'hiver prépare parfaitement vos défenses.",
        productId: 9
      },
      {
        id: 2,
        category: "Anti-stress",
        title: "Les incroyables bienfaits de l'Ashwagandha sur la charge mentale",
        image: "<?php echo get_template_directory_uri(); ?>/ashwagandha.png",
        excerpt: "Plante phare de l'Ayurveda, l'Ashwagandha est la réponse naturelle pour retrouver un sommeil réparateur et une sérénité durable.",
        problem: "Dans notre société hyperconnectée, le stress chronique et la charge mentale sont devenus le mal du siècle. La surproduction de cortisol (l'hormone du stress) épuise littéralement nos réserves énergétiques, conduisant à des insomnies, de l'anxiété, une baisse de concentration et parfois même au burn-out. Notre système nerveux a urgemment besoin d'être régulé.",
        solution: "Heureusement, la phytothérapie moderne a redécouvert la puissance des plantes 'adaptogènes'. Contrairement aux stimulants chimiques ou aux sédatifs, une plante adaptogène module la réponse de l'organisme face au stress. Elle normalise les fonctions physiologiques et aide le corps à retrouver son homéostasie, qu'il soit confronté à un stress physique ou psychologique.",
        expert: "Pour apaiser l'esprit sans créer de somnolence, l'Ashwagandha (Withania somnifera) est la référence absolue. Les études cliniques démontrent sa capacité fascinante à faire chuter les taux de cortisol sérique de près de 30% après quelques semaines d'utilisation. Je conseille toujours un extrait standardisé en withanolides pour garantir une efficacité maximale sur la réduction de l'anxiété et l'amélioration de la qualité du sommeil profond.",
        productId: 2
      },
      {
        id: 3,
        category: "Anti-âge",
        title: "Longévité cellulaire : Le NMN est-il le nouveau miracle de la science ?",
        image: "<?php echo get_template_directory_uri(); ?>/nmn.png",
        excerpt: "Tout ce qu'il faut savoir sur le précurseur du NAD+ et ses effets scientifiquement prouvés sur le rajeunissement tissulaire.",
        problem: "Le vieillissement cellulaire n'est plus perçu comme une fatalité, mais comme un processus biologique que nous pouvons ralentir. Avec l'âge, notre organisme perd drastiquement sa capacité à produire du NAD+ (Nicotinamide Adénine Dinucléotide), une coenzyme vitale présente dans chacune de nos cellules. Cette chute de NAD+ (jusqu'à 50% entre 20 et 50 ans) entraîne une baisse de l'énergie métabolique, une dégénérescence tissulaire et l'apparition des signes de l'âge.",
        solution: "Pour restaurer nos niveaux de NAD+, la science s'est tournée vers ses précurseurs directs. L'un des plus prometteurs et étudiés actuellement par les généticiens d'Harvard est le NMN (Nicotinamide Mononucléotide). En pénétrant rapidement dans les cellules, le NMN est immédiatement converti en NAD+, réactivant ainsi les mitochondries (les centrales énergétiques de la cellule) et les sirtuines (les protéines de la longévité).",
        expert: "Le NMN représente la plus grande avancée de la décennie en matière de prévention anti-âge. C'est une molécule révolutionnaire qui n'agit pas seulement en surface, mais qui répare l'ADN à la source. Pour une biodisponibilité optimale, privilégiez toujours une poudre sublinguale pure ou des gélules gastro-résistantes prises le matin à jeun. Les premiers effets sur le regain d'énergie physique et mentale se ressentent souvent dès la deuxième semaine.",
        productId: 10
      },
      {
        id: 4,
        category: "Nutricosmétique",
        title: "Collagène marin : le secret d'une peau éclatante à tout âge",
        image: "<?php echo get_template_directory_uri(); ?>/collagene marin complex.png",
        excerpt: "Pourquoi notre production de collagène diminue-t-elle et comment l'intégration du collagène marin peut-elle revitaliser votre peau ?",
        problem: "La peau perd naturellement de sa fermeté et de son éclat avec le temps. Dès l'âge de 25 ans, la production endogène de collagène – la protéine structurale majeure qui donne sa résistance et son élasticité à la peau – diminue d'environ 1% par an. Ce phénomène accélère l'apparition des rides, le relâchement cutané, mais fragilise aussi les ongles, les cheveux et les articulations. Les crèmes superficielles ne suffisent plus.",
        solution: "La nutricosmétique apporte la réponse en agissant 'de l'intérieur'. En ingérant des peptides de collagène marin (issus de poissons sauvages, plus purs et plus assimilables que le collagène bovin), on fournit directement aux fibroblastes de la peau les acides aminés essentiels pour relancer leur propre production de collagène et d'acide hyaluronique. La redensification se fait dans les couches profondes du derme.",
        expert: "Pour des résultats visibles sur la beauté de la peau et le comblement des ridules, la taille moléculaire du collagène est cruciale. Optez pour un Collagène Marin Hydrolysé (peptides de bas poids moléculaire) associé de préférence à de la vitamine C, indispensable à la synthèse collagénique. Une cure quotidienne d'au moins 5 à 10 grammes pendant 3 mois transforme véritablement la texture de la peau en lui redonnant son 'glow' naturel et son rebond.",
        productId: 5
      }
    ];

    // ICONS
    const ShoppingCartIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>);
    const LeafIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>);
    const ShieldIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>);
    const TruckIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 14H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3m-1 4a2 2 0 100-4 2 2 0 000 4zm-8 0a2 2 0 100-4 2 2 0 000 4z" /></svg>);
    const XIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" /></svg>);
    const ChevronDownIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" /></svg>);
    const UserIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>);
    const BeakerIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>);
    const HeartIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>);
    const BioIcon = ({ className = "w-4 h-4" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" /></svg>);
    const StarIcon = ({ className = "w-4 h-4" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>);
    const SearchIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>);
    const SupportIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" /></svg>);
    const WalletIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>);
    const TagIcon = ({ className = "w-6 h-6" }) => (<svg className={className} fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" /></svg>);

    // COMPONENTS
    const Accordion = ({ title, content }) => {
      const [isOpen, setIsOpen] = React.useState(false);
      return (
        <div className="border-b border-gray-100 py-5">
          <button className="flex w-full justify-between items-center text-left focus:outline-none group" onClick={() => setIsOpen(!isOpen)}>
            <span className="font-display font-semibold text-lg text-gray-900 group-hover:text-medical-blue transition-colors">{title}</span>
            <div className={`p-2 rounded-full bg-gray-50 group-hover:bg-blue-50 transition-colors`}>
              <ChevronDownIcon className={`w-5 h-5 text-gray-500 group-hover:text-medical-blue transition-transform duration-300 ${isOpen ? 'rotate-180' : ''}`} />
            </div>
          </button>
          <div className={`mt-2 text-gray-600 leading-relaxed overflow-hidden transition-all duration-300 ${isOpen ? 'max-h-96 opacity-100 mb-4' : 'max-h-0 opacity-0'}`}>
            <p className="pr-12">{content}</p>
          </div>
        </div>
      );
    };

    const TrustBar = () => (
      <div className="bg-white border-b border-gray-100 relative z-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-2 md:grid-cols-4 gap-4 py-8 sm:py-10">
            {[
              { title: "Paiement à la livraison", subtitle: "Simple et sécurisé", icon: WalletIcon },
              { title: "Service client à l'écoute", subtitle: "Support 7j/7", icon: SupportIcon },
              { title: "Livraison gratuite", subtitle: "Dès 150 DT d'achat", icon: TruckIcon },
              { title: "Meilleur prix garanti", subtitle: "Direct laboratoire", icon: TagIcon },
            ].map((item, idx) => (
              <div key={idx} className="flex flex-col sm:flex-row items-center text-center sm:text-left group cursor-pointer transition-transform duration-300 hover:-translate-y-[2px]">
                <div className="mb-4 sm:mb-0 sm:mr-5 p-3 rounded-xl bg-medical-light text-medical-blue group-hover:bg-medical-blue group-hover:text-white transition-colors duration-300">
                  <item.icon className="w-6 h-6" />
                </div>
                <div>
                  <h4 className="font-display font-bold text-sm text-gray-900 leading-tight">{item.title}</h4>
                  <p className="text-[11px] text-gray-400 font-medium uppercase tracking-tight mt-1">{item.subtitle}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    );

    const Navbar = ({ cartItemCount, currentPage, onNavigate }) => {
      const [isSearchOpen, setIsSearchOpen] = React.useState(false);
      const [isMenuOpen, setIsMenuOpen] = React.useState(false);

      const navLinkClass = (page, isMobile = false) => {
        const baseColor = isMobile ? 'text-gray-800' : 'text-gray-900';
        const activeColor = 'text-medical-blue border-medical-blue';
        const baseStyles = isMobile 
          ? 'text-2xl font-black uppercase tracking-widest py-4 border-b-2' 
          : 'text-sm lg:text-[20px] font-black uppercase tracking-[0.15em] py-2 px-1 border-b-4';
        
        return `${baseStyles} transition-all duration-300 cursor-pointer ${currentPage === page ? activeColor : `${baseColor} border-transparent hover:text-medical-blue`}`;
      };

      const handleMobileNavigate = (page) => {
        onNavigate(page);
        setIsMenuOpen(false);
      };

      return (
        <>
          {/* Mobile Menu Overlay - Moved outside header to avoid clipping */}
          <div className={`fixed inset-0 bg-white z-[80] transition-all duration-500 transform ${isMenuOpen ? 'translate-x-0 opacity-100' : 'translate-x-full opacity-0 pointer-events-none'} flex flex-col p-8 lg:hidden`}>
            <div className="flex justify-between items-center mb-16">
              <img src="<?php echo get_template_directory_uri(); ?>/logo-bionova.png" alt="Bionova" className="h-12 object-contain" loading="lazy" decoding="async" width="120" height="48" />
              <button onClick={() => setIsMenuOpen(false)} className="p-2 text-gray-900"><XIcon className="h-10 w-10" /></button>
            </div>
            <div className="flex flex-col space-y-4">
              <button onClick={() => handleMobileNavigate('home')} className={navLinkClass('home', true)}>Accueil</button>
              <button onClick={() => handleMobileNavigate('products')} className={navLinkClass('products', true)}>Boutique</button>
              <button onClick={() => handleMobileNavigate('blog')} className={navLinkClass('blog', true)}>Astuces</button>
              <button onClick={() => handleMobileNavigate('about')} className={navLinkClass('about', true)}>Expertise</button>
              <button onClick={() => handleMobileNavigate('contact')} className={navLinkClass('contact', true)}>Contact</button>
            </div>
            <div className="mt-auto border-t border-gray-100 pt-8 flex justify-center space-x-8">
              <button onClick={() => handleMobileNavigate('login')} className="flex items-center text-gray-900 font-bold uppercase tracking-widest text-sm">
                <UserIcon className="h-6 w-6 mr-2" /> Mon Compte
              </button>
            </div>
          </div>

          <header className="fixed w-full z-50 h-[50px] lg:h-[90px] bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 flex items-center">
            {/* Search Overlay */}
            <div className={`absolute inset-0 bg-white z-[60] flex items-center px-6 lg:px-12 transition-all duration-500 transform ${isSearchOpen ? 'translate-y-0 opacity-100' : '-translate-y-full opacity-0 pointer-events-none'}`}>
              <div className="max-w-7xl mx-auto w-full flex items-center">
                <SearchIcon className="h-8 w-8 text-gray-400 mr-6" />
                <input
                  type="text"
                  placeholder="Chercher un produit Bionova..."
                  className="flex-1 bg-transparent border-none outline-none text-xl lg:text-2xl font-medium text-gray-900 placeholder-gray-300"
                  autoFocus={isSearchOpen}
                  aria-label="Barre de recherche"
                />
                <button onClick={() => setIsSearchOpen(false)} className="p-4 text-gray-400 hover:text-gray-900 transition-colors" aria-label="Fermer la recherche">
                  <XIcon className="h-10 w-10" />
                </button>
              </div>
            </div>

            <nav className="max-w-[1800px] mx-auto px-4 lg:px-12 w-full h-full" aria-label="Navigation principale">
              <div className="flex justify-between items-center h-full gap-4 lg:gap-8">
                {/* Logo - x1 on mobile, x2-ish on desktop via Tailwind scale */}
                <div onClick={() => onNavigate('home')} className="flex items-center cursor-pointer px-2 group shrink-0">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/logo-bionova.png"
                    alt="Logo Bionova"
                    className="transition-all duration-500 object-contain h-[35px] lg:h-[80px] transform lg:scale-[1.5] origin-left group-hover:scale-[1.1] lg:group-hover:scale-[1.6]"
                    loading="eager"
                    decoding="async"
                    width="320"
                    height="160"
                  />
                </div>

                {/* Menu Desktop - Centré */}
                <div className="hidden lg:flex flex-grow justify-center items-center space-x-6 xl:space-x-10">
                  <button onClick={() => onNavigate('home')} className={navLinkClass('home')}>Accueil</button>
                  <button onClick={() => onNavigate('products')} className={navLinkClass('products')}>Boutique</button>
                  <button onClick={() => onNavigate('blog')} className={navLinkClass('blog')}>Astuces</button>
                  <button onClick={() => onNavigate('about')} className={navLinkClass('about')}>Expertise</button>
                  <button onClick={() => onNavigate('contact')} className={navLinkClass('contact')}>Contact</button>
                </div>

                {/* Icons Toolbar - Alignés à droite */}
                <div className="flex items-center space-x-2 sm:space-x-6 shrink-0">
                  <button onClick={() => setIsSearchOpen(true)} className="p-2 sm:p-3 rounded-2xl text-gray-900 hover:text-medical-blue hover:bg-medical-light transition-all group" title="Rechercher">
                    <SearchIcon className="h-6 w-6 lg:h-7 lg:w-7 group-hover:scale-110 transition-transform" />
                  </button>
                  <button onClick={() => onNavigate('login')} className="hidden sm:block p-3 rounded-2xl text-gray-900 hover:text-medical-blue hover:bg-medical-light transition-all group" title="Mon compte">
                    <UserIcon className="h-7 w-7 group-hover:scale-110 transition-transform" />
                  </button>
                  <a href={WC_CART_URL} className="relative p-3 sm:p-4 rounded-2xl bg-gray-900 text-white hover:bg-medical-blue transition-all group shadow-lg hover:shadow-xl" title="Voir le panier">
                    <ShoppingCartIcon className="h-6 w-6 lg:h-7 lg:w-7 group-hover:scale-110 transition-transform" />
                    {cartItemCount > 0 && (
                      <span className="absolute -top-2 -right-2 bg-red-600 text-white text-[10px] lg:text-[11px] font-black w-5 h-5 lg:w-6 lg:h-6 rounded-full flex items-center justify-center shadow-lg animate-bounce">
                        {cartItemCount}
                      </span>
                    )}
                  </a>
                  {/* Mobile Hamburger Menu Toggle */}
                  <button 
                    onClick={() => setIsMenuOpen(true)} 
                    className="mobile-menu-toggle flex items-center justify-center p-2 text-gray-900 hover:bg-gray-100 rounded-xl transition-colors min-w-[48px] min-h-[48px]" 
                    aria-label="Ouvrir le menu"
                  >
                    <svg className="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                  </button>
                </div>
              </div>
            </nav>
          </header>
        </>
      );
    };


    const Footer = () => (
      <footer className="bg-white pt-24 pb-12 mt-auto border-t border-gray-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-12 mb-20">
            {/* Colonne 1: Logo & Info */}
            <div className="flex flex-col items-center md:items-start">
              <img src="<?php echo get_template_directory_uri(); ?>/logo-bionova.png" alt="Bionova Logo" className="h-20 object-contain mb-8" loading="lazy" decoding="async" width="200" height="80" />
              <p className="text-gray-500 text-sm leading-relaxed text-center md:text-left font-medium">
                Votre partenaire bien-être au quotidien. Des formules scientifiques et naturelles conçues par des experts pour votre vitalité.
              </p>
            </div>

            {/* Colonne 2: Liens Rapides */}
            <div className="text-center md:text-left">
              <h4 className="font-display text-xl font-bold text-medical-blue uppercase tracking-widest mb-8">Boutique</h4>
              <ul className="space-y-4">
                <li><a href="#products" className="text-gray-600 hover:text-medical-blue transition-colors font-bold text-sm">Tous les produits</a></li>
                <li><a href="#products" className="text-gray-600 hover:text-medical-blue transition-colors font-bold text-sm">Packs Synergie</a></li>
                <li><a href="#products" className="text-gray-600 hover:text-medical-blue transition-colors font-bold text-sm">Nouveautés</a></li>
                <li><a href="#products" className="text-gray-600 hover:text-medical-blue transition-colors font-bold text-sm">Meilleures Ventes</a></li>
              </ul>
            </div>

            {/* Colonne 3: Contact & Support */}
            <div className="text-center md:text-left">
              <h4 className="font-display text-xl font-bold text-medical-blue uppercase tracking-widest mb-8">Assistance</h4>
              <ul className="space-y-4">
                <li className="flex items-center justify-center md:justify-start text-gray-600 font-bold text-sm"><svg className="w-5 h-5 mr-3 text-medical-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg> contact@bionova.tn</li>
                <li className="flex items-center justify-center md:justify-start text-gray-600 font-bold text-sm"><svg className="w-5 h-5 mr-3 text-medical-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg> +216 71 000 000</li>
              </ul>
            </div>

            {/* Colonne 4: Réseaux Sociaux & Légal */}
            <div className="text-center md:text-right">
              <h4 className="font-display text-xl font-bold text-medical-blue uppercase tracking-widest mb-8">Rejoignez-nous</h4>
              <div className="flex justify-center md:justify-end space-x-4 mb-8">
                <a href="https://www.facebook.com/bionova" target="_blank" rel="noopener noreferrer" className="w-12 h-12 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-medical-blue hover:text-white transition-all shadow-sm group">
                  <svg className="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.31.975.975 1.247 2.242 1.31 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.31 3.608-.975.975-2.242 1.247-3.608 1.31-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.31-.975-.975-1.247-2.242-1.31-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.334-2.633 1.31-3.608.975-.975 2.242-1.247 3.608-1.31 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.337 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.337-.2 6.78-2.618 6.98-6.98.058-1.281.072-1.689.072-4.948s-.014-3.667-.072-4.947c-.2-4.337-2.618-6.78-6.98-6.98-1.28-.058-1.688-.072-4.947-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" /></svg>
                </a>
                <a href="https://www.instagram.com/bionova" target="_blank" rel="noopener noreferrer" className="w-12 h-12 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-medical-blue hover:text-white transition-all shadow-sm group">
                  <svg className="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.324v-21.35c0-.732-.593-1.325-1.325-1.325z" /></svg>
                </a>
              </div>
              <div className="flex flex-col space-y-2 items-center md:items-end">
                <a href="javascript:void(0)" className="text-[10px] font-black text-gray-400 hover:text-medical-blue transition-colors uppercase tracking-widest">Mentions Légales & CGV</a>
                <a href="javascript:void(0)" className="text-[10px] font-black text-gray-400 hover:text-medical-blue transition-colors uppercase tracking-widest">Politique de confidentialité</a>
              </div>
            </div>
          </div>

          <div className="border-t border-gray-100 pt-10 text-center">
            <p className="text-gray-400 text-[11px] font-bold uppercase tracking-widest leading-relaxed">
              &copy; 2026 Bionova - Par un professionnel de santé. Tous droits réservés.
            </p>
          </div>
        </div>
      </footer>
    );

    // --- PAGES ---

    const InteractiveProductViewer = ({ src, alt, className, noShadow }) => {
      const cardRef = React.useRef(null);
      const [rotation, setRotation] = React.useState({ x: 0, y: 0 });
      const [isHovered, setIsHovered] = React.useState(false);

      const handleMouseMove = (e) => {
        if (!cardRef.current) return;
        const card = cardRef.current;
        const box = card.getBoundingClientRect();
        const x = e.clientX - box.left;
        const y = e.clientY - box.top;
        const centerX = box.width / 2;
        const centerY = box.height / 2;
        const rotateX = ((y - centerY) / centerY) * -15; // Max 15 deg
        const rotateY = ((x - centerX) / centerX) * 15; // Max 15 deg
        setRotation({ x: rotateX, y: rotateY });
        setIsHovered(true);
      };

      const handleMouseLeave = () => {
        setRotation({ x: 0, y: 0 });
        setIsHovered(false);
      };

      return (
        <div
          className={`relative perspective-1000 ${className}`}
          onMouseMove={handleMouseMove}
          onMouseLeave={handleMouseLeave}
        >
          <img
            ref={cardRef}
            src={src}
            alt={alt}
            className={`w-full h-full object-contain transition-all duration-300 ease-out ${noShadow ? '' : 'drop-shadow-2xl'}`}
            style={{
              transform: `rotateX(${rotation.x}deg) rotateY(${rotation.y}deg) ${noShadow ? (isHovered ? 'scale(1.03)' : 'scale(1)') : 'scale3d(1.05, 1.05, 1.05)'}`,
              transformStyle: 'preserve-3d'
            }}
            loading="lazy"
            decoding="async"
            width="400"
            height="400"
          />
          {!noShadow && (
            <div className="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-3/4 h-8 bg-black/20 rounded-[100%] blur-xl pointer-events-none"></div>
          )}
        </div>
      );
    };

    const HomePage = ({ onNavigate, products, onProductClick, onAddToCart }) => {
      const bestSellers = products ? products.filter(p => [1, 10, 8].includes(p.id)) : [];
      const features = [
        { name: 'Pureté Clinique', description: 'Formules certifiées sans excipients controversés. Priorité absolue à la santé.', icon: BeakerIcon },
        { name: 'Haute Biodisponibilité', description: 'Des actifs sous leur forme la plus assimilable pour des résultats concrets.', icon: HeartIcon },
        { name: 'Livraison Express', description: 'Expédition sous 24h et livraison gratuite dès 150 DT en Tunisie.', icon: TruckIcon },
      ];
      return (
        <div className="animate-fade-in">
          {/* Hero Carousel Section */}
          {(() => {
            const slides = [
              {
                image: "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=1920&q=90",
                badge: "Vitalité & Énergie",
                title1: "Réveillez votre",
                title2: "énergie naturelle",
                titleColor: "text-amber-300",
                subtitle: "Nos formules scientifiquement validées boostent votre vitalité au quotidien. Retrouvez l'énergie, la performance et le bien-être que vous méritez.",
                cta1: { label: "Découvrir la gamme", page: "products" },
                cta2: { label: "Notre Expertise", page: "about" },
              },
              {
                image: "https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?auto=format&fit=crop&w=1920&q=90",
                badge: "Beauté & Peau Éclatante",
                title1: "Rayonnez",
                title2: "de l'intérieur",
                titleColor: "text-pink-300",
                subtitle: "Collagène marin, Astaxanthine, Biotine… Nos actifs nutri-cosmétiques agissent en profondeur pour une peau lumineuse, ferme et durablement hydratée.",
                cta1: { label: "Découvrir la beauté", page: "products" },
                cta2: { label: "Nos Conseils", page: "blog" },
              },
              {
                image: "https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=1920&q=90",
                badge: "Bien-être & Équilibre",
                title1: "Retrouvez votre",
                title2: "sérénité profonde",
                titleColor: "text-emerald-300",
                subtitle: "Du stress au sommeil, de l'anxiété à la clarté mentale — l'Ashwagandha et nos adaptogènes vous accompagnent vers un équilibre corps-esprit durable.",
                cta1: { label: "Commencer ma cure", page: "products" },
                cta2: { label: "Lire nos articles", page: "blog" },
              },
              {
                image: "<?php echo get_template_directory_uri(); ?>/hero-factory-production.png",
                badge: "Science & Pureté Clinique",
                title1: "La précision",
                title2: "du laboratoire",
                titleColor: "text-blue-200",
                subtitle: "Chaque capsule Bionova est le fruit d'une formulation rigoureuse. Actifs certifiés, doses cliniquement actives, sans excipients controversés.",
                cta1: { label: "Notre Processus", page: "about" },
                cta2: { label: "Voir la gamme", page: "products" },
              },
            ];
            const HeroCarousel = () => {
              const [current, setCurrent] = React.useState(0);
              const [fade, setFade] = React.useState(true);
              const total = slides.length;

              const goTo = (idx) => {
                setFade(false);
                setTimeout(() => {
                  setCurrent(idx);
                  setFade(true);
                }, 400);
              };

              React.useEffect(() => {
                const timer = setInterval(() => {
                  setFade(false);
                  setTimeout(() => {
                    setCurrent(prev => (prev + 1) % total);
                    setFade(true);
                  }, 400);
                }, 6000);
                return () => clearInterval(timer);
              }, []);

              const slide = slides[current];

              return (
                <section className="relative pt-16 pb-40 lg:pt-24 lg:pb-56 overflow-hidden flex items-center justify-center min-h-[90vh]">
                  {/* Background images stacked, controlled by opacity */}
                  {slides.map((s, i) => (
                    <img
                      key={i}
                      src={s.image}
                      alt=""
                      className="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out"
                      style={{ opacity: i === current ? (fade ? 1 : 0) : 0 }}
                      loading={i === 0 ? "eager" : "lazy"}
                      fetchpriority={i === 0 ? "high" : "auto"}
                      decoding={i === 0 ? "sync" : "async"}
                      aria-hidden="true"
                    />
                  ))}

                  {/* Dark overlay */}
                  <div className="absolute inset-0 bg-gray-900/45 backdrop-blur-[2px]"></div>

                  {/* Content */}
                  <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
                    <div
                      className="text-center md:text-left md:w-[65%] transition-opacity duration-700 ease-in-out"
                      style={{ opacity: fade ? 1 : 0 }}
                    >
                      <div className="inline-block px-4 py-2 bg-white/20 backdrop-blur-md text-white font-bold tracking-widest uppercase text-xs rounded-full mb-8 border border-white/30 shadow-lg">
                        {slide.badge}
                      </div>
                      <h1 className="font-display text-3xl sm:text-5xl lg:text-7xl tracking-tight font-extrabold text-white leading-tight">
                        <span className="block mb-2">{slide.title1}</span>
                        <span className={`block ${slide.titleColor}`}>{slide.title2}</span>
                      </h1>
                      <p className="mt-8 text-lg text-gray-200 sm:text-xl max-w-2xl leading-relaxed">
                        {slide.subtitle}
                      </p>
                      <div className="mt-12 sm:flex sm:justify-center md:justify-start gap-4">
                        <button
                          onClick={() => onNavigate(slide.cta1.page)}
                          className="w-full sm:w-auto flex items-center justify-center px-10 py-4 text-lg font-bold rounded-2xl text-white bg-medical-blue hover:bg-blue-600 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-1"
                          title={slide.cta1.label}
                        >
                          {slide.cta1.label}
                        </button>
                        <button
                          onClick={() => onNavigate(slide.cta2.page)}
                          className="mt-4 sm:mt-0 w-full sm:w-auto flex items-center justify-center px-10 py-4 border border-white/30 backdrop-blur-sm text-lg font-bold rounded-2xl text-white bg-white/10 hover:bg-white/20 transition-all shadow-sm"
                          title={slide.cta2.label}
                        >
                          {slide.cta2.label}
                        </button>
                      </div>
                    </div>
                  </div>

                  {/* Dot indicators */}
                  <div className="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 flex items-center gap-3">
                    {slides.map((_, i) => (
                      <button
                        key={i}
                        onClick={() => goTo(i)}
                        aria-label={`Slide ${i + 1}`}
                        className={`rounded-full transition-all duration-300 ${
                          i === current
                            ? "w-8 h-3 bg-white shadow-lg"
                            : "w-3 h-3 bg-white/50 hover:bg-white/80"
                        }`}
                      />
                    ))}
                  </div>
                </section>
              );
            };
            return <HeroCarousel />;
          })()}


          {/* Best Sellers Section */}
          <section className="py-32 bg-white relative border-t border-gray-100">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div className="text-center mb-20">
                <h2 className="text-sm text-medical-blue font-bold tracking-widest uppercase mb-3">Sélection Premium</h2>
                <p className="font-display text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">Nos Meilleures Ventes</p>
                <p className="mt-6 text-xl text-gray-500">Les formules les plus plébiscitées pour des résultats optimaux en Tunisie.</p>
              </div>

              <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                {bestSellers.map(product => (
                  <article key={product.id} onClick={() => onProductClick(product)} className="bg-gray-50 rounded-[3rem] p-10 flex flex-col items-center text-center group border border-gray-100 hover:shadow-2xl hover:border-medical-blue/20 transition-all duration-500 relative cursor-pointer">
                    <div className="absolute top-6 right-6 bg-gray-900 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg tracking-wider uppercase z-20" style={{backgroundColor:'#111827',color:'#ffffff'}}>Best Seller</div>
                    <InteractiveProductViewer src={product.image} alt={`Produit Bionova : ${product.name}`} className="w-56 h-56 mb-10" noShadow={true} />
                    <h3 className="font-display text-2xl font-black text-gray-900 mb-2 group-hover:text-medical-blue transition-colors">{product.name}</h3>

                    {/* Avis Clients */}
                    <div className="flex items-center space-x-1 mb-4">
                      {[...Array(5)].map((_, i) => (
                        <StarIcon key={i} className={`w-3.5 h-3.5 ${i < Math.floor(product.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`} />
                      ))}
                      <span className="text-[10px] font-bold text-gray-400 ml-2">{product.rating}/5 - {product.reviews} avis clients</span>
                    </div>

                    <p className="text-gray-500 mb-8 line-clamp-2">{product.description}</p>
                    <div className="mt-auto w-full flex items-center justify-between">
                      <p className="text-3xl font-black text-medical-blue">{product.price.toFixed(2)} DT</p>
                      <div className="flex space-x-2">
                        <button
                          onClick={(e) => { e.stopPropagation(); onProductClick(product); }}
                          className="flex items-center justify-center p-4 border border-gray-200 text-gray-500 hover:text-medical-blue hover:border-medical-blue rounded-xl transition-all"
                          title={`Voir les détails de ${product.name}`}
                        >
                          <ChevronDownIcon className="w-5 h-5 -rotate-90" />
                        </button>
                        <a
                          href="javascript:void(0)"
                          onClick={(e) => { 
                            e.preventDefault(); 
                            e.stopPropagation(); 
                            onAddToCart(product);
                          }}
                          style={{ position: 'relative', zIndex: 9999, cursor: 'pointer' }}
                          className="flex items-center justify-center bg-gray-900 text-white w-12 h-12 rounded-xl shadow-lg hover:bg-medical-blue transition-all"
                          title={`Ajouter ${product.name} au panier`}
                          aria-label={`Ajouter ${product.name} au panier`}
                        >
                          <ShoppingCartIcon className="w-5 h-5" />
                        </a>
                      </div>
                    </div>
                  </article>
                ))}
              </div>
            </div>
          </section>

          {/* Exclusive Packs Section */}
          <div className="py-32 bg-medical-light/30 relative">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div className="flex flex-col md:flex-row justify-between items-end mb-16">
                <div className="md:w-2/3">
                  <h2 className="text-sm text-medical-blue font-bold tracking-widest uppercase mb-3">Offres Limitées</h2>
                  <p className="font-display text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">Nos Packs Exclusifs</p>
                  <p className="mt-6 text-xl text-gray-500">Optimisez vos résultats avec nos synergies d'actifs soigneusement sélectionnées par nos experts.</p>
                </div>
                <button onClick={() => onNavigate('products')} className="mt-8 md:mt-0 font-bold text-medical-blue hover:text-blue-700 transition-colors flex items-center group">
                  Voir tous les packs <span className="ml-2 transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                </button>
              </div>

              <div className="grid grid-cols-1 lg:grid-cols-1 gap-12">
                {/* Pack Glowy */}
                {products.filter(p => p.type === 'pack').map(pack => (
                  <div key={pack.id} onClick={() => onProductClick(pack)} className="bg-white rounded-[4rem] overflow-hidden flex flex-col lg:flex-row items-center gold-border hover:shadow-2xl transition-all duration-500 relative group cursor-pointer">
                    {/* Visual Part */}
                    <div className="lg:w-1/2 p-12 lg:p-20 relative flex justify-center items-center bg-gray-50/50 w-full">
                      <div className="absolute top-10 left-10 badge-shiny text-white text-[12px] font-black px-6 py-3 rounded-full shadow-xl tracking-widest uppercase z-20">
                        {pack.badge}
                      </div>

                      <div className="relative w-full max-w-md aspect-square flex justify-center items-center">
                        <div className="relative w-64 h-64 sm:w-80 sm:h-80">
                          <img src={pack.image} alt={pack.name} className="absolute top-0 left-0 w-3/4 h-3/4 object-contain drop-shadow-2xl z-10 transform -rotate-6 group-hover:-rotate-12 transition-transform duration-500" loading="lazy" decoding="async" />
                          <img src={pack.image2} alt={pack.name} className="absolute bottom-0 right-0 w-3/4 h-3/4 object-contain drop-shadow-2xl z-0 transform rotate-6 translate-x-4 translate-y-4 group-hover:rotate-12 group-hover:translate-x-8 transition-transform duration-500" loading="lazy" decoding="async" />
                        </div>
                      </div>
                    </div>

                    {/* Content Part */}
                    <div className="lg:w-1/2 p-12 lg:p-20 flex flex-col justify-center">
                      <div className="inline-block px-4 py-1.5 bg-blue-50 text-medical-blue rounded-full text-[10px] font-bold tracking-widest uppercase mb-6 self-start">Nutricosmétique Premium</div>
                      <h3 className="font-display text-4xl lg:text-5xl font-black text-gray-900 mb-2 group-hover:text-medical-blue transition-colors">{pack.name}</h3>

                      {/* Avis Clients */}
                      <div className="flex items-center space-x-1 mb-6">
                        {[...Array(5)].map((_, i) => (
                          <StarIcon key={i} className={`w-4 h-4 ${i < Math.floor(pack.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`} />
                        ))}
                        <span className="text-xs font-bold text-gray-400 ml-2">{pack.rating}/5 - {pack.reviews} avis</span>
                      </div>

                      <p className="text-xl text-gray-500 mb-10 leading-relaxed line-clamp-3">{pack.description}</p>

                      <div className="flex items-end space-x-6 mb-12">
                        <div>
                          <p className="text-sm text-gray-400 font-bold uppercase tracking-widest mb-1">Prix normal</p>
                          <p className="text-2xl text-gray-300 line-through font-bold">{pack.oldPrice.toFixed(2)} DT</p>
                        </div>
                        <div>
                          <p className="text-sm text-medical-blue font-bold uppercase tracking-widest mb-1">Prix Pack</p>
                          <p className="text-5xl font-black text-medical-blue">{pack.price.toFixed(2)} <span className="text-xl">DT</span></p>
                        </div>
                      </div>

                      <a 
                        href="javascript:void(0)"
                        onClick={(e) => { 
                          e.preventDefault(); 
                          e.stopPropagation(); 
                          onAddToCart(pack);
                        }} 
                        style={{ position: 'relative', zIndex: 9999, cursor: 'pointer' }}
                        className="w-full py-6 px-10 btn-gradient text-white text-xl font-bold rounded-2xl shadow-xl hover:shadow-2xl transition-all transform hover:-translate-y-1 text-center"
                      >
                        Ajouter le pack au panier
                      </a>
                    </div>
                  </div>
                ))}
              </div>
            </div>
          </div>

          {/* Advantages */}
          <div className="py-32 bg-gray-50 border-t border-gray-100">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div className="lg:text-center mb-24">
                <h2 className="text-sm text-medical-blue font-bold tracking-widest uppercase mb-3">Notre Promesse</h2>
                <p className="font-display text-4xl leading-tight font-extrabold text-gray-900 sm:text-5xl">L'excellence au service de votre santé</p>
              </div>
              <div className="space-y-12 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-12 md:gap-y-16">
                {features.map((feature) => (
                  <div key={feature.name} className="relative bg-white p-10 rounded-[2.5rem] shadow-sm border border-silver/40 hover:shadow-xl transition-all group">
                    <div className="absolute flex items-center justify-center h-20 w-20 rounded-2xl bg-gradient-to-br from-medical-blue to-blue-400 text-white -top-10 left-10 shadow-lg transform group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                      <feature.icon className="h-10 w-10 text-white stroke-white" aria-hidden="true" />
                    </div>
                    <p className="mt-8 font-display text-2xl font-bold text-gray-900 mb-4">{feature.name}</p>
                    <p className="text-lg text-gray-500 leading-relaxed">{feature.description}</p>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      );
    };

    const ProductCard = ({ product, onAddToCart, onClick }) => {
      return (
        <div className="bg-white rounded-[2.5rem] overflow-hidden border border-silver/50 product-card-hover flex flex-col h-full cursor-pointer group" onClick={() => onClick(product)}>
          <div className="relative pt-[100%] bg-medical-light/30 border-b border-silver/30 overflow-hidden">
            <img src={product.image} alt={product.name} className="absolute inset-0 w-full h-full object-contain p-10 product-image-float" loading="lazy" decoding="async" width="300" height="300" />

            {product.badge && (
              <div className="absolute top-6 left-6 bg-gray-900 text-white text-[10px] font-black px-4 py-2 rounded-xl shadow-md tracking-widest uppercase z-20" style={{backgroundColor:'#111827',color:'#ffffff'}}>
                {product.badge}
              </div>
            )}
          </div>
          <div className="p-10 flex flex-col flex-grow bg-white">
            <h3 className="font-display text-2xl font-black text-gray-900 mb-2 leading-tight group-hover:text-medical-blue transition-colors">{product.name}</h3>

            {/* Avis Clients */}
            <div className="flex items-center space-x-1 mb-4">
              {[...Array(5)].map((_, i) => (
                <StarIcon key={i} className={`w-3.5 h-3.5 ${i < Math.floor(product.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`} />
              ))}
              <span className="text-[10px] font-bold text-gray-400 ml-2">{product.rating}/5</span>
            </div>

            <p className="text-gray-500 text-sm mb-8 leading-relaxed line-clamp-2">{product.description}</p>


            <div className="flex items-center justify-between mt-auto">
              <span className="text-2xl font-black text-medical-blue">{product.price.toFixed(2)} <span className="text-[10px] font-black ml-1 text-gray-400">DT</span></span>

              <a
                href="javascript:void(0)"
                onClick={(e) => { 
                  e.preventDefault(); 
                  e.stopPropagation(); 
                  onAddToCart(product);
                }}
                style={{ position: 'relative', zIndex: 9999, cursor: 'pointer' }}
                className="flex items-center justify-center btn-gradient text-white w-14 h-14 rounded-[1.2rem] shadow-lg"
                aria-label="Ajouter au panier"
              >
                <ShoppingCartIcon className="w-6 h-6" />
              </a>

            </div>
          </div>
        </div>
      );
    };

    const ProductsPage = ({ products, onAddToCart, onProductClick }) => {
      return (
        <div id="products" className="pt-16 pb-32 bg-white min-h-screen">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="text-center mb-24">
              <h2 className="text-sm text-medical-blue font-bold tracking-widest uppercase mb-3">Notre Gamme</h2>
              <p className="font-display text-5xl leading-tight font-extrabold text-gray-900">
                L'expertise micronutrition
              </p>
              <p className="mt-6 max-w-2xl text-xl text-gray-500 mx-auto leading-relaxed">
                Découvrez nos compléments alimentaires naturels et laissez-vous guider par la science.
              </p>
            </div>
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 lg:gap-10">
              {products.map(product => (
                <ProductCard key={product.id} product={product} onAddToCart={onAddToCart} onClick={onProductClick} />
              ))}
            </div>
          </div>
        </div>
      );
    };

    const ProductDetailPage = ({ product, onAddToCart, onBack }) => {
      return (
        <div className="min-h-screen bg-white pt-16 pb-32">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <button onClick={onBack} className="group flex items-center text-gray-500 hover:text-medical-blue font-semibold tracking-wide uppercase text-sm transition-colors mb-16">
              <span className="transform transition-transform group-hover:-translate-x-2 mr-3 text-lg">&larr;</span> Retour à la boutique
            </button>
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

              <div className="relative w-full aspect-square rounded-[3rem] bg-gray-50 border border-gray-100 shadow-sm flex items-center justify-center overflow-hidden group">
                <img src={product.image} alt={product.name} className="w-full h-full p-12 object-contain" loading="lazy" decoding="async" width="600" height="600" />
                {product.badge && (
                  <div className="absolute top-8 right-8 bg-medical-blue text-white text-sm font-bold px-5 py-2.5 rounded-full shadow-lg tracking-wider uppercase z-10">
                    {product.badge}
                  </div>
                )}
              </div>

              <div className="flex flex-col h-full justify-center lg:py-10">
                <div className="inline-block mb-4">
                  <span className="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-bold tracking-widest uppercase">{product.type === 'pack' ? 'Pack Promo' : 'Complément'}</span>
                </div>
                <h1 className="font-display text-4xl sm:text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-4">{product.name}</h1>
                
                <div className="flex items-center space-x-1 mb-8">
                   {[...Array(5)].map((_, i) => (
                      <StarIcon key={i} className={`w-5 h-5 ${i < Math.floor(product.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`} />
                    ))}
                  <span className="text-sm font-bold text-gray-400 ml-3">({product.rating}/5 - {product.reviews} avis)</span>
                </div>

                <div className="flex items-baseline space-x-4 mb-10">
                  <p className="text-4xl font-extrabold text-medical-blue">{product.price.toFixed(2)} DT</p>
                  {product.oldPrice && <p className="text-xl text-gray-300 line-through font-bold">{product.oldPrice.toFixed(2)} DT</p>}
                </div>
                <p className="text-xl text-gray-600 leading-relaxed mb-10">{product.description}</p>
                
                <div className="mb-12 space-y-6">
                  <div className="bg-medical-light/30 rounded-3xl p-8 border border-medical-blue/10">
                    <h4 className="font-display font-bold text-gray-900 mb-6 flex items-center uppercase tracking-widest text-sm">Principaux Bienfaits</h4>
                    <ul className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                      {product.benefits.map((benefit, i) => (
                        <li key={i} className="flex items-start text-sm text-gray-700 font-medium">
                          <div className="w-5 h-5 rounded-full bg-blue-100 flex items-center justify-center mr-3 mt-0.5 shrink-0">
                            <svg className="w-3 h-3 text-medical-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="4" d="M5 13l4 4L19 7" /></svg>
                          </div>
                          {benefit}
                        </li>
                      ))}
                    </ul>
                  </div>

                  <Accordion title="Composition (pour 1 gélule)" content={<div className="bg-gray-50 p-6 rounded-2xl border border-gray-100 text-sm font-medium text-gray-700">{product.composition}</div>} />
                  <Accordion title="Conseils d'utilisation" content={<div className="flex items-start p-2"><p className="text-gray-600 leading-relaxed pt-1">{product.usage}</p></div>} />
                  
                  {/* Bloc Sécurité Médicale - Design Nude & Pro Max */}
                  <div className="mt-10 mb-10 space-y-4">
                    {product.precautions && (
                      <div className="p-6 rounded-[2rem] border border-[#E8DCC4] bg-[#FCF9F2] shadow-sm animate-fade-in">
                        <h4 className="text-[11px] font-black uppercase tracking-[0.2em] text-[#A68B6D] mb-3 flex items-center">
                          <span className="mr-2 text-base">⚠️</span> Précautions d'emploi
                        </h4>
                        <p className="text-sm font-medium text-gray-700 leading-relaxed">{product.precautions}</p>
                      </div>
                    )}
                    {product.storage && (
                      <div className="flex items-center px-6 py-4 bg-gray-50/50 rounded-2xl border border-gray-100/50">
                        <span className="text-xl mr-4">❄️</span>
                        <p className="text-sm font-bold text-gray-500 italic tracking-wide">
                          Conservation : <span className="text-gray-700 not-italic ml-1">{product.storage}</span>
                        </p>
                      </div>
                    )}
                  </div>
                </div>

                <a 
                  href="javascript:void(0)"
                  onClick={(e) => { 
                    e.preventDefault(); 
                    onAddToCart(product);
                  }}
                  style={{ position: 'relative', zIndex: 9999, cursor: 'pointer', display: 'flex', backgroundColor: '#075985', color: '#ffffff' }}
                  className="w-full flex justify-center items-center py-6 px-8 shadow-xl text-xl font-bold uppercase tracking-wider rounded-2xl text-white bg-medical-blue hover:bg-gray-900 hover:-translate-y-1 hover:shadow-2xl transition-all text-center"
                >
                  <ShoppingCartIcon className="w-6 h-6 mr-3" />
                  Ajouter au panier
                </a>
              </div>
            </div>
          </div>
        </div>
      );
    };

    const BlogPage = ({ onArticleClick }) => {
      return (
        <div className="pt-32 pb-32 bg-gray-50 min-h-screen">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="text-center mb-24">
              <h2 className="text-sm text-medical-blue font-bold tracking-widest uppercase mb-3">Le Magazine</h2>
              <h1 className="font-display text-5xl font-extrabold text-gray-900 mb-6">Astuces & Santé</h1>
              <p className="text-xl text-gray-500 max-w-2xl mx-auto leading-relaxed">Découvrez les dernières avancées scientifiques, nos conseils micronutrition et les secrets d'un bien-être absolu.</p>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
              {articlesData.map((article) => (
                <article key={article.id} className="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100 group flex flex-col h-full hover:shadow-2xl transition-all duration-500">
                  <div className="p-10 flex flex-col flex-grow">
                    <h2 className="font-display text-2xl font-bold text-gray-900 mb-4 group-hover:text-medical-blue transition-colors line-clamp-3 leading-tight cursor-pointer" onClick={() => onArticleClick(article)} title={`Lire l'article : ${article.title}`}>{article.title}</h2>
                    <p className="text-gray-500 text-base leading-relaxed mb-8 flex-grow">{article.excerpt}</p>
                    <footer className="mt-auto">
                      <button onClick={() => onArticleClick(article)} className="w-full flex items-center justify-center py-4 px-6 border border-gray-200 text-gray-700 hover:bg-medical-blue hover:text-white hover:border-medical-blue rounded-2xl font-bold uppercase tracking-wider text-sm transition-all duration-300" title={`Lire l'article complet sur ${article.title}`}>
                        Lire la suite
                      </button>
                      <p className="text-[10px] text-gray-400 text-center mt-5 uppercase tracking-widest">Conseils de santé certifiés Bionova</p>
                    </footer>
                  </div>
                </article>
              ))}
            </div>
          </div>
        </div>
      );
    };

    const ArticlePage = ({ article, onBack, onProductClick }) => {
      const product = products.find(p => p.id === article.productId);

      return (
        <div className="bg-white min-h-screen">
          {/* Hero Article */}
          <div className="relative h-[60vh] min-h-[400px] flex items-end pb-16">
            <img src={article.image} alt={article.title} className="absolute inset-0 w-full h-full object-cover" loading="lazy" decoding="async" width="1200" height="600" />
            <div className="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent"></div>

            <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center">
              <button onClick={onBack} className="inline-flex items-center text-white/80 hover:text-white font-bold tracking-wide uppercase text-sm transition-colors mb-8 bg-white/10 hover:bg-white/20 px-5 py-2.5 rounded-full backdrop-blur-md border border-white/20">
                <span className="mr-2">&larr;</span> Retour aux astuces
              </button>
              <div className="mb-6"><span className="bg-medical-blue text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest">{article.category}</span></div>
              <h1 className="font-display text-4xl sm:text-5xl md:text-6xl font-extrabold text-white leading-tight drop-shadow-lg">{article.title}</h1>
            </div>
          </div>

          {/* Contenu Article */}
          <div className="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <article className="prose prose-lg prose-blue max-w-none">

              <section className="mb-14">
                <h2 className="font-display text-3xl font-bold text-gray-900 mb-6 flex items-center"><span className="bg-blue-50 text-medical-blue w-12 h-12 rounded-full flex items-center justify-center mr-5 text-xl" aria-hidden="true">1</span> Le problème</h2>
                <p className="text-gray-600 leading-relaxed text-lg">{article.problem}</p>
              </section>

              <section className="mb-14">
                <h2 className="font-display text-3xl font-bold text-gray-900 mb-6 flex items-center"><span className="bg-blue-50 text-medical-blue w-12 h-12 rounded-full flex items-center justify-center mr-5 text-xl" aria-hidden="true">2</span> La solution naturelle</h2>
                <p className="text-gray-600 leading-relaxed text-lg">{article.solution}</p>
              </section>

              <section className="mb-16 bg-gray-50 p-10 sm:p-14 rounded-[3rem] border border-gray-100 relative mt-20">
                <div className="absolute top-0 left-10 transform -translate-y-1/2 bg-white w-20 h-20 rounded-full flex items-center justify-center shadow-xl border border-gray-50">
                  <ShieldIcon className="w-10 h-10 text-medical-blue" />
                </div>
                <h2 className="font-display text-2xl font-bold text-gray-900 mb-6 mt-4">Le conseil de l'expert Bionova</h2>
                <p className="text-gray-600 leading-relaxed italic text-lg">"{article.expert}"</p>
              </section>

            </article>

            {/* Produit Recommandé */}
            {product && (
              <div className="mt-24 pt-16 border-t border-gray-100">
                <h3 className="text-center font-display text-2xl font-bold text-gray-900 mb-12 uppercase tracking-widest text-sm text-medical-blue">Le protocole recommandé</h3>
                <div className="bg-white rounded-[3rem] border border-gray-100 shadow-lg overflow-hidden flex flex-col sm:flex-row hover:shadow-2xl transition-all duration-500 cursor-pointer group" onClick={() => onProductClick(product)}>
                  <div className="sm:w-2/5 bg-gray-50 p-8 flex items-center justify-center relative overflow-hidden">
                    <img src={product.image} alt={product.name} className="w-56 h-56 object-contain transform group-hover:scale-110 transition-transform duration-700" loading="lazy" decoding="async" width="224" height="224" />
                  </div>
                  <div className="sm:w-3/5 p-10 sm:p-12 flex flex-col justify-center">
                    <div className="flex justify-between items-start mb-4">
                      <h4 className="font-display text-3xl font-extrabold text-gray-900 group-hover:text-medical-blue transition-colors">{product.name}</h4>
                      <span className="text-2xl font-bold text-medical-blue">{product.price.toFixed(2)} DT</span>
                    </div>
                    <p className="text-gray-500 mb-8 leading-relaxed line-clamp-3">{product.description}</p>
                    <button className="inline-flex items-center text-white bg-gray-900 hover:bg-medical-blue py-4 px-8 rounded-2xl font-bold uppercase tracking-wider text-sm transition-colors self-start shadow-md">
                      Voir le produit <span className="ml-3">&rarr;</span>
                    </button>
                  </div>
                </div>
              </div>
            )}

            <div className="mt-20 text-center bg-gray-50 py-8 px-6 rounded-2xl">
              <p className="text-xs text-gray-500 uppercase tracking-widest font-bold">Avertissement</p>
              <p className="text-sm text-gray-400 mt-2">Les informations contenues dans cet article sont à but éducatif. Consultez toujours votre médecin ou pharmacien avant de commencer une cure.</p>
            </div>
          </div>
        </div>
      );
    };

    const AboutPage = () => {
      return (
        <div className="pt-32 pb-32 bg-white min-h-screen">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
              <div>
                <h2 className="text-sm text-medical-blue font-bold tracking-widest uppercase mb-3">Notre Laboratoire</h2>
                <h1 className="font-display text-5xl sm:text-6xl font-extrabold text-gray-900 mb-8 leading-tight">L'innovation au service de la cellule.</h1>
                <p className="text-xl text-gray-600 leading-relaxed mb-6">
                  Fondé par des passionnés de micronutrition et de biotechnologie, le laboratoire Bionova repousse les limites de la supplémentation naturelle.
                </p>
                <p className="text-xl text-gray-600 leading-relaxed">
                  Nous croyons fermement que la nature offre les principes actifs les plus puissants. Notre mission est de les isoler, de les concentrer et de les rendre hautement biodisponibles pour garantir des résultats cliniques probants à nos utilisateurs.
                </p>
              </div>
              <div className="relative rounded-[3rem] overflow-hidden shadow-2xl h-[500px]">
                <img src="<?php echo get_template_directory_uri(); ?>/expertise-hero.png" alt="Laboratoire" className="w-full h-full object-cover" loading="lazy" decoding="async" width="800" height="600" />
                <div className="absolute inset-0 bg-medical-blue opacity-10 mix-blend-multiply"></div>
              </div>
            </div>

            <div className="bg-gray-50 rounded-[4rem] p-16 md:p-24 border border-gray-100 text-center">
              <h2 className="font-display text-4xl font-extrabold text-gray-900 mb-16">Nos piliers fondateurs</h2>
              <div className="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                  <div className="bg-white w-20 h-20 rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-8 text-medical-blue"><BeakerIcon className="w-10 h-10" /></div>
                  <h3 className="font-display text-2xl font-bold mb-4">Innovation Scientifique</h3>
                  <p className="text-gray-500 leading-relaxed">Des formules basées sur les dernières études cliniques, optimisant les synergies entre actifs.</p>
                </div>
                <div>
                  <div className="bg-white w-20 h-20 rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-8 text-medical-blue"><LeafIcon className="w-10 h-10" /></div>
                  <h3 className="font-display text-2xl font-bold mb-4">Pureté Absolue</h3>
                  <p className="text-gray-500 leading-relaxed">Zéro additif chimique, nanoparticule ou excipient controversé. Le meilleur, et rien d'autre.</p>
                </div>
                <div>
                  <div className="bg-white w-20 h-20 rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-8 text-medical-blue"><ShieldIcon className="w-10 h-10" /></div>
                  <h3 className="font-display text-2xl font-bold mb-4">Traçabilité Totale</h3>
                  <p className="text-gray-500 leading-relaxed">Des matières premières rigoureusement sélectionnées et des lots testés par des laboratoires indépendants.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      );
    };

    const ContactPage = () => {
      const [status, setStatus] = React.useState('');
      const handleSubmit = (e) => {
        e.preventDefault();
        setStatus('Message envoyé avec succès ! Notre équipe d\'experts vous répondra rapidement.');
        e.target.reset();
        setTimeout(() => setStatus(''), 5000);
      };

      return (
        <div className="pt-32 pb-32 bg-gray-50 min-h-screen">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="text-center mb-20">
              <h2 className="text-sm text-medical-blue font-bold tracking-widest uppercase mb-3">Support & Expertise</h2>
              <h1 className="font-display text-5xl font-extrabold text-gray-900 mb-6">Contactez-nous</h1>
              <p className="text-xl text-gray-500 max-w-2xl mx-auto leading-relaxed">Besoin d'un conseil personnalisé ou d'une information sur votre commande ? Nous sommes à votre écoute.</p>
            </div>

            <div className="grid grid-cols-1 lg:grid-cols-2 gap-16">
              <div className="bg-white p-10 sm:p-14 rounded-[3rem] shadow-xl border border-gray-100">
                {status && (
                  <div className="mb-8 p-6 rounded-2xl bg-green-50 border border-green-100 shadow-sm">
                    <p className="text-base font-bold text-green-800 text-center flex items-center justify-center"><ShieldIcon className="w-6 h-6 mr-2" />{status}</p>
                  </div>
                )}
                <form onSubmit={handleSubmit} className="space-y-8">
                  <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                      <label className="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-3">Nom complet</label>
                      <input type="text" required className="py-4 px-6 block w-full bg-gray-50 border border-transparent focus:bg-white focus:border-medical-blue focus:ring-2 focus:ring-medical-blue/20 rounded-2xl text-gray-900 transition-all outline-none" placeholder="Jean Dupont" />
                    </div>
                    <div>
                      <label className="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-3">Email</label>
                      <input type="email" required className="py-4 px-6 block w-full bg-gray-50 border border-transparent focus:bg-white focus:border-medical-blue focus:ring-2 focus:ring-medical-blue/20 rounded-2xl text-gray-900 transition-all outline-none" placeholder="jean@exemple.com" />
                    </div>
                  </div>
                  <div>
                    <label className="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-3">Sujet</label>
                    <select required className="py-4 px-6 block w-full bg-gray-50 border border-transparent focus:bg-white focus:border-medical-blue focus:ring-2 focus:ring-medical-blue/20 rounded-2xl text-gray-900 transition-all outline-none appearance-none">
                      <option value="">Sélectionnez un sujet</option>
                      <option value="conseil">Conseil produit</option>
                      <option value="suivi">Suivi de commande</option>
                      <option value="partenariat">Partenariat / B2B</option>
                      <option value="autre">Autre demande</option>
                    </select>
                  </div>
                  <div>
                    <label className="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-3">Message</label>
                    <textarea rows="5" required className="py-4 px-6 block w-full bg-gray-50 border border-transparent focus:bg-white focus:border-medical-blue focus:ring-2 focus:ring-medical-blue/20 rounded-2xl text-gray-900 transition-all outline-none resize-none" placeholder="Votre message..."></textarea>
                  </div>
                  <button type="submit" className="w-full py-5 px-8 shadow-lg text-lg font-bold rounded-2xl text-white bg-gradient-to-r from-medical-blue to-blue-400 hover:from-blue-600 hover:to-medical-blue transition-all transform hover:-translate-y-1">
                    Envoyer le message
                  </button>
                </form>
              </div>

              {/* Infos & Map Placeholder */}
              <div className="flex flex-col h-full space-y-10">
                <div className="bg-white p-10 rounded-[3rem] shadow-sm border border-gray-100">
                  <h3 className="font-display text-2xl font-bold mb-6">Nos Coordonnées</h3>
                  <p className="text-gray-500 mb-4 flex items-center"><TruckIcon className="w-5 h-5 mr-3 text-medical-blue" /> 123 Avenue de la Santé, Tunis, Tunisie</p>
                  <p className="text-gray-500 mb-4 flex items-center"><svg className="w-5 h-5 mr-3 text-medical-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg> contact@bionova.tn</p>
                  <p className="text-gray-500 flex items-center"><svg className="w-5 h-5 mr-3 text-medical-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg> +216 71 000 000</p>
                </div>

                <div className="flex-grow bg-gray-200 rounded-[3rem] overflow-hidden relative shadow-inner border border-gray-300 min-h-[300px]">
                  <div className="absolute inset-0 flex flex-col items-center justify-center text-gray-500 bg-[url('https://www.transparenttextures.com/patterns/cartographer.png')]">
                    <svg className="w-12 h-12 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    <span className="font-bold text-lg">Google Maps</span>
                    <span className="text-sm">(Intégration à venir)</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      );
    };



    // --- MAIN APP COMPONENT ---

    const App = () => {
      const getInitialPage = () => {
        const hash = window.location.hash.replace('#', '');
        if (['home', 'products', 'blog', 'about', 'contact'].includes(hash)) return hash;
        return '<?php echo isset($initial_page) ? $initial_page : "home"; ?>';
      };
      
      const [currentPage, setCurrentPage] = React.useState(getInitialPage());
      const [selectedProduct, setSelectedProduct] = React.useState(null);
      const [selectedArticle, setSelectedArticle] = React.useState(null);
      const [cartItemsCount, setCartItemsCount] = React.useState(WC_INITIAL_COUNT);
      
      React.useEffect(() => {
        const handleHashChange = () => {
          const hash = window.location.hash.replace('#', '');
          if (['home', 'products', 'blog', 'about', 'contact'].includes(hash)) {
            setCurrentPage(hash);
            window.scrollTo({ top: 0, behavior: 'smooth' });
          }
        };
        window.addEventListener('hashchange', handleHashChange);
        return () => window.removeEventListener('hashchange', handleHashChange);
      }, []);

      const handleNavigate = (page) => {
        if (page === 'cart') {
          window.location.href = WC_CART_URL;
          return;
        }
        if (page === 'login') {
          window.location.href = '<?php echo esc_js( get_permalink( get_option("woocommerce_myaccount_page_id") ) ); ?>';
          return;
        }
        setCurrentPage(page);
        if (page !== 'product') setSelectedProduct(null);
        if (page !== 'article') setSelectedArticle(null);
        window.scrollTo({ top: 0, behavior: 'smooth' });
      };

      const handleProductClick = (product) => {
        setSelectedProduct(product);
        setCurrentPage('product');
        window.scrollTo({ top: 0, behavior: 'smooth' });
      };

      const handleArticleClick = (article) => {
        setSelectedArticle(article);
        setCurrentPage('article');
        window.scrollTo({ top: 0, behavior: 'smooth' });
      };


      const handleAddToCart = (product, redirect = false) => {
        // WooCommerce AJAX Add to Cart
        const wcId = WC_PRODUCT_MAP[product.id] || product.id;
        const addUrl = `<?php echo home_url('/'); ?>?add-to-cart=${wcId}`;
        fetch(addUrl)
          .then(() => {
            setCartItemsCount(prev => prev + 1);
            if (redirect || product.type === 'pack') {
              window.location.href = WC_CART_URL;
            }
          });

        if (!redirect && product.type !== 'pack') {
          // Toast notification
          const toast = document.createElement('div');
          toast.className = 'fixed bottom-10 right-10 bg-gray-900 text-white px-6 py-4 rounded-xl shadow-2xl font-bold z-50 transform transition-all duration-500 translate-y-0 opacity-100 flex items-center';
          toast.innerHTML = `<svg class="w-6 h-6 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Ajouté au panier`;
          document.body.appendChild(toast);
          setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(20px)';
            setTimeout(() => toast.remove(), 500);
          }, 3000);
        }
      };

      // Routing Logic
      const renderPage = () => {
        switch (currentPage) {
          case 'home': return <HomePage onNavigate={handleNavigate} products={products} onProductClick={handleProductClick} onAddToCart={handleAddToCart} />;
          case 'products': return <ProductsPage products={products} onAddToCart={handleAddToCart} onProductClick={handleProductClick} />;
          case 'product': return selectedProduct ? <ProductDetailPage product={selectedProduct} onAddToCart={handleAddToCart} onBack={() => handleNavigate('products')} /> : <ProductsPage products={products} onAddToCart={handleAddToCart} onProductClick={handleProductClick} />;
          case 'blog': return <BlogPage onArticleClick={handleArticleClick} />;
          case 'article': return selectedArticle ? <ArticlePage article={selectedArticle} onBack={() => handleNavigate('blog')} onProductClick={handleProductClick} /> : <BlogPage onArticleClick={handleArticleClick} />;
          case 'about': return <AboutPage />;
          case 'contact': return <ContactPage />;

          default: return <HomePage onNavigate={handleNavigate} products={products} onProductClick={handleProductClick} onAddToCart={handleAddToCart} />;
        }
      };

      return (
        <div className="flex flex-col min-h-screen text-gray-900 bg-white selection:bg-medical-blue selection:text-white">
          <Navbar cartItemCount={cartItemsCount} currentPage={currentPage} onNavigate={handleNavigate} />

          <main className="flex-grow">
            {renderPage()}
          </main>

          <TrustBar />
          <Footer />
        </div>
      );
    };

    const root = ReactDOM.createRoot(document.getElementById('root'));
    root.render(<App />);
  </script>
  <?php wp_footer(); ?>
</body></html>

