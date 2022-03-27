start:
	cd laradock && docker-compose up -d nginx mysql workspace redis
stop:
	cd laradock && docker-compose down
cmd:
	cd laradock && docker-compose exec --user=laradock workspace bash
mysql:
	cd laradock && docker-compose exec mysql bash
fpm:
	cd laradock && docker-compose exec php-fpm bash
restart:
	make stop
	make start
	make cmd
rebuild:
	make stop
	cd laradock && docker-compose up --build -d nginx mysql workspace
stc:
	make start
	make cmd
install:
	make start
	init.sh


