<?php
 use App\Models\settings;

/*  function colors($colorVar){
     $colors=settings::where('name','=','colors')->first();
     $color=$colors->value;
    return  $color['red'];
 } */

 function font(){
     $font=settings::where('name','=','font_site')->first();
     return trim($font->value);
 }


?>
