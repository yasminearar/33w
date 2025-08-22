<?php

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

    // Définition des formes SVG améliorées
    $formes = [
        // Vagues améliorées avec plus de détails
        'wave' => [
            'viewBox' => '0 0 1440 320',
            'path' => 'M0,64L48,80C96,96,192,128,288,138.7C384,149,480,139,576,149.3C672,160,768,192,864,186.7C960,181,1056,139,1152,122.7C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'
        ],
        'wave-double' => [
            'viewBox' => '0 0 1440 250',
            'path' => 'M0,32L48,48C96,64,192,96,288,96C384,96,480,64,576,69.3C672,75,768,117,864,144C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,250L1392,250C1344,250,1248,250,1152,250C1056,250,960,250,864,250C768,250,672,250,576,250C480,250,384,250,288,250C192,250,96,250,48,250L0,250Z'
        ],
        'wave-smooth' => [
            'viewBox' => '0 0 1440 320',
            'path' => 'M0,192L60,176C120,160,240,128,360,128C480,128,600,160,720,165.3C840,171,960,149,1080,160C1200,171,1320,213,1380,234.7L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z'
        ],
        'wave-gradient' => [
            'viewBox' => '0 0 1440 220',
            'path' => 'M0,96L48,101.3C96,107,192,117,288,138.7C384,160,480,192,576,186.7C672,181,768,139,864,133.3C960,128,1056,160,1152,165.3C1248,171,1344,149,1392,138.7L1440,128L1440,220L1392,220C1344,220,1248,220,1152,220C1056,220,960,220,864,220C768,220,672,220,576,220C480,220,384,220,288,220C192,220,96,220,48,220L0,220Z'
        ],
        'curve' => [
            'viewBox' => '0 0 1440 160',
            'path' => 'M0,160L1440,0L1440,160Z'
        ],
        'curve-smooth' => [
            'viewBox' => '0 0 1440 170',
            'path' => 'M0,170C240,80,480,20,720,30C960,40,1200,110,1440,140L1440,170L0,170Z'
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
        ],
        'hills' => [
            'viewBox' => '0 0 1440 180',
            'path' => 'M0,128L80,112C160,96,320,64,480,69.3C640,75,800,117,960,133.3C1120,149,1280,139,1360,133.3L1440,128L1440,180L1360,180C1280,180,1120,180,960,180C800,180,640,180,480,180C320,180,160,180,80,180L0,180Z'
        ],
        'waves-opacity' => [
            'viewBox' => '0 0 1440 260',
            'path' => 'M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,261.3C672,256,768,224,864,213.3C960,203,1056,213,1152,208C1248,203,1344,181,1392,170.7L1440,160L1440,260L1392,260C1344,260,1248,260,1152,260C1056,260,960,260,864,260C768,260,672,260,576,260C480,260,384,260,288,260C192,260,96,260,48,260L0,260Z'
        ],
        'peaks' => [
            'viewBox' => '0 0 1440 130',
            'path' => 'M0,32L120,53.3C240,75,480,117,720,122.7C960,128,1200,96,1320,80L1440,64L1440,130L1320,130C1200,130,960,130,720,130C480,130,240,130,120,130L0,130Z'
        ],
        'beach-wave' => [
            'viewBox' => '0 0 1440 200',
            'path' => 'M0,160C48,149,96,139,144,128C192,117,240,107,288,101.3C336,96,384,96,432,101.3C480,107,528,117,576,133.3C624,149,672,171,720,165.3C768,160,816,128,864,117.3C912,107,960,117,1008,138.7C1056,160,1104,192,1152,186.7C1200,181,1248,139,1296,133.3C1344,128,1392,160,1416,176L1440,192L1440,200L1416,200C1392,200,1344,200,1296,200C1248,200,1200,200,1152,200C1104,200,1056,200,1008,200C960,200,912,200,864,200C816,200,768,200,720,200C672,200,624,200,576,200C528,200,480,200,432,200C384,200,336,200,288,200C240,200,192,200,144,200C96,200,48,200,24,200L0,200Z'
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
    // Palette de couleurs diversifiée pour les séparateurs
    $palette_couleurs = [
        'principale' => 'rgb(186, 77, 29)',     // Couleur signature du thème (orange foncé)
        'secondaire' => 'rgb(226, 136, 34)',    // Orange plus clair
        'tertiaire' => 'rgb(146, 57, 9)',       // Brun orangé plus foncé
        'accent' => 'rgb(206, 97, 49)',         // Orange vif
        'neutre' => 'rgb(240, 240, 235)'        // Beige très clair
    ];

    // Attribuer différentes couleurs selon le type de séparateur
    $couleur = $palette_couleurs['principale']; // Couleur par défaut

    // Sélection de couleurs personnalisées par type de séparateur
    switch ($type) {
        case 'wave-smooth':
        case 'wave-gradient':
            $couleur = $palette_couleurs['secondaire'];
            break;
        case 'curve':
        case 'curve-smooth':
            $couleur = $palette_couleurs['tertiaire'];
            break;
        case 'hills':
        case 'peaks':
            $couleur = $palette_couleurs['accent'];
            break;
        case 'wave-double':
        case 'waves-opacity':
            $couleur = $palette_couleurs['principale'];
            break;
        case 'beach-wave':
            // Couleur spéciale pour la vague de plage
            $couleur = 'rgb(206, 97, 49)'; // Orange plus vif
            break;
    }

    // Ajouter une classe pour permettre des effets supplémentaires en CSS
    $classe_css = 'separateur-theme separateur-' . $type;

    separateur_svg($type, $couleur, $hauteur, $inverse, $classe_css);
}

/**
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
 * @param string $type - Type d'animation : 'wave-flow', 'wave-pulse', 'particles', 'gradient-wave', 'wave-ripple', 'ocean-waves', 'single-wave'
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

        <?php elseif ($type === 'wave-ripple'): ?>
            <!-- Vagues avec effet d'ondulation - NOUVEAU -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"
                 style="position: absolute; width: 100%; height: 100%;">
                <defs>
                    <linearGradient id="<?= $unique_id ?>_ripple" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:0.9" />
                        <stop offset="50%" style="stop-color:<?= $couleur_secondaire ?>;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:0.9" />
                    </linearGradient>
                </defs>

                <!-- Première vague avec animation -->
                <path fill="url(#<?= $unique_id ?>_ripple)" opacity="0.8"
                      d="M0,96L60,90.7C120,85,240,75,360,80C480,85,600,107,720,112C840,117,960,107,1080,101.3C1200,96,1320,96,1380,96L1440,96L1440,220L1380,220C1320,220,1200,220,1080,220C960,220,840,220,720,220C600,220,480,220,360,220C240,220,120,220,60,220L0,220Z">
                    <animate attributeName="d"
                             values="M0,96L60,90.7C120,85,240,75,360,80C480,85,600,107,720,112C840,117,960,107,1080,101.3C1200,96,1320,96,1380,96L1440,96L1440,220L1380,220C1320,220,1200,220,1080,220C960,220,840,220,720,220C600,220,480,220,360,220C240,220,120,220,60,220L0,220Z;
                                    M0,128L60,117.3C120,107,240,85,360,90.7C480,96,600,128,720,133.3C840,139,960,117,1080,112C1200,107,1320,117,1380,122.7L1440,128L1440,220L1380,220C1320,220,1200,220,1080,220C960,220,840,220,720,220C600,220,480,220,360,220C240,220,120,220,60,220L0,220Z;
                                    M0,96L60,90.7C120,85,240,75,360,80C480,85,600,107,720,112C840,117,960,107,1080,101.3C1200,96,1320,96,1380,96L1440,96L1440,220L1380,220C1320,220,1200,220,1080,220C960,220,840,220,720,220C600,220,480,220,360,220C240,220,120,220,60,220L0,220Z"
                             dur="<?= $duree ?>"
                             repeatCount="indefinite" />
                </path>

                <!-- Deuxième vague avec animation décalée -->
                <path fill="<?= $couleur_primaire ?>" opacity="0.3"
                      d="M0,160L60,149.3C120,139,240,117,360,128C480,139,600,181,720,186.7C840,192,960,160,1080,144C1200,128,1320,128,1380,128L1440,128L1440,220L1380,220C1320,220,1200,220,1080,220C960,220,840,220,720,220C600,220,480,220,360,220C240,220,120,220,60,220L0,220Z">
                    <animate attributeName="d"
                             values="M0,160L60,149.3C120,139,240,117,360,128C480,139,600,181,720,186.7C840,192,960,160,1080,144C1200,128,1320,128,1380,128L1440,128L1440,220L1380,220C1320,220,1200,220,1080,220C960,220,840,220,720,220C600,220,480,220,360,220C240,220,120,220,60,220L0,220Z;
                                    M0,128L60,133.3C120,139,240,149,360,144C480,139,600,117,720,122.7C840,128,960,160,1080,165.3C1200,171,1320,149,1380,138.7L1440,128L1440,220L1380,220C1320,220,1200,220,1080,220C960,220,840,220,720,220C600,220,480,220,360,220C240,220,120,220,60,220L0,220Z;
                                    M0,160L60,149.3C120,139,240,117,360,128C480,139,600,181,720,186.7C840,192,960,160,1080,144C1200,128,1320,128,1380,128L1440,128L1440,220L1380,220C1320,220,1200,220,1080,220C960,220,840,220,720,220C600,220,480,220,360,220C240,220,120,220,60,220L0,220Z"
                             dur="<?= $duree ?>"
                             begin="<?= round($duree / 2) ?>s"
                             repeatCount="indefinite" />
                </path>
            </svg>

        <?php elseif ($type === 'ocean-waves'): ?>
            <!-- Vagues océaniques sophistiquées avec particules flottantes -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 280"
                 style="position: absolute; width: 100%; height: 100%;">
                <defs>
                    <!-- Dégradé principal océanique -->
                    <linearGradient id="<?= $unique_id ?>_ocean" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:1">
                            <animate attributeName="stop-opacity" values="0.9;1;0.9" dur="<?= $duree ?>" repeatCount="indefinite"/>
                        </stop>
                        <stop offset="30%" style="stop-color:<?= $couleur_secondaire ?>;stop-opacity:0.8">
                            <animate attributeName="stop-opacity" values="0.8;0.95;0.8" dur="<?= $duree ?>" repeatCount="indefinite"/>
                        </stop>
                        <stop offset="70%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:0.7">
                            <animate attributeName="stop-opacity" values="0.7;0.9;0.7" dur="<?= $duree ?>" repeatCount="indefinite"/>
                        </stop>
                        <stop offset="100%" style="stop-color:<?= $couleur_secondaire ?>;stop-opacity:0.9">
                            <animate attributeName="stop-opacity" values="0.9;1;0.9" dur="<?= $duree ?>" repeatCount="indefinite"/>
                        </stop>
                    </linearGradient>

                    <!-- Dégradé pour les reflets -->
                    <radialGradient id="<?= $unique_id ?>_reflet" cx="50%" cy="30%" r="60%">
                        <stop offset="0%" style="stop-color:<?= $couleur_secondaire ?>;stop-opacity:0.4" />
                        <stop offset="100%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:0.1" />
                    </radialGradient>

                    <!-- Filtre pour effet de flou léger -->
                    <filter id="<?= $unique_id ?>_blur" x="-50%" y="-50%" width="200%" height="200%">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="0.5"/>
                    </filter>

                    <!-- Cercle pour particules -->
                    <circle id="<?= $unique_id ?>_bubble" r="2" fill="<?= $couleur_secondaire ?>" opacity="0.6">
                        <animate attributeName="opacity" values="0.3;0.8;0.3" dur="3s" repeatCount="indefinite"/>
                    </circle>
                </defs>

                <!-- Vague principale avec animation fluide -->
                <path fill="url(#<?= $unique_id ?>_ocean)"
                      d="M0,128L40,138.7C80,149,160,171,240,170.7C320,171,400,149,480,149.3C560,149,640,171,720,181.3C800,192,880,192,960,186.7C1040,181,1120,171,1200,165.3C1280,160,1360,160,1400,160L1440,160L1440,280L1400,280C1360,280,1280,280,1200,280C1120,280,1040,280,960,280C880,280,800,280,720,280C640,280,560,280,480,280C400,280,320,280,240,280C160,280,80,280,40,280L0,280Z">
                    <animate attributeName="d"
                             values="M0,128L40,138.7C80,149,160,171,240,170.7C320,171,400,149,480,149.3C560,149,640,171,720,181.3C800,192,880,192,960,186.7C1040,181,1120,171,1200,165.3C1280,160,1360,160,1400,160L1440,160L1440,280L1400,280C1360,280,1280,280,1200,280C1120,280,1040,280,960,280C880,280,800,280,720,280C640,280,560,280,480,280C400,280,320,280,240,280C160,280,80,280,40,280L0,280Z;
                                    M0,160L40,149.3C80,139,160,117,240,122.7C320,128,400,160,480,170.7C560,181,640,171,720,165.3C800,160,880,160,960,170.7C1040,181,1120,203,1200,208C1280,213,1360,203,1400,197.3L1440,192L1440,280L1400,280C1360,280,1280,280,1200,280C1120,280,1040,280,960,280C880,280,800,280,720,280C640,280,560,280,480,280C400,280,320,280,240,280C160,280,80,280,40,280L0,280Z;
                                    M0,192L40,181.3C80,171,160,149,240,138.7C320,128,400,128,480,144C560,160,640,192,720,197.3C800,203,880,181,960,170.7C1040,160,1120,160,1200,149.3C1280,139,1360,117,1400,106.7L1440,96L1440,280L1400,280C1360,280,1280,280,1200,280C1120,280,1040,280,960,280C880,280,800,280,720,280C640,280,560,280,480,280C400,280,320,280,240,280C160,280,80,280,40,280L0,280Z;
                                    M0,128L40,138.7C80,149,160,171,240,170.7C320,171,400,149,480,149.3C560,149,640,171,720,181.3C800,192,880,192,960,186.7C1040,181,1120,171,1200,165.3C1280,160,1360,160,1400,160L1440,160L1440,280L1400,280C1360,280,1280,280,1200,280C1120,280,1040,280,960,280C880,280,800,280,720,280C640,280,560,280,480,280C400,280,320,280,240,280C160,280,80,280,40,280L0,280Z"
                             dur="<?= $duree ?>"
                             repeatCount="indefinite" />
                </path>

                <!-- Deuxième vague plus claire -->
                <path fill="url(#<?= $unique_id ?>_reflet)" opacity="0.5"
                      d="M0,224L40,213.3C80,203,160,181,240,186.7C320,192,400,224,480,234.7C560,245,640,235,720,224C800,213,880,203,960,208C1040,213,1120,235,1200,240C1280,245,1360,235,1400,229.3L1440,224L1440,280L1400,280C1360,280,1280,280,1200,280C1120,280,1040,280,960,280C880,280,800,280,720,280C640,280,560,280,480,280C400,280,320,280,240,280C160,280,80,280,40,280L0,280Z">
                    <animate attributeName="d"
                             values="M0,224L40,213.3C80,203,160,181,240,186.7C320,192,400,224,480,234.7C560,245,640,235,720,224C800,213,880,203,960,208C1040,213,1120,235,1200,240C1280,245,1360,235,1400,229.3L1440,224L1440,280L1400,280C1360,280,1280,280,1200,280C1120,280,1040,280,960,280C880,280,800,280,720,280C640,280,560,280,480,280C400,280,320,280,240,280C160,280,80,280,40,280L0,280Z;
                                    M0,240L40,229.3C80,219,160,197,240,202.7C320,208,400,240,480,250.7C560,261,640,251,720,240C800,229,880,219,960,224C1040,229,1120,251,1200,256C1280,261,1360,251,1400,245.3L1440,240L1440,280L1400,280C1360,280,1280,280,1200,280C1120,280,1040,280,960,280C880,280,800,280,720,280C640,280,560,280,480,280C400,280,320,280,240,280C160,280,80,280,40,280L0,280Z;
                                    M0,208L40,197.3C80,187,160,165,240,170.7C320,176,400,208,480,218.7C560,229,640,219,720,208C800,197,880,187,960,192C1040,197,1120,219,1200,224C1280,229,1360,219,1400,213.3L1440,208L1440,280L1400,280C1360,280,1280,280,1200,280C1120,280,1040,280,960,280C880,280,800,280,720,280C640,280,560,280,480,280C400,280,320,280,240,280C160,280,80,280,40,280L0,280Z;
                                    M0,224L40,213.3C80,203,160,181,240,186.7C320,192,400,224,480,234.7C560,245,640,235,720,224C800,213,880,203,960,208C1040,213,1120,235,1200,240C1280,245,1360,235,1400,229.3L1440,224L1440,280L1400,280C1360,280,1280,280,1200,280C1120,280,1040,280,960,280C880,280,800,280,720,280C640,280,560,280,480,280C400,280,320,280,240,280C160,280,80,280,40,280L0,280Z"
                             dur="<?= $duree ?>"
                             begin="2s"
                             repeatCount="indefinite" />
                </path>

                <!-- Particules flottantes améliorées -->
                <g filter="url(#<?= $unique_id ?>_blur)">
                    <use href="#<?= $unique_id ?>_bubble" x="150" y="100">
                        <animateMotion dur="<?= $duree ?>" repeatCount="indefinite"
                                       path="M0,0 Q200,-20 400,10 Q600,-15 800,5 Q1000,20 1200,-10 T1440,0"/>
                        <animate attributeName="r" values="1;3;2;1" dur="4s" repeatCount="indefinite"/>
                    </use>
                    <use href="#<?= $unique_id ?>_bubble" x="350" y="140">
                        <animateMotion dur="<?= $duree ?>" repeatCount="indefinite"
                                       path="M0,0 Q150,15 300,-5 Q450,25 600,-10 Q750,15 900,-5 T1200,0" begin="1s"/>
                        <animate attributeName="r" values="2;1;3;2" dur="5s" repeatCount="indefinite"/>
                    </use>
                    <use href="#<?= $unique_id ?>_bubble" x="600" y="80">
                        <animateMotion dur="<?= $duree ?>" repeatCount="indefinite"
                                       path="M0,0 Q100,30 200,-15 Q300,20 400,-10 Q500,25 600,-5 T800,0" begin="3s"/>
                        <animate attributeName="r" values="1;2;1;3;1" dur="6s" repeatCount="indefinite"/>
                    </use>
                    <use href="#<?= $unique_id ?>_bubble" x="900" y="120">
                        <animateMotion dur="<?= $duree ?>" repeatCount="indefinite"
                                       path="M0,0 Q80,-10 160,15 Q240,-5 320,20 Q400,-15 480,10 T640,0" begin="1.5s"/>
                        <animate attributeName="r" values="2;1;2;1;3;2" dur="7s" repeatCount="indefinite"/>
                    </use>
                </g>
            </svg>

        <?php elseif ($type === 'single-wave'): ?>
            <!-- Une seule vague animée qui prend toute la largeur -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 200"
                 style="position: absolute; width: 100%; height: 100%;">
                <defs>
                    <!-- Dégradé horizontal fluide -->
                    <linearGradient id="<?= $unique_id ?>_single" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:1" />
                        <stop offset="50%" style="stop-color:<?= $couleur_secondaire ?>;stop-opacity:0.9" />
                        <stop offset="100%" style="stop-color:<?= $couleur_primaire ?>;stop-opacity:1" />
                    </linearGradient>
                </defs>

                <!-- Vague unique qui couvre toute la largeur -->
                <path fill="url(#<?= $unique_id ?>_single)"
                      d="M0,80L60,85.3C120,91,240,101,360,112C480,123,600,133,720,133.3C840,133,960,123,1080,122.7C1200,123,1320,133,1380,138.7L1440,144L1440,200L1380,200C1320,200,1200,200,1080,200C960,200,840,200,720,200C600,200,480,200,360,200C240,200,120,200,60,200L0,200Z">
                    <animate attributeName="d"
                             values="M0,80L60,85.3C120,91,240,101,360,112C480,123,600,133,720,133.3C840,133,960,123,1080,122.7C1200,123,1320,133,1380,138.7L1440,144L1440,200L1380,200C1320,200,1200,200,1080,200C960,200,840,200,720,200C600,200,480,200,360,200C240,200,120,200,60,200L0,200Z;
                                    M0,100L60,93.3C120,87,240,73,360,69.3C480,65,600,71,720,85.3C840,99,960,123,1080,133.3C1200,144,1320,144,1380,144L1440,144L1440,200L1380,200C1320,200,1200,200,1080,200C960,200,840,200,720,200C600,200,480,200,360,200C240,200,120,200,60,200L0,200Z;
                                    M0,120L60,117.3C120,115,240,109,360,101.3C480,93,600,85,720,90.7C840,96,960,115,1080,128C1200,141,1320,149,1380,153.3L1440,158L1440,200L1380,200C1320,200,1200,200,1080,200C960,200,840,200,720,200C600,200,480,200,360,200C240,200,120,200,60,200L0,200Z;
                                    M0,144L60,138.7C120,133,240,123,360,117.3C480,112,600,112,720,112C840,112,960,112,1080,106.7C1200,101,1320,91,1380,85.3L1440,80L1440,200L1380,200C1320,200,1200,200,1080,200C960,200,840,200,720,200C600,200,480,200,360,200C240,200,120,200,60,200L0,200Z;
                                    M0,80L60,85.3C120,91,240,101,360,112C480,123,600,133,720,133.3C840,133,960,123,1080,122.7C1200,123,1320,133,1380,138.7L1440,144L1440,200L1380,200C1320,200,1200,200,1080,200C960,200,840,200,720,200C600,200,480,200,360,200C240,200,120,200,60,200L0,200Z"
                             dur="<?= $duree ?>"
                             repeatCount="indefinite" />
                </path>
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


/**
 * Affichage de l'image de destination dans le footer
 * Récupère les données du Customizer et affiche l'image avec son contenu
 */
function afficher_destination_footer() {
    // Vérifier si la fonctionnalité est activée
    $destination_active = get_theme_mod('footer_destination_active', true);

    if (!$destination_active) {
        return;
    }

    // Récupérer les données du Customizer
    $image_url = get_theme_mod('footer_destination_image', '');
    $titre = get_theme_mod('footer_destination_titre', 'Destination du mois');
    $description = get_theme_mod('footer_destination_description', 'Découvrez notre destination recommandée pour cette période.');
    $lien = get_theme_mod('footer_destination_lien', '');

    // Si aucune image n'est sélectionnée, ne rien afficher
    if (empty($image_url)) {
        return;
    }

    ?>
    <div class="footer-destination">
        <h3 class="footer-destination__titre"><?php echo esc_html($titre); ?></h3>

        <div class="footer-destination__contenu">
            <div class="footer-destination__image">
                <?php if (!empty($lien)): ?>
                    <a href="<?php echo esc_url($lien); ?>" target="_blank" rel="noopener">
                        <img src="<?php echo esc_url($image_url); ?>"
                             alt="<?php echo esc_attr($titre); ?>"
                             loading="lazy">
                    </a>
                <?php else: ?>
                    <img src="<?php echo esc_url($image_url); ?>"
                         alt="<?php echo esc_attr($titre); ?>"
                         loading="lazy">
                <?php endif; ?>
            </div>

            <div class="footer-destination__texte">
                <p><?php echo esc_html($description); ?></p>

                <?php if (!empty($lien)): ?>
                    <a href="<?php echo esc_url($lien); ?>"
                       class="footer-destination__lien"
                       target="_blank"
                       rel="noopener">
                        En savoir plus →
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * NOUVELLE FONCTION : Génération des icônes sociales configurables via Customizer
 * Remplace l'ancienne fonction icone_sociaux() statique
 */
function icones_sociales_customizer() {
    // Liste des réseaux sociaux disponibles (doit correspondre au Customizer)
    $reseaux_sociaux = array(
        'github' => 'github',
        'facebook' => 'facebook',
        'instagram' => 'instagram',
        'twitter' => 'twitter',
        'linkedin' => 'linkedin',
        'youtube' => 'youtube',
        'tiktok' => 'tiktok'
    );

    // Récupérer les paramètres globaux
    $couleur = get_theme_mod('social_couleur', '#f5f5dc');
    $taille = get_theme_mod('social_taille', 32);

    // Convertir la couleur hex en format URL (sans #)
    $couleur_url = ltrim($couleur, '#');

    $icones_actives = false; // Pour vérifier s'il y a des icônes à afficher

    ob_start(); // Commencer la capture de sortie
    ?>
    <div class="icones-sociales">
        <?php
        foreach ($reseaux_sociaux as $reseau_id => $icon_name) {
            $actif = get_theme_mod("social_{$reseau_id}_active", false);
            $url = get_theme_mod("social_{$reseau_id}_url", '');

            if ($actif && !empty($url)) {
                $icones_actives = true;
                ?>
                <a href="<?php echo esc_url($url); ?>"
                   class="icone-sociale icone-<?php echo esc_attr($reseau_id); ?>"
                   target="_blank"
                   rel="noopener"
                   title="<?php echo esc_attr(ucfirst($reseau_id)); ?>">
                    <img src="https://s2.svgbox.net/social.svg?ic=<?php echo esc_attr($icon_name); ?>&color=<?php echo esc_attr($couleur_url); ?>"
                         width="<?php echo esc_attr($taille); ?>"
                         height="<?php echo esc_attr($taille); ?>"
                         alt="<?php echo esc_attr(ucfirst($reseau_id)); ?>"
                         loading="lazy">
                </a>
                <?php
            }
        }
        ?>
    </div>
    <?php

    $output = ob_get_clean(); // Récupérer le contenu capturé

    // Afficher seulement s'il y a des icônes actives
    if ($icones_actives) {
        echo $output;
    }
}

/**
 * Fonction de compatibilité - maintient l'ancienne interface mais utilise la nouvelle logique
 * @param string $couleur - Couleur pour compatibilité (sera ignorée, utilise le Customizer)
 */
function icone_sociaux($couleur = null) {
    // Rediriger vers la nouvelle fonction
    icones_sociales_customizer();
}
?>