<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
|--------------------------------------------------------------------------
|  Own constants
|  @author: fngondji
|--------------------------------------------------------------------------
|
|  Constantes personalisées pour l'application medissys
|
*/

define('AUTHENTIFICATION_ERROR','Login et/ou mot de passe incorrect');
define('INITIALIZE_NUMERO_DOSSIER',1000);
define('LENGTH_MIN',8);
define('LENGTH_MAX',8);
define('DIR_NOT_FOUND','Le dossier n\'existe pas');
define('TITLE_MODIF_DIR','MODIFIER DOSSIER PATIENT');
define('TITLE_CONSULT_DIR','CONSULTER DOSSIER PATIENT');
define('TITLE_USER_FOUND','CONTACT ...');
define('TITLE_FIND_USER','RECHERCHER UN CONTACT');
define('TITLE_LIST_CONTACT','ANNUAIRE DES CONTACTS');
define('TITLE_FIND_DIR_CONSULT', 'OUVRIR DOSSIER');
define('TITLE_NEW_CONSULT','NOUVELLE CONSULTATION');

/* End of file constants.php */
/* Location: ./application/config/constants.php */