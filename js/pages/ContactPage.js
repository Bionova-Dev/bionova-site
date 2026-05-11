/* ============================================================
   BIONOVA — Page: ContactPage
   VERSION: 20260511
   Depends on: ShieldIcon, TruckIcon
   ============================================================ */

const ContactPage = () => {
  const [status, setStatus] = React.useState('');
  const handleSubmit = (e) => {
    e.preventDefault();
    setStatus("Message envoyé avec succès ! Notre équipe d'experts vous répondra rapidement.");
    e.target.reset();
    setTimeout(() => setStatus(''), 5000);
  };

  return (
    <div className="pt-32 pb-32 bg-gray-50 min-h-screen">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-20">
          <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Support &amp; Expertise</h2>
          <h1 className="font-display text-5xl font-extrabold text-gray-900 mb-6">Contactez-nous</h1>
          <p className="text-xl text-gray-500 max-w-2xl mx-auto leading-relaxed">Besoin d'un conseil personnalisé ou d'une information sur votre commande ?</p>
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
          <div className="flex flex-col h-full space-y-10">
            <div className="bg-white p-10 rounded-[3rem] shadow-sm border border-gray-100">
              <h3 className="font-display text-2xl font-bold mb-6">Nos Coordonnées</h3>
              <p className="text-gray-500 mb-4 flex items-center"><TruckIcon className="w-5 h-5 mr-3 text-bionova-red" /> 123 Avenue de la Santé, Tunis, Tunisie</p>
              <p className="text-gray-500 mb-4 flex items-center"><svg className="w-5 h-5 mr-3 text-bionova-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg> contact@bionova.tn</p>
              <p className="text-gray-500 flex items-center"><svg className="w-5 h-5 mr-3 text-bionova-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg> +216 71 000 000</p>
            </div>
            <div className="flex-grow bg-gray-200 rounded-[3rem] overflow-hidden relative shadow-inner border border-gray-300 min-h-[300px]">
              <div className="absolute inset-0 flex flex-col items-center justify-center text-gray-500">
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
