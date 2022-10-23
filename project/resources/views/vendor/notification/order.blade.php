		<a class="clear">{{ __('New Order(s).') }} 
			@if(count($datas) > 0)
			<span id="order-notf-clear" class="clear-notf" data-href="{{ route('order-notf-clear') }}">
				{{ __('Clear All') }}
			</span>
			@endif
		</a>
		@if(count($datas) > 0)

		<ul>
		@foreach($datas as $data)

		@php
			$sani = str_ireplace(array('{','}', '"'), '',$data->data);
			
			$sani = explode(',',$sani); 
			$info = [];
			foreach ($sani as $s) {
				$key_value = explode(':', $s);
				$info[$key_value[0]] = $key_value[1];
			}
			$order = App\Models\Order::where('order_number',$info['orderNo'])->first();
		@endphp

			<li>
				<a href="{{ route('admin-order-show', $order->id) }}">
					 <i class="fas fa-2x fa-newspaper"></i> {{ __('You Have a new order.') }}
					<small class="d-block notf-time ">{{ $data->created_at }}</small>
				</a>
			</li>
		@endforeach

		</ul>

		@else 

		<a class="clear" href="javascript:;">
			{{ __('No New Notifications.') }}
		</a>

		@endif