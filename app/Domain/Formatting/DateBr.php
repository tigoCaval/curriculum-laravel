<?php
namespace App\Domain\Formatting;

use DateTime;

class DateBr
{
    

     /**
      * Convert date to brazilian format
      * Converter data para formato brasileiro
      * @param mixed $date
      * 
      * @return [type]
      */
     public function convert($date)
     {
       $item = date_create($date);
       return date_format($item, 'd/m/Y'); 
     }

     /**
      * Display age according to date
      * Exibir a idade de acordo com a data
      * @param mixed $item
      * 
      * @return [type]
      */
     public function dateAge($item)
     {
        $date = new DateTime($item);
        $interval = $date->diff(new DateTime( date('Y-m-d')  ) );
        return $interval->format('%Y anos');
     }


     /**
      * Display full month and year (m/Y) of the given date
      * Exibir mês por extenso e ano (m/Y) da data fornecida
      * @param mixed $date
      * 
      * @return [type]
      */
     public function dateMonthYear($date)
     {
       setlocale(LC_TIME, 'pt_BR', 'pt_BR.UTF-8', 'Portuguese_Brazil'); 
       date_default_timezone_set('America/Sao_Paulo');  
       return utf8_encode( strftime('%B/%Y', strtotime($date)) );   
     } 




}