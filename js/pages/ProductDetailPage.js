/* ============================================================
   BIONOVA — Page: ProductDetailPage
   VERSION: 20260521
   Depends on: Accordion, StarIcon, ShoppingCartIcon
   ============================================================ */

const ProductDetailPage = ({ product, onAddToCart, onBack, products = [], onProductClick }) => {
  // Helper to load tailored high-quality reviews based on product slug
  const getProductReviews = (productSlug) => {
    const slug = productSlug || '';

    if (slug.includes('nmn')) {
      return [
        { id: 1, name: "Amine K.", rating: 5, title: "Effet coup de fouet incroyable !", content: "Après seulement 2 semaines de prise de NMN Bionova, je ressens une clarté mentale et une vitalité que je n'avais pas eues depuis des années. Le meilleur NMN du marché en Tunisie, certifié pur.", date: "14 Mai 2026", verified: true },
        { id: 2, name: "Dr. Yasmine B.", rating: 5, title: "Pureté certifiée remarquable", content: "En tant que professionnelle de santé, j'apprécie la transparence sur la pureté à 99%. Mes niveaux d'énergie se sont nettement stabilisés tout au long de la journée. Je valide à 100%.", date: "02 Mai 2026", verified: true },
        { id: 3, name: "Karim T.", rating: 4, title: "Excellente qualité", content: "Je me sens moins fatigué en fin de journée de travail. Le prix est élevé mais la pureté et l'efficacité justifient largement cet investissement pour ma longévité.", date: "28 Avril 2026", verified: true }
      ];

    } else if (slug.includes('ashwagandha')) {
      return [
        { id: 1, name: "Sonia M.", rating: 5, title: "Plus aucun stress !", content: "Ce complément d'Ashwagandha KSM-66 a littéralement changé mon quotidien. Mon anxiété a diminué de moitié et je m'endors beaucoup plus sereinement chaque soir. Un vrai miracle.", date: "16 Mai 2026", verified: true },
        { id: 2, name: "Fares K.", rating: 5, title: "Amélioration notable du sommeil", content: "Je prends 2 gélules par jour. Mon sommeil est beaucoup plus réparateur (confirmé par ma montre connectée). Récupération physique et nerveuse au top !", date: "08 Mai 2026", verified: true },
        { id: 3, name: "Dr. Anis G.", rating: 4, title: "Excellente concentration en withanolides", content: "Le choix de l'extrait breveté KSM-66 par Bionova garantit une efficacité clinique supérieure. Très bon produit pour réguler le cortisol et soutenir le système nerveux.", date: "01 Mai 2026", verified: true }
      ];

    } else if (slug.includes('collagene')) {
      return [
        { id: 1, name: "Meriam B.", rating: 5, title: "Peau lumineuse et ongles forts !", content: "Je fais une cure de ce Collagène Marin depuis un mois et les résultats sont visibles à l'œil nu. Mes ridules sont lissées et mes ongles ne se dédoublent plus. Je recommande !", date: "15 Mai 2026", verified: true },
        { id: 2, name: "Hédi Z.", rating: 5, title: "Soulagement articulaire réel", content: "Je l'ai acheté pour mes douleurs aux genoux lors de mes séances de course à pied. La douleur a diminué de plus de 80% après 3 semaines. L'assimilation est parfaite.", date: "05 Mai 2026", verified: true },
        { id: 3, name: "Rim L.", rating: 4, title: "Goût neutre, facile à prendre", content: "Se dissout parfaitement sans arrière-goût de poisson désagréable. Les bienfaits sur ma peau commencent déjà à se faire ressentir. Excellent produit.", date: "29 Avril 2026", verified: true }
      ];

    } else if (slug.includes('acide-alpha-lipoique')) {
      return [
        { id: 1, name: "Leila H.", rating: 5, title: "Antioxydant hors pair !", content: "Je prends l'Acide Alpha Lipoïque depuis 3 semaines et j'ai remarqué une amélioration significative de ma tolérance au glucose. En tant que diabétique de type 2 suivi médicalement, mon médecin est bluffé par les résultats.", date: "18 Mai 2026", verified: true },
        { id: 2, name: "Bassem R.", rating: 5, title: "Formidable pour la récupération", content: "Sportif de haut niveau, j'ai intégré l'ALA à ma routine. Les courbatures ont nettement diminué et ma récupération après les entraînements intensifs est bien plus rapide. Qualité Bionova irréprochable.", date: "10 Mai 2026", verified: true },
        { id: 3, name: "Nadia F.", rating: 4, title: "Protection cellulaire réelle", content: "J'ai opté pour la forme R&S de Bionova pour sa biodisponibilité optimale. Mon énergie a augmenté progressivement. Je le complète avec de la Vitamine E et les effets sont synergiques.", date: "03 Mai 2026", verified: true }
      ];

    } else if (slug.includes('astaxanthine')) {
      return [
        { id: 1, name: "Ines C.", rating: 5, title: "Ma peau a rajeuni de 10 ans !", content: "Après 6 semaines d'Astaxanthine Bionova, les compliments pleuvent sur mon teint. L'éclat est réel et les petites rougeurs que j'avais en été ont disparu. Je n'arrêterai jamais ce complément !", date: "17 Mai 2026", verified: true },
        { id: 2, name: "Riadh M.", rating: 5, title: "Indispensable pour les sportifs en plein air", content: "Je cours tous les matins et le soleil abîmait ma peau. Depuis l'Astaxanthine, je bronze mieux et ma récupération musculaire est nettement améliorée. Un produit vraiment d'exception.", date: "09 Mai 2026", verified: true },
        { id: 3, name: "Dorra B.", rating: 5, title: "Protection oculaire remarquable", content: "Je travaille sur écran toute la journée. L'Astaxanthine a réduit la fatigue visuelle de manière spectaculaire. Mes yeux ne sont plus secs en fin de journée. Un incontournable.", date: "30 Avril 2026", verified: true }
      ];

    } else if (slug.includes('biotine')) {
      return [
        { id: 1, name: "Amani S.", rating: 5, title: "Mes cheveux ont doublé de volume !", content: "En 2 mois de Biotine Bionova à 10mg, ma chute de cheveux a quasiment stoppé. Mes cheveux sont plus épais, plus brillants. Et mes ongles qui se cassaient tout le temps sont maintenant solides comme du roc. Merci Bionova !", date: "19 Mai 2026", verified: true },
        { id: 2, name: "Youssef L.", rating: 5, title: "Résultats visibles dès le premier mois", content: "J'étais sceptique au départ, mais force est de constater que mes ongles ont poussé plus vite et se dédoublent plus. Ma peau est également plus nette. Produit vraiment efficace et dosage optimal.", date: "11 Mai 2026", verified: true },
        { id: 3, name: "Hajer M.", rating: 4, title: "Bon produit, à poursuivre en cure longue", content: "Les premiers effets sur mes ongles se sont vus après 3 semaines. Pour les cheveux, il faut être patient (environ 2 mois). Je recommande de faire une cure de 3 mois pour des résultats durables.", date: "04 Mai 2026", verified: true }
      ];

    } else if (slug.includes('curcumine')) {
      return [
        { id: 1, name: "Fethi B.", rating: 5, title: "Mes douleurs articulaires ont disparu !", content: "À 55 ans, j'avais des douleurs aux genoux et aux hanches insupportables. Après un mois de Curcumine + Boswellia Bionova, je marche sans douleur. Je regrette de ne pas avoir découvert ce produit plus tôt !", date: "20 Mai 2026", verified: true },
        { id: 2, name: "Sabrine A.", rating: 5, title: "Anti-inflammatoire naturel très efficace", content: "Je souffre de colon irritable depuis des années. Cette synergie Curcumine-Boswellia a calmé les inflammations intestinales en moins de 3 semaines. Le confort digestif est incomparable. Très bonne formule.", date: "12 Mai 2026", verified: true },
        { id: 3, name: "Maher G.", rating: 4, title: "Excellent pour la récupération sportive", content: "Sportif de haut niveau, j'utilisais ce complément en post-entraînement. La réduction des inflammations musculaires est perceptible dès J+2. La combinaison curcuma/boswellia est vraiment bien pensée.", date: "05 Mai 2026", verified: true }
      ];

    } else if (slug.includes('l-carnosine')) {
      return [
        { id: 1, name: "Mounir T.", rating: 5, title: "Le complément anti-âge que j'attendais", content: "À 48 ans, j'ai intégré la L-Carnosine dans ma stack anti-âge avec le NMN. L'association est bluffante : meilleure clarté mentale, peau plus ferme et énergie soutenue. La glycation, c'est terminé pour moi.", date: "16 Mai 2026", verified: true },
        { id: 2, name: "Dr. Olfa K.", rating: 5, title: "Soutien cellulaire scientifiquement prouvé", content: "En tant que biochimiste, je suis la littérature sur la carnosine depuis longtemps. La pureté et le dosage de 500mg de Bionova sont parfaits. Je constate personnellement une meilleure récupération tissulaire.", date: "07 Mai 2026", verified: true },
        { id: 3, name: "Sana R.", rating: 4, title: "Effet sabtil mais réel sur la longue durée", content: "Les effets de la L-Carnosine se ressentent sur le long terme. Après 2 mois, ma peau est plus élastique et je me sens globalement plus résistant. À combiner avec d'autres antioxydants pour un effet optimal.", date: "01 Mai 2026", verified: true }
      ];

    } else if (slug.includes('lion') || slug.includes('mane')) {
      return [
        { id: 1, name: "Tarek Z.", rating: 5, title: "Mon cerveau est en turbo !", content: "Développeur, j'avais besoin d'un boost cognitif naturel. Depuis le Lion's Mane Bionova, ma concentration est au maximum, les idées viennent plus facilement et le brouillard mental du soir a disparu. Un vrai nootropique.", date: "18 Mai 2026", verified: true },
        { id: 2, name: "Insaf B.", rating: 5, title: "Mémoire et focus décuplés", content: "J'étudie en médecine et les révisions sont intenses. Le Lion's Mane m'a aidé à mémoriser bien plus rapidement. Je retiens mes cours dès la première lecture. Produit Premium à la hauteur de ses promesses.", date: "09 Mai 2026", verified: true },
        { id: 3, name: "Ramzi C.", rating: 5, title: "Récupération nerveuse après burnout", content: "Suite à un burnout professionnel, mon neurologue m'a conseillé d'explorer les champignons adaptogènes. Le Lion's Mane Bionova m'a aidé à retrouver ma sérénité mentale et ma capacité de réflexion en 6 semaines.", date: "02 Mai 2026", verified: true }
      ];

    } else if (slug.includes('neem')) {
      return [
        { id: 1, name: "Marwa B.", rating: 5, title: "Peau nette en 3 semaines !", content: "J'avais des boutons persistants depuis des années malgré tous les traitements. Après 3 semaines de Neem Bionova, ma peau s'est assainie de façon remarquable. L'extrait concentré 10:1 est vraiment puissant.", date: "15 Mai 2026", verified: true },
        { id: 2, name: "Aziz K.", rating: 4, title: "Détox efficace et bien tolérée", content: "Je fait une cure de détox chaque printemps. Le Neem Bionova est le plus efficace que j'ai testé. Mon énergie a augmenté, mon teint s'est éclairci et ma digestion s'est améliorée. Pas d'effets secondaires.", date: "06 Mai 2026", verified: true },
        { id: 3, name: "Chiraz L.", rating: 4, title: "Bon soutien immunitaire hivernal", content: "Je l'utilise en prévention en hiver et j'ai passé la saison froide sans tomber malade, chose rare pour moi. Le Neem a des propriétés antimicrobiennes remarquables. Bonne tolérance digestive avec un grand verre d'eau.", date: "28 Avril 2026", verified: true }
      ];

    } else if (slug.includes('pack-glowy') || slug.includes('glowy')) {
      return [
        { id: 1, name: "Lina M.", rating: 5, title: "Le duo beauté parfait !", content: "J'ai commandé le Pack Glowy en me disant que c'était peut-être marketing. 6 semaines plus tard, mon dermatologue m'a demandé ce que j'avais changé dans ma routine ! Peau plus ferme, teint lumineux, rides estompées. Le combo Astaxanthine + Collagène est MAGIQUE.", date: "19 Mai 2026", verified: true },
        { id: 2, name: "Hanen Z.", rating: 5, title: "Économie réelle + résultats doublés", content: "Acheter les deux séparément coûtait plus cher. En pack, on économise et en plus les deux compléments se potentialisent. Ma peau n'a jamais été aussi belle. Je suis une cliente Bionova à vie !", date: "11 Mai 2026", verified: true },
        { id: 3, name: "Sarra T.", rating: 5, title: "Cadeau parfait pour maman", content: "J'ai offert ce pack à ma mère de 58 ans. En 2 mois, elle a rajeuni ! Sa peau est plus souple, son teint plus égal et elle déborde d'énergie. Elle me demande de lui en recommander. Livraison rapide et packaging élégant.", date: "03 Mai 2026", verified: true }
      ];

    } else {
      return [
        { id: 1, name: "Amine K.", rating: 5, title: "Qualité exceptionnelle !", content: "Je l'utilise depuis un mois maintenant. Les résultats de ce produit Bionova sur ma vitalité et mon bien-être général sont remarquables. La livraison en Tunisie a été ultra-rapide.", date: "14 Mai 2026", verified: true },
        { id: 2, name: "Dr. Yasmine B.", rating: 5, title: "Formule de grade clinique impeccable", content: "La concentration et la pureté de ce produit sont de très haut niveau scientifique. Je le recommande à mes patients et les retours sont extrêmement positifs.", date: "02 Mai 2026", verified: true },
        { id: 3, name: "Karim T.", rating: 4, title: "Très satisfait de mon achat", content: "Excellent complément alimentaire. Prise facile et assimilation rapide. Le packaging en verre ambré est magnifique et préserve idéalement les principes actifs.", date: "28 Avril 2026", verified: true }
      ];
    }
  };

  const [reviewsList, setReviewsList] = React.useState(() => getProductReviews(product.slug));
  const [newReview, setNewReview] = React.useState({ name: '', rating: 5, title: '', content: '' });
  const [hoverRating, setHoverRating] = React.useState(0);
  const [successMessage, setSuccessMessage] = React.useState(false);
  const [showForm, setShowForm] = React.useState(false);

  // Sync state with product updates (slug changes)
  React.useEffect(() => {
    setReviewsList(getProductReviews(product.slug));
    setSuccessMessage(false);
    setNewReview({ name: '', rating: 5, title: '', content: '' });
    setShowForm(false);
  }, [product.slug]);

  // Compute dynamic stats
  const reviewsCount = reviewsList.length;
  const averageRating = reviewsCount > 0 
    ? (reviewsList.reduce((acc, r) => acc + r.rating, 0) / reviewsCount).toFixed(1)
    : product.rating.toFixed(1);

  // Calculate stars distribution for the visual bar chart
  const distribution = [5, 4, 3, 2, 1].map(stars => {
    const count = reviewsList.filter(r => r.rating === stars).length;
    const percentage = reviewsCount > 0 ? (count / reviewsCount) * 100 : 0;
    return { stars, count, percentage };
  });

  // Get 3 recommended products (excluding current)
  const recommendedProducts = products.filter(p => p.id !== product.id).slice(0, 3);

  return (
    <div className="min-h-screen bg-white pt-20 pb-16 lg:pt-32 lg:pb-32">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <button onClick={onBack} className="group flex items-center text-gray-500 hover:text-bionova-red font-semibold tracking-wide uppercase text-sm transition-colors mb-16">
          <span className="transform transition-transform group-hover:-translate-x-2 mr-3 text-lg">&larr;</span> Retour à la boutique
        </button>
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 xl:gap-24 items-center">

          <div className="relative w-full aspect-square rounded-[3rem] bg-gray-50 border border-gray-100 shadow-sm flex items-center justify-center overflow-hidden group">
            {product.image2 ? (
              <div className="flex h-full w-full items-center justify-center p-8 gap-4">
                <img src={product.image} alt={product.name} className="w-1/2 h-full object-contain transform -rotate-6 transition-transform group-hover:rotate-0" loading="lazy" decoding="async" />
                <img src={product.image2} alt={product.name} className="w-1/2 h-full object-contain transform rotate-6 transition-transform group-hover:rotate-0" loading="lazy" decoding="async" />
              </div>
            ) : (
              <img src={product.image} alt={product.name} className="w-full h-full p-12 object-contain transition-transform group-hover:scale-105" loading="lazy" decoding="async" />
            )}
            {product.badge && (
              <div className="absolute top-8 right-8 bg-bionova-red text-white text-sm font-bold px-5 py-2.5 rounded-full shadow-lg tracking-wider uppercase z-10">
                {product.badge}
              </div>
            )}
          </div>

          <div className="flex flex-col h-full justify-center lg:py-10">
            <div className="inline-block mb-4">
              <span className="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-bold tracking-widest uppercase">{product.type === 'pack' ? 'Pack Promo' : 'Complément'}</span>
            </div>
            <h1 className="font-display text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-gray-900 leading-tight mb-4">{product.name}</h1>

            <div className="flex items-center space-x-1 mb-8">
              {[...Array(5)].map((_, i) => (
                <StarIcon key={i} className={`w-5 h-5 ${i < Math.floor(averageRating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300'}`} />
              ))}
              <span className="text-sm font-bold text-gray-400 ml-3">({averageRating}/5 - {reviewsCount} avis)</span>
            </div>

            <div className="flex items-baseline space-x-4 mb-10">
              <p className="text-4xl font-extrabold text-bionova-red">{product.price.toFixed(2)} DT</p>
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
                        <svg className="w-3 h-3 text-bionova-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="4" d="M5 13l4 4L19 7" /></svg>
                      </div>
                      {benefit}
                    </li>
                  ))}
                </ul>
              </div>

              <Accordion title="Composition (pour 1 gélule)" content={<div className="bg-gray-50 p-6 rounded-2xl border border-gray-100 text-sm font-medium text-gray-700">{product.composition}</div>} />
              <Accordion title="Conseils d'utilisation" content={<div className="flex items-start p-2"><p className="text-gray-600 leading-relaxed pt-1">{product.usage}</p></div>} />

              {/* Medical Safety Block */}
              <div className="mt-10 mb-10 space-y-4">
                {product.precautions && (
                  <div className="p-6 rounded-[2rem] border border-[#E8DCC4] bg-[#FCF9F2] shadow-sm animate-fade-in">
                    <h4 className="text-[11px] font-black uppercase tracking-[0.2em] text-[#A68B6D] mb-3 flex items-center">
                      <svg className="w-4 h-4 mr-2 text-[#A68B6D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.27 16.5c-.77.833.192 2.5 1.732 2.5z" /></svg>
                      Précautions d'emploi
                    </h4>
                    <p className="text-sm font-medium text-gray-700 leading-relaxed">{product.precautions}</p>
                  </div>
                )}
                {product.storage && (
                  <div className="flex items-center px-6 py-4 bg-gray-50/50 rounded-2xl border border-gray-100/50">
                    <svg className="w-5 h-5 mr-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                    <p className="text-sm font-bold text-gray-500 italic tracking-wide">
                      Conservation : <span className="text-gray-700 not-italic ml-1">{product.storage}</span>
                    </p>
                  </div>
                )}
              </div>
            </div>

            {/* Bloc de notation globale réintégré - Style Simple Rectangulaire */}
            <div className="mb-8 bg-gray-50 border border-gray-200 rounded-3xl p-6 sm:p-8 shadow-sm">
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-8 items-center">
                <div className="flex flex-col items-center sm:items-start">
                  <span className="text-xs font-bold uppercase tracking-wider text-gray-400 mb-1">Moyenne Générale</span>
                  <div className="flex items-baseline space-x-1">
                    <p className="text-6xl font-black text-gray-900 tracking-tight leading-none">{averageRating}</p>
                    <span className="text-xl font-bold text-gray-400">/5</span>
                  </div>
                  <div className="flex items-center space-x-1 my-3">
                    {[...Array(5)].map((_, i) => (
                      <StarIcon key={i} className={`w-4.5 h-4.5 ${i < Math.floor(averageRating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-200'}`} />
                    ))}
                  </div>
                  <p className="text-xs font-semibold text-gray-500">
                    Note de {averageRating}/5 basé sur {reviewsCount} avis clients
                  </p>
                </div>

                {/* Distribution bars */}
                <div className="space-y-2 border-t sm:border-t-0 sm:border-l border-gray-200 pt-5 sm:pt-0 sm:pl-6">
                  {distribution.map(({ stars, count, percentage }) => (
                    <div key={stars} className="flex items-center text-xs font-semibold text-gray-500">
                      <span className="w-8 text-right mr-3">{stars} ★</span>
                      <div className="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden relative">
                        <div 
                          className="h-full bg-yellow-400 rounded-full transition-all duration-500" 
                          style={{ width: `${percentage}%` }}
                        ></div>
                      </div>
                      <span className="w-8 text-left ml-3 text-gray-400">({count})</span>
                    </div>
                  ))}
                </div>
              </div>

              <button 
                onClick={() => {
                  setShowForm(!showForm);
                  if (!showForm) {
                    setTimeout(() => {
                      const formElem = document.getElementById('review-form-anchor');
                      if (formElem) {
                        formElem.scrollIntoView({ behavior: 'smooth' });
                      }
                    }, 150);
                  }
                }}
                className="w-full mt-6 py-4 px-6 font-bold uppercase tracking-widest rounded-2xl text-xs text-white bg-gray-900 hover:bg-bionova-red transition-all cursor-pointer shadow-md text-center"
              >
                {showForm ? "ANNULER L'AVIS" : "RÉDIGER UN AVIS"}
              </button>
            </div>

            <a
              href="javascript:void(0)"
              onClick={(e) => { e.preventDefault(); onAddToCart(product); }}
              style={{ position: 'relative', zIndex: 9999, cursor: 'pointer', display: 'flex', backgroundColor: '#e4002b', color: '#ffffff' }}
              className="w-full flex justify-center items-center py-6 px-8 shadow-xl text-xl font-bold uppercase tracking-wider rounded-2xl text-white bg-bionova-red hover:bg-gray-900 hover:-translate-y-1 hover:shadow-2xl transition-all text-center"
            >
              <ShoppingCartIcon className="w-6 h-6 mr-3" />
              Ajouter au panier
            </a>
          </div>
        </div>

        {/* ==========================================
            NOUVELLE SECTION : AVIS CLIENTS
            ========================================== */}
        <div className="mt-24 pt-20 border-t border-gray-150 relative">
          <div className="w-full">
            
            <h3 className="font-display text-2xl sm:text-4xl font-extrabold text-gray-900 mb-12 text-center flex items-center justify-center tracking-tight">
              <span className="mr-3 text-3xl">💬</span> Évaluations & Avis Clients
            </h3>

            {/* Ancre de défilement pour le formulaire d'avis */}
            <div id="review-form-anchor"></div>

            {/* Formulaire de rédaction inline centré en bas */}
            {showForm && (
              <div className="max-w-3xl mx-auto bg-white border border-gray-100 rounded-3xl p-8 sm:p-10 shadow-md mb-16">
                <h4 className="font-display font-bold text-2xl text-gray-900 mb-2 tracking-tight">Partagez votre expérience</h4>
                <p className="text-xs font-semibold text-gray-400 mb-8 uppercase tracking-widest">Votre avis compte pour notre communauté Bionova.</p>
                
                {successMessage ? (
                  <div className="bg-emerald-50 border border-emerald-100 rounded-2xl p-6 text-center text-emerald-800">
                    <div className="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center mx-auto mb-4 border border-emerald-200">
                      <svg className="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="3" d="M5 13l4 4L19 7" /></svg>
                    </div>
                    <h5 className="font-bold text-base mb-1">Avis publié avec succès !</h5>
                    <p className="text-sm font-semibold text-emerald-600/90">Merci d'avoir partagé votre expérience avec notre communauté Bionova.</p>
                  </div>
                ) : (
                  <form onSubmit={(e) => {
                    e.preventDefault();
                    if (!newReview.name || !newReview.content) {
                      alert("Veuillez remplir votre nom et votre commentaire.");
                      return;
                    }
                    
                    // Add review to state
                    const addedReview = {
                      id: Date.now(),
                      name: newReview.name,
                      rating: newReview.rating,
                      title: newReview.title || "Avis Client",
                      content: newReview.content,
                      date: new Date().toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' }),
                      verified: true
                    };
                    
                    setReviewsList([addedReview, ...reviewsList]);
                    setSuccessMessage(true);
                    setNewReview({ name: '', rating: 5, title: '', content: '' });
                    
                    // Keep success message visible for 4 seconds then close form
                    setTimeout(() => {
                      setSuccessMessage(false);
                      setShowForm(false);
                    }, 4000);
                  }} className="space-y-5">
                    
                    {/* Rating Selection */}
                    <div>
                      <label className="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-3">Votre note globale</label>
                      <div className="flex items-center space-x-1">
                        {[1, 2, 3, 4, 5].map((stars) => (
                          <button
                            type="button"
                            key={stars}
                            onClick={() => setNewReview({ ...newReview, rating: stars })}
                            onMouseEnter={() => setHoverRating(stars)}
                            onMouseLeave={() => setHoverRating(0)}
                            className="p-2 hover:scale-110 transition-transform cursor-pointer focus:outline-none"
                          >
                            <StarIcon 
                              className={`w-8 h-8 transition-colors ${
                                stars <= (hoverRating || newReview.rating) 
                                  ? 'text-yellow-400 fill-yellow-400' 
                                  : 'text-gray-300'
                              }`} 
                            />
                          </button>
                        ))}
                      </div>
                    </div>

                    {/* Name Input */}
                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-5">
                      <div>
                        <label className="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">Nom Complet</label>
                        <input 
                          type="text" 
                          required
                          placeholder="Ex: Amine K."
                          value={newReview.name}
                          onChange={(e) => setNewReview({ ...newReview, name: e.target.value })}
                          className="w-full bg-white border border-gray-200 px-5 py-4 rounded-2xl text-sm font-medium text-gray-800 placeholder-gray-400 focus:outline-none focus:border-bionova-red focus:ring-4 focus:ring-bionova-red/5 transition-all duration-300 shadow-sm"
                        />
                      </div>
                      <div>
                        <label className="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">Titre de l'avis</label>
                        <input 
                          type="text" 
                          placeholder="Ex: Qualité exceptionnelle"
                          value={newReview.title}
                          onChange={(e) => setNewReview({ ...newReview, title: e.target.value })}
                          className="w-full bg-white border border-gray-200 px-5 py-4 rounded-2xl text-sm font-medium text-gray-800 placeholder-gray-400 focus:outline-none focus:border-bionova-red focus:ring-4 focus:ring-bionova-red/5 transition-all duration-300 shadow-sm"
                        />
                      </div>
                    </div>

                    {/* Comment Input */}
                    <div>
                      <label className="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">Votre Commentaire</label>
                      <textarea 
                        rows="4"
                        required
                        placeholder="Partagez votre avis sur l'efficacité, le goût, ou la qualité du complément..."
                        value={newReview.content}
                        onChange={(e) => setNewReview({ ...newReview, content: e.target.value })}
                        className="w-full bg-white border border-gray-200 p-5 rounded-2xl text-sm font-medium text-gray-800 placeholder-gray-400 focus:outline-none focus:border-bionova-red focus:ring-4 focus:ring-bionova-red/5 transition-all duration-300 resize-none shadow-sm"
                      ></textarea>
                    </div>

                    <button 
                      type="submit"
                      className="w-full py-4 font-bold uppercase tracking-wider rounded-2xl text-sm text-white bg-[#e4002b] hover:bg-gray-900 transition-all cursor-pointer shadow-lg hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 duration-300"
                    >
                      Publier mon avis
                    </button>
                  </form>
                )}
              </div>
            )}

            {/* Liste des avis : 3 blocs côte à côte sur une ligne */}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              {reviewsList.map((review) => (
                <div 
                  key={review.id} 
                  className="bg-white border border-gray-100 rounded-3xl p-9 shadow-sm hover:shadow-lg hover:border-gray-200 transition-all duration-300 flex flex-col"
                >
                  <div className="flex items-start justify-between mb-3 gap-2">
                    <div>
                      <p className="font-bold text-gray-900 text-[15px] leading-tight">{review.name}</p>
                      <p className="text-xs font-semibold text-gray-400 mt-1">{review.date}</p>
                    </div>
                  </div>

                  {/* Étoiles de la note individuelle */}
                  <div className="flex items-center space-x-0.5 mb-3">
                    {[...Array(5)].map((_, i) => (
                      <StarIcon key={i} className={`w-3.5 h-3.5 ${i < review.rating ? 'text-yellow-400 fill-yellow-400' : 'text-gray-200'}`} />
                    ))}
                  </div>

                  <h5 className="font-bold text-gray-900 text-sm sm:text-base mb-1.5">{review.title}</h5>
                  <p className="text-gray-600/90 text-sm leading-relaxed font-medium flex-1">{review.content}</p>
                </div>
              ))}
            </div>

          </div>
        </div>
        
        {/* ==========================================
            NOUVELLE SECTION : ON VOUS RECOMMANDE AUSSI
            ========================================== */}
        {recommendedProducts.length > 0 && (
          <div className="mt-24 pt-20 border-t border-gray-150">
            <div className="flex flex-col md:flex-row justify-between items-center mb-12">
              <h3 className="font-display text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight text-center md:text-left">
                ON VOUS RECOMMANDE AUSSI !
              </h3>
            </div>
            
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
              {recommendedProducts.map(recommendedProduct => (
                <ProductCard 
                  key={recommendedProduct.id} 
                  product={recommendedProduct} 
                  onAddToCart={onAddToCart} 
                  onClick={onProductClick} 
                />
              ))}
            </div>
          </div>
        )}
      </div>
    </div>
  );
};