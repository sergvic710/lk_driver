<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';
    protected $fillable = [
        'user_id','DriverID','DriverName','RouteNumberInContract',
        'RouteName','BranchName','AutoColumnName','VehicleRegNum','VehicleModelName'
    ];
}
