<?php
    $nbruser = isset($_GET['nbruser']) ? $_GET['nbruser'] : '';
    $nbrechange = '';
?>
<!-- Page header -->
<div class="page-header d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
  <div>
    <h1>Statistiques</h1>
  </div>
</div>

<!-- Statistique -->
<div class="row justify-content-center">
  <div class="col-lg-10 col-xl-8">
      <!-- User -->
      <div class="form-card mb-4">
        <h2 class="form-card-title"><i class="bi bi-info-circle me-2"></i>Statistiques sur l'utilisateur</h2>

        <div class="mb-3">
          <label for="nbruser" class="form-label">Nombre d'utilisateur</label>
          <h4><?php echo $nbruser; ?></h4>
          
        </div>
      </div>

      <!-- Échange -->
      <div class="form-card mb-4">
        <h2 class="form-card-title"><i class="bi bi-arrow-left-right me-2"></i>Statistiques sur les echanges effectuer</h2>

        <div class="row g-3 mb-3">
          <div class="mb-3">
            <label for="nbrechange" class="form-label">Nombre d'echange</label>
            <h4><?php echo $nbrechange; ?></h4>
            
          </div>
        </div>
      </div>

  </div>
</div>
