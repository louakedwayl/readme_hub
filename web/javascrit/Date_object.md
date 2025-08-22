# Cours : l’objet `Date` en JavaScript

> Objectif : comprendre comment créer, manipuler, formater et comparer des dates/horaires en JavaScript, tout en évitant les pièges courants (UTC, fuseaux, mois 0-indexés, DST, etc.).

---

## 1) Créer une date

```js
// Date courante (selon l’horloge du système et le fuseau local)
const now = new Date();

// À partir d’une chaîne (ISO 8601 recommandé)
const d1 = new Date("2025-08-22");            // Minuit local
const d2 = new Date("2025-08-22T15:30:00Z");  // Z = UTC

// À partir de composants numériques (attention: mois 0-indexé)
const d3 = new Date(2025, 7, 22, 15, 30, 0);  // 22 août 2025 15:30:00 local (mois 7 = août)

// À partir d’un timestamp (ms depuis 1970-01-01T00:00:00Z)
const d4 = new Date(0);                       // 1er janvier 1970 UTC
const d5 = new Date(Date.now());              // équivalent à new Date()
```

**Bonnes pratiques**
- Privilégier les chaînes **ISO 8601** (`YYYY-MM-DD` ou `YYYY-MM-DDTHH:mm:ss.sssZ`).
- N’oubliez pas que le **mois est 0-indexé** (0 = janvier, 7 = août).

---

## 2) Représentations & conversions

```js
const d = new Date("2025-08-22T13:45:10.123Z");

d.toString();        // Texte lisible, fuseau local
d.toISOString();     // ISO en UTC => "2025-08-22T13:45:10.123Z"
d.toUTCString();     // Chaîne en UTC
d.toDateString();    // Date sans l’heure (local)
d.toTimeString();    // Heure sans la date (local)
d.valueOf();         // Timestamp (ms depuis l’époque)
Number(d);           // Idem: valueOf()
```

---

## 3) Getter / Setter

### Local time (fuseau local)
```js
d.getFullYear();     // 2025
d.getMonth();        // 0..11
d.getDate();         // 1..31 (jour du mois)
d.getDay();          // 0..6 (0=dimanche)
d.getHours();        // 0..23
d.getMinutes(); d.getSeconds(); d.getMilliseconds();
d.getTime();         // timestamp (ms)

d.setFullYear(2026);
d.setMonth(0);       // janvier
d.setDate(15);
d.setHours(10, 30, 0, 0); // 10:30:00.000
```

### UTC (indépendant du fuseau)
```js
d.getUTCFullYear(); d.getUTCMonth(); d.getUTCDate();
d.getUTCHours();    d.getUTCMinutes(); // etc.

d.setUTCFullYear(2026);
d.setUTCHours(12);
```

---

## 4) Fuseaux horaires & DST

- `Date` **stocke toujours un instant** en millisecondes depuis l’époque **en UTC**.
- Les getters « local » appliquent **votre fuseau** + **heure d’été (DST)**.
- Les getters `UTC*` lisent sans décalage de fuseau.

**Piège DST :** ajouter 24 h avec `setDate(getDate()+1)` peut « sauter » ou « revenir » d’une heure aux changements d’heure. Pour de l’arithmétique pure, préférez les **timestamps**.

```js
// Ajouter 1 jour de façon robuste
const oneDayMs = 24 * 60 * 60 * 1000;
const plus1 = new Date(d.getTime() + oneDayMs);
```

---

## 5) Comparer des dates

```js
const a = new Date("2025-08-22T12:00:00Z");
const b = new Date("2025-08-22T13:00:00Z");

a < b;               // true (opérateurs fonctionnent via valueOf)
a.getTime() === b.getTime(); // égalité stricte d’instant
```

---

## 6) Formater pour l’affichage (`Intl.DateTimeFormat`)

`Intl` gère locales, calendriers et fuseaux sans dépendances externes.

```js
const d = new Date("2025-08-22T15:30:00Z");

// Locale française, fuseau de Paris
const fmt = new Intl.DateTimeFormat("fr-FR", {
  dateStyle: "full",   // "full" | "long" | "medium" | "short"
  timeStyle: "short",
  timeZone: "Europe/Paris"
});
fmt.format(d); // ex: "vendredi 22 août 2025 à 17:30"
```

**Formats personnalisés** (approche manuelle rapide) :
```js
function pad2(n){ return String(n).padStart(2, "0"); }
function formatYYYYMMDD(d){
  return `${d.getFullYear()}-${pad2(d.getMonth()+1)}-${pad2(d.getDate())}`;
}
```

