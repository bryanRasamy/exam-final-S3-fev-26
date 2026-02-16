<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takalo-Takalo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/produits.css">
</head>

<body>

    <?php
    $currentPage = isset($_GET['page']) ? $_GET['page'] : '';
    if (!empty($currentPage)) {
        $contentPage = $currentPage . ".php";
    } else {
        $contentPage = "liste-produits.php"; // Page par défaut
    }
    ?>

    <!-- ============================================
       HEADER
       ============================================ -->
    <header class="app-header d-flex align-items-center px-3 px-lg-4">
        <!-- Burger (mobile) -->
        <button class="btn sidebar-toggle btn-icon me-2" id="sidebarToggle" aria-label="Menu">
            <i class="bi bi-list fs-5"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="/modele">
            <span class="brand-icon"><i class="bi bi-arrow-left-right"></i></span>
            Takalo-Takalo
        </a>

        <!-- Spacer -->
        <div class="flex-grow-1"></div>

        <!-- Right actions -->
        <div class="header-actions d-flex align-items-center gap-2">
            <button class="btn-icon d-lg-none" title="Rechercher"><i class="bi bi-search"></i></button>
            <button class="btn-icon" title="Notifications">
                <i class="bi bi-bell"></i>
                <span class="badge-dot"></span>
            </button>
            <button class="btn-icon" title="Messages"><i class="bi bi-chat-dots"></i></button>
            <img src="https://ui-avatars.com/api/?name=U&background=2A9D8F&color=fff&size=36&rounded=true&bold=true"
                alt="avatar" class="header-avatar ms-1">
        </div>
    </header>

    <!-- ============================================
       SIDEBAR — vertical navbar
       ============================================ -->
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <aside class="app-sidebar" id="appSidebar">

        <!-- Main nav -->
        <div class="sidebar-section">
            <div class="sidebar-section-title">Menu principal</div>
            <nav class="sidebar-nav nav flex-column">
                <a class="nav-link<?= $currentPage === 'liste-produits' ? ' active' : '' ?>" href="/modele?page=liste-produits">
                    <i class="bi bi-basket3"></i> Tous les produits
                </a>
                <a class="nav-link<?= $currentPage === 'mes-produits' ? ' active' : '' ?>" href="/modele?page=mes-produits">
                    <i class="bi bi-box-seam"></i> Mes produits
                </a>
                <a class="nav-link<?= $currentPage === 'ajouter-produit' ? ' active' : '' ?>" href="/modele?page=ajouter-produit">
                    <i class="bi bi-plus-circle"></i> Ajouter un produit
                </a>
                <a class="nav-link<?= $currentPage === 'echange' ? ' active' : '' ?>" href="/modele?page=echange">
                    <i class="bi bi-arrow-left-right"></i> Échanges
                </a>
            </nav>
        </div>

        <!-- Secondary nav -->
        <div class="sidebar-section">
            <div class="sidebar-section-title">Mon compte</div>
            <nav class="sidebar-nav nav flex-column">
                <a class="nav-link" href="#">
                    <i class="bi bi-person"></i> Profil
                </a>
                <a class="nav-link text-danger" href="<?= BASE_URL ?>/">
                    <i class="bi bi-box-arrow-left"></i> Déconnexion
                </a>
            </nav>
        </div>

        <!-- User block (bottom) -->
        <div class="sidebar-user">
            <div class="sidebar-user-avatar">U</div>
            <div class="sidebar-user-info">
                <div class="sidebar-user-name">Utilisateur</div>
                <div class="sidebar-user-role">Membre</div>
            </div>
        </div>
    </aside>

    <!-- ============================================
       MAIN CONTENT — zone d'include
       ============================================ -->
    <main class="app-main">

        <!-- ========== PAGE CONTENT (include here) ========== -->
        <?php //if (isset($contentPage) && file_exists($contentPage)): ?>
            <?php include $contentPage; ?>
        <?php //endif; ?>
        <!-- ========== /PAGE CONTENT ========== -->

    </main>

    <!-- ============================================
       FOOTER
       ============================================ -->
    <footer class="app-footer">
        <span>&copy; <?= date('Y') ?> Takalo-Takalo — Tous droits réservés</span>
        <div class="footer-devs">
            <span class="dev-tag"><i class="bi bi-code-slash"></i> DV0001</span>
            <span class="dev-tag"><i class="bi bi-code-slash"></i> DV0002</span>
            <span class="dev-tag"><i class="bi bi-code-slash"></i> DV0003</span>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="<?= BASE_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle (mobile)
        const toggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('appSidebar');
        const backdrop = document.getElementById('sidebarBackdrop');

        function openSidebar() { sidebar.classList.add('show'); backdrop.classList.add('show'); }
        function closeSidebar() { sidebar.classList.remove('show'); backdrop.classList.remove('show'); }

        if (toggle) toggle.addEventListener('click', () => sidebar.classList.contains('show') ? closeSidebar() : openSidebar());
        if (backdrop) backdrop.addEventListener('click', closeSidebar);
    </script>
</body>

</html>