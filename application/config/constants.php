<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

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
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESCTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



/* Define error codes */
define('SITE_NAME', 'App Admin');
define('META_TITLE', 'Welcome');
define('ADMIN_EMAIL', 'admin@gmail.com');
define('REGARD_MESSAGE', '<br/><br/><br/>Regards,<br/>Site Admin');
define('SUCCESS', 100);
define('ERROR', 101);
define('MISSING_PARAM', 102);
define('LIKE_POSTING', 1);
define('DISLIKE_POSTING', 2);

/* Define Upload Paths */
define('USER_UPLOAD_PATH', 'uploads/users/');
 
/* Database Constants */
define('USER', 'users');
define('FUELPRICE', 'fuel_price');
define('FUELREQUEST', 'fuel_request');
define('MESSAGE', 'messages');
define('FEEDBACK', 'feedback');
define('VEHICLE', 'vehicle');
define('VEHICLEMODLE', 'vehicle_model');
define('VEHICLECOLOR', 'vehicle_color');
define('VEHICLELIST', 'vehiclelist');
define('COUPONS', 'coupons');
define('USERCARD', 'user_card');
/* Default Email Id for sending mail */
defined('DEF_MAIL')      OR define('DEF_MAIL', "info@espsofttech.com");
/** Payment Details **/
defined('STRIPE_SECRET_KEY')      OR define('STRIPE_SECRET_KEY', "sk_test_XFa2b9gYE8kXKbkRFeLx92Ac");
defined('STRIPE_PUBLISHABLE_KEY')      OR define('STRIPE_PUBLISHABLE_KEY', "pk_test_YYLFBKOY6mNhRKw1CCWMKSQe");
/* Push Notification Setting */
defined('PUSH_URL')      OR define('PUSH_URL', "https://fcm.googleapis.com/fcm/send");
defined('PUSH_API_KEY')      OR define('PUSH_API_KEY', "AIzaSyDcMlBPnB7e-Ehhpne7jYfo66PdZ0dDWis");
/* DRIVER AREA LIMIT */
defined('DRIVER_AREA_LIMIT')      OR define('DRIVER_AREA_LIMIT', 30);
defined('COMP_LABEL')      OR define('COMP_LABEL', "Esp Softtech");
defined('SUB_LABEL')      OR define('SUB_LABEL', "Esp Softtech");
defined('ORGANIZATION')      OR define('ORGANIZATION', "http://espsofttech.com/");
defined('ADMIN_EMAIL')      OR define('ADMIN_EMAIL', "info@espsofttech.com");
$token1  = '6ba88f1cd54a4e2e87ad3b7646655174';
$token = '2391f84fe7cc4de7be07b35a8a570dd6';
$token2 = '1a421415c1264d4d98faff5e741bf20d';
//defined('BITCOIN_TOKEN')      OR define('BITCOIN_TOKEN', $token);
defined('APITOKEN')      OR define('APITOKEN', $token);
defined('BITCOIN_TOKEN')      OR define('BITCOIN_TOKEN', $token);
defined('GMAPTOKEN')      OR define('GMAPTOKEN', 'AIzaSyCtRgmZ8kFNdBazyVXHS9z8Lz99hgB1xxk');
defined("ADDRESS_TRANSACTION")  OR define("ADDRESS_TRANSACTION","https://api.blockcypher.com/v1/btc/main/addrs/BTC_ADDRESS?token=".$token);
defined("TRANSACTION_HASH")  OR define("TRANSACTION_HASH","https://api.blockcypher.com/v1/btc/main/txs/TX_HASH?token=".$token);
defined("TRANSACTION_ADDRESS")  OR define("TRANSACTION_ADDRESS","https://api.blockcypher.com/v1/");
defined("userrole")  OR define("userrole",2);
/*defined("ADMIN_BTC_ADDRESS")  OR define("ADMIN_BTC_ADDRESS","1KzPH2WbBKdU6CkfJkoFpU6izLKZ65FhVq");
defined("ADMIN_LTC_ADDRESS")  OR define("ADMIN_LTC_ADDRESS","LXbkh9omwYNLuVT7UJbdthNDH1mHK97auL");
defined("ADMIN_ETH_ADDRESS")  OR define("ADMIN_ETH_ADDRESS","fdc457a649af67f96c9807436150dab4a3d9fb73");*/

defined("ADMIN_BTC_ADDRESS")  OR define("ADMIN_BTC_ADDRESS","n1ucSDLByN5GLLQuE7BMrtTWHwHtkaVkfA");
/*{
"private": "86751cb880a9a1addcc3b67979976158dd800afe9d14b68349921299b20c94dd",
"public": "03866586fbe3652eb219c5ed99c3fc72d125472248183f966e0673be08a1c543de",
"address": "n1ucSDLByN5GLLQuE7BMrtTWHwHtkaVkfA",
"wif": "cS64ygfjWjN73S78oUbJQeikDn9uS7KNWS1PL7NqeBUuF4UobnAy"
}*/

defined("ADMIN_LTC_ADDRESS")  OR define("ADMIN_LTC_ADDRESS","LVvdd9cV1HRAvakoeEDMb3VhvqUWB4dYKC");
defined("ADMIN_ERC_ADDRESS")  OR define("ADMIN_ERC_ADDRESS","0x1f0CDd8764443c66A9C80642976EDcaDD35E6dA7");
defined("ADMIN_ETH_ADDRESS")  OR define("ADMIN_ETH_ADDRESS","0xfebd2724281936c76b984315d5b469b19b707754");
defined("UNSPENT")  OR define("UNSPENT","https://blockchain.info/unspent?active=BTC_ADDRESS&token=".$token);
/*  Socket Settings  */
defined('SOCKET_URL')      OR define('SOCKET_URL',"http://13.127.88.155:5556");
//defined('SOCKET_URL')      OR define('SOCKET_URL',"http://18.221.8.119:5556");
// defined('SOCKET_URL')      OR define('SOCKET_URL',"localhost:5555");
//defined('SERVER_URL')      OR define('SERVER_URL',"http://18.221.8.119:5556/");
defined('SERVER_URL')      OR define('SERVER_URL',"http://13.127.88.155:5556/");
// defined('SERVER_URL')      OR define('SERVER_URL',"http://localhost:5555/");