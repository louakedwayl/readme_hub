# Emulation

## Définition
L’émulation est un processus logiciel ou matériel qui permet à un système informatique 
(appelé hôte) de simuler un autre système (appelé cible), pour faire fonctionner des programmes 
ou des systèmes d’exploitation conçus à l’origine pour cette cible.

## Exemple simple
Faire tourner un jeu de Nintendo 64 sur un PC Windows grâce à un émulateur.

## Objectifs de l’émulation
- Faire fonctionner des logiciels anciens sur du matériel moderne (ex : vieux jeux)  
- Tester ou développer pour un autre système (ex : tester une app Android sur PC)  
- Préserver le patrimoine numérique (émulation de systèmes obsolètes)  
- Déboguer des programmes dans un environnement contrôlé

## Comparaison conceptuelle

| Concept        | Fonctionnement                                | Exemple |
|----------------|-----------------------------------------------|---------|
| Émulation      | Reproduit tout le matériel de la cible       | Dolphin (émulateur GameCube) |
| Virtualisation | Utilise le matériel de l’hôte directement    | VirtualBox, VMware |
| Simulation     | Imite le comportement, pas nécessairement le matériel | Simulateur météo, Simulateur réseau |

## Comment fonctionne un émulateur ?
Un émulateur comprend généralement plusieurs composants :

- **CPU Emulator** : simule le processeur (ex : architecture ARM → x86)  
- **Memory Manager** : gère les lectures/écritures mémoire comme le ferait la cible  
- **Device Emulators** : simulent les périphériques (affichage, audio, manette…)  
- **BIOS/ROM loader** : charge les fichiers système d’origine  

> L’émulation est souvent plus lente que le système natif car elle consomme beaucoup de ressources pour "imiter".

## Exemples d’émulateurs connus
- QEMU : émulation de processeurs, systèmes d’exploitation  
- Dolphin : GameCube/Wii  
- PCSX2 : PlayStation 2  
- Wine : exécute des logiciels Windows sous Linux (techniquement une couche de compatibilité, pas une émulation complète)  
- BlueStacks : pour les applications Android sur PC

## Avantages et inconvénients

### Avantages
- Exécution de programmes d'autres plateformes  
- Sauvegarde de logiciels anciens  
- Développement multi-plateforme

### Inconvénients
- Moins performant que le natif  
- Nécessite parfois des fichiers ROM propriétaires  
- Légalité parfois floue selon les contenus utilisés

## Cas d’usage dans la vraie vie
- Développement embarqué : émuler une puce ARM pour tester un firmware  
- Jeux rétro : jouer à des classiques sans la console d’origine  
- Déploiement multi-plateforme : tester un logiciel iOS sur Mac

## Légalité de l’émulation
L’émulation est légale, mais l’utilisation de BIOS ou de ROM piratées ne l’est pas.  
Tu peux légalement utiliser un émulateur si tu possèdes la console originale et les jeux.  
La frontière est parfois floue mais importante à comprendre, surtout dans un cadre professionnel ou éducatif.
