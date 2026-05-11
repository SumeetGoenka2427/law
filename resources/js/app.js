import 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    // Sticky header shadow + scroll-to-top visibility
    const header = document.getElementById('siteHeader');
    const scrollTopBtn = document.getElementById('scrollTop');
    window.addEventListener('scroll', () => {
        if (header) header.classList.toggle('scrolled', window.scrollY > 60);
        if (scrollTopBtn) scrollTopBtn.classList.toggle('visible', window.scrollY > 400);
    }, { passive: true });

    // Scroll to top
    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    }

    // Search modal
    const modal = document.getElementById('searchModal');
    const searchInput = document.getElementById('searchInput');
    const searchToggle = document.getElementById('searchToggle');
    const searchClose = document.getElementById('searchClose');

    if (modal && searchToggle) {
        searchToggle.addEventListener('click', () => {
            modal.classList.add('open');
            setTimeout(() => searchInput?.focus(), 100);
        });
        searchClose?.addEventListener('click', () => modal.classList.remove('open'));
        modal.addEventListener('click', (e) => { if (e.target === modal) modal.classList.remove('open'); });
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') modal.classList.remove('open'); });
    }

    // Mobile nav toggle
    const burger = document.getElementById('hamburger');
    const mobileNav = document.getElementById('mobileNav');
    if (burger && mobileNav) {
        burger.addEventListener('click', () => {
            const open = mobileNav.classList.toggle('open');
            burger.setAttribute('aria-expanded', open);
        });
    }

    // Visual card tilt on hover
    document.querySelectorAll('.visual-card').forEach((card) => {
        card.addEventListener('mousemove', (e) => {
            const r = card.getBoundingClientRect();
            const x = ((e.clientX - r.left) / r.width - 0.5) * 8;
            const y = ((e.clientY - r.top) / r.height - 0.5) * -8;
            card.style.transform = `perspective(600px) rotateY(${x}deg) rotateX(${y}deg) scale(1.03)`;
        });
        card.addEventListener('mouseleave', () => { card.style.transform = ''; });
    });
});
