/**
 * page-load.js — Page load overlay animation
 * Yuccabe Planters Static Site
 */
function initPageLoad() {
  const overlay = document.getElementById('overlay');
  const content = document.getElementById('content');
  if (overlay && content) {
    // The CSS animation runs for ~1.2s; we hide the overlay after 1.4s
    setTimeout(() => {
      overlay.style.display = 'none';
      content.style.opacity = '1';
    }, 1400);
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initPageLoad);
} else {
  initPageLoad();
}
