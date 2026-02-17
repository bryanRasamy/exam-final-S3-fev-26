<main class="main-content">
    <div class="breadcrumb mb-4">
        <i class="fas fa-home"></i>
        <span>/</span>
        <span class="breadcrumb-current">Détails <?= htmlspecialchars($ville['ville']) ?></span>
    </div>

    <div class="ville-hero mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="ville-hero-icon"><i class="fas fa-city"></i></div>
            <div>
                <h2 class="ville-hero-title"><?= htmlspecialchars($ville['ville']) ?></h2>
                <span class="ville-region-badge"><i class="fas fa-map-marker-alt me-1"></i><?= htmlspecialchars($ville['region']) ?></span>
            </div>
        </div>
    </div>

    <?php foreach ($categories as $nomCat => $produits): 
        $icon = "fa-box text-secondary";
        $colorClass = "bg-secondary";
        if (stripos($nomCat, 'finan') !== false) { $icon = "fa-money-bill-wave text-primary"; $colorClass = "bg-primary"; }
        elseif (stripos($nomCat, 'natur') !== false) { $icon = "fa-leaf text-success"; $colorClass = "bg-success"; }
        elseif (stripos($nomCat, 'matér') !== false) { $icon = "fa-tools text-warning"; $colorClass = "bg-warning"; }
    ?>
        
        <div class="card city-card shadow-sm border-0 mb-4">
            <div class="city-card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <div class="city-icon"><i class="fas <?= $icon ?>"></i></div>
                    <span class="city-name text-capitalize"><?= htmlspecialchars($nomCat) ?></span>
                </div>
                <span class="badge rounded-pill <?= $colorClass ?>"><?= count($produits) ?> produit(s)</span>
            </div>
            
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Produit</th>
                            <th>Besoin total</th>
                            <th>Don reçu</th>
                            <th>Reste à combler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produits as $p): 
                            $unite = (stripos($nomCat, 'finan') !== false) ? " Ar" : ((stripos($nomCat, 'natur') !== false) ? " kg" : " unités");
                        ?>
                            <tr class="align-middle">
                                <td class="ps-4 fw-medium text-dark"><?= htmlspecialchars($p['nom_produit']) ?></td>
                                <td><?= number_format($p['besoin_produit'], 0, ',', ' ') ?><?= $unite ?></td>
                                <td class="text-success fw-semibold"><?= number_format($p['recu_produit'], 0, ',', ' ') ?><?= $unite ?></td>
                                <td>
                                    <?php if ($p['reste_produit'] <= 0): ?>
                                        <span class="badge bg-success-subtle text-success border border-success-subtle">
                                            <i class="fas fa-check-circle me-1"></i>Complet
                                        </span>
                                    <?php else: ?>
                                        <span class="text-danger fw-bold">
                                            <?= number_format($p['reste_produit'], 0, ',', ' ') ?><?= $unite ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach; ?>

</main>