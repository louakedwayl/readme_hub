# Réseau Host-Only

## C'est quoi

Host-only crée un réseau virtuel **isolé** entre ta machine hôte et tes VMs.  
Ni la VM ni l'hôte ne peuvent sortir sur internet via ce réseau.  
C'est un réseau privé fermé, uniquement entre toi et tes machines virtuelles.

---

## Schéma

```
[ Machine Hôte ]  <——>  [ Interface virtuelle vboxnet0 ]  <——>  [ VM ]
  192.168.56.1                                                192.168.56.101
```

VirtualBox crée une **interface réseau virtuelle** sur ta machine hôte (ex: `vboxnet0`).  
La VM et l'hôte sont tous les deux connectés à cette interface.

---

## Comparaison des modes

| Mode       | VM → Internet | Hôte → VM | VM → Hôte | IP VM visible |
|------------|:-------------:|:---------:|:---------:|:-------------:|
| NAT        | ✓             | ✗ (sauf port forwarding) | ✓ | Non |
| Host-only  | ✗             | ✓         | ✓         | Oui |
| Bridged    | ✓             | ✓         | ✓         | Oui |

---

## Configuration dans VirtualBox

1. VirtualBox → **File → Host Network Manager**
2. Créer une interface `vboxnet0` si elle n'existe pas
3. Définir l'IP de l'hôte : `192.168.56.1`
4. Activer le DHCP ou assigner une IP fixe à la VM

Puis sur la VM :
- Settings → Network → Adapter 1
- Attached to : **Host-only Adapter**
- Name : `vboxnet0`

---

## Avantages

- Accès direct à la VM depuis l'hôte **sans port forwarding**
- IP stable et prévisible (pas de NAT)
- Réseau isolé = pas de risque d'exposition sur internet

## Inconvénients

- La VM n'a **pas accès à internet**
- Si besoin d'internet ET accès hôte → utiliser **deux adapteurs** : Adapter 1 en Host-only, Adapter 2 en NAT

---

## Cas d'usage typique

- Labs de sécurité (Darkly, HackTheBox local, DVWA)
- VMs de test isolées
- Communication entre plusieurs VMs sur un réseau privé

---

## Pourquoi Darkly utilise Host-only

Le sujet cible `172.16.60.128` — une IP privée fixe attribuée par Host-only.  
En Host-only, cette IP est directement accessible depuis le navigateur de l'hôte.  
En NAT, cette IP n'existe pas côté hôte — d'où le besoin de port forwarding.
