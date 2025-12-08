<section id="hero"
    class="relative w-full h-[calc(100vh-64px)] z-10 bg-[#f4f0ef] flex items-center justify-center">

    <!-- CONTENU DU HERO -->
    <div class="relative text-center flex flex-col items-center pb-28">

        <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/main-box.svg"
            class="main-box relative w-[clamp(250px,25vw,500px)]" alt="Box">

        <h1 class="hero-title font-extrabold leading-none text-4xl md:text-5xl lg:text-6xl tracking-tight text-black mt-4">
            LES BOX DE<br>VOS RÉGIONS<br>PRÉFÉRÉES
        </h1>

        <p class="hero-subtitle mt-4 text-lg md:text-xl text-gray-700">
            Découvrez les produits de nos belles régions françaises
        </p>

    </div>

    <!-- VAGUE -->
    <div class="absolute bottom-[-1px] left-0 w-full overflow-hidden pointer-events-none z-10">
        <svg class="w-full h-auto" viewBox="0 0 1440 140" xmlns="http://www.w3.org/2000/svg">
            <path d="
                M0,40
                C300,-10 600,120 900,40
                C1200,-20 1440,40 1440,40
                L1440,140 L0,140 Z"
                fill="#EBA440">
            </path>
        </svg>
    </div>

</section>

<!-- WRAPPER EXTERNE DES MASCOTTES (au-dessus du hero) -->
<div class="pointer-events-none absolute inset-0 z-10 overflow-visible">

    <!-- MASCOTTE HAUT GAUCHE -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-cheese.svg"
        class="pointer-events-auto mascotte mascotte-tl
               absolute top-[64px] left-[-5vw] md:left-6
               w-[clamp(130px,18vw,400px)]
               aspect-[953/1073] object-contain">

    <!-- MASCOTTE HAUT DROITE -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-oil.svg"
        class="pointer-events-auto mascotte mascotte-tr
               absolute top-[64px] right-[-7vw] md:right-6
               w-[clamp(130px,18vw,400px)]
               aspect-[1060/1600] object-contain">

    <!-- MASCOTTE BAS GAUCHE -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-wine.svg"
        class="pointer-events-auto mascotte mascotte-bl
               absolute bottom-[-7vh] left-[-5vw]
               w-[clamp(150px,23vw,400px)]
               aspect-[1192/1705] object-contain">

    <!-- MASCOTTE BAS DROITE -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-macaron.svg"
        class="pointer-events-auto mascotte mascotte-br
               absolute bottom-[-7vh] right-[-7vw]
               w-[clamp(150px,23vw,400px)]
               aspect-[1072/1153] object-contain">

</div>