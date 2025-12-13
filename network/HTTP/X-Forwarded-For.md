# Cours : X-Forwarded-For

## 1. Introduction

**X-Forwarded-For (XFF)** est un en-tête HTTP utilisé pour transmettre l'adresse IP d'origine d'un client lorsqu'une requête HTTP traverse un ou plusieurs intermédiaires (proxy, reverse proxy, load balancer, CDN).

Sans cet en-tête, le serveur final ne voit que l'adresse IP du dernier intermédiaire, et non celle du client réel.

---

## 2. Problème résolu par X-Forwarded-For

### 2.1 Accès direct

```
Client ─────────▶ Serveur
```

Le serveur voit directement l'IP du client.

### 2.2 Accès via proxy

```
Client ─▶ Proxy ─▶ Serveur
```

Le serveur voit uniquement l'IP du proxy.

👉 **X-Forwarded-For permet de conserver l'IP du client original.**

---

## 3. Fonctionnement de X-Forwarded-For

### 3.1 En-tête HTTP

Exemple simple :

```http
X-Forwarded-For: 203.0.113.45
```

Cela indique que l'adresse IP d'origine du client est `203.0.113.45`.

### 3.2 Chaîne de proxies

Lorsqu'il y a plusieurs intermédiaires :

```http
X-Forwarded-For: 203.0.113.45, 70.41.3.18, 150.172.238.178
```

Interprétation :

* **Première IP** → client original
* IP suivantes → proxies successifs

---

## 4. Qui ajoute X-Forwarded-For ?

* Reverse proxy (Nginx, Apache)
* Load balancer (HAProxy, AWS ELB)
* CDN (Cloudflare, Akamai)

⚠️ Le navigateur **n'ajoute jamais** cet en-tête lui-même.

---

## 5. Sécurité et confiance

### 5.1 En-tête falsifiable

Un client peut envoyer manuellement :

```http
X-Forwarded-For: 1.2.3.4
```

👉 **Cela ne change PAS l'IP réelle**, seulement une information déclarative.

### 5.2 Règle essentielle

> **Ne jamais faire confiance à X-Forwarded-For sans proxy de confiance**

Un serveur doit :

* vérifier l'IP source réelle
* n'utiliser XFF que si la requête provient d'un proxy autorisé

---

## 6. Cas d'usage courants

* Logs et audit
* Rate limiting
* Détection de fraude
* Géolocalisation
* Statistiques de trafic

---

## 7. X-Forwarded-For vs autres en-têtes

| En-tête         | Rôle                                  |
| --------------- | ------------------------------------- |
| X-Forwarded-For | IP du client original                 |
| X-Real-IP       | IP unique (souvent fournie par Nginx) |
| Forwarded       | Standard RFC 7239                     |

Exemple `Forwarded` :

```http
Forwarded: for=203.0.113.45;proto=https;by=150.172.238.178
```

---

## 8. Exploitation côté serveur (conceptuel)

### Logique générale

1. Vérifier l'IP source
2. Si elle appartient à un proxy de confiance :

   * lire X-Forwarded-For
3. Sinon :

   * ignorer XFF

---

## 9. Erreurs fréquentes

* Utiliser XFF sans validation
* Prendre la dernière IP au lieu de la première
* Croire que XFF modifie l'IP réseau
* L'utiliser comme mécanisme d'authentification

---

## 10. Résumé

* X-Forwarded-For est un **en-tête HTTP informatif**
* Il transmet l'IP du client **à travers des proxies**
* Il est **facilement falsifiable**
* Il doit être utilisé **uniquement dans une chaîne de confiance**

---

## 11. À retenir

> **X-Forwarded-For ≠ IP réelle**
> **X-Forwarded-For = information transmise par un intermédiaire de confiance**

---

Fin du cours.
