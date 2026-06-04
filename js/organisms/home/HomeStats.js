/* ============================================================
   BIONOVA — Home Section: Stats
   ============================================================ */

const HomeStats = () => {
  const stats = [
    { value: "15 000+", label: "Clients Satisfaits" },
    { value: "10", label: "Formules Premium" },
    { value: "99%", label: "Taux de Satisfaction" },
    { value: "24", label: "Mois de R&D / Formule" },
  ];

  return (
    <section className="py-16 bg-gray-900 relative overflow-hidden">
      <div className="absolute inset-0 bg-gradient-to-r from-bionova-red/10 to-transparent"></div>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
          {stats.map((stat, i) => (
            <div key={i} className="text-center group">
              <p className="font-display text-3xl sm:text-4xl font-black text-white mb-2 group-hover:text-bionova-red transition-colors">{stat.value}</p>
              <p className="text-gray-400 text-xs font-bold uppercase tracking-widest">{stat.label}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};
