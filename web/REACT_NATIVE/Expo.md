# 📱 Cours : Expo (React Native)

## 1. Introduction

**Expo** est un framework basé sur React Native qui permet de développer des applications mobiles (Android et iOS) plus facilement, sans configuration complexe.

Il simplifie énormément le démarrage d’un projet mobile.

---

## 2. React Native vs Expo

### React Native (pur)

* Framework officiel de Meta
* Permet de créer des apps mobiles avec JavaScript/TypeScript
* Nécessite souvent une configuration complexe (Android Studio, Xcode)

### Expo

* Surcouche de React Native
* Fournit une configuration prête à l’emploi
* Permet de tester rapidement sur téléphone

👉 Expo = React Native + outils + simplifications

---

## 3. Création d’un projet Expo

Commande principale :

```bash
npx create-expo-app monApp
cd monApp
npm start
```

Cela crée un projet React Native déjà configuré avec Expo.

---

## 4. Structure d’un projet Expo

Un projet Expo contient généralement :

```
monApp/
 ├── App.js
 ├── package.json
 ├── node_modules/
 ├── assets/
```

### Fichier principal

* `App.js` → point d’entrée de l’application

---

## 5. Lancer l’application

Commande :

```bash
npm start
```

Cela démarre le serveur de développement (Metro Bundler).

---

## 6. Expo Go

Expo permet de tester directement l’application sur un téléphone via une application mobile.

* Installer Expo Go sur Android ou iOS
* Scanner un QR code
* Voir l’application en direct

---

## 7. Comment Expo fonctionne

1. Tu écris du code sur ton ordinateur
2. Expo compile ton code en JavaScript exécutable
3. Expo Go affiche l’application sur ton téléphone

---

## 8. Avantages d’Expo

* Pas besoin de configuration native complexe
* Démarrage rapide
* Hot reload (modifications en temps réel)
* Beaucoup d’API déjà intégrées (caméra, notifications, etc.)

---

## 9. Limites d’Expo

* Moins de contrôle bas niveau
* Certaines fonctionnalités natives avancées nécessitent de “sortir” d’Expo
* Moins flexible que React Native pur dans certains cas

---

## 10. Build et production

Expo permet aussi de créer des applications finales :

```bash
npx expo build
```

ou avec EAS Build :

```bash
npx eas build
```

---

## 11. Concepts importants

### Hot Reload

Les modifications du code s’affichent instantanément.

### Metro Bundler

Serveur qui transforme ton code JS en bundle pour mobile.

### Expo Go

Application mobile utilisée pour tester ton projet.

---

## 12. Résumé

* Expo simplifie React Native
* Permet de créer des apps mobiles rapidement
* Utilise Expo Go pour tester sur téléphone
* Idéal pour débuter en développement mobile

---

## 13. Conclusion

Expo est la manière la plus simple de commencer le développement mobile avec React Native. Il permet de se concentrer sur le code sans se soucier de la configuration native.
