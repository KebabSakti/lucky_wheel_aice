<?php

namespace App\Tools;

use App\Log;
  
class ActivityLogClass
{
    public function addLog($sumber, $tipe, $status, $deskripsi)
    {
         $Log = new Log;
         $Log->sumber = $sumber;
         $Log->tipe = $tipe;
         $Log->status = $status;
         $Log->deskripsi = $deskripsi;
         $Log->save();
    }
}
