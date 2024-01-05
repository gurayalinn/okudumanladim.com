#!/usr/bin/make -f

.PHONY: all

# Docker
IMAGE_NAME = php-apache

all:
		$(MAKE) down \
		$(MAKE) stop \
		$(MAKE) cprune \
		$(MAKE) nprune \
		$(MAKE) vprune \
		$(MAKE) bprune

stop:
		docker ps -q | awk '{print $1}' | xargs -o docker stop

down:
		docker-compose down -v --remove-orphans --rmi local --timeout 0

up:
		docker-compose up -V --build --force-recreate --remove-orphans --quiet-pull --abort-on-container-exit --exit-code-from $(IMAGE_NAME)

cprune:
		docker container prune -f

nprune:
		docker network prune -f

bprune:
		docker builder prune -af

vprune:
		docker system prune -f --volumes


# Git
git:
		git add .
		git commit -m "update"
		git push origin master


# Help
help:
		@echo "make all: build and run"
		@echo "make prune: remove all unused docker images"
		@echo "make stop: stop docker image"
		@echo "make docker: docker-compose up"
		@echo "make git: git add, commit and push"
		@echo "make help: show this message"




