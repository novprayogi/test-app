<div class="form-group">
    <label for="forName">Nama</label>
    <input type="text" class="form-control" id="forName" name="nama" placeholder="Nama" value="{{isset($group->nama) ? $group->nama : ''}}">
</div>
<div class="form-group">
    <label for="forEmail">Kota</label>
    <input type="text" class="form-control" id="forEmail" name="kota" placeholder="Kota" value="{{isset($group->kota) ? $group->kota : ''}}">
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>



