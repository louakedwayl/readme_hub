# Subnet Mask

---

Un masque de sous-réseau (ou subnet mask) est une combinaison de bits utilisée dans les réseaux informatiques pour diviser une adresse IP en deux parties :

- **La partie réseau (Network Address)** : identifie le réseau.  
- **La partie hôte (Host Address)** : identifie les dispositifs (ordinateurs, imprimantes, etc.) sur ce réseau.

## Représentation

Un masque de sous-réseau est généralement représenté sous la forme :  
- d'une adresse IP (décimale pointée, ex. : `255.255.255.0`)  
- ou d'un suffixe CIDR (Classless Inter-Domain Routing), par exemple `/24`.

### Exemple

Pour une adresse IP `192.168.1.1` avec un masque de sous-réseau `255.255.255.0` :

- **Partie réseau** : `192.168.1.0`  
- **Partie hôte** : `.1`

## Calcul des sous-réseaux

Un masque de sous-réseau est constitué de `1` pour la partie réseau et de `0` pour la partie hôte.  

### Exemple :  

255.255.255.0 = 11111111.11111111.11111111.00000000


Le nombre de `1` détermine la taille du sous-réseau :  
- `/24` = 24 bits pour le réseau → 256 adresses possibles (254 hôtes utilisables).

## Plage d'adresses dans un sous-réseau

- **Première adresse : Adresse réseau** (non assignable aux hôtes, ex. : `192.168.1.0`)  
  - Identifie le sous-réseau dans son ensemble.  
  - Non assignable aux hôtes : réservée à l’identification du réseau.  
  - En binaire, tous les bits de la partie hôte sont mis à `0`.

- **Dernière adresse : Adresse de diffusion ou broadcast** (ex. : `192.168.1.255`)  
  - Permet d'envoyer un message à tous les hôtes d’un sous-réseau.  
  - Non assignable aux hôtes : exclusivement utilisée pour la diffusion.  
  - En binaire, tous les bits de la partie hôte sont mis à `1`.

- **Adresses utilisables** : entre les deux (ex. : `192.168.1.1` à `192.168.1.254`).

