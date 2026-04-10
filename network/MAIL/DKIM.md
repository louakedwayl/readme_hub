# DKIM (DomainKeys Identified Mail)

## 1. Définition

DKIM est un mécanisme d’authentification des emails.  
Il permet de vérifier qu’un email a bien été envoyé par le domaine indiqué et qu’il n’a pas été modifié pendant le transport.

---

## 2. Objectif

- Garantir l’authenticité de l’expéditeur
- Assurer l’intégrité du message
- Réduire le spam et le phishing

---

## 3. Comment ça fonctionne (vue simple)

1. Le serveur d’envoi signe l’email avec une **clé privée**
2. Cette signature est ajoutée dans les **headers** de l’email
3. Le serveur de réception récupère la **clé publique** dans le DNS du domaine
4. Il vérifie la signature

✔ Si c’est valide → email considéré comme fiable  
❌ Sinon → email suspect ou rejeté

---

## 4. Les éléments importants

### Signature DKIM
- Ajoutée dans les headers de l’email
- Contient des infos sur le domaine et la signature

### Clé privée
- Stockée côté serveur d’envoi
- Sert à signer les emails

### Clé publique
- Stockée dans le DNS (enregistrement TXT)
- Sert à vérifier la signature

---

## 5. Où se configure DKIM ?

Dans le DNS du domaine :

- Type : `TXT`
- Nom : `selector._domainkey.domaine.com`
- Valeur : clé publique

---

## 6. DKIM vs SPF vs DMARC

- **SPF** → vérifie quel serveur peut envoyer des emails
- **DKIM** → vérifie que l’email est authentique et non modifié
- **DMARC** → définit une politique globale basée sur SPF + DKIM

---

## 7. Pourquoi c’est important ?

- Améliore la délivrabilité (moins de spam)
- Protège contre l’usurpation d’identité (spoofing)
- Indispensable pour envoyer des emails professionnels

---

## 8. À retenir

- DKIM = signature cryptographique des emails
- Utilise une paire clé privée / clé publique
- La clé publique est dans le DNS
- Permet de vérifier l’origine et l’intégrité d’un email
