<div class="form-group">
    <label for="name">Item name</label>
    <input id="name" type="text" name="name" placeholder="Item name..." value="{{ old('name') }}" class="form-control">
</div>

<div class="form-group">
  <label for="image">Item image</label>
  <div class="custom-file">
      <input id="image" type="file" name="image" placeholder="Item image..." value="{{ old('image') }}" class="custom-file-input">
      <label class="custom-file-label" for="image">Select image...</label>
  </div>
</div>


<div class="form-group">
    <label for="price">Item price</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
      </div>
      <input type="number" name="price" id="price" class="form-control" aria-label="Amount (to the nearest dollar)">
      <div class="input-group-append">
        <span class="input-group-text">.00</span>
      </div>
    </div>
</div>


<div class="form-group">
    <label for="name">Item description</label>
    <textarea id="description" type="text" name="description" placeholder="Item description..." value="{{ old('description') }}" class="form-control"></textarea>
</div>

<button type="submit" class="btn btn-primary">Create Store Item</button>
