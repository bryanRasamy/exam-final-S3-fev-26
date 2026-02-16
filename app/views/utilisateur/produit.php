<!-- Page header -->
<div class="page-header d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
  <div>
    <h1>Détail du produit</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/modele">Accueil</a></li>
        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/modele?page=liste-produits">Produits</a></li>
        <li class="breadcrumb-item active" aria-current="page">Casque Audio Premium</li>
      </ol>
    </nav>
  </div>
  <a href="<?= BASE_URL ?>/modele?page=liste-produits" class="btn btn-outline-primary">
    <i class="bi bi-arrow-left me-2"></i>Retour
  </a>
</div>

<!-- Product Detail -->
<div class="row g-4">
  
  <!-- Left: Carousel -->
  <div class="col-lg-7">
    <div class="product-detail-card">
      <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800&h=600&fit=crop" class="d-block w-100" alt="Casque Audio - Vue 1">
          </div>
          <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=800&h=600&fit=crop" class="d-block w-100" alt="Casque Audio - Vue 2">
          </div>
          <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1545127398-14699f92334b?w=800&h=600&fit=crop" class="d-block w-100" alt="Casque Audio - Vue 3">
          </div>
          <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1487215078519-e21cc028cb29?w=800&h=600&fit=crop" class="d-block w-100" alt="Casque Audio - Vue 4">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Suivant</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Right: Product Info -->
  <div class="col-lg-5">
    <div class="product-detail-card">
      
      <!-- Title & Badge -->
      <div class="d-flex align-items-start justify-content-between mb-2">
        <div>
          <h2 class="product-detail-title mb-1">Casque Audio Premium</h2>
          <div class="product-price-detail">420 000 Ar</div>
        </div>
        <span class="product-badge emerald">Disponible</span>
      </div>

      <!-- Owner -->
      <div class="product-owner-card mb-4">
        <div class="d-flex align-items-center gap-3">
          <img src="https://ui-avatars.com/api/?name=Jean+Rakoto&background=2A9D8F&color=fff&size=56&rounded=true&bold=true" alt="Jean Rakoto" class="owner-avatar">
          <div>
            <div class="owner-label">Propriétaire</div>
            <div class="owner-name">Jean Rakoto</div>
            <div class="owner-meta">
              <i class="bi bi-geo-alt"></i> Antananarivo
              <span class="ms-2"><i class="bi bi-star-fill"></i> 4.8</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Product Meta -->
      <div class="product-meta mb-4">
        <div class="meta-item">
          <i class="bi bi-tag"></i>
          <span class="meta-label">Catégorie</span>
          <span class="meta-value">Électronique</span>
        </div>
        <div class="meta-item">
          <i class="bi bi-box-seam"></i>
          <span class="meta-label">État</span>
          <span class="meta-value">Très bon état</span>
        </div>
        <div class="meta-item">
          <i class="bi bi-calendar3"></i>
          <span class="meta-label">Publié le</span>
          <span class="meta-value">5 février 2026</span>
        </div>
      </div>

      <!-- Action Button -->
      <button class="btn btn-propose w-100 mb-3" data-bs-toggle="modal" data-bs-target="#mesProduitsModal">
        <i class="bi bi-arrow-left-right me-2"></i>Proposer un échange
      </button>

<?php include 'MesProduitsModal.php'; ?>

      <!-- Description -->
      <div class="product-description mb-4">
        <h3 class="description-title">Description</h3>
        <p>
          Casque audio premium ANC — très bon état, prêt à l'échange.
        </p>
      </div>

    </div>
  </div>

</div>

<!-- Additional CSS -->
<style>
.product-detail-card {
  background: #fff;
  border-radius: var(--tt-radius-xl);
  border: 1px solid var(--tt-border);
  box-shadow: var(--tt-shadow-sm);
  overflow: hidden;
  animation: fadeUp .4s ease;
}

.product-detail-card:not(:has(.carousel)) {
  padding: 1.75rem;
}

/* Carousel */
#productCarousel {
  border-radius: 0;
}

.carousel-inner {
  border-radius: 0;
}

.carousel-item img {
  width: 100%;
  height: 480px;
  object-fit: cover;
}

.carousel-indicators {
  margin-bottom: 1rem;
}

.carousel-indicators [data-bs-target] {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: rgba(255,255,255,.5);
  border: 2px solid rgba(255,255,255,.8);
  opacity: 1;
}

.carousel-indicators .active {
  background-color: var(--tt-emerald);
  border-color: #fff;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  width: 2.5rem;
  height: 2.5rem;
  background-color: rgba(38,70,83,.7);
  border-radius: 50%;
}

.carousel-control-prev:hover .carousel-control-prev-icon,
.carousel-control-next:hover .carousel-control-next-icon {
  background-color: var(--tt-navy);
}

/* Product Title */
.product-detail-title {
  font-size: 1.75rem;
  font-weight: 700;
  color: var(--tt-navy);
  line-height: 1.2;
}

/* Owner Card */
.product-owner-card {
  background: var(--tt-mint);
  border-radius: var(--tt-radius-lg);
  padding: 1.25rem;
  border: 1px solid var(--tt-border);
}

.owner-avatar {
  width: 56px;
  height: 56px;
  border-radius: .75rem;
  flex-shrink: 0;
}

.owner-label {
  font-size: .72rem;
  text-transform: uppercase;
  letter-spacing: .05em;
  color: var(--tt-muted);
  font-weight: 600;
  margin-bottom: .15rem;
}

.owner-name {
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--tt-navy);
  margin-bottom: .25rem;
}

.owner-meta {
  font-size: .82rem;
  color: var(--tt-muted);
  display: flex;
  align-items: center;
  gap: .25rem;
}

.owner-meta i {
  color: var(--tt-emerald);
}

.owner-meta .bi-star-fill {
  color: var(--tt-amber);
}

/* Product Meta */
.product-meta {
  display: flex;
  flex-direction: column;
  gap: .85rem;
  padding: 1.25rem;
  background: var(--tt-surface);
  border-radius: var(--tt-radius-lg);
  border: 1px solid var(--tt-border);
}

.meta-item {
  display: flex;
  align-items: center;
  gap: .75rem;
}

.meta-item > i {
  width: 32px;
  height: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #fff;
  border-radius: .5rem;
  color: var(--tt-emerald);
  font-size: 1rem;
  flex-shrink: 0;
}

.meta-label {
  font-size: .8rem;
  color: var(--tt-muted);
  font-weight: 500;
  min-width: 85px;
}

.meta-value {
  font-size: .9rem;
  color: var(--tt-navy);
  font-weight: 600;
}

/* Description */
.product-description {
  padding-top: 1rem;
  border-top: 1px solid var(--tt-border);
}

.description-title {
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--tt-navy);
  margin-bottom: 1rem;
}

.product-description p {
  font-size: .92rem;
  line-height: 1.6;
  color: #475569;
  margin-bottom: .85rem;
}

.product-description ul {
  margin: .75rem 0;
  padding-left: 1.5rem;
}

.product-description li {
  font-size: .9rem;
  line-height: 1.8;
  color: #475569;
}

.product-description li::marker {
  color: var(--tt-emerald);
}

/* Responsive */
@media (max-width: 991.98px) {
  .carousel-item img {
    height: 360px;
  }
  
  .product-detail-title {
    font-size: 1.5rem;
  }
}

@media (max-width: 575.98px) {
  .carousel-item img {
    height: 280px;
  }
  
  .product-detail-card:not(:has(.carousel)) {
    padding: 1.25rem;
  }
}
</style>
