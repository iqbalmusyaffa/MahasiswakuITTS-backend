@extends('dashboard.layouts.app')

@section('content')
<!-- Dashboard -->
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Kategori</h3>
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        </div>


        <div class="form-group col-lg-12 col-md-12 mb-2">
            <a href="{{ route('category.create') }}" class="theme-btn btn-style-one">Tambah Kategori</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                        </div>

                        <div class="widget-content">
                            <div class="table-outer">
                                <table class="default-table manage-job-table">
                                    <thead>
                                        <tr>
                                            <th>Nama kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($categories as $item)

                                        <tr>
                                            <td>
                                                <h6>{{ $item->name }}</h6>

                                            </td>

                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">

                                                        <a href="{{ route('category.edit',$item->slug) }}">
                                                            <li><button data-text="Edit Kategori"><span
                                                                        class="la la-pencil"></span></button></li>
                                                        </a>

                                                        <form action="{{ route('category.destroy',$item->slug) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf

                                                            <li><button data-text="Hapus Kategori"
                                                                    onClick="return confirm('Are you sure?')"><span
                                                                        class="la la-trash"></span></button></li>
                                                        </form>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- End Dashboard -->
@endsection
