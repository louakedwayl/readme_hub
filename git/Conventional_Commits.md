# Conventional Commits

## What It Is

A specification that adds structure to commit messages. It gives a shared vocabulary across teams and enables automated tooling (changelogs, versioning, CI triggers).

Format:

```
<type>(<scope>): <description>

[optional body]

[optional footer(s)]
```

---

## The Three Required Parts

| Part | Role | Example |
|------|------|---------|
| **type** | Category of change | `feat`, `fix`, `docs` |
| **scope** | What area is affected (optional but recommended) | `auth`, `api`, `ui` |
| **description** | Short imperative summary | `add JWT refresh logic` |

A valid minimal commit:

```
feat: add login endpoint
```

A scoped commit:

```
fix(auth): prevent token expiry race condition
```

---

## Common Types

| Type | When to use |
|------|-------------|
| `feat` | New feature for the user |
| `fix` | Bug fix |
| `docs` | Documentation only |
| `style` | Formatting, semicolons, whitespace — no logic change |
| `refactor` | Code restructure — no feature added, no bug fixed |
| `test` | Adding or updating tests |
| `chore` | Build config, dependencies, tooling — no production code change |
| `perf` | Performance improvement |
| `ci` | CI/CD pipeline changes |
| `build` | Build system or external dependency changes |
| `revert` | Reverts a previous commit |

---

## Breaking Changes

Two ways to signal a breaking change:

**1. With `!` after the type/scope:**

```
feat(api)!: change authentication response format
```

**2. With a `BREAKING CHANGE:` footer:**

```
feat(api): change authentication response format

BREAKING CHANGE: the /auth endpoint now returns a nested token object instead of a flat string.
```

Both are valid. The `!` draws immediate attention in git log; the footer provides detail.

---

## Body & Footer

The **body** gives context when the description alone isn't enough. Separated from the description by a blank line.

```
fix(db): handle connection pool exhaustion

Under heavy load, the pool wasn't releasing idle connections.
Added a 30s timeout to force cleanup.
```

The **footer** is for metadata — issue references, breaking change notes, co-authors.

```
feat(search): implement full-text search

Closes #142
Reviewed-by: Z
```

---

## How It Links to Semantic Versioning

Conventional Commits maps directly to [SemVer](https://semver.org):

| Commit type | Version bump | Example |
|-------------|-------------|---------|
| `fix` | PATCH | `1.0.0` → `1.0.1` |
| `feat` | MINOR | `1.0.0` → `1.1.0` |
| `BREAKING CHANGE` or `!` | MAJOR | `1.0.0` → `2.0.0` |

Tools like `semantic-release` or `standard-version` read your commits and bump versions automatically.

---

## Rules to Follow

1. **Imperative mood** in the description — `add`, `fix`, `remove`, not `added`, `fixes`, `removed`.
2. **Lowercase** type and description. No capital letter, no period at the end.
3. **Max ~72 characters** for the description line.
4. One logical change per commit. Don't bundle unrelated changes.
5. The scope should be a noun — the module, component, or layer affected.

---

## Bad vs Good

```
# Bad
git commit -m "stuff"
git commit -m "Fixed things and added new feature"
git commit -m "WIP"
git commit -m "update"

# Good
git commit -m "fix(parser): handle empty input without crash"
git commit -m "feat(ui): add dark mode toggle"
git commit -m "docs: update API usage examples"
git commit -m "refactor(auth): extract token validation to middleware"
```

---

## Enforcement Tools

| Tool | Purpose |
|------|---------|
| **commitlint** | Lints commit messages against the convention |
| **husky** | Git hooks — runs commitlint on `commit-msg` hook |
| **commitizen** | Interactive CLI that walks you through writing a valid commit |
| **semantic-release** | Automates versioning and changelog from commits |

Minimal setup with `husky` + `commitlint`:

```bash
npm install --save-dev @commitlint/{config-conventional,cli} husky

# commitlint.config.js
echo "module.exports = { extends: ['@commitlint/config-conventional'] };" > commitlint.config.js

# husky hook
npx husky init
echo "npx --no -- commitlint --edit \$1" > .husky/commit-msg
```

Every commit that doesn't follow the convention gets rejected.

---

## TL;DR

Structure your commits as `type(scope): description`. Use `feat` for features, `fix` for bugs. Signal breaking changes with `!` or `BREAKING CHANGE:` footer. This enables automated versioning, clean changelogs, and readable git history. Enforce it with `commitlint` + `husky`.
