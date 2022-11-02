@if($category->parent_id == null)
	<h5>
		<strong>
			{{$category->name}}
		</strong>
	</h5>
@else
	<h6>
		<span>
			{{$category->name}}
		</span>
	</h6>
@endif

@foreach ($category->children as $child)
    <div class="ml-5">
    	@include('category_view', array('category' => $child))
    </div>
@endforeach