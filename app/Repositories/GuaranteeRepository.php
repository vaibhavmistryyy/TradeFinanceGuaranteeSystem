<?php

namespace App\Repositories;

use App\Models\Guarantee;

class GuaranteeRepository implements GuaranteeRepositoryInterface
{
    public function getAll()
    {
        return Guarantee::all();
    }

    public function findById($id)
    {
        return Guarantee::find($id);
    }

    public function create(array $data)
    {
        return Guarantee::create($data);
    }

    public function update($id, array $data)
    {
        $guarantee = Guarantee::find($id);
        if ($guarantee) {
            $guarantee->update($data);
            return $guarantee;
        }
        return null;
    }

    public function delete($id)
    {
        $guarantee = Guarantee::find($id);
        if ($guarantee) {
            return $guarantee->delete();
        }
        return false;
    }
}
