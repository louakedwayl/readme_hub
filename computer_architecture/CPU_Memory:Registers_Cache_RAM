# Comprendre RAM, cache et registres dans un CPU

## 1. RAM : mémoire principale

- C’est là que toutes les données et le code d’un programme (processus) sont stockés pendant son exécution.  
- La RAM est assez grande (giga-octets) mais **plus lente** que les registres ou le cache.  
- Chaque fois que le CPU a besoin de données, il peut les lire ou écrire en RAM, mais cela prend plusieurs dizaines à centaines de cycles CPU.

## 2. Registres : mémoire ultra-rapide dans le CPU

- Petites zones de stockage **directement dans le processeur**.  
- Accès quasi instantané (quelques cycles d’horloge).  
- Utilisés pour stocker temporairement les données sur lesquelles le CPU travaille en ce moment (ex : résultats intermédiaires, variables locales).  
- Leur nombre est limité (quelques dizaines).

## 3. Cache CPU : mémoire intermédiaire rapide

- Situé entre la RAM et les registres.  
- Plusieurs niveaux (L1, L2, L3), du plus rapide et petit (L1) au plus grand et plus lent (L3).  
- Stocke les données et instructions les plus fréquemment utilisées pour accélérer leur accès.  
- Réduit le nombre d’accès longs à la RAM.  

## 4. Comment ça fonctionne ensemble ?

1. Le programme s’exécute, ses données sont en RAM.  
2. Quand le CPU a besoin d’une donnée :  
   - Il regarde d’abord dans le cache.  
   - Si la donnée est dans le cache (cache hit), elle est utilisée directement, très vite.  
   - Sinon (cache miss), la donnée est chargée depuis la RAM dans le cache, puis utilisée.  
3. Pour effectuer une opération, le CPU charge la donnée du cache (ou des registres) dans un registre.  
4. Le CPU exécute l’instruction en manipulant ces données dans les registres.  
5. Résultats et données modifiées peuvent être renvoyés en cache, puis en RAM.  

## 5. Pourquoi ce système ?

- La RAM est trop lente pour un accès direct fréquent.  
- Les registres sont trop peu nombreux pour stocker tout.  
- Le cache sert d’intermédiaire pour garder sous la main ce qui est utilisé souvent.  
- Ce système **maximise la rapidité** de traitement du CPU.  

