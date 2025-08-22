<?php 
function icone_sociaux($couleur) {
    $couleur = substr($couleur, 1); // pour enlever le # de la position 0 on extrait la couleur
    ?>
    <a class="sociaux" href="https://github.com/yasminearar">
        <img src="https://s2.svgbox.net/social.svg?ic=github&color=<?= $couleur ?>" width="32" height="32">
    </a>
    <a class="sociaux" href="https://facebook.com">
        <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=<?= $couleur ?>" width="32" height="32">
    </a>
    <a class="sociaux" href="https://instagram.com">
        <img src="https://s2.svgbox.net/social.svg?ic=instagram&color=<?= $couleur ?>" width="32" height="32">
    </a>
    <?php
} 


/**
 * générateur de vague pour séparer deux sections
 */

function vague($couleur_haut, $couleur_bas)
{ ?>
    <style>
        .style-vague {
            position: relative;
            top: 9px;
            background-color: <?= $couleur_haut ?>;
        }
    </style>

    <svg class="style-vague" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
            fill="<?= $couleur_bas ?>"
            fill-opacity="1"
            d="M0,32L80,58.7C160,85,320,139,480,133.3C640,128,800,64,960,53.3C1120,43,1280,85,1360,106.7L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>

<?php }

/**
 * Générateur de séparateurs SVG paramétrables - Création par code
 * @param string $type - Type de séparateur : 'wave', 'wave-double', 'curve', 'triangle', 'zigzag'
 * @param string $couleur - Couleur du séparateur (ex: '#ba4d1d', 'rgb(186, 77, 29)')
 * @param string $hauteur - Hauteur du séparateur (ex: '100px', '150px')
 * @param bool $inverse - Inverser la direction du séparateur
 * @param string $classe_css - Classe CSS supplémentaire
 */
function separateur_svg($type = 'wave', $couleur = '#ba4d1d', $hauteur = '100px', $inverse = false, $classe_css = '') {

    // Transformation pour inverser si nécessaire
    $transform_style = $inverse ? 'transform: scaleY(-1);' : '';

    // Définition des formes SVG
    $formes = [
        'wave' => [
            'viewBox' => '0 0 1440 320',
            'path' => 'M0,64L80,85.3C160,107,320,149,480,154.7C640,160,800,128,960,117.3C1120,107,1280,117,1360,122.7L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z'
        ],
        'wave-double' => [
            'viewBox' => '0 0 1440 200',
            'path' => 'M0,64L80,74.7C160,85,320,107,480,117.3C640,128,800,128,960,122.7C1120,117,1280,107,1360,101.3L1440,96L1440,200L1360,200C1280,200,1120,200,960,200C800,200,640,200,480,200C320,200,160,200,80,200L0,200Z'
        ],
        'curve' => [
            'viewBox' => '0 0 1440 160',
            'path' => 'M0,160L1440,0L1440,160Z'
        ],
        'triangle' => [
            'viewBox' => '0 0 1440 100',
            'path' => 'M0,100L720,0L1440,100L1440,100L0,100Z'
        ],
        'zigzag' => [
            'viewBox' => '0 0 1440 120',
            'path' => 'M0,120L240,0L480,120L720,0L960,120L1200,0L1440,120L1440,120L0,120Z'
        ],
        'wave-simple' => [
            'viewBox' => '0 0 1440 200',
            'path' => 'M0,200Q360,50 720,100T1440,200V200H0Z'
        ]
    ];

    // Vérifier si le type existe, sinon utiliser 'wave' par défaut
    if (!isset($formes[$type])) {
        $type = 'wave';
    }

    $forme = $formes[$type];

    ?>
    <div class="separateur-svg separateur-<?= $type ?> <?= $classe_css ?>"
         style="width: 100%; height: <?= $hauteur ?>; overflow: hidden; line-height: 0; <?= $transform_style ?>">
        <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="<?= $forme['viewBox'] ?>"
                style="position: relative; display: block; width: calc(100% + 1.3px); height: <?= $hauteur ?>;"
                preserveAspectRatio="none">
            <path
                    fill="<?= $couleur ?>"
                    d="<?= $forme['path'] ?>">
            </path>
        </svg>
    </div>
    <?php
}

