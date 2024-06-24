<!-- update player view  -->
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row d-flex justify-content-left">
            <div class="col-md-6">
                <h2>Update Player</h2>
            </div>
            <div class="col-md-6 text-right d-flex justify-content-end">
                <a href="{{ url($url.'/Players') }}" class="btn btn-primary">
                    <i class="icon ion-md-add"></i> Go to Players List
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <form method="POST" action="{{ url($url.'/Players/Update') }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="player_id" value="{{ $player->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Player Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $player->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $player->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $player->phone }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ $player->age }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="team_id" class="form-label">Team</label>

                            <select name="team_id" class="form-select" id="team_id">
                                <option value="">__select_Player_Team__</option>
                                @foreach ($teams as $team )
                                <option value="{{$team->id}}" @selected($team->id == $player->team_id) >{{$team->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="course_id" class="form-label">Course</label>
                            <select name="course_id" class="form-select" id="course_id">
                                <option value="">__select_Player_Course__</option>
                                @foreach ($courses as $course )
                                <option value="{{$course->id}}" @selected($course->id ==$player->course_id ) >{{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                            @if($player->photo)
                                <img src="{{ asset('uploads/' . $player->photo) }}" alt="Player Photo" width="100" class="mt-2">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-muted">Leave blank if you do not want to change the password</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
