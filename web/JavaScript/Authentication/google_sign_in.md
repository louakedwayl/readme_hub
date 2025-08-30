# Connexion avec Google (Google Identity Services)

## 1. Introduction
Google Identity Services (GIS) est la méthode officielle pour permettre à un utilisateur de se connecter à une application en utilisant son compte Google.  
Il repose sur **OAuth 2.0** et **OpenID Connect** pour fournir un **jeton sécurisé** contenant l'identité de l'utilisateur.

---

## 2. Pourquoi un Client ID est nécessaire

### 2.1. Rôle du Client ID
Le **Client ID** est l'identifiant unique de ton application côté Google.  
Il sert à :
- Dire à Google **qui** demande l'accès.
- Empêcher qu'un site pirate utilise ton bouton Google Sign-In.
- Contrôler les redirections (éviter les vols de tokens).

### 2.2. Sécurité
Sans Client ID et **URI autorisés**, un attaquant pourrait :
- Faire croire à un utilisateur qu'il se connecte sur ton site.
- Récupérer son **jeton d'authentification**.
- Utiliser son compte sans autorisation.

Google impose donc une **liste blanche** d'URL valides.

---

## 3. Création d’un Client ID

### Étapes
1. Aller sur [Google Cloud Console](https://console.cloud.google.com/).
2. Se connecter avec son compte Google.
3. Cliquer sur **Créer un projet**.
4. Donner un nom au projet.
5. Aller dans **APIs & Services → Identifiants**.
6. Cliquer sur **Créer des identifiants → ID client OAuth 2.0**.
7. Choisir **Application Web**.
8. Dans **URI autorisés**, ajouter :
   - `http://localhost:5500` pour les tests locaux.
   - Ou l'URL de production de ton site.
9. Copier le **Client ID** généré.

---

## 4. Intégrer le bouton Google Sign-In

### 4.1. Ajouter le script Google
```html
<script src="https://accounts.google.com/gsi/client" async defer></script>

4.2. Ajouter le bouton

<div id="g_id_onload"
     data-client_id="TON_CLIENT_ID"
     data-auto_prompt="false">
</div>

<div class="g_id_signin"
     data-type="standard"
     data-theme="outline"
     data-size="large">
</div>
```
## 5. Récupérer les informations utilisateur

### Exemple JavaScript

```js
<script>
function handleCredentialResponse(response) {
    console.log("Token reçu :", response.credential);

    // Décoder le JWT
    const data = JSON.parse(atob(response.credential.split('.')[1]));
    console.log("Utilisateur :", data);
}

window.onload = function () {
    google.accounts.id.initialize({
        client_id: "TON_CLIENT_ID",
        callback: handleCredentialResponse
    });

    google.accounts.id.renderButton(
        document.querySelector(".g_id_signin"),
        { theme: "outline", size: "large" }
    );
};
</script>
```

## 6. Flux global

L'utilisateur clique sur "Sign in with Google".

Google affiche la fenêtre de connexion.

Si l'utilisateur valide :

Google envoie un jeton JWT à ton application.

Ce jeton contient les informations de l'utilisateur (nom, email, etc.).

Ton application utilise ces infos pour créer une session.

## 7. Points importants

Jamais exposer ton Client Secret (utilisé côté serveur uniquement).

Vérifier le JWT côté serveur avec les clés publiques de Google.

Limiter les URI autorisés au strict nécessaire.

Toujours utiliser HTTPS en production.

## 8. Erreurs fréquentes

| Erreur                  | Cause                                      | Solution                                         |
|-------------------------|--------------------------------------------|-------------------------------------------------|
| redirect_uri_mismatch    | L'URL de retour n'est pas dans les URI autorisés | Ajouter l'URL correcte dans Google Cloud Console |
| invalid_client           | Mauvais Client ID                           | Vérifier et corriger le Client ID              |
| popup_closed_by_user     | L'utilisateur a fermé la fenêtre           | Gérer l'annulation dans ton code               |
