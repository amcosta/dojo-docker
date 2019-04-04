#!/bin/bash

composer install
php bin/console server:run 0.0.0.0:80
