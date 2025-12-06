/**
 * Majstor 247 Theme JavaScript
 */

(function() {
    'use strict';

    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        initMobileMenu();
        initContactForm();
        initSmoothScroll();
        initHeaderScroll();
    });

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const toggle = document.getElementById('mobile-menu-toggle');
        const menu = document.getElementById('mobile-menu');
        const nav = document.getElementById('main-nav');

        if (!toggle) return;

        toggle.addEventListener('click', function() {
            nav.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });

        // Close menu when clicking on links
        const menuLinks = document.querySelectorAll('.main-nav .nav-link, .mobile-menu .nav-link');
        menuLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                nav.classList.remove('active');
                document.body.classList.remove('menu-open');
            });
        });
    }

    /**
     * Contact Form AJAX Handler
     */
    function initContactForm() {
        const form = document.getElementById('majstor247-contact-form');
        const messageEl = document.getElementById('form-message');

        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Šaljem...';

            // Gather form data
            const formData = new FormData(form);
            formData.append('action', 'majstor247_contact');
            formData.append('nonce', form.querySelector('[name="contact_nonce"]').value);

            // Send AJAX request
            fetch(majstor247Ajax.ajaxurl, {
                method: 'POST',
                body: formData,
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if (data.success) {
                    showMessage(messageEl, data.data.message, 'success');
                    form.reset();
                } else {
                    showMessage(messageEl, data.data.message || 'Greška pri slanju.', 'error');
                }
            })
            .catch(function(error) {
                console.error('Error:', error);
                showMessage(messageEl, 'Greška pri slanju. Molimo pokušajte ponovo.', 'error');
            })
            .finally(function() {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
        });
    }

    /**
     * Show Form Message
     */
    function showMessage(element, message, type) {
        if (!element) return;

        element.textContent = message;
        element.className = 'form-message ' + type;
        element.style.display = 'block';
        element.style.padding = '1rem';
        element.style.marginTop = '1rem';
        element.style.borderRadius = 'var(--radius)';
        
        if (type === 'success') {
            element.style.backgroundColor = 'hsla(142, 76%, 36%, 0.1)';
            element.style.color = 'hsl(142, 76%, 46%)';
            element.style.border = '1px solid hsla(142, 76%, 36%, 0.3)';
        } else {
            element.style.backgroundColor = 'hsla(0, 84%, 60%, 0.1)';
            element.style.color = 'hsl(0, 84%, 60%)';
            element.style.border = '1px solid hsla(0, 84%, 60%, 0.3)';
        }

        // Hide after 5 seconds
        setTimeout(function() {
            element.style.display = 'none';
        }, 5000);
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    e.preventDefault();
                    
                    const headerHeight = document.querySelector('.site-header').offsetHeight;
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Header Background on Scroll
     */
    function initHeaderScroll() {
        const header = document.querySelector('.site-header');
        
        if (!header) return;

        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 50) {
                header.style.backgroundColor = 'hsla(222, 47%, 6%, 0.95)';
            } else {
                header.style.backgroundColor = 'hsla(222, 47%, 6%, 0.8)';
            }
            
            lastScroll = currentScroll;
        });
    }

})();
