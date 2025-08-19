# Docker Daemon

## Introduction

Docker repose sur une architecture client-serveur. Au cœur de cette architecture se trouve le Docker Daemon (aussi appelé `dockerd`), qui est le moteur principal de Docker.  
Il gère les objets Docker tels que les images, les conteneurs, les volumes, les réseaux, etc.

## 1/ Qu’est-ce que le Docker Daemon ?

### Définition

Le Docker Daemon est un service en arrière-plan (background process) qui :
- Écoute les requêtes Docker (par défaut sur le socket Unix `/var/run/docker.sock`).  
- Crée et gère les conteneurs Docker.  
- Communique avec le Docker Client et éventuellement avec d’autres daemons.  

Nom du processus : `dockerd`

## 2/ Architecture de Docker

+----------------+       REST API       +-----------------+
|  Docker Client | <------------------> | Docker Daemon   |
+----------------+                     +-----------------+
                                                |
                                                v
                                  +-----------------------------+
                                  | Conteneurs, Images, Réseaux |
                                  +-----------------------------+

Le Docker Client (docker) envoie des commandes via une API.

Le Docker Daemon (dockerd) reçoit ces commandes, les interprète et agit en conséquence.

## 3/ Communication avec le daemon :

Par défaut, le daemon écoute sur :

un socket Unix (/var/run/docker.sock)

ou sur un port TCP (ex. : tcp://0.0.0.0:2375) s’il est configuré ainsi (attention à la sécurité).

# Exemple d'appel local via le client Docker
```bash
docker run hello-world
```

# Appelle implicitement l'API REST exposée par le daemon

## 4/ Lancer et configurer le Docker Daemon :

Lancer dockerd 
```bash
sudo dockerd
```

### Fichier de configuration (Linux) :

Chemin typique : /etc/docker/daemon.json

### Exemple :

```json
{
  "log-level": "info",
  "storage-driver": "overlay2",
  "insecure-registries": ["myregistry.local:5000"]
}
```
	
###Démarrage automatique avec systemd :

```bash
sudo systemctl start docker
sudo systemctl enable docker
```

## 5/ Commandes utiles pour diagnostiquer le Daemon :

| Commande               | Description                        |
|------------------------|------------------------------------|
| systemctl status docker | Voir l’état du service Docker      |
| journalctl -u docker    | Logs du daemon Docker              |
| docker info             | Infos sur le daemon (stockage, plugins) |
| docker version          | Versions client et daemon          |

## 6/ Exemples pratiques :

Redémarrer le daemon Docker :

```bash
sudo systemctl restart docker
```

Vérifier qu’il est actif :

```bash
ps aux | grep dockerd
```

### Erreur courante :

Cannot connect to the Docker daemon at unix:///var/run/docker.sock. Is the docker daemon running?

### Cela signifie que :

le daemon n’est pas lancé.

ou que l’utilisateur n’a pas les droits (sudo nécessaire ou ajout au groupe docker).

## 7/ Sécurité et bonnes pratiques :

Ne jamais exposer le Docker Daemon en TCP sans TLS.

Utiliser des sockets Unix avec des permissions limitées.

Ajouter les utilisateurs de confiance au groupe docker.

```bash
sudo usermod -aG docker $USER
```

### Conclusion :

Le Docker Daemon est le moteur de Docker. Sans lui, aucun conteneur ne peut être exécuté. Comprendre son rôle, sa configuration et son interaction avec le client est essentiel pour maîtriser Docker.

