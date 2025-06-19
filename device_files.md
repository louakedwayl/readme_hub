# 📚 Cours : Les Device Files (Fichiers de périphériques) sous Unix/Linux

---

## 1. Qu’est-ce qu’un device file ?

- Un **device file** est un **fichier spécial** situé dans le répertoire `/dev`.
- Il sert d’**interface logicielle** entre les programmes et les périphériques matériels (ou virtuels).
- Grâce à lui, un périphérique se manipule comme un fichier classique (lecture, écriture, contrôle), mais les opérations sont redirigées vers le matériel.

---

## 2. Pourquoi les device files existent ?

- Unix applique le principe **« tout est fichier »**.
- Pour uniformiser l’accès aux ressources (disques, claviers, terminaux, imprimantes, etc.).
- Les device files masquent la complexité du matériel et simplifient la programmation.

---

## 3. Où trouve-t-on les device files ?

- Principalement dans le dossier `/dev`.
- Exemples courants :
  - `/dev/null` : trou noir, supprime tout ce qu’on écrit.
  - `/dev/zero` : flux infini de zéros.
  - `/dev/tty` : terminal courant du processus.
  - `/dev/sda` : disque dur principal.
  - `/dev/pts/0` : pseudo-terminal.

---

## 4. Types de device files

| Type                    | Description                                        | Exemple                     |
|-------------------------|--------------------------------------------------|-----------------------------|
| **Character device**     | Données transmises octet par octet (flux continu) | Clavier, terminal, port série |
| **Block device**         | Données en blocs (accès aléatoire)                | Disque dur, clé USB           |

---

## 5. Comment reconnaître un device file ?

- Avec la commande `ls -l /dev/nom_du_fichier` :

```bash
crw-rw-rw- 1 root root 5, 1 Jun 19 20:00 /dev/tty
brw-rw---- 1 root disk 8, 0 Jun 19 20:00 /dev/sda
```

    Le premier caractère :

        c = character device

        b = block device

    Les chiffres 5, 1 sont les major et minor numbers qui identifient le driver matériel.

## 6. Major et Minor Numbers

    Major number : identifie le driver associé au périphérique.

    Minor number : identifie une instance spécifique du périphérique.

Exemple :

    Major 8 → driver pour disque dur

    Minor 0 → premier disque /dev/sda

    Minor 1 → première partition /dev/sda1

## 7. Utilisation des device files

    Les programmes ouvrent ces fichiers via open().

    Puis lisent ou écrivent avec read() et write().

    Les appels système sont interceptés par le driver correspondant qui contrôle le périphérique réel.

## 8. Exemple : /dev/tty

    Device file caractère.

    Représente le terminal du processus courant.

    Permet d’écrire ou lire directement sur le terminal, même si les flux standards sont redirigés.

## 9. Créer un device file (rarement nécessaire)

    Commande mknod permet de créer un device file (exige droits root).

    Syntaxe :
```bash
mknod /dev/mondevice c 240 0
```
    Ici c = caractère, 240 = major, 0 = minor.

## 10. Conclusion

    Les device files sont essentiels dans Unix/Linux.

    Ils permettent d’interagir simplement avec le matériel.

    Connaître leur fonctionnement est fondamental pour programmer au niveau système.

