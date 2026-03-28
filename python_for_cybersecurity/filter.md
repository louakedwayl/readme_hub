# `filter()` en Python

## 1. L’idée générale

`filter()` est une fonction de Python qui sert à **sélectionner certains éléments** dans un ensemble de données.

Son rôle est simple :

- parcourir plusieurs éléments
- tester chacun d’eux
- garder seulement ceux qui correspondent à une condition

Autrement dit, `filter()` permet de **filtrer** des données.

---

## 2. À quoi ça sert

On utilise `filter()` quand on veut :

- garder seulement certaines valeurs
- enlever les éléments qui ne nous intéressent pas
- faire un tri logique selon une condition

Par exemple, on peut vouloir :

- garder seulement les nombres pairs
- garder seulement les mots assez longs
- garder seulement les valeurs considérées comme valides

---

## 3. Comment ça fonctionne

`filter()` travaille avec deux éléments :

- une fonction
- un ensemble de données à parcourir

La fonction sert à dire si un élément doit être gardé ou non.

Si le test est vrai, l’élément est conservé.  
Si le test est faux, l’élément est retiré.

---

## 4. Idée importante

`filter()` ne change pas les valeurs.

Il ne transforme pas les éléments.

Il sert uniquement à :

- **garder**
- ou **retirer**

Donc son but est la **sélection**, pas la modification.

---

## 5. Le résultat de `filter()`

En Python, `filter()` renvoie un résultat que l’on peut ensuite parcourir ou convertir.

Très souvent, on transforme ce résultat en liste pour voir plus clairement les éléments conservés.

---

## 6. Cas particulier

Si on ne donne pas de vraie fonction de test, `filter()` peut aussi garder seulement les éléments considérés comme “vrais” par Python.

L’idée reste la même :
on enlève certains éléments et on garde les autres.

---

## 7. Quand l’utiliser

`filter()` est utile quand on veut écrire un code clair pour exprimer une idée de sélection.

C’est une fonction pratique pour dire simplement :

“je parcours ces éléments, et je garde seulement ceux qui passent une condition”.

---

## 8. Résumé

`filter()` est une fonction Python qui permet de :

- parcourir des éléments
- appliquer une condition
- garder seulement certains résultats

En une phrase :

**`filter()` sert à filtrer des données selon une condition.**
