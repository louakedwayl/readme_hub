# Notations CIDR

---

En notation CIDR (Classless Inter-Domain Routing), on exprime directement le nombre de bits pour le réseau :

- /8 correspond à un masque de 255.0.0.0  
- /16 correspond à un masque de 255.255.0.0  
- /24 correspond à un masque de 255.255.255.0  

La notation CIDR est une méthode utilisée pour exprimer les plages d'adresses IP et leurs masques de sous-réseaux de manière concise. Elle remplace le système ancien basé sur les classes d'adresses (classes A, B, C) et offre une plus grande flexibilité pour allouer des adresses IP.

## Structure de la notation CIDR

Une adresse en notation CIDR se compose de :

- L'adresse IP : ex. `192.168.1.0`  
- Un suffixe indiquant le nombre de bits utilisés pour la partie réseau : ex. `/24`  

Ensemble, cela donne : `192.168.1.0/24`

## Détails du suffixe

Le suffixe après le `/` indique combien de bits (à partir de la gauche) sont utilisés pour la partie réseau dans le masque de sous-réseau. Les bits restants sont pour les hôtes.

### Exemple

- /8 : Les 8 premiers bits sont pour le réseau, masque de sous-réseau = 255.0.0.0  
- /16 : Les 16 premiers bits sont pour le réseau, masque de sous-réseau = 255.255.0.0  
- /24 : Les 24 premiers bits sont pour le réseau, masque de sous-réseau = 255.255.255.0

## Conversion CIDR ↔ Plage d'adresses

### 1. CIDR à plage d'adresses

Exemple : `192.168.1.0/24`  
24 bits = 255.255.255.0 en binaire.

Plage d'adresses :

- Première adresse (adresse réseau) : `192.168.1.0`  
- Dernière adresse (broadcast) : `192.168.1.255`  
- Adresses utilisables : `192.168.1.1` à `192.168.1.254`

### 2. Plage d'adresses à CIDR

Exemple : Plage `192.168.0.0` à `192.168.3.255`  

- Total d'adresses : 1024 (4 sous-réseaux de 256)  
- CIDR : `192.168.0.0/22`

## Tableau récapitulatif

| CIDR  | Masque            | Nb d'adresses | Hôtes utilisables |
|-------|-----------------|---------------|-----------------|
| /8    | 255.0.0.0       | 16,777,216    | 16,777,214      |
| /16   | 255.255.0.0     | 65,536        | 65,534          |
| /24   | 255.255.255.0   | 256           | 254             |
| /25   | 255.255.255.128 | 128           | 126             |
| /26   | 255.255.255.192 | 64            | 62              |
| /27   | 255.255.255.224 | 32            | 30              |
| /28   | 255.255.255.240 | 16            | 14              |
| /29   | 255.255.255.248 | 8             | 6               |
| /30   | 255.255.255.252 | 4             | 2               |
| /31   | 255.255.255.254 | 2             | 0*              |
| /32   | 255.255.255.255 | 1             | 0               |

\* `/31` est utilisé dans des cas spécifiques pour les liaisons point-à-point.
