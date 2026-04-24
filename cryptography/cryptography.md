# Cryptographie — Vue d'ensemble

## Définition

Science qui protège l'information avec des mathématiques.

## 3 objectifs

- **Confidentialité** — personne d'autre ne peut lire.
- **Intégrité** — le message n'a pas été modifié.
- **Authenticité** — l'émetteur est bien celui qu'il prétend être.

## 3 familles d'outils

- **Chiffrement symétrique** — une seule clé partagée. Rapide. Exemple : AES.
- **Chiffrement asymétrique** — clé publique + clé privée. Lent mais résout l'échange de clé. Exemple : RSA.
- **Hachage** — empreinte à sens unique, pas de clé, pas réversible. Exemple : SHA-256.

## Usages courants

HTTPS, SSH, signatures numériques, stockage de mots de passe, JWT, blockchain, messageries chiffrées.

## Ce qui est mort / vivant

- Mort : MD5, SHA-1, DES.
- Vivant : AES, SHA-256, bcrypt, argon2.

## Pour un pentester

Les algorithmes modernes ne sont presque jamais cassés. Ce qui est cassé, c'est la façon dont les développeurs les utilisent.
