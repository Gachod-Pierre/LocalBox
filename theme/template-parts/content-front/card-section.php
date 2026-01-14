<section id="carte-france"
    class="relative w-full h-[100vh] bg-[#EBA440] overflow-hidden flex items-center">

    <div class="container mx-auto px-6 h-full pb-[140px] relative z-20 box-border">
        <div class="flex flex-col md:flex-row items-center pb-10 justify-between gap-10 h-full min-h-0">

            <!-- 🗺️ Carte de France (au-dessus sur mobile) -->
            <div class="w-full md:w-1/2 h-full min-h-0 flex justify-center items-center order-1 md:order-none">
                <div class="w-full max-w-[700px] h-full min-h-0 flex items-center justify-center overflow-hidden">
                    <!-- ✅ on force le SVG inline à rentrer dans la boîte -->
                    <div class="w-full h-full min-h-0
                [&_svg]:w-full [&_svg]:h-full
                [&_svg]:max-h-full [&_svg]:block">
                        <?php get_template_part('template-parts/svg/france-map'); ?>
                    </div>
                </div>
            </div>

            <!-- 🛝 Bloc "box région" (en dessous sur mobile) -->
            <div class="w-full md:w-1/2 h-full min-h-0 flex items-center justify-center order-2 md:order-none">

                <!-- wrapper -->
                <div class="relative w-full max-w-xl">

                    <!-- Mascotte de la région -->
                    <img
                        id="region-mascotte"
                        src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-cheese.svg"
                        class="region-mascotte w-[clamp(150px,20vw,250px)] mx-auto block relative z-10"
                        alt="Mascotte Occitanie">

                    <!-- Contenu qui remonte sur la box -->
                    <div class="relative z-20 -mt-8 md:-mt-14">

                        <h2 id="region-title" class="mb-4 font-extrabold leading-none text-4xl md:text-5xl lg:text-6xl tracking-tight text-black uppercase">
                            OCCITANIE
                        </h2>

                        <p id="region-description" class="mb-6 text-lg md:text-xl text-black">
                            Découvrez l’Occitanie, une région entre mer et montagne où se mêlent patrimoine,
                            gastronomie et art de vivre du Sud.
                        </p>

                        <a id="region-link" href="#"
                            class="inline-flex items-center gap-4 bg-black text-white font-semibold px-8 py-4 rounded-full w-fit">
                            VOIR CETTE BOX
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/15">
                                →
                            </span>
                        </a>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- 🌊 VAGUE EN BAS -->
    <div class="absolute bottom-[-1px] left-0 w-full overflow-hidden pointer-events-none z-10 back">
        <svg class="w-full h-auto" viewBox="0 0 1440 140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0,40 C300,-10 600,120 900,40 C1200,-20 1440,40 1440,40 L1440,140 L0,140 Z"
                fill="#F7F3F3"></path>
        </svg>
    </div>

        <!-- Interaction carte de France: mise à jour du titre, description et liens -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const section = document.getElementById('carte-france');
                if (!section) return;
                const titleEl = section.querySelector('#region-title');
                const descEl = section.querySelector('#region-description');
                const linkEl = section.querySelector('#region-link');
                const mascotteImg = section.querySelector('#region-mascotte');
                const svgGroup = section.querySelector('.france-card');
                if (!titleEl || !linkEl || !svgGroup) return;

                const defaults = {
                    title: titleEl.textContent.trim(),
                    description: descEl ? descEl.textContent.trim() : '',
                    link: linkEl.getAttribute('href') || '#',
                    mascotte: mascotteImg ? mascotteImg.getAttribute('src') : ''
                };

                const regionMap = {
                    'corse': {
                        name: 'Corse',
                        url: 'http://localbox.local/product/box-corse/',
                        description: 'Île de caractère, la Corse offre des saveurs authentiques entre mer turquoise et montagnes sauvages.',
                        mascotte: 'mascotte-jambon.svg'
                    },
                    'hauts-de-france': {
                        name: 'Hauts-de-France',
                        url: 'http://localbox.local/product/box-hauts-de-france/',
                        description: 'Terre de convivialité, entre estaminets, produits gourmands et patrimoine industriel réinventé.',
                        mascotte: 'mascotte-wafflefull.svg'
                    },
                    'normandie': {
                        name: 'Normandie',
                        url: 'http://localbox.local/product/box-normandie/',
                        description: 'Falaises, vergers et savoir-faire laitier : une région généreuse et authentique.',
                        mascotte: 'mascotte-cannele.svg'
                    },
                    'nouvelle-aquitaine': {
                        name: 'Nouvelle-Aquitaine',
                        url: 'http://localbox.local/product/box-nouvelle-aquitaine/',
                        description: 'Entre océan et vignobles, des produits de terroir raffinés et une douceur de vivre.',
                        mascotte: 'mascotte-wine.svg'
                    },
                    'pays-de-la-loire': {
                        name: 'Pays de la Loire',
                        url: 'http://localbox.local/product/box-pays-de-la-loire/',
                        description: 'Châteaux, littoral et artisans passionnés : une sélection élégante et gourmande.',
                        mascotte: 'mascotte-wafflefull.svg'
                    },
                    'occitanie': {
                        name: 'Occitanie',
                        url: 'http://localbox.local/product/box-occitanie',
                        description: 'Entre mer et montagne, un art de vivre solaire mêlant patrimoine et gastronomie du Sud.',
                        mascotte: 'mascotte-saucisse.svg'
                    },
                    // Le SVG utilise "provence-alpes-cotes-azur"
                    'provence-alpes-cotes-azur': {
                        name: 'Provence-Alpes-Côte d’Azur',
                        url: 'http://localbox.local/product/box-provence-alpes-cote-dazur/',
                        description: 'Parfums de garrigue, huile d\'olive et douceurs ensoleillées : l\'esprit Méditerranée.',
                        mascotte: 'mascotte-oil.svg'
                    },
                    'auvergne-rhone-alpes': {
                        name: 'Auvergne-Rhône-Alpes',
                        url: 'http://localbox.local/product/box-auvergne-rhone-alpes/',
                        description: 'Massifs et lacs, fromages et charcuteries : une région de caractère et de traditions.',
                        mascotte: 'mascotte-noix.svg'
                    },
                    'bourgogne-franche-comte': {
                        name: 'Bourgogne-Franche-Comté',
                        url: 'http://localbox.local/product/box-bourgogne-franche-comte/',
                        description: 'Vins, moutardes et savoir-faire ancestral : une élégance gourmande au naturel.',
                        mascotte: 'mascotte-wine.svg'
                    },
                    'bretagne': {
                        name: 'Bretagne',
                        url: 'http://localbox.local/product/box-bretagne/',
                        description: 'Vents salés, crêpes et caramel au beurre : le goût de la mer et du terroir.',
                        mascotte: 'mascotte-crepe.svg'
                    },
                    'centre-val-de-loire': {
                        name: 'Centre-Val de Loire',
                        url: 'http://localbox.local/product/box-centre-val-de-loire/',
                        description: 'Châteaux, rivières et gourmandises délicates : une balade poétique au cœur de la France.',
                        mascotte: 'mascotte-macaron.svg'
                    },
                    // Le SVG utilise "grandest"
                    'grandest': {
                        name: 'Grand Est',
                        url: 'http://localbox.local/product/box-grand-est/',
                        description: 'Cités historiques, vignobles et spécialités généreuses : un mélange d\'arts et de saveurs.',
                        mascotte: 'mascotte-bretzel.svg'
                    },
                    // Pas d’URL fournie pour IDF
                    'ile-de-france': {
                        name: 'Île-de-France',
                        url: '#',
                        description: 'Capitale créative et marchés gourmands : un carrefour de cultures et de goûts.',
                        mascotte: 'mascotte-macaron.svg'
                    }
                };

                // Rendre chaque région cliquable et mettre à jour à la volée
                svgGroup.querySelectorAll('.region').forEach(function (path) {
                    const classes = Array.from(path.classList);
                    const slug = classes.find(c => c !== 'region') || '';
                    const info = regionMap[slug];
                    const anchor = path.closest('a');
                    if (anchor) anchor.setAttribute('href', (info && info.url) ? info.url : '#');

                    path.addEventListener('mouseenter', function () {
                        if (!info) return;
                        titleEl.textContent = info.name;
                        linkEl.setAttribute('href', info.url || '#');
                        if (descEl && info.description) descEl.textContent = info.description;
                        if (mascotteImg && info.mascotte) {
                            mascotteImg.setAttribute('src', '<?php echo get_template_directory_uri(); ?>/assets/svg/' + info.mascotte);
                            mascotteImg.setAttribute('alt', 'Mascotte ' + info.name);
                        }
                    });
                });

                // Reset sur sortie de la carte
                const svgRoot = svgGroup.closest('svg') || svgGroup;
                svgRoot.addEventListener('mouseleave', function () {
                    titleEl.textContent = defaults.title;
                    linkEl.setAttribute('href', defaults.link);
                    if (descEl && defaults.description) descEl.textContent = defaults.description;
                    if (mascotteImg && defaults.mascotte) mascotteImg.setAttribute('src', defaults.mascotte);
                });
            });
        </script>

</section>
