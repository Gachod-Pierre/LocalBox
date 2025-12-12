/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

// Effet de scroll pour les titres de la section valeurs
document.addEventListener('DOMContentLoaded', function() {
    const titles = document.querySelectorAll('.values-title');

    if (titles.length === 0) return;

    // Les couleurs pour chaque titre
    const colors = [
        '#EDAE57',
        '#C6B7E1',
        '#FE4C05',
        '#C82554',
        '#1A4C41',
        '#EBA953'
    ];

    const images = document.querySelectorAll('.values-image');
    let lastActiveIndex = -1;

    function updateTitlesColor() {
        const scrollPosition = window.scrollY + window.innerHeight / 2;

        titles.forEach((title, index) => {
            const titleTop = title.offsetTop;
            const titleBottom = titleTop + title.offsetHeight;

            // Si le titre est dans la zone visible
            if (scrollPosition >= titleTop && scrollPosition <= titleBottom) {
                if (lastActiveIndex !== index) {
                    // Retirer la couleur de tous les titres
                    titles.forEach(t => {
                        t.style.color = '';
                    });

                    // Cacher toutes les images
                    images.forEach(img => {
                        img.style.opacity = '0';
                    });

                    // Appliquer la couleur au titre actif
                    title.style.color = colors[index];

                    // Afficher l'image correspondante
                    if (images[index]) {
                        images[index].style.opacity = '1';
                    }

                    lastActiveIndex = index;
                }
            }
        });
    }

    // Écouter le scroll
    window.addEventListener('scroll', updateTitlesColor);

    // Initialiser au chargement
    updateTitlesColor();
});
