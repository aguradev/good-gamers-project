@extends('template.web')

@section('title', 'Gamelist')

@section('main-content')

    {{-- <section class="section-header mb-10">
        <form action="" class="search-header" autocomplete="off">
            <div class="search-game">
                <input type="text" placeholder="Search List Game" class="form-control input w-full">
                <button type="submit">
                    <i class='bx bx-search icon-search'></i>
                </button>
            </div>
        </form>

    </section> --}}

    @if (is_null($dataGames))
        <div class="data-not-found">
            <img src="{{ asset('storage/assets/cta-image/data-not-found.svg') }}" alt="data-not-found-img" class="img-cta">
            <div class="content-text">
                <h1>Data Not Found</h1>
                <p>Create New Game List Here</p>
                <a href="{{ route('gamelist-data.create') }}" class="btn btn-secondary">Create First Gamelist</a>
            </div>
        </div>
    @else
        <div class="table-section">
            <h1 class="title-section">Game List Table</h1>

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">

                    {{-- head --}}
                    <thead>
                        <tr class="text-center">
                            <th>Title Game</th>
                            <th>Price</th>
                        </tr>
                    </thead>

                    {{-- tbody --}}
                    <tbody>
                        @foreach ($dataGames as $item)
                            <tr class="text-center">
                                <td>{{ $item['title_game'] }}</td>
                                <td class="price-color">
                                    @if ($item['price'] == 1)
                                        {{ 'free' }}
                                    @else
                                        IDR.{{ number_format($item['price']) }}
                                    @endif
                                </td>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    @endif



@endsection
