<x-master>
<form action="{{ route('categories.update',$category) }}" method="POST">
    @csrf
    @method('put')
    <label for="">nom cat</label>
    <input type="text" name="name" id="" value="{{ old('name',$category->name) }}">
    <button>add</button>
</form>
</x-master>
