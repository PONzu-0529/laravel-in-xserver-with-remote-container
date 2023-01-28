#!/bin/sh

# Setup Appache rewrite_module
sudo a2enmod rewrite

# Setup DocumentRoot
sudo chmod 777 -R /home/${XSERVER_ID}/${XSERVER_DOMAIN}/public_html

# Setup Link
ln -s /home/${XSERVER_ID}/${XSERVER_DOMAIN}/repos/dist /home/${XSERVER_ID}/${XSERVER_DOMAIN}/public_html/${XSERVER_SUBDOMAIN}

# Change Permittion
sudo chmod -R 777 storage/*
sudo chmod -R 777 bootstrap/cache

# Change Owner
sudo chown -R 1000 /home/${XSERVER_ID}/${XSERVER_DOMAIN}/repos/vendor
sudo chown -R 1000 /home/${XSERVER_ID}/${XSERVER_DOMAIN}/repos/node_modules
