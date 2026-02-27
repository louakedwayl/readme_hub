# pip — Gestionnaire de paquets Python

## 1) Qu'est-ce que pip ?

pip est le gestionnaire de paquets officiel de Python. Il permet d'installer, mettre à jour et supprimer des bibliothèques externes depuis le dépôt officiel **PyPI** (Python Package Index).

C'est l'équivalent de `apt` pour Linux ou de npm pour nodeJs, mais pour les bibliothèques Python.

---

## 2) Vérifier l'installation

```bash
pip --version
pip3 --version
```

> Sur Linux/macOS, utiliser `pip3` pour Python 3.

---

## 3) Commandes essentielles

### Installer un paquet

```bash
pip install requests
pip install beautifulsoup4
pip install requests beautifulsoup4 pytesseract  # plusieurs à la fois
```

### Installer une version spécifique

```bash
pip install requests==2.28.0
```

### Mettre à jour un paquet

```bash
pip install --upgrade requests
```

### Désinstaller un paquet

```bash
pip uninstall requests
```

### Lister les paquets installés

```bash
pip list
```

### Chercher un paquet

```bash
pip search requests   # dépréciée, chercher directement sur pypi.org
```

---

## 4) requirements.txt

Fichier qui liste toutes les dépendances d'un projet. Permet de recréer l'environnement sur une autre machine.

Générer le fichier depuis les paquets installés :

```bash
pip freeze > requirements.txt
```

Installer toutes les dépendances depuis le fichier :

```bash
pip install -r requirements.txt
```

Exemple de `requirements.txt` :

```
requests==2.28.0
beautifulsoup4==4.11.1
pytesseract==0.3.10
pillow==9.2.0
```

---

## 5) pip vs pip3

| Commande | Python utilisé |
|---|---|
| `pip` | Python 2 ou 3 selon la config système |
| `pip3` | Python 3 explicitement |

Sur Linux, toujours utiliser `pip3` pour éviter les conflits.

---

## 6) Paquets utiles en cybersécurité

| Paquet | Usage |
|---|---|
| `requests` | Requêtes HTTP |
| `beautifulsoup4` | Parsing HTML |
| `pytesseract` | OCR — lire du texte dans une image |
| `pillow` | Manipulation d'images |
| `pycryptodome` | Cryptographie |
| `paramiko` | SSH |
| `scapy` | Manipulation de paquets réseau |

---

## 7) Résumé

```bash
pip install paquet          # installer
pip uninstall paquet        # désinstaller
pip install --upgrade paquet # mettre à jour
pip list                    # lister
pip freeze > requirements.txt  # exporter dépendances
pip install -r requirements.txt  # importer dépendances
```
