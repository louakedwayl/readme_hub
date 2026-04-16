# Injections SQL — Cours général

## 1. Définition

Une **injection SQL** (SQLi) est une vulnérabilité web qui permet à un attaquant d'interférer avec les requêtes qu'une application envoie à sa base de données. L'attaquant injecte du code SQL malveillant dans une entrée utilisateur (formulaire, URL, cookie, header) qui est ensuite concaténée sans contrôle dans une requête SQL exécutée côté serveur.

C'est l'une des vulnérabilités les plus anciennes, les plus connues — et encore aujourd'hui l'une des plus exploitées. Classée régulièrement dans le **OWASP Top 10** sous la catégorie *Injection*.

---

## 2. Pourquoi ça existe

La cause racine est unique : **mélange entre données utilisateur et code**.

Quand une application construit une requête SQL en concaténant directement une chaîne fournie par l'utilisateur, le moteur SQL ne fait plus la différence entre l'instruction voulue par le développeur et l'instruction injectée par l'attaquant.

Exemple conceptuel :

```
requête = "SELECT * FROM users WHERE name = '" + input + "'"
```

Si `input` contient du SQL valide, il devient partie intégrante de la requête. Le moteur exécute l'ensemble comme une seule instruction légitime.

---

## 3. Les grandes familles de SQLi

### 3.1 In-band (classique)

L'attaquant reçoit directement le résultat de son injection dans la réponse HTTP.

- **Error-based** : exploite les messages d'erreur SQL renvoyés par le serveur pour extraire des données.
- **Union-based** : utilise l'opérateur `UNION` pour greffer les résultats d'une requête attaquante sur la requête légitime.

### 3.2 Inferential (Blind SQLi)

L'application ne renvoie ni les données ni les erreurs. L'attaquant déduit l'information à partir du comportement du serveur.

- **Boolean-based** : observe la différence de réponse entre une condition vraie et fausse (page différente, redirection, contenu modifié).
- **Time-based** : force le serveur à attendre (`SLEEP`, `WAITFOR DELAY`) pour inférer une information bit par bit.

### 3.3 Out-of-band

L'attaquant fait exfiltrer les données via un canal secondaire (requête DNS, HTTP sortante). Utilisé quand les deux précédentes sont impossibles ou trop lentes.

---

## 4. Points d'injection typiques

Tout ce qui entre dans l'application est un vecteur potentiel :

- Paramètres GET / POST
- Champs de formulaires (login, recherche, filtres)
- Headers HTTP (`User-Agent`, `Referer`, `Cookie`, `X-Forwarded-For`)
- Valeurs JSON / XML dans les API
- Paramètres d'URL utilisés dans du tri ou du filtrage (`ORDER BY`, `LIMIT`)
- Uploads dont le nom ou les métadonnées sont insérés en base

---

## 5. Ce qu'un attaquant peut obtenir

Le spectre d'impact va du mineur au catastrophique :

1. **Bypass d'authentification** — se connecter sans mot de passe valide.
2. **Extraction de données** — vol de bases entières (utilisateurs, hashes, données personnelles, cartes bancaires).
3. **Modification / destruction** — altération ou suppression de données (`UPDATE`, `DELETE`, `DROP`).
4. **Élévation de privilèges** — accès aux comptes administrateurs.
5. **Exécution de commandes système** — selon le SGBD et ses permissions (`xp_cmdshell` sur MSSQL, `COPY ... PROGRAM` sur PostgreSQL, `INTO OUTFILE` sur MySQL) → pivot vers du RCE.
6. **Compromission du serveur** — prise de contrôle totale du backend.

---

## 6. Méthodologie d'exploitation (vue d'ensemble)

Sans rentrer dans le détail technique :

1. **Détection** — test de caractères spéciaux (`'`, `"`, `;`, `--`) pour provoquer une erreur ou un comportement anormal.
2. **Confirmation** — vérifier que l'entrée est bien interprétée comme du SQL.
3. **Fingerprinting** — identifier le SGBD (MySQL, PostgreSQL, MSSQL, Oracle, SQLite) car la syntaxe varie.
4. **Énumération** — schéma de la base, tables, colonnes (via `information_schema` ou équivalent).
5. **Extraction** — récupération des données sensibles.
6. **Post-exploitation** — selon contexte : écriture de fichiers, RCE, persistance.

Outil de référence pour l'automatisation : **sqlmap**.

---

## 7. Défenses

### 7.1 Défense principale — Requêtes paramétrées

**Prepared statements** / **parameterized queries**. Le paramètre est transmis séparément du code SQL. C'est la seule défense réellement robuste.

Tous les langages / ORM modernes fournissent ce mécanisme : PDO (PHP), psycopg2 (Python), SQLAlchemy, Doctrine, Prisma, JDBC PreparedStatement, etc.

### 7.2 Défenses secondaires

- **Validation stricte des entrées** (allowlist, pas denylist).
- **Principe du moindre privilège** sur le compte DB applicatif (pas de `DROP`, pas de `FILE`, pas d'admin).
- **WAF** (Web Application Firewall) — utile en couche additionnelle, jamais en défense unique : contournable.
- **Échappement** des entrées — à utiliser uniquement quand les prepared statements sont impossibles (ex : noms de tables/colonnes dynamiques). Fragile.
- **ORM bien utilisés** — mais attention, les ORM ne protègent pas si l'on passe du SQL brut (`raw()`, `DB::raw`).
- **Masquage des erreurs SQL** en production.
- **Monitoring / logs** pour détecter les patterns d'attaque.

### 7.3 Ce qui ne marche pas

- Filtrer uniquement `'` ou des mots-clés (`SELECT`, `UNION`) → contournable par encodage, casse, commentaires, payloads alternatifs.
- Faire confiance au JavaScript côté client.
- Cacher les paramètres (sécurité par obscurité).

---

## 8. Cas particuliers à connaître

- **Second-order SQLi** : l'injection est stockée en base, puis exécutée lors d'une requête ultérieure. Très difficile à détecter.
- **NoSQL injection** : variante sur MongoDB, CouchDB, etc. Logique similaire, syntaxe différente.
- **ORM injection** : mauvais usage d'un ORM qui réintroduit de la concaténation brute.
- **Stored procedures vulnérables** : les procédures stockées ne sont pas intrinsèquement sûres si elles construisent du SQL dynamique en interne.

---

## 9. Labs et entraînement

Environnements légaux pour pratiquer :

- **PortSwigger Web Security Academy** — le standard pour SQLi, labs progressifs.
- **DVWA** (Damn Vulnerable Web Application).
- **HackTheBox / TryHackMe / Root-Me** — challenges dédiés.
- **OWASP Juice Shop**.

---

## 10. Références

- OWASP — *SQL Injection Prevention Cheat Sheet*
- CWE-89 — *Improper Neutralization of Special Elements used in an SQL Command*
- PortSwigger Web Security Academy — section SQL Injection
- Livre : *The Web Application Hacker's Handbook* (Stuttard & Pinto)

---

## Résumé en une ligne

> Toute entrée utilisateur concaténée dans une requête SQL est une faille. Prepared statements + moindre privilège = 99 % du problème réglé.
