<?php
// --- PARTIE 1 : LA LOGIQUE PHP (Toujours en premier) ---

// On décide du thème à afficher.
// Par défaut, le thème est 'claire'.
// Si l'URL contient "?theme=fonce", alors le thème devient 'fonce'.
$theme = (isset($_GET['theme']) && $_GET['theme'] == 'fonce') ? 'fonce' : 'claire';

// On prépare les variables pour le titre de la page et le lien du bouton
if ($theme == 'claire') {
    $pageTitle = 'Portfolio - Version Claire';
    $boutonLien = 'index.php?theme=fonce';
    $boutonTexte = 'Passer à la version foncée';
    $h1Texte = 'Robin Boisseau';
} else {
    $pageTitle = 'Portfolio - Version Foncée';
    $boutonLien = 'index.php?theme=claire';
    $boutonTexte = 'Passer à la version claire';
    $h1Texte = 'Robin Boisseau';
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!-- Le titre de la page est dynamique grâce à la variable PHP -->
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    
    <!-- --- PARTIE 2 : LE CSS DYNAMIQUE --- -->
    <style>
        /* --- Styles Communs (qui ne changent pas avec le thème) --- */
        header {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            min-height: 10vh; /* Hauteur minimale pour l'en-tête */
        }

        /* Style pour la photo de profil */
    .profile-photo {
        height: 60px;  /* On réduit la taille à 60px */
        width: 60px;   /* Hauteur et largeur doivent être identiques pour un cercle parfait */
        border-radius: 50%; /* C'est la propriété magique qui la rend ronde ! */
        object-fit: cover; /* Très important : s'assure que l'image remplit le cercle sans être déformée ou écrasée */
        border: 2px solid; /* On garde la bordure, sa couleur est définie plus bas dans le code du thème */
    }

        h1 {
            margin: 0;
            font-size: 1.8em;
        }
        
        main {
            padding: 40px 20px;
            text-align: center;
            min-height: 70vh; /* Hauteur minimale pour le contenu principal */
        }
        
        footer {
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }

        /* --- Styles du bouton (structure) --- */
        .bouton {
            display: inline-block;
            padding: 12px 24px;
            font-weight: bold;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.15s ease-out;
        }

        .bouton:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
        }

        .bouton:active {
            transform: translateY(1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        <?php
        // --- Ici, PHP va écrire le CSS qui dépend du thème ---
        if ($theme == 'claire'):
        ?>

            /* --- STYLES DU THÈME CLAIR --- */
            body {
                background-color: #80F0E0;
                color: #001F3F;
            }
            footer {
                background-color: #001F3F;
                color: #80F0E0;
            }
            .bouton {
                background-color: #001F3F;
                color: #80F0E0;
                border-bottom: 3px solid #001429;
            }
            .bouton:hover {
                background-color: #003366;
                color: #FFFFFF;
            }
        
        <?php else: ?>

            /* --- STYLES DU THÈME FONCÉ --- */
            body {
                background-color: #001F3F;
                color: #80F0E0;
            }
            footer {
                background-color: #80F0E0;
                color: #001F3F;
            }
            .bouton {
                background-color: #80F0E0;
                color: #001F3F;
                border-bottom: 3px solid #61bdb1;
            }
            .bouton:hover {
                background-color: #a2f2e7;
                color: #000000;
            }

        <?php endif; ?>

    </style>
</head>
<body>

    <!-- --- PARTIE 3 : LE HTML DYNAMIQUE --- -->
    <header>
        <img src="images/profile.png" alt="Photo de profil" class="profile-photo">

        <!-- Le titre et le bouton changent en fonction du thème -->
        <h1><?php echo htmlspecialchars($h1Texte); ?></h1>
        <a href="<?php echo htmlspecialchars($boutonLien); ?>" class="bouton"><?php echo htmlspecialchars($boutonTexte); ?></a>
    </header>

    <main>
        <h2>Mes Projets</h2>
        <p>Bientôt ici, la liste de mes réalisations...</p>
        <p>Le thème actuel est : <strong><?php echo $theme; ?></strong>.</p>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Mon Portfolio. Tous droits réservés.</p>
    </footer>

</body>
</html>