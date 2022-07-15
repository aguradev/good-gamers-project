@extends('template.web')

@section('title', 'payment gateway')

@section('main-content')
    <div class="section-header flex-col">
        <h1 class="title-section mb-8  self-start">Payment Gateway</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $messages)
                <div class="alert alert-error shadow-lg mb-8 w-1/2 self-start">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ $messages }}</span>
                    </div>
                </div>
            @endforeach
        @endif
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
            <form action="{{ route('payment-gateway.store') }}" method="POST" autocomplete="off"
                enctype="multipart/form-data">
                @csrf

                <div class="form-control">
                    <label for="name_category" class="label">
                        <span class="label-text">Name Payment Gateway</span>
                    </label>
                    <input type="text" name="name_payment_gateway" id="name-payment-gateway"
                        class="input-form input input-bordered" placeholder="input payment gateway"
                        value="{{ old('name_payment_gateway') }}">
                </div>

                <div class="img-thumbnail-form">
                    <img class="image-form" id="display-image">
                </div>

                <span class="badge-note mb-2 badge-resolution">
                    Recommended Resolution : 100 x 50
                </span>

                <div class="form-control">
                    <label for="payment_logo" class="label">
                        <span class="label-text">Payment Logo</span>
                    </label>
                    <input type="file" name="payment_logo" id="image_input" class="input-file">
                </div>

                <span class="badge-note">
                    Note : You cannot create existing data
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
                        <th>Name Payment Gateway</th>
                        <th>Cover</th>
                        <th>Action</th>
                    </tr>
                </thead>

                {{-- tbody --}}
                <tbody>
                    @foreach ($DataPayments as $data)
                        <tr class="text-center p-8">
                            <td>{{ $data['name_payment_gateway'] }}</td>
                            <td class="payment-cover-td">
                                <img src="{{ asset('storage/' . $data['payment_logo']) }}" alt="cover-payment"
                                    class="data-payment">
                            </td>
                            <td class="flex justify-center">
                                <form action="{{ route('payment-gateway.destroy', $data['slug']) }}" method="post"
                                    id="form_delete">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" id="delete_action" class="badge badge-secondary">Delete</button>
                                </form>
                                <div class="divider divider-horizontal"></div>
                                <label for="edit-modal" class="badge badge-primary modal-button cursor-pointer"
                                    id="edit_payment" data-slug="{{ $data['slug'] }}">Edit</label>
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
            <form action="{{ route('payment-gateway.store') }}" method="POST" id="form-modal" autocomplete="off"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <input type="hidden" name="old_payment_logo">

                <div class="form-control">
                    <label for="name_payment_gateway" class="label">
                        <span class="label-text">Name Payment Gateway</span>
                    </label>
                    <input type="text" name="name_payment_gateway" id="name-payment-gateway"
                        class="input-form input input-bordered" placeholder="input payment gateway"
                        value="{{ old('name_payment_gateway') }}">
                </div>

                <div class="img-thumbnail-form">
                    <img class="image-form" id="display-modal-image">
                </div>

                <span class="badge-note mb-2 badge-resolution">
                    Recommended Resolution : 100 x 50
                </span>

                <div class="form-control">
                    <label for="payment_logo" class="label">
                        <span class="label-text">Payment Logo</span>
                    </label>
                    <input type="file" name="payment_logo" id="payment_modal_logo" class="input-file">
                </div>

                <span class="badge-note">
                    Note : You cannot create existing data
                </span>

                <button type="submit" name="submit-form" class="btn btn-secondary">Create Data</button>

            </form>
        </div>
    </div>

@endsection
