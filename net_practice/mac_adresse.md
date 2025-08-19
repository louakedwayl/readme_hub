# MAC Address

---

Une adresse MAC (Media Access Control) est un identifiant unique attribué à une interface réseau pour l'identifier de manière univoque sur un réseau local (LAN).  

Une adresse MAC est composée de 48 bits (6 octets), généralement représentée sous la forme de 12 caractères hexadécimaux séparés par des deux-points ou des tirets, par exemple : `00:14:22:01:23:45`.

## Structure de l'adresse MAC

Elle est divisée en deux parties :

1. **Le OUI (Organizationally Unique Identifier)** : les 3 premiers octets (24 bits) identifient le fabricant du matériel.  
2. **Le numéro de série de l'interface** : les 3 derniers octets (24 bits) sont attribués par le fabricant à chaque appareil, garantissant son unicité.

> L'adresse MAC est généralement fixée en usine et utilisée pour l'acheminement des paquets au sein d'un réseau local, mais elle peut aussi être modifiée dans certains cas (par exemple, pour des raisons de sécurité).
