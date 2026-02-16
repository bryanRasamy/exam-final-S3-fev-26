// register-validation.js — Validation UX pour la page d'inscription Takalo-Takalo

document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("#registerForm");
  if (!form) return;

  // Champs
  const lastname        = document.querySelector("#lastname");
  const firstname       = document.querySelector("#firstname");
  const email           = document.querySelector("#email");
  const phone           = document.querySelector("#phone");
  const password        = document.querySelector("#password");
  const passwordConfirm = document.querySelector("#passwordConfirm");
  const terms           = document.querySelector("#terms");

  // Zones d'erreur
  const lastnameError        = document.querySelector("#lastnameError");
  const firstnameError       = document.querySelector("#firstnameError");
  const emailError           = document.querySelector("#emailError");
  const phoneError           = document.querySelector("#phoneError");
  const passwordError        = document.querySelector("#passwordError");
  const passwordConfirmError = document.querySelector("#passwordConfirmError");
  const termsError           = document.querySelector("#termsError");

  let formValidatedOnce = false;

  // ---------- Messages ----------
  const messages = {
    lastname:  { required: "Veuillez entrer votre nom" },
    firstname: { required: "Veuillez entrer votre prénom" },
    email: {
      required: "Veuillez entrer votre adresse email",
      invalid:  "Cette adresse email ne semble pas valide. Essayez format@exemple.com"
    },
    phone: {
      required: "Veuillez entrer votre numéro de téléphone",
      invalid:  "Le numéro doit contenir exactement 10 chiffres"
    },
    password: {
      required: "Veuillez créer un mot de passe",
      short:    "Le mot de passe doit contenir au moins 8 caractères",
      strength: {
        weak:   "Mot de passe faible — ajoutez des majuscules et chiffres",
        medium: "Mot de passe moyen — vous y êtes presque !",
        strong: "Excellent mot de passe !"
      }
    },
    passwordConfirm: {
      required: "Veuillez confirmer votre mot de passe",
      mismatch: "Les mots de passe ne correspondent pas",
      match:    "Les mots de passe correspondent !"
    },
    terms: { required: "Vous devez accepter les conditions d'utilisation" }
  };

  // ---------- Helpers ----------
  function showFieldHelp(field, errorBox, message, type = "error") {
    const iconClass = type === "error" ? "bi-exclamation-circle" : "bi-check-circle";
    const iconColor = type === "error" ? "#ff9800" : "#2A9D8F";

    let iconEl = errorBox.querySelector(".help-icon");
    if (!iconEl) {
      iconEl = document.createElement("i");
      iconEl.className = "help-icon me-2";
      errorBox.prepend(iconEl);
    }
    iconEl.classList.remove("bi-exclamation-circle", "bi-check-circle");
    iconEl.classList.add(iconClass);
    iconEl.style.color = iconColor;

    let msgEl = errorBox.querySelector(".help-text");
    if (!msgEl) {
      msgEl = document.createElement("span");
      msgEl.className = "help-text";
      errorBox.appendChild(msgEl);
    }
    msgEl.textContent = message;

    errorBox.classList.remove("field-help", "field-success", "field-hint");
    errorBox.classList.add(type === "error" ? "field-help" : "field-success");
    errorBox.style.display = "";

    // Apply state on the input-group wrapper
    const group = field.closest(".input-group");
    if (group) {
      group.classList.remove("needs-attention", "looks-good");
      group.classList.add(type === "error" ? "needs-attention" : "looks-good");
    }
  }

  function clearFieldHelp(field, errorBox) {
    const msgEl = errorBox.querySelector(".help-text");
    if (msgEl) msgEl.textContent = "";
    errorBox.classList.remove("field-help", "field-success", "field-hint");
    errorBox.style.display = "none";
    const icon = errorBox.querySelector(".help-icon");
    if (icon) icon.remove();

    const group = field.closest(".input-group");
    if (group) group.classList.remove("needs-attention", "looks-good", "typing-good");
  }

  function showSuccess(field, errorBox, message) {
    showFieldHelp(field, errorBox, message, "success");
    const group = field.closest(".input-group");
    if (group) {
      group.classList.remove("needs-attention");
      group.classList.add("looks-good");
    }
  }

  // ---------- Validators ----------
  function validateRequired(field, errorBox, msg) {
    if (field.value.trim() === "") {
      showFieldHelp(field, errorBox, msg, "error");
      return false;
    }
    clearFieldHelp(field, errorBox);
    return true;
  }

  function validateLastname()  { return validateRequired(lastname, lastnameError, messages.lastname.required); }
  function validateFirstname() { return validateRequired(firstname, firstnameError, messages.firstname.required); }

  function validateEmail() {
    const v = email.value.trim();
    if (v === "") { showFieldHelp(email, emailError, messages.email.required, "error"); return false; }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) { showFieldHelp(email, emailError, messages.email.invalid, "error"); return false; }
    clearFieldHelp(email, emailError);
    showSuccess(email, emailError, "Adresse email valide");
    return true;
  }

  function validatePhone() {
    const v = phone.value.replace(/\s/g, "");
    if (v === "") { showFieldHelp(phone, phoneError, messages.phone.required, "error"); return false; }
    if (!/^\d{10}$/.test(v)) { showFieldHelp(phone, phoneError, messages.phone.invalid, "error"); return false; }
    clearFieldHelp(phone, phoneError);
    showSuccess(phone, phoneError, "Numéro valide");
    return true;
  }

  function validatePassword() {
    const v = password.value;
    if (v === "") { showFieldHelp(password, passwordError, messages.password.required, "error"); return false; }
    if (v.length < 8) { showFieldHelp(password, passwordError, messages.password.short, "error"); return false; }

    if (v.length >= 12 && /[A-Z]/.test(v) && /[0-9]/.test(v) && /[^A-Za-z0-9]/.test(v)) {
      showFieldHelp(password, passwordError, messages.password.strength.strong, "success");
    } else if (v.length >= 10 && /[A-Z]/.test(v) && /[0-9]/.test(v)) {
      showFieldHelp(password, passwordError, messages.password.strength.medium, "success");
    } else {
      showFieldHelp(password, passwordError, messages.password.strength.weak, "error");
    }

    // Re-validate confirm if already filled
    if (passwordConfirm.value) validatePasswordConfirm();

    return v.length >= 8;
  }

  function validatePasswordConfirm() {
    const v = passwordConfirm.value;
    if (v === "") { showFieldHelp(passwordConfirm, passwordConfirmError, messages.passwordConfirm.required, "error"); return false; }
    if (v !== password.value) { showFieldHelp(passwordConfirm, passwordConfirmError, messages.passwordConfirm.mismatch, "error"); return false; }
    clearFieldHelp(passwordConfirm, passwordConfirmError);
    showSuccess(passwordConfirm, passwordConfirmError, messages.passwordConfirm.match);
    return true;
  }

  function validateTerms() {
    if (!terms.checked) {
      termsError.textContent = messages.terms.required;
      termsError.classList.add("field-help");
      termsError.style.display = "";
      return false;
    }
    termsError.textContent = "";
    termsError.classList.remove("field-help");
    termsError.style.display = "none";
    return true;
  }

  // ---------- Real-time validation with delay ----------
  let timer;

  function delayedValidate(fn, delay = 600) {
    clearTimeout(timer);
    timer = setTimeout(fn, delay);
  }

  lastname.addEventListener("input",        () => { if (formValidatedOnce) delayedValidate(validateLastname); });
  firstname.addEventListener("input",       () => { if (formValidatedOnce) delayedValidate(validateFirstname); });
  email.addEventListener("input",           () => { if (formValidatedOnce) delayedValidate(validateEmail); });
  phone.addEventListener("input",           () => { if (formValidatedOnce) delayedValidate(validatePhone); });
  password.addEventListener("input",        () => delayedValidate(validatePassword, 500));
  passwordConfirm.addEventListener("input", () => delayedValidate(validatePasswordConfirm, 500));
  terms.addEventListener("change",          () => { if (formValidatedOnce) validateTerms(); });

  // Blur validation
  lastname.addEventListener("blur",        () => { if (formValidatedOnce) validateLastname(); });
  firstname.addEventListener("blur",       () => { if (formValidatedOnce) validateFirstname(); });
  email.addEventListener("blur",           () => { if (formValidatedOnce) validateEmail(); });
  phone.addEventListener("blur",           () => { if (formValidatedOnce) validatePhone(); });
  password.addEventListener("blur",        validatePassword);
  passwordConfirm.addEventListener("blur", validatePasswordConfirm);

  // ---------- Focus hints ----------
  function showHint(field, errorBox, text) {
    if (!field.value) {
      errorBox.textContent = text;
      errorBox.classList.add("field-hint");
      errorBox.style.display = "";
    }
  }

  lastname.addEventListener("focus",        () => showHint(lastname, lastnameError, "Votre nom de famille"));
  firstname.addEventListener("focus",       () => showHint(firstname, firstnameError, "Votre prénom"));
  email.addEventListener("focus",           () => showHint(email, emailError, "Votre adresse email Takalo-Takalo"));
  phone.addEventListener("focus",           () => showHint(phone, phoneError, "Format : 034 00 000 00"));
  password.addEventListener("focus",        () => showHint(password, passwordError, "Minimum 8 caractères pour votre sécurité"));
  passwordConfirm.addEventListener("focus", () => showHint(passwordConfirm, passwordConfirmError, "Retapez exactement le même mot de passe"));

  // ---------- Submit ----------
  form.addEventListener("submit", function (e) {
    e.preventDefault();
    formValidatedOnce = true;

    // Clear all
    [
      [lastname, lastnameError], [firstname, firstnameError],
      [email, emailError], [phone, phoneError],
      [password, passwordError], [passwordConfirm, passwordConfirmError]
    ].forEach(([f, eb]) => clearFieldHelp(f, eb));

    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Vérification en cours…';
    submitBtn.disabled = true;
    submitBtn.classList.add("processing");

    setTimeout(() => {
      const results = [
        validateLastname(),
        validateFirstname(),
        validateEmail(),
        validatePhone(),
        validatePassword(),
        validatePasswordConfirm(),
        validateTerms()
      ];

      const allValid = results.every(Boolean);

      if (allValid) {
        submitBtn.innerHTML = '<i class="bi bi-check-circle me-2"></i>Compte créé !';
        submitBtn.classList.remove("processing");

        setTimeout(() => { form.submit(); }, 1000);
      } else {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        submitBtn.classList.remove("processing");

        // Focus first invalid field
        const fields = [lastname, firstname, email, phone, password, passwordConfirm];
        for (let i = 0; i < results.length - 1; i++) {
          if (!results[i]) { fields[i].focus(); break; }
        }
      }
    }, 800);
  });
});
