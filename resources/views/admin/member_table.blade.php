@include('partial.header')
@include('partial.sidebar')
<main class="main" id="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="datatable">
                          <a href="/member/add-member">
                        <button type="button" class="btn btn-primary mt-2 mb-2" >
                            <i class="bi bi-person-fill-add"></i> Add new member
                        </button>
                        </a>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th data-type="date" data-format="YYYY/MM/DD">Tgl Lahir</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->nik }}</td>
                                    <td>{{ $member->gender === 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                    <td>{{ $member->birth_date }}</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" {{ $member->status ? 'checked' : '' }} disabled>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#verticalycentered">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <form action="/member/{{ $member->id }}/delete" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this member?');">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- update member modal -->
        <div class="modal fade" id="verticalycentered" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form update member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('update-member', ['id' => $member?->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" value="{{ $member->name }}"> 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" value="{{ $member->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nik" class="form-control" value="{{ $member->nik }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Birth of Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="birth_date" class="form-control" value="{{ $member->birth_date }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Place Of Birth</label>
                                <div class="col-sm-10">
                                    <input type="text" name="place_of_birth" class="form-control" value="{{ $member->place_of_birth }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" value="{{ $member->address }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="gender" aria-label="Select gender">
                                        <option selected>{{ $member->gender === 'L' ? 'Laki-Laki' : 'Perempuan' }}</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-Laki</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="level_id" aria-label="Select level">
                                        <option value=1 {{ $member->level_id == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value=2 {{ $member->level_id == 2 ? 'selected' : '' }}>Moderator</option>
                                        <option value=3 {{ $member->level_id == 3 ? 'selected' : '' }}>Member</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- End update member modal-->
    </section>
</main>

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 34px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 20px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 14px;
        width: 14px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:checked+.slider:before {
        transform: translateX(14px);
    }
    .slider.round {
        border-radius: 20px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

</style>
@include('partial.footer')
