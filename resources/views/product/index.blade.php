<x-master>
    <form action="{{ route('search') }}" method="GET">
        @csrf
        <label for="">search</label>
        <input type="text"  name="query">
        <button>search</button>
    </form>
    <table>
        <tr>
            <th>name</th>
            <th>Category</th>
            <th>description</th>
            <th>image</th>
            <th>quantity</th>
            <th>price</th>
            <th>Edit</th>
        </tr>
        @foreach ($products as $product )
            <tr>
            <td>{{ $product->name }}</td>
            <td>
                @if ($product->category)
                <a href="{{ route('categories.show',$product->category_id) }}">
                    {{ $product->category->name }}
                </a>
                @endif
            </td>
            <td>{!! $product->description !!}</td>
            <td><img src="{{ asset('storage/' .$product->image) }}" alt=""></td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            <td><a href="{{ route('products.edit',$product->id) }}">edit</a></td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button>delete</button>
                </form>
            </td>
            </tr>
        @endforeach
    </table>
    <div>
        {{ $products->links() }}
    </div>
</x-master>
