/* ============================================================
   BIONOVA — Atom: Accordion
   VERSION: 20260511
   Depends on: icons.js (ChevronDownIcon)
   ============================================================ */

const Accordion = ({ title, content }) => {
  const [isOpen, setIsOpen] = React.useState(false);
  return (
    <div className="border-b border-gray-100 py-5">
      <button className="flex w-full justify-between items-center text-left focus:outline-none group" onClick={() => setIsOpen(!isOpen)}>
        <span className="font-display font-semibold text-lg text-gray-900 group-hover:text-bionova-red transition-colors">{title}</span>
        <div className={`p-2 rounded-full bg-gray-50 group-hover:bg-blue-50 transition-colors`}>
          <ChevronDownIcon className={`w-5 h-5 text-gray-500 group-hover:text-bionova-red transition-transform duration-300 ${isOpen ? 'rotate-180' : ''}`} />
        </div>
      </button>
      <div className={`mt-2 text-gray-600 leading-relaxed overflow-hidden transition-all duration-300 ${isOpen ? 'max-h-96 opacity-100 mb-4' : 'max-h-0 opacity-0'}`}>
        <p className="pr-12">{content}</p>
      </div>
    </div>
  );
};
