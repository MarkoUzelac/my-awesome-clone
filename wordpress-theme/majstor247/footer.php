</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-inner">
            <!-- Logo -->
            <div class="footer-logo">
                Majstor<span> 247</span>
            </div>

            <!-- Footer Buttons -->
            <div class="footer-buttons">
                <a href="tel:<?php echo esc_attr(str_replace(' ', '', majstor247_get_option('phone', '098 963 0462'))); ?>" class="btn btn-primary">
                    <?php echo majstor247_icon('phone'); ?>
                    Pozovi
                </a>
                <a href="mailto:<?php echo esc_attr(majstor247_get_option('email', 'info@majstor247.online')); ?>" class="btn btn-secondary">
                    <?php echo majstor247_icon('mail'); ?>
                    Email
                </a>
            </div>

            <!-- Copyright -->
            <p class="footer-copyright">
                © <?php echo date('Y'); ?> Majstor 247. Sva prava pridržana.
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
