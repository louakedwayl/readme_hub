# DMARC — Domain-based Message Authentication, Reporting & Conformance

## Le problème

Tu as SPF (liste des serveurs autorisés) et DKIM (signature cryptographique). Mais quand l'un des deux **échoue**, que doit faire le serveur qui reçoit le mail ? Le rejeter ? Le mettre en spam ? Le laisser passer ?

Sans instruction de ta part, chaque serveur décide seul. Résultat : comportement imprévisible, et tes propres mails légitimes peuvent être traités différemment selon le destinataire.

## L'idée de DMARC

DMARC est une **politique publique** que tu publies dans ton DNS pour dire à tous les serveurs du monde : "voici ce que je veux que tu fasses si un mail prétendument venu de mon domaine échoue à SPF ou DKIM".

**Analogie** : SPF = liste des coursiers autorisés. DKIM = sceau de cire sur l'enveloppe. **DMARC = les instructions données à la douane** : "si un colis arrive sans la bonne liste ou sans le bon sceau, voici comment le traiter, et envoie-moi un rapport".

## Comment ça marche

1. Tu publies un enregistrement DNS TXT sur `_dmarc.wayl.dev`
2. Un serveur reçoit un mail "venant de `wayl.dev`"
3. Il vérifie SPF et DKIM
4. Si au moins un des deux réussit **et est aligné** avec le domaine visible → mail accepté
5. Si les deux échouent → le serveur applique **ta politique DMARC**
6. Il t'envoie aussi un rapport agrégé des mails reçus en ton nom

## Exemple concret

```
v=DMARC1; p=none; rua=mailto:contact@wayl.dev; fo=1
```

Traduction :
- `v=DMARC1` → version
- `p=none` → politique : "ne bloque rien, juste surveille"
- `rua=mailto:...` → envoie-moi les rapports à cette adresse
- `fo=1` → génère un rapport dès qu'un problème d'authentification survient

## Les 3 politiques possibles

| Politique | Effet | Quand l'utiliser |
|---|---|---|
| `p=none` | Ne bloque rien, collecte juste des rapports | **Toujours commencer par ça** (phase monitoring) |
| `p=quarantine` | Met en spam si SPF/DKIM échoue | Après 1-2 semaines de monitoring réussi |
| `p=reject` | Rejette totalement si SPF/DKIM échoue | Protection maximale, config finale |

**Règle d'or** : jamais passer directement à `reject`. Tu risques de bloquer tes propres mails légitimes si une config est mal alignée. Toujours `none` → `quarantine` → `reject`, avec analyse des rapports entre chaque étape.

## Les rapports DMARC

DMARC t'envoie automatiquement des **rapports quotidiens** sur qui envoie des mails en ton nom. Tu vois :
- Quels serveurs ont envoyé pour ton domaine
- Combien de mails ont passé SPF/DKIM
- Combien ont échoué
- Depuis quelles IPs les tentatives d'usurpation viennent

C'est ta **visibilité en temps réel** sur la santé de ton canal mail.

## Pourquoi c'est critique

1. **Anti-usurpation d'identité** : sans DMARC, un spammeur peut se faire passer pour toi auprès de tes contacts. Avec `p=reject`, impossible.
2. **Signal de confiance fort** : Gmail, Outlook et les filtres d'entreprise favorisent massivement les expéditeurs avec DMARC configuré.
3. **Obligatoire depuis 2024** : Gmail et Yahoo imposent DMARC pour tous les expéditeurs qui envoient plus de 5 000 mails par jour, et pénalisent fortement les autres sans DMARC.
4. **Visibilité** : sans DMARC, tu n'as aucune idée de combien de tes mails passent ou sont bloqués. DMARC te donne les chiffres.

## À retenir

DMARC = **la politique publique qui dit aux serveurs quoi faire quand SPF ou DKIM échoue, plus un système de reporting automatique**. C'est la 3ᵉ brique indispensable de la deliverability moderne.

**Sans les 3 (SPF + DKIM + DMARC), ton domaine est classé "amateur" par les filtres mail modernes.** Et un expéditeur amateur voit ses mails pénalisés systématiquement.
