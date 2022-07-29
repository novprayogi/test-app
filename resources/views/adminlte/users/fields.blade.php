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
{{--<div class="form-group">--}}
{{--    <label for="exampleInputFile">File input</label>--}}
{{--    <div class="input-group">--}}
{{--        <div class="custom-file">--}}
{{--            <input type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--            <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
{{--        </div>--}}
{{--        <div class="input-group-append">--}}
{{--            <span class="input-group-text">Upload</span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="form-check">--}}
{{--    <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--    <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
{{--</div>--}}

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>



