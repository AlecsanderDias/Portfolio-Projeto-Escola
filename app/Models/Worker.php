<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'role',
        'user_id'
    ];

    protected $attributes = [
        'role' => 'worker',
    ];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }

    static function getWorkerByUserId(int $userId) {
        return Worker::select(['role'])->where('user_id',$userId)->get();
    }

    static function updateWorkerByUserId(int $userId, array $data) {
        $workerId = Worker::select(['id'])->where('user_id', $userId);
        $updateWorker = new Worker($data);
        Worker::find($workerId)->update($updateWorker->getAttributes());
    }

    static function deleteWorkerByUserId(int $userId) {
        $workerId = Worker::select('id')->where('user_id', $userId)->get()->toArray();
        Worker::find($workerId[0]['id'])->delete();
    }
}
