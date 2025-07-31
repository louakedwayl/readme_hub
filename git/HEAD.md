# HEAD
---

Dans **Git**, `HEAD` est un **pointeur spécial** qui indique le **commit actuellement checkout** dans votre dépôt.  
C’est essentiellement une référence au **sommet de votre branche active**.

---

## Comprendre HEAD

- `HEAD` pointe toujours vers le **commit sur lequel vous travaillez actuellement**.  
- Lorsque vous changez de branche ou réalisez un `checkout`, `HEAD` se met à jour pour pointer 
vers le **dernier commit de la nouvelle branche**.  
- On peut le voir comme un **marqueur indiquant "voici où vous êtes maintenant dans l'historique de votre dépôt"**.

---

## Types de HEAD

### 1/ HEAD attaché à une branche

Lorsque vous êtes sur une branche, `HEAD` pointe vers la **branche active** (exemple : `main`, `develop`, etc.).

HEAD -> main -> CommitX

---

### 2/ HEAD détaché

Si vous `checkout` un **commit spécifique** ou un **tag** (et non une branche), `HEAD` est dit **détaché**.  
Cela signifie qu’il **ne suit pas de branche**.

HEAD -> CommitY (pas de branche associée)


Dans cet état, si vous effectuez des commits, ils **ne seront pas rattachés à une branche**  
à moins que vous ne **créiez une nouvelle branche** ou que vous les **mergiez manuellement**.

---

## Visualiser HEAD

Pour voir où pointe `HEAD`, utilisez :

```bash
git log --oneline --decorate
```

### Exemple de sortie :

```bash
b3c1d3f (HEAD -> main) Update README file
8f4a6c7 Add new feature
1d2c8e9 Initial commit
```