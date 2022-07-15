@extends('template.web')

@section('title', 'category_data')

@section('main-content')
    <div class="section-header flex-col">
        <h1 class="title-section mb-8  self-start">Create New Category</h1>
        @error('name_category')
            <div class="alert alert-error shadow-lg mb-12 w-1/2 self-start">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            </div>
        @enderror
        @if (session('success_message'))
            <div class="alert alert-success shadow-lg mb-12 w-1/2 self-start">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success_message') }}</span>
                </div>
            </div>
        @endif
    </div>

    <section class="form-data card">
        <div class="card-body">
            <form action="{{ route('create_category') }}" method="POST" id="category-form" autocomplete="off">
                @csrf

                <div class="form-control">
                    <label for="name_category" class="label">
                        <span class="label-text">Name Category</span>
                    </label>
                    <input type="text" name="name_category" id="name-category" class="input-form input input-bordered"
                        placeholder="input category name">
                </div>

                <span class="badge-note">
                    Note : You Cannot Add New Category Already Exist
                </span>

                <button type="submit" name="submit-form" class="btn btn-secondary">Create Data</button>

            </form>
        </div>
    </section>

    <div class="table-section">
        <h1 class="title-section">Table Category</h1>

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">

                {{-- head --}}
                <thead>
                    <tr class="text-center">
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                {{-- tbody --}}
                <tbody>
                    @foreach ($AllDataCategory as $data)
                        <tr class="text-center">
                            <td>{{ $data['name_category'] }}</td>
                            <td class="flex justify-center">
                                <form action="{{ route('delete_category', $data['name_category']) }}" method="post"
                                    id="form_delete">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" id="delete_action" class="badge badge-secondary">Delete</button>
                                </form>
                                <div class="divider divider-horizontal"></div>
                                <label for="edit-modal" class="badge badge-primary modal-button cursor-pointer"
                                    id="edit-btn" data-category="{{ $data['name_category'] }}">Edit</label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="edit-modal" class="modal-toggle" />
    <div class="modal">

        <div class="modal-box form-data">
            <label for="edit-modal" class="btn btn-square btn-ghost btn-sm mb-5 ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </label>
            <form id="category-form" method="post">
                @method('PUT')
                @csrf

                <div class="form-control">
                    <label for="name_category" class="label">
                        <span class="label-text">Name Category</span>
                    </label>
                    <input type="text" name="name_category" id="name-category" class="input-form input input-bordered"
                        placeholder="input category name">
                </div>

                <span class="badge-note">
                    Note : You Cannot Add New Category Already Exist
                </span>

                <button type="submit" name="submit-form" class="btn btn-secondary">Create Data</button>

            </form>
        </div>
    </div>

@endsection