---

## 7) Parser des chaînes

- **ISO 8601** : `new Date("2025-08-22T15:30:00Z")` fiable.
- Les formats non-ISO sont **ambigus** selon les navigateurs (`"08/09/2025"`?).
- Pour des formats métiers (ex: `DD/MM/YYYY`), parsez vous-même :

```js
function parseFR(ddmmyyyy){
  const [j, m, a] = ddmmyyyy.split("/").map(Number);
  // mois 0-indexé
  return new Date(a, m - 1, j);
}
```

Vérifiez la validité :
```js
const d = new Date("invalid");
Number.isNaN(d.getTime()); // true => Date invalide
```

---

## 8) Arithmétique de dates

```js
// Différences
const diffMs = b - a;                      // ms
const diffMin = diffMs / (60 * 1000);
const diffHeures = diffMs / (3600 * 1000);
const diffJours = diffMs / (24 * 3600 * 1000);

// Ajouter des unités
function addDays(d, n){ return new Date(d.getTime() + n*24*3600*1000); }
function addMinutes(d, n){ return new Date(d.getTime() + n*60*1000); }

// Début/fin de journée locale
function startOfDay(d){
  const r = new Date(d);
  r.setHours(0,0,0,0);
  return r;
}
function endOfDay(d){
  const r = new Date(d);
  r.setHours(23,59,59,999);
  return r;
}
```

---

## 9) Travailler en UTC (utile côté serveur)

```js
function toUTCDate(y, m, d, h=0, min=0, s=0, ms=0){
  // Crée l’instant correspondant à y-m-d h:min:s.ms en UTC
  const t = Date.UTC(y, m-1, d, h, min, s, ms);
  return new Date(t);
}

const utc = toUTCDate(2025, 8, 22, 15, 30);
// Lecture sans conversion locale
utc.getUTCFullYear(); // 2025
```

---

## 10) Performance & immutabilité

- `Date` est **mutable** (les `set*` modifient l’instance). Pour des opérations sécurisées, créez **une nouvelle** `Date` à partir du timestamp (`new Date(d)` ou `new Date(d.getTime())`).
- Les comparaisons/arithmetic utilisent le **timestamp** (nombre), ce qui est rapide.

---

## 11) Cas d’usage fréquents (snippets)

### 11.1 Format « YYYY-MM-DD » local
```js
function formatLocalISODate(d){
  const y = d.getFullYear();
  const m = String(d.getMonth()+1).padStart(2,"0");
  const day = String(d.getDate()).padStart(2,"0");
  return `${y}-${m}-${day}`;
}
```

### 11.2 Minuit local de demain
```js
function demainMinuit(){
  const d = new Date();
  d.setHours(0,0,0,0);
  d.setDate(d.getDate()+1);
  return d;
}
```

### 11.3 Lister les jours entre deux dates (inclus)
```js
function rangeJours(start, end){
  const out = [];
  let d = new Date(start.getFullYear(), start.getMonth(), start.getDate());
  const last = new Date(end.getFullYear(), end.getMonth(), end.getDate());
  while (d <= last){
    out.push(new Date(d));
    d.setDate(d.getDate()+1); // OK pour itérer des dates civiles
  }
  return out;
}
```

### 11.4 Forcer un fuseau à l’affichage (ex: Europe/Paris)
```js
function formatParis(d){
  return new Intl.DateTimeFormat("fr-FR", {
    dateStyle: "medium",
    timeStyle: "short",
    timeZone: "Europe/Paris"
  }).format(d);
}
```

### 11.5 Détecter un week-end
```js
function estWeekend(d){
  const day = d.getDay(); // 0 dimanche, 6 samedi
  return day === 0 || day === 6;
}
```

---

## 12) Pièges classiques (et comment les éviter)

1. **Mois 0-indexé** : janvier = 0 → corrigez avec `m - 1` en création.
2. **Dates invalides** : `new Date("xx")` → testez avec `Number.isNaN(d.getTime())`.
3. **Ambiguïté de parsing** : évitez `"08/09/2025"` → utilisez ISO ou parsez manuellement.
4. **DST** (changement d’heure) : arithmétique via **ms** pour garantir +24h exactes.
5. **Mutabilité** : cloner avant de modifier (`new Date(d)`).
6. **Comparaisons** : utilisez le timestamp (`d.getTime()`), surtout pour égalité.

---