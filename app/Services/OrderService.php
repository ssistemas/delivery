<?php
namespace Delivery\Services;

use Delivery\Repositories\ClientRepository;
use Delivery\Repositories\UserRepository;
use Delivery\Repositories\OrderRepository;
use Delivery\Repositories\CupomRepository;
use Delivery\Repositories\ProductRepository;
/**
*
*/
class OrderService
{

	protected $ClientRepository;
	protected $UserRepository;
	protected $OrderRepository;
	protected $CupomRepository;
	protected $ProductRepository;


	function __construct(
		ClientRepository $ClientRepository,
		UserRepository $UserRepository,
		OrderRepository	$OrderRepository,
		CupomRepository	$CupomRepository,
		ProductRepository $ProductRepository
		)
	{
		$this->ClientRepository = $ClientRepository;
		$this->UserRepository = $UserRepository;
		$this->OrderRepository=	$OrderRepository;
		$this->CupomRepository=	$CupomRepository;
		$this->ProductRepository= $ProductRepository;
	}

	public function create(array $data)
	{
		\DB::beginTransaction();
		try
		{
			$data['status'] = 0;
			if(isset($data['cupom_code']))
			{
				$cupom = $this->CupomRepository->findByField('code',$data['cupom_code']);
				$data['cupom_id'] = $cupom->id;
				$cupom->used = 1;
				$cupom->save();
				unset($data['cupom_code']);
			}
			$items = $data['items'];
			unset($data['items']);
			$order =$this->OrderRepository->create($data);
			$total=0;
			foreach ($items as $item)
			{
				$item['price'] = $this->ProductRepository->find($item['product_id'])->price;
				$order->orderitems()->create($item);
				$total += $item['price'] * $item['qtd'];
			}
			$order->total=$total;
			if(isset($cupom))
			{
				$order->total = $total - $cupom->price;
			}
			$order->save();
			\DB::commit();
		}
		catch (Exception $e)
		{
			\DB::rollBack();
			throw $e;
		}
	}

	public function update(array $data,$id)
	{
		return $this;
	}

}


