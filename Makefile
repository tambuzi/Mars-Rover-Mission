# Nombre de tu proyecto (solo para logs)

# Servicio por defecto para entrar (cámbialo si prefieres otro)
DEFAULT_SERVICE=mars-rover

# ------------------------
# Comandos de Docker
# ------------------------

install: build


up:
	docker compose up

down:
	docker compose down

build:
	@if [ "$(FORCE)" ]; then \
			docker rmi mars-rover:latest --force; \
			docker compose build --no-cache; \
		else \
			docker compose build; \
		fi
	@docker compose up --remove-orphans
	@docker compose exec ${DEFAULT_SERVICE} php -d memory_limit=-1 /usr/local/bin/composer install
	@printf "PROJECT RUNNING"

restart:
	docker compose down
	docker compose up -d

logs:
	docker compose logs -f

ps:
	docker compose ps

# ------------------------
# Entrar a un contenedor
# ------------------------

# make sh SERVICE=php-fpm
shell:
	@docker compose exec ${DEFAULT_SERVICE} bash

# Para entrar con bash si el contenedor lo soporta
bash:
	@if [ -z "$(SERVICE)" ]; then \
		echo "Usando servicio por defecto: $(DEFAULT_SERVICE)"; \
		docker compose exec $(DEFAULT_SERVICE) bash || docker compose exec $(DEFAULT_SERVICE) sh; \
	else \
		echo "Entrando en contenedor: $(SERVICE)"; \
		docker compose exec $(SERVICE) bash || docker compose exec $(SERVICE) sh; \
	fi

# ------------------------
# Helpers
# ------------------------

# Ejecutar comandos en un servicio:
# Ej: make run SERVICE=php-fpm CMD="php -v"
run:
	@if [ -z "$(SERVICE)" ]; then \
		echo "ERROR: Debes especificar SERVICE=<servicio>"; exit 1; \
	fi
	@if [ -z "$(CMD)" ]; then \
		echo "ERROR: Debes especificar CMD=\"comando\""; exit 1; \
	fi
	docker compose exec $(SERVICE) sh -c "$(CMD)"
