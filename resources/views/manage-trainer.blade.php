@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Trainer List') }}</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainers as $trainer)
                            <tr>
                                <td>{{ $trainer->name }}</td>
                                <td>{{ $trainer->email }}</td>
                                <td>
                                    <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDeletion(this)" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDeletion(element) {
        // Show a confirmation dialog
        if (confirm('Are you sure you want to delete this employee?')) {
            // Find the parent form and submit it
            element.closest('form').submit();
        }
    }
</script>
@endsection