<!-- ===== MAIN CONTENT ===== -->
<main class="main-content">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <i class="fas fa-home"></i>
        <span>/</span>
        <span class="breadcrumb-current">Simulation des Distributions</span>
    </div>

    <h2 class="page-title"><i class="fas fa-truck"></i> Simulation des Distributions</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0"><i class="fas fa-list-alt text-info me-2"></i>Liste des distributions simulées</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm city-table mb-0">
                    <thead>
                        <tr>
                            <th>Date don</th>
                            <th>Don</th>
                            <th>Quantité don</th>
                            <th>Ville attribuée</th>
                            <th>Quantité attribuée</th>
                            <th>Reste besoin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($distributions as $d) { ?>
                            <tr>
                                <td><?= $d['date'] ?></td>
                                <td><i class="fas fa-box-open text-success me-1"></i><?= $d['produit_nom'] ?></td>
                                <td><?= $d['don_quantite'] ?></td>
                                <td><i class="fas fa-map-marker-alt text-primary me-1"></i><?= $d['ville'] ?></td>
                                <td class="fw-semibold text-primary"><?= $d['quantite_attribuee'] ?></td>
                                <td class="fw-semibold <?= $d['reste_besoin'] > 0 ? 'text-warning' : 'text-success' ?>"><?= $d['reste_besoin'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>