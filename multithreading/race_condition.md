# Race Condition
---

Une **race condition** (*condition de compétition*) se produit lorsque **plusieurs threads** ou
**processus** accèdent simultanément à une **ressource partagée** (comme une variable ou un fichier),  
et qu'au moins un des threads peut **modifier** cette ressource.  

Cela rend le résultat de l'exécution **imprévisible** ou **indéfini**, car **l'ordre d'exécution des threads n'est pas déterminé**.

---

## Conditions pour qu'une race condition se produise :

1. **Accès simultané** : Deux threads ou plus accèdent à une ressource en même temps.  
2. **Au moins une écriture** : Au moins un thread effectue une opération d'écriture sur la ressource partagée.  
3. **Absence de synchronisation** : Les accès ne sont pas protégés par des mécanismes 
   de synchronisation (comme des **mutex**, **sémaphores**, ou **locks**).