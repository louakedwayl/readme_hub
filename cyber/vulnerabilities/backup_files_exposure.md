# Cours : Fichiers de sauvegarde exposés

## Introduction

Les fichiers de sauvegarde sont des copies automatiques créées par les éditeurs de texte. Lorsqu'ils sont accessibles publiquement sur un serveur web, ils représentent une faille de sécurité car ils exposent le code source.

---

## Qu'est-ce qu'un fichier de sauvegarde ?

Les éditeurs de texte créent automatiquement des copies de sécurité pendant l'édition :

```bash
# Fichier original
index.php

# Fichiers de backup créés automatiquement
index.php~       # nano, gedit
index.php.bak    # manuel ou automatique
.index.php.swp   # vim (fichier temporaire)
#index.php#      # emacs
```

Ces fichiers sont normalement **invisibles** pour l'utilisateur mais restent sur le disque.

---

## Extensions courantes de backup

| Extension | Origine |
|-----------|---------|
| `.bak` | Backup général |
| `.old` | Ancienne version |
| `.backup` | Sauvegarde manuelle |
| `~` | nano, gedit, emacs |
| `.swp` | vim (swap file) |
| `.save` | Divers éditeurs |
| `.orig` | Fichier d'origine |
| `#fichier#` | emacs |

---

## Le problème de sécurité

### Comportement normal
```
http://site.com/index.php
→ Le serveur EXÉCUTE le code PHP
→ Retourne le HTML généré
```

### Fichier de backup accessible
```
http://site.com/index.php~
→ Le serveur NE RECONNAÎT PAS l'extension
→ Retourne le CODE SOURCE en clair
```

### Conséquences

Le code source peut contenir :
- Mots de passe et identifiants
- Clés API et secrets
- Logique de sécurité de l'application
- Informations sur la base de données
- Algorithmes et code propriétaire

---

## Comment exploiter cette faille

### 1. Identifier les fichiers du site
Visiter le site et noter les fichiers visibles :
- index.php
- login.php
- admin.php
- config.php

### 2. Tester les extensions de backup
```bash
curl http://site.com/index.php.bak
curl http://site.com/index.php~
curl http://site.com/index.php.old
curl http://site.com/.index.php.swp
```

### 3. Analyser le code source
Chercher dans le code :
- Variables de configuration
- Mots de passe en clair
- Flags ou secrets
- Failles de sécurité

---

## Exemple pratique

```bash
# Page normale (PHP exécuté)
curl http://challenge.com/login.php
# Affiche : formulaire HTML

# Fichier de backup (code source visible)
curl http://challenge.com/login.php~
# Affiche : <?php $password = "secret123"; ?>
```

---

## Comment se protéger

### Pour les développeurs

1. **Ne jamais éditer directement en production**
```bash
# Mauvais
ssh serveur
vim /var/www/index.php  # Crée des fichiers temporaires !

# Bon
git push → déploiement automatique
```

2. **Nettoyer les fichiers temporaires**
```bash
find /var/www -name "*~" -delete
find /var/www -name "*.bak" -delete
find /var/www -name ".*.swp" -delete
```

3. **Utiliser .gitignore**
```
*~
*.bak
*.swp
*.old
```

### Pour les administrateurs système

**Configurer le serveur pour bloquer ces fichiers :**

```nginx
# Nginx
location ~ \.(bak|old|save|swp)$ {
    deny all;
}
```

```apache
# Apache
<FilesMatch "\.(bak|old|save|swp)$">
    Require all denied
</FilesMatch>
```

---

## Outils d'analyse

Des outils automatiques testent ces vulnérabilités :

```bash
# Outils de scan
- dirsearch
- gobuster
- ffuf
- nikto
```

Ils testent automatiquement des centaines d'extensions et de patterns.

---

## Cas réels

Cette vulnérabilité existe vraiment sur :
- Sites gouvernementaux
- Anciennes applications web
- Sites maintenus manuellement
- Migrations de serveurs mal faites

C'est une des **premières choses** que vérifient les bug bounty hunters.

---

## Résumé

1. Les éditeurs créent des fichiers de backup automatiquement
2. Ces fichiers exposent le code source s'ils sont accessibles
3. Tester les extensions `.bak`, `~`, `.old`, `.swp`, etc.
4. Le code source révèle souvent des secrets
5. Se protéger : déploiement automatique + configuration serveur

---

## Points clés à retenir

- ✅ Toujours vérifier les fichiers de backup sur un site
- ✅ Ne jamais laisser ces fichiers en production
- ✅ Automatiser les déploiements pour éviter l'édition directe
- ✅ Configurer le serveur pour bloquer l'accès à ces extensions
