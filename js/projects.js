/**
 * projects.js — Projects Horizontal Parallax Scroll
 * Yuccabe Planters Static Site
 */

document.addEventListener('DOMContentLoaded', () => {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
    
    gsap.registerPlugin(ScrollTrigger);

    const containerRef = document.querySelector('.parallax-slider');
    const spacerRef = document.querySelector('.projects-spacer');
    const arrows = document.querySelectorAll('.arrow');

    if (window.innerWidth > 768 && containerRef && spacerRef) {
        const panels = containerRef.querySelectorAll(".parallax-item");
        const totalPanels = panels.length;
        
        // Make the spacer tall enough to allow scrolling through all panels horizontally
        spacerRef.style.height = `${containerRef.scrollWidth}px`;

        // Main horizontal scroll
        const horizontalScroll = gsap.to(containerRef, {
            x: () => -(containerRef.scrollWidth - window.innerWidth),
            ease: "none",
            scrollTrigger: {
                trigger: ".parallax-slider-wrapper",
                pin: true,
                scrub: 1,
                end: () => `+=${containerRef.scrollWidth} bottom`,
            },
        });

        // Background parallax effect
        panels.forEach((panel) => {
            const bg = panel.querySelector(".parallax-img");
            if (bg) {
                gsap.to(bg, {
                    x: -100,
                    ease: "none",
                    scrollTrigger: {
                        trigger: panel,
                        containerAnimation: horizontalScroll,
                        start: "left 10%",
                        end: "+=3800",
                        scrub: true,
                    },
                });
            }
        });

        // Bounce arrows
        arrows.forEach((arrow, index) => {
            gsap.to(arrow, {
                y: 12,
                duration: 0.8,
                ease: "power1.inOut",
                yoyo: true,
                repeat: -1,
                delay: index * 0.35,
            });
        });
    } else {
        // Fallback for mobile (reset any weird positioning)
        if (spacerRef) spacerRef.style.display = 'none';
        if (containerRef) {
            containerRef.style.flexDirection = 'column';
            containerRef.querySelectorAll('.parallax-item').forEach(panel => {
                panel.style.minHeight = '100vh';
                panel.style.width = '100%';
            });
        }
    }
    
    // Refresh ScrollTrigger after setup
    ScrollTrigger.refresh();
});
