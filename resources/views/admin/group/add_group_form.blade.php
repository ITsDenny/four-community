@include('partial.header')
@include('partial.sidebar')
<main class="main" id="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-10">
                <button type="button" class="btn-close" data-bs-dismiss="member" aria-label="Close"></button>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Group form</h5>

                    <!-- General Form Elements -->

                    <form action="{{ route('submit-group') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">status</label>
                            <div class="col-sm-10">
                                <input type="checkbox" name='status'>
                                <span class="slider round"></span>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>
                    </form><!-- End General Form Elements -->

</main>
@include('partial.footer')
