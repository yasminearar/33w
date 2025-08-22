<?php
/**
 * Gabarit de la page d'erreur 404
 * Template partiel utilisé par 404.php avec get_template_part()
 * 
 * Fonctionnalités :
 * - Image de fond configurable via Customizer
 * - Titre et message personnalisables
 * - Bouton retour à l'accueil
 * - Menu destinations configurable
 * - Zone de recherche intégrée
 */

// Récupération des paramètres du Customizer
$background_image = get_theme_mod('404_background_image', get_template_directory_uri() . '/images/ilepalmier.jpg');
$background_color = get_theme_mod('404_background_color', '#ba4d1d');
$titre_404 = get_theme_mod('404_title', 'Oups ! Page introuvable');
$message_404 = get_theme_mod('404_message', 'La page que vous recherchez semble avoir pris des vacances ! Explorez nos destinations pour planifier votre prochain voyage.');
?>

<section class="erreur-404" style="background-image: url('<?php echo esc_url($background_image); ?>');">
    <div class="erreur-404__overlay">
        <div class="erreur-404__content">
            
            <!-- Titre principal -->
            <h1 class="erreur-404__title"><?php echo esc_html($titre_404); ?></h1>
            
            <!-- Message descriptif -->
            <p class="erreur-404__message"><?php echo esc_html($message_404); ?></p>
            
            <!-- Bouton principal - Retour à l'accueil -->
            <div class="erreur-404__actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" 
                   class="erreur-404__btn erreur-404__btn-primary"
                   style="background-color: <?php echo esc_attr($background_color); ?>;">
                    Retour à l'accueil
                </a>
            </div>
            
            <!-- Menu destinations - Boutons secondaires -->
            <?php if (has_nav_menu('menu-404-destinations')) : ?>
                <div class="erreur-404__destinations">
                    <h3 class="erreur-404__destinations-title">Explorez nos destinations</h3>
                    <nav class="erreur-404__nav">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-404-destinations',
                            'container' => false,
                            'menu_class' => 'erreur-404__menu',
                            'link_before' => '<span class="erreur-404__btn erreur-404__btn-secondary" style="background-color: ' . esc_attr($background_color) . ';">',
                            'link_after' => '</span>',
                            'fallback_cb' => false,
                        ));
                        ?>
                    </nav>
                </div>
            <?php else : ?>
                <!-- Affichage de boutons par défaut si le menu n'est pas configuré -->
                <div class="erreur-404__destinations">
                    <h3 class="erreur-404__destinations-title">Explorez nos destinations</h3>
                    <div class="erreur-404__destinations-default">
                        <a href="<?php echo esc_url(home_url('/category/destination/')); ?>" 
                           class="erreur-404__btn erreur-404__btn-secondary"
                           style="background-color: <?php echo esc_attr($background_color); ?>;">
                            Toutes les destinations
                        </a>
                        <a href="<?php echo esc_url(home_url('/category/populaire/')); ?>" 
                           class="erreur-404__btn erreur-404__btn-secondary"
                           style="background-color: <?php echo esc_attr($background_color); ?>;">
                            Voyages populaires
                        </a>
                        <a href="<?php echo esc_url(home_url('/category/galerie/')); ?>" 
                           class="erreur-404__btn erreur-404__btn-secondary"
                           style="background-color: <?php echo esc_attr($background_color); ?>;">
                            Galerie de photos
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Zone de recherche -->
            <div class="erreur-404__search">
                <h3 class="erreur-404__search-title">Ou cherchez ce que vous voulez</h3>
                <div class="erreur-404__search-form" style="background-color: <?php echo esc_attr($background_color); ?>;">
                    <?php get_search_form(); ?>
                </div>
            </div>
            
        </div>
    </div>
</section>

<style>
/* Styles CSS de base pour le fonctionnement (sera déplacé vers Sass plus tard) */
.erreur-404 {
    min-height: 100vh;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.erreur-404__overlay {
    background: rgba(0, 0, 0, 0.4);
    width: 100%;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.erreur-404__content {
    text-align: center;
    color: white;
    max-width: 800px;
    width: 100%;
}

.erreur-404__title {
    font-size: 3rem;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}

.erreur-404__message {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    line-height: 1.6;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
}

.erreur-404__actions {
    margin-bottom: 2rem;
}

.erreur-404__btn {
    display: inline-block;
    padding: 12px 24px;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin: 0.5rem;
    font-weight: bold;
    transition: transform 0.3s ease;
}

.erreur-404__btn:hover {
    transform: scale(1.05);
    text-decoration: none;
    color: white;
}

.erreur-404__btn-primary {
    font-size: 1.1rem;
    padding: 15px 30px;
}

.erreur-404__destinations,
.erreur-404__search {
    margin-bottom: 2rem;
}

.erreur-404__destinations-title,
.erreur-404__search-title {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
}

.erreur-404__menu {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
}

.erreur-404__menu li {
    display: inline-block;
}

.erreur-404__destinations-default {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
}

.erreur-404__search-form {
    display: inline-block;
    padding: 1rem;
    border-radius: 5px;
    margin-top: 1rem;
}

.erreur-404__search-form form {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
}

.erreur-404__search-form input[type="search"] {
    padding: 8px 12px;
    border: none;
    border-radius: 3px;
    font-size: 1rem;
}

.erreur-404__search-form input[type="submit"] {
    padding: 8px 16px;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 1px solid white;
    border-radius: 3px;
    cursor: pointer;
    font-size: 1rem;
}

/* Responsive basique */
@media (max-width: 768px) {
    .erreur-404__title {
        font-size: 2rem;
    }
    
    .erreur-404__message {
        font-size: 1rem;
    }
    
    .erreur-404__menu,
    .erreur-404__destinations-default {
        flex-direction: column;
        align-items: center;
    }
    
    .erreur-404__search-form form {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>
