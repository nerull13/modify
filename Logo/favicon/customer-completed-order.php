<?php

/**

 * Customer completed order email

 *

 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.

 *

 * HOWEVER, on occasion WooCommerce will need to update template files and you

 * (the theme developer) will need to copy the new files to your theme to

 * maintain compatibility. We try to do this as little as possible, but it does

 * happen. When this occurs the version of the template file will be bumped and

 * the readme will list any important changes.

 *

 * @see https://docs.woocommerce.com/document/template-structure/

 * @package WooCommerce/Templates/Emails

 * @version 3.5.0

 */



if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



/*

 * @hooked WC_Emails::email_header() Output the email header

 */

do_action( 'woocommerce_email_header', $email_heading, $email ); ?>


<?php
////////////////////////////////////////////////GENERATION DE NOM DUTILISATEUR ET MDP
	
function generate_password( $length = 8 ) {
$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
$password = substr( str_shuffle( $chars ), 0, $length );
return $password;
}
function generate_seedurl( $length = 3 ) {
$chars = "023456789";
$seedurl = substr( str_shuffle( $chars ), 0, $length );
return $seedurl;
}
$password = generate_password(6);
$password2 = generate_password(2);
$seedurl = generate_seedurl();
	
//////////////////////////////////////////////// Choix de l'URL en fct de la taille de seedbox choisie 
	
$quickbox1 = 'seedboxquick.secretseed.net';
$quickbox2 = 'myseedbox.secretseed.net';

if( strpos( $item_name, 'MINI' ) !== false )
	{
	$quickboxurl = $quickbox1;
}
else
{
	$quickboxurl = $quickbox2;
}

$email = $payer_email;

 //////////////////////////////////////////////// EMAIL POUR LE PACK
	
$message_pack = "$first_name  $last_name ,
<p>Nous tenons à vous remercier pour votre commande :</p>
<p>Commande : $item_name</p>
<p>Votre compte chez SecretSeed est en cours de création, si vous désirez choisir vos identifiants, répondez à ce mail rapidement afin de nous les communiquer au plus vite, à défaut ces derniers seront :<br>
</p>
<p>Identifiant : $first_name$password2  ( SANS MAJUSCULES )<br>
  Mot de passe : $password</p>
<p>Ayant opté pour le pack VPN + SEEDBOX + CLOUD, je vais vous détailler vos accès :</p>
<p><strong>Pour la Seedbox :</strong><br>
  Votre interface RuTorrent : <a href='https://$quickboxurl/rutorrent/'>https://$quickboxurl/rutorrent/</a><br>
  Votre dashboard : <a href='https://$quickboxurl/'>https://$quickboxurl/</a></p>
<p>Depuis le dashboard, vous avez la possibilité de suivre votre espace disponible, effectuer un reboot de votre seedbox, accéder à YGG torrent, accéder à votre cloud privé et gérer vos fichiers.</p>
<p><strong>Pour votre Cloud :</strong><br>
  Votre interface : <a href='https://$quickboxurl/nextcloud/'>https://$quickboxurl/nextcloud/      </a>  </p>
<p>Vous pouvez y accéder également depuis le dashboard. </p>
<p>Afin de synchroniser avec votre PC/MAC : <a href='https://nextcloud.com/install/#install-clients'>https://nextcloud.com/install/#install-clients</a> ,  votre adresse à renseigner sera $quickboxurl/nextcloud/ </a>  avec vos identifiants.</p>
<p><strong>---------------------------------<br>
  Pour utiliser votre SeedBox<br>
  ---------------------------------</strong></p>
<p>L'utilisation du VPN n'est pas nécessaire lorsque vous utilisez la seedbox</p>
<p>- connectez vous à votre interface :<br>
  <a href='https://$quickboxurl'>https://$quickboxurl/</a></p>
<p>- Entrez votre identifiant et mot de passe , puis sélectionner RuTorrent dans le menu</p>
<p>- Il vous suffit grace au menu de rTorrent d'ajouter vos fichiers  .torrent pour que la Seedbox les télécharge !<br>
  <br>
  - icone d'un dossier en haut à gauche<br>
  - fichier torrent &gt; parcourir &gt; selectionner le .torrent &gt; ajouter</p>
<p>NOUS VOUS CONSEILLONS DE DESINSTALLER TOUS VOS LOGICIELS DE TORRENTS AFIN DE NE PAS TELECHARGER DIRECTEMENT PAR ERREUR ET AINSI EXPOSER VOTRE IP.</p>
<p><strong>--------------------------------------------------------------<br>
  Pour récupérer les fichiers téléchargés par la SeedBox via FTP<br>
  --------------------------------------------------------------</strong></p>
<p>- Pour récupérer les fichiers , il faut utiliser FileZilla :</p>
<p>1.Télécharger le logiciel Filezila : http://www.clubic.com/telecharger-fiche11141-filezilla.html</p>
<p>2.Installez le</p>
<p>3.Pour le configurer, dans le logiciel : Fichier &gt; gestionnaire de sites &gt; nouveau site et configurez avec l'IP du serveur et vos identifiants :</p>
<p>Hôte : $quickboxurl<br>
  Port : 21 <br>
  Type d'authentification : Normale<br>
  Identifiant : $first_name$password2  ( SANS MAJUSCULES )<br>
  Mot de passe : $password</p>
<p>plus de détails ici : <a href='http://www.secretseed.net/seed.pdf'>http://www.secretseed.net/seed.pdf</a></p>
<p>Pour bénéficier du débit maximum de votre connexion lors de rapatriement des fichiers de la seedbox vers votre PC, vous pouvez déconnecter le VPN sans risque, les données sont déja cryptées.</p>
<p><strong>-----------------------------------<br />
  Pour Configurer votre VPN Classic<br />
  ------------------------------------</strong></p>
<p>Pour windows : commencez par installer OpenVPN (Installer, Windows Vista and later ) si ce n'est déja fait :<strong> <a href='https://openvpn.net/index.php/open-source/downloads.html'>https://openvpn.net/index.php/open-source/downloads.html</a></strong></p>
<p>Pour Mac : téléchargez la version Stable de Tunnelblick : <a href='https://tunnelblick.net/downloads.html'>https://tunnelblick.net/downloads.html</a></p>
<p>Le fichier de configuration vous sera adressé dans un prochain email ainsi que les étapes détaillées d'installation.</p>
<p>Le VPN compris dans le pack permet de surfer anonymement , pour les telechargement preferez la seedbox.  Si vous désirez un VPN rapide, contactez nous par email afin de convenir d'un pack avec le VPN DONWLOAD.</p>
<p>&nbsp;</p>
<p>Nous restons à votre disposition entière via Skype,email et TeamViewer afin de vous aider à configurer votre accès.<br>
</p>
<p>-------------</p>
<p><strong>John Anderson</strong><br>
  <a href='http://www.SecretSeed.net' target='_blank'>www.SecretSeed.net</a> <br>
  <em>Service personnalisé de VPN et seedbox anonymes </em> </p>
";

?>
<p>

<?php esc_html_e( 'Thanks for shopping with us.', 'woocommerce' ); ?>

</p>

<?php



/*

 * @hooked WC_Emails::email_footer() Output the email footer

 */

do_action( 'woocommerce_email_footer', $email );

