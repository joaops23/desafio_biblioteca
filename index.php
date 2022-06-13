<?php 
namespace App;

require_once("vendor/autoload.php");
require_once("config/config.php");   
require_once("Models/Models.php");

//instancia e uso do slim
require_once("route/router.php");

// Instanciando o Models
use Models;
use  Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;




?> 