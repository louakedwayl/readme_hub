# getUserMedia — Accéder à la caméra et au micro depuis le navigateur

## Introduction

`getUserMedia` est une API JavaScript native du navigateur qui permet à une application web d'accéder aux périphériques multimédia de l'utilisateur, principalement la **caméra** et le **microphone**.

Elle fait partie de la spécification **MediaDevices**, accessible via `navigator.mediaDevices`.

---

## Principe de fonctionnement

L'idée est simple : le navigateur sert d'intermédiaire entre ton code JavaScript et le matériel physique (webcam, micro). Quand tu appelles `getUserMedia`, le navigateur demande la permission à l'utilisateur via une popup. Si l'utilisateur accepte, tu reçois un flux multimédia (`MediaStream`) que tu peux exploiter dans ta page.

Le flux reçu peut être :

- Affiché en temps réel dans un élément `<video>`
- Capturé image par image via un `<canvas>`
- Enregistré sous forme de fichier audio/vidéo
- Transmis à un autre utilisateur via WebRTC

---

## Syntaxe de base

```js
const stream = await navigator.mediaDevices.getUserMedia(constraints);
```

La fonction prend un objet **constraints** qui définit ce que tu veux :

- `video: true` → accès à la caméra avec les paramètres par défaut
- `audio: true` → accès au microphone
- `video: false, audio: true` → micro uniquement

On peut aussi préciser des préférences comme la résolution souhaitée, la caméra à utiliser (avant/arrière sur mobile), etc.

---

## Conditions requises

Pour que `getUserMedia` fonctionne, deux conditions doivent être réunies :

1. **Contexte sécurisé** — L'application doit tourner en **HTTPS** ou sur **localhost**. En HTTP classique, l'API est bloquée par le navigateur pour des raisons de sécurité.

2. **Permission utilisateur** — Le navigateur affiche systématiquement une demande d'autorisation. L'utilisateur peut accepter, refuser, ou bloquer définitivement l'accès.

---

## Le MediaStream

Le résultat de `getUserMedia` est un objet `MediaStream`. Ce flux est composé de **tracks** (pistes) :

- Une **piste vidéo** si la caméra a été demandée
- Une **piste audio** si le micro a été demandé

Chaque piste peut être contrôlée individuellement : on peut la couper, l'arrêter, ou récupérer ses paramètres techniques.

Il est important d'**arrêter les pistes** quand on n'en a plus besoin, sinon le périphérique reste actif (la LED de la webcam reste allumée, par exemple).

---

## Cas d'usage courants

- **Prise de photo** dans une application web (comme un Instagram-like)
- **Visioconférence** en combinaison avec WebRTC
- **Enregistrement** audio ou vidéo directement dans le navigateur
- **Filtres en temps réel** en combinant le flux avec un canvas
- **QR code scanning** en analysant le flux vidéo image par image

---

## Gestion des erreurs

L'appel peut échouer pour plusieurs raisons :

- L'utilisateur **refuse** la permission
- Le périphérique demandé **n'existe pas** (pas de webcam, pas de micro)
- Le périphérique est déjà **utilisé** par une autre application
- Le contexte n'est **pas sécurisé** (pas de HTTPS)

Il est donc indispensable de toujours gérer le cas d'erreur, en affichant un message alternatif ou un fallback (comme un bouton d'upload d'image par exemple).

---

## Compatibilité

`getUserMedia` est supporté par tous les navigateurs modernes : Chrome, Firefox, Safari, Edge. Sur mobile, il fonctionne également sur les navigateurs Android et iOS, avec quelques différences de comportement selon les constructeurs.

---

## En résumé

| Concept | Description |
|---|---|
| **API** | `navigator.mediaDevices.getUserMedia()` |
| **Entrée** | Un objet de contraintes (vidéo, audio) |
| **Sortie** | Un `MediaStream` contenant des pistes |
| **Prérequis** | HTTPS ou localhost + permission utilisateur |
| **Nettoyage** | Toujours arrêter les tracks après usage |

`getUserMedia` est la porte d'entrée vers les périphériques multimédia du navigateur. C'est une API asynchrone, simple d'utilisation, mais qui nécessite de bien gérer les permissions et le cycle de vie du flux.
