# Deadlock et Starvation
---

En programmation concurrente, **deadlock** et **starvation** sont deux problèmes critiques liés à la gestion des ressources partagées entre plusieurs threads ou processus.  
Ils entraînent un **blocage** ou une **attente indéfinie** dans l'exécution des programmes.

---

## 1. Deadlock (Interblocage)

### Définition
Un **deadlock** (interblocage) se produit lorsque **plusieurs threads** (ou processus) attendent indéfiniment des ressources détenues par les autres, créant ainsi un **cercle d’attente**.

**Exemple classique :**
- Le **thread A** verrouille la ressource 1 et attend la ressource 2.  
- Le **thread B** verrouille la ressource 2 et attend la ressource 1.  
Aucun des deux ne peut continuer : c’est un deadlock.

### Conditions pour un deadlock (conditions de Coffman)
Un deadlock peut se produire si les **4 conditions suivantes** sont réunies :
1. **Exclusion mutuelle** : Une ressource ne peut être utilisée que par un seul thread à la fois.  
2. **Rétention et attente** : Un thread conserve une ressource tout en attendant d’en obtenir une autre.  
3. **Pas de préemption** : Une ressource ne peut pas être retirée de force à un thread.  
4. **Attente circulaire** : Un cycle d’attente existe entre plusieurs threads.  

### Stratégies pour éviter les deadlocks
- **Ordonnancement des ressources** : Toujours verrouiller les ressources dans le même ordre.  
- **Timeouts** : Utiliser des temps d’attente maximum pour les locks.  
- **Détection et récupération** : Identifier les threads en deadlock et libérer des ressources.  
- **Verrous hiérarchisés** : Définir une hiérarchie de priorités pour les ressources.  

---

## 2. Starvation (Inanition)

### Définition
La **starvation** (inanition) se produit lorsqu’un thread n’obtient **jamais l’accès aux ressources** nécessaires, car d’autres threads plus prioritaires monopolisent ces ressources.

**Exemple :**
- Un thread de basse priorité ne parvient jamais à exécuter son code, car des threads de haute priorité accaparent constamment le processeur ou les ressources.

### Causes
- **Priorités strictes** : Les threads de faible priorité passent toujours après ceux de haute priorité.  
- **Monopolisation des ressources** : Certains threads ne libèrent pas les ressources assez rapidement.  

### Solutions pour éviter la starvation
- **Équité (fairness)** : Utiliser des algorithmes d’ordonnancement équitables (ex : round-robin).  
- **Aging** : Augmenter progressivement la priorité des threads qui attendent depuis longtemps.  
- **Verrous équitables** : Employer des mécanismes de synchronisation qui respectent l’ordre d’arrivée.  

---

## Deadlock vs Starvation

| Problème     | Cause principale               | Conséquence              |
|--------------|-------------------------------|-------------------------|
| **Deadlock** | Attente circulaire entre threads | Blocage complet du programme |
| **Starvation** | Priorité ou monopolisation des ressources | Un ou plusieurs threads ne progressent pas |

---

## Conclusion

- Un **deadlock** bloque totalement l’exécution : les threads impliqués restent figés.  
- La **starvation** laisse certains threads **indéfiniment en attente**, sans bloquer l’ensemble du programme.  
- Ces problèmes nécessitent une **conception attentive** des mécanismes de synchronisation (mutex, sémaphores, locks) et des **politiques d’ordonnancement équitables**.
