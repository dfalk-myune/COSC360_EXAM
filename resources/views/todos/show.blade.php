@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Show') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <a href="{{ route('todos.index') }}" class="btn btn-primary mt-3">Back to ToDos listings</a>
                <div style="margin: 20px; padding: 10px; border: 1px solid #ccc;">
                    {{-- <p><strong>ID:</strong> {{ $todo->id }}</p> --}}
                
                    <p><strong>Title:</strong> {{ $todo->title }}</p>
    
                    <p><strong>Description:</strong> {{ $todo->description }}</p>
    
                    <p><strong>Deadline:</strong> {{ $todo->deadline }}</p>
    
                    <p><strong>Status:</strong> {{ $todo->status }}</p>

                    <p><strong>Created at:</strong> {{ $todo->created_at }}</p>

                    @if ($todo->updated_at != $todo->created_at)
                        <p><span style="color: rgb(237, 206, 49);"><strong>Updated at:</strong> {{ $todo->updated_at }}</span></p>
                    @endif
    
                    {{-- <p><strong>User ID:</strong> {{ $todo->user_id }}</p>     --}}
                    
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
