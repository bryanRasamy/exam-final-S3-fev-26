<main class="main-content">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <i class="fas fa-home"></i>
        <span>/</span>
        <span class="breadcrumb-current">Récapitulation</span>
    </div>

    <h2 class="page-title"><i class="fas fa-chart-bar"></i> Récapitulation des Besoins</h2>

    <!-- Bouton Actualiser en Ajax -->
    <div class="mb-3">
        <button id="btnActualiser" class="btn btn-primary" onclick="actualiserRecap()">
            <i class="fas fa-sync-alt me-1"></i> Actualiser les données
        </button>
    </div>

    <!-- Cartes résumé (totaux) -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2"><i class="fas fa-clipboard-list fa-2x text-primary"></i></div>
                    <h6 class="text-muted">Besoins Totaux</h6>
                    <h4 class="fw-bold text-primary" id="totalBesoin">-- Ar</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2"><i class="fas fa-check-circle fa-2x text-success"></i></div>
                    <h6 class="text-muted">Besoins Satisfaits</h6>
                    <h4 class="fw-bold text-success" id="totalSatisfait">-- Ar</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2"><i class="fas fa-exclamation-triangle fa-2x text-danger"></i></div>
                    <h6 class="text-muted">Besoins Restants</h6>
                    <h4 class="fw-bold text-danger" id="totalRestant">-- Ar</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau détaillé -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-3">
            <h5 class="fw-bold mb-0"><i class="fas fa-table text-info me-2"></i>Détail par ville et produit</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm city-table mb-0">
                    <thead>
                        <tr>
                            <th>Région</th>
                            <th>Ville</th>
                            <th>Produit</th>
                            <th>Catégorie</th>
                            <th>Prix Unit.</th>
                            <th>Besoin (qté)</th>
                            <th>Besoin (Ar)</th>
                            <th>Reçu (qté)</th>
                            <th>Reçu (Ar)</th>
                            <th>Reste (Ar)</th>
                        </tr>
                    </thead>
                    <tbody id="recapTableBody">
                        <tr>
                            <td colspan="10" class="text-center text-muted py-4">
                                <i class="fas fa-info-circle me-1"></i> Cliquez sur "Actualiser" pour charger les données.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
function formatAr(nombre) {
    return new Intl.NumberFormat('fr-FR').format(nombre) + ' Ar';
}

function actualiserRecap() {
    var btn = document.getElementById('btnActualiser');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Chargement...';

    
    fetch('<?= BASE_URL ?>/api/recapitulation')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            var totalBesoin = 0;
            var totalSatisfait = 0;
            var totalRestant = 0;

            var html = '';
            for (var i = 0; i < data.length; i++) {
                var row = data[i];
                totalBesoin += Number(row.besoin_montant);
                totalSatisfait += Number(row.recu_montant);
                totalRestant += Number(row.reste_montant);

                html += '<tr>';
                html += '<td>' + row.region + '</td>';
                html += '<td><i class="fas fa-map-marker-alt text-primary me-1"></i>' + row.ville + '</td>';
                html += '<td><i class="fas fa-box-open text-success me-1"></i>' + row.produit + '</td>';
                html += '<td>' + row.categorie + '</td>';
                html += '<td>' + formatAr(row.prix_unitaire) + '</td>';
                html += '<td class="fw-semibold">' + new Intl.NumberFormat('fr-FR').format(row.besoin_quantite) + '</td>';
                html += '<td class="fw-semibold">' + formatAr(row.besoin_montant) + '</td>';
                html += '<td class="text-success">' + new Intl.NumberFormat('fr-FR').format(row.recu_quantite) + '</td>';
                html += '<td class="text-success">' + formatAr(row.recu_montant) + '</td>';

                // Couleur selon le reste
                if (Number(row.reste_montant) <= 0) {
                    html += '<td class="text-success fw-bold">✓ Complet</td>';
                } else {
                    html += '<td class="text-danger fw-bold">' + formatAr(row.reste_montant) + '</td>';
                }

                html += '</tr>';
            }

            // Si aucune donnée
            if (data.length === 0) {
                html = '<tr><td colspan="10" class="text-center text-muted py-4">Aucun besoin enregistré.</td></tr>';
            }

            // Mettre à jour le tableau et les totaux
            document.getElementById('recapTableBody').innerHTML = html;
            document.getElementById('totalBesoin').textContent = formatAr(totalBesoin);
            document.getElementById('totalSatisfait').textContent = formatAr(totalSatisfait);
            document.getElementById('totalRestant').textContent = formatAr(totalRestant);

            // Remettre le bouton en état normal
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-sync-alt me-1"></i> Actualiser les données';
        })
        .catch(function(error) {
            alert('Erreur lors du chargement : ' + error);
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-sync-alt me-1"></i> Actualiser les données';
        });
}

// Charger automatiquement au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    actualiserRecap();
});
</script>
