<?php

function isResumeFill($email){


    $writers =  \App\Models\Writer::where('email','=',$email)->get();
     foreach ($writers as $writer){
         //Bu bilgileri girmemişse daha özgeçmiş oluşturmamış
         if($writer->address == null && $writer->birthday == null){
             //id de sessiona kaydedelim
             session()->put('id',$writer->id);
             return true;
         }
     }
     return false;
}