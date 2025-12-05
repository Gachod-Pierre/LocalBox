<section id="hero"
    class="relative w-full h-[calc(100vh-64px)] overflow-hidden flex flex-col items-center justify-center bg-[#f4f0ef]">

    <!-- 🟦 MASCOTTE HAUT GAUCHE -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-cheese.svg"
        class="mascotte mascotte-tl
               absolute top-0 left-[-5vw] md:left-6
               w-[clamp(130px,18vw,400px)]
               aspect-[953/1073] object-contain"
        alt="Mascotte fromage">

    <!-- 🟩 MASCOTTE HAUT DROITE -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-oil.svg"
        class="mascotte mascotte-tr
               absolute top-0 right-[-7vw] md:right-6
               w-[clamp(130px,18vw,400px)]
               aspect-[1060/1600] object-contain"
        alt="Mascotte huile">


    <div id="hero-content" class="flex flex-col items-center text-center">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/main-box.svg" 
            class="main-box w-[clamp(250px,25vw,500px)]"
            alt="Box">

        <h1 class="hero-title text-center font-extrabold leading-none text-4xl md:text-5xl lg:text-6xl tracking-tight text-black">
            LES BOX DE<br>VOS RÉGIONS<br>PRÉFÉRÉES
        </h1>

        <p class="hero-subtitle mt-4 text-center text-lg md:text-xl text-gray-700">
            Découvrez les produits de nos belles régions françaises
        </p>
    </div>


    <!-- 🟥 MASCOTTE BAS GAUCHE -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-wine.svg"
        class="mascotte mascotte-bl
               absolute bottom-[-7vh] md:bottom-0 left-[-5vw]
               w-[clamp(150px,23vw,400px)]
               aspect-[1192/1705] object-contain"
        alt="Mascotte vin">

    <!-- 🟨 MASCOTTE BAS DROITE -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-macaron.svg"
        class="mascotte mascotte-br
               absolute bottom-[-7vh] right-[-7vw]
               w-[clamp(150px,23vw,400px)]
               aspect-[1072/1153] object-contain"
        alt="Mascotte macaron">

</section>
