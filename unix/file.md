# Le Commande `file` en Linux

## 1. Introduction

La commande `file` est un outil Linux utilisé pour **identifier le type d'un fichier**. Elle ne se base pas sur l'extension du fichier, mais sur son **contenu réel**, ce qui est très utile pour les fichiers dont l'extension a été modifiée ou cachée.

---

## 2. Syntaxe

```bash
file [options] nom_du_fichier
```

### Options courantes :

* `-b` : affiche le type du fichier **sans le nom du fichier**.
* `-i` : affiche le type MIME du fichier.
* `-z` : tente d'examiner le contenu des fichiers compressés.
* `-f <fichier>` : lit une liste de fichiers depuis un fichier texte et affiche leurs types.

---

## 3. Exemples d'utilisation

### a) Identifier un fichier simple

```bash
file exemple.txt
# exemple.txt: ASCII text
```

### b) Identifier une image

```bash
file image.jpg
# image.jpg: JPEG image data, JFIF standard 1.01
```

### c) Identifier un fichier binaire ou exécutable

```bash
file /bin/ls
# /bin/ls: ELF 64-bit LSB executable, x86-64
```

### d) Afficher le type MIME

```bash
file -i image.png
# image.png: image/png; charset=binary
```

### e) Examiner un fichier compressé

```bash
file archive.zip
# archive.zip: Zip archive data, at least v2.0 to extract
```

### f) Analyser une image disque

```bash
file usb.image
# usb.image: DOS/MBR boot sector, FAT16 file system
```

---

## 4. Utilités principales

1. **Vérifier le type réel d’un fichier** : surtout utile dans les CTF ou les téléchargements suspects.
2. **Identifier des fichiers sans extension**.
3. **Analyser des images de disques ou des binaires**.
4. **Automatiser l'analyse** de multiples fichiers avec l'option `-f`.

---

## 5. Astuces

* Combine `file` avec `strings` pour explorer un fichier binaire :

```bash
strings fichier.bin | less
```

* Utilise `file` avant d’ouvrir un fichier inconnu pour éviter les erreurs ou les risques de sécurité.

---

## 6. Conclusion

La commande `file` est un outil simple mais **très puissant** pour comprendre le type réel d’un fichier, ce qui est essentiel pour le diagnostic, la sécurité, l'administration système, et les challenges CTF.
