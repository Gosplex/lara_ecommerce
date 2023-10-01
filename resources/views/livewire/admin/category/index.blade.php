<div>

    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='destroyCategory'>
                    <div class="modal-body">
                        <h6>Are you sure you want to delete product and all it's details?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text-white">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Categories
                        <a href="{{ url('admin/category/create') }}"
                            class="btn btn-primary btn-sm float-end text-white">Add
                            Category
                        </a>
                        </h4>
                </div>
                <section class="intro h-100">
                    <div class="bg-image h-100" style="background-color: #f5f7fa;">
                        <div class="mask d-flex align-items-center h-100">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="card-body p-0">
                                            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                                style="position: relative;">
                                                <table class="table table-striped mb-5 mt-5">
                                                    <thead
                                                        style="background-color: #6493FF; color: #fff; position:sticky; top:0;">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($categories as $category)
                                                            <tr>
                                                                <td>{{ $category->id }}</td>
                                                                <td>{{ $category->name }}</td>
                                                                <td>{{ $category->status == '1' ? 'Visible' : 'Hidden' }}
                                                                </td>
                                                                <td>
                                                                    <img src="{{ asset('uploads/category/' . $category->image) }}"
                                                                        alt="" style="border-radius: none;" />
                                                                </td>
                                                                <td>
                                                                    <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                                                        class="btn btn-success text-white">Edit</a>
                                                                    <a href="#"
                                                                        class="btn btn-danger text-white ml-2"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteModal"
                                                                        wire:click='deleteCategory({{ $category->id }})'>
                                                                        Delete
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="d-flex justify-content-center">
                                                    {{ $categories->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>

</div>