/**
 * Fonction raccourci pour créer des séparateurs avec les couleurs du thème
 */
function separateur_theme($type = 'wave', $hauteur = '100px', $inverse = false) {
    // Utilise les couleurs principales du thème
    $couleur_principale = 'rgb(186, 77, 29)'; // Couleur signature du thème
    separateur_svg($type, $couleur_principale, $hauteur, $inverse, 'separateur-theme');
}

/**
 * Fonction identique au thème de référence 33w-ete-25-tp2
 * Extrait la liste des catégories pour l'affichage REST API
 */
function extraire_list_categories($nom_categorie)
{
    //$parent_category_id = get_term_by("slug", $nom_categorie, "category");
    $parent_category = get_category_by_slug($nom_categorie);
    $tableau = array(
        'parent' => $parent_category ? $parent_category->term_id : 0,
        'hide_empty' => true
    );
    $list_categories = get_categories($tableau);
    echo "<ul class='list_categories'>";
    foreach ($list_categories as $categorie) {
        echo "<li data-id='" . $categorie->term_id . "'>" . $categorie->name . "</li>";
    }
    echo "</ul>";
}

/**
 * Générateur de séparateurs SVG animés pour le pied de page (BONUS)
 * @param string $type - Type d'animation : 'wave-flow', 'wave-pulse', 'particles', 'gradient-wave'
 * @param string $couleur_primaire - Couleur principale du séparateur
 * @param string $couleur_secondaire - Couleur secondaire pour les dégradés
 * @param string $hauteur - Hauteur du séparateur animé
 * @param string $vitesse - Vitesse d'animation : 'slow', 'normal', 'fast'
 */
