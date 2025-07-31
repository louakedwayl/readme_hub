# Le Cache
---

## 1/ Qu’est-ce qu’un cache ?

Un cache est une zone de stockage temporaire, rapide, où l’on conserve des données fréquemment 
utilisées ou récemment consultées. Le but principal est d’accélérer l’accès à ces données en 
évitant de les recalculer ou retélécharger.

### Exemple simple :
Quand tu regardes une vidéo en ligne, ton navigateur conserve temporairement cette vidéo en cache pour que si tu la regardes à nouveau, elle se charge plus vite.

---

## 2/ Pourquoi utiliser un cache ?

- **Gagner du temps** : Le cache permet d’éviter des opérations longues ou répétitives (ex: recharger une page web).  
- **Économiser des ressources** : Moins de requêtes sur le réseau, moins d’accès disque, etc.  
- **Améliorer l’expérience utilisateur** : Temps de réponse plus rapides.  

---

## 3/ Types de cache courants

| Type de cache               | Où on le trouve             | Exemple d’utilisation                     |
|----------------------------|----------------------------|-------------------------------------------|
| Cache matériel             | Processeur, mémoire        | CPU cache pour accéder rapidement aux données |
| Cache logiciel             | Navigateur, application    | Cache web, cache d’application mobile      |
| Cache système              | Système d’exploitation     | Cache DNS, cache disque                    |
| Cache gestionnaire de paquets | APT (Linux)             | Cache des paquets téléchargés              |

---

## 4/ Résumé

- Le cache est un mécanisme pour stocker temporairement des données fréquemment utilisées.  
- Il améliore la rapidité et réduit la charge sur les ressources.  
- Dans APT, il existe un cache des métadonnées et un cache des paquets `.deb`.  
- Gérer le cache permet de libérer de l’espace et maintenir un système propre.
