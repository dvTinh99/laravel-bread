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
                                        <th> Gender </th>
                                        <th> Email </th>
                                        <th> Address </th>
                                        <th> Phone </th>
                                        <th> Note </th>
                                        <th> Payment Method </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="table-info">
                                            <td> {{ $order->id }} </td>
                                            <td> {{ $order->name }} </td>
                                            <td> {{ $order->gender }} </td>
                                            <td> {{ $order->email }} </td>
                                            <td> {{ $order->address }} </td>
                                            <td> {{ $order->phone }} </td>
                                            <td> {{ $order->note }} </td>
                                            <td> {{ $order->payment_method }} </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#defaultModal"
                                                    onclick="getDetail({{ $order->id }})">Detail</button>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="deleteOrder({{ $order->id }})">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example" class="mt-3 d-flex justify-content-end">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link"
                                        href="?page={{ $orders->currentPage() - 1 }}">Previous</a></li>
                                @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                    <li class="page-item {{ $orders->currentPage() == $i ? 'active' : '' }}"><a
                                            class="page-link" href="?page={{ $i }}"> {{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item"><a class="page-link"
                                        href="?page={{ $orders->currentPage() + 1 }}">Next</a></li>
                            </ul>
                        </nav>
                        <div class="fluid-container py-4">
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
                                                        <th>Quatity</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            Total : <span id="total">0<span>
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
        async function getDetail(id) {
            let data = await callApi("/order/detail/" + id, 'get')
            let tr = $("#order-detail tbody tr").remove();

            let td = '';
            let total = 0;
            if (data.length > 0) {

                data.forEach(e => {
                    td += `<tr>
                        <td>${e.product.name}</td>
                        <td>${e.quantity}</td>
                        <td>${e.product.unit_price}</td>
                    </tr>`;

                    total += e.product.unit_price;
                });
                tableBody = $("#order-detail tbody");
            }
            tableBody.append(td);

            $("#total").text(total);
        }

    </script>
@endsection
