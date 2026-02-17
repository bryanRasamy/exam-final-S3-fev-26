<!-- ===== MAIN CONTENT ===== -->
<main class="main-content">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <i class="fas fa-home"></i>
        <span>/</span>
        <span class="breadcrumb-current">Ajout de Produit</span>
    </div>

    <h2 class="page-title"><i class="fas fa-box-open"></i> Ajout de Produit</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-3">
            <h5 class="fw-bold mb-0"><i class="fas fa-plus text-primary me-2"></i>Enregistrer un nouveau produit</h5>
        </div>
        <div class="card-body p-4">
            <form action="<?= BASE_URL ?>/produits/insert" method="post">
                <?php if(!empty($resultats)){
                    foreach($resultats as $resultat){
                        if(isset($resultat['categorie'])){
                            $allcategorie=$resultat['categorie'];
                        }
                    }
                ?>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="categorie" class="form-label fw-semibold">Catégorie</label>
                        <select class="form-select" id="categorie" name="id_categorie">
                            <option value="">-- Choisir la catégorie --</option>
                            <?php foreach($allcategorie as $categorie){ ?>
                                <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['categorie'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nom" class="form-label fw-semibold">Nom du produit</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Ex: Riz, Huile, Savon...">
                    </div>
                    <div class="col-md-6">
                        <label for="prix_unitaire" class="form-label fw-semibold">Prix unitaire</label>
                        <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" placeholder="Ex: 2500.00" min="0" step="0.01">
                    </div>
                    <div class="col-12 pt-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-1"></i> Enregistrer
                        </button>
                    </div>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>

</main>
