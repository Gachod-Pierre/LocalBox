const gsap = window.gsap;
const ScrollTrigger = window.ScrollTrigger;

gsap.registerPlugin(ScrollTrigger);


/* ---------------------------------------------------
 * ✨ 1. ANIMATION D'ENTRÉE
 * --------------------------------------------------- */

const introTL = gsap.timeline({
    defaults: { ease: "power3.out", duration: 1 }
});

introTL
.from(".mascotte", {
    opacity: 0,
    scale: 0.8,
    stagger: 0.15
})
.from(".main-box", {
    opacity: 0,
    scale: 0.8
}, "-=0.6")
.from(".hero-title", {
    opacity: 0,
    scale: 0.9
}, "-=0.4")
.from(".hero-subtitle", {
    opacity: 0,
    y: 20
}, "-=0.6");



/* ---------------------------------------------------
 * ✨ 2. PARALLAX (maintenant sans aucun reset)
 * --------------------------------------------------- */

function initParallax() {

    let mm = gsap.matchMedia();

    /* ---------------------------------------------------
     * 🖥️ DESKTOP — ton parallax EXACT (inchangé)
     * --------------------------------------------------- */
    mm.add("(min-width: 768px)", () => {

        gsap.to(".mascotte-tl", {
            y: -100,
            ease: "none",
            scrollTrigger: {
                trigger: "#hero",
                start: "top top",
                scrub: true
            }
        });

        gsap.to(".mascotte-tr", {
            y: 100,
            ease: "none",
            scrollTrigger: {
                trigger: "#hero",
                start: "top top",
                scrub: true
            }
        });

        gsap.to(".mascotte-bl", {
            y: 110,
            ease: "none",
            scrollTrigger: {
                trigger: "#hero",
                start: "top top",
                scrub: true
            }
        });

        gsap.to(".mascotte-br", {
            y: -90,
            ease: "none",
            scrollTrigger: {
                trigger: "#hero",
                start: "top top",
                scrub: true
            }
        });
    });


    /* ---------------------------------------------------
     * 📱 MOBILE — parallax allégé (≈ 70% plus doux)
     * --------------------------------------------------- */
    mm.add("(max-width: 767px)", () => {

        gsap.to(".mascotte-tl", {
            y: -30,
            ease: "none",
            scrollTrigger: {
                trigger: "#hero",
                start: "top top",
                scrub: true
            }
        });

        gsap.to(".mascotte-tr", {
            y: 30,
            ease: "none",
            scrollTrigger: {
                trigger: "#hero",
                start: "top top",
                scrub: true
            }
        });

        gsap.to(".mascotte-bl", {
            y: 35,
            ease: "none",
            scrollTrigger: {
                trigger: "#hero",
                start: "top top",
                scrub: true
            }
        });

        gsap.to(".mascotte-br", {
            y: -25,
            ease: "none",
            scrollTrigger: {
                trigger: "#hero",
                start: "top top",
                scrub: true
            }
        });
    });

    ScrollTrigger.refresh();
}

introTL.eventCallback("onComplete", initParallax);




/* ---------------------------------------------------
 * ✨ 3. Hover box animations
 * --------------------------------------------------- */

const box = document.querySelector(".main-box");

/* ---------------------------
   1. Floating Animation (loop)
---------------------------- */
const floatTL = gsap.timeline({
    repeat: -1,
    yoyo: true,
    paused: false
});

floatTL.to(box, {
    y: -10,
    duration: 2.5,
    ease: "power1.inOut"
});


/* ---------------------------
   2. Hover Animation (scale + rotation)
---------------------------- */
const hoverTL = gsap.timeline({ paused: true });

hoverTL.to(box, {
    scale: 1.07,
    rotateY: 15,
    rotateX: -8,
    duration: 0.5,
    ease: "power3.out"
});


/* ---------------------------
   3. Magnetic Effect (mousemove)
---------------------------- */
let magnetEnabled = false;

box.addEventListener("mousemove", (e) => {
    if (!magnetEnabled) return;

    const rect = box.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width - 0.5) * 25; // 25 = plus fort
    const y = ((e.clientY - rect.top) / rect.height - 0.5) * 25;

    gsap.to(box, {
        rotateY: x,
        rotateX: -y,
        duration: 0.25,
        overwrite: "auto", // évite les conflits !
        ease: "power2.out"
    });
});


/* ---------------------------
   4. Event listeners
---------------------------- */
box.addEventListener("mouseenter", () => {
    floatTL.pause();      // stop floating
    hoverTL.play();       // start hover animation
    magnetEnabled = true; // enable magnetic
});

box.addEventListener("mouseleave", () => {
    magnetEnabled = false;

    // Reset magnetic rotation
    gsap.to(box, {
        rotateX: 0,
        rotateY: 0,
        duration: 0.4,
        ease: "power2.out"
    });

    hoverTL.reverse(); // return scale + rotate effect
    floatTL.play();    // resume floating
});






/* ---------------------------------------------------
 * ✨ 4. Mascottes hover
 * --------------------------------------------------- */

document.querySelectorAll(".mascotte").forEach((m) => {
    m.addEventListener("mouseenter", () => {
        gsap.to(m, {
            scale: 1.08,
            duration: 0.25,
            ease: "power1.out"
        });
    });

    m.addEventListener("mouseleave", () => {
        gsap.to(m, {
            scale: 1,
            duration: 0.3,
            ease: "power1.out"
        });
    });
});
