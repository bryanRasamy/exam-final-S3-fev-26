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
            <form>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="ville" class="form-label fw-semibold">Ville</label>
                        <select class="form-select" id="ville">
                            <option value="">-- Choisir la ville --</option>
                            <optgroup label="Analamanga">
                                <option value="antananarivo">Antananarivo</option>
                                <option value="ankazobe">Ankazobe</option>
                                <option value="ambohidratrimo">Ambohidratrimo</option>
                            </optgroup>
                            <optgroup label="Vakinankaratra">
                                <option value="antsirabe">Antsirabe</option>
                                <option value="ambatolampy">Ambatolampy</option>
                                <option value="betafo">Betafo</option>
                            </optgroup>
                            <optgroup label="Atsinanana">
                                <option value="toamasina">Toamasina</option>
                                <option value="brickaville">Brickaville</option>
                                <option value="vatomandry">Vatomandry</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="besoin" class="form-label fw-semibold">Besoin</label>
                        <input type="text" class="form-control" id="besoin"
                            placeholder="Ex: Nourriture pour 200 familles...">
                    </div>
                    <div class="col-md-6">
                        <label for="produit" class="form-label fw-semibold">Produit</label>
                        <select class="form-select" id="produit">
                            <option value="">-- Choisir le produit --</option>
                            <optgroup label="Alimentaire">
                                <option value="riz">Riz</option>
                                <option value="huile">Huile</option>
                                <option value="sucre">Sucre</option>
                                <option value="eau_potable">Eau potable</option>
                                <option value="conserves">Conserves</option>
                            </optgroup>
                            <optgroup label="Matériel">
                                <option value="baches">Bâches</option>
                                <option value="tentes">Tentes</option>
                                <option value="couvertures">Couvertures</option>
                                <option value="kits_hygiene">Kits hygiène</option>
                                <option value="ustensiles">Ustensiles de cuisine</option>
                            </optgroup>
                            <optgroup label="Médical">
                                <option value="medicaments">Médicaments</option>
                                <option value="kits_premiers_soins">Kits premiers soins</option>
                                <option value="moustiquaires">Moustiquaires</option>
                            </optgroup>
                            <optgroup label="Vêtements">
                                <option value="vetements_adultes">Vêtements adultes</option>
                                <option value="vetements_enfants">Vêtements enfants</option>
                                <option value="chaussures">Chaussures</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="quantite" class="form-label fw-semibold">Quantité</label>
                        <input type="number" class="form-control" id="quantite" placeholder="Ex: 500" min="1">
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