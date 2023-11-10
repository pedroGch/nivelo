<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  /**
   * Método que da formato a una fecha
   * @param string $inputDate
   * @return string
   */
  function dateFormat($inputDate) {
    // Crea un objeto DateTime con la fecha de entrada
    $date = new DateTime($inputDate);

    // Formatea la fecha según el formato deseado (DD-MM-AAAA)
    $formattedDate = $date->format('d-m-Y');

    // Retorna la fecha formateada
    return $formattedDate;
}
}
