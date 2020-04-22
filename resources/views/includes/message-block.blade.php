@if (count($errors) > 0)
    <div class="row">
        <div class="col-md-6 error">
            <ul class="text-red">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if (Session::has('message'))
<div class="row">
  <div class="col-md-6 success">
      <ul class="text-red">
          {{Session::get('message')}}
      </ul>
  </div>
</div>
@endif