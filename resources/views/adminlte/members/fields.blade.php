<div class="form-group">
    <label for="forNama">Nama</label>
    <input type="text" class="form-control" id="forNama" name="nama" placeholder="Nama Member" value="{{isset($member->nama) ? $member->nama : ''}}">
</div>
<div class="form-group">
    <label for="forAlamat">Alamat</label>
    <input type="text" class="form-control" id="forAlamat" name="alamat" placeholder="Alamat Member" value="{{isset($member->alamat) ? $member->alamat : ''}}">
</div>
<div class="form-group">
    <label for="forHp">Handphone</label>
    <input type="text" class="form-control" id="forHp" name="hp" placeholder="No Hp Member" value="{{isset($member->hp) ? $member->hp : ''}}">
</div>
<div class="form-group">
    <label for="forEmail">Email</label>
    <input type="email" class="form-control" id="forEmail" name="email" placeholder="Email Member" value="{{isset($member->email) ? $member->email : ''}}">
</div>
<div class="form-group">
    <label for="forProfile">Profile</label>
    <input type="file" name="profile" class="form-control" id="forProfile">
</div>

<div class="form-group">
    <label for="forRole">Group</label>
    <select name="group" id="forRole" class="form-control">
        <option value="" disabled selected>== Pilih Group ==</option>
        @foreach ($groups as $id => $kota)
            <option value="{{ $id }}" {{ $id==(isset($member->group_id) ? $member->group_id : '') ? 'selected' : ''}} >{{ $kota }}</option>
        @endforeach
    </select>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>



