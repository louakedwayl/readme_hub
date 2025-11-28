# Cours sur les règles Sudo

## 1. Introduction à sudo

`sudo` (SuperUser DO) est une commande Linux/Unix qui permet à un utilisateur d'exécuter des commandes avec les privilèges d'un autre utilisateur, généralement l'utilisateur root.
L'intérêt principal de `sudo` est de donner des droits administratifs limités à certains utilisateurs sans leur donner le mot de passe root.

---

## 2. Fichier de configuration sudo

Le fichier principal de configuration de `sudo` est `/etc/sudoers`.
**Important :** Ne jamais éditer directement ce fichier avec un éditeur classique. Utilisez toujours la commande :

```bash
sudo visudo
```

`visudo` vérifie la syntaxe avant de sauvegarder, évitant de bloquer l'accès à `sudo`.

---

## 3. Syntaxe générale dans `/etc/sudoers`

La syntaxe générale est :

```
utilisateur hôte = (utilisateur_exécutant) commandes
```

* **utilisateur** : nom de l'utilisateur ou groupe autorisé à utiliser `sudo`.
* **hôte** : nom de la machine où la règle s'applique (souvent `ALL`).
* **utilisateur_exécutant** : utilisateur dont les droits seront utilisés (souvent `root`).
* **commandes** : commandes que l'utilisateur peut exécuter.

### Exemples :

1. Autoriser un utilisateur à tout exécuter comme root :

```
alice ALL=(ALL) ALL
```

2. Autoriser un utilisateur à exécuter uniquement `apt` :

```
bob ALL=(ALL) /usr/bin/apt
```

3. Autoriser tous les membres du groupe `admin` :

```
%admin ALL=(ALL) ALL
```

---

## 4. Négations et restrictions

* Pour interdire certaines commandes, on peut utiliser `!` :

```
bob ALL=(ALL) ALL, !/bin/rm
```

* Pour autoriser une commande sans mot de passe :

```
alice ALL=(ALL) NOPASSWD: /usr/bin/systemctl restart apache2
```

---

## 5. Groupes et alias

* **Alias d’utilisateur** : regroupe plusieurs utilisateurs sous un même nom d’alias.

```
User_Alias DEVELOPERS = alice, bob, charlie
DEVELOPERS ALL=(ALL) ALL
```

* **Alias de commande** : regroupe plusieurs commandes.

```
Cmnd_Alias SOFTWARE = /usr/bin/apt, /usr/bin/dpkg
alice ALL=(ALL) SOFTWARE
```

* **Alias d’hôte** : regroupe plusieurs machines.

```
Host_Alias SERVERS = server1, server2
alice SERVERS=(ALL) ALL
```

---

## 6. Bonnes pratiques

1. Ne jamais donner `ALL` à tous les utilisateurs sans nécessité.
2. Préférer limiter les commandes pour réduire les risques.
3. Toujours tester les règles avec `sudo -l -U utilisateur`.
4. Utiliser des alias pour simplifier la lecture.
5. Eviter `NOPASSWD` sauf si nécessaire pour automatisation.

---

## 7. Commandes utiles

* Vérifier ce qu’un utilisateur peut faire avec `sudo` :

```bash
sudo -l
sudo -l -U alice
```

* Exécuter une commande comme un autre utilisateur :

```bash
sudo -u bob whoami
```

* Lancer un shell root :

```bash
sudo -i
sudo su -
```

---

## 8. Ressources supplémentaires

* `man sudo`
* `man sudoers`
* [Sudo Wiki](https://www.sudo.ws/)
