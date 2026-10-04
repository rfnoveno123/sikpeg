<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasterDataController extends Controller
{
    // Mapping model classes
    private $models = [
        'unit-kerja' => \App\Models\UnitKerja::class,
        'jabatan' => \App\Models\Jabatan::class,
        'status-pegawai' => \App\Models\StatusPegawai::class,
        'golongan' => \App\Models\Golongan::class,
    ];

    private $titles = [
        'unit-kerja' => 'Unit Kerja',
        'jabatan' => 'Jabatan',
        'status-pegawai' => 'Status Pegawai',
        'golongan' => 'Golongan',
    ];

    public function index($type)
    {
        if (!array_key_exists($type, $this->models)) {
            abort(404);
        }

        $modelClass = $this->models[$type];
        $title = $this->titles[$type];
        
        // Simple pagination
        $data = $modelClass::paginate(10);
        
        // Get fillable attributes for generic table headers (excluding id, timestamps)
        $model = new $modelClass();
        $columns = array_diff($model->getFillable(), ['created_at', 'updated_at']);
        
        // If fillable is empty, try to get from schema
        if (empty($columns)) {
            $columns = Schema::getColumnListing($model->getTable());
            $columns = array_diff($columns, ['id', 'created_at', 'updated_at', 'deleted_at']);
        }

        return view('master.index', compact('data', 'type', 'title', 'columns'));
    }

    // You can add generic store/update/delete methods later
}
