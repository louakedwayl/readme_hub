# Cours simple : l’objet `Date` en JavaScript

## 1. Créer une date
En JavaScript, on utilise **`new Date()`**.

```js
let maintenant = new Date();
console.log(maintenant); 
// affiche la date et l'heure du moment
```

On peut aussi créer une date spécifique :

```js
let date1 = new Date("2025-08-22"); 
console.log(date1);
```

## 2. Obtenir des infos d’une date

Quelques méthodes utiles :

```js
let d = new Date();

console.log(d.getFullYear()); // année (ex: 2025)
console.log(d.getMonth());    // mois (0 = janvier, 11 = décembre)
console.log(d.getDate());     // jour du mois (1-31)
console.log(d.getDay());      // jour de la semaine (0 = dimanche, 6 = samedi)
console.log(d.getHours());    // heures (0-23)
console.log(d.getMinutes());  // minutes (0-59)
console.log(d.getSeconds());  // secondes (0-59)
```
⚠️ Attention : les mois commencent à 0 (0 = janvier).

## 3. Modifier une date

On peut changer une partie de la date :

```js
let d = new Date();

d.setFullYear(2030);
d.setMonth(0);   // janvier
d.setDate(1);    // jour 1

console.log(d);
```

## 4. Comparer deux dates

On peut comparer les dates comme des nombres :

```js
let d1 = new Date("2025-01-01");
let d2 = new Date("2025-12-31");

if (d1 < d2) {
  console.log("d1 est avant d2");
}
```

## 5. Formats utiles

```js
toDateString() → date lisible

toTimeString() → heure lisible

toISOString() → format standard (utile pour API)

let d = new Date();

console.log(d.toDateString());  // "Fri Aug 22 2025"
console.log(d.toTimeString());  // "21:30:45 GMT+0200"
console.log(d.toISOString());   // "2025-08-22T19:30:45.123Z"
```
### En résumé :

```js
new Date() pour créer.

get...() pour lire.

set...() pour modifier.
```

On peut comparer les dates directement.