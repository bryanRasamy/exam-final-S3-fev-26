<!-- ===== MAIN CONTENT ===== -->
<main class="main-content">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <i class="fas fa-home"></i>
        <span>/</span>
        <span class="breadcrumb-current">Enregistrement des Dons</span>
    </div>

    <h2 class="page-title"><i class="fas fa-hand-holding-heart"></i> Enregistrement des Dons</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-3">
            <h5 class="fw-bold mb-0"><i class="fas fa-gift text-success me-2"></i>Enregistrer un don</h5>
        </div>
        <div class="card-body p-4">
            <form action="<?= BASE_URL ?>/dons/insert" method="post">
                <?php if(!empty($resultats)){
                    foreach($resultats as $resultat){
                        if(isset($resultat['produit'])){
                            $allproduit=$resultat['produit'];
                        }
                    }
                ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="donateur" class="form-label fw-semibold">Donateur</label>
                            <input type="text" class="form-control" id="donateur" placeholder="Nom ou organisme" name="donateur">
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
                        <div class="col-md-6">
                            <label for="quantite" class="form-label fw-semibold">Quantité</label>
                            <input type="text" class="form-control" id="quantite" placeholder="Ex: 500 000 Ar, 100 kg..." name="quantite">
                        </div>
                        <div class="col-md-6">
                            <label for="date_don" class="form-label fw-semibold">Date de don</label>
                            <input type="date" class="form-control" id="date_don" name="date_don">
                        </div>
                        <div class="col-12 pt-2">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fas fa-plus-circle me-1"></i> Ajouter le don
                            </button>
                        </div>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>

</main>