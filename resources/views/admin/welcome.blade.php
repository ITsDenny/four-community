@include('partial.header')
@include('partial.sidebar')

<main class="main" id="main">
   <h1>Hello, {{ Auth::user()->name }}!</h1>
</main>
@include('partial.footer')
