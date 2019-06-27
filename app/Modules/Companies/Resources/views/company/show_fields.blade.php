<div class="media">
    <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="{{ $company->logo ?? $company->logo_with_default }}"
         alt="Generic placeholder image">
    <div class="media-body">
        <h5 class="mt-0 font-18 mb-1">{{$company->name}}</h5>
    </div>
</div>

<!-- Type field -->
<div class="form-group">
    <p>
        {{ Form::label('type', 'Type ') }}
        <span class="badge {{ \App\Modules\Companies\Helpers\CompanyViewHelper::getTypeContainerClass($company->type) }}">
            {{ $company->type }}
        </span>
    </p>
</div>

<!-- Info field -->
<div class="form-group">
    <p>
        {{ Form::label('description', 'Description ') }}
        {{ $company->info }}
    </p>
</div>

<!-- Join Code field -->
<div class="form-group">
    <p>
        {{ Form::label('join_code', 'Code for join ') }}
        <span class="{{ $company->join_code ? '' : 'text-danger' }}">
            {{ $company->join_code ?? 'Empty' }}
        </span>
    </p>
</div>


<div class="form-group">
    <a href="{{route('challenge.create', ['companyId' => $company->id])}}" class="btn btn-primary create-article">New challenge</a>
</div>