		Les Sockets en Programmation Réseau (en C)
************************************************************************************

	#1 C’est quoi un socket ?
	#-------------------------

Un socket est une interface logicielle qui permet à un programme de communiquer avec un autre programme, soit :

    sur la même machine (localhost),

    soit sur une autre machine via un réseau (LAN ou Internet).

    Il permet d’envoyer/recevoir des données entre un client et un serveur, à travers des protocoles réseau comme TCP ou UDP.

	2/ Les types de sockets :
	-------------------------

Type		Description					Exemple
SOCK_STREAM	Socket de type TCP (connexion fiable)		Web, SSH
SOCK_DGRAM	Socket de type UDP (non connecté, rapide)	DNS, jeux en ligne

	3/ Le modèle client-serveur :
	-----------------------------

    Serveur : attend une connexion.

    Client : initie la connexion.

Schéma simplifié :

[Client] <-------> [Serveur]
   connect()          accept()
     write()  ---->    read()
     read()   <----    write()

	4/ Création d’un socket (TCP) :
	-------------------------------

Code minimal du côté client (en C - Linux) :

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <arpa/inet.h>

int main() 
{
    int sock;
    struct sockaddr_in serv_addr;
    char message[1024];

    // 1. Créer le socket
    sock = socket(AF_INET, SOCK_STREAM, 0);
    if (sock < 0) {
        perror("socket");
        exit(1);
    }

    // 2. Remplir la structure d’adresse
    serv_addr.sin_family = AF_INET;
    serv_addr.sin_port = htons(8080); // port serveur
    inet_pton(AF_INET, "127.0.0.1", &serv_addr.sin_addr); // IP locale

    // 3. Connexion au serveur
    if (connect(sock, (struct sockaddr*)&serv_addr, sizeof(serv_addr)) < 0) {
        perror("connect");
        exit(1);
    }

    // 4. Envoyer un message
    strcpy(message, "Bonjour serveur !");
    send(sock, message, strlen(message), 0);

    // 5. Lire la réponse
    int len = recv(sock, message, sizeof(message) - 1, 0);
    message[len] = '\0';
    printf("Réponse : %s\n", message);

    // 6. Fermer
    close(sock);
    return 0;
}

Côté serveur (très simplifié) :
-------------------------------

int server_fd = socket(AF_INET, SOCK_STREAM, 0);
bind(server_fd, ...);
listen(server_fd, 1);
int client_fd = accept(server_fd, NULL, NULL);
read(client_fd, buffer, sizeof(buffer));
write(client_fd, "Reçu !", 6);

	5/ Les étapes d’utilisation d’un socket :
	-----------------------------------------

	Serveur TCP :
	-------------

    socket() — créer un socket

    bind() — lier à une IP + port

    listen() — écouter les connexions entrantes

    accept() — accepter une connexion

    read()/write() — communiquer

    close() — fermer

	Client TCP :
	------------

    socket() — créer un socket

    connect() — se connecter au serveur

    read()/write() — communiquer

    close() — fermer

	6/ Structures de données importantes :
	--------------------------------------

    struct sockaddr_in → pour spécifier l'adresse et le port (IPv4)

    htons() / htonl() → pour convertir en format réseau (endianess)

    inet_pton() / inet_ntop() → pour convertir adresse IP texte ↔ binaire

	7/ Erreurs courantes :
	----------------------

    Ne pas vérifier les retours de socket(), bind(), connect(), etc.

    Oublier de fermer les sockets avec close()

    Utiliser des ports réservés (< 1024) sans droits root

    Mauvaise gestion du format d'adresse (AF_INET vs AF_INET6)

	Conclusion :
	------------

    Les sockets sont la base de toute communication réseau en bas niveau.
    C’est un sujet fondamental si tu veux comprendre comment fonctionnent les applications comme les navigateurs, les serveurs web, les messageries, etc.


