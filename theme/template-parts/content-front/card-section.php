<section id="carte-france" class="relative w-full h-[calc(100vh-64px)] bg-[#EBA440] flex items-center">

    <div class="container mx-auto px-6">
        <div class="flex items-center justify-between gap-10 h-full">

            <!-- 🗺️ Carte de France -->
            <div class="w-1/2 flex justify-center">
                <div class="w-full max-w-[700px]">
                    <?php get_template_part('template-parts/svg/france-map'); ?>
                </div>
            </div>

            <!-- 🛝 Futur carrousel -->
            <div class="w-1/2 flex flex-col justify-center text-black">

                <p class="font-black text-5xl leading-tight mb-4">
                    OCCITANIE
                </p>

                <p class="max-w-md mb-6">
                    Découvrez l’Occitanie, une région entre mer et montagne où se mêlent patrimoine,
                    gastronomie et art de vivre du Sud.
                </p>

                <p class="py-4 text-xl font-semibold">
                    Futur carrousel ici
                </p>

            </div>

        </div>
    </div>

</section>