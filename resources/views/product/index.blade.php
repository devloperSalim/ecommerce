<x-master>
    <div class="container">
        <form class="mb-4" action="{{ route('search') }}" method="GET">
            @csrf
            <div class="form-group">
                <label for="query">Search</label>
                <input type="text" class="form-control" id="query" name="query" placeholder="Enter keyword">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if ($product->category)
                                    <a href="{{ route('categories.show', $product->category_id) }}">{{ $product->category->name }}</a>
                                @endif
                            </td>
                            <td>{!! $product->description !!}</td>
                            <td><img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-thumbnail" style="max-height: 100px;"></td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>

</x-master>
