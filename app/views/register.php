<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - Takalo-Takalo</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/form.css">
</head>
<body class="min-vh-100 d-flex">
  <div class="container-fluid">
    <div class="row min-vh-100">
      
      <!-- Section gauche avec branding -->
      <div class="col-lg-5 col-md-12 brand-section d-flex flex-column justify-content-center p-5">
        <div class="logo-container text-center text-lg-start mb-5">
          <div class="logo-circle d-inline-flex align-items-center justify-content-center mb-3">
            <i class="bi bi-arrow-left-right fs-1"></i>
          </div>
          <h1 class="brand-name display-4 fw-bold mb-3">Takalo-Takalo</h1>
          <p class="brand-tagline lead text-muted">
            Rejoignez la communauté d'échange la plus dynamique de Madagascar.
          </p>
        </div>
        
        <div class="brand-features mt-5">
          <div class="feature d-flex align-items-center mb-4">
            <i class="bi bi-person-plus fs-4 me-3 text-primary"></i>
            <span class="fs-5">Inscription rapide et gratuite</span>
          </div>
          <div class="feature d-flex align-items-center mb-4">
            <i class="bi bi-shield-check fs-4 me-3 text-primary"></i>
            <span class="fs-5">Profil vérifié et sécurisé</span>
          </div>
          <div class="feature d-flex align-items-center mb-4">
            <i class="bi bi-arrow-repeat fs-4 me-3 text-primary"></i>
            <span class="fs-5">Commencez à échanger immédiatement</span>
          </div>
        </div>
      </div>
      
      <!-- Section formulaire inscription -->
      <div class="col-lg-7 col-md-12 form-section d-flex align-items-center justify-content-center p-4 p-lg-5">
        <div class="w-100 p-4 p-md-5 rounded-4 shadow-sm bg-white" style="max-width: 540px;">
          <div class="form-header text-center mb-4">
            <h1 class="h2 fw-bold mb-2">Créer un compte</h1>
            <p class="text-muted mb-0">Remplissez le formulaire pour rejoindre Takalo-Takalo</p>
          </div>
          
          <form id="registerForm" method="post" action="register_process.php" novalidate>
            
            <!-- Nom & Prénom -->
            <div class="row g-3 mb-4">
              <div class="col-sm-6">
                <label for="lastname" class="form-label fw-medium mb-2">Nom</label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="bi bi-person"></i></span>
                  <input type="text" id="lastname" name="lastname" class="form-control form-control-lg"
                         placeholder="Rakoto" required>
                </div>
                <div class="invalid-feedback mt-2" id="lastnameError">
                  Veuillez entrer votre nom
                </div>
              </div>
              <div class="col-sm-6">
                <label for="firstname" class="form-label fw-medium mb-2">Prénom</label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="bi bi-person"></i></span>
                  <input type="text" id="firstname" name="firstname" class="form-control form-control-lg"
                         placeholder="Jean" required>
                </div>
                <div class="invalid-feedback mt-2" id="firstnameError">
                  Veuillez entrer votre prénom
                </div>
              </div>
            </div>

            <!-- Email -->
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

            <!-- Mot de passe -->
            <div class="mb-4">
              <label for="password" class="form-label fw-medium mb-2">Mot de passe</label>
              <div class="input-group">
                <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                <input type="password" id="password" name="password" class="form-control form-control-lg"
                       placeholder="Minimum 8 caractères" required minlength="8">
              </div>
              <div class="invalid-feedback mt-2" id="passwordError">
                Le mot de passe doit contenir au moins 8 caractères
              </div>
            </div>

            <!-- Confirmation mot de passe -->
            <div class="mb-4">
              <label for="passwordConfirm" class="form-label fw-medium mb-2">Confirmer le mot de passe</label>
              <div class="input-group">
                <span class="input-group-text bg-white"><i class="bi bi-lock-fill"></i></span>
                <input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control form-control-lg"
                       placeholder="Retapez votre mot de passe" required minlength="8">
              </div>
              <div class="invalid-feedback mt-2" id="passwordConfirmError">
                Les mots de passe ne correspondent pas
              </div>
            </div>

            <!-- CGU -->
            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
              <label class="form-check-label" for="terms">
                J'accepte les <a href="#" class="text-decoration-none">conditions d'utilisation</a>
                et la <a href="#" class="text-decoration-none">politique de confidentialité</a>
              </label>
              <div class="invalid-feedback mt-2" id="termsError">
                Vous devez accepter les conditions d'utilisation
              </div>
            </div>

            <button class="btn btn-primary btn-lg w-100 py-3 mb-4" type="submit">
              <i class="bi bi-person-plus me-2"></i>
              Créer mon compte
            </button>
            
            <div class="text-center pt-3 border-top">
              <span class="text-muted">Déjà un compte ?</span>
              <a href="index.php" class="text-decoration-none fw-medium ms-1">Se connecter</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/register-validation.js"></script>
</body>
</html>
