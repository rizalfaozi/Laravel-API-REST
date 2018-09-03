<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Virtual
 * @package App\Models
 * @version August 15, 2018, 2:17 pm UTC
 *
 * @property integer trx_id
 * @property integer trx_amount
 * @property string virtual_account
 * @property string description
 * @property string|\Carbon\Carbon expired
 * @property string email
 * @property string name
 * @property string phone
 * @property string tipe
 * @property string jalur
 */
class Logva extends Model
{
    use SoftDeletes;

    public $table = 'log_va';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'trx_va',
        'caller',
        'json'
     
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'trx_va' => 'string',
        'caller' => 'string',
        'json' => 'string'
      
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'trx_va' => 'required',
        'caller' => 'required',
        'json' => 'required'
      
    ];

    
}
