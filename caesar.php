<?php

//Convierte un caracter a minuscula, luego a numero
function mapCharAentero($chr)
{
  $chr=strtolower($chr);
  return ord($chr)-ord('a');
}

function mapEnteroAchar($int)
{
  return chr (ord ('a') + $int);
}
//Convierte una string a una array de enteros
function stringAarray($str)
{
  $longitud = strlen($str);
  for($i=0; $i<$longitud; $i++)
  {
    $cadNumeros[$i]=mapCharAentero($str[$i]);
  }
  return $cadNumeros;
}
//Aplica formula Caeser
function encriptar($array, $k)
{
  $longitud = count($array);
  for($i=0; $i<$longitud; $i++)
  {
    $arrayEncrip[$i] = ($array[$i] + $k) % 26;
  }
  return $arrayEncrip;
}

function desencriptar($array, $k)
{
  $longitud = count($array);
  $key= $k % 26;
  for($i=0; $i<$longitud; $i++)
  {
    $arrayDesEncrip[$i] = ($array[$i] - $key) % 26;
  }
  return $arrayDesEncrip;
}
//toma el arreglo de entero y devuelve la palabra final
function msjProcesado ($array)
{
  $longitud = count($array);
  for($i=0; $i<$longitud; $i++)
  {
    $msjResultante[$i] = mapEnteroAchar($array[$i]);
  }
  return $msjResultante;
}

$accion = $_POST['accion'];
$clave = $_POST['clave'];
$mensaje = $_POST['mensaje'];

if(is_numeric($clave) && ctype_alpha($mensaje)) {
  if($accion == 'cifrar'){
    echo "El mensaje encriptado es: ";
    echo implode(msjProcesado(encriptar(stringAarray($mensaje), $clave)));
  } else {
    echo "El mensaje desencriptado es: ";
    echo implode(msjProcesado(desencriptar(stringAarray($mensaje), $clave)));
  }
} else {
  echo "Error: debe ingresar una clave numerica y ademas el mensaje no puede
  contener numeros ni caracteres especiales. Reemplaze la ñ por ni";
}

?>
