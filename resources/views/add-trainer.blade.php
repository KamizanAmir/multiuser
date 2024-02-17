@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Trainer add') }}</div>

                <form action="{{ route('add-employee.store') }}" method="POST" class="p-4">
                    @csrf
                    <div class="mb-3"> <!-- Added Bootstrap spacing class mb-3 for margin-bottom -->
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3"> <!-- Added Bootstrap spacing class mb-3 for margin-bottom -->
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3"> <!-- Added Bootstrap spacing class mb-3 for margin-bottom -->
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary align-self-start">Add Trainer</button> <!-- Aligned button to the start (left) -->
                </form>
                @if (session('status'))
                <script>
                    // Assign the PHP variable to a JavaScript variable safely
                    var statusMessage = "{{ session('status') }}";
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
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
