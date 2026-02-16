<?php

if (!isset($_GET['page'])) {
    $page = 'dashboard';
} else {
    $page = $_GET['page'];
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BNGRC &mdash; Tableau de Bord</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>

<body>

    <!-- ========== HEADER ========== -->
    <header class="header">
        <div class="header-left">
            <button class="sidebar-toggle" id="sidebarToggle" aria-label="Menu">
                <i class="fas fa-bars"></i>
            </button>
            <div class="header-brand">
                <div class="header-logo">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <div>
                    <h1 class="header-title">BNGRC</h1>
                    <span class="header-subtitle">Collectes & Distributions de Dons</span>
                </div>
            </div>
        </div>
        <div class="header-right">
            <div class="header-badge">
                <i class="fas fa-bell"></i>
                <span class="badge-dot"></span>
            </div>
            <div class="header-user">
                <div class="avatar">A</div>
                <div class="user-info">
                    <span class="user-name">Administrateur</span>
                    <span class="user-role">Gestionnaire</span>
                </div>
            </div>
        </div>
    </header>

    <!-- ========== LAYOUT ========== -->
    <div class="app-layout">

        <!-- ===== SIDEBAR NAV ===== -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-section">
                <span class="sidebar-label">Navigation</span>
                <ul class="nav-list">
                    <li>
                        <a href="<?= BASE_URL ?>/modele" class="nav-link">
                            <span class="nav-icon"><i class="fas fa-th-large"></i></span>
                            <span class="nav-text">Tableau de Bord</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-section">
                <span class="sidebar-label">Gestion</span>
                <ul class="nav-list">
                    <li>
                        <a href="<?= BASE_URL ?>/modele?page=besoins" class="nav-link">
                            <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                            <span class="nav-text">Évaluation des Besoins</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>/modele?page=dons" class="nav-link">
                            <span class="nav-icon"><i class="fas fa-hand-holding-heart"></i></span>
                            <span class="nav-text">Enregistrement des Dons</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL ?>/modele?page=distributions" class="nav-link">
                            <span class="nav-icon"><i class="fas fa-truck"></i></span>
                            <span class="nav-text">Simulation des Distributions</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <div class="sidebar-app-info">
                    <i class="fas fa-shield-alt"></i>
                    <span>BNGRC v1.0</span>
                </div>
            </div>
        </nav>

        <!-- ===== OVERLAY MOBILE ===== -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <?php include $page . ".php"; ?>

    </div>

    <!-- ========== FOOTER ========== -->
    <footer class="footer">
        <div class="footer-left">
            <i class="fas fa-hands-helping footer-icon"></i>
            <span>&copy; 2026 <strong>BNGRC</strong> &mdash; Suivi des Collectes & Distributions</span>
        </div>
        <div class="footer-devs">
            <span class="footer-label"><i class="fas fa-code"></i> Équipe Dev</span>
            <span class="dev-badge">ETU003905</span>
            <span class="dev-badge">ETU003962</span>
            <span class="dev-badge">ETU004018</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/script.js"></script>
</body>

</html>