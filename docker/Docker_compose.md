			Docker Compose
******************************************************************************

Qu’est-ce que Docker Compose ?
------------------------------

	Docker Compose est un outil qui permet de définir et de gérer des applications multi-conteneurs Docker à l’aide 
d’un fichier de configuration unique : docker-compose.yml.

    Exemple : Une application web avec un conteneur pour le backend, un pour la base de données, et un pour le frontend.

📁 Structure d’un projet avec Docker Compose

my-app/
├── docker-compose.yml
├── backend/
│   └── Dockerfile
├── frontend/
│   └── Dockerfile
└── db/ (souvent pas besoin de Dockerfile, image officielle utilisée)

	Fichier docker-compose.yml :
	----------------------------

Le fichier docker-compose.yml permet de décrire les services, volumes, réseaux, etc.


	Exemple de base :
	-----------------

version: "3.8"

services:
  web:
    build: ./backend
    ports:
      - "8000:8000"
    volumes:
      - ./backend:/app
    depends_on:
      - db

  db:
    image: postgres:13
    environment:
      POSTGRES_USER: user
      POSTGRES_PASSWORD: password
      POSTGRES_DB: mydb
    volumes:
      - db-data:/var/lib/postgresql/data

volumes:
  db-data:

Commandes principales :
-----------------------
	
	Démarrer les services :
	-----------------------

docker-compose up

	Détaché (en arrière-plan) :
	---------------------------

docker-compose up -d

	Stopper les services :
	----------------------

docker-compose down

	Rebuild les images :
	--------------------

docker-compose up --build

	Voir les logs :
	---------------

docker-compose logs

	Voir les conteneurs en cours :
	------------------------------

docker-compose ps

	depends_on :
	------------

Cela indique qu’un service dépend d’un autre. Cela ne garantit pas que le service dépendant est "prêt",
seulement qu’il est lancé en premier. Pour attendre que la base soit disponible,
il faut un script "wait-for-it" ou équivalent.

	Volumes et données persistantes :
	---------------------------------

volumes:
  - db-data:/var/lib/postgresql/data

Un volume nommé (db-data) permet de conserver les données entre les redémarrages du conteneur.

	Réseaux personnalisés (optionnel) :
	-----------------------------------

Docker Compose crée automatiquement un réseau, mais tu peux le configurer :

networks:
  mynetwork:

Et l’utiliser dans les services :

services:
  web:
    networks:
      - mynetwork

	Bonnes pratiques :
	------------------

    Utilise .env pour stocker les variables sensibles ou réutilisables.

    Ne pas versionner les données dans volumes.

    Utilise depends_on avec précaution (utiliser un script d’attente si besoin).

    Découpe bien les services (db, backend, frontend, etc.).

	Exemple complet : Application Flask + PostgreSQL :
	--------------------------------------------------

version: '3.8'

services:
  web:
    build: ./web
    ports:
      - "5000:5000"
    volumes:
      - ./web:/app
    depends_on:
      - db

  db:
    image: postgres:13
    environment:
      POSTGRES_DB: mydb
      POSTGRES_USER: user
      POSTGRES_PASSWORD: password
    volumes:
      - db-data:/var/lib/postgresql/data

volumes:
  db-data:

****************************************************************************************************
