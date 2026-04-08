# Tests Sécurité — LAB 6

## 🔐 Test Login

- POST /login avec données correctes
  → Redirection vers /etudiants

- POST /login avec mauvais mot de passe
  → Message "Login failed"

- POST /login sans CSRF
  → 403 erreur

---

## 🔒 Test Accès protégé

- Accès /etudiants sans login
  → Redirection vers /login

- Accès après login
  → OK

---

## 🛡️ Test CSRF

- Supprimer _csrf du formulaire
  → 403

- Modifier token
  → 403

---

## ⏳ Test Session

- Login puis attendre
  → Session expire (optionnel)

---

## 💉 Test SQL Injection

Tester: