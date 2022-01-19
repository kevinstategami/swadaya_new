<?php

namespace App\Models\Membership;

use Illuminate\Database\Eloquent\Model;

class DokumenRepo extends Model
{
protected $table = 'dokumen_repo';
protected $primaryKey = 'id';
protected $fillable = [
  'reff_id',
  'reff_type',
  'filename',
  'mime_type',
  'path'
];
}
