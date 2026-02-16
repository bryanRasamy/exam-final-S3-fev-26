Nettoyage des assets CSS/JS

But : réduire l'encombrement des fichiers Bootstrap en gardant uniquement les fichiers utilisés par le projet et en archivant le reste.

Fichiers conservés (référencés dans `index.php`)
- assets/css/bootstrap.min.css
- assets/css/bootstrap.min.css.map
- assets/css/form.css
- assets/js/bootstrap.bundle.min.js
- assets/js/bootstrap.bundle.min.js.map
- assets/js/form.js
- assets/js/validation.js

Fichiers archivés (exemple)
- assets/_archive/bootstrap/css/*  (grid, reboot, utilities, rtl, css non-min etc.)
- assets/_archive/bootstrap/js/*   (bootstrap.js, min.js, esm.*, bundle non-min etc.)

Procédure recommandée (exécuter `scripts/cleanup-assets.sh`)
1. Ouvrir un terminal à la racine du projet
2. Exécuter : `sh scripts/cleanup-assets.sh`
3. Vérifier les changements : `git status`
4. Créer une branche et committer (exemples fournis par le script)

Remarques
- Le script déplace les fichiers vers `assets/_archive/bootstrap` (sécurisé). Tu peux supprimer l'archive plus tard si tout est ok.
- Si tu préfères supprimer plutôt qu'archiver, adapte le script (`rm` au lieu de `mv`).
- Si tu veux que je pousse les commits, donne l'accès (ou autorise l'exécution git dans l'environnement).