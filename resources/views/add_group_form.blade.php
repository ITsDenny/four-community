@include('partial.header')
@include('partial.sidebar')
<main class="main" id="main">
<section class="section">

        <div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
</div>
<h5 class="card-title">General Form Elements</h5>

<!-- General Form Elements -->
<form>
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Text</label>
    <div class="col-sm-10">
      <input type="text" class="form-control">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control">
    </div>
    </div>

    
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Submit Form</button>
    </div>
    </div>
</section>
</main>
@include('partial.footer')
