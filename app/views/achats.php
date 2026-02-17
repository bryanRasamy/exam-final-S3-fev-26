<main class="main-content">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <i class="fas fa-home"></i>
        <span>/</span>
        <span class="breadcrumb-current">Achats avec dons en argent</span>
    </div>

    <h2 class="page-title"><i class="fas fa-shopping-cart"></i> Achats via Dons en Argent</h2>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body d-flex align-items-center gap-3">
            <div class="p-3 rounded-3" style="background: linear-gradient(135deg, #28a745, #20c997);">
                <i class="fas fa-money-bill-wave fa-2x text-white"></i>
            </div>
            <div>
                <h6 class="text-muted mb-0">Argent disponible</h6>
                <h4 class="fw-bold text-success mb-0" id="argentDispo">
                    <?= number_format($argentDispo, 0, ',', ' ') ?> Ar
                </h4>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white border-bottom py-3">
            <h5 class="fw-bold mb-0"><i class="fas fa-cog text-warning me-2"></i>Configuration des frais</h5>
        </div>
        <div class="card-body">
            <div class="row align-items-end">
                <div class="col-md-4">
                    <label for="fraisPourcent" class="form-label fw-semibold">Frais d'achat (%)</label>
                    <input type="number" class="form-control" id="fraisPourcent" value="10" min="0" max="100" step="1">
                </div>
            </div>
        </div>
    </div>

    <div id="messageAlerte" class="d-none"></div>
    
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0"><i class="fas fa-list text-primary me-2"></i>Besoins restants</h5>
            <div>
                <select class="form-select form-select-sm" id="filtreVille" onchange="filtrerParVille()">
                    <option value="all">Toutes les villes</option>
                    <?php
                    
                    $villesUniques = [];
                    foreach ($besoinsRestants as $b) {
                        if (!in_array($b['ville'], $villesUniques)) {
                            $villesUniques[] = $b['ville'];
                        }
                    }
                    foreach ($villesUniques as $v) { ?>
                        <option value="<?= htmlspecialchars($v) ?>"><?= htmlspecialchars($v) ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm city-table mb-0">
                    <thead>
                        <tr>
                            <th>Ville</th>
                            <th>Produit</th>
                            <th>Catégorie</th>
                            <th>Prix unitaire</th>
                            <th>Besoin total</th>
                            <th>Déjà reçu</th>
                            <th>Reste</th>
                            <th>Quantité à acheter</th>
                            <th>Coût estimé</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="besoinsTableBody">
                        <?php if (empty($besoinsRestants)) { ?>
                            <tr>
                                <td colspan="10" class="text-center text-muted py-4">
                                    <i class="fas fa-check-circle text-success me-1"></i> Tous les besoins sont couverts !
                                </td>
                            </tr>
                        <?php } else { ?>
                            <?php foreach ($besoinsRestants as $b) { ?>
                                <tr class="ligne-besoin" data-ville="<?= htmlspecialchars($b['ville']) ?>">
                                    <td><i class="fas fa-map-marker-alt text-primary me-1"></i><?= htmlspecialchars($b['ville']) ?></td>
                                    <td><i class="fas fa-box-open text-success me-1"></i><?= htmlspecialchars($b['produit']) ?></td>
                                    <td><?= htmlspecialchars($b['categorie']) ?></td>
                                    <td><?= number_format($b['prix_unitaire'], 0, ',', ' ') ?> Ar</td>
                                    <td class="fw-semibold"><?= number_format($b['besoin_total'], 0, ',', ' ') ?></td>
                                    <td class="text-success"><?= number_format($b['deja_recu'], 0, ',', ' ') ?></td>
                                    <td class="text-danger fw-bold"><?= number_format($b['reste'] - $b['deja_achete'], 0, ',', ' ') ?></td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm input-qte" 
                                               id="qte_<?= $b['id_besoin'] ?>" 
                                               min="1" max="<?= $b['reste'] - $b['deja_achete'] ?>" 
                                               value="<?= $b['reste'] - $b['deja_achete'] ?>"
                                               data-prix="<?= $b['prix_unitaire'] ?>"
                                               onchange="calculerCout(<?= $b['id_besoin'] ?>)"
                                               onkeyup="calculerCout(<?= $b['id_besoin'] ?>)"
                                               style="width:90px">
                                    </td>
                                    <td>
                                        <span id="cout_<?= $b['id_besoin'] ?>" class="fw-semibold text-primary">
                                            -- Ar
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-success" onclick="acheter(<?= $b['id_besoin'] ?>)">
                                            <i class="fas fa-shopping-cart me-1"></i> Acheter
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>

function calculerCout(idBesoin) {
    var qte = document.getElementById('qte_' + idBesoin).value;
    var prix = document.getElementById('qte_' + idBesoin).getAttribute('data-prix');
    var frais = document.getElementById('fraisPourcent').value;

    var coutBase = qte * prix;
    var coutTotal = coutBase + (coutBase * frais / 100);

    document.getElementById('cout_' + idBesoin).textContent = 
        new Intl.NumberFormat('fr-FR').format(coutTotal) + ' Ar';
}


function filtrerParVille() {
    var ville = document.getElementById('filtreVille').value;
    var lignes = document.querySelectorAll('.ligne-besoin');

    lignes.forEach(function(ligne) {
        if (ville === 'all' || ligne.getAttribute('data-ville') === ville) {
            ligne.style.display = '';
        } else {
            ligne.style.display = 'none';
        }
    });
}


function acheter(idBesoin) {
    var qte = document.getElementById('qte_' + idBesoin).value;
    var frais = document.getElementById('fraisPourcent').value;

    if (!qte || qte <= 0) {
        afficherMessage('Veuillez saisir une quantité valide.', 'danger');
        return;
    }

    if (!confirm('Confirmer l\'achat de ' + qte + ' unités avec ' + frais + '% de frais ?')) {
        return;
    }

    
    var formData = new FormData();
    formData.append('id_besoin', idBesoin);
    formData.append('quantite', qte);
    formData.append('frais_pourcent', frais);

    
    fetch('<?= BASE_URL ?>/api/achat', {
        method: 'POST',
        body: formData
    })
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        if (data.erreur) {
            afficherMessage(data.erreur, 'danger');
        } else {
            afficherMessage(
                'Achat effectué ! Coût total : ' + new Intl.NumberFormat('fr-FR').format(data.cout_total) + ' Ar', 
                'success'
            );
            
            setTimeout(function() {
                window.location.reload();
            }, 1500);
        }
    })
    .catch(function(error) {
        afficherMessage('Erreur : ' + error, 'danger');
    });
}


function afficherMessage(texte, type) {
    var div = document.getElementById('messageAlerte');
    div.className = 'alert alert-' + type + ' alert-dismissible fade show';
    div.innerHTML = '<i class="fas fa-' + (type === 'success' ? 'check-circle' : 'exclamation-triangle') + ' me-1"></i>' 
                    + texte 
                    + '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
}


document.addEventListener('DOMContentLoaded', function() {
    var inputs = document.querySelectorAll('.input-qte');
    inputs.forEach(function(input) {
        var id = input.id.replace('qte_', '');
        calculerCout(id);
    });
});
</script>
