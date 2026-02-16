<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - Takalo-Takalo</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/form.css">
</head>
<body class="min-vh-100 d-flex">
  <div class="container-fluid">
    <div class="row min-vh-100">
      
      <!-- Section gauche avec branding -->
      <div class="col-lg-6 col-md-12 brand-section d-flex flex-column justify-content-center p-5">
        <div class="logo-container text-center text-lg-start mb-5">
          <div class="logo-circle d-inline-flex align-items-center justify-content-center mb-3">
            <i class="bi bi-arrow-left-right fs-1"></i>
          </div>
          <h1 class="brand-name display-4 fw-bold mb-3">Takalo-Takalo</h1>
          <p class="brand-tagline lead text-muted">
            Échangez, partagez, découvrez. La communauté d'échange la plus dynamique.
          </p>
        </div>
        
        <div class="brand-features mt-5">
          <div class="feature d-flex align-items-center mb-4">
            <i class="bi bi-shield-check fs-4 me-3 text-primary"></i>
            <span class="fs-5">Échanges sécurisés et vérifiés</span>
          </div>
          <div class="feature d-flex align-items-center mb-4">
            <i class="bi bi-people fs-4 me-3 text-primary"></i>
            <span class="fs-5">Communauté de confiance</span>
          </div>
          <div class="feature d-flex align-items-center mb-4">
            <i class="bi bi-arrow-repeat fs-4 me-3 text-primary"></i>
            <span class="fs-5">Échangez sans argent</span>
          </div>
        </div>
      </div>
      
      <!-- Section formulaire -->
      <div class="col-lg-6 col-md-12 form-section d-flex align-items-center justify-content-center p-4 p-lg-5">
        <div class="w-100 p-4 p-md-5 rounded-4 shadow-sm bg-white" style="max-width: 480px;">
          <div class="form-header text-center mb-4">
            <h1 class="h2 fw-bold mb-2">Connexion</h1>
            <p class="text-muted mb-0">Accédez à votre compte pour continuer vos échanges</p>
          </div>
          
          <form id="loginForm" method="post" action="/modele" novalidate>
            
            <div class="mb-4">
              <label for="email" class="form-label fw-medium mb-2">Adresse email</label>
              <div class="input-group">
                <span class="input-group-text bg-white"><i class="bi bi-envelope"></i></span>
                <input type="email" id="email" name="email" class="form-control form-control-lg" 
                       placeholder="votre@email.com" required>
              </div>
              <div class="invalid-feedback mt-2" id="emailError">
                Veuillez entrer une adresse email valide
              </div>
            </div>

            <div class="mb-4">
              <label for="password" class="form-label fw-medium mb-2">Mot de passe</label>
              <div class="input-group">
                <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                <input type="password" id="password" name="password" class="form-control form-control-lg" 
                       placeholder="Votre mot de passe" required minlength="8">
              </div>
              <div class="invalid-feedback mt-2" id="passwordError">
                Le mot de passe doit contenir au moins 8 caractères
              </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
              </div>
              <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
            </div>

            <button class="btn btn-primary btn-lg w-100 py-3 mb-4" type="submit">
              <i class="bi bi-box-arrow-in-right me-2"></i>
              Se connecter
            </button>
            
            <div class="text-center pt-3 border-top">
              <span class="text-muted">Nouveau sur Takalo-Takalo ?</span>
              <a href="register.php" class="text-decoration-none fw-medium ms-1">Créer un compte</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= BASE_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_URL ?>/assets/js/validation.js"></script>
</body>
</html>