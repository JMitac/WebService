<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cli_cod', 'cli_dni', 'cli_foto', 'cli_nombre', 'cli_pater', 'cli_mater', 'cli_telf', 'cli_email', 'cli_direccion', 'cli_tipvehiculo', 'cli_marca', 'cli_model', 'cli_placa', 'cli_fecha'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
