<x-master>
<form action="{{ route('categories.update',$category) }}" method="POST">
<div class="container">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="">nom cat</label>
        <input type="text" name="name" class="form-control" id="" value="{{ old('name',$category->name) }}">
    </div>
    <button class="btn btn-primary ">add</button>
</form>
</div>
</x-master>
