# 🍪 Différence entre cookies serveur et cookies client (JS)

```
          ┌───────────────────────────┐
          │      Serveur web          │
          │                           │
          │  Set-Cookie: sessionId=abc123; HttpOnly; Secure
          └───────────────┬───────────┘
                          │
           Envoyé automatiquement par le navigateur
                          │
                  ┌───────▼────────┐
                  │  Navigateur    │
                  │  Stocke le     │
                  │  cookie        │
                  └────────────────┘
                          │
      Accessible par JavaScript ? ❌ si HttpOnly
                          │
      Envoyé automatiquement à chaque requête vers le serveur

---------------------------------------------------------------

          ┌───────────────────────────┐
          │  Application web (JS)     │
          │                           │
          │  document.cookie = "cart=5; path=/; max-age=3600"
          └───────────────┬───────────┘
                          │
                  ┌───────▼────────┐
                  │  Navigateur    │
                  │  Stocke le     │
                  │  cookie        │
                  └────────────────┘
                          │
      Accessible par JavaScript ? ✅
                          │
      Envoyé automatiquement à chaque requête vers le serveur
```

### ✅ Points clés

- **Cookies serveur** : créés par le serveur, peuvent être HttpOnly/secure, moins accessibles côté client.  
- **Cookies client (JS)** : créés via `document.cookie`, accessibles/modifiables par JS, moins sécurisés.  
- **Dans les deux cas**, les cookies sont envoyés automatiquement au serveur pour les requêtes correspondantes.
