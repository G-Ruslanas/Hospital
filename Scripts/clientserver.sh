#!/bin/sh
apt-get update
apt-get install -y
apt-get install gnupg gnupg2 gnupg1 -y
wget -q -O- https://downloads.opennebula.org/repo/repo.key | sudo apt-key add -
echo "deb https://downloads.opennebula.org/repo/5.6/Ubuntu/18.04 stable opennebula" | sudo tee /etc/apt/sources.list.d/opennebula.list
apt update
apt-get install opennebula-tools
apt-get dist-upgrade -y
CUSER=ruga6338
TEMPLATE=debian10-lxde
echo "Please enter password for ruga6338: "
stty -echo
read CPASS
stty echo
CENDPOINT=https://grid5.mif.vu.lt/cloud3/RPC2
CVMREZ=$(onetemplate instantiate $TEMPLATE --user $CUSER --password $CPASS --name db-vm --endpoint $CENDPOINT)
CVMID=$(echo $CVMREZ |cut -d ' ' -f 3)
echo $CVMID
echo "Waiting for VM to RUN 20sec."
sleep 20
$(onevm show $CVMID --user $CUSER --password $CPASS --endpoint $CENDPOINT > $DIRECTORY/$CVMID.txt)
CSSH_CON=$(cat $DIRECTORY/$CVMID.txt | grep CONNECT\_INFO1| cut -d '=' -f 2 | tr -d '"'|sed 's/'$CUSER'/root/')
CSSH_PRIP=$(cat $DIRECTORY/$CVMID.txt | grep PRIVATE\_IP| cut -d '=' -f 2 | tr -d '"')
echo "Connection string: $CSSH_CON"
echo "Local IP: $CSSH_PRIP"
eval "$(ssh-agent -s)"
ssh-add
#echo "Will delete VM $CVMID"
#$(onevm delete $CVMID --user $CUSER --password $CPASS --endpoint $CENDPOINT )
exit 0
