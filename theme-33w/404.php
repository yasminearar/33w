<?php
/**
 * Modèle index par défaut
 * Affiche un message d'erreur 404 si aucune page n'est trouvée
 */
?>

<?php get_header(); ?>

<section class="populaire">
  <h1>Erreur 404 - Page introuvable</h1>
  <h2>L’adresse que vous avez demandée n’existe pas ou a été déplacée.</h2>
  <p>Retournez à <a href="<?php echo home_url(); ?>" class="lien-retour">la page d’accueil</a> ou utilisez le menu pour naviguer.</p>
</section>

<?php get_footer(); ?>

