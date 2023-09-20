<?php


namespace App\Services;
use App\Models\Level;
use Illuminate\Database\Eloquent\Collection;

class LevelService {
    public function __construct(protected Level $lesson) {}

    public function getAll() : array|Collection {
        return $this->lesson->orderBy('name')->get();
    }

    public function addLevel($data) : Level {
        return $this->lesson->create($data);
    }

    public function deleteLevel($lesson) : bool {
        return $lesson->delete();
    }
}
