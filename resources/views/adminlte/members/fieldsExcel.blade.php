<i class="fa fa-file-excel-o"></i>
{{--<div class="form-group">--}}
    <label for="forFile" class="font-medium-1 text-bold-600">File CSV</label>
    <input type="file" name="file" class="form-control" id="forFile">
{{--</div>--}}
<hr>

{{--<div class="rounded alert-amber alert-dismissible m-1 p-2" role="alert">--}}
{{--    <h3 class="mb-2 text-bold-700 text-black">Informasi!</h3>--}}
{{--    <p class="font-medium-1 text-black">--}}
{{--        Untuk melakukan upload data CSV menggunakan data <b>Excel</b> anda dapat download terlebih dahulu file <b>Template Excel</b> yang telah disediakan.--}}
{{--        Jika dalam proses upload mengalamai kegagalan anda dapat melukan tips & opsi berikut:--}}
{{--    </p>--}}
{{--    <ol class="font-medium-1">--}}
{{--        <li>Lakukan pengecekan kembali data anggota yang telah di input di dalam <b>Template Excel.</b></li>--}}
{{--        <li>Upload kembali file <b>Excel</b>, kemungkinan koneksi jaringan anda sedang terganggu.</li>--}}
{{--        <li>Jika masalah upload tidak dapat dilakukan anda dapat menghubungi pengelola dari akun yang anda miliki untuk dapat membantu dalam melakukan upload.</li>--}}
{{--    </ol>--}}
{{--</div>--}}

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="row">
    <div class="col-lg-12 text-center pr-0">
        <a href="{!! route('members.index') !!}" class="btn btn-danger rounded-2"> <i class="fa fa-close"></i> Batal</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

