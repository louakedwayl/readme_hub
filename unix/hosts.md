# /etc/hosts
*******************************************************************************************

## 1/ Qu’est-ce que le fichier /etc/hosts ?
/etc/hosts est un fichier texte présent sur tous les systèmes Unix/Linux (et aussi sur macOS),
utilisé pour faire une correspondance entre un nom de domaine (ou nom d’hôte) et une adresse IP,
localement, sans passer par Internet.

## 2/ À quoi ça sert ?
- Résoudre localement des noms de domaine.
- Rediriger un nom vers une adresse IP spécifique.
- Bloquer des sites Web (par exemple en les envoyant vers 0.0.0.0).
- Tester un site avant de modifier le DNS officiel.
- Nommer des machines sur un réseau local (LAN, intranet).

## 3/ Où se trouve ce fichier ?
- Linux/macOS : `/etc/hosts`
- Windows : `C:\Windows\System32\drivers\etc\hosts`

## 4/ Structure du fichier :

```bash
//Ceci est un commentaire
<adresse IP>    <nom_d_hôte>    <alias facultatif>
```

### Exemples :

127.0.0.1       localhost
127.0.1.1       mon-pc

192.168.1.42    serveur-local   web.local
0.0.0.0         facebook.com    www.facebook.com

## 5/ Comment l'utiliser ?

Ajouter une entrée :

```bash
sudo nano /etc/hosts
```

Et ajoute une ligne comme :

```bash
127.0.0.1    mon-site.local
```

Puis tu peux visiter http://mon-site.local dans un navigateur. Il pointera vers localhost.

## 6/ Et avec Docker ?

Quand plusieurs conteneurs partagent un réseau Docker (bridge),
Docker gère une version interne du fichier /etc/hosts dans chaque conteneur.

Cela permet, par exemple, à un conteneur wordpress de contacter mariadb juste avec ce nom, sans IP, grâce à :

/etc/hosts (dans wordpress) :
172.20.0.3   mariadb

Docker fait ça automatiquement quand les services sont sur le même réseau.

## 7/ Points importants :

+------------------------------------------+--------------------------------------------+
| Cas                                      | Explication                                |
+------------------------------------------+--------------------------------------------+
| Le fichier est lu avant le DNS           | Si un nom est présent ici,                 |
|                                          | il est utilisé en priorité.                |
+------------------------------------------+--------------------------------------------+
| Les entrées doivent être                 | IP + nom d’hôte, séparés par               |
| correctement formatées                   | des espaces ou tabulations.                |
+------------------------------------------+--------------------------------------------+
| Pas d'extensions .local                  | Certains systèmes utilisent                |
| résolues automatiquement                 | Bonjour/mDNS → attention aux conflits.     |
+------------------------------------------+--------------------------------------------+
| Modification du fichier                  | Fichier système → modification             |
| requiert souvent sudo                    | nécessite les droits administrateur.       |
+------------------------------------------+--------------------------------------------+

8/ Commandes utiles :

Voir le contenu :

```bash
cat /etc/hosts
```

Tester une résolution :

```bash
ping mon-site.local
```

Ouvrir pour modifier :

```bash
sudo nano /etc/hosts
```
+------------------------+---------------------------------------------+
| Élément                | Description                                 |
+------------------------+---------------------------------------------+
| 📂 Emplacement          | /etc/hosts                                  |
+------------------------+---------------------------------------------+
| 🔧 Usage                | Résolution locale des noms                  |
+------------------------+---------------------------------------------+
| 💡 Avantage             | Instantané, simple, sans DNS                |
+------------------------+---------------------------------------------+
| ⚠️ Attention            | N’est pas partagé entre les machines        |
|                        | (sauf si scripté)                           |
+------------------------+---------------------------------------------+
