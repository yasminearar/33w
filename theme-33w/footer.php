
<?php 
$footer_couleur = "#b34a1d";
$footer_adresse = get_theme_mod('footer_adresse', '3800, Sherbrook est, Montréal, Québec, Canada, H1X 2A2');
$footer_telephone = get_theme_mod('footer_telephone', '514-254-7131');
$footer_mission = get_theme_mod('footer_mission', "Notre mission est d'inspirer et d'informer nos membres...");
vague("#f5f5dc", $footer_couleur); ?>
<footer class="piedpage" style="background-color: <?= $footer_couleur ?>;">
    <div class="global">
        <section class="piedpage__ligne-1">
            <div class="piedpage__lien">
                <h3>Nos suggestions de voyage</h3>
                <?php wp_nav_menu(array(
                    "menu" => "externe",
                    "container" => "nav"
                )) ?>
            </div>
            <div class="piedpage__adresse">
                <h3>Adresse et recherche</h3>
                <p>3800, Sherbrook est, Montréal, Québec, Canada, H1X 2A2 : <?php echo $footer_adresse; ?></p>
                <p>514-254-7131 : <?php echo $footer_telephone; ?></p>
                <?php get_search_form() ?>
            </div>

            <div class="piedpage__recherche"></div>
            <div class="piedpage__description">
              <h3>Mission du club</h3>
              <p>
                Notre mission est d'inspirer et d'informer nos membres sur des destinations de voyage qui répondent à leurs attentes. Nous favorisons les échanges et le partage d’expériences à travers des activités sociales variées, telles que des rencontres, des conférences et des dîners : <?php echo $footer_mission; ?></p>
            </div>
        </section>
        <section class="piedpage__ligne-2">
            <div class="piedpage__icone">
              <?php icone_sociaux("#f5f5dc"); ?>
            </div>
        </section>

    </div>

</footer>

</body>
<?php wp_footer(); ?>

</html>