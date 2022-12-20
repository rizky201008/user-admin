@extends('masters.layout') @section('title', 'Admin | User') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agama</h1>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Agama</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="my-2 mr-3" style="float: right;">
                                <a
                                    href="{{ route('religion40.create') }}"
                                    class="btn btn-info"
                                >
                                    <span class="fas fa-plus"></span>
                                    Tambah Data Agama
                                </a>
                            </div>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">#</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp @foreach($religions
                                    as $religion)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $religion->nama_agama }}</td>
                                        <td style="display: flex">
                                            <a
                                                href="{{ route('religion40.edit', $religion->id) }}"
                                                class="btn btn-outline-warning mr-2"
                                                >Edit</a
                                            >
                                            <form
                                                action="{{ route('religion40.delete', $religion->id) }}"
                                                method="post"
                                            >
                                                @csrf @method('delete')
                                                <button
                                                    type="submit"
                                                    class="btn btn-outline-danger"
                                                >
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>

                                        @php $count++; @endphp
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
