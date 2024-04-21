<x-master>
    <div class="container">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">nom cat</label>
                <input type="text" name="name" id="" class="form-control"/>
            </div>
            <button class="btn btn-primary">add</button>
        </form>
    </div>
</x-master>
