# 🧠 Nginx — `sites-available` & `sites-enabled`

## 📌 Introduction

Dans Nginx, la gestion des sites web se fait via des fichiers de configuration.

Sur les systèmes comme Ubuntu ou Debian, Nginx utilise deux dossiers principaux :

- /etc/nginx/sites-available
- /etc/nginx/sites-enabled

---

## 🗂️ `sites-available`

### 🔹 Rôle

Ce dossier contient **toutes les configurations de sites possibles**.

👉 On peut voir ça comme une **bibliothèque de configs**.

- Chaque fichier = un site (ou une config)
- Les sites ne sont pas forcément actifs

---

## ⚡ `sites-enabled`

### 🔹 Rôle

Ce dossier contient **uniquement les sites actifs**.

👉 Nginx lit **seulement** les fichiers présents ici.

### 🔹 Fonctionnement

- Les fichiers ici sont souvent des **liens symboliques** vers `sites-available`
- Cela permet d’activer/désactiver un site facilement

---

## 🔗 Relation entre les deux

### 🧩 Principe

- `sites-available` = configs disponibles  
- `sites-enabled` = configs activées  

👉 Pour activer un site, on crée un lien :

    sudo ln -s /etc/nginx/sites-available/monsite.com /etc/nginx/sites-enabled/

👉 Pour désactiver :

    sudo rm /etc/nginx/sites-enabled/monsite.com

---

## 🔄 Recharger Nginx

Après modification :

    sudo systemctl reload nginx

👉 Cela applique les changements sans couper le serveur.

---

## 🎯 Pourquoi cette organisation ?

Cette séparation permet :

- Activer/désactiver rapidement un site  
- Éviter de supprimer des configs  
- Garder un système propre et organisé  

---

## 🧠 Résumé

| Dossier            | Rôle                          |
|-------------------|-------------------------------|
| sites-available   | Toutes les configs            |
| sites-enabled     | Configs actives uniquement    |

👉 Nginx ne lit que `sites-enabled`
