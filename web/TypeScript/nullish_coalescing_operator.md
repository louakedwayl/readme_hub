# L'opérateur de coalescence des valeurs nulles (`??`)

## Définition

L'opérateur `??` permet de choisir une valeur de remplacement lorsqu'une valeur est `null` ou `undefined`.

Il est appelé **nullish coalescing operator** en anglais.

## Syntaxe

```ts
valeur ?? valeur_par_defaut
```

## Fonctionnement

Si la première valeur existe, elle est utilisée.

Si la première valeur est `null` ou `undefined`, la deuxième valeur est utilisée.

## Exemple

```ts
const nom = undefined;

const resultat = nom ?? "Inconnu";

console.log(resultat);
```

Résultat :

```text
Inconnu
```

Car `nom` vaut `undefined`.

## Différence avec `||`

L'opérateur `||` utilise la valeur par défaut lorsque la valeur est **falsy** :

```ts
const nombre = 0;

console.log(nombre || 10);
```

Résultat :

```text
10
```

Avec `??`, seul `null` et `undefined` déclenchent la valeur par défaut :

```ts
const nombre = 0;

console.log(nombre ?? 10);
```

Résultat :

```text
0
```

## Utilisation

L'opérateur `??` est utile pour :

- définir des valeurs par défaut ;
- gérer des données qui peuvent être absentes ;
- éviter des tests répétitifs avec `null` et `undefined`.

## À retenir

- `??` signifie **"utilise cette valeur sauf si elle est null ou undefined"**.
- Il ne considère pas `0`, `false` ou `""` comme des valeurs absentes.
- Il est appelé **nullish coalescing operator** en anglais.
