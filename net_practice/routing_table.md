# Routing Table

---

Une table de routage est une structure de données stockée dans un routeur ou un hôte réseau qui répertorie les itinéraires vers des destinations réseau particulières.  
Dans NetPractice, la table de routage se compose de 2 éléments :

- La notation `0.0.0.0/0` désigne une route par défaut ou une route qui couvre l'intégralité de l'espace d'adressage IPv4.  

> Elle est souvent utilisée dans les tables de routage pour désigner la route par défaut, c'est-à-dire la route à utiliser si aucune autre route plus spécifique ne correspond à la destination.  
> Typiquement, elle redirige le trafic vers une passerelle par défaut ou un périphérique réseau.

## Destination

La destination spécifie une adresse réseau sur laquelle un hôte est la cible finale des paquets.  
La route par défaut `0.0.0.0/0` est la route qui prend effet lorsqu'aucune autre route n'est disponible pour une adresse de destination IP.  
La route par défaut utilise l'adresse du **saut suivant** pour envoyer les paquets sans donner de destination spécifique.  
La route par défaut correspond à n'importe quel réseau.

## Saut suivant

Le **saut suivant** désigne le routeur le plus proche par lequel un paquet peut passer.  
Il s'agit de l'adresse IP du routeur suivant sur le chemin du paquet.  
Chaque routeur maintient sa table de routage avec une adresse de "saut suivant".