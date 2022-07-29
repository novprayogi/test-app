<div class="form-group">
    <label for="forName">Nama Role</label>
    <input type="text" class="form-control" id="forName" name="name" placeholder="Nama Role" value="{{isset($role->name) ? $role->name : ''}}">
</div>

<div class="form-group">
    <label for="forName">Nama Role</label>
    <br>
    @foreach($permissions as $data)
        @if($s == 1)
            <label>
                <input type="checkbox" name="permission[]" value="{{$data->id}}" {{ in_array($data->id, $rolePermissions) ? 'checked' : false}}> {{$data->name}}
{{--                {!! Form::checkbox('permission[]',$data->id, in_array($data->id, $rolePermissions) ? true : false, ['class' => 'name','id'=>$data->table_name]) !!} {{ $data->name }}--}}
                </label>
        @else
            <label>
                <input type="checkbox" name="permission[]" value="{{$data->id}}" false> {{$data->name}}
{{--                {!! Form::checkbox('permission[]',$data->id, false, ['class' => 'name','id'=>$data->table_name]) !!} {{ $data->name }}--}}
            </label>
        @endif
    @endforeach
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>



