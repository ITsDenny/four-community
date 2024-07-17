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
                                <!-- START FORM -->
                                <form action='{{ route('submit-user') }}' method='post'>
                                    @csrf
                                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name='nama' id="nama">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name='email' id="email">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-10"><button type="submit" class="btn btn-primary"
                                                    >SIMPAN</button></div>
                                        </div>
                                </form>
                    </div>
                    <!-- AKHIR FORM -->
                    </head>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
</body>

</html>
