<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Por Miguel Salas
 * Extiende el helper Date de CodeIgniter
 * @autor Miguel Salas
 *        miguelsalasmx@gmail.com<br>
 *        http://www.tuscodes.com
 * @fecha 19 de Septiembre de 2011. Mexico DF
 * 
 */

//Cuenta los dias entre 2 fechas dadas
if (! function_exists('count_days')){               
    function count_days($date1,$date2){
        $time1=mktime(0,0,0,getMonth($date1,true),getDay($date1,true),getYear($date1,true));
        $time2=mktime(0,0,0,getMonth($date2,true),getDay($date2,true),getYear($date2,true));

        if($time1>=$time2)
            return 0;
        $time=$time2-$time1;
        $time=$time/(60*60*24);
        return floor($time);
    }
}

//Regresa el dia de una fecha en formato YYYY-MM-DD
function getDay($date,$numeric=false){
    return $numeric?intval(substr($date, -2)):substr($date, -2);
}

//Regresa el mes de una fecha en formato YYYY-MM-DD
function getMonth($date,$numeric=false){
    return $numeric?intval(substr($date, 5, 2)):substr($date, 5, 2);
}

//Regresa el nombre del mes de una fecha en formato YYYY-MM-DD
function getMes($date,$numeric=false){
    $mes=$numeric?intval(substr($date, 5, 2)):substr($date, 5, 2);
    switch($mes){
        case "01": $mx="Enero"; break; 
        case "02": $mx="Febrero";break;
        case "03": $mx="Marzo";break;
        case "04": $mx="Abril";break;
        case "05": $mx="Mayo";break;
        case "06": $mx="Junio";break;
        case "07": $mx="Julio";break;
        case "08": $mx="Agosto";break;
        case "09": $mx="Septiembre";break;
        case "10": $mx="Octubre";break;
        case "11": $mx="Noviembre";break;
        case "12": $mx="Diciembre"; break;    
        default: $mx="000"; break;
    }   
    
    return $mx;
}

// Regresa el nombre del mes de una fecha en formato YYYY-MM-DD
function nombre_mes($mes){
    switch($mes){
        case "01": $mx="Enero"; break; 
        case "02": $mx="Febrero";break;
        case "03": $mx="Marzo";break;
        case "04": $mx="Abril";break;
        case "05": $mx="Mayo";break;
        case "06": $mx="Junio";break;
        case "07": $mx="Julio";break;
        case "08": $mx="Agosto";break;
        case "09": $mx="Septiembre";break;
        case "10": $mx="Octubre";break;
        case "11": $mx="Noviembre";break;
        case "12": $mx="Diciembre"; break;    
        default: $mx="000"; break;
    }   
    
    return $mx;
}

//Regresa las primeras 3 letras del mes de una fecha en formato YYYY-MM-DD
function getMesCorto($date,$numeric=false){
    $mes=$numeric?intval(substr($date, 5, 2)):substr($date, 5, 2);
    switch($mes){
        case "01": $mx="Ene"; break; 
        case "02": $mx="Feb";break;
        case "03": $mx="Mar";break;
        case "04": $mx="Abr";break;
        case "05": $mx="May";break;
        case "06": $mx="Jun";break;
        case "07": $mx="Jul";break;
        case "08": $mx="Ago";break;
        case "09": $mx="Sep";break;
        case "10": $mx="Oct";break;
        case "11": $mx="Nov";break;
        case "12": $mx="Dic"; break;    
        default: $mx="000"; break;
    }   
    
    return $mx;
}

// de una fecha YYYY-MM-DD la transforma a DD de MM de YYYYY
function getFechaNormal($fecha,$tipo=""){

    $dia = getDay($fecha);

    if($tipo=="corto")
        $mes = getMesCorto($fecha);
    else
        $mes = getMes($fecha);
    
    $anio = getYear($fecha);

    return $dia." ".$mes." ".$anio;

}

//Regresa el anio de una fecha en formato YYYY-MM-DD
function getYear($date,$numeric=false){
    return $numeric?intval(substr($date, 0,4)):substr($date, 0,4);
}

//regresa solo la fecha en formato YYYY-MM-DD HH:MM:SS
function getOnlyDate($date){
    return substr($date,0,10);
}

//regresa solo la fecha en formato YYYY de M de DDDD de un valor YYYY-MM-DD HH:MM:SS
function getOnlyDateNormal($date){

    $la_fecha = substr($date,0,10);

    $dia = getDay($la_fecha,true);
    $mes = getMes($la_fecha);
    $anio = getYear($la_fecha);

    return $dia." ".$mes." ".$anio;

}

function getOnlyTime($date){
    return substr($date,11,8);
}

//Regresa Fecha y Hora en formato YYYY-MM-DD HH:MM:SS
function nowDT(){
    return date("Y-m-d H:i:s");
}

//REGRESA LA FECHA Y HORA SEPARADA DE UN TIMESTAMP YYYY-MM-DD HH:MM:SS
function getDateHour($fecha){   
    $tiempo = explode(" ", $fecha);
    
    $fecha = $tiempo[0];
    $mes = getMes($fecha);
    
    $fecha = explode("-", $fecha);
    $anio = $fecha[0];    
    $dia = $fecha[2];
    
    $hora = $tiempo[1];
    
    return "$dia de $mes de $anio <br /> <i class='fa fa-clock-o'></i> $hora"."HRS";
    
}

// de un dia en ingles lo devuelve a espanol
function diaEspanol($diaIngles){

    switch ($diaIngles) {
            
        case 'Monday':
            return "Lunes";
            break;
        
        case 'Tuesday':
            return "Martes";
            break;

        case 'Wednesday':
            return "Miércoles";
            break;

        case 'Thursday':
            return "Jueves";
            break;

        case 'Friday':
            return "Viernes";
            break;

        case 'Saturday':
            return "Sábado";
            break;

        case 'Sunday':
            return "Domingo";
            break;

        default:
            return "...";
            break;

    }

}

?>