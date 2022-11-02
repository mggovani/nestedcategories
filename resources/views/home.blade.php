@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(\Auth::user()->role == 'admin')
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>
                @else
                    <div class="card-header">{{ __('User Dashboard') }}</div>
                @endif

                <div class="card-body">
                    @if(\Auth::user()->role == 'admin' && !isset($id))
                        @foreach($categories as $category)
                            @include('category_view', array('category' => $category))
                        @endforeach
                    @else
                        @if($user)
                            {{$user->name}}
                        @else
                            User not found.
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
