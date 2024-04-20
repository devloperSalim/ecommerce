<x-master>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">name</label>
        <input type="text" name="name" ><br>
        <label for="">description</label>
        <textarea name="description" id="" cols="30" rows="10"></textarea><br>
        <label for="">Quantity</label>
        <input type="number" name="quantity"  ><br>
        <label for="">image</label>
        <input type="file" name="image" id="" ><br>
        <label for="">price</label>
        <input type="number" name="price" ><br>
        <label for="">Category</label>
        <select name="category_id" id="">
            <option value="" selected disabled>select category</option>
           @foreach ($categories as $categorie )
                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
           @endforeach

        </select>
        <button>add</button>
    </form>
</x-master>
