@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees Edit') }}</div>

                <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="p-4">
                    @csrf
                    @method('PUT') <!-- Add this line -->

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $employee->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $employee->email }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary align-self-start">Update</button>
                </form>

                @if (session('status'))
                <script>
                    // Assign the PHP variable to a JavaScript variable safely
                    var statusMessage = "{{ session('status') }}";
                    Swal.fire({
                        icon: 'success',
                        title: 'Success edit!',
                        text: statusMessage,
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

