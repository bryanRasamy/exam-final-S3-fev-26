<main class="main-content">
    <h2 class="page-title"><i class="fas fa-th-large"></i> Tableau de Bord</h2>

    <?php foreach ($villesGroupées as $nomRegion => $villes) : ?>
        <div class="region-section mb-4">
            <h5 class="fw-bold mb-3 pb-2 border-bottom">
                <i class="fas fa-map-marker-alt text-primary me-2"></i><?= htmlspecialchars($nomRegion) ?>
            </h5>
            <div class="row g-3">
                <?php foreach ($villes as $nomVille => $info) : ?>
                    <div class="col-xl-6">
                        <div class="card city-card h-100 shadow-sm border-0">
                            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-dark"><i class="fas fa-city me-2"></i><?= htmlspecialchars($nomVille) ?></span>
                                <a href="modele.php?page=ville&id=<?= $info['id'] ?>" class="btn btn-sm btn-outline-primary border-0"><i class="fas fa-external-link-alt"></i></a>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-sm mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="ps-3">Type</th>
                                            <th>Besoin</th>
                                            <th>Reçu</th>
                                            <th>Reste</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($info['categories'] as $cat) : ?>
                                            <tr>
                                                <td class="ps-3 text-secondary"><?= htmlspecialchars($cat['type']) ?></td>
                                                <td class="fw-semibold"><?= number_format($cat['besoin'], 0, ',', ' ') ?></td>
                                                <td class="text-success"><?= number_format($cat['recu'], 0, ',', ' ') ?></td>
                                                <td class="<?= $cat['reste'] > 0 ? 'text-danger' : 'text-muted' ?> fw-bold">
                                                    <?= $cat['reste'] <= 0 && $cat['besoin'] > 0 ? 'Complet' : number_format($cat['reste'], 0, ',', ' ') ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</main>