@extends('bread.admin.master')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Table with contextual classes</h4>
          <p class="card-description"> Add class <code>.table-{color}</code>
          </p>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Full name </th>
                  <th> Email </th>
                  <th> Phone </th>
                  <th> Address </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)

                <tr class="table-info">
                  <td> {{ $user->id }} </td>
                  <td> {{ $user->full_name }} </td>
                  <td> {{ $user->email }} </td>
                  <td> {{ $user->phone }} </td>
                  <td> {{ $user->address }} </td>
                  <td>
                    <button class="btn btn-primary"> EDIT </button>
                    <button class="btn btn-danger"> DELETE </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
