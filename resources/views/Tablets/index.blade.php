@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">

        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('tablets.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr style="text-transform:capitalize;">
        <th>ID</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Colour</th>
        <th>CPU Vendor</th>
        <th>CPU Model</th>
        <th>RAM</th>
        <th>Stoarge</th>
        <th>Screen Size</th>
        <th>Power Supply</th>
        <th>Power supply Details</th>
        <th>Acessories</th>
        <th>S/N</th>
        <th>Owner</th>
        <th>location</th>
        <th>Comments</th>
        <th>Actions</th>
    </tr>
    @foreach ($tablets as $product)
    <tr style="text-transform:capitalize;">
        <td>{{ ++$i }}</td>
        {{-- <td>{{ $product->id }}</td> --}}
        <td>{{ $product->brand }}</td>
        <td>{{ $product->model }}</td>
        <td>{{ $product->color }}</td>
        <td>{{ $product->cpu_vendor }}</td>
        <td>{{ $product->cpu_model }}</td>
        <td>{{ $product->ram }}</td>
        <td>{{ $product->storage }}</td>
        <td>{{ $product->screen_size }}</td>
        <td>{{ $product->power_supply }}</td>
        <td>{{ $product->power_supply_details }}</td>
        <td>{{ $product->accessories }}</td>
        <td>{{ $product->sn }}</td>
        <td>{{ $product->owner }}</td>
        <td>{{ $product->location }}</td>
        <td>{{ $product->comments }}</td>
        <td>
            <form action="{{ route('tablets.destroy',$product->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('tablets.edit',$product->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $tablets->links() !!}

@endsection