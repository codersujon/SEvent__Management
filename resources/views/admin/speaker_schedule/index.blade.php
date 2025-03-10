@extends('admin.layout.master')

@section('main_content')
   @include('admin.layout.nav')
   @include('admin.layout.sidebar')

   <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Assign Schedule to Speaker</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin_speaker_schedule_store') }}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Speakers *</label>
                                                <select name="speaker_id" id="speaker_id" class="form-select">
                                                    @foreach($speakers as $speaker)
                                                        <option value="{{ $speaker->id }}">{{ $speaker->name }} - {{ $speaker->email }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Schedules *</label>
                                                <select name="schedule_id" id="schedule_id" class="form-select">
                                                    @foreach($schedules as $schedule)
                                                        <option value="{{ $schedule->id }}">{{ $schedule->title }} - {{ $schedule->schedule_day->day }} ({{ $schedule->schedule_day->date1 }}) </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Assign</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection