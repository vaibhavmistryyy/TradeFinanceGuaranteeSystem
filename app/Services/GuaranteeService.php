<?php

namespace App\Services;

use App\Repositories\GuaranteeRepositoryInterface;

class GuaranteeService
{
    protected $guaranteeRepository;

    public function __construct(GuaranteeRepositoryInterface $guaranteeRepository)
    {
        $this->guaranteeRepository = $guaranteeRepository;
    }

    public function getAllGuarantees()
    {
        return $this->guaranteeRepository->getAll();
    }

    public function getGuaranteeById($id)
    {
        return $this->guaranteeRepository->findById($id);
    }

    public function createGuarantee(array $data)
    {
        return $this->guaranteeRepository->create($data);
    }

    public function updateGuarantee($id, array $data)
    {
        return $this->guaranteeRepository->update($id, $data);
    }

    public function deleteGuarantee($id)
    {
        return $this->guaranteeRepository->delete($id);
    }
}
