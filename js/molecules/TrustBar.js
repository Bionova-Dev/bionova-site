/* ============================================================
   BIONOVA — Molecule: TrustBar
   VERSION: 20260511
   Depends on: icons.js (WalletIcon, SupportIcon, TruckIcon, TagIcon)
   ============================================================ */

const TrustBar = () => (
  <div className="bg-white border-t border-b border-gray-100 relative z-20">
    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div className="grid grid-cols-2 md:grid-cols-4 gap-4 py-8 sm:py-12">
        {[
          { title: "Paiement à la livraison", subtitle: "Simple et sécurisé", icon: WalletIcon },
          { title: "Service client à l'écoute", subtitle: "Support 7j/7", icon: SupportIcon },
          { title: "Livraison gratuite", subtitle: "Dès 150 DT d'achat", icon: TruckIcon },
          { title: "Meilleur prix garanti", subtitle: "Direct laboratoire", icon: TagIcon },
        ].map((item, idx) => (
          <div key={idx} className="flex flex-col sm:flex-row items-center text-center sm:text-left group cursor-pointer transition-all duration-300 hover:-translate-y-1">
            <div className="mb-4 sm:mb-0 sm:mr-5 p-4 rounded-2xl bg-white border border-gray-100 text-black shadow-sm transition-all duration-300">
              <item.icon className="w-6 h-6" />
            </div>
            <div>
              <h4 className="font-display font-black text-sm text-gray-900 leading-tight uppercase tracking-wider">{item.title}</h4>
              <p className="text-[11px] text-gray-400 font-medium uppercase tracking-widest mt-1">{item.subtitle}</p>
            </div>
          </div>
        ))}
      </div>
    </div>
  </div>
);
