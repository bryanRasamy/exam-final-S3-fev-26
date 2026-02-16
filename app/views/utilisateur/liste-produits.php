<!-- Page header -->
<div class="page-header d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
  <div>
    <h1>Tous les produits</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/modele">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tous les produits</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Search & Filter Bar -->
<div class="filter-bar mb-4">
  <div class="row g-3 align-items-end">
    <!-- Search -->
    <div class="col-12 col-md-5">
      <div class="filter-search">
        <i class="bi bi-search filter-search-icon"></i>
        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un produit…">
      </div>
    </div>
    <!-- Category -->
    <div class="col-6 col-md-3">
      <div class="custom-select" id="filterCategory" data-value="">
        <div class="custom-select-trigger">
          <span class="custom-select-label">Toutes catégories</span>
          <i class="bi bi-chevron-down custom-select-arrow"></i>
        </div>
        <ul class="custom-select-options">
          <li class="custom-select-option selected" data-value="">Toutes catégories</li>
          <li class="custom-select-option" data-value="Électronique"><i class="bi bi-cpu me-2"></i>Électronique</li>
          <li class="custom-select-option" data-value="Sport"><i class="bi bi-bicycle me-2"></i>Sport</li>
          <li class="custom-select-option" data-value="Mode"><i class="bi bi-bag me-2"></i>Mode</li>
          <li class="custom-select-option" data-value="Accessoires"><i class="bi bi-watch me-2"></i>Accessoires</li>
        </ul>
      </div>
    </div>
    <!-- Status -->
    <div class="col-6 col-md-2">
      <div class="custom-select" id="filterStatus" data-value="">
        <div class="custom-select-trigger">
          <span class="custom-select-label">Tout statut</span>
          <i class="bi bi-chevron-down custom-select-arrow"></i>
        </div>
        <ul class="custom-select-options">
          <li class="custom-select-option selected" data-value="">Tout statut</li>
          <li class="custom-select-option" data-value="Disponible"><span class="status-dot available"></span>Disponible</li>
          <li class="custom-select-option" data-value="En échange"><span class="status-dot exchange"></span>En échange</li>
        </ul>
      </div>
    </div>
    <!-- Reset -->
    <div class="col-12 col-md-2">
      <button id="resetFilters" class="btn btn-outline-secondary w-100">
        <i class="bi bi-x-lg me-1"></i>Réinitialiser
      </button>
    </div>
  </div>
  <div id="filterCount" class="filter-count mt-2">4 produits</div>
</div>

<!-- Products Grid -->
<div class="row g-4">
  
  <!-- Product Card 1 -->
  <div class="col-sm-6 col-lg-4 col-xl-3">
    <a href="<?= BASE_URL ?>/modele?page=produit" class="product-card-link">
      <div class="product-card">
        <div class="product-image">
          <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=300&fit=crop" alt="Casque Audio">
          <span class="product-badge">Disponible</span>
        </div>
        <div class="product-body">
          <h3 class="product-title">Casque Audio Premium</h3>
          <div class="product-price">420 000</div>
          <div class="product-owner">
            <img src="https://ui-avatars.com/api/?name=Jean+Rakoto&background=2A9D8F&color=fff&size=32&rounded=true" alt="Jean Rakoto">
            <span>Jean Rakoto</span>
          </div>
          <div class="product-footer">
            <span class="product-category"><i class="bi bi-tag"></i> Électronique</span>
            <button class="btn-action" title="Proposer un échange">
              <i class="bi bi-arrow-left-right"></i>
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
          <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=400&h=300&fit=crop" alt="Sneakers">
          <span class="product-badge emerald">Disponible</span>
        </div>
        <div class="product-body">
          <h3 class="product-title">Sneakers Running Pro</h3>
          <div class="product-price">180 000</div>
          <div class="product-owner">
            <img src="https://ui-avatars.com/api/?name=Marie+Andriakoto&background=E76F51&color=fff&size=32&rounded=true" alt="Marie Andriakoto">
            <span>Marie Andriakoto</span>
          </div>
          <div class="product-footer">
            <span class="product-category"><i class="bi bi-tag"></i> Sport</span>
            <button class="btn-action" title="Proposer un échange">
              <i class="bi bi-arrow-left-right"></i>
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
          <img src="https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=400&h=300&fit=crop" alt="Sneakers Mode">
          <span class="product-badge amber">En échange</span>
        </div>
        <div class="product-body">
          <h3 class="product-title">Sneakers Fashion White</h3>
          <div class="product-price">120 000</div>
          <div class="product-owner">
            <img src="https://ui-avatars.com/api/?name=Paul+Rahariniaina&background=F4A261&color=fff&size=32&rounded=true" alt="Paul Rahariniaina">
            <span>Paul Rahariniaina</span>
          </div>
          <div class="product-footer">
            <span class="product-category"><i class="bi bi-tag"></i> Mode</span>
            <button class="btn-action" title="Proposer un échange">
              <i class="bi bi-arrow-left-right"></i>
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
          <img src="https://images.unsplash.com/photo-1585386959984-a4155224a1ad?w=400&h=300&fit=crop" alt="Sac à Dos">
          <span class="product-badge emerald">Disponible</span>
        </div>
        <div class="product-body">
          <h3 class="product-title">Sac à Dos Vintage</h3>
          <div class="product-price">85 000</div>
          <div class="product-owner">
            <img src="https://ui-avatars.com/api/?name=Sarah+Ravelo&background=264653&color=fff&size=32&rounded=true" alt="Sarah Ravelo">
            <span>Sarah Ravelo</span>
          </div>
          <div class="product-footer">
            <span class="product-category"><i class="bi bi-tag"></i> Accessoires</span>
            <button class="btn-action" title="Proposer un échange">
              <i class="bi bi-arrow-left-right"></i>
            </button>
          </div>
        </div>
      </div>
    </a>
  </div>

