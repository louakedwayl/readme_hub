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

Si la fonction retourne 1, ta machine est little-endian.

Sinon, elle est big-endian.

## 8. Exemple d’utilisation en réseau

```c
struct sockaddr_in addr;
addr.sin_family = AF_INET;
addr.sin_port = htons(4243);                    // Port en format réseau (big-endian)
addr.sin_addr.s_addr = inet_addr("127.0.0.1");  // IP déjà au bon format
```

Sans htons(), le port pourrait être mal interprété par les clients

## 9. Résumé final

| Concept         | À retenir                                   |
|-----------------|---------------------------------------------|
| **Big-endian**      | Octets les plus significatifs en premier   |
| **Little-endian**   | Octets les moins significatifs en premier  |
| **Ta machine (x86)**| Little-endian                              |
| **Réseau**          | Big-endian (standard)                      |
| **htons/htonl**     | Convertissent tes nombres pour le réseau   |

---

## 📝 Notes

- L’**endianness** est **indépendante du système d’exploitation** : elle dépend du **processeur**.
- On la retrouve sur toutes les plateformes :
  - **Linux**
  - **Windows**
  - **macOS**
  - **Systèmes embarqués**

## 🧠 C’est quoi un octet "significatif" ?

Quand on parle de **bits** ou d’**octets significatifs**, on parle de ceux qui ont le **plus de "poids"** dans la valeur d’un nombre.

---

## 🔢 Exemple avec un entier 32 bits (4 octets)

**Nombre :** `0x12345678`

**En binaire :**

00010010 00110100 01010110 01111000
↑           ↑        ↑       ↑
0x12      0x34     0x56     0x78


| Octet       | Valeur hexa | Poids (importance)        |
|-------------|-------------|----------------------------|
| 1er octet   | `0x12`      | 🟢 Le plus significatif     |
| 2e octet    | `0x34`      |                            |
| 3e octet    | `0x56`      |                            |
| 4e octet    | `0x78`      | 🔴 Le moins significatif    |

> **Plus un octet est à gauche dans l’écriture binaire d’un nombre, plus il est significatif.**

---

## 🧠 Pourquoi ?

Parce que dans le système binaire, chaque position vaut une puissance de 2 :

- **1er octet** (à gauche) = poids × 2²⁴  
- **2e octet** = poids × 2¹⁶  
- **3e octet** = poids × 2⁸  
- **4e octet** (à droite) = poids × 2⁰  

Donc :

- Si tu changes `0x12`, tu modifies **fortement** la valeur du nombre.
- Si tu changes `0x78`, tu modifies juste les **unités**.

---

## 🧭 Résumé

| Terme                          | Définition                                                             |
|--------------------------------|------------------------------------------------------------------------|
| **Octet le plus significatif (MSB)** | Celui qui influence le plus la valeur totale du nombre (à gauche)     |
| **Octet le moins significatif (LSB)** | Celui qui influence le moins (à droite)                              |
| **Big-endian**                | Le MSB est stocké en premier (à l’adresse la plus basse)              |
| **Little-endian**             | Le LSB est stocké en premier (à l’adresse la plus basse)              |


