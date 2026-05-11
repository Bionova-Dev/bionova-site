/* ============================================================
   BIONOVA — Atom: InteractiveProductViewer
   VERSION: 20260511
   3D tilt effect on product images
   ============================================================ */

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
    const rotateX = ((y - centerY) / centerY) * -15;
    const rotateY = ((x - centerX) / centerX) * 15;
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