</div>

<!-- No results message -->
<div id="noResults" class="no-results" style="display:none;">
  <i class="bi bi-search"></i>
  <p>Aucun produit ne correspond à votre recherche.</p>
</div>

<script>
(function() {
  const searchInput = document.getElementById('searchInput');
  const filterCategory = document.getElementById('filterCategory');
  const filterStatus = document.getElementById('filterStatus');
  const resetBtn = document.getElementById('resetFilters');
  const filterCount = document.getElementById('filterCount');
  const noResults = document.getElementById('noResults');
  const grid = document.querySelector('.row.g-4');
  const cards = Array.from(grid.querySelectorAll('.col-sm-6'));

  /* ---- Custom Select Logic ---- */
  document.querySelectorAll('.custom-select').forEach(select => {
    const trigger = select.querySelector('.custom-select-trigger');
    const options = select.querySelectorAll('.custom-select-option');
    const label = select.querySelector('.custom-select-label');

    trigger.addEventListener('click', e => {
      e.stopPropagation();
      // close others
      document.querySelectorAll('.custom-select.open').forEach(s => {
        if (s !== select) s.classList.remove('open');
      });
      select.classList.toggle('open');
    });

    options.forEach(opt => {
      opt.addEventListener('click', e => {
        e.stopPropagation();
        options.forEach(o => o.classList.remove('selected'));
        opt.classList.add('selected');
        select.dataset.value = opt.dataset.value;
        label.textContent = opt.textContent.trim();
        select.classList.remove('open');
        applyFilters();
      });
    });
  });

  // Close on outside click
  document.addEventListener('click', () => {
    document.querySelectorAll('.custom-select.open').forEach(s => s.classList.remove('open'));
  });

  // Close on Escape
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
      document.querySelectorAll('.custom-select.open').forEach(s => s.classList.remove('open'));
    }
  });

  /* ---- Filtering ---- */
  function applyFilters() {
    const query = searchInput.value.toLowerCase().trim();
    const cat = filterCategory.dataset.value;
    const status = filterStatus.dataset.value;
    let visible = 0;

    cards.forEach(card => {
      const title = card.querySelector('.product-title')?.textContent.toLowerCase() || '';
      const owner = card.querySelector('.product-owner span')?.textContent.toLowerCase() || '';
      const category = card.querySelector('.product-category')?.textContent.trim() || '';
      const badge = card.querySelector('.product-badge')?.textContent.trim() || '';

      const matchSearch = !query || title.includes(query) || owner.includes(query);
      const matchCat = !cat || category.includes(cat);
      const matchStatus = !status || badge === status;

      if (matchSearch && matchCat && matchStatus) {
        card.style.display = '';
        visible++;
      } else {
        card.style.display = 'none';
      }
    });

    filterCount.textContent = visible + ' produit' + (visible > 1 ? 's' : '');
    noResults.style.display = visible === 0 ? '' : 'none';
  }

  searchInput.addEventListener('input', applyFilters);

  resetBtn.addEventListener('click', () => {
    searchInput.value = '';
    // Reset custom selects
    document.querySelectorAll('.custom-select').forEach(select => {
      const first = select.querySelector('.custom-select-option');
      select.querySelectorAll('.custom-select-option').forEach(o => o.classList.remove('selected'));
      first.classList.add('selected');
      select.dataset.value = '';
      select.querySelector('.custom-select-label').textContent = first.textContent.trim();
    });
    applyFilters();
  });
})();
</script>
