document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("#loginForm");
  if (!form) return;

  // Champs
  const email = document.querySelector("#email");
  const password = document.querySelector("#password");

  // Zones d'erreur
  const emailError = document.querySelector("#emailError");
  const passwordError = document.querySelector("#passwordError");

  // Flag pour indiquer si le formulaire a déjà été validé au moins une fois
  let formValidatedOnce = false;

  // Messages d'aide
  const messages = {
    email: {
      required: "Veuillez entrer votre adresse email",
      invalid: "Cette adresse email ne semble pas valide. Essayez format@exemple.com"
    },
    password: {
      required: "Veuillez entrer votre mot de passe",
      short: "Le mot de passe doit contenir au moins 8 caractères",
      strength: {
        weak: "Mot de passe faible - ajoutez des lettres et chiffres",
        medium: "Mot de passe moyen - vous y êtes presque !",
        strong: "Excellent mot de passe !"
      }
    }
  };


  function showFieldHelp(field, errorBox, message, type = "error") {
    const icon = type === "error" ? "bi-exclamation-circle" : "bi-check-circle";
    const iconColor = type === "error" ? "#ff9800" : "#2A9D8F";
    
    // Supprime les nœuds texte bruts pour éviter la superposition
    errorBox.childNodes.forEach(node => {
      if (node.nodeType === Node.TEXT_NODE) node.remove();
    });
    
    let iconEl = errorBox.querySelector(".help-icon");
    if (!iconEl) {
      iconEl = document.createElement("i");
      iconEl.className = "help-icon me-2";
      errorBox.prepend(iconEl);
    }
   
    iconEl.classList.remove("bi-exclamation-circle", "bi-check-circle");
    iconEl.classList.add(icon);
    iconEl.style.color = iconColor;
    
    // Message dans un conteneur dédié pour éviter d'écraser d'autres éléments
    let msgEl = errorBox.querySelector(".help-text");
    if (!msgEl) {
      msgEl = document.createElement("span");
      msgEl.className = "help-text";
      errorBox.appendChild(msgEl);
    }

    msgEl.textContent = message;
    
    // Préserve les autres classes et applique l'état approprié
    errorBox.classList.remove("field-help", "field-success", "field-hint");
    errorBox.classList.add(type === "error" ? "field-help" : "field-success");
    errorBox.style.display = "";
    
    field.classList.remove("needs-attention", "looks-good");
    field.classList.add(type === "error" ? "needs-attention" : "looks-good");
    
    // Animation subtile sans déplacements problématiques
    field.style.animation = "gentleShake 0.5s ease";
    setTimeout(() => {
      field.style.animation = "";
    }, 500);
  }

  function clearFieldHelp(field, errorBox) {
    field.classList.remove("needs-attention", "looks-good");
    field.style.animation = "";
    
    // Vide le texte et cache le conteneur pour éviter les éléments vides qui prennent de la place
    const msgEl = errorBox.querySelector(".help-text");
    if (msgEl) msgEl.textContent = "";
    errorBox.classList.remove("field-help", "field-success", "field-hint");
    errorBox.style.display = "none";
    
    // Supprime l'icône si elle existe
    const icon = errorBox.querySelector(".help-icon");
    if (icon) icon.remove();
  }

  function showSuccessState(field) {
    field.classList.add("looks-good");
    field.classList.remove("needs-attention");

    // Ajoute une petite animation de succès
    const successIcon = document.createElement("span");
    successIcon.className = "success-indicator";
    successIcon.innerHTML = '<i class="bi bi-check-circle"></i>';
    successIcon.style.position = "absolute";
    successIcon.style.right = "15px";
    successIcon.style.top = "50%";
    successIcon.style.transform = "translateY(-50%)";
    successIcon.style.color = "#2A9D8F";

    if (!field.parentElement.querySelector(".success-indicator")) {
      field.parentElement.style.position = "relative";
      field.parentElement.appendChild(successIcon);

      // Supprime après 2 secondes
      setTimeout(() => {
        successIcon.remove();
      }, 2000);
    }
  }

  // Validation progressive
  function validateEmail() {
    const v = email.value.trim();

    if (v === "") {
      showFieldHelp(email, emailError, messages.email.required, "error");
      return false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(v)) {
      showFieldHelp(email, emailError, messages.email.invalid, "error");
      return false;
    }

    clearFieldHelp(email, emailError);
    showSuccessState(email);
    return true;
  }

  function validatePassword() {
    const v = password.value;

    if (v === "") {
      showFieldHelp(password, passwordError, messages.password.required, "error");
      return false;
    }

    if (v.length < 8) {
      showFieldHelp(password, passwordError, messages.password.short, "error");
      return false;
    }

    // Indicateur de force du mot de passe
    let strengthMessage = "";
    if (v.length >= 12 && /[A-Z]/.test(v) && /[0-9]/.test(v) && /[^A-Za-z0-9]/.test(v)) {
      strengthMessage = messages.password.strength.strong;
      showFieldHelp(password, passwordError, strengthMessage, "success");
    } else if (v.length >= 10 && /[A-Z]/.test(v) && /[0-9]/.test(v)) {
      strengthMessage = messages.password.strength.medium;
      showFieldHelp(password, passwordError, strengthMessage, "success");
    } else {
      strengthMessage = messages.password.strength.weak;
      showFieldHelp(password, passwordError, strengthMessage, "error");
    }

    return v.length >= 8;
  }

  // Validation en temps réel avec délai pour éviter de surcharger l'utilisateur
  let validationTimer;

  email.addEventListener("input", function () {
    clearTimeout(validationTimer);
    // N'affiche pas d'erreur pendant la saisie tant que l'utilisateur n'a pas tenté de soumettre le formulaire.
    if (formValidatedOnce) {
      validationTimer = setTimeout(validateEmail.bind(this), 800);
    } else {
      // Simple indice visuel sans message d'erreur
      if (this.value.includes("@") && this.value.includes(".")) {
        this.classList.add("typing-good");
      } else {
        this.classList.remove("typing-good");
      }
    }
  });

  password.addEventListener("input", function () {
    clearTimeout(validationTimer);
    validationTimer = setTimeout(validatePassword, 500);

    // Indicateur de longueur visuel
    const lengthIndicator = document.querySelector(".password-length");
    if (!lengthIndicator) {
      const indicator = document.createElement("div");
      indicator.className = "password-length";
      indicator.style.fontSize = "0.8rem";
      indicator.style.marginTop = "5px";
      indicator.style.color = "#6c757d";
      this.parentElement.appendChild(indicator);
    }

    const indicator = this.parentElement.querySelector(".password-length");
    if (this.value.length > 0) {
      indicator.textContent = `${this.value.length} caractères`;
      indicator.style.color = this.value.length >= 8 ? "#2A9D8F" : "#ff9800";
    } else {
      indicator.textContent = "";
    }
  });

  // Effets de focus plus doux
  email.addEventListener("focus", function () {
    this.style.boxShadow = "0 0 0 4px rgba(42, 157, 143, 0.15), 0 5px 15px rgba(42, 157, 143, 0.1)";

    // Aide contextuelle
    if (!this.value) {
      emailError.innerHTML = "";
      emailError.textContent = "Votre adresse email Takalo-Takalo";
      emailError.classList.add("field-hint");
      emailError.style.display = "";
    }
  });

  email.addEventListener("blur", function () {
    this.style.boxShadow = "";
    // Ne montre l'erreur complète qu'après une tentative de soumission
    if (formValidatedOnce) {
      validateEmail();
    } else {
      // Nettoie les messages d'erreur (on garde seulement les hints)
      clearFieldHelp(email, emailError);
    }
  });

  password.addEventListener("focus", function () {
    this.style.boxShadow = "0 0 0 4px rgba(42, 157, 143, 0.15), 0 5px 15px rgba(42, 157, 143, 0.1)";

    // Aide contextuelle
    if (!this.value) {
      passwordError.innerHTML = "";
      passwordError.textContent = "Minimum 8 caractères pour votre sécurité";
      passwordError.classList.add("field-hint");
      passwordError.style.display = "";
    }
  });

  password.addEventListener("blur", function () {
    this.style.boxShadow = "";
    validatePassword();
  });

  // Soumission avec feedback progressif
  form.addEventListener("submit", function (e) {
    e.preventDefault();
    // Marque que l'utilisateur a tenté de soumettre le formulaire au moins une fois
    formValidatedOnce = true;

    // Supprime les anciens messages
    clearFieldHelp(email, emailError);
    clearFieldHelp(password, passwordError);

    // Animation de vérification
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;

    submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Vérification en cours...';
    submitBtn.disabled = true;

    // Simule une vérification progressive
    setTimeout(() => {
      const emailValid = validateEmail();
      const passwordValid = validatePassword();

      if (emailValid && passwordValid) {
        // Tout est bon !
        submitBtn.innerHTML = '<i class="bi bi-check-circle me-2"></i>Connexion réussie !';
        submitBtn.style.background = "linear-gradient(135deg, #2A9D8F 0%, #1e7a6f 100%)";

        // Animation de succès globale
        form.classList.add("form-success");

        // Soumission après un délai pour que l'utilisateur voie le succès
        setTimeout(() => {
          form.submit();
        }, 1000);
      } else {
        // Redonne le contrôle à l'utilisateur
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;

        // Focus sur le premier champ problématique
        if (!emailValid) {
          email.focus();
        } else if (!passwordValid) {
          password.focus();
        }
      }
    }, 800);
  });

  // Ajout de conseils contextuels
  setTimeout(() => {

  }, 1000);
});