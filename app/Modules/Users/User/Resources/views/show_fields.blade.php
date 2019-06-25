<div class="media">
    <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="{{$user->avatar ?? $user->avatar_with_default}}"
         alt="Generic placeholder image">
    <div class="media-body">
        <h5 class="mt-0 font-18 mb-1">{{$user->full_name}}</h5>
        <p class="text-muted font-14">{{$user->email}}</p>

    </div>
</div>

<br/>

<div class="form-group">
    <p>
        <label for="name">Phone number:</label>
        <span class="{{$user->full_phone_number ? '' : 'text-danger'}}">{{ $user->full_phone_number ?? 'Empty' }}</span>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="name">Country:</label>
        <span class="{{$user->country ? '' : 'text-danger'}}">
        {{ $user->country ?? 'Empty' }}
        </span>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="name">Date of Birth:</label>
        <span class="{{$user->birthday ? '' : 'text-danger'}}">
        {{ $user->birthday ? $user->birthday->format('y-m-d') : 'Empty' }}
        </span>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="name">Sex:</label>
        <span class="{{$user->sex ? '' : 'text-danger'}}">
        {{ $user->sex ?? 'Empty' }}
        </span>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="name">City:</label>
        <span class="{{$user->city ? '' : 'text-danger'}}">
        {{ $user->city ?? 'Empty' }}
        </span>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="name">Company:</label>
        @if($user->company)
            <a href="{{ route('company.show', $user->company->id) }}">
                {{ $user->company->name }}
            </a>
        @else
        <span class="text-danger">
            Empty
        </span>
        @endif
    </p>
</div>
