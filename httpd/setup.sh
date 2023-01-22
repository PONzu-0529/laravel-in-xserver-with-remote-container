#!/bin/sh

# Setup Appache rewrite_module
sudo a2enmod rewrite

# Setup DocumentRoot
sudo chmod 777 -R /home/${XSERVER_ID}/${XSERVER_DOMAIN}/public_html

# Setup Link
ln -s /home/${XSERVER_ID}/${XSERVER_DOMAIN}/repos/public /home/${XSERVER_ID}/${XSERVER_DOMAIN}/public_html/${XSERVER_SUBDOMAIN}
