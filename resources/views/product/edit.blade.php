
<x-master>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="">name</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}"><br>
        <label for="">description</label>
        <textarea name="description" id="" cols="30" rows="10">{{ old('description', $product->description) }}</textarea><br>
        <label for="">Quantity</label>
        <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}"><br>
        <label for="">image</label>
        <input type="file" name="image" id=""><br>
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                style="max-width: 200px; height: auto;">
        @else
            <p>No image available</p>
        @endif
        <br>
        <label for="">price</label>
        <input type="number" name="price" value="{{ old('price', $product->price) }}"><br>
        <select name="category_id" id="">
            <option value="" disabled>Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">add</button>
    </form>
</x-master>
