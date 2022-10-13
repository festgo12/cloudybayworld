		<a class="clear">{{ __('Low Quantity Product(s).') }}
			@if(count($datas) > 0)
			<span id="product-notf-clear" class="clear-notf" data-href="{{ route('product-notf-clear') }}">
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
			$product = App\Models\Product::where('sku',$info['sku'])->first();
		@endphp

			<li>
				<a href="{{ route('admin-prod-edit',$product->id) }}"> 
					<i class="icofont-cart"></i> {{mb_strlen($product->name,'utf-8') > 30 ? mb_substr($product->name,0,30,'utf-8') : $product->name}}
					<small class="d-block notf-stock">{{ __('Stock') }} : {{$product->stock}}</small>
					<small class="d-block notf-time ">{{ $data->created_at}}</small>
				</a>
			</li>
		@endforeach

		</ul>

		@else 

		<a class="clear" href="javascript:;">
			{{ __('No New Notifications.') }}
		</a>

		@endif