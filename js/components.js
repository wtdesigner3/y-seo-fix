/**
 * components.js — Shared header, footer, cursor, categories
 * Yuccabe Planters Static Site
 */

const API_BASE = 'https://yuccabeplanters.co.in/cms_forY';

/* ── SHARED LAYOUT IS STATICALLY INCLUDED IN EACH HTML FILE ── */

/* ── INIT CURSOR ─────────────────────── */
function initCursor() {
  // Cursor logic removed
}

/* ── INIT MOBILE SUBMENU ─────────────── */
function initMobileSubmenu() {
  const toggle = document.getElementById('mobile-products-toggle');
  const submenu = document.getElementById('mobile-products-submenu');
  const icon = document.getElementById('mobile-submenu-icon');
  if (!toggle || !submenu) return;
  toggle.addEventListener('click', () => {
    const open = !submenu.classList.contains('d-none');
    submenu.classList.toggle('d-none');
    if (icon) icon.textContent = open ? '+' : '-';
  });
}



/* ── CONTACT FORM HANDLER ────────────── */
function initContactForm(formSelector) {
  const form = document.querySelector(formSelector || '#cu-contact-form');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const alertBox = document.getElementById('form-alert') || document.getElementById('cu-form-alert');
    const showAlert = (msg, type = 'danger') => {
      if (!alertBox) return;
      alertBox.innerText = msg;
      alertBox.className = `alert alert-${type}`;
      alertBox.classList.remove('d-none');
      setTimeout(() => alertBox.classList.add('d-none'), 5000);
    };

    const fd = new FormData(form);
    const name    = (fd.get('your-name') || '').trim();
    const email   = (fd.get('email-address') || '').trim();
    const phone   = (fd.get('contact-number') || '').trim();
    const company = (fd.get('company') || '').trim();
    const message = (fd.get('message') || '').trim();

    if (!name || name.length < 2)           return showAlert('Please enter your name (at least 2 characters).');
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) return showAlert('Please enter a valid email address.');
    if (!/^[0-9]{10}$/.test(phone))          return showAlert('Please enter a valid 10-digit contact number.');
    if (!company || company.length < 2)      return showAlert('Please enter your company name.');
    if (!message || message.length < 5)      return showAlert('Please enter a message (at least 5 characters).');

    const recaptchaResp = form.querySelector('.g-recaptcha-response');
    const token = recaptchaResp ? recaptchaResp.value : (typeof grecaptcha !== 'undefined' && grecaptcha.getResponse ? grecaptcha.getResponse() : '');
    if (!token) return showAlert('Please complete the reCAPTCHA verification.');

    const btn = form.querySelector('button[type="submit"]');
    if (btn) { btn.disabled = true; btn.textContent = 'Sending…'; }

    try {
      const res = await fetch(`${API_BASE}/api/contact`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
        body: JSON.stringify({ 'your-name': name, 'email-address': email, 'contact-number': phone, company, message, recaptcha: token })
      });
      const result = await res.json();
      if (result.status === 'success') {
        showAlert(result.message || 'Message sent successfully!', 'success');
        form.reset();
        if (typeof grecaptcha !== 'undefined' && grecaptcha.reset) grecaptcha.reset();
      } else {
        showAlert(result.message || 'Submission failed.');
      }
    } catch {
      showAlert('There was an error submitting the form.');
    } finally {
      if (btn) { btn.disabled = false; btn.textContent = 'Send Message'; }
    }
  });
}

/* ── HERO BANNER FORM ────────────────── */
function initHeroBannerForm() {
  const form = document.getElementById('hb-form');
  if (!form) return;
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const alertEl = document.getElementById('hb-alert');
    const showAlert = (msg, success = false) => {
      if (!alertEl) return;
      alertEl.textContent = msg;
      alertEl.className = success ? 'hb-alert hb-alert--success' : 'hb-alert hb-alert--error';
      alertEl.style.display = 'block';
      if (success) setTimeout(() => { alertEl.style.display = 'none'; }, 6000);
    };
    const name  = form.querySelector('#hb-name').value.trim();
    const phone = form.querySelector('#hb-phone').value.trim();
    const email = form.querySelector('#hb-email').value.trim();
    const space = form.querySelector('#hb-spaceType').value;
    const msg   = form.querySelector('#hb-message').value.trim();
    if (!name || name.length < 2)           return showAlert('Please enter your full name.');
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) return showAlert('Please enter a valid email address.');
    if (!/^[0-9]{10}$/.test(phone))          return showAlert('Please enter a valid 10-digit phone number.');
    const token = typeof grecaptcha !== 'undefined' && grecaptcha.getResponse ? grecaptcha.getResponse() : '';
    if (!token) return showAlert('Please verify reCAPTCHA.');
    const btn = form.querySelector('button[type="submit"]');
    if (btn) { btn.disabled = true; }
    try {
      const res = await fetch(`${API_BASE}/api/contact`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
        body: JSON.stringify({ 'your-name': name, 'email-address': email, 'contact-number': phone, company: space, message: msg, recaptcha: token })
      });
      const result = await res.json();
      if (result.status === 'success') {
        showAlert('✅ Thank you! We\'ll reach out within 24 hours.', true);
        form.reset();
        if (typeof grecaptcha !== 'undefined' && grecaptcha.reset) grecaptcha.reset();
      } else {
        showAlert(result.message || 'Submission failed. Please try again later.');
      }
    } catch {
      showAlert('There was an error submitting the form. Please try again.');
    } finally {
      if (btn) { btn.disabled = false; }
    }
  });
}

function initSharedComponents() {
  // Init cursor, submenu
  initCursor();
  initMobileSubmenu();

  // Init contact forms
  initContactForm('#cu-contact-form');
  initHeroBannerForm();
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initSharedComponents);
} else {
  initSharedComponents();
}