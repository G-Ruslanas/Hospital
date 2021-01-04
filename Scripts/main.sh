#!/bin/sh
apt-get update
apt-get upgrade
apt-get install wget -y
wget https://raw.githubusercontent.com/G-Ruslanas/Hospital/main/Scripts/ansibleserver.sh
wget https://raw.githubusercontent.com/G-Ruslanas/Hospital/main/Scripts/clientserver.sh
wget https://raw.githubusercontent.com/G-Ruslanas/Hospital/main/Scripts/dbserver.sh
wget https://raw.githubusercontent.com/G-Ruslanas/Hospital/main/Scripts/webserver.sh
exit 0