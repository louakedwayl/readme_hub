# Substitution de Commande en Bash

La **substitution de commande** permet d’**exécuter une commande dans le shell et de récupérer sa sortie** pour l’utiliser dans une variable, un autre script ou directement dans une commande.

## 1️⃣ Syntaxe

### Moderne (préférée)

```bash
result=$(commande)
```

### Ancienne (moins lisible)

```bash
result=`commande`
```

**Exemple :**

```bash
date_today=$(date)
echo "Aujourd'hui : $date_today"
```

* `date` s’exécute et sa sortie est stockée dans la variable `date_today`.
* Le `echo` affiche le résultat.

## 2️⃣ Utiliser la sortie directement dans une commande

```bash
echo "Le nombre de fichiers dans ce dossier est $(ls | wc -l)"
```

* `ls` liste les fichiers.
* `wc -l` compte les lignes.
* Le résultat final est inséré directement dans la chaîne.

## 3️⃣ Substitution de commande imbriquée

```bash
echo "Le répertoire actuel contient $(ls $(pwd) | wc -l) fichiers"
```

* `pwd` retourne le chemin actuel.
* `ls $(pwd)` liste les fichiers.
* `wc -l` compte combien de fichiers il y a.

## 4️⃣ Conseils

* Toujours préférer `$(…)` plutôt que les backticks `` `…` ``.
* Si la sortie contient des espaces ou des retours à la ligne, encadre la substitution de guillemets :

```bash
files_count="$(ls | wc -l)"
echo "Nombre de fichiers : $files_count"
```

## 5️⃣ Exemples pratiques

* Obtenir l’utilisateur courant :

```bash
current_user=$(whoami)
echo "Connecté en tant que $current_user"
```

* Obtenir l’IP locale :

```bash
local_ip=$(hostname -I | awk '{print $1}')
echo "IP locale : $local_ip"
```

* Lister les fichiers texte :

```bash
files=$(ls *.txt)
echo "Fichiers texte : $files"
```

## ✅ Résumé

* **But** : exécuter une commande et récupérer sa sortie.
* **Syntaxe moderne** : `$(commande)`
* **Syntaxe ancienne** : `` `commande` ``
* Utile pour automatiser des scripts et passer des résultats entre commandes.
