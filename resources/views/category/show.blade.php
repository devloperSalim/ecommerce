<x-master>
    <div>
        <a href="{{ route('categories.index') }}">go back</a>
    </div>

    <h2>Category : {{ $category->name }}</h2>
<table class="table">
    <thead>
        <tr>
            <th>Product Id</th>
            <th>Product name</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as  $product)
        <tr>
            <td scope="row">{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td><a href="{{ route('products.edit',$product) }}">update</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</x-master>
