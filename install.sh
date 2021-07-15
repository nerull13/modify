apt-get -yqq install git lsb-release
adduser nerull
sudo usermod -aG sudo nerull

sudo openssl req -x509 -nodes -newkey rsa:2048 -keyout /etc/ssl/private/vsftpdserverkey.pem -out /etc/ssl/certs/vsftpdcertificate.pem -days 365
echo "local_root=/home/$USER/torrents/rtorrent" >> /etc/vsftpd.conf
echo "user_sub_token=$USER" >> /etc/vsftpd.conf

sed -i -r "s/.*rsa_cert_file*/rsa_cert_file=/etc/ssl/certs/vsftpdcertificate.pem/g" /etc/vsftpd.conf
sed -i -r "s/.*rsa_private_key_file*/rsa_private_key_file=/etc/ssl/private/vsftpdserverkey.pem/g" /etc/vsftpd.conf

box install letsencrypt
box uninstall autodl

apt-get install postfix mutt
apt-get install mailutils


cp plugins.ini /srv/rutorrent/conf
cp access.ini /srv/rutorrent/conf
#cp authorized_keys /root/.ssh/

cp logo-light.png /srv/rutorrent/home/img
yes | cp -rf Logo/favicon/* /srv/rutorrent/home/img/favicon

cp custom.menu.php /srv/rutorrent/home/custom/
cp index.html /srv/rutorrent/

nano /srv/rutorrent/home/inc/config.php

sed -i -r 's/.*relayhost =*/relayhost = [smtp.gmail.com]:587/g' /etc/postfix/main.cf
sed -i -r "s/.*inet_protocols = all*/inet_protocols = ipv4/g" /etc/postfix/main.cf
echo smtp_sasl_auth_enable = yes >> /etc/postfix/main.cf
echo smtp_sasl_password_maps = hash:/etc/postfix/sasl_passwd >> /etc/postfix/main.cf
echo smtp_sasl_security_options = noanonymous >> /etc/postfix/main.cf
echo smtp_tls_CAfile = /etc/postfix/cacert.pem >> /etc/postfix/main.cf
echo smtp_use_tls = yes >> /etc/postfix/main.cf
read -p "Enter email Gmail before the @ : "  email
read -p "Enter email password: "  emailpass
echo [smtp.gmail.com]:587    $email@gmail.com:$emailpass >> /etc/postfix/sasl_passwd
sudo chmod 400 /etc/postfix/sasl_passwd
sudo postmap /etc/postfix/sasl_passwd
cat /etc/ssl/certs/thawte_Primary_Root_CA.pem | sudo tee -a /etc/postfix/cacert.pem
sudo /etc/init.d/postfix reload

nano /etc/passwd

