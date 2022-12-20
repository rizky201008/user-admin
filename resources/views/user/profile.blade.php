@extends('masters.layout')

@section('title', 'User | Profile')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
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
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Foto Profil</h3>
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
                        <!-- form start -->
                        <form action="{{ route('profile40.avatar.update') }}" method="POST"
                            enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="file" name="avatar" class="form-control">
                                    </div>

                                    @if($errors->has('avatar'))
                                    <div class="text-danger">
                                        {{ $errors->first('avatar') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right">
                                    Simpan
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('profile40.password.update') }}" method="POST" class="form-horizontal">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <input type="password" name="old_password" placeholder="Password Lama"
                                                class="form-control">

                                            @if($errors->has('old_password'))
                                            <div class="text-danger">
                                                {{ $errors->first('old_password') }}
                                            </div>
                                            @endif
                                        </div>

                                        <div class="form-group row">
                                            <input type="password" name="new_password" placeholder="Password Baru"
                                                class="form-control">

                                            @if($errors->has('new_password'))
                                            <div class="text-danger">
                                                {{ $errors->first('new_password') }}
                                            </div>
                                            @endif
                                        </div>

                                        <div class="form-group row">
                                            <input type="password" name="new_password_confirmation"
                                                placeholder="Konfirmasi Password Baru" class="form-control">

                                            @if($errors->has('new_password_confirmation'))
                                            <div class="text-danger">
                                                {{ $errors->first('new_password_confirmation') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if($errors->has('avatar'))
                                <div class="text-danger">
                                    {{ $errors->first('avatar') }}
                                </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right">
                                    Simpan
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-md-8">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Detail Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('profile40.update') }}" method="POST" enctype="multipart/form-data"
                            class="form-horizontal">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="inputName"
                                            placeholder="Nama Lengkap" value="{{ $user->name }}" />

                                        @if($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="inputEmail"
                                            placeholder="Email" value="{{ $user->email }}" disabled />

                                        @if($errors->has('email'))
                                        <div class="text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" id="inputAlamat" cols="30" rows="2" class="form-control"
                                            placeholder="Alamat">{{ $user->detailData->alamat }}</textarea>

                                        @if($errors->has('alamat'))
                                        <div class="text-danger">
                                            {{ $errors->first('alamat') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputTempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tempat_lahir" class="form-control"
                                            id="inputTempatLahir" placeholder="Tempat Lahir"
                                            value="{{ $user->detailData->tempat_lahir }}" />

                                        @if($errors->has('tempat_lahir'))
                                        <div class="text-danger">
                                            {{ $errors->first('tempat_lahir') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="tanggal_lahir" class="form-control"
                                            id="inputTanggalLahir" placeholder="Tanggal Lahir"
                                            value="{{ $user->detailData->tanggal_lahir }}" />

                                        @if($errors->has('tanggal_lahir'))
                                        <div class="text-danger">
                                            {{ $errors->first('tanggal_lahir') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputReligion" class="col-sm-2 col-form-label">Agama</label>
                                    <div class="col-sm-10">
                                        <select name="religion" id="inputReligion" class="form-control select">
                                            <option value="">-- Pilih Agama --</option>
                                            @foreach($religions as $religion)
                                            <option value="{{ $religion->id }}" @if($user->detailData->id_agama ==
                                                $religion->id) selected @endif>{{ $religion->nama_agama }}</option>
                                            @endforeach
                                        </select>

                                        @if($errors->has('religion'))
                                        <div class="text-danger">
                                            {{ $errors->first('religion') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="uploadKtp" class="col-sm-2 col-form-label">Foto KTP</label>
                                    <div class="col-sm-10">
                                        <div>
                                            @if (empty($user->detailData->foto_ktp))
                                            <p>Belum ada foto KTP.</p>
                                            @else
                                            <img style="width: 30%; aspect-ratio: 1/1;"
                                                src="{{ asset('uploads/ktp/'.$user->detailData->foto_ktp) }}"
                                                alt="ktp-user">
                                            @endif
                                        </div>
                                        <input type="file" name="uploadKtp" id="uploadKtp" class="form-control">

                                        @if($errors->has('uploadKtp'))
                                        <div class="text-danger">
                                            {{ $errors->first('uploadKtp') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputUmur" class="col-sm-2 col-form-label">Umur</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="age" class="form-control" id="inputUmur"
                                            placeholder="Umur" value="{{ $user->detailData->umur }}" />

                                        @if($errors->has('age'))
                                        <div class="text-danger">
                                            {{ $errors->first('age') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right">
                                    Simpan
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection