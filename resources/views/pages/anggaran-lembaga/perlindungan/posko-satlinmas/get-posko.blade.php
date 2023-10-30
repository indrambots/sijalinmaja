<form id="form-posko">
    <input type="hidden" name="dataid" value="{{$dataid}}">
    <table class="table table-bordered table-striped table-sm">
        <thead>
            <tr class="text-center">
                <th><strong>No</strong></th>
                <th><strong>Nama</strong></th>
                <th><strong>#</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $k => $list)
                <tr>
                    <td class="text-center">
                        <input type="hidden" name="nama[{{$list['kode']}}]" value="{{$list['nama']}}">
                        {{$k+1}}.
                    </td>
                    <td>{{$list['nama']}}</td>
                    <td class="text-center">
                        <input type="checkbox" name="status[{{$list['kode']}}]" {{isset($data[$list['kode']]['status']) ? 'checked' : ''}}>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>

<div style="padding:5px" class="float-right">
    <button type="button" class="btn btn-sm btn-primary" onclick="savePosko()">
        <i class="fas fa-save"></i> Simpan
    </button>
</div>
