apt-get -yqq install git lsb-release
adduser nerull
sudo usermod -aG sudo nerull

sudo openssl req -x509 -nodes -newkey rsa:2048 -keyout /etc/ssl/private/vsftpdserverkey.pem -out /etc/ssl/certs/vsftpdcertificate.pem -days 365
echo "local_root=/home/$USER/torrents/rtorrent" >> /etc/vsftpd.conf
echo "user_sub_token=$USER" >> /etc/vsftpd.conf

sed -i -r "s/.*rsa_cert_file*/rsa_cert_file=/etc/ssl/certs/vsftpdcertificate.pem/g" /etc/vsftpd.conf
sed -i -r "s/.*rsa_private_key_file*/rsa_private_key_file=/etc/ssl/private/vsftpdserverkey.pem/g" /etc/vsftpd.conf

box install letsencrypt

cp plugins.ini /srv/rutorrent/conf
cp access.ini /srv/rutorrent/conf

cp logo-light.png /srv/rutorrent/home/img

cp custom.menu.php /srv/rutorrent/home/custom/
cp index.html /srv/rutorrent/
