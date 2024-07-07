@include('partial.header')
@include('partial.sidebar')
<main class="main" id="main">
  <section class="section">
      <h5 class="card-title">Add new group</h5>
      <form method="POST" action="{{ url('admin/group') }}">
          @csrf
          <div class="mb-3 row">
              <label for="inputText" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="name">
              </div>
          </div>
          <div class="mb-3 row">
              <div class="col-sm-10 offset-sm-2">
                  <button type="submit" class="btn btn-primary">Submit Form</button>
              </div>
          </div>
      </form>
  </section>
</main>

@include('partial.footer')
