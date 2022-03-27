#!/bin/
git clone https://github.com/laradock/laradock.git
cp .docker.env laradock/.env
make start
bash init.sh
