# La fonction `http_response_code()` en PHP

La fonction `http_response_code()` en PHP permet de **récupérer ou définir le code de réponse HTTP** envoyé au navigateur. Ces codes sont utilisés pour indiquer le statut d’une requête HTTP (succès, redirection, erreur, etc.).

---

## 1. Syntaxe

```php
http_response_code(): int
http_response_code(int $code): int
```

* **Sans paramètre** : renvoie le code de réponse actuel.
* **Avec un paramètre `$code`** : définit le code de réponse HTTP et renvoie le code précédent.

---

## 2. Codes de réponse HTTP courants

| Code | Signification         | Exemple d’utilisation  |
| ---- | --------------------- | ---------------------- |
| 200  | OK                    | La requête a réussi    |
| 301  | Moved Permanently     | Redirection permanente |
| 302  | Found                 | Redirection temporaire |
| 400  | Bad Request           | Requête invalide       |
| 401  | Unauthorized          | Non autorisé           |
| 403  | Forbidden             | Accès refusé           |
| 404  | Not Found             | Page non trouvée       |
| 500  | Internal Server Error | Erreur serveur         |

> Pour voir la liste complète des codes HTTP, consulte la documentation officielle ou les standards RFC.

---

## 3. Exemples d’utilisation

### a) Définir un code HTTP

```php
<?php
http_response_code(404);
echo "Page non trouvée";
?>
```

> Ici, le navigateur reçoit un code HTTP `404` et affiche le message.

---

### b) Récupérer le code HTTP actuel

```php
<?php
$code = http_response_code();
echo "Le code HTTP actuel est : $code";
?>
```

---

### c) Redirection avec code personnalisé

```php
<?php
http_response_code(301); // redirection permanente
header("Location: https://example.com");
exit;
?>
```

> Note : bien que `header("Location: ...")` définisse souvent un code de redirection automatiquement, tu peux forcer un code spécifique avec `http_response_code()`.

---

## 4. Points importants

1. **À utiliser avant tout output** pour que le code soit correctement envoyé.
2. Peut être combinée avec `header()` pour gérer les redirections ou les erreurs.
3. Retourne le code HTTP précédent si tu définis un nouveau code.

---

## 5. Conclusion

`http_response_code()` est un outil simple mais puissant pour contrôler le **statut HTTP** d’une page. Elle permet d’informer le navigateur ou les clients HTTP du succès, d’une erreur ou d’une redirection, et fonctionne bien en combinaison avec `header()` pour une gestion complète des réponses.
