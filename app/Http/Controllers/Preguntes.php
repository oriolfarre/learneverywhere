<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Preguntes extends BaseController
{
  public function novaPregunta($count)
  {
    {{ dd($count); }}
    $count=$count+1;
    ?><label for="name" class="control-label">Resposta <?php echo $count; ?>:</label>
    {!! Form::text('resposta', null, ['class' => 'form-control', 'id' => 'resposta']) !!}
    <?php
  }
}
