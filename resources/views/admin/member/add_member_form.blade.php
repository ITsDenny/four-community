@include('partial.header')
@include('partial.sidebar')
<main class="main" id="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Member</h5>
                        <form action="{{ route('submit-member') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(session()->has('success'))
                                <script>
                                    alert("{{ session()->get('success') }}");
                                </script>
                            @endif

                            @if(session()->has('error'))
                                <script>
                                    alert("{{ session()->get('error') }}");
                                </script>
                            @endif
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nik" name="nik" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="birth_date" class="col-sm-2 col-form-label">Birth of Date</label>
                                <div class="col-sm-10">
                                    <input type="date" id="birth_date" name="birth_date" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="place_of_birth" class="col-sm-2 col-form-label">Place Of Birth</label>
                                <div class="col-sm-10">
                                    <input type="text" id="place_of_birth" name="place_of_birth" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" id="address" name="address" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <select id="gender" class="form-select" name="gender" aria-label="Select gender">
                                        <option selected>Gender</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-Laki</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="level_id" class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-10">
                                    <select id="level_id" class="form-select" name="level_id" aria-label="Select level">
                                        <option selected>Level</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('partial.footer')

<script>
    document.getElementById('birth_date').addEventListener('change', function() {
        let input = this.value;
        let dateEntered = new Date(input);
        if (!isNaN(dateEntered)) {
            let year = dateEntered.getFullYear();
            let month = ('0' + (dateEntered.getMonth() + 1)).slice(-2);
            let day = ('0' + dateEntered.getDate()).slice(-2);
            this.value = `${year}-${month}-${day}`;
        }
    });
</script>
