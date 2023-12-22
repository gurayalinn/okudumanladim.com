#!/usr/bin/make -f

.PHONY: help

# Docker
IMAGE_NAME = php-apache

# All
all:
    $(MAKE) docker

prune:
		docker system prune -f --volumes

stop:
		docker stop $(IMAGE_NAME)

docker:
		docker-compose up

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




