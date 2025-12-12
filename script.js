// On attend que tout le contenu de la page soit chargé avant d'exécuter le script
document.addEventListener('DOMContentLoaded', () => {

    // 1. Récupérer les éléments du DOM
    const themeToggleButton = document.getElementById('theme-toggle-btn');
    const body = document.body;

    // 2. Fonction pour appliquer un thème
    function applyTheme(theme) {
        if (theme === 'dark') {
            body.classList.add('dark-theme');
        } else {
            body.classList.remove('dark-theme');
        }
    }

    // 3. Vérifier si un thème est déjà sauvegardé dans le localStorage
    const savedTheme = localStorage.getItem('theme') || 'claire'; // 'claire' par défaut
    applyTheme(savedTheme);

    // 4. Ajouter l'écouteur d'événement pour le clic sur le bouton
    themeToggleButton.addEventListener('click', () => {
        // On vérifie si le thème actuel est sombre
        const isDarkMode = body.classList.contains('dark-theme');
        
        // On inverse le thème
        if (isDarkMode) {
            applyTheme('claire');
            localStorage.setItem('theme', 'claire'); // On sauvegarde le nouveau choix
        } else {
            applyTheme('dark');
            localStorage.setItem('theme', 'dark'); // On sauvegarde le nouveau choix
        }
    });

});