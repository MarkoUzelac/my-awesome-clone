<?php
/**
 * Front Page Template
 *
 * @package Majstor247
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero section">
    <div class="container">
        <div class="hero-grid">
            <!-- Left Content -->
            <div class="hero-content">
                <div class="badge">
                    <?php echo majstor247_icon('clock'); ?>
                    DOSTUPNI 0-24H
                </div>

                <h1 class="hero-title">
                    <?php echo esc_html(majstor247_get_option('hero_title', 'Hitni Majstori')); ?>
                    <br>
                    <span class="text-gradient"><?php echo esc_html(majstor247_get_option('hero_subtitle', 'Poreč & Istra')); ?></span>
                </h1>

                <p class="hero-description">
                    Dolazak unutar <strong>30 minuta</strong>. Vodoinstalater, Električar, Bravar. Brzo, sigurno i povoljno.
                </p>

                <div class="hero-buttons">
                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', majstor247_get_option('phone', '098 963 0462'))); ?>" class="btn btn-primary btn-lg">
                        <?php echo majstor247_icon('phone'); ?>
                        Pozovite Odmah
                    </a>
                    <a href="#contact-form" class="btn btn-secondary btn-lg">
                        Pošalji upit
                        <?php echo majstor247_icon('arrow-right'); ?>
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="stat-item">
                        <h3><?php echo esc_html(majstor247_get_option('stat_interventions', '5000+')); ?></h3>
                        <p>Intervencija</p>
                    </div>
                    <div class="stat-item">
                        <h3><?php echo esc_html(majstor247_get_option('stat_satisfied', '98%')); ?></h3>
                        <p>Zadovoljnih</p>
                    </div>
                    <div class="stat-item">
                        <h3><?php echo esc_html(majstor247_get_option('stat_years', '10+')); ?></h3>
                        <p>Godina</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-card card" id="contact-form">
                <h2>Brzi Upit</h2>
                <p class="subtitle">Opišite problem, odgovaramo odmah.</p>

                <form id="majstor247-contact-form" class="contact-form">
                    <?php wp_nonce_field('majstor247_nonce', 'contact_nonce'); ?>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="contact-name">Ime</label>
                            <input type="text" id="contact-name" name="name" class="form-input" placeholder="Vaše ime" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="contact-phone">Telefon</label>
                            <input type="tel" id="contact-phone" name="phone" class="form-input" placeholder="098..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="contact-service">Vrsta usluge</label>
                        <select id="contact-service" name="service" class="form-select" required>
                            <option value="">Odaberite uslugu</option>
                            <option value="Vodoinstalater">Vodoinstalater</option>
                            <option value="Električar">Električar</option>
                            <option value="Bravar">Bravar</option>
                            <option value="Čišćenje">Čišćenje</option>
                            <option value="Selidbe">Selidbe</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="contact-message">Poruka</label>
                        <textarea id="contact-message" name="message" class="form-textarea" placeholder="Kratki opis kvara..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-submit">
                        <?php echo majstor247_icon('send'); ?>
                        Pošalji Besplatno
                    </button>
                </form>

                <div id="form-message" class="form-message"></div>
            </div>
        </div>
    </div>
</section>

<!-- Why Us Section -->
<section class="section section-alt">
    <div class="container">
        <h2 class="text-center mb-12">Zašto Nas Odabrati?</h2>

        <div class="grid grid-6">
            <?php
            $features = array(
                array('icon' => 'clock', 'title' => 'Dostupni 0-24h', 'desc' => 'Uvijek tu kada nas trebate'),
                array('icon' => 'zap', 'title' => 'Brz dolazak', 'desc' => 'Stižemo unutar 30 minuta'),
                array('icon' => 'users', 'title' => 'Stručni tim', 'desc' => 'Certificirani majstori'),
                array('icon' => 'shield', 'title' => 'Garancija', 'desc' => 'Jamstvo na sve radove'),
                array('icon' => 'star', 'title' => 'Kvaliteta', 'desc' => 'Vrhunski materijali'),
                array('icon' => 'check', 'title' => 'Fiksne cijene', 'desc' => 'Bez skrivenih troškova'),
            );
            foreach ($features as $feature) :
            ?>
            <div class="card feature-card">
                <div class="feature-icon">
                    <?php echo majstor247_icon($feature['icon']); ?>
                </div>
                <h3><?php echo esc_html($feature['title']); ?></h3>
                <p><?php echo esc_html($feature['desc']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="usluge" class="section">
    <div class="container">
        <div class="text-center mb-12">
            <h2>Naše Usluge</h2>
            <p class="text-muted">Profesionalna rješenja za vaš dom. Brzo, kvalitetno i dostupno 0-24h.</p>
        </div>

        <div class="grid grid-3">
            <?php
            $services = array(
                array(
                    'icon' => 'droplet',
                    'color' => 'blue',
                    'title' => 'Vodoinstalater',
                    'desc' => 'Hitne intervencije, popravci cijevi, odvoda, sanitarija',
                    'features' => array('Curenje cijevi', 'Začepljeni odvodi', 'Montaža sanitarija', 'Bojleri'),
                ),
                array(
                    'icon' => 'zap',
                    'color' => 'yellow',
                    'title' => 'Električar',
                    'desc' => 'Električne instalacije, kvarovi, sigurnosne provjere',
                    'features' => array('Nestanak struje', 'Kratki spojevi', 'Instalacije', 'LED rasvjeta'),
                ),
                array(
                    'icon' => 'key',
                    'color' => 'purple',
                    'title' => 'Bravar',
                    'desc' => 'Otvaranje vrata, zamjena brave, sigurnosne vrata',
                    'features' => array('Otvaranje vrata', 'Zamjena brave', 'Sigurnosne brave', 'Ključevi'),
                ),
                array(
                    'icon' => 'sparkles',
                    'color' => 'green',
                    'title' => 'Čišćenje',
                    'desc' => 'Dubinsko čišćenje, redovno održavanje apartmana',
                    'features' => array('Dubinsko čišćenje', 'Čišćenje poslije gostiju', 'Čišćenje prozora', 'Pranje tepiha'),
                ),
                array(
                    'icon' => 'truck',
                    'color' => 'red',
                    'title' => 'Selidbe',
                    'desc' => 'Profesionalne selidbe, transport robe, montaža',
                    'features' => array('Selidbe stanova', 'Transport namještaja', 'Pakiranje', 'Montaža'),
                ),
            );
            foreach ($services as $service) :
            ?>
            <div class="card service-card">
                <div class="service-icon <?php echo esc_attr($service['color']); ?>">
                    <?php echo majstor247_icon($service['icon']); ?>
                </div>
                <h3><?php echo esc_html($service['title']); ?></h3>
                <p><?php echo esc_html($service['desc']); ?></p>
                <ul class="service-features">
                    <?php foreach ($service['features'] as $feature) : ?>
                    <li><?php echo esc_html($feature); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="#contact-form" class="service-link">
                    Naruči uslugu
                    <?php echo majstor247_icon('arrow-right'); ?>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="section section-alt">
    <div class="container">
        <div class="text-center mb-12">
            <h2>Kako Funkcionira?</h2>
            <p class="text-muted">3 jednostavna koraka do rješenja.</p>
        </div>

        <div class="steps-grid">
            <?php
            $steps = array(
                array('num' => '01', 'icon' => 'phone', 'title' => 'Pozovite nas', 'desc' => 'Dostupni smo 0-24h za vas.'),
                array('num' => '02', 'icon' => 'car', 'title' => 'Dolazimo brzo', 'desc' => 'Stižemo unutar 30 minuta.'),
                array('num' => '03', 'icon' => 'wrench', 'title' => 'Rješavamo kvar', 'desc' => 'Brz i kvalitetan popravak.'),
            );
            foreach ($steps as $step) :
            ?>
            <div class="step-item">
                <div class="step-number">
                    <?php echo esc_html($step['num']); ?>
                    <div class="step-icon">
                        <?php echo majstor247_icon($step['icon']); ?>
                    </div>
                </div>
                <h3><?php echo esc_html($step['title']); ?></h3>
                <p><?php echo esc_html($step['desc']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="section">
    <div class="container">
        <div class="text-center mb-12">
            <h2>Cjenik Usluga</h2>
            <p class="text-muted">Transparentne cijene. Bez iznenađenja.</p>
        </div>

        <div class="grid grid-3">
            <?php
            $pricing = array(
                array(
                    'icon' => 'droplet',
                    'title' => 'Vodoinstalater',
                    'services' => array(
                        array('name' => 'Odštopavanje WC-a', 'price' => '50€'),
                        array('name' => 'Curenje cijevi', 'price' => '80€'),
                        array('name' => 'Popravak bojlera', 'price' => '120€'),
                        array('name' => 'Hitna intervencija', 'price' => '100€'),
                    ),
                ),
                array(
                    'icon' => 'zap',
                    'title' => 'Električar',
                    'services' => array(
                        array('name' => 'Kratki spoj', 'price' => '70€'),
                        array('name' => 'Nestanak struje', 'price' => '85€'),
                        array('name' => 'Zamjena osigurača', 'price' => '55€'),
                        array('name' => 'Hitna intervencija', 'price' => '110€'),
                    ),
                ),
                array(
                    'icon' => 'key',
                    'title' => 'Bravar',
                    'services' => array(
                        array('name' => 'Otvaranje vrata', 'price' => '60€'),
                        array('name' => 'Izgubljeni ključevi', 'price' => '50€'),
                        array('name' => 'Otvaranje auta', 'price' => '75€'),
                        array('name' => 'Hitna intervencija', 'price' => '95€'),
                    ),
                ),
            );
            foreach ($pricing as $plan) :
            ?>
            <div class="card pricing-card">
                <div class="pricing-header">
                    <div class="pricing-icon">
                        <?php echo majstor247_icon($plan['icon']); ?>
                    </div>
                    <h3><?php echo esc_html($plan['title']); ?></h3>
                </div>
                <ul class="pricing-list">
                    <?php foreach ($plan['services'] as $service) : ?>
                    <li>
                        <span class="service-name"><?php echo esc_html($service['name']); ?></span>
                        <span class="price"><?php echo esc_html($service['price']); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <a href="#contact-form" class="btn btn-secondary" style="width: 100%; text-align: center;">
                    Rezerviraj termin
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Locations Section -->
<section class="section section-alt">
    <div class="container">
        <div class="text-center mb-12">
            <h2>Naše Lokacije</h2>
            <p class="text-muted">Brz dolazak u sva navedena mjesta.</p>
        </div>

        <div class="locations-grid">
            <?php
            $locations = array('Poreč', 'Vrsar', 'Rovinj', 'Pazin', 'Novigrad', 'Višnjan', 'Kaštelir', 'Žbandaj');
            foreach ($locations as $location) :
            ?>
            <div class="location-tag">
                <?php echo majstor247_icon('map-pin'); ?>
                <span><?php echo esc_html($location); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section">
    <div class="container">
        <div class="text-center mb-12">
            <h2>Iskustva Klijenata</h2>
        </div>

        <div class="grid grid-3">
            <?php
            $testimonials = array(
                array('quote' => 'Brza reakcija i profesionalna usluga!', 'author' => 'Ana M.', 'service' => 'Električar'),
                array('quote' => 'Riješili problem u rekordnom roku.', 'author' => 'Marko P.', 'service' => 'Vodoinstalater'),
                array('quote' => 'Odličan bravar, došao za 20 minuta.', 'author' => 'Ivana K.', 'service' => 'Bravar'),
            );
            foreach ($testimonials as $testimonial) :
            ?>
            <div class="card testimonial-card">
                <div class="testimonial-stars">
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                    <?php echo majstor247_icon('star'); ?>
                    <?php endfor; ?>
                </div>
                <p class="testimonial-quote">"<?php echo esc_html($testimonial['quote']); ?>"</p>
                <p class="testimonial-author">
                    <strong><?php echo esc_html($testimonial['author']); ?></strong>
                    <span> • <?php echo esc_html($testimonial['service']); ?></span>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
