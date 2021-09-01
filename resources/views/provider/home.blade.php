@extends('layouts.app')
@section('content')
    <h1>Add Locations </h1>
    @if(auth()->guard('provider')->user()->locations()->count()<5)
        <form method="POST" action="{{ route('dashboard.admin.providers.locations')}}">
            @csrf
            <div class="locations" id="locations">
                <div class="form-group row">
                    <label for=" " class="col-md-4 col-form-label text-md-right">Location #1</label>
                    <div class="col-md-6">
                        <input id="user_name" type="number" step="0.01" class="form-control d-inline-block w-49"
                               name="latitude[]" required placeholder="enter latitude">
                        <input id="user_name" type="number" step="0.01" class="form-control d-inline-block w-49 "
                               name="longitude[]" required placeholder="enter longitude">
                        <span
                            class="add-location d-inline-block p-1 rounded-circle bg-primary text-white text-center pointer "
                            style="height: 30px;width: 30px">+</span>
                    </div>
                </div>
            </div>
            {{--end user name --}}

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-success">
                        {{ __('Add ') }}
                    </button>
                </div>
            </div>
        </form>
    @else
        <h1>You have 5 locations</h1>
    @endif
@endsection
@push('js')
    <script>
        $(function () {
            let locations = "{{auth()->guard('provider')->user()->locations()->count()+1}}",
                locationCounter = 1;
            $('.add-location').on('click', function () {
                //add location btn
                if (locations < 5) {
                    //if locations less than 5
                    locations++;
                    locationCounter++;
                    let location = `
                    <div class="form-group row">
                        <label for=" " class="col-md-4 col-form-label text-md-right">Location #${locationCounter}</label>
                        <div class="col-md-6">
                            <input id="user_name" type="number"  step="0.01" class="form-control d-inline-block w-49"   name="latitude[]" required placeholder="enter latitude">
                            <input id="user_name" type="number" step="0.01" class="form-control d-inline-block w-49 "  name="longitude[]"  required placeholder="enter longitude">
                            <span class="remove-location d-inline-block p-1 rounded-circle bg-danger text-white text-center pointer " style="height: 30px;width: 30px">-</span>
                        </div>
                    </div>`;
                    $(this).parents('.locations').append(location);
                }
            });

            //    remove location
            $(document).on('click', ".remove-location", function () {
                locations--;
                locationCounter--;
                $(this).parents('.form-group').remove();
            });
        })
    </script>
@endpush
