@include('partial.header')
@include('partial.sidebar')
<main class="main" id="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <table class="table"> 
                                <a href="/group/add-group">
                                    <button type="button" class="btn btn-primary mt-2 mb-2 col-lg-2" >
                                         <i class="bi bi-patch-plus-fill"></i> Add Group
                                    </button>
                                </a> 
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $group)
                                <tr>
                                    <td>{{ $group->name }}</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" {{ $group->status ? 'checked' : '' }} >
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#verticalycentered">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <form action="/group/{{ $group->id }}/delete" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this group?');">
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
                    <h5 class="modal-title">Form update group</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(isset($group))
                    <form action="{{ route('update-group', ['id' => $group->id]) }}"method="POST">
                        @csrf
                        @method('PUT')
    
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{ $group->name }}">
                            </div>
                        </div>
    
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="checkbox" name="status" {{ $group->status ? 'checked' : '' }}>
                            </div>
                        </div>
    
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Submit</label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <p>No group data available.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
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

    /* Rounded sliders */
    .slider.round {
        border-radius: 20px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

</style>
@include('partial.footer')
