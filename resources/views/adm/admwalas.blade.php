@extends('bagian.sidebar')

@section('content')
    <button class="btn btn-info" data-toggle="modal" data-target="#addData">Input ADM Baru</button> 

    <table class="table table-striped" style="text-align:center; margin-top:2%;">
                    <thead>
                        <tr>
                            <th>Materi Pokok</th>
                            <th>Target Pengerjaan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adm_walass as $a)
                        <tr>
                            <td>{{ $a->materiPokok }}</td>
                            <td>{{ $a->targetPengerjaan }}</td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate{{ $a->id }}">Update</button>
                                <button data-toggle="modal" data-target="#hapusData" type="button" class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


    
    <!-- Delete Data Keuangan -->
    @foreach ($adm_walass as $k)
    <div class="modal" tabindex="-1" id="hapusData">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data ADM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda Yakin Ingin Menghapus Data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/adm/hapus/{{ $k->id }}"><button type="button" class="btn btn-danger">Delete</button></a>
            </div>
            </div>
        </div>
        </div>
        @endforeach
    
    
        <!-- Modal Update Barang-->
    @foreach($adm_walass as $a)

    <div class="modal fade" id="modalUpdate{{ $a->id }}" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Management Walas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" action="/adm/update/{{ $a->id }}">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Materi Pokok</label>
                        <input type="text" name="materiPokok" class="form-control" placeholder="Materi Pokok" value=" {{ $a->materiPokok }}">

                        @if($errors->has('materiPokok'))
                            <div class="text-danger">
                                {{ $errors->first('materiPokok')}}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Target Pengerjaan</label>
                        <input type="date" name="target" id="target">

                        @if($errors->has('target'))
                            <div class="text-danger">
                                {{ $errors->first('target')}}
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Tambah -->
    <div class="modal" tabindex="-1" id="addData">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Keuangan Kelas </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="/adm/tambah">

            {{ csrf_field() }}

            <div class="form-group">
                <label>Materi Pokok</label>
                <input type="text" name="materiPokok" class="form-control" placeholder="Materi Pokok">

                @if($errors->has('materi_pokok'))
                    <div class="text-danger">
                        {{ $errors->first('materi_pokok')}}
                    </div>
                @endif

            </div>

            <div class="form-group">
                <label>Target Pengerjaan</label>
                <input type="date" name="target" id="target">

                @if($errors->has('target_pengerjaan'))
                    <div class="text-danger">
                        {{ $errors->first('target_pengerjaan')}}
                    </div>
                @endif
            </div>
            <div class="input-group mb-3">
                    <select class="custom-select" id="kode" name="kode">
                        <option selected>Choose...</option>
                        <option value="1234">XII RPL 1</option>
                        <option value="4321">XII RPL 2</option>
                        <option value="123">XI RPL 1</option>
                    </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Simpan">
            </div>

            </form>
        </div>
    </div>

@endsection