@include('partial.header')
@include('partial.sidebar')
<main class="main" id="main">
    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Group form</h5>
                    <!-- General Form Elements -->
                    <form action="{{ route('submit-group') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-switch">
                                    <input type="hidden" name="status" value="0"> <!-- Default value if unchecked -->
                                    <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckDefault" value="1">
                                    <span class="slider round"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Save</label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form><!-- End General Form Elements -->
                </div>
            </div>
        </div>
    </section>
</main>
@include('partial.footer')
