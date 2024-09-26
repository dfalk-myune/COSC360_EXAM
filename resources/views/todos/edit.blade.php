@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Edit') }}</h2>
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
                <a href="{{ route('todos.show',$todo->id) }}" class="btn btn-primary mt-3">Back to item</a>
                
                <div style="margin: 20px; padding: 10px; ">
                    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $todo->title }}" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ $todo->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input type="datetime-local" name="deadline" id="deadline" class="form-control" 
                                   value="{{ \Carbon\Carbon::parse($todo->deadline)->format('Y-m-d\TH:i') }}" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="Pending" {{ $todo->type == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Processing" {{ $todo->type == 'Processing' ? 'selected' : '' }}>Processing</option>
                                <option value="Completed" {{ $todo->type == 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="Cancelled" {{ $todo->type == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                
                        
                
                        <button type="submit" class="btn btn-warning">Update Transaction</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
