.DEFAULT_GOAL := help
DOCKER_RUN_ONCE=docker-compose run --rm -w /www php
DOCKER_RUN_ONCE_MAC_WITH_SSH_AGENT=docker-compose run --rm -v /run/host-services/ssh-auth.sock:/tmp/ssh-agent -e SSH_AUTH_SOCK=/tmp/ssh-agent -w /www php
DOCKER_RUN_ONCE_LINUX_WITH_SSH_AGENT=docker-compose run --rm -v /etc/passwd:/etc/passwd:ro -v /etc/group:/etc/group:ro -v ${SSH_AUTH_SOCK}:/tmp/ssh-agent -e SSH_AUTH_SOCK=/tmp/ssh-agent -w /www php

.PHONY: vendor composer-update
ifeq ($(shell uname -s), Darwin)
vendor: ## install composer dependencies for macos
	$(DOCKER_RUN_ONCE_MAC_WITH_SSH_AGENT) composer install -n
composer-update:  ## update composer dependencies for macos
	$(DOCKER_RUN_ONCE_MAC_WITH_SSH_AGENT) composer update
else
vendor: ## install composer dependencies for linux
	$(DOCKER_RUN_ONCE_LINUX_WITH_SSH_AGENT) composer install -n
composer-update: ## update composer dependencies for linux
	$(DOCKER_RUN_ONCE_LINUX_WITH_SSH_AGENT) composer update
endif

cs-fixer:
	${DOCKER_RUN_ONCE} vendor/bin/php-cs-fixer fix src
