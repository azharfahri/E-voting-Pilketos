@extends('layouts.admin')
@section('content')
    <h3>Atur Waktu Voting</h3>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.periode.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="mulai_vote" value="{{ old('mulai_vote') }}" required>
                            <label for="tb-name">Mulai dari</label>
                            @error('mulai_vote')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="selesai_vote" value="{{ old('selesai_vote') }}" required>
                            <label for="tb-name">selesai sampai</label>
                            @error('selesai_vote')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-md-flex align-items-center">
                            <div class="ms-auto mt-3 mt-md-0">
                                <button type="submit" class="btn btn-primary">
                                    <i></i>
                                    submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
