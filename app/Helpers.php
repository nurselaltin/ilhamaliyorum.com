<?php

function isResumeFill(){

    $writer =  \App\Models\Writer::find(session()->get('id'));

    //Bu bilgileri girmemişse daha özgeçmiş oluşturmamış.

        if($writer->address == null & $writer->birthday== null){
            return true;
        }

}




