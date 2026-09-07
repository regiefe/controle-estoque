# AGENTS.md

## Entry Points

- `index.php` - Web interface homepage (PHP 8.0)
- `run` - Build and run development container with podman

## Running

- **Run locally**: `php -S 0.0.0.0:8000 -t .`
- **In container**: `podman run -d -p80:8042 m-controle-estoque`
- **Tests**: `phpunit teste`

## Package & Tests

- `modelo/` - App code (PSR-4 autoload: `App\` -> `modelo/`)
- `modelo/database/loja.db` - SQLite database (gitignored; seed via `sqlite3 modelo/database/loja.db < modelo/database/loja.sql`)
- `controle/` - Controller scripts
- `vista/` - Views
- `css/` - Bootstrap styling

## Testing

- Tests in `teste/ProdutoTest.php` using PHPUnit
- Only 3 tests: `adicionarEstoque`, `removerEstoqueComSucesso`, `removerEstoqueInsuficiente`
- Tests cover only the `Produto` domain class (in-memory, no database)

## Conventions

- All code, variable names, method names, file names, and UI text are in **Brazilian Portuguese**
- MVC directories: `modelo/` (model), `controle/` (controller), `vista/` (view)
- No linter, formatter, or static analysis configured
- No CI/CD pipeline
- Database is SQLite3 via PDO (not MySQL)
- Bootstrap 3.3.7 vendored locally (no CSS build step)
- The `compose.json` PSR-4 autoload (`App\`) does not match actual code (classes use global namespace); tests use `require_once` directly
