@include('partial.header')
@include('partial.sidebar')
<main class="main" id="main">
<section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>

              <!-- General Form Elements -->
              <form>
              <form action="{{ route('submit-member') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">description</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
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