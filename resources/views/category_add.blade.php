@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{route('category.store')}}">
                @csrf
                <div class="card">
                    <select class="form-control" name='parent_id'>
                        <option value="">Select Parent Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
                </div>
                <button class="btn btn-success" type="submit">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
