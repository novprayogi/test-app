<div class="form-group">
    <label for="forName">Name</label>
    <input type="text" class="form-control" id="forName" name="name" placeholder="Nama User" value="{{isset($user->name) ? $user->name : ''}}">
</div>
<div class="form-group">
    <label for="forEmail">Email</label>
    <input type="email" class="form-control" id="forEmail" name="email" placeholder="Email User" value="{{isset($user->email) ? $user->email : ''}}">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" >
</div>

<div class="form-group">
    <label for="forRole">Role</label>
    <select name="role" id="forRole" class="form-control">
        <option value="" disabled selected>== Pilih Role ==</option>
        @if($s == 0)
            @foreach ($roles as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        @else
            @foreach ($roles as $id => $name)
                <option value="{{ $id }}" {{ in_array($id, $userRoles) ? 'selected' : ''}} >{{ $name }}</option>
{{--                <option value="{{ $id }}" {{ $id==$userRoles ? 'selected' : ''}} >{{ $name }}</option>--}}
            @endforeach
        @endif
    </select>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>



