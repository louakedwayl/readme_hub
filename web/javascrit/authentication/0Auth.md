# Fiche récap -- OAuth 2.0

## 📌 Définition

OAuth 2.0 est un protocole **d'autorisation** qui permet à une
application d'accéder à certaines données d'un utilisateur **sans** lui
demander directement son mot de passe.

Ce n'est **pas** un service appartenant à Google : c'est une norme
ouverte utilisée par de nombreux fournisseurs d'identité (Google,
Facebook, GitHub, Microsoft, etc.).

------------------------------------------------------------------------

## 🔍 Principe de fonctionnement

1.  L'utilisateur clique sur **"Se connecter avec \[Fournisseur\]"** (ex
    : Google, Facebook).
2.  L'application redirige l'utilisateur vers le fournisseur choisi pour
    l'authentification.
3.  L'utilisateur saisit ses identifiants **uniquement** sur la page du
    fournisseur.
4.  Le fournisseur demande à l'utilisateur de confirmer quelles données
    l'application pourra utiliser.
5.  Si l'utilisateur accepte, le fournisseur renvoie un **token
    (jeton)** à l'application.
6.  L'application utilise ce token pour accéder uniquement aux données
    autorisées.

------------------------------------------------------------------------

## ✅ Avantages

-   **Sécurité** : le mot de passe n'est jamais transmis à
    l'application.
-   **Contrôle** : l'utilisateur choisit quelles données partager.
-   **Révocation facile** : l'accès peut être retiré à tout moment
    depuis le compte du fournisseur.
-   **Interopérabilité** : fonctionne avec de nombreux services.

------------------------------------------------------------------------

## ⚠️ Points à retenir

-   **OAuth ≠ Google** : Google est juste un fournisseur qui utilise
    OAuth.
-   **OAuth ≠ Authentification pure** : OAuth est un système
    d'**autorisation** (quelles données peuvent être utilisées).
-   Utilisé dans la pratique pour **"Sign in"** (connexion sans mot de
    passe).
-   Fonctionne avec de nombreux fournisseurs : Google, Facebook, GitHub,
    Microsoft, Twitter, LinkedIn, etc.

------------------------------------------------------------------------

## 📊 Fournisseurs courants et exemples de données accessibles

  ----------------------------------------------------------------------------
  Fournisseur   Exemple d'usage OAuth           Données accessibles (selon
                                                autorisations)
  ------------- ------------------------------- ------------------------------
  Google        Connexion à un site web         Email, nom, photo de profil,
                                                agenda, Drive

  Facebook      Connexion à une app mobile      Nom, photo, liste d'amis,
                                                pages aimées

  GitHub        Connexion à un service de dev   Repos publics/privés, email

  Microsoft     Connexion à un intranet         Email, profil, fichiers
                                                OneDrive

  Twitter/X     Poster un tweet depuis une app  Lire/écrire tweets, profil
                tierce                          

  LinkedIn      Connexion à une plateforme de   Profil professionnel, contacts
                recrutement                     
  ----------------------------------------------------------------------------

------------------------------------------------------------------------

## 📚 Schéma simplifié

``` plaintext
[Application] → redirection → [Fournisseur OAuth (ex: Google)]
                     ↓
     Utilisateur s’authentifie et autorise l’accès
                     ↓
         ← token ← [Fournisseur OAuth]
[Application utilise le token pour accéder aux données autorisées]
```

------------------------------------------------------------------------

## 📚 Exemples d'utilisation

-   Connexion à un site via **"Se connecter avec Google"**.
-   Une app photo qui importe tes images depuis Google Photos.
-   Un outil qui lit ton agenda Google Calendar.
-   Une extension qui publie des tweets pour toi.

------------------------------------------------------------------------

✏️ **En résumé** : OAuth 2.0 est la **clé d'accès temporaire** qui
permet à une application de réaliser des actions ou lire des données
pour toi, **sans connaître ton mot de passe**, et ce, quel que soit le
fournisseur (Google, Facebook, GitHub...).
