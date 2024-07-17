@include('partial.header')
@include('partial.sidebar')
<main class="main" id="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add new user</h5>
              <form class="row g-3" action="{{ route('add-user') }}" method="POST">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="inputEmail4">
                </div>
                <div class="col-12">
                    <select class="form-select" aria-label="Select member" name="member_id">
                        <option selected>Member List</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                    @endforeach
                      </select>
                  </div>
                <button type="submit" class="btn btn-primary">New user</button>
                </div>
              </form>
            </div>
          </div>
    </section>
</main>
@include('partial.footer')

