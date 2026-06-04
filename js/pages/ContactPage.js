/* ============================================================
   BIONOVA — Page: ContactPage
   VERSION: 20260514
   Depends on: ShieldIcon, TruckIcon
   ============================================================ */

const ContactPage = () => {
  const [status, setStatus] = React.useState('');
  const handleSubmit = (e) => {
    e.preventDefault();
    setStatus("Message envoyé avec succès ! Notre équipe d'experts vous répondra sous 24h.");
    e.target.reset();
    setTimeout(() => setStatus(''), 5000);
  };

  return (
    <div className="pt-28 pb-28 bg-gray-50 min-h-screen">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-16">
          <h2 className="text-sm text-bionova-red font-bold tracking-widest uppercase mb-3">Support &amp; Expertise</h2>
          <h1 className="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6">Contactez-nous</h1>
          <p className="text-xl text-gray-500 max-w-2xl mx-auto leading-relaxed">Besoin d'un conseil personnalisé ou d'une information sur votre commande ?</p>
        </div>

        {/* Quick contact options */}
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
          <a href="mailto:contact@bionova.tn" className="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all text-center group cursor-pointer">
            <div className="w-14 h-14 rounded-2xl bg-bionova-red/5 flex items-center justify-center mx-auto mb-4 group-hover:bg-bionova-red/10 transition-colors">
              <svg className="w-6 h-6 text-bionova-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
            </div>
            <h3 className="font-bold text-gray-900 mb-1">Email</h3>
            <p className="text-sm text-gray-500">contact@bionova.tn</p>
          </a>
          <a href="tel:+21671000000" className="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all text-center group cursor-pointer">
            <div className="w-14 h-14 rounded-2xl bg-bionova-red/5 flex items-center justify-center mx-auto mb-4 group-hover:bg-bionova-red/10 transition-colors">
              <svg className="w-6 h-6 text-bionova-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
            </div>
            <h3 className="font-bold text-gray-900 mb-1">Téléphone</h3>
            <p className="text-sm text-gray-500">+216 71 000 000</p>
          </a>
          <a href="https://wa.me/21671000000" target="_blank" rel="noopener noreferrer" className="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all text-center group cursor-pointer">
            <div className="w-14 h-14 rounded-2xl bg-[#25D366]/10 flex items-center justify-center mx-auto mb-4 group-hover:bg-[#25D366]/20 transition-colors">
              <svg className="w-6 h-6 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            </div>
            <h3 className="font-bold text-gray-900 mb-1">WhatsApp</h3>
            <p className="text-sm text-gray-500">Réponse immédiate</p>
          </a>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16">
          <div className="bg-white p-5 sm:p-8 md:p-10 lg:p-14 rounded-2xl sm:rounded-[3rem] shadow-xl border border-gray-100">
            {status && (
              <div className="mb-8 p-5 sm:p-6 rounded-2xl bg-green-50 border border-green-100 shadow-sm">
                <p className="text-base sm:text-lg font-bold text-green-800 text-center flex items-center justify-center"><ShieldIcon className="w-6 h-6 mr-2 shrink-0" />{status}</p>
              </div>
            )}
            <form onSubmit={handleSubmit} className="space-y-6 sm:space-y-8">
              <div className="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
                <div>
                  <label htmlFor="contact-name" className="block text-sm sm:text-base font-bold text-gray-700 uppercase tracking-widest mb-2 sm:mb-3">Nom complet</label>
                  <input id="contact-name" type="text" required className="py-4 sm:py-5 px-5 sm:px-6 block w-full bg-gray-50 border border-transparent focus:bg-white focus:border-medical-blue focus:ring-2 focus:ring-medical-blue/20 rounded-2xl text-base sm:text-lg text-gray-900 font-medium transition-all outline-none placeholder:text-gray-400 placeholder:text-base" placeholder="Jean Dupont" />
                </div>
                <div>
                  <label htmlFor="contact-email" className="block text-sm sm:text-base font-bold text-gray-700 uppercase tracking-widest mb-2 sm:mb-3">Email</label>
                  <input id="contact-email" type="email" required className="py-4 sm:py-5 px-5 sm:px-6 block w-full bg-gray-50 border border-transparent focus:bg-white focus:border-medical-blue focus:ring-2 focus:ring-medical-blue/20 rounded-2xl text-base sm:text-lg text-gray-900 font-medium transition-all outline-none placeholder:text-gray-400 placeholder:text-base" placeholder="jean@exemple.com" />
                </div>
              </div>
              <div>
                <label htmlFor="contact-subject" className="block text-sm sm:text-base font-bold text-gray-700 uppercase tracking-widest mb-2 sm:mb-3">Sujet</label>
                <select id="contact-subject" required className="py-4 sm:py-5 px-5 sm:px-6 block w-full bg-gray-50 border border-transparent focus:bg-white focus:border-medical-blue focus:ring-2 focus:ring-medical-blue/20 rounded-2xl text-base sm:text-lg text-gray-900 font-medium transition-all outline-none appearance-none cursor-pointer">
                  <option value="">Sélectionnez un sujet</option>
                  <option value="conseil">Conseil produit</option>
                  <option value="suivi">Suivi de commande</option>
                  <option value="partenariat">Partenariat / B2B</option>
                  <option value="autre">Autre demande</option>
                </select>
              </div>
              <div>
                <label htmlFor="contact-message" className="block text-sm sm:text-base font-bold text-gray-700 uppercase tracking-widest mb-2 sm:mb-3">Message</label>
                <textarea id="contact-message" rows="5" required className="py-4 sm:py-5 px-5 sm:px-6 block w-full bg-gray-50 border border-transparent focus:bg-white focus:border-medical-blue focus:ring-2 focus:ring-medical-blue/20 rounded-2xl text-base sm:text-lg text-gray-900 font-medium transition-all outline-none resize-none placeholder:text-gray-400 placeholder:text-base" placeholder="Votre message..."></textarea>
              </div>
              <button type="submit" className="w-full py-5 sm:py-6 px-8 shadow-lg text-base sm:text-xl font-bold rounded-2xl text-white bg-bionova-red hover:bg-gray-900 transition-all transform hover:-translate-y-1 cursor-pointer uppercase tracking-wider">Envoyer le message</button>
            </form>
          </div>
          <div className="flex flex-col h-full space-y-8">
            <div className="bg-white p-10 rounded-[3rem] shadow-sm border border-gray-100">
              <h3 className="font-display text-2xl font-bold mb-6">Nos Coordonnées</h3>
              <div className="space-y-4">
                <p className="text-gray-500 flex items-center"><TruckIcon className="w-5 h-5 mr-3 text-bionova-red shrink-0" /> 123 Avenue de la Santé, Tunis, Tunisie</p>
                <p className="text-gray-500 flex items-center">
                  <svg className="w-5 h-5 mr-3 text-bionova-red shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  Lun - Sam : 8h00 — 18h00
                </p>
              </div>
            </div>
            {/* Google Maps Embed */}
            <div className="flex-grow rounded-[3rem] overflow-hidden shadow-sm border border-gray-100 min-h-[350px]">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d204089.74912693953!2d10.0!3d36.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd337f5e7ef543%3A0xd671924e714a0275!2sTunis!5e0!3m2!1sfr!2stn!4v1714500000000!5m2!1sfr!2stn"
                width="100%"
                height="100%"
                style={{ border: 0, minHeight: '350px' }}
                allowFullScreen=""
                loading="lazy"
                referrerPolicy="no-referrer-when-downgrade"
                title="Localisation Bionova Tunis"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};
