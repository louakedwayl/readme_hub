# Le Hachage

## 1. Définition

Fonction qui prend une entrée de n'importe quelle taille et produit une **empreinte** de taille fixe.

Exemple :
```
"hello"        → 5d41402abc4b2a76b9719d911017c592  (MD5)
"hello!"       → 9d5ed678fe57bcca610140957afab571  (MD5)
fichier_3Go    → 5d41402abc4b2a76b9719d911017c592  (même format, 32 caractères)
```

**Synonymes** : hash, empreinte, digest, checksum.

---

## 2. Les 4 propriétés d'un bon hash

1. **Déterministe** — même entrée = même sortie, toujours.
2. **Taille fixe** — peu importe l'entrée, la sortie a une taille constante.
3. **Sens unique** — impossible de remonter du hash à l'entrée.
4. **Effet avalanche** — un bit changé en entrée = hash complètement différent.

Si une seule de ces propriétés casse, le hash est inutilisable en sécurité.

---

## 3. Différence avec le chiffrement

| | Hachage | Chiffrement |
|---|---|---|
| Clé ? | Non | Oui |
| Réversible ? | **Non** | Oui (avec la clé) |
| Sortie | Taille fixe | Taille variable |
| Objectif | Intégrité, empreinte | Confidentialité |

On ne "dé-hashe" pas. On **craque** un hash (bruteforce ou dictionnaire).

---

## 4. Les usages

- **Intégrité de fichiers** — vérifier qu'un téléchargement n'a pas été corrompu.
- **Stockage de mots de passe** — jamais en clair, toujours hachés.
- **Signatures numériques** — on signe le hash, pas le message entier.
- **Structures de données** — tables de hachage, HashMap.
- **Blockchain** — chaînage des blocs par hash.
- **Déduplication** — Git, stockage cloud.

---

## 5. Familles d'algorithmes

### Cassés (ne jamais utiliser en sécurité)
- **MD5** (128 bits) — collisions trouvées en 2004.
- **SHA-1** (160 bits) — cassé par Google en 2017 (SHAttered).

### Sûrs (usage général)
- **SHA-2** (SHA-256, SHA-512) — standard actuel.
- **SHA-3** — alternative plus récente.
- **BLAKE2 / BLAKE3** — rapides et modernes.

### Sûrs (spécifiques mots de passe)
Volontairement **lents** pour ralentir le bruteforce :
- **bcrypt** — le plus courant (PHP, Node, Python).
- **scrypt** — gourmand en mémoire.
- **argon2** — gagnant du Password Hashing Competition 2015, recommandé aujourd'hui.

---

## 6. Pourquoi certains hash sont "cassés"

Deux problèmes distincts.

### Problème 1 — Collisions
Trouver deux entrées différentes qui produisent le même hash.
- MD5 : collisions calculables en quelques secondes.
- SHA-1 : démontré cassable en 2017.
- Impact : signatures falsifiables, certificats contrefaits.

### Problème 2 — Vitesse
Un hash général (MD5, SHA-256) est fait pour être **rapide**. Pour des mots de passe, c'est un défaut : un GPU moderne calcule des milliards de hash par seconde.
- Solution : bcrypt / argon2 sont lents **volontairement**.

---

## 7. Salt et pepper

### Salt
Valeur aléatoire ajoutée à l'entrée **avant** le hachage. Stockée à côté du hash.

```
hash = bcrypt(password + salt)
```

**À quoi ça sert :**
- Empêche les **rainbow tables** (CrackStation).
- Deux utilisateurs avec le même mot de passe auront des hashs différents.

### Pepper
Secret global côté serveur, ajouté au salt. Stocké **ailleurs** que dans la base (variable d'environnement, HSM).

Si la base fuit mais pas le pepper → hashs incassables.

---

## 8. Comment on craque un hash

### Méthode 1 — Lookup (rainbow tables)
On précalcule les hashs des mots de passe courants. Lookup = instantané.
- Outil : CrackStation, Google.
- Contre-mesure : salt.

### Méthode 2 — Dictionnaire
On hashe chaque mot d'une wordlist et on compare.
- Wordlist classique : `rockyou.txt` (14 millions de mdp fuités).
- Outils : `hashcat`, `john the ripper`.

### Méthode 3 — Bruteforce
On teste toutes les combinaisons possibles.
- Viable sur mots de passe courts (< 8 caractères) avec GPU.
- Contre-mesure : longueur + bcrypt/argon2.

### Méthode 4 — Bruteforce hybride
Dictionnaire + règles de mutation (ajout de chiffres, remplacement a→@, etc.).
- C'est ce que les vrais attaquants utilisent.

---

## 9. Ce que tu dois savoir faire en pentest

- **Identifier un hash** à sa forme : longueur, format (outil `hashid`).
- **Craquer un MD5/SHA1 simple** : CrackStation, `hashcat -m 0`.
- **Comprendre pourquoi bcrypt est incraquable** en pratique.
- **Détecter un hash mal utilisé** : MD5 pour un cookie, absence de salt, etc. (Darkly flag admin cookie).

---

## 10. Résumé opérationnel

| Besoin | Algorithme à utiliser |
|---|---|
| Mot de passe | **argon2id** (ou bcrypt si dispo) |
| Intégrité fichier | **SHA-256** |
| Signature rapide | **BLAKE3** |
| Vérif rapide non critique | SHA-256 |

| À bannir en 2026 |
|---|
| MD5 pour la sécurité |
| SHA-1 pour la sécurité |
| SHA-256 pour des mots de passe (trop rapide) |
| Hasher sans salt |
| Inventer son propre algo |

---

**Règle finale** : un dev qui hash des mots de passe en MD5 ou SHA-256 directement, même avec salt, fait une faute professionnelle en 2026. bcrypt minimum, argon2 idéal.
