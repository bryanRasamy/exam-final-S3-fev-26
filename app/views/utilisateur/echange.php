<!-- Page header -->
<div class="page-header d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
  <div>
    <h1>Proposition d'échange</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/modele">Accueil</a></li>
        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/modele?page=liste-produits">Produits</a></li>
        <li class="breadcrumb-item active" aria-current="page">Échange</li>
      </ol>
    </nav>
  </div>
  <span class="exchange-status-badge pending">
    <i class="bi bi-clock-history me-1"></i>En attente de votre réponse
  </span>
</div>

<!-- Recap banner -->
<div class="exchange-recap mb-4">
  <div class="exchange-recap-user">
    <img src="https://ui-avatars.com/api/?name=Jean+Rakoto&background=E76F51&color=fff&size=40&rounded=true" alt="Jean Rakoto">
    <div>
      <strong>Jean Rakoto</strong> souhaite échanger avec vous
      <span class="exchange-recap-date">Il y a 2 heures</span>
    </div>
  </div>
</div>

<!-- Exchange layout -->
<div class="exchange-layout">

  <!-- LEFT: Ses produits -->
  <div class="exchange-side">
    <div class="exchange-card">
      <div class="exchange-card-header">
        <div class="exchange-card-label other">
          <i class="bi bi-gift me-1"></i>Il propose
        </div>
        <span class="exchange-card-count">3 produits</span>
      </div>

      <!-- Main image -->
      <div class="exchange-gallery">
        <div class="exchange-gallery-main">
          <img src="https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=500&h=380&fit=crop" alt="Montre Sport GPS" id="galleryMainLeft">
        </div>
        <div class="exchange-gallery-thumbs">
          <button class="exchange-thumb active" onclick="changeMainImage('galleryMainLeft', this)">
            <img src="https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=120&h=90&fit=crop" alt="Montre Sport">
          </button>
          <button class="exchange-thumb" onclick="changeMainImage('galleryMainLeft', this)">
            <img src="https://images.unsplash.com/photo-1546868871-af0de0ae72be?w=120&h=90&fit=crop" alt="Enceinte Bluetooth">
          </button>
          <button class="exchange-thumb" onclick="changeMainImage('galleryMainLeft', this)">
            <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=120&h=90&fit=crop" alt="Sneakers">
          </button>
        </div>
      </div>

      <!-- Items -->
      <div class="exchange-product-list">
        <div class="exchange-product-item">
          <img src="https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=60&h=60&fit=crop" alt="Montre" class="exchange-item-thumb">
          <div class="exchange-product-info">
            <span class="exchange-product-name">Montre Sport GPS</span>
            <span class="exchange-product-cat">Électronique &middot; Très bon état</span>
          </div>
          <span class="exchange-product-price">245 000 Ar</span>
        </div>
        <div class="exchange-product-item">
          <img src="https://images.unsplash.com/photo-1546868871-af0de0ae72be?w=60&h=60&fit=crop" alt="Enceinte" class="exchange-item-thumb">
          <div class="exchange-product-info">
            <span class="exchange-product-name">Enceinte Bluetooth JBL</span>
            <span class="exchange-product-cat">Électronique &middot; Bon état</span>
          </div>
          <span class="exchange-product-price">180 000 Ar</span>
        </div>
        <div class="exchange-product-item">
          <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=60&h=60&fit=crop" alt="Sneakers" class="exchange-item-thumb">
          <div class="exchange-product-info">
            <span class="exchange-product-name">Sneakers Running Pro</span>
            <span class="exchange-product-cat">Sport &middot; Comme neuf</span>
          </div>
          <span class="exchange-product-price">120 000 Ar</span>
        </div>
      </div>

      <div class="exchange-total">
        <span>Valeur totale</span>
        <strong>545 000 Ar</strong>
      </div>
    </div>
  </div>

  <!-- CENTER -->
  <div class="exchange-center">
    <div class="exchange-icon-wrapper">
      <i class="bi bi-arrow-left-right"></i>
    </div>
    <div class="exchange-diff-pill">
      +125 000 Ar
    </div>
  </div>

  <!-- RIGHT: Mon produit -->
  <div class="exchange-side">
    <div class="exchange-card">
      <div class="exchange-card-header">
        <div class="exchange-card-label you">
          <i class="bi bi-box-seam me-1"></i>Votre produit
        </div>
        <span class="exchange-card-count">1 produit</span>
      </div>

      <div class="exchange-gallery">
        <div class="exchange-gallery-main">
          <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&h=380&fit=crop" alt="Casque Audio Premium" id="galleryMainRight">
        </div>
        <div class="exchange-gallery-thumbs">
          <button class="exchange-thumb active" onclick="changeMainImage('galleryMainRight', this)">
            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=120&h=90&fit=crop" alt="Casque Audio - 1">
          </button>
          <button class="exchange-thumb" onclick="changeMainImage('galleryMainRight', this)">
            <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=120&h=90&fit=crop" alt="Casque Audio - 2">
          </button>
          <button class="exchange-thumb" onclick="changeMainImage('galleryMainRight', this)">
            <img src="https://images.unsplash.com/photo-1545127398-14699f92334b?w=120&h=90&fit=crop" alt="Casque Audio - 3">
          </button>
        </div>
      </div>

      <div class="exchange-product-list">
        <div class="exchange-product-item">
          <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=60&h=60&fit=crop" alt="Casque" class="exchange-item-thumb">
          <div class="exchange-product-info">
            <span class="exchange-product-name">Casque Audio Premium</span>
            <span class="exchange-product-cat">Électronique &middot; Très bon état</span>
          </div>
          <span class="exchange-product-price">420 000 Ar</span>
        </div>
      </div>

      <div class="exchange-total">
        <span>Valeur</span>
        <strong>420 000 Ar</strong>
      </div>
    </div>
  </div>

</div>

<!-- Actions -->
<div class="exchange-actions-bar mt-4 mb-5">
  <a href="<?= BASE_URL ?>/modele?page=mes-produits" class="btn btn-outline-secondary">
    <i class="bi bi-arrow-left me-1"></i>Retour
  </a>
  <div class="d-flex gap-2">
    <button class="btn btn-outline-danger" id="btnRefuse">
      <i class="bi bi-x-lg me-1"></i>Refuser
    </button>
    <button class="btn btn-propose" id="btnAccept">
      <i class="bi bi-check-lg me-1"></i>Accepter l'échange
    </button>
  </div>
</div>

<script>
function changeMainImage(mainId, thumbBtn) {
  const main = document.getElementById(mainId);
  const thumbImg = thumbBtn.querySelector('img');
  const src = thumbImg.src.replace('w=120&h=90', 'w=500&h=380');
  main.src = src;
  thumbBtn.closest('.exchange-gallery-thumbs').querySelectorAll('.exchange-thumb').forEach(t => t.classList.remove('active'));
  thumbBtn.classList.add('active');
}

document.getElementById('btnAccept')?.addEventListener('click', () => {
  if (confirm('Accepter cet échange ?')) {
    alert('Échange accepté ! Le propriétaire sera notifié.');
    window.location.href = '<?= BASE_URL ?>/modele?page=mes-produits';
  }
});

document.getElementById('btnRefuse')?.addEventListener('click', () => {
  if (confirm('Refuser cet échange ?')) {
    alert('Échange refusé.');
    window.location.href = '<?= BASE_URL ?>/modele?page=mes-produits';
  }
});
</script>
