# 📘 Cours – HTTP Cookies et Cookie Tampering

## 1️⃣ Introduction aux cookies HTTP

Un **cookie HTTP** est une petite donnée stockée côté client (navigateur) et envoyée automatiquement au serveur à chaque requête HTTP.

Il est souvent utilisé pour :

* gérer les sessions
* mémoriser un utilisateur connecté
* stocker des préférences

### Exemple de cookie

```http
Set-Cookie: role=user; Path=/; HttpOnly
```

⚠️ **Important** : tout ce qui est stocké côté client peut être **lu et modifié** par l’utilisateur.

---

## 2️⃣ Fonctionnement client / serveur

1. Le serveur envoie un cookie
2. Le navigateur le stocke
3. Le navigateur renvoie le cookie au serveur
4. Le serveur prend une décision basée sur ce cookie

➡️ Si le serveur **fait confiance au cookie sans vérification**, une vulnérabilité apparaît.

---

## 3️⃣ Cookie Tampering (Manipulation de cookie)

### 🔍 Définition

Le **Cookie Tampering** consiste à **modifier manuellement la valeur d’un cookie** afin de tromper le serveur.

Ce n’est **pas** du vol de cookie.

---

## 4️⃣ Exemple de vulnérabilité

### Cookie initial

```text
role=user
```

### Action de l’attaquant

* Ouverture des DevTools
* Modification du cookie :

```text
role=admin
```

### Résultat

Le serveur considère l’utilisateur comme **administrateur**.

---

## 5️⃣ Pourquoi ce n’est PAS du vol de cookie

| Cookie Tampering                  | Cookie Theft                         |
| --------------------------------- | ------------------------------------ |
| Modification de son propre cookie | Vol du cookie d’un autre utilisateur |
| Pas besoin de XSS                 | Souvent via XSS ou malware           |
| Attaque locale                    | Attaque à distance                   |

👉 Ici, l’utilisateur manipule **ses propres données**.

---

## 6️⃣ Vulnérabilité principale

### ❌ Mauvaise pratique

```php
if ($_COOKIE['role'] === 'admin') {
    // accès admin
}
```

### Problème

* Le serveur fait confiance à une donnée **contrôlée par le client**

---

## 7️⃣ Classification OWASP

* **OWASP Top 10**
* A5: Security Misconfiguration
* A2: Broken Authentication (selon le contexte)

---

## 8️⃣ Comment exploiter (CTF / Challenge)

1. Inspecter les cookies
2. Identifier les valeurs sensibles (`role`, `user`, `admin`, etc.)
3. Modifier le cookie
4. Envoyer une nouvelle requête

---

## 9️⃣ Contremesures (sécurisation)

### ✅ Bonnes pratiques

* Ne jamais stocker les droits dans un cookie en clair
* Utiliser des **sessions côté serveur**
* Signer les cookies (HMAC)
* Chiffrer les cookies sensibles

### Exemple sécurisé (principe)

```php
$_SESSION['role'] = 'user';
```

---

## 🔟 Résumé

* Les cookies sont **contrôlés par le client**
* Modifier un cookie = **Cookie Tampering**
* Ce n’est pas du vol de cookie
* Le serveur ne doit **jamais faire confiance au client**

---

## 🧠 Phrase clé à retenir

> Toute donnée stockée côté client doit être considérée comme **non fiable**.

---

📌 Fin du cours
