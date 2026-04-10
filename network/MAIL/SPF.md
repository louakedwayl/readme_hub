# SPF — Sender Policy Framework

## Le problème

Quand tu envoies un mail, le protocole SMTP ne vérifie **rien**. N'importe qui peut envoyer un mail en prétendant venir de `contact@wayl.dev` sans avoir accès à ton domaine. Résultat : usurpation d'identité et spam massif.

## L'idée de SPF

SPF est une **liste blanche publique** des serveurs autorisés à envoyer du mail en ton nom. Cette liste est publiée dans ton DNS, accessible par tout le monde.

**Analogie** : tu es propriétaire d'un immeuble. SPF = la liste des coursiers autorisés à déposer du courrier à ton nom, affichée à l'entrée. Si un coursier n'est pas sur la liste, le gardien refuse le colis.

## Comment ça marche

1. Tu publies un enregistrement DNS de type TXT sur ton domaine
2. Un serveur reçoit un mail "venant de `wayl.dev`"
3. Le serveur lit ton SPF dans le DNS
4. Il compare l'IP du vrai expéditeur avec ta liste
5. Si l'IP est dans la liste → mail accepté
6. Si l'IP n'est pas dans la liste → mail rejeté ou mis en spam

## Exemple concret

Ton SPF actuel sur `wayl.dev` :

```
v=spf1 include:mx.ovh.com ~all
```

Traduction :
- `v=spf1` → version du protocole
- `include:mx.ovh.com` → "les serveurs OVH sont autorisés"
- `~all` → "tout le reste est suspect"

## Les 4 comportements possibles

| Code | Effet |
|---|---|
| `+all` | Tout autorisé (à bannir) |
| `-all` | Rejet strict |
| `~all` | Marqué comme suspect (softfail) — recommandé |
| `?all` | Neutre |

## Limites

SPF **ne suffit pas** :
- Il ne vérifie que l'enveloppe du mail, pas le contenu
- Il casse quand un mail est redirigé (forwarding)
- Il ne protège pas contre les mails modifiés en route

**C'est pour ça qu'on le combine avec DKIM et DMARC.** SPF seul = maison avec une serrure mais sans porte blindée.

## À retenir

SPF = **liste blanche DNS des serveurs autorisés à envoyer en ton nom**. Nécessaire mais insuffisant. Première des trois briques de la deliverability moderne (avec DKIM et DMARC).
