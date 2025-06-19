# Endianness (Big-endian vs Little-endian)

## 1. Définition

L’**endianness** (ou ordre des octets) décrit **comment un nombre multioctet (ex : int, short)** est stocké en mémoire.

---

## 2. Exemple concret

Prenons le nombre hexadécimal `0x12345678` (32 bits, soit 4 octets) :

| Ordre des octets    | En mémoire (adresse → valeur)             |
|---------------------|--------------------------------------------|
| **Big-endian**      | [0] = 0x12, [1] = 0x34, [2] = 0x56, [3] = 0x78 |
| **Little-endian**   | [0] = 0x78, [1] = 0x56, [2] = 0x34, [3] = 0x12 |

---

## 3. Analogie simple

Imagine un nombre "1234" :

- Big-endian : les chiffres sont écrits dans l’ordre naturel → 1, 2, 3, 4
- Little-endian : les chiffres sont écrits à l’envers → 4, 3, 2, 1

---

## 4. Qui utilise quoi ?

| Architecture        | Endianness          |
|---------------------|---------------------|
| Intel x86/x86_64    | Little-endian       |
| ARM (mobiles, serveurs) | Little ou Big (configurable) |
| Réseaux (TCP/IP, DNS…) | Big-endian (standard réseau) |

---

## 5. Problème concret

Deux machines doivent s’échanger des données binaires (via réseau ou fichiers).  
Elles doivent être d’accord sur l’ordre des octets, sinon les nombres seront mal interprétés.

Exemple :  
Si tu envoies le port `4243` (`0x1093`) en little-endian, la machine destinataire pourrait le lire comme `0x9310` (37648) — erreur.

---

## 6. Solution standard : fonctions `hton*` et `ntoh*`

| Fonction   | Rôle                                   |
|------------|----------------------------------------|
| `htons()`  | Host TO Network Short (16 bits)        |
| `htonl()`  | Host TO Network Long (32 bits)         |
| `ntohs()`  | Network TO Host Short                   |
| `ntohl()`  | Network TO Host Long                    |

Ces fonctions convertissent les nombres entre le format hôte (local) et le format réseau (big-endian), **seulement si nécessaire**.

---

## 7. Comment détecter l’endian de ta machine ?

Voici un petit code C pour vérifier si ta machine est little-endian :

```c
int is_little_endian()
{
    uint16_t x = 1;
    return *((uint8_t*)&x) == 1;
}
```
