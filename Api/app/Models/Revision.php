<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'revision';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cli_cod', 'rev_id', 'rev_motor', 'rev_tubo', 'rev_bujias', 'rev_bobinas', 'rev_radiador', 'rev_mangeras', 'rev_filtros', 'rev_check', 'rev_fecha'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
