<select name="product" id="product" class="form-control">
	<option value=""> - Seleccione - </option>
	@foreach ($products as $product)
		<option value="{{ $product->id }}" cost="{{ $product->cost }}">{{$product->name}}</option>
	@endforeach
</select>