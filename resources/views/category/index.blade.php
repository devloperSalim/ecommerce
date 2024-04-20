<x-master>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($categories as $categorie )
       <tr>
            <td scope="row">{{ $categorie->name }}</td>
            <td><a href="{{ route('categories.edit',$categorie->id) }}">Edit</a></td>
            <td>
                <form action="{{ route('categories.destroy',$categorie) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button>delete</button>
                </form>
            </td>
            <td><a href="{{ route('categories.show',$categorie) }}">show</a></td>
        </tr>
       @endforeach
    </tbody>
</table>
</x-master>
