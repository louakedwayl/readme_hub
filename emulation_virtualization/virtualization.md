# La Virtualisation

## Qu’est-ce que la virtualisation ?
La virtualisation est une technologie qui permet de créer des environnements informatiques virtuels 
(appelés machines virtuelles ou VM) à l’intérieur d’un seul système physique (appelé l’hôte).  
Chaque machine virtuelle fonctionne comme un ordinateur indépendant avec son propre 
système d’exploitation, mais partage les ressources matérielles de la machine hôte.

## Objectifs de la virtualisation
- Optimiser l’utilisation des ressources matérielles (CPU, mémoire, disque)  
- Isoler les environnements pour plus de sécurité et de stabilité  
- Simplifier la gestion des serveurs (déploiement, sauvegarde, migration)  
- Faciliter le développement et les tests multiplateformes  
- Permettre la consolidation de plusieurs serveurs physiques sur une seule machine

## Comment fonctionne la virtualisation ?
La virtualisation repose sur un logiciel appelé hyperviseur (ou virtual machine monitor),  
qui s’intercale entre le matériel physique et les machines virtuelles.

### Deux types d’hyperviseurs
- **Hyperviseur de type 1 (bare-metal)**  
  - Installé directement sur le matériel physique  
  - Exemples : VMware ESXi, Microsoft Hyper-V, Xen  
  - Très performant et utilisé en entreprise

- **Hyperviseur de type 2 (hosted)**  
  - Installé sur un système d’exploitation classique  
  - Exemples : VirtualBox, VMware Workstation, Parallels  
  - Plus simple d’utilisation pour un usage personnel ou développement

## Différence entre virtualisation et émulation

| Concept        | Fonctionnement                                    | Exemple |
|----------------|--------------------------------------------------|---------|
| Virtualisation | Partage direct du matériel entre OS virtuels     | VirtualBox, VMware |
| Émulation      | Reproduction complète du matériel cible, souvent plus lente | Dolphin (émulateur GameCube) |

## Avantages de la virtualisation
- Gain de place et d’énergie : plusieurs serveurs sur un seul hardware  
- Facilité de gestion : snapshots, clonage, migration à chaud  
- Isolation : les VM sont indépendantes, évitant les conflits  
- Sécurité renforcée : confinement des applications et des OS  
- Flexibilité : déploiement rapide de nouveaux environnements

## Inconvénients de la virtualisation
- Performance : légère perte liée à la couche d’abstraction  
- Complexité : gestion des VM et de leur sécurité peut être complexe  
- Consommation de ressources : plusieurs OS sur un seul matériel peuvent vite consommer beaucoup

## Cas d’utilisation courants
- Serveurs cloud (ex : AWS, Azure utilisent massivement la virtualisation)  
- Laboratoires de développement : tester différents OS sur une seule machine  
- Bureaux virtuels : accès à un environnement standardisé partout  
- Sauvegarde et reprise d’activité via des snapshots de VM

## Conclusion
La virtualisation est aujourd’hui une technologie incontournable pour exploiter au mieux le matériel 
informatique, réduire les coûts, sécuriser les environnements et faciliter le développement logiciel.