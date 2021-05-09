<div class="routes">
	<ul>
		@foreach($routes as $r)
		<li>{{$path}}</li>
		@endforeach
	</ul>
</div>

{{-- <pre>{{ print_r($routes, true) }}</pre> --}}