
<!doctype html>
@include('partial.header')
@include('partial.sidebar')
<html lang="en">
    <main class="main" id="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="datatable">
                                <head>
                                                    <!-- START DATA -->
                                                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                                                        <!-- FORM PENCARIAN -->
                                                        <div class="pb-3">
                                                            <form class="d-flex" action="" method="get">
                                                                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                                                                <button class="btn btn-secondary" type="submit">Cari</button>
                                                            </form>
                                                        </div>
                                                          <!-- TOMBOL TAMBAH DATA -->
                                                          <div class="pb-3">
                                                            <a href='/admin/user/create' class="btn btn-primary">+ Tambah Data</a>
                                                        </div>
                                                        <!-- table -->
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-1">No</th>
                                                                    <th class="col-md-3">Nama</th>
                                                                    <th class="col-md-4">Email</th>
                                                                    <th class="col-md-2">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>ujang</td>
                                                                    <td>ujang12@gmail.com</td>

                                                                    <td>
                                                                        <a href='' class="btn btn-warning btn-sm">Edit</a>
                                                                        <a href='' class="btn btn-danger btn-sm">Del</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </head>
                                            </table>
                                            <!-- AKHIR DATA -->
                                        </main>  
                                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> 
                                    </body>
                                    </html>