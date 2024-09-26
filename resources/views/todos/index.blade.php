@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Index') }}</h2>
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
                <p>
                    <a href="{{ route('todos.create') }}" class="btn btn-primary">Create New Todo</a>
                    @if ($todos->count())
                    <p>
                        <ul>
                            @foreach ($todos as $todo)
                    
                            <li style="margin: 20px; padding: 10px; border: 1px solid #ccc; transition: background-color 0.3s;">
                                <a href="{{ route('todos.show', $todo->id) }}" style="text-decoration: none; color: inherit; display: block; padding: 10px;">
                                    {{-- <p><strong>ID:</strong> {{ $todo->id }}</p> --}}
                                    <p><strong>Title:</strong> {{ $todo->title }}</p>
                                    <p><strong>Description:</strong> {{ $todo->description }}</p>
                                    <p><strong>Deadline:</strong> {{ $todo->deadline }}</p>
                                    <p><strong>Status:</strong> {{ $todo->status }}</p>
                                    {{-- <p><strong>User ID:</strong> {{ $todo->user_id }}</p> --}}
                                </a>
                            
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </li>
                            
                            <style>
                            li:hover {
                                background-color: #a9ebf6a4; 
                            }
                            </style>
        
                            @endforeach
                        
                        </ul>
                    </p>
                    @else
                    <p style="margin: 20px; padding: 10px; border: 1px solid #ccc;"> No ToDos found</p>
                    @endif
                </p>
                
            </div>
        </div>
    </div>
@endsection
