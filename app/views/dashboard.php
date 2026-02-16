<!-- ===== MAIN CONTENT ===== -->
<main class="main-content">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <i class="fas fa-home"></i>
        <span>/</span>
        <span class="breadcrumb-current">Tableau de Bord</span>
    </div>

    <h2 class="page-title"><i class="fas fa-th-large"></i> Tableau de Bord</h2>

    <!-- Toolbar filtre -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-3 py-3">
            <div class="d-flex align-items-center gap-2">
                <label for="filterRegion" class="form-label mb-0 fw-semibold text-secondary">
                    <i class="fas fa-filter text-info me-1"></i> Région
                </label>
                <select class="form-select form-select-sm" id="filterRegion" style="width: 220px;">
                    <option value="all">Toutes les régions</option>
                    <option value="analamanga">Analamanga</option>
                    <option value="vakinankaratra">Vakinankaratra</option>
                    <option value="atsinanana">Atsinanana</option>
                </select>
            </div>
            <small class="text-muted"><span id="regionCount" class="fw-bold text-primary">3</span> région(s)
                affichée(s)</small>
        </div>
    </div>

    <!-- REGION : ANALAMANGA -->
    <div class="region-section mb-4" data-region="analamanga">
        <h5 class="fw-bold mb-3 pb-2 border-bottom"><i class="fas fa-map-marker-alt text-primary me-2"></i>Analamanga
        </h5>
        <div class="row g-3">

            <!-- Antananarivo -->
            <div class="col-xl-6 col-lg-6">
                <div class="card city-card h-100">
                    <a href="modele.php?page=ville&ville=antananarivo" class="city-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="city-icon"><i class="fas fa-city"></i></div>
                            <span class="city-name">Antananarivo</span>
                        </div>
                        <i class="fas fa-external-link-alt city-link-icon"></i>
                    </a>
                    <div class="card-body p-0">
                        <table class="table table-sm city-table mb-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Besoin</th>
                                    <th>Reçu</th>
                                    <th>Reste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-money-bill-wave text-primary me-1"></i>Financier</td>
                                    <td>5 000 000 Ar</td>
                                    <td class="text-success">3 200 000 Ar</td>
                                    <td class="text-danger">1 800 000 Ar</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-box-open text-success me-1"></i>Nature</td>
                                    <td>800 kg de riz</td>
                                    <td class="text-success">600 kg</td>
                                    <td class="text-danger">200 kg</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Ankazobe -->
            <div class="col-xl-6 col-lg-6">
                <div class="card city-card h-100">
                    <a href="modele.php?page=ville&ville=ankazobe" class="city-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="city-icon"><i class="fas fa-city"></i></div>
                            <span class="city-name">Ankazobe</span>
                        </div>
                        <i class="fas fa-external-link-alt city-link-icon"></i>
                    </a>
                    <div class="card-body p-0">
                        <table class="table table-sm city-table mb-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Besoin</th>
                                    <th>Reçu</th>
                                    <th>Reste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-money-bill-wave text-primary me-1"></i>Financier</td>
                                    <td>1 200 000 Ar</td>
                                    <td class="text-success">1 200 000 Ar</td>
                                    <td><span class="badge bg-success-subtle text-success">Complet</span></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-tools text-warning me-1"></i>Matériel</td>
                                    <td>50 bâches</td>
                                    <td class="text-success">30 unités</td>
                                    <td class="text-danger">20 unités</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Ambohidratrimo -->
            <div class="col-xl-6 col-lg-6">
                <div class="card city-card h-100">
                    <a href="modele.php?page=ville&ville=ambohidratrimo" class="city-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="city-icon"><i class="fas fa-city"></i></div>
                            <span class="city-name">Ambohidratrimo</span>
                        </div>
                        <i class="fas fa-external-link-alt city-link-icon"></i>
                    </a>
                    <div class="card-body p-0">
                        <table class="table table-sm city-table mb-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Besoin</th>
                                    <th>Reçu</th>
                                    <th>Reste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-box-open text-success me-1"></i>Nature</td>
                                    <td>400 kg de riz</td>
                                    <td class="text-success">400 kg</td>
                                    <td><span class="badge bg-success-subtle text-success">Complet</span></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-money-bill-wave text-primary me-1"></i>Financier</td>
                                    <td>2 000 000 Ar</td>
                                    <td class="text-success">750 000 Ar</td>
                                    <td class="text-danger">1 250 000 Ar</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- REGION : VAKINANKARATRA -->
    <div class="region-section mb-4" data-region="vakinankaratra">
        <h5 class="fw-bold mb-3 pb-2 border-bottom"><i
                class="fas fa-map-marker-alt text-primary me-2"></i>Vakinankaratra</h5>
        <div class="row g-3">

            <!-- Antsirabe -->
            <div class="col-xl-6 col-lg-6">
                <div class="card city-card h-100">
                    <a href="modele.php?page=ville&ville=antsirabe" class="city-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="city-icon"><i class="fas fa-city"></i></div>
                            <span class="city-name">Antsirabe</span>
                        </div>
                        <i class="fas fa-external-link-alt city-link-icon"></i>
                    </a>
                    <div class="card-body p-0">
                        <table class="table table-sm city-table mb-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Besoin</th>
                                    <th>Reçu</th>
                                    <th>Reste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-money-bill-wave text-primary me-1"></i>Financier</td>
                                    <td>3 500 000 Ar</td>
                                    <td class="text-success">2 100 000 Ar</td>
                                    <td class="text-danger">1 400 000 Ar</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-box-open text-success me-1"></i>Nature</td>
                                    <td>600 kg de riz</td>
                                    <td class="text-success">350 kg</td>
                                    <td class="text-danger">250 kg</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-tools text-warning me-1"></i>Matériel</td>
                                    <td>120 couvertures</td>
                                    <td class="text-success">120 unités</td>
                                    <td><span class="badge bg-success-subtle text-success">Complet</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Ambatolampy -->
            <div class="col-xl-6 col-lg-6">
                <div class="card city-card h-100">
                    <a href="modele.php?page=ville&ville=ambatolampy" class="city-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="city-icon"><i class="fas fa-city"></i></div>
                            <span class="city-name">Ambatolampy</span>
                        </div>
                        <i class="fas fa-external-link-alt city-link-icon"></i>
                    </a>
                    <div class="card-body p-0">
                        <table class="table table-sm city-table mb-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Besoin</th>
                                    <th>Reçu</th>
                                    <th>Reste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-money-bill-wave text-primary me-1"></i>Financier</td>
                                    <td>1 800 000 Ar</td>
                                    <td class="text-success">500 000 Ar</td>
                                    <td class="text-danger">1 300 000 Ar</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-box-open text-success me-1"></i>Nature</td>
                                    <td>300 kg de riz</td>
                                    <td class="text-success">300 kg</td>
                                    <td><span class="badge bg-success-subtle text-success">Complet</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Betafo -->
            <div class="col-xl-6 col-lg-6">
                <div class="card city-card h-100">
                    <a href="modele.php?page=ville&ville=betafo" class="city-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="city-icon"><i class="fas fa-city"></i></div>
                            <span class="city-name">Betafo</span>
                        </div>
                        <i class="fas fa-external-link-alt city-link-icon"></i>
                    </a>
                    <div class="card-body p-0">
                        <table class="table table-sm city-table mb-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Besoin</th>
                                    <th>Reçu</th>
                                    <th>Reste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-tools text-warning me-1"></i>Matériel</td>
                                    <td>80 tentes</td>
                                    <td class="text-success">25 unités</td>
                                    <td class="text-danger">55 unités</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- REGION : ATSINANANA -->
    <div class="region-section mb-4" data-region="atsinanana">
        <h5 class="fw-bold mb-3 pb-2 border-bottom"><i class="fas fa-map-marker-alt text-primary me-2"></i>Atsinanana
        </h5>
        <div class="row g-3">

            <!-- Toamasina -->
            <div class="col-xl-6 col-lg-6">
                <div class="card city-card h-100">
                    <a href="modele.php?page=ville&ville=toamasina" class="city-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="city-icon"><i class="fas fa-city"></i></div>
                            <span class="city-name">Toamasina</span>
                        </div>
                        <i class="fas fa-external-link-alt city-link-icon"></i>
                    </a>
                    <div class="card-body p-0">
                        <table class="table table-sm city-table mb-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Besoin</th>
                                    <th>Reçu</th>
                                    <th>Reste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-money-bill-wave text-primary me-1"></i>Financier</td>
                                    <td>8 000 000 Ar</td>
                                    <td class="text-success">4 500 000 Ar</td>
                                    <td class="text-danger">3 500 000 Ar</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-box-open text-success me-1"></i>Nature</td>
                                    <td>1 500 kg de riz</td>
                                    <td class="text-success">900 kg</td>
                                    <td class="text-danger">600 kg</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-tools text-warning me-1"></i>Matériel</td>
                                    <td>200 bâches</td>
                                    <td class="text-success">85 unités</td>
                                    <td class="text-danger">115 unités</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Brickaville -->
            <div class="col-xl-6 col-lg-6">
                <div class="card city-card h-100">
                    <a href="modele.php?page=ville&ville=brickaville" class="city-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="city-icon"><i class="fas fa-city"></i></div>
                            <span class="city-name">Brickaville</span>
                        </div>
                        <i class="fas fa-external-link-alt city-link-icon"></i>
                    </a>
                    <div class="card-body p-0">
                        <table class="table table-sm city-table mb-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Besoin</th>
                                    <th>Reçu</th>
                                    <th>Reste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-money-bill-wave text-primary me-1"></i>Financier</td>
                                    <td>2 500 000 Ar</td>
                                    <td class="text-success">2 500 000 Ar</td>
                                    <td><span class="badge bg-success-subtle text-success">Complet</span></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-box-open text-success me-1"></i>Nature</td>
                                    <td>700 kg de riz</td>
                                    <td class="text-success">450 kg</td>
                                    <td class="text-danger">250 kg</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Vatomandry -->
            <div class="col-xl-6 col-lg-6">
                <div class="card city-card h-100">
                    <a href="modele.php?page=ville&ville=vatomandry" class="city-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="city-icon"><i class="fas fa-city"></i></div>
                            <span class="city-name">Vatomandry</span>
                        </div>
                        <i class="fas fa-external-link-alt city-link-icon"></i>
                    </a>
                    <div class="card-body p-0">
                        <table class="table table-sm city-table mb-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Besoin</th>
                                    <th>Reçu</th>
                                    <th>Reste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-tools text-warning me-1"></i>Matériel</td>
                                    <td>60 kits hygiène</td>
                                    <td class="text-success">60 unités</td>
                                    <td><span class="badge bg-success-subtle text-success">Complet</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>