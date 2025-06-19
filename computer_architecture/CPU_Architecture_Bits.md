# Comprendre les bits dans l’architecture CPU

## 1. C’est quoi “32 bits” ou “64 bits” ?

- Cela décrit **la taille des registres internes** du CPU, donc la largeur des données que le CPU peut traiter en une seule opération.  
- Un CPU 32 bits manipule des données et des adresses sur 32 bits (= 4 octets) à la fois.  
- Un CPU 64 bits manipule des données et des adresses sur 64 bits (= 8 octets) à la fois.  

## 2. Pourquoi ça change quelque chose ?

- **Plus grand = plus de données traitées en un coup** :  
  Un CPU 64 bits peut traiter des nombres entiers, des adresses mémoire, ou des pointeurs plus larges, donc plus d’information à la fois.  
- **Plus d’adresses accessibles** :  
  Un CPU 32 bits peut adresser environ 4 Go de RAM maximum (2^32 adresses).  
  Un CPU 64 bits peut théoriquement adresser beaucoup plus (2^64), ce qui permet de gérer énormément de RAM.  

## 3. Impact pratique

- Les systèmes 64 bits peuvent utiliser plus de mémoire vive.  
- Les programmes 64 bits peuvent manipuler des données plus larges, ce qui est important pour certains calculs et performances.  
- Les registres, les pointeurs, les instructions internes s’adaptent à cette taille.  

## 4. Exemple simple

Imaginons un registre :  
- 32 bits → peut stocker un nombre entier entre 0 et ~4 milliards (unsigned) ou entre -2 milliards et +2 milliards (signed).  
- 64 bits → peut stocker un nombre beaucoup plus grand, énorme (plus de 18 quintillions).  

## 5. Résumé

| Architecture | Taille registre    | Taille adresse max théorique           |  
|--------------|-------------------|--------------------------------------|  
| 32 bits      | 32 bits (4 octets) | 4 Go                                 |  
| 64 bits      | 64 bits (8 octets) | Très grande (ex : plusieurs To ou plus) |  

