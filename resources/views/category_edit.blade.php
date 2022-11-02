@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{route('category.update',$category->id)}}">
                @csrf
                @method('PUT')
                <div class="card">
                    <select class="form-control" name='parent_id'>
                        <option value="">Select Parent Category</option>
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}" @if($category->parent_id == $cat->id) selected @endif>{{$cat->name}}</option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required="" value="{{$category->name}}">
                </div>
                <button class="btn btn-success" type="submit">update</button>
            </form>
        </div>
    </div>
</div>
@endsection
