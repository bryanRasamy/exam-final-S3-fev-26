<!-- Page header -->
<div class="page-header d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
  <div>
    <h1>Ajouter un produit</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/modele">Accueil</a></li>
        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/modele?page=mes-produits">Mes produits</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Add Product Form -->
<div class="row justify-content-center">
  <div class="col-lg-10 col-xl-8">
    <form id="addProductForm" class="product-form" novalidate>

      <!-- Images -->
      <div class="form-card mb-4">
        <h2 class="form-card-title"><i class="bi bi-images me-2"></i>Photos du produit</h2>
        <p class="form-card-desc">Ajoutez jusqu'à 5 photos. La première sera la photo principale.</p>

        <div class="image-upload-zone" id="imageUploadZone">
          <div class="image-upload-placeholder" id="uploadPlaceholder">
            <i class="bi bi-cloud-arrow-up"></i>
            <span>Glissez vos images ici ou <strong>cliquez pour parcourir</strong></span>
            <small>JPEG, PNG — max 5 Mo par image</small>
          </div>
          <input type="file" id="productImages" accept="image/jpeg,image/png" multiple hidden>
        </div>

        <div class="image-preview-list" id="imagePreviewList"></div>
      </div>

      <!-- General Info -->
      <div class="form-card mb-4">
        <h2 class="form-card-title"><i class="bi bi-info-circle me-2"></i>Informations générales</h2>

        <div class="mb-3">
          <label for="productName" class="form-label">Nom du produit <span class="text-danger">*</span></label>
          <input type="text" id="productName" class="form-control" placeholder="Ex: Casque Audio Premium" required>
          <div class="invalid-feedback">Veuillez entrer le nom du produit.</div>
        </div>

        <div class="row g-3 mb-3">
          <div class="col-sm-6">
            <label for="productCategory" class="form-label">Catégorie <span class="text-danger">*</span></label>
            <select id="productCategory" class="form-select" required>
              <option value="" disabled selected>Choisir une catégorie</option>
              <option value="electronique">Électronique</option>
              <option value="sport">Sport</option>
              <option value="mode">Mode</option>
              <option value="accessoires">Accessoires</option>
              <option value="maison">Maison & Déco</option>
              <option value="livres">Livres & Media</option>
              <option value="vehicules">Véhicules</option>
              <option value="autre">Autre</option>
            </select>
            <div class="invalid-feedback">Veuillez choisir une catégorie.</div>
          </div>
          <div class="col-sm-6">
            <label for="productState" class="form-label">État <span class="text-danger">*</span></label>
            <select id="productState" class="form-select" required>
              <option value="" disabled selected>Choisir l'état</option>
              <option value="neuf">Neuf</option>
              <option value="comme-neuf">Comme neuf</option>
              <option value="tres-bon">Très bon état</option>
              <option value="bon">Bon état</option>
              <option value="acceptable">Acceptable</option>
            </select>
            <div class="invalid-feedback">Veuillez indiquer l'état du produit.</div>
          </div>
        </div>

        <div class="mb-3">
          <label for="productDescription" class="form-label">Description <span class="text-danger">*</span></label>
          <textarea id="productDescription" class="form-control" rows="4" placeholder="Décrivez votre produit en détail : marque, modèle, caractéristiques…" required></textarea>
          <div class="d-flex justify-content-between mt-1">
            <div class="invalid-feedback">Veuillez ajouter une description (min. 20 caractères).</div>
            <small class="text-muted ms-auto"><span id="descCount">0</span>/500</small>
          </div>
        </div>
      </div>

      <!-- Valeur & Échange -->
      <div class="form-card mb-4">
        <h2 class="form-card-title"><i class="bi bi-arrow-left-right me-2"></i>Valeur & Échange</h2>

        <div class="row g-3 mb-3">
          <div class="col-sm-6">
            <label for="productPrice" class="form-label">Valeur estimée (Ar) <span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="number" id="productPrice" class="form-control" placeholder="0" min="0" required>
              <span class="input-group-text">Ar</span>
            </div>
            <div class="invalid-feedback">Veuillez indiquer une valeur estimée.</div>
          </div>
          <div class="col-sm-6">
            <label for="productLocation" class="form-label">Localisation</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
              <input type="text" id="productLocation" class="form-control" placeholder="Ex: Antananarivo">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="productExchangeFor" class="form-label">Échange souhaité contre</label>
          <textarea id="productExchangeFor" class="form-control" rows="2" placeholder="Ex: Smartphone, tablette, ou tout appareil électronique de valeur équivalente…"></textarea>
          <small class="text-muted">Décrivez ce que vous recherchez en échange (optionnel).</small>
        </div>
      </div>

      <!-- Actions -->
      <div class="form-actions d-flex flex-wrap gap-3 justify-content-between align-items-center mb-5">
        <a href="<?= BASE_URL ?>/modele?page=mes-produits" class="btn btn-outline-secondary">
          <i class="bi bi-arrow-left me-1"></i>Annuler
        </a>
        <div class="d-flex gap-2">
          <button type="button" class="btn btn-outline-secondary" id="btnDraft">
            <i class="bi bi-archive me-1"></i>Brouillon
          </button>
          <button type="submit" class="btn btn-propose">
            <i class="bi bi-check-lg me-1"></i>Publier le produit
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
(function() {
  const form = document.getElementById('addProductForm');
  const imageZone = document.getElementById('imageUploadZone');
  const imageInput = document.getElementById('productImages');
  const previewList = document.getElementById('imagePreviewList');
  const descField = document.getElementById('productDescription');
  const descCount = document.getElementById('descCount');
  let uploadedFiles = [];

  /* ---- Image Upload ---- */
  imageZone.addEventListener('click', () => imageInput.click());

  imageZone.addEventListener('dragover', e => {
    e.preventDefault();
    imageZone.classList.add('dragover');
  });

  imageZone.addEventListener('dragleave', () => {
    imageZone.classList.remove('dragover');
  });

  imageZone.addEventListener('drop', e => {
    e.preventDefault();
    imageZone.classList.remove('dragover');
    handleFiles(e.dataTransfer.files);
  });

  imageInput.addEventListener('change', () => {
    handleFiles(imageInput.files);
    imageInput.value = '';
  });

  function handleFiles(files) {
    const remaining = 5 - uploadedFiles.length;
    const toAdd = Array.from(files).slice(0, remaining);

    toAdd.forEach(file => {
      if (!file.type.match('image/(jpeg|png)')) return;
      if (file.size > 5 * 1024 * 1024) return;

      uploadedFiles.push(file);
      const reader = new FileReader();
      reader.onload = e => addPreview(e.target.result, uploadedFiles.length - 1);
      reader.readAsDataURL(file);
    });

    updateUploadZone();
  }

  function addPreview(src, index) {
    const div = document.createElement('div');
    div.className = 'image-preview-item';
    div.dataset.index = index;
    div.innerHTML = `
      <img src="${src}" alt="Aperçu">
      ${index === 0 ? '<span class="image-main-badge">Principale</span>' : ''}
      <button type="button" class="image-remove" data-index="${index}"><i class="bi bi-x-lg"></i></button>
    `;
    previewList.appendChild(div);

    div.querySelector('.image-remove').addEventListener('click', e => {
      e.stopPropagation();
      uploadedFiles.splice(index, 1);
      renderPreviews();
    });
  }

  function renderPreviews() {
    previewList.innerHTML = '';
    uploadedFiles.forEach((file, i) => {
      const reader = new FileReader();
      reader.onload = e => addPreview(e.target.result, i);
      reader.readAsDataURL(file);
    });
    updateUploadZone();
  }

  function updateUploadZone() {
    const placeholder = document.getElementById('uploadPlaceholder');
    if (uploadedFiles.length >= 5) {
      placeholder.style.display = 'none';
    } else {
      placeholder.style.display = '';
    }
  }

  /* ---- Description counter ---- */
  descField.addEventListener('input', () => {
    const len = descField.value.length;
    descCount.textContent = len;
    if (len > 500) descField.value = descField.value.substring(0, 500);
  });

  /* ---- Validation ---- */
  form.addEventListener('submit', e => {
    e.preventDefault();
    if (!form.checkValidity()) {
      e.stopPropagation();
      form.classList.add('was-validated');
      return;
    }
    // Success — simulate
    alert('Produit publié avec succès !');
    window.location.href = '<?= BASE_URL ?>/modele?page=mes-produits';
  });

  document.getElementById('btnDraft').addEventListener('click', () => {
    alert('Brouillon enregistré !');
    window.location.href = '<?= BASE_URL ?>/modele?page=mes-produits';
  });
})();
</script>
