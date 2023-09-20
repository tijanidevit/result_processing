<?php


namespace App\Services;
use App\Models\Session;
use Illuminate\Database\Eloquent\Collection;

class SessionService {
    public function __construct(protected Session $session) {}

    public function getAll() : array|Collection {
        return $this->session->orderBy('name')->get();
    }

    public function addSession($data) : Session {
        return $this->session->create($data);
    }

    public function deleteSession($session) : bool {
        return $session->delete();
    }
}
