<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class MonitoringHeader extends Model
{
    use SoftDeletes;
    use HasUpsertQueries;

    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'monitoring_header';

    /**
     *  For table mass assignment
     * 
     * 
     */
    protected $fillable = [
        'participant_id',
        'center_name',
        'center_address',
        'date_fill',
        'date_enroll',
        'date_withdraw',
        'completed_by',
        'date_completed',
        'position',
        'encoded_by',
        'updated_by',
    ];

    /**
     *  For table mass assignment
     * 
     * 
     */
    protected $columns = [
        'id',
        'participant_id',
        'center_name',
        'center_address',
        'date_fill',
        'date_enroll',
        'date_withdraw',
        'completed_by',
        'date_completed',
        'position',
        'encoded_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     *  Exclude scope method
     * 
     * 
     */
    public function scopeExclude($query,$value = array())
    {

        return $query->select( array_diff( $this->columns,(array) $value) );

    }

    /**
     *  Get monitoring header
     * 
     * 
     */
    public function getMonitoringHeader($id)
    {
        return $this->where('participant_id', $id)
                    ->first();
    }

     /**
     *  Update monitoring header
     * 
     * 
     */
    public function updateMonitoringHeader($id, $data)
    {
        return $this->where('participant_id', $id)
                    ->update($data);
    }
}
