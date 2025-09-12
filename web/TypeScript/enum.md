# Les `enum` en TypeScript

En TypeScript, les `enum` (ou **énumérations**) permettent de **donner des noms aux valeurs numériques ou textuelles**. Ils améliorent la lisibilité du code et réduisent les erreurs liées aux "magic numbers" ou aux chaînes de caractères répétitives.

---

## 1. Enum numérique

Par défaut, les enums en TypeScript sont **numériques**, et les valeurs commencent à `0` si aucune valeur n’est fournie.

```ts
enum Direction {
    Up,    // 0
    Down,  // 1
    Left,  // 2
    Right  // 3
}

let dir: Direction = Direction.Up;
console.log(dir); // 0
```

### Personnaliser les valeurs numériques

```ts
enum Direction {
    Up = 1,
    Down = 2,
    Left = 10,
    Right     // 11, incrémente automatiquement à partir de la valeur précédente
}
```

---

## 2. Enum de chaînes (`string enum`)

Les enums peuvent aussi utiliser **des chaînes de caractères** comme valeurs.

```ts
enum Direction {
    Up = "UP",
    Down = "DOWN",
    Left = "LEFT",
    Right = "RIGHT"
}

console.log(Direction.Left); // "LEFT"
```

💡 Les `string enums` ne s’incrémentent pas automatiquement, chaque valeur doit être définie explicitement.

---

## 3. Accès à un enum

* **Par nom** : `Direction.Up`
* **Par valeur** (pour les enums numériques uniquement) :

```ts
enum Direction {
    Up = 1,
    Down,
    Left,
    Right
}

console.log(Direction[2]); // "Down"
```

* Les enums de chaînes ne permettent pas l’accès inverse (valeur → nom).

---

## 4. Enums const

TypeScript permet de créer des **const enums** qui sont remplacés par leurs valeurs lors de la compilation, ce qui réduit le code généré.

```ts
const enum Direction {
    Up,
    Down,
    Left,
    Right
}

let dir: Direction = Direction.Up; // sera remplacé par 0 à la compilation
```

💡 Limitation : les `const enum` ne supportent pas l’accès par valeur (`Direction[0]`).

---

## 5. Quand utiliser un enum

* Quand tu as **un ensemble fixe de valeurs** logiques, par exemple :

  * Directions : `Up`, `Down`, `Left`, `Right`
  * États : `Pending`, `InProgress`, `Done`
* Pour **éviter les chaînes ou nombres magiques** et rendre le code plus lisible.

---

## 6. Exemple complet

```ts
enum Status {
    Pending = "PENDING",
    InProgress = "IN_PROGRESS",
    Done = "DONE"
}

function printStatus(status: Status) {
    console.log(`Le statut est : ${status}`);
}

printStatus(Status.Pending); // Le statut est : PENDING
```

---

**Résumé :**

| Type d'enum       | Valeurs par défaut        | Accès inverse possible |
| ----------------- | ------------------------- | ---------------------- |
| Numérique         | 0, 1, 2…                  | Oui                    |
| Chaîne (`string`) | Doit être défini          | Non                    |
| Const enum        | Comme numérique ou chaîne | Non                    |

