<div class="form-group">
    <label for="nm_product" class=" form-control-label">Product Name</label>
    <select type="text" id="nm_product" name="nm_product" placeholder="" class="form-control">
        @foreach($product as $item)
        <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->nm_product }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="harga" class=" form-control-label">Harga</label>
    <input type="number" id="harga" name="harga" class="form-control" disabled>
</div>
<div class="form-group">
    <label for="lama" class=" form-control-label">lama</label>
    <input type="text" id="lama" name="lama" placeholder="Enter the Time.." class="form-control">
</div>
<div class="form-group">
    <label for="subtotal" class=" form-control-label">subtotal</label>
    <input type="number" id="subtotal" name="subtotal" Required class="form-control">

</div>


