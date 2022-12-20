@extends('masters.layout') @section('title', 'Admin | User') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail</h1>
                </div>
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div> -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Detail {{ $user->name }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="py-3" style="display: flex; justify-content: center;">
                            @if (empty($user->foto))
                            <p class="mt-3">Belum ada foto profile.</p>
                            @else
                            <img class="img-circle elevation-2" style="width: 50%; aspect-ratio: 1/1;"
                                src="{{ asset('uploads/avatars/'.$user->foto) }}" alt="avatar-user">
                            @endif
                        </div>

                        <div class="row px-5">
                            <label class="col-sm-3">Nama</label>
                            <p class="col-sm-1 text-right">:</p>
                            <p class="col-sm-8">{{ $user->name }}</p>

                            <label class="col-sm-3">Email</label>
                            <p class="col-sm-1 text-right">:</p>
                            <p class="col-sm-8">{{ $user->email }}</p>

                            <label class="col-sm-3">Role</label>
                            <p class="col-sm-1 text-right">:</p>
                            <p class="col-sm-8">{{ $user->role }}</p>

                            <label class="col-sm-3">Status</label>
                            <p class="col-sm-1 text-right">:</p>
                            <p class="col-sm-8">{{ $user->is_aktif ? 'Sudah teraktivasi' : 'Belum teraktivasi' }}</p>

                            <label class="col-sm-3">Alamat</label>
                            <p class="col-sm-1 text-right">:</p>
                            <p class="col-sm-8">{{ $user->detailData->alamat ?? '-' }}</p>

                            <label class="col-sm-3">Tempat Lahir</label>
                            <p class="col-sm-1 text-right">:</p>
                            <p class="col-sm-8">{{ $user->detailData->tempat_lahir ?? '-' }}</p>

                            <label class="col-sm-3">Tanggal Lahir</label>
                            <p class="col-sm-1 text-right">:</p>
                            <p class="col-sm-8">{{ $user->detailData->tanggal_lahir ?? '-' }}</p>

                            <label class="col-sm-3">Agama</label>
                            <p class="col-sm-1 text-right">:</p>
                            <p class="col-sm-8">{{ $user->detailData->agama->nama_agama ?? '-' }}</p>

                            <label class="col-sm-3">Foto KTP</label>
                            <p class="col-sm-1 text-right">:</p>
                            <p class="col-sm-8">
                                    @if (empty($user->detailData->foto_ktp))
                                    <span>-</span>
                                    @else
                                    <img style="width: 150px; aspect-ratio: 1/1;"
                                        src="{{ asset('uploads/ktp/'.$user->detailData->foto_ktp) }}"
                                        alt="ktp-user">
                                    @endif
                            </p>

                            <label class="col-sm-3">Umur</label>
                            <p class="col-sm-1 text-right">:</p>
                            <p class="col-sm-8">{{ isset($user->detailData->umur) ? $user->detailData->umur . ' tahun' : '-' }}</p>
                        </div>
                    </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
