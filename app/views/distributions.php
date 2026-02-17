<!-- ===== MAIN CONTENT ===== -->
<main class="main-content">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <i class="fas fa-home"></i>
        <span>/</span>
        <span class="breadcrumb-current">Simulation des Distributions</span>
    </div>

    <h2 class="page-title"><i class="fas fa-truck"></i> Simulation des Distributions</h2>

    <div class="d-flex gap-2 mb-3">
        <form method="get" action="<?= BASE_URL ?>/distributions" class="d-inline">
            <label for="mode" class="me-2">Mode de distribution :</label>
            <select name="mode" id="mode" class="form-select d-inline w-auto">
                <option value="ordre" <?= ($mode ?? 'ordre') == 'ordre' ? 'selected' : '' ?>>
                    <i class="fas fa-clock"></i> date plus recente
                </option>
                <option value="besoin" <?= ($mode ?? 'ordre') == 'besoin' ? 'selected' : '' ?>>
                    <i class="fas fa-sort-amount-down"></i> Plus petits besoins
                </option>
                <option value="proportionnel" <?= ($mode ?? 'ordre') == 'proportionnel' ? 'selected' : '' ?>>
                    <i class="fas fa-percentage"></i> Répartition proportionnelle
                </option>
            </select>
            <button type="submit" class="btn btn-info text-white ms-2">
                <i class="fas fa-eye me-1"></i> Simuler (Prévisualisation)
            </button>
        </form>
        <form action="<?= BASE_URL ?>/distributions/valider" method="post" style="display:inline;">
            <input type="hidden" name="mode" value="<?= $mode ?? 'ordre' ?>">
            <button type="submit" class="btn btn-success" onclick="return confirm('Voulez-vous vraiment valider et sauvegarder cette distribution ?')">
                <i class="fas fa-check-circle me-1"></i> Valider et Sauvegarder
            </button>
        </form>
        <a href="<?= BASE_URL ?>/clear" class="btn btn-danger text-white">
            <i class="fas fa-redo me-1"></i> Réinitialiser (Revenir à l'état initial)
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0"><i class="fas fa-list-alt text-info me-2"></i>Résultat de la simulation</h5>
            <span class="badge bg-info text-white"><?= count($distributions) ?> distributions</span>
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
                        <?php if (empty($distributions)) { ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="fas fa-info-circle me-1"></i> Aucune distribution à afficher. Ajoutez des dons et des besoins d'abord.
                                </td>
                            </tr>
                        <?php } else { ?>
                            <?php foreach ($distributions as $d) { ?>
                                <tr>
                                    <td><?= $d['date'] ?></td>
                                    <td><i class="fas fa-box-open text-success me-1"></i><?= $d['produit_nom'] ?></td>
                                    <td><?= number_format($d['don_quantite'], 0, ',', ' ') ?></td>
                                    <td><i class="fas fa-map-marker-alt text-primary me-1"></i><?= $d['ville'] ?></td>
                                    <td class="fw-semibold text-primary"><?= number_format($d['quantite_attribuee'], 0, ',', ' ') ?></td>
                                    <td class="fw-semibold <?= $d['reste_besoin'] > 0 ? 'text-warning' : 'text-success' ?>">
                                        <?= $d['reste_besoin'] <= 0 ? '✓ Complet' : number_format($d['reste_besoin'], 0, ',', ' ') ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="alert alert-light border mt-3">
        <i class="fas fa-info-circle text-info me-1"></i>
        <strong>Simuler</strong> = voir le résultat sans sauvegarder. 
        <strong>Valider</strong> = sauvegarder les distributions dans la base de données.
    </div>

</main>