<x-master>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="">nom cat</label>
        <input type="text" name="name" id="">
        <button>add</button>
    </form>
</x-master>
