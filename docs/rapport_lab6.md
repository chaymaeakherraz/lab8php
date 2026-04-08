# Rapport LAB 6 — Sécurité MVC

## 1. Introduction
Ce projet consiste à construire une application MVC sécurisée en PHP avec :
- Authentification admin
- Protection des routes
- CSRF
- Validation des données

---

## 2. Architecture

Le projet est structuré comme suit :

- Core : Router, Request, Response
- Controller : AuthController, EtudiantController
- Dao : accès base de données
- Security : Auth, Csrf, Middleware, Validator, Sanitizer
- Views : interfaces utilisateur

---

## 3. Authentification

- Login avec username/password
- Utilisation de password_verify()
- Session stockée avec admin_id
- session_regenerate_id() pour sécurité

---

## 4. Gestion des sessions

- session_start() au démarrage
- Session détruite avec logout
- Protection contre fixation de session

---

## 5. CSRF

- Token généré avec random_bytes()
- Stocké dans $_SESSION
- Vérifié à chaque requête POST

---

## 6. Protection des routes

- Middleware requireAuth()
- Redirection vers /login si non connecté

---

## 7. Validation et nettoyage

- Sanitizer : trim, htmlspecialchars
- Validator : email, CNE, required

---

## 8. Protection contre attaques

### SQL Injection
- Requêtes préparées (PDO)

### XSS
- htmlspecialchars() dans les vues

### CSRF
- Token obligatoire dans POST

---

## 9. Résultat final

Application avec :
- Login sécurisé
- Routes protégées
- Liste étudiants
- Sécurité complète

---

## 10. Limites

- Pas de gestion des rôles
- Pas de limitation des tentatives login
- Pas de HTTPS forcé

---

## 11. Conclusion

Ce projet montre l’importance de sécuriser :
- les sessions
- les formulaires
- les accès aux données
