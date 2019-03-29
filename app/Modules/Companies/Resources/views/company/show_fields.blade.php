<div class="media">
    <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="{{ $company->logo ?? $company->logo_with_default }}"
         alt="Generic placeholder image">
    <div class="media-body">
        <h5 class="mt-0 font-18 mb-1">{{$company->name}}</h5>
    </div>
</div>


<!-- Info field -->
<div class="form-group">
    <p>
        {{ Form::label('description', 'Description ') }}
        {{ $company->info }}
    </p>
</div>
