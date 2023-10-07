<div>

    @include('livewire.admin.brand.modal-form')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Brand List <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal"
                            class="btn btn-primary btn-sm text-white float-end">Add Brands</a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Brand Name</th>
                                    <th>Category</th>
                                    <th>Brand Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->category->name }}</td>
                                        <td>{{ $brand->slug }}</td>
                                        <td>
                                            @if ($brand->status == '1')
                                                <span class="badge bg-success">Available</span>
                                            @else
                                                <span class="badge bg-danger">Unavailable</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" wire:click="editBrand({{ $brand->id }})"
                                                data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                                class="btn btn-primary text-white">Edit</a>
                                            <a href="#" wire:click="deleteBrand({{ $brand->id }})"
                                                class="btn btn-danger text-white" data-bs-toggle="modal"
                                                data-bs-target="#deleteBrandModal">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
