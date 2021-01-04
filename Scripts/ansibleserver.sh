#!/bin/sh
apt-get update
apt-get upgrade
apt-get install ansible -y
apt-get install wget -y
wget https://raw.githubusercontent.com/G-Ruslanas/Hospital/main/Playbooks/client-vm.yml
wget https://raw.githubusercontent.com/G-Ruslanas/Hospital/main/Playbooks/db-vm.yml
wget https://raw.githubusercontent.com/G-Ruslanas/Hospital/main/Playbooks/webserver-vm.yml
wget https://raw.githubusercontent.com/G-Ruslanas/Hospital/main/hosts
cp /etc/ansible/ansible.cfg ~/.ansible.cfg
mkdir my_ansible
touch my_ansible/hosts
mv hosts my_ansible/hosts
sed -i 's|/etc/ansible/hosts|/root/my_ansible/hosts|g' ~/.ansible.cfg
exit 0