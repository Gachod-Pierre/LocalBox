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

                    <!-- Image de la box -->
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/svg/main-box.svg"
                        class="main-box w-[clamp(220px,25vw,360px)] mx-auto block relative z-10"
                        alt="Box Occitanie">

                    <!-- Contenu qui remonte sur la box -->
                    <div class="relative z-20 -mt-8 md:-mt-14">

                        <h2 class="mb-4 font-extrabold leading-none text-4xl md:text-5xl lg:text-6xl tracking-tight text-black">
                            OCCITANIE
                        </h2>

                        <p class="mb-6 text-lg md:text-xl text-black">
                            Découvrez l’Occitanie, une région entre mer et montagne où se mêlent patrimoine,
                            gastronomie et art de vivre du Sud.
                        </p>

                        <a href="#"
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

</section>