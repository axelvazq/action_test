<?php
	$php7 = 1;
	$ssl = 1;
	$test = 0;
	$no_sentry = 0;
	$entorno = "<ENVIRONMENT_NAME>";
	$base_url = "<BASE_URL>";
	$guardia_cb_url = "<GUARDIA_CALLBACK_URL>";
	$portal_url = "<PORTAL_URL>";
	$api_url = "<API_URL>";
	$api_email_username = "<API_EMAIL_USERNAME>";
	$api_email_password = "<API_EMAIL_PASSWORD>";

	$socialbot_url = "<SOCIAL_BOT_URL>";
	
	// MYSQL Variables
	$mysql_database = "<MYSQL_DATABASE>";
	$mysql_host = "<MYSQL_HOST>";
	$mysql_username = "<MYSQL_USERNAME>";
	$mysql_password = "<MYSQL_PASSWORD>";

	// Mongo Variables
	$mongo_username = "<MONGO_USERNAME>";
	$mongo_password = "<MONGO_PASSWORD>";
	$mongo_host = "<MONGO_HOST>";
	$mongo_db = "<MONGO_DATABASE>";
	
	$sentry_dsn = "<SENTRY_DSN>";
	// DIGITAL OCEAN VARIABLES
	$do_key = "<DO_KEY>";
	$do_secret = "<DO_SECRET>";
	$do_space_name = "<DO_NAMESPACE>";
	$do_region = "<DO_REGION>";	
	$do_app_root = "<DO_APP_ROOT>";

	// MAIL SERVER VARIABLES
	$mailserver["host"] = "<MAIL_SERVER_HOST>";
	$mailserver["username"] = "<MAIL_SERVER_USERNAME>";
	$mailserver["password"] = "<MAIL_SERVER_PASSWORD>";
	$gmapsKey = "<GOOGLE_MAPS_APIKEY>";
	// donde esta instalado el server
	$path = "<SERVER_PATH>";

	$url = $base_url;
	$url_www = $guardia_cb_url;
	$url_externa = $base_url;
	$url_externa_http = $base_url;
	$url_portal = $portal_url;
		
	$app_activa = 1;
	$app_url = $base_url;

	$app_api_url = $api_url;
	$app_api_email = $api_email_username;
	$app_api_password = $api_email_password;
	
	# bot de seguridad social
	$bot_endpoint = $socialbot_url;

	$bbdd_wo = $mysql_database;

	$mongodb_server = "mongodb://$mongo_username:$mongo_password@$mongo_host:27017/$mongo_db";

	// @deprecated
	$sqlserver_pwd = "xxx";

	$mysql[0]["ip"] = $mysql_host;
	$mysql[0]["usuario"] = $mysql_username;
	$mysql[0]["password"] = $mysql_password;
	$mysql[0]["bbdd"] = $mysql_database;
	$mysql[0]["port"] = 3306;

	// "app-s3-prod" ?
	$do_app_space_name = $do_space_name;
	$do_app_region = $do_region;
	// "workout_app_pre"

	// @deprecated
	$mapbox_key = 'xxx';
	
	$mailserver["port"] = 587;
		
	$ws_port = 50001;
	$ws_listen = 50002;
		
function conectar_bbdd() {
	
	global $servidor; 
	
	$id = $GLOBALS["test"];
	
	$servidor = $GLOBALS["mysql"];
	
	
	$id_conexion = mysql_connect($servidor[$id]["ip"],$servidor[$id]["usuario"], $servidor[$id]["password"]);

	if ($id_conexion == 0) {
		die("Ha habido un error conectando con la base de datos\n");
	}

	mysql_select_db ($servidor[$id]["bbdd"]) or die("No pudo seleccionarse la BB.DD\n");
    
    return $id_conexion;  
}


?>