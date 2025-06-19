# 📚 `/dev/tty` – Le terminal Unix/Linux expliqué

## 🔹 1. Qu’est-ce que `/dev/tty` ?

- `/dev/tty` est un **fichier spécial** représentant le **terminal contrôlant** le processus courant.
- C’est un **device file** de type caractère.
- Il permet d’interagir avec le **terminal actif**, indépendamment de la redirection des entrées/sorties (`stdin`, `stdout`).

---

## 🔹 2. Origine du mot "tty"

- "tty" = **teletypewriter**, une machine physique utilisée comme terminal.
- Aujourd’hui, cela représente un **terminal virtuel** (console, shell, SSH, etc.).

---

## 🔹 3. Types de terminaux courants

| Fichier spécial   | Description                                      |
|-------------------|--------------------------------------------------|
| `/dev/tty`        | Terminal **du processus courant**                |
| `/dev/tty0`       | Premier terminal virtuel (console principale)   |
| `/dev/pts/N`      | Pseudo-terminal (ex: shell, SSH, tmux)          |
| `/dev/console`    | Console système (affichage bas niveau)          |

---

## 🔹 4. Comportement de `/dev/tty`

### 📤 Écriture
- Écrit **directement sur le terminal actif**.
- Ignorera toute redirection de `stdout`.

### 📥 Lecture
- Lit **directement depuis le clavier du terminal courant**.
- Ignorera toute redirection de `stdin`.

---

## 🔹 5. Exemple C : écrire sur le terminal

```c
#include <stdio.h>

int main() {
    FILE* tty = fopen("/dev/tty", "w");
    if (tty) {
        fputs("Message direct au terminal\n", tty);
        fclose(tty);
    } else {
        perror("fopen");
    }
    return 0;
}
```

```bash
./a.out > output.txt
```

    Le message s'affiche sur le terminal, pas dans output.txt.

## 6. Utilité pour les développeurs

    🔐 Lire un mot de passe même si stdin est redirigé :

read -s password < /dev/tty

🛠 Écrire des logs ou des messages utilisateur directement :

    fprintf(fopen("/dev/tty", "w"), "Erreur critique\n");

    🎮 Interface utilisateur robuste dans des scripts ou daemons.

## 7. Voir les descripteurs de fichiers ouverts

ls -l /proc/$$/fd

Descripteur	Utilisation
0	stdin
1	stdout
2	stderr

    Tu verras s’ils pointent vers /dev/tty, un fichier, un pipe, etc.

## 8. À retenir

| Élément           | Détail                              |
|-------------------|------------------------------------|
| `/dev/tty`        | Accès direct au terminal actif     |
| Lecture/écriture  | Ne dépend pas de `stdin` ou `stdout` |
| Type spécial      | Fichier caractère dans `/dev`      |
| Utilité           | I/O terminal fiables dans tous les cas |

## TL;DR

    /dev/tty = terminal actif du processus

    Utilisé pour écrire/lire même en cas de redirection

    Incontournable pour les programmes interactifs, la saisie de mots de passe, et les messages système directs

---
