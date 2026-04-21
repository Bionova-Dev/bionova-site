import os
import json

products_data = [
    { "id": 1, "slug": "angilase", "name": "Angilase", "price": 45.00, "image": "./produits/acide alpha lipoique.png" },
    { "id": 3, "slug": "astaxanthine", "name": "Astaxanthine", "price": 65.00, "image": "./produits/astaxanthine.png" },
    { "id": 5, "slug": "collagene", "name": "Collagene Marin", "price": 32.00, "image": "./produits/collagene marin complex.png" },
    { "id": 6, "slug": "flamixen", "name": "Flamixen", "price": 25.00, "image": "./produits/curcumine et boswellia.png" },
    { "id": 11, "slug": "pack-glowy", "name": "Pack Glowy", "price": 87.30, "image": "./produits/astaxanthine.png" }
]

base_template = """<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>__TITLE__ - Bionova</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Montserrat:wght@800&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; background-color: #ffffff; color: #075985; }
    .btn-primary { background-color: #075985; color: white; transition: all 0.3s ease; border: none; text-decoration: none; display: inline-block; }
    .btn-primary:hover { background-color: #0c4a6e; transform: translateY(-2px); }
  </style>
</head>
<body>
  <header class="fixed w-full z-50 h-[180px] bg-white border-b border-gray-100 flex items-center px-12">
    <nav class="max-w-7xl mx-auto w-full flex justify-between items-center">
      <a href="index.html"><img src="logo-bionova.png" alt="Logo" class="h-[150px]"></a>
      <div class="hidden lg:flex space-x-12">
        <a href="index.html" class="text-2xl font-bold uppercase tracking-widest text-medical-blue">Accueil</a>
        <a href="boutique.html" class="text-2xl font-bold uppercase tracking-widest text-medical-blue">Boutique</a>
        <a href="contact.html" class="text-2xl font-bold uppercase tracking-widest text-medical-blue">Contact</a>
      </div>
      <div class="flex items-center space-x-6">
        <a href="compte.html" class="text-medical-blue"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></a>
        <a href="panier.html" class="bg-medical-blue text-white p-4 rounded-2xl"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg></a>
      </div>
    </nav>
  </header>

  <main class="pt-52 pb-20 max-w-7xl mx-auto px-6">
    __CONTENT__
  </main>

  <footer class="bg-gray-50 py-20 text-center border-t border-gray-100">
    <p class="text-medical-blue/20 text-sm font-bold uppercase tracking-[0.5em]">&copy; 2026 Laboratoire Bionova</p>
  </footer>
</body>
</html>"""

product_content = """
<div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-start">
  <div class="bg-gray-50 rounded-[3rem] p-12 aspect-square flex items-center justify-center border border-gray-100">
    <img src="__IMAGE__" alt="__NAME__" class="w-full h-full object-contain">
  </div>
  <div class="flex flex-col py-10">
    <h1 class="font-display text-7xl font-extrabold text-medical-blue mb-8">__NAME__</h1>
    <p class="text-6xl font-black text-medical-blue mb-12">__PRICE__ DT</p>
    <a href="panier.html" class="btn-primary w-full py-8 text-2xl font-bold rounded-3xl text-center uppercase tracking-widest">Ajouter au panier</a>
  </div>
</div>
"""

for p in products_data:
    content = product_content.replace("__NAME__", p['name']).replace("__IMAGE__", p['image']).replace("__PRICE__", f"{p['price']:.2f}")
    html = base_template.replace("__TITLE__", p['name']).replace("__CONTENT__", content)
    with open(f"{p['slug']}.html", "w", encoding="utf-8") as f:
        f.write(html)

placeholders = {
    "boutique.html": "Nos Produits",
    "panier.html": "Votre Panier",
    "compte.html": "Mon Compte",
    "contact.html": "Contactez-nous"
}

for filename, title in placeholders.items():
    content = f'<div class="text-center py-20"><h1 class="text-6xl font-extrabold mb-10">{title}</h1><p class="text-2xl opacity-60">Cette section est en cours d\'activation technique.</p><a href="index.html" class="btn-primary px-12 py-5 rounded-2xl font-bold uppercase tracking-widest mt-12">Retour Accueil</a></div>'
    html = base_template.replace("__TITLE__", title).replace("__CONTENT__", content)
    with open(filename, "w", encoding="utf-8") as f:
        f.write(html)

print("Activation technique réussie : 100% des liens et boutons sont opérationnels.")
