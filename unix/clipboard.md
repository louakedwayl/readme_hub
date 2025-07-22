# Comprendre le système de presse-papiers sous Linux (X11) et `xclip`

---

## 📋 Introduction

Sous Linux, en particulier avec **X11** (le système graphique utilisé par la plupart des distributions), il existe **plusieurs types de presse-papiers**, contrairement à Windows ou macOS qui n’en utilisent généralement qu’un seul.

Le plus connu des outils pour interagir avec le presse-papiers sous X11 est **`xclip`**.

Le presse-papiers est une zone mémoire temporaire utilisée par ton système pour stocker des données que tu copies (texte, images, fichiers…) afin de les coller ailleurs.

    C’est ce qui permet de faire :
    Ctrl+C → Copier
    Ctrl+V → Coller

### Exemple concret :

    Tu sélectionnes un texte → "Hello"

    Tu fais Ctrl+C → "Hello" est stocké dans le presse-papiers

    Tu fais Ctrl+V → le texte est recollé où tu veux

### Caractéristiques du presse-papiers :

    Il ne garde qu’un seul élément à la fois

    Il est souvent effacé quand tu éteins ton PC

    Il est interne au système d’exploitation (Windows, Linux, macOS...)

### Tu peux copier :

    Du texte

    Des fichiers

    Des images

    Des objets entre applis (ex: copier dans Excel, coller dans Word)


---

## 🧠 Les 3 types de "presse-papiers" (sélections)

| Nom            | Copie comment ?                       | Colle comment ?                      |
|----------------|----------------------------------------|--------------------------------------|
| **Primary**    | Sélection avec la souris (clic gauche) | Clic du **milieu** (molette souris) |
| **Clipboard**  | `Ctrl+C` ou `xclip -selection clipboard` | `Ctrl+V`                            |
| **Secondary**  | Très peu utilisé                       | Généralement ignoré                 |

---

### 1. 🟢 **Primary selection**

- **Automatique** : dès que tu **surlignes du texte** avec ta souris (clic gauche maintenu).
- **Collage** : fais simplement un **clic du milieu** (molette souris) pour coller.
- **Pas de raccourci clavier**.

---

### 2. 🔵 **Clipboard selection**

- C’est celui qu’on utilise avec `**Ctrl+C / Ctrl+V**`.
- Utilisé par la plupart des applications modernes.
- Tu peux y copier avec :
  ```bash
  xclip -selection clipboard
  ```

---

### 3. 🔴 **Secondary selection**

- Très rarement utilisé.
- Support limité, inutile dans la plupart des cas.

---

## 🔧 Utilisation de `xclip`

### Copier un fichier dans le presse-papiers standard :

```bash
xclip -selection clipboard < fichier.txt
```

### Ou via `cat` :

```bash
cat fichier.txt | xclip -selection clipboard
```

### Coller le contenu du presse-papiers dans le terminal :

```bash
xclip -selection clipboard -o
```

---

## 🔍 Afficher le contenu de chaque sélection

```bash
xclip -selection primary -o     # contenu sélectionné à la souris
xclip -selection clipboard -o   # contenu copié via Ctrl+C ou xclip
```

---

## ✅ Résumé pratique

| Action                  | Commande                           |
|-------------------------|------------------------------------|
| Copier vers Primary     | `xclip < fichier.txt`              |
| Copier vers Clipboard   | `xclip -sel clipboard < fichier.txt` |
| Lire depuis Clipboard   | `xclip -sel clipboard -o`          |
| Lire depuis Primary     | `xclip -sel primary -o`            |

---

## 📦 Alternative : `wl-clipboard` (pour Wayland)

Si tu es sous Wayland (nouveau système graphique sur Ubuntu 22+, Fedora...), `xclip` ne fonctionnera pas. Utilise `wl-copy` :

```bash
cat fichier.txt | wl-copy
```

Et pour coller :

```bash
wl-paste
```
