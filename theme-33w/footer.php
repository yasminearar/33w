<footer class="piedpage">
    <div class="global">
        <section class="piedpage__ligne-1">
            <div class="piedpage__lien">
                <?php wp_nav_menu(array(
                    "menu" => "externe",
                    "container" => "nav"
                )) ?>
            </div>
            <div class="piedpage__adresse">
                <h2>Adresse et recherche</h2>
                <p>3800, Sherbrook est, Montréal, Québec, Canada, H1X 2A2</p>
                <p>514-254-7131</p>
                <?php get_search_form() ?>
            </div>

            <div class="piedpage__recherche"></div>
            <div class="piedpage__description">
              <h3>Mission du club</h3>
              <p>
                Notre mission est d'inspirer et d'informer nos membres sur des destinations de voyage qui répondent à leurs attentes. Nous favorisons les échanges et le partage d’expériences à travers des activités sociales variées, telles que des rencontres, des conférences et des dîners.
              </p>
            </div>
        </section>
        <section class="piedpage__ligne-2">
            <div class="piedpage__icone">
              <?php get_template_part('gabarit/icone'); ?>
            </div>
        </section>

    </div>

</footer>

</body>
<?php wp_footer(); ?>

</html>