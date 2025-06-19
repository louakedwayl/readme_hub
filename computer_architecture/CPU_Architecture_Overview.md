# Architecture processeur : x86, x64, ARM, et plus

---

## 1. C’est quoi une architecture de processeur ?

Une **architecture de processeur** définit comment un CPU fonctionne, notamment :

- Comment il lit les instructions,
- La taille des registres (8, 16, 32, 64 bits),
- Comment il adresse la mémoire,
- Quels jeux d’instructions il utilise.

---

## 2. Exemples d’architectures courantes

| Architecture  | Bits | Créateur       | Utilisation typique                        |
|---------------|-------|----------------|--------------------------------------------|
| x86           | 32    | Intel          | PC anciens, vieux systèmes                  |
| x86_64 (x64)  | 64    | AMD / Intel    | PC modernes, serveurs                       |
| ARM           | 32/64 | ARM Ltd.       | Smartphones, Raspberry Pi, Apple M1/M2     |
| MIPS          | 32/64 | MIPS Tech      | Routeurs, systèmes embarqués                |
| RISC-V        | 32/64 | Open source    | Recherche, systèmes embarqués               |
| PowerPC       | 32/64 | IBM            | Anciennes consoles, serveurs Apple G5      |

---

## 3. Différence entre 32 et 64 bits

| Aspect              | 32 bits                    | 64 bits                      |
|---------------------|----------------------------|------------------------------|
| Taille pointeurs    | 4 octets (4 Go max)          | 8 octets (très grande mémoire)|
| Registres          | Moins nombreux               | Plus nombreux et plus grands  |
| Performances       | Limitée                      | Meilleures sur les gros calculs|
| OS courants        | Windows XP, Linux 32 bits    | Windows 10/11, Linux 64 bits  |

---

## 4. Comment savoir son architecture ?

Sous Linux/macOS :

```bash
uname -m
```

Résultat courant :

    x86_64 → 64 bits Intel/AMD (x64)

    i686 ou i386 → 32 bits Intel (x86)

    aarch64 → ARM 64 bits

    armv7l → ARM 32 bits

## 5. Pourquoi c’est important ?

    Compiler un programme : il faut choisir la bonne cible (-m32 ou -m64).

    Comprendre les différences d’endianness selon l’architecture.

    Optimiser le code pour la plateforme cible.

## 6. Résumé

Terme	Signification
x86	Architecture 32 bits
x86_64/x64	Architecture 64 bits
ARM	Architecture mobile/embarqué
RISC-V	Architecture libre/moderne

## 7. Pour aller plus loin

    Différence entre RISC et CISC

    Virtualisation (exécution d’une architecture sur une autre)

    Cross-compilation (compiler pour une autre architecture)

    Jeux d’instructions (ISA)

TL;DR

Ton CPU a une architecture qui définit comment il fonctionne.
Les PC modernes utilisent le 64 bits (x86_64).
Les téléphones utilisent ARM.
Pour programmer bas niveau, c’est crucial de connaître ton architecture.
