<!-- ===== MAIN CONTENT ===== -->
<main class="main-content">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <i class="fas fa-home"></i>
        <span>/</span>
        <span class="breadcrumb-current">Évaluation des Besoins</span>
    </div>

    <h2 class="page-title"><i class="fas fa-clipboard-list"></i> Évaluation des Besoins</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-3">
            <h5 class="fw-bold mb-0"><i class="fas fa-edit text-primary me-2"></i>Enregistrer un besoin sinistré</h5>
        </div>
        <div class="card-body p-4">
            <form action="<?= BASE_URL ?>/besoin/insert" method="post">
                <?php if(!empty($resultats)){
                    foreach($resultats as $resultat){
                        if(isset($resultat['ville'])){
                            $allville=$resultat['ville'];
                        }
                        
                        if(isset($resultat['produit'])){
                            $allproduit=$resultat['produit'];
                        }
                    }
                ?>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="ville" class="form-label fw-semibold">Ville</label>
                        <select class="form-select" id="ville" name="id_ville">
                            <option value="">-- Choisir la ville --</option>
                            <?php foreach($allville as $ville){ ?>
                                <option value="<?= $ville['id_ville'] ?>"><?= $ville['ville'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="produit" class="form-label fw-semibold">Produit</label>
                        <select class="form-select" id="produit" name="id_produit">
                            <option value="">-- Choisir le produit --</option>
                            <?php foreach($allproduit as $produit){ ?>
                                <option value="<?= $produit['id_produit'] ?>"><?= $produit['nom'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php } ?>
                    <div class="col-md-6">
                        <label for="quantite" class="form-label fw-semibold">Quantité</label>
                        <input type="number" class="form-control" id="quantite" name="quantite" placeholder="Ex: 500" min="1">
                    </div>
                    <div class="col-12 pt-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-1"></i> Enregistrer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>