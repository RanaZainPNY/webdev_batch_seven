@extends('admin.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class='w-100  d-flex justify-content-between'>
                    <h5 class="card-title">Products</h5>
                    <a href="{{ route('admin-create-products') }}" class="btn bg-dark mx-2">Create Product</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap align-middle mb-0">
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0">
                                <th scope="col" class="ps-0">Id</th>
                                <th scope="col" class="ps-0">Name</th>
                                <th scope="col" class="ps-0">SKU</th>
                                <th scope="col">Image</th>
                                <th scope="col" class="text-center">Price</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row" class="ps-0 fw-medium">
                                        <span class="table-link1 text-truncate d-block">{{ $product->id }}</span>
                                    </th>
                                    <td>
                                        <a href="javascript:void(0)"
                                            class="link-primary text-dark fw-medium d-block">{{ $product->name }}</a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)"
                                            class="link-primary text-dark fw-medium d-block">{{ $product->sku }}</a>
                                    </td>
                                    <td class="text-center fw-medium">
                                        <img style='width: 75px;' src="{{ asset('uploads/products/' . $product->image) }}"
                                            alt="">
                                    </td>
                                    <td class="text-center fw-medium">{{ $product->price }}</td>
                                    <td class="text-center fw-medium">
                                        <a href="{{ route('admin-edit-product-form', $product->id) }}"
                                            class='btn btn-success'>Edit</a>
                                        <a href="{{ route('admin-products-remove', $product->id) }}"
                                            class='btn btn-danger'>Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            {{-- <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <span class="table-link1 text-truncate d-block">Modern Admin
                                        Dashboard Template</span>
                                </th>
                                <td>
                                    <a href="javascript:void(0)"
                                        class="link-primary text-dark fw-medium d-block">/dashboard</a>
                                </td>
                                <td class="text-center fw-medium">17,452</td>
                                <td class="text-center fw-medium">$0.97</td>
                            </tr>
                            <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <span class="table-link1 text-truncate d-block">Explore our
                                        product catalog</span>
                                </th>
                                <td>
                                    <a href="javascript:void(0)"
                                        class="link-primary text-dark fw-medium d-block">/product-checkout</a>
                                </td>
                                <td class="text-center fw-medium">12,180</td>
                                <td class="text-center fw-medium">$7,50</td>
                            </tr>
                            <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <span class="table-link1 text-truncate d-block">Comprehensive
                                        User Guide</span>
                                </th>
                                <td>
                                    <a href="javascript:void(0)" class="link-primary text-dark fw-medium d-block">/docs</a>
                                </td>
                                <td class="text-center fw-medium">800</td>
                                <td class="text-center fw-medium">$5,50</td>
                            </tr>
                            <tr>
                                <th scope="row" class="ps-0 fw-medium border-0">
                                    <span class="table-link1 text-truncate d-block">Check out our
                                        services</span>
                                </th>
                                <td class="border-0">
                                    <a href="javascript:void(0)"
                                        class="link-primary text-dark fw-medium d-block">/services</a>
                                </td>
                                <td class="text-center fw-medium border-0">1300</td>
                                <td class="text-center fw-medium border-0">$2,15</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
