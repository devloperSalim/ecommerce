<x-master>
    <div class="container d-flex justify-content-center pt-5">

            <div class="table-responsive w-100">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->name }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Category Actions">
                                        <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('categories.destroy', $categorie) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="{{ route('categories.show', $categorie) }}" class="btn btn-info">Show</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>

</x-master>
