/**
 * home.js — Home page animations and logic
 * Yuccabe Planters Static Site
 */

function initHome() {
    // 1. Initialize AOS (Animate On Scroll)
    try {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                once: true,
                offset: 100
            });
        }
    } catch (e) {
        console.error("AOS initialization error:", e);
    }

    // 2. GSAP Animations
    try {
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);

            // a) Points Section Horizontal Scroll
            const pointsContainer = document.querySelector(".points-container");
            if (pointsContainer) {
                // Initial states
                gsap.set(pointsContainer, { y: -40, ease: "none" });
                gsap.set(".dotted-line", { y: -40, ease: "none" });

                const screenWidth = window.innerWidth;

                if (screenWidth <= 768) {
                    gsap.set('.how-it-works-heading-item', { x: 10, ease: "none" });
                    gsap.set(".text-16-regularsa", { x: 5, textAlign: "left", ease: "none" });
                } else {
                    gsap.to('.how-it-works-heading-item', {
                        textAlign: "left",
                        x: "-100%",
                        ease: "none",
                        scrollTrigger: {
                            trigger: ".points-section",
                            start: "top 30%",
                            end: "top 10%",
                            scrub: true,
                        },
                    });
                    gsap.to('.text-16-regularsa', {
                        textAlign: "left",
                        x: "-110%",
                        ease: "none",
                        scrollTrigger: {
                            trigger: ".points-section",
                            start: "top 30%",
                            end: "top 10%",
                            scrub: true,
                        },
                    });
                }

                // Horizontal scroll animation
                gsap.to(pointsContainer, {
                    x: () => -(pointsContainer.scrollWidth - window.innerWidth),
                    ease: "none",
                    scrollTrigger: {
                        trigger: ".points-section",
                        start: "top top",
                        end: () => `+=${pointsContainer.scrollWidth - window.innerWidth}`,
                        scrub: true,
                        pin: true,
                        anticipatePin: 1,
                        invalidateOnRefresh: true,
                    },
                });

                // Parallax text inside points section
                gsap.to(".textsdsdd", {
                    right: 100,
                    ease: "none",
                    scrollTrigger: {
                        trigger: ".points-section",
                        start: "top top",
                        end: () => `+=${pointsContainer.scrollWidth - window.innerWidth}`,
                        scrub: true,
                        invalidateOnRefresh: true,
                    },
                });

                // Animate Dotted Line
                gsap.from(".dotted-line", {
                    scaleX: 0,
                    transformOrigin: "left",
                    duration: 1,
                    scrollTrigger: {
                        trigger: ".points-section",
                        start: "top 10%",
                        end: "top 50%",
                        toggleActions: "play none none none",
                    },
                });
            }

            // b) Clients Image Zoom
            const sdfImg = document.querySelector(".sdf-img");
            if (sdfImg) {
                const screenWidth = window.innerWidth;
                gsap.set(sdfImg, { scale: screenWidth <= 480 ? 7 : 2.7 });

                gsap.to(sdfImg, {
                    scale: 1,
                    scrollTrigger: {
                        trigger: ".sdf",
                        start: "top center",
                        end: "+=200px",
                        scrub: true,
                    }
                });
            }
        }
    } catch (e) {
        console.error("GSAP ScrollTrigger error:", e);
    }

    // 3. Responsive Image Change for Clients Section
    try {
        function updateSdfImage() {
            const sdfImg = document.querySelector(".sdf-img");
            if (!sdfImg) return;

            if (window.matchMedia("(max-width: 480px)").matches) {
                sdfImg.src = "/img/TPCUP.jpg";
            } else if (window.matchMedia("(max-width: 768px)").matches) {
                sdfImg.src = "/img/1.jpg"; // Fallback or correct image for tablet
            } else {
                sdfImg.src = "/img/1.jpg"; // Fallback or correct image for desktop
            }
        }
        updateSdfImage();
        window.addEventListener("resize", updateSdfImage);
    } catch (e) {
        console.error("Sdf Image Update error:", e);
    }

    // 4. Initialize Swiper if needed for home
    try {
        if (typeof Swiper !== 'undefined') {
            const productCarousel = document.querySelector('.mySwiperjdf');
            if (productCarousel) {
                new Swiper('.mySwiperjdf', {
                    spaceBetween: 5,
                    slidesPerView: 4,
                    freeMode: true,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        320: { slidesPerView: 2, spaceBetween: 0 },
                        768: { slidesPerView: 3 },
                        1024: { slidesPerView: 2 },
                        1400: { slidesPerView: 4 },
                    }
                });
            }
        }
    } catch (e) {
        console.error("Swiper initialization error:", e);
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initHome);
} else {
    initHome();
}