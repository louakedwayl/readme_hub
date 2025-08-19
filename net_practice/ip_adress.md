# Internet Protocol Address

---

Une adresse IP est une suite de 4 nombres de 0 à 255 séparés par un point.  
On dit **adresse IP** et non numéro IP car cette suite de nombres doit permettre d’identifier un appareil de manière unique sur le réseau.  
Une adresse IP est écrite sur 32 bits, soit 4 octets séparés par des points.

## IP publique / IP privée

### 1. Adresse IP publique

1. **Définition** : Une adresse IP publique est une adresse unique attribuée à un appareil (souvent un routeur) pour être identifié sur Internet.  
2. **Portée** : Accessible directement depuis Internet.  
3. **Fournisseur** : Attribuée par un fournisseur d'accès à Internet (FAI).  
4. **Utilisation** :  
   - Permet à votre réseau domestique ou entreprise de communiquer avec d'autres réseaux sur Internet.  
   - Nécessaire pour accéder à des sites web ou des services en ligne.  

**Exemple d'adresse** : `203.0.113.1`  

Les adresses publiques appartiennent à des plages définies par l'IANA (Internet Assigned Numbers Authority).

### 2. Adresse IP privée

1. **Définition** : Une adresse IP privée est utilisée au sein d'un réseau local (LAN) pour identifier les appareils (ordinateurs, smartphones, imprimantes, etc.).  
2. **Portée** : Non accessible directement depuis Internet, limitée au réseau interne.  
3. **Fournisseur** : Configurée par votre routeur ou administrateur réseau.  
4. **Utilisation** :  
   - Permet la communication entre les appareils dans un réseau local.  
   - Les adresses privées sont traduites en adresses publiques via un processus appelé **NAT (Network Address Translation)** pour accéder à Internet.  

**Plages réservées (RFC 1918)** :  
- `10.0.0.0 – 10.255.255.255`  
- `172.16.0.0 – 172.31.255.255`  
- `192.168.0.0 – 192.168.255.255`  

**Exemple d'adresse** : `192.168.1.1` ou `10.0.0.5`
