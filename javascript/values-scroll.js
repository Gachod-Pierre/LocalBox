/**
 * Effet de scroll pour la section valeurs
 *
 * Ce fichier gère l'animation des titres et images lors du scroll
 * dans la section values-section.php
 */

document.addEventListener('DOMContentLoaded', function() {
    const titles = document.querySelectorAll('.values-title');

    if (titles.length === 0) return;

    // Les couleurs pour chaque titre
    const colors = [
        '#EBA953', // Sandy Orange
        '#C6B7E1', // Light Lavender
        '#FE4C05', // Bright Orange
        '#C82554', // Raspberry Pink
        '#1A4C41', // Dark Forest Green
        '#EBA953'  // Sandy Orange (pour le 6ème titre)
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
