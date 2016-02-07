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

	protected $clientRepository;
	protected $userRepository;
	protected $orderRepository;
	protected $cupomRepository;
	protected $productRepository;


	function __construct(
		ClientRepository $clientRepository,
		UserRepository $userRepository,
		OrderRepository	$orderRepository,
		CupomRepository	$cupomRepository,
		ProductRepository $productRepository
		)
	{
		$this->clientRepository = $clientRepository;
		$this->userRepository = $userRepository;
		$this->orderRepository=	$orderRepository;
		$this->cupomRepository=	$cupomRepository;
		$this->productRepository= $productRepository;
	}

	public function create(array $data)
	{
		\DB::beginTransaction();
		try
		{
			$data['status'] = 0;
			if(isset($data['cupom_id']))
			{
				unset($data['cupom_id']);
			}
			if(isset($data['cupom_code']))
			{
				$cupom = $this->cupomRepository->findByField('code',$data['cupom_code'])->first();
				$data['cupom_id'] = $cupom->id;
				$cupom->used = 1;
				$cupom->save();
				unset($data['cupom_code']);
			}
			$items = $data['items'];
			unset($data['items']);
			$order = $this->orderRepository->create($data);
			$total=0;
			foreach ($items as $item)
			{
				$item['price'] = $this->productRepository->find($item['product_id'])->price;
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
			return $order;
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

	public function updateStatus($id,$idDeliveryman,$status)
	{
		$order = $this->orderRepository->getByIdAndDeliveryman($id,$idDeliveryman);
		if($order instanceof \Delivery\Models\Order)
		{
			$order->status = $status;
			$order->save();
			return $order;
		}
		return false;
	}

}


