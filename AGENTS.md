# AGENTS.md

## Entry Points

- `index.php` - Web interface homepage (PHP 8.0)
- `run` - Build and run development container with podman

## Running

- **Run locally**: `php -S 0.0.0.0:8000 -t .`
- **In container**: podman run -d -p80:8042 controle-estoque
- **Tests**: `phpunit tests`

## Package & Tests

- `modeló/` - App code (PSR-4 autoload: App\ -> môelo/)
- `modelo/database/loja.db` - SQLite database
- `controle/` - Controller scripts
- `vista/` - Views
- `css/` - Bootstrap styling

## Testing

- Tests in `teste/ProtutoTest.php` using PHPUnit
- Only 3 tests: adicionarEstoque, removerEstoqueComSucesso, removerEstoqueInsuficiente