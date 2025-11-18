# Les métadonnées EXIF

## 1. Qu'est-ce que les métadonnées EXIF ?

**EXIF** (Exchangeable Image File Format) est un standard qui permet de stocker des informations techniques et descriptives dans les fichiers image (JPEG, TIFF, etc.). Ces informations ne sont pas visibles directement sur l'image, mais peuvent être lues par des logiciels spécialisés.

Les appareils photo numériques et smartphones ajoutent automatiquement ces métadonnées lors de la capture d'une photo.

---

## 2. Types d'informations contenues dans les métadonnées EXIF

### a) Informations sur l'appareil photo

* Marque et modèle de l'appareil
* Numéro de série
* Version du firmware

### b) Paramètres de la prise de vue

* Ouverture (f-stop)
* Vitesse d’obturation
* ISO
* Balance des blancs
* Longueur focale
* Mode de prise de vue

### c) Informations temporelles

* Date et heure de la prise de vue
* Fuseau horaire (si disponible)

### d) Informations géographiques (si GPS activé)

* Latitude et longitude
* Altitude
* Direction de l'appareil
* Vitesse de déplacement (rare)

### e) Informations complémentaires

* Miniature de l'image
* Orientation (portrait/paysage)
* Logiciel utilisé pour retoucher l'image

---

## 3. Utilité des métadonnées EXIF

* **Organisation** : trier les photos par date, appareil, lieu.
* **Analyse photographique** : comprendre les réglages utilisés.
* **Géolocalisation** : retrouver l'endroit exact de la photo.
* **Forensic** : preuves et investigations numériques.

---

## 4. Risques liés aux métadonnées EXIF

* **Vie privée** : la géolocalisation peut révéler des informations sensibles.
* **Traçabilité** : identification possible de l'appareil ou du photographe.
* **Sécurité** : partager des photos avec EXIF peut poser des risques.

**Astuce** : supprimer ou modifier les EXIF avec `ExifTool`, GIMP, Photoshop, ou des services en ligne.

---

## 5. Comment lire et modifier les EXIF

### a) Logiciels

* **ExifTool** (terminal)
* **GIMP / Photoshop** (menu image → informations)
* **Windows / macOS** : clic droit → propriétés → détails
* **Applications mobiles** : Photo Investigator (iOS), Photo EXIF Editor (Android)

### b) Commandes de base avec ExifTool

```
# Lire les EXIF
exiftool photo.jpg

# Supprimer tous les EXIF
exiftool -all= photo.jpg

# Modifier une information spécifique (ex: auteur)
exiftool -Artist="Nom de l'auteur" photo.jpg
```

---

## 6. Conclusion

Les métadonnées EXIF permettent d'analyser, organiser et comprendre les images, mais il est essentiel de faire attention aux informations sensibles avant de partager des photos en ligne.
