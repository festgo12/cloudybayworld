		<a class="clear">{{ __('New Notification(s).') }}
			@if(count($datas) > 0)
			<span id="user-notf-clear" class="clear-notf" data-href="{{ route('user-notf-clear') }}">
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
			$userinfo = [];
			foreach ($sani as $s) {
				$key_value = explode(':', $s);
				$userinfo[$key_value[0]] = $key_value[1];
			}
			$user = App\Models\User::where('email',$userinfo['email'])->first();
		@endphp
			<li>
				<a href="{{ route('admin-user-show',$user->id) }}">
					 <i class="fas fa-user"></i> {{ __('A New User Has Registered.') }}
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