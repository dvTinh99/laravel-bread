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
                  <th> Name </th>
                  <th> Type </th>
                  <th> Description </th>
                  <th> Price </th>
                  <th> Discount Price </th>
                  <th> Image </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)

                <tr class="table-info">
                  <td> {{ $product->id }} </td>
                  <td> {{ $product->name }} </td>
                  <td> {{ $product->id_type }} </td>
                  <td> {{ $product->description }} </td>
                  <td> {{ $product->unit_price }} </td>
                  <td> {{ $product->promotion_price }} </td>
                  <td> <img src="{{ asset('image/product/' . $product->image) }}" alt=""> </td>
                  <td>
                    <button class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#defaultModal"> EDIT </button>
                    <button class="btn btn-danger" onclick="deleteProduct({{ $product->id }})"> DELETE 3</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <nav aria-label="Page navigation example" class="mt-3 d-flex justify-content-end">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="?page={{ $products->currentPage() - 1 }}">Previous</a></li>
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="?page={{ $i }}"> {{ $i }}</a></li>
                @endfor
                <li class="page-item"><a class="page-link" href="?page={{ $products->currentPage() + 1 }}">Next</a></li>
            </ul>
          </nav>

          <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table border="1px" style="width:100%" id="order-detail">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Type</th>
                                                        <th>Description</th>
                                                        <th>price</th>
                                                        <th>discount</th>
                                                        <th>image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

    async function deleteOrder(id) {
                let data = await callApi("/order/" + id, 'delete');
                alert(data);
                location.reload();
            }

            async function callApi(url, method, objectData = null) {
                return await $.ajax({
                    url: url,
                    method: method,
                    data: objectData,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                }).done(function(data) {
                    return data
                });
            }

        async function deleteProduct(id) {
        // alert('product deleted');
        let data = await callApi("/admin/product-delete/" + id, 'delete');
        alert(data);
        location.reload();

    }
</script>
@endsection
