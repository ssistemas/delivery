<?php

namespace Delivery\Services;

use Delivery\Repositories\ClientRepository;
use Delivery\Repositories\UserRepository;
/**
*
*/
class ClientService
{

	protected $ClientRepository;
	protected $UserRepository;


	function __construct(ClientRepository $ClientRepository ,UserRepository $UserRepository )
	{
		$this->ClientRepository = $ClientRepository;
		$this->UserRepository = $UserRepository;
	}

	public function create(array $data)
	{
		$data['user']['password'] = bcrypt(123456);
		$user =	$this->UserRepository->create($data['user']);
		$data['user_id']=$user->id;
		$this->ClientRepository->create($data);
		return $this;
	}

	public function update(array $data,$id)
	{
		$this->ClientRepository->update($data,$id);
		$client = $this->ClientRepository->find($id);
		$this->UserRepository->update($data['user'],$client->user->id);
		return $this;
	}

}