function separateur_svg_anime($type = 'wave-flow', $couleur_primaire = '#ba4d1d', $couleur_secondaire = '#bc7252', $hauteur = '120px', $vitesse = 'normal') {

    // Définir les vitesses d'animation
    $vitesses = [
        'slow' => '8s',
        'normal' => '4s',
        'fast' => '2s'
    ];

    $duree = isset($vitesses[$vitesse]) ? $vitesses[$vitesse] : $vitesses['normal'];

    // ID unique pour les dégradés et animations
    $unique_id = 'anim_' . uniqid();

    ?>
    <div class="separateur-svg-anime separateur-<?= $type ?>"
         style="width: 100%; height: <?= $hauteur ?>; overflow: hidden; position: relative;">

        <?php if ($type === 'wave-flow'): ?>
            <!-- Vagues qui s'écoulent -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 240"
                 style="position: absolute; width: 200%; height: 100%; animation: wave-flow <?= $duree ?> linear infinite;">
                <defs>
                    <linearGradient id="<?= $unique_id ?>_gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:0.8" />
                        <stop offset="50%" style="stop-color:<?= $couleur_secondaire ?>;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:0.8" />
                    </linearGradient>
                </defs>
                <path fill="url(#<?= $unique_id ?>_gradient)"
                      d="M0,96L80,112C160,128,320,160,480,165.3C640,171,800,149,960,138.7C1120,128,1280,128,1360,128L1440,128L1440,240L1360,240C1280,240,1120,240,960,240C800,240,640,240,480,240C320,240,160,240,80,240L0,240Z"/>
            </svg>

        <?php elseif ($type === 'wave-pulse'): ?>
            <!-- Vagues qui pulsent -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 200"
                 style="position: absolute; width: 100%; height: 100%;">
                <defs>
                    <linearGradient id="<?= $unique_id ?>_pulse" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:1">
                            <animate attributeName="stop-opacity" values="0.3;1;0.3" dur="<?= $duree ?>" repeatCount="indefinite"/>
                        </stop>
                        <stop offset="100%" style="stop-color:<?= $couleur_secondaire ?>;stop-opacity:0.7">
                            <animate attributeName="stop-opacity" values="0.7;0.3;0.7" dur="<?= $duree ?>" repeatCount="indefinite"/>
                        </stop>
                    </linearGradient>
                </defs>
                <path fill="url(#<?= $unique_id ?>_pulse)"
                      d="M0,64L80,85.3C160,107,320,149,480,154.7C640,160,800,128,960,117.3C1120,107,1280,117,1360,122.7L1440,128L1440,200L1360,200C1280,200,1120,200,960,200C800,200,640,200,480,200C320,200,160,200,80,200L0,200Z">
                    <animateTransform attributeName="transform" type="scale" values="1,1;1.02,1.1;1,1"
                                      dur="<?= $duree ?>" repeatCount="indefinite"/>
                </path>
            </svg>

        <?php elseif ($type === 'particles'): ?>
            <!-- Particules flottantes -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 200"
                 style="position: absolute; width: 100%; height: 100%;">
                <defs>
                    <circle id="<?= $unique_id ?>_particle" r="3" fill="<?= $couleur_primaire ?>" opacity="0.6"/>
                </defs>
                <!-- Vague de base -->
                <path fill="<?= $couleur_secondaire ?>" opacity="0.8"
                      d="M0,96L80,112C160,128,320,160,480,165.3C640,171,800,149,960,138.7C1120,128,1280,128,1360,128L1440,128L1440,200L1360,200C1280,200,1120,200,960,200C800,200,640,200,480,200C320,200,160,200,80,200L0,200Z"/>

                <!-- Particules animées -->
                <use href="#<?= $unique_id ?>_particle" x="100" y="50">
                    <animateMotion dur="<?= $duree ?>" repeatCount="indefinite"
                                   path="M0,0 Q200,-30 400,0 T800,0"/>
                </use>
                <use href="#<?= $unique_id ?>_particle" x="300" y="80">
                    <animateMotion dur="<?= $duree ?>" repeatCount="indefinite"
                                   path="M0,0 Q150,20 300,-10 T600,0" begin="1s"/>
                </use>
                <use href="#<?= $unique_id ?>_particle" x="600" y="60">
                    <animateMotion dur="<?= $duree ?>" repeatCount="indefinite"
                                   path="M0,0 Q100,30 200,-20 T400,0" begin="2s"/>
                </use>
            </svg>

        <?php else: // gradient-wave par défaut ?>
            <!-- Vague avec dégradé animé -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 180"
                 style="position: absolute; width: 100%; height: 100%;">
                <defs>
                    <linearGradient id="<?= $unique_id ?>_moving" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:1">
                            <animate attributeName="offset" values="0%;100%;0%" dur="<?= $duree ?>" repeatCount="indefinite"/>
                        </stop>
                        <stop offset="50%" style="stop-color:<?= $couleur_secondaire ?>;stop-opacity:0.8">
                            <animate attributeName="offset" values="50%;150%;50%" dur="<?= $duree ?>" repeatCount="indefinite"/>
                        </stop>
                        <stop offset="100%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:1">
                            <animate attributeName="offset" values="100%;200%;100%" dur="<?= $duree ?>" repeatCount="indefinite"/>
                        </stop>
                    </linearGradient>
                </defs>
                <path fill="url(#<?= $unique_id ?>_moving)"
                      d="M0,96L80,112C160,128,320,160,480,165.3C640,171,800,149,960,138.7C1120,128,1280,128,1360,128L1440,128L1440,180L1360,180C1280,180,1120,180,960,180C800,180,640,180,480,180C320,180,160,180,80,180L0,180Z"/>
            </svg>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Fonction spécifique pour le footer avec animation
 */
function separateur_footer_anime($type = 'wave-flow', $vitesse = 'slow') {
    // Utilise les couleurs du thème pour le footer
    $couleur_principale = 'rgb(186, 77, 29)';
    $couleur_secondaire = 'rgb(188, 114, 82)';
    separateur_svg_anime($type, $couleur_principale, $couleur_secondaire, '100px', $vitesse);
}
?>