<?php
/**
 * Page Template: À propos
 *
 * Renders the About page (slug: a-propos) with consistent theme styling.
 * WordPress automatically uses this file for the page with slug `a-propos`.
 *
 * @package _tw
 */

get_header(); ?>

<!-- À PROPOS — Hero stylé -->
<section class="relative w-full bg-[#FF4901] overflow-hidden">
  <div class="container mx-auto px-6 py-20 md:py-28 mb-14">
    <h3 class="text-white text-sm md:text-base font-bold uppercase tracking-wider text-center mb-6">À PROPOS</h3>
    <h1 class="text-white font-black uppercase tracking-tight leading-none text-6xl md:text-8xl lg:text-9xl text-center mb-6">LOCALBOX</h1>
    <p class="max-w-2xl mx-auto text-white text-center text-sm md:text-base">
      LocalBox est une initiative qui valorise les producteurs et artisans de nos régions.
      Nous créons et livrons des box composées de produits locaux, soigneusement sélectionnés pour faire découvrir la richesse et la diversité du terroir français.
      Chaque box raconte une histoire, celle d’un savoir‑faire, d’un goût authentique et d’une passion pour le local.
    </p>
  </div>

  <!-- Bande blanche en bas -->
  <div class="w-full h-20 md:h-24 bg-[#F7F3F3]"></div>

  <!-- Mascottes posées sur la bande blanche -->
  <div class="absolute left-0 right-0 bottom-4 md:bottom-6 flex items-end justify-center gap-6 md:gap-12">
    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/mascotte-wafflefull.svg'); ?>" alt="Mascotte waffle" class="w-28 md:w-40 about-mascotte" />
    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/mascotte-cannele.svg'); ?>" alt="Mascotte cannelé" class="w-28 md:w-40 about-mascotte" />
    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/mascotte-wine.svg'); ?>" alt="Mascotte wine" class="w-28 md:w-40 about-mascotte" />
  </div>
</section>

<!-- Contenu de la page -->
<section class="w-full bg-[#F7F3F3] py-16 relative overflow-hidden">
  <div class="container mx-auto px-6">

    <div class="max-w-3xl text-black text-base md:text-lg">
      <?php
      while (have_posts()) : the_post();
        the_content();
      endwhile;
      ?>
    </div>
  </div>
</section>

<!-- NOS VALEURS -->
<section class="w-full bg-[#F7F3F3] py-16">
  <div class="container mx-auto px-6 grid md:grid-cols-2 gap-10 items-start">
    <div>
      <h3 class="text-black text-[10px] md:text-xs font-bold uppercase tracking-wider mb-4 font-sans">NOS VALEURS</h3>
      <div class="font-heading font-black uppercase tracking-tight leading-[0.9] text-6xl md:text-6xl lg:text-7xl text-black mb-6 about-values">
        <div class="about-values-item">AUTHENTICITÉ,</div>
        <div class="about-values-item">PROXIMITÉ,</div>
        <div class="about-values-item">DURABILITÉ.</div>
      </div>
      <p class="text-black text-sm md:text-base max-w-xl">
        Nous croyons au lien entre le producteur et le consommateur. LocalBox soutient une économie plus juste en mettant en avant les artisans régionaux et en privilégiant les circuits courts. Nous favorisons les produits de qualité, respectueux de l’environnement et du travail humain, afin de promouvoir une consommation responsable et ancrée dans nos territoires.
      </p>
    </div>
    <div class="flex justify-end">
      <img src="<?php echo esc_url('https://images.unsplash.com/photo-1604200657090-ae45994b2451?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); ?>" alt="Photo de box – visuel" class="rounded-2xl w-64 h-48 md:w-96 md:h-72 object-cover" />
    </div>
  </div>

  <!-- Collage + slogan -->
  <div class="container mx-auto px-6 mt-16 relative mb-24">
    <!-- Images placées -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 about-collage">
      <div class="col-span-2 md:col-span-1">
        <img src="<?php echo esc_url('https://images.unsplash.com/photo-1532635224-cf024e66d122?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGJha2VyfGVufDB8fDB8fHww'); ?>" alt="Box 1" class="rounded-2xl w-full h-56 md:h-64 object-cover bg-white about-collage-item" />
      </div>
      <div class="hidden md:block md:col-span-2"></div>
      <div class="col-span-2 md:col-span-1 md:justify-self-end">
        <img src="<?php echo esc_url('https://images.unsplash.com/photo-1519733870-f96bef9bc85f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGJha2VyfGVufDB8fDB8fHww'); ?>" alt="Box 2" class="rounded-2xl w-64 h-48 object-cover bg-white about-collage-item" />
      </div>

      <div class="col-span-2 md:col-start-2 md:col-span-2 justify-self-center">
        <img src="<?php echo esc_url('https://images.unsplash.com/photo-1584048603508-4b31894439a9?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8YnV0Y2hlciUyMHNob3B8ZW58MHx8MHx8fDA%3D'); ?>" alt="Box 4" class="rounded-2xl w-64 h-48 object-cover bg-white about-collage-item" />
      </div>
    </div>

    <!-- Slogan -->
    <div class="mt-10 text-center">
      <div class="font-heading font-black uppercase tracking-tight leading-[0.9] text-6xl md:text-7xl lg:text-8xl text-black about-slogan">
        <div>LA FRANCE DANS</div>
        <div>CHAQUE <span class="text-[#FF4901]">BOX</span></div>
      </div>
    </div>
  </div>
</section>

<!-- NOTRE MISSION -->
<section class="w-full bg-[#F7F3F3] py-16">
  <div class="container mx-auto px-6 grid md:grid-cols-2 gap-10 items-start">
    <!-- Image à gauche -->
    <div>
      <img src="<?php echo esc_url('https://geo.couesnon-marchesdebretagne.fr/wp-content/uploads/sites/2/2020/09/Produits_locaux_1200x600.jpg'); ?>" alt="LocalBox – Notre mission" class="rounded-2xl w-full h-72 md:h-[360px] object-cover bg-white" />
    </div>

    <!-- Texte à droite -->
    <div class="mt-6 md:mt-0 mb-40">
      <h3 class="text-black text-xs md:text-sm font-bold uppercase tracking-wider mb-4 font-sans">NOTRE MISSION</h3>
      <div class="font-heading font-black uppercase tracking-tight leading-[0.9] text-4xl md:text-6xl lg:text-7xl text-black mb-6 about-mission">
        <div class="about-mission-line">VALORISER LE</div>
        <div class="about-mission-line">MEILLEUR DE</div>
        <div class="about-mission-line">NOS RÉGIONS</div>
      </div>
      <p class="text-black text-sm md:text-base max-w-xl font-sans about-mission-text">
        Notre mission est de rendre accessible le meilleur des régions françaises, directement chez vous. En choisissant LocalBox, vous soutenez les producteurs locaux, réduisez l’impact environnemental de vos achats et participez à la redynamisation des économies régionales. Ensemble, faisons du local un réflexe du quotidien.
      </p>
    </div>
  </div>
</section>

<?php get_footer();
