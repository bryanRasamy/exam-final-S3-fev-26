<!-- Page header -->
<div class="page-header d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
  <div>
    <h1>Mes produits</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/modele">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Mes produits</li>
      </ol>
    </nav>
  </div>
  <a href="<?= BASE_URL ?>/modele?page=ajouter-produit" class="btn btn-propose">
    <i class="bi bi-plus-lg me-2"></i>Ajouter un produit
  </a>
</div>

<!-- Products Grid -->
<div class="row g-4">
  
  <!-- Product Card 1 -->
  <div class="col-sm-6 col-lg-4 col-xl-3">
    <a href="<?= BASE_URL ?>/modele?page=produit" class="product-card-link">
      <div class="product-card">
        <div class="product-image">
          <img src="https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=400&h=300&fit=crop" alt="Montre Sport">
          <span class="product-badge emerald">Disponible</span>
        </div>
        <div class="product-body">
          <h3 class="product-title">Montre Sport GPS</h3>
          <div class="product-price">245 000</div>
          <div class="product-owner">
            <img src="https://ui-avatars.com/api/?name=Vous&background=2A9D8F&color=fff&size=32&rounded=true" alt="Vous">
            <span>Vous</span>
          </div>
          <div class="product-footer">
            <span class="product-category"><i class="bi bi-tag"></i> Sport</span>
            <button class="btn-action" title="Modifier">
              <i class="bi bi-pencil"></i>
            </button>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Product Card 2 -->
  <div class="col-sm-6 col-lg-4 col-xl-3">
    <a href="<?= BASE_URL ?>/modele?page=produit" class="product-card-link">
      <div class="product-card">
        <div class="product-image">
          <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&h=300&fit=crop" alt="Collection Livres">
          <span class="product-badge emerald">Disponible</span>
        </div>
        <div class="product-body">
          <h3 class="product-title">Collection Livres Tech</h3>
          <div class="product-price">65 000</div>
          <div class="product-owner">
            <img src="https://ui-avatars.com/api/?name=Vous&background=2A9D8F&color=fff&size=32&rounded=true" alt="Vous">
            <span>Vous</span>
          </div>
          <div class="product-footer">
            <span class="product-category"><i class="bi bi-tag"></i> Livres</span>
            <button class="btn-action" title="Modifier">
              <i class="bi bi-pencil"></i>
            </button>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Product Card 3 -->
  <div class="col-sm-6 col-lg-4 col-xl-3">
    <a href="<?= BASE_URL ?>/modele?page=produit" class="product-card-link">
      <div class="product-card">
        <div class="product-image">
          <img src="https://images.unsplash.com/photo-1560343090-f0409e92791a?w=400&h=300&fit=crop" alt="Appareil Photo">
          <span class="product-badge amber">En échange</span>
        </div>
        <div class="product-body">
          <h3 class="product-title">Appareil Photo Vintage</h3>
          <div class="product-price">320 000</div>
          <div class="product-owner">
            <img src="https://ui-avatars.com/api/?name=Vous&background=2A9D8F&color=fff&size=32&rounded=true" alt="Vous">
            <span>Vous</span>
          </div>
          <div class="product-footer">
            <span class="product-category"><i class="bi bi-tag"></i> Photo</span>
            <button class="btn-action" title="Modifier">
              <i class="bi bi-pencil"></i>
            </button>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Product Card 4 -->
  <div class="col-sm-6 col-lg-4 col-xl-3">
    <a href="<?= BASE_URL ?>/modele?page=produit" class="product-card-link">
      <div class="product-card">
        <div class="product-image">
          <img src="https://images.unsplash.com/photo-1609081219090-a6d81d3085bf?w=400&h=300&fit=crop" alt="Lampe Design">
          <span class="product-badge emerald">Disponible</span>
        </div>
        <div class="product-body">
          <h3 class="product-title">Lampe Bureau Design</h3>
          <div class="product-price">95 000</div>
          <div class="product-owner">
            <img src="https://ui-avatars.com/api/?name=Vous&background=2A9D8F&color=fff&size=32&rounded=true" alt="Vous">
            <span>Vous</span>
          </div>
          <div class="product-footer">
            <span class="product-category"><i class="bi bi-tag"></i> Déco</span>
            <button class="btn-action" title="Modifier">
              <i class="bi bi-pencil"></i>
            </button>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Product Card 5 -->
  <div class="col-sm-6 col-lg-4 col-xl-3">
    <a href="<?= BASE_URL ?>/modele?page=produit" class="product-card-link">
      <div class="product-card">
        <div class="product-image">
          <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=300&fit=crop" alt="Casque Audio">
          <span class="product-badge emerald">Disponible</span>
        </div>
        <div class="product-body">
          <h3 class="product-title">Casque Audio Premium</h3>
          <div class="product-price">420 000</div>
          <div class="product-owner">
            <img src="https://ui-avatars.com/api/?name=Vous&background=2A9D8F&color=fff&size=32&rounded=true" alt="Vous">
            <span>Vous</span>
          </div>
          <div class="product-footer">
            <span class="product-category"><i class="bi bi-tag"></i> Électronique</span>
            <button class="btn-action" title="Modifier">
              <i class="bi bi-pencil"></i>
            </button>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Product Card 6 -->
  <div class="col-sm-6 col-lg-4 col-xl-3">
    <a href="<?= BASE_URL ?>/modele?page=produit" class="product-card-link">
      <div class="product-card">
        <div class="product-image">
          <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=400&h=300&fit=crop" alt="Sneakers">
          <span class="product-badge emerald">Disponible</span>
        </div>
        <div class="product-body">
          <h3 class="product-title">Sneakers Running Pro</h3>
          <div class="product-price">180 000</div>
          <div class="product-owner">
            <img src="https://ui-avatars.com/api/?name=Vous&background=2A9D8F&color=fff&size=32&rounded=true" alt="Vous">
            <span>Vous</span>
          </div>
          <div class="product-footer">
            <span class="product-category"><i class="bi bi-tag"></i> Sport</span>
            <button class="btn-action" title="Modifier">
              <i class="bi bi-pencil"></i>
            </button>
          </div>
        </div>
      </div>
    </a>
  </div>

</div>
