@foreach ($permissions as $id => $name)
    <div class="checkbox">
        <label>
            <input type="checkbox" value="{{ $id }}" name="permissions[]"
                {{ $user->permissions->contains($id) ? 'checked' : '' }}>
            {{ $name }}
        </label>
    </div>
@endforeach
