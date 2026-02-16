<!-- Modal Mes Produits -->
<div class="modal fade" id="mesProduitsModal" tabindex="-1" aria-labelledby="mesProduitsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      
      <!-- Header -->
      <div class="modal-header">
        <div>
          <h5 class="modal-title" id="mesProduitsModalLabel">Choisissez vos produits à échanger</h5>
          <p class="modal-subtitle mb-0">Sélectionnez un ou plusieurs produits pour votre proposition</p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <div class="row g-3">
          
          <!-- Product Modal Card 1 -->
          <div class="col-sm-6">
            <div class="product-modal-card">
              <input type="checkbox" class="product-checkbox" id="prod1" value="1">
              <label for="prod1" class="product-modal-label">
                <div class="product-modal-image">
                  <img src="https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=300&h=200&fit=crop" alt="Montre Sport">
                </div>
                <div class="product-modal-body">
                  <h6 class="product-modal-title">Montre Sport GPS</h6>
                  <div class="product-modal-price">245 000 Ar</div>
                </div>
              </label>
            </div>
          </div>

          <!-- Product Modal Card 2 -->
          <div class="col-sm-6">
            <div class="product-modal-card">
              <input type="checkbox" class="product-checkbox" id="prod2" value="2">
              <label for="prod2" class="product-modal-label">
                <div class="product-modal-image">
                  <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=300&h=200&fit=crop" alt="Livre">
                </div>
                <div class="product-modal-body">
                  <h6 class="product-modal-title">Collection Livres Tech</h6>
                  <div class="product-modal-price">65 000 Ar</div>
                </div>
              </label>
            </div>
          </div>

          <!-- Product Modal Card 3 -->
          <div class="col-sm-6">
            <div class="product-modal-card">
              <input type="checkbox" class="product-checkbox" id="prod3" value="3">
              <label for="prod3" class="product-modal-label">
                <div class="product-modal-image">
                  <img src="https://images.unsplash.com/photo-1560343090-f0409e92791a?w=300&h=200&fit=crop" alt="Appareil Photo">
                </div>
                <div class="product-modal-body">
                  <h6 class="product-modal-title">Appareil Photo Vintage</h6>
                  <div class="product-modal-price">320 000 Ar</div>
                </div>
              </label>
            </div>
          </div>

          <!-- Product Modal Card 4 -->
          <div class="col-sm-6">
            <div class="product-modal-card">
              <input type="checkbox" class="product-checkbox" id="prod4" value="4">
              <label for="prod4" class="product-modal-label">
                <div class="product-modal-image">
                  <img src="https://images.unsplash.com/photo-1609081219090-a6d81d3085bf?w=300&h=200&fit=crop" alt="Lampe Design">
                </div>
                <div class="product-modal-body">
                  <h6 class="product-modal-title">Lampe Bureau Design</h6>
                  <div class="product-modal-price">95 000 Ar</div>
                </div>
              </label>
            </div>
          </div>

        </div>

        <!-- Selection Info -->
        <div class="selection-info mt-3" id="selectionInfo" style="display: none;">
          <i class="bi bi-check-circle-fill me-2"></i>
          <span id="selectionCount">0</span> produit(s) sélectionné(s)
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-exchange" id="btnDemanderEchange" disabled>
          <i class="bi bi-arrow-left-right me-2"></i>
          Demander un échange
        </button>
      </div>

    </div>
  </div>
</div>

<!-- Modal Styles -->
<style>
.modal-header {
  border-bottom: 1px solid var(--tt-border);
  padding: 1.5rem;
}

.modal-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--tt-navy);
  margin-bottom: .25rem;
}

.modal-subtitle {
  font-size: .875rem;
  color: var(--tt-muted);
}

.modal-body {
  padding: 1.5rem;
}

.modal-footer {
  border-top: 1px solid var(--tt-border);
  padding: 1.25rem 1.5rem;
}

/* Product Modal Card */
.product-modal-card {
  position: relative;
}

.product-checkbox {
  position: absolute;
  top: 12px;
  right: 12px;
  width: 24px;
  height: 24px;
  z-index: 10;
  cursor: pointer;
  accent-color: var(--tt-emerald);
}

.product-modal-label {
  display: block;
  cursor: pointer;
  background: #fff;
  border: 2px solid var(--tt-border);
  border-radius: var(--tt-radius-lg);
  overflow: hidden;
  transition: all .25s ease;
}

.product-checkbox:checked + .product-modal-label {
  border-color: var(--tt-emerald);
  box-shadow: 0 0 0 3px rgba(42,157,143,.12);
  background: var(--tt-mint);
}

.product-modal-label:hover {
  border-color: var(--tt-emerald);
  box-shadow: var(--tt-shadow-sm);
}

.product-modal-image {
  width: 100%;
  height: 140px;
  overflow: hidden;
  background: var(--tt-surface);
}

.product-modal-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform .3s ease;
}

.product-modal-label:hover .product-modal-image img {
  transform: scale(1.05);
}

.product-modal-body {
  padding: 1rem;
}

.product-modal-title {
  font-size: .95rem;
  font-weight: 600;
  color: var(--tt-navy);
  margin: 0 0 .5rem;
  line-height: 1.3;
}

.product-modal-price {
  font-size: .9rem;
  font-weight: 700;
  color: var(--tt-emerald);
}

/* Selection Info */
.selection-info {
  display: flex;
  align-items: center;
  padding: .75rem 1rem;
  background: var(--tt-emerald-glow);
  border-radius: var(--tt-radius);
  color: var(--tt-emerald-dark);
  font-weight: 600;
  font-size: .9rem;
}

.selection-info i {
  color: var(--tt-emerald);
}

/* Exchange Button */
.btn-exchange {
  background: var(--tt-emerald);
  color: #fff;
  border: none;
  font-weight: 700;
  padding: .65rem 1.5rem;
  border-radius: var(--tt-radius);
  transition: all .2s ease;
}

.btn-exchange:not(:disabled):hover {
  background: var(--tt-emerald-dark);
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(42,157,143,.25);
}

.btn-exchange:disabled {
  background: var(--tt-muted);
  opacity: .5;
  cursor: not-allowed;
}
</style>

<!-- Modal Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const checkboxes = document.querySelectorAll('.product-checkbox');
  const btnExchange = document.getElementById('btnDemanderEchange');
  const selectionInfo = document.getElementById('selectionInfo');
  const selectionCount = document.getElementById('selectionCount');

  function updateSelection() {
    const checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
    
    if (checkedCount > 0) {
      btnExchange.disabled = false;
      selectionInfo.style.display = 'flex';
      selectionCount.textContent = checkedCount;
    } else {
      btnExchange.disabled = true;
      selectionInfo.style.display = 'none';
    }
  }

  checkboxes.forEach(cb => {
    cb.addEventListener('change', updateSelection);
  });

  btnExchange.addEventListener('click', function() {
    const selectedIds = Array.from(checkboxes)
      .filter(cb => cb.checked)
      .map(cb => cb.value);
    
    // Ici vous pouvez traiter la demande d'échange
    console.log('Produits sélectionnés:', selectedIds);
    alert('Demande d\'échange envoyée pour ' + selectedIds.length + ' produit(s) !');
    
    // Fermer le modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('mesProduitsModal'));
    modal.hide();
  });
});
</script>
