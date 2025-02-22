# Laravel Base Project Setup

## Setup Steps

1. Environment setup
```bash
cp .env.example .env
```

2. Start Docker containers
```bash
make up
```

3. Run database migrations
```bash
make migrate-refresh
```

## Available Commands

| Command | Description |
|---------|-------------|
| `make up` | Start containers |
| `make down` | Stop containers |
| `make routes` | List all routes |
| `make migrate-refresh` | Reset & run migrations |
| `make ide-helpers` | Generate IDE helper files |
