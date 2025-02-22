.PHONY: up down routes migrate-refresh ide-models ide-generate ide-helpers

# Sailコンテナの起動
up:
	./vendor/bin/sail up -d

# Sailコンテナの停止
down:
	./vendor/bin/sail down

# ルート一覧の表示
routes:
	./vendor/bin/sail artisan route:list

# マイグレーションのリフレッシュ（全テーブルを再作成）
migrate-refresh:
	./vendor/bin/sail artisan migrate:refresh

# IDE Helper: モデルの補完生成
ide-models:
	./vendor/bin/sail artisan ide-helper:models -RW

# IDE Helper: 基本的な補完生成
ide-generate:
	./vendor/bin/sail artisan ide-helper:generate

# 全てのIDE Helper補完を生成
ide-helpers: ide-generate ide-models
