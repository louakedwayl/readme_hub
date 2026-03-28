# Flake8 — Cours simple

## 1. C'est quoi Flake8 ?

Flake8 est un outil Python qui sert à analyser ton code pour vérifier :

- Le style.
- Certaines erreurs simples.
- Quelques problèmes de qualité de code.

En gros, il te dit si ton code respecte une certaine norme d'écriture.

À 42, on peut le voir comme une sorte de **"norminette pour Python"**.

---

## 2. À quoi ça sert ?

Flake8 sert à :

- Garder un code propre.
- Repérer des erreurs simples avant d'exécuter le programme.
- Respecter un style cohérent.
- Éviter certains oublis ou mauvaises habitudes.

Ce n'est pas un compilateur. Ce n'est pas non plus un outil magique qui corrige tout. Il analyse et signale des problèmes.

---

## 3. Ce que Flake8 vérifie en général

Flake8 peut vérifier par exemple :

- Des espaces mal placés.
- Des lignes trop longues.
- Des variables importées mais jamais utilisées.
- Certaines erreurs de syntaxe ou incohérences simples.

Donc il aide à écrire un code plus lisible et plus propre.

---

## 4. Installation

```bash
pip install flake8
```

Si tu veux vérifier qu'il est bien installé :

```bash
flake8 --version
```

---

## 5. Utilisation de base

Pour analyser un fichier Python :

```bash
flake8 mon_fichier.py
```

Pour analyser tout un dossier :

```bash
flake8 .
```

Flake8 affiche alors les erreurs trouvées avec :

- Le nom du fichier.
- La ligne.
- La colonne.
- Un code d'erreur.
- Un message.

---

## 6. Pourquoi 42 parle de `alias norminette=flake8` ?

Exemple :

```bash
alias norminette=flake8
```

Cette commande crée un **alias** dans ton terminal. Ça veut dire que quand tu tapes :

```bash
norminette mon_fichier.py
```

le terminal lance en réalité :

```bash
flake8 mon_fichier.py
```

Donc :

- `flake8` = le vrai programme.
- `norminette` = juste un raccourci choisi par toi.

42 fait ça pour te donner une habitude proche de la Norminette en C.

---

## 7. Exemple simple

Code avec problèmes :

```python
def hello( ):
    print("Hello")
```

Flake8 peut signaler qu'il y a un problème de style, par exemple un espace mal placé.

L'idée n'est pas seulement que le code fonctionne. L'idée est aussi qu'il soit **proprement écrit**.

---

## 8. Fichier de configuration

Flake8 peut être configuré dans un projet pour éviter de retaper les options à chaque fois.

On peut le configurer dans un fichier comme :

- `.flake8`
- `setup.cfg`
- `tox.ini`

Cela permet par exemple de définir :

- La longueur maximale des lignes.
- Certains fichiers à ignorer.
- Certains codes d'erreurs à ignorer.

---

## 9. Ce que Flake8 ne fait pas

Flake8 ne remplace pas :

- Ta réflexion.
- Les tests.
- Une vraie relecture de code.

Il ne dit pas toujours si ton programme est "bon". Il dit surtout s'il est **propre selon certaines règles** et s'il repère des problèmes simples.

Donc un code peut :

- Passer Flake8, mais rester mauvais sur le fond.
- Fonctionner, mais ne pas respecter le style demandé.

---

## 10. Bon réflexe à avoir

Quand tu écris un fichier Python :

1. Tu écris ton code.
2. Tu testes ton programme.
3. Tu lances Flake8.
4. Tu corriges les erreurs signalées.
5. Tu retestes.

C'est une bonne habitude de développement.

---

## 11. Résumé

Flake8 est un outil qui sert à vérifier la qualité de base et le style d'un code Python.

Il permet :

- D'appliquer une norme d'écriture.
- De repérer certaines erreurs simples.
- D'avoir un code plus propre et plus lisible.

Commande principale :

```bash
flake8 mon_fichier.py
```

Et à 42, on peut faire un alias pour l'utiliser comme une "norminette Python" :

```bash
alias norminette=flake8
```

---

## 12. À retenir

- Flake8 n'est pas un programme créé par 42.
- C'est un outil Python classique.
- 42 te demande simplement de l'utiliser.
- Il sert à vérifier le style et quelques erreurs simples.
- Ce n'est pas un correcteur automatique, mais un **outil d'analyse**.
