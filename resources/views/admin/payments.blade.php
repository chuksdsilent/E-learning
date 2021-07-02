@extends('admin.partials.layout')
@section('title', 'Students')
@section('content')
<div class="col-md-12">
    <div class="ca">
        <div class="card mt-4 px-3 py-3" style="overflow: auto;">
            <h3 class="mt-3 mx-5"> <i class="fas fa-user-friend"></i>Payments</h3>
            <hr />
            <div class="table">
                <table class="table table-striped" id="videos">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email </th>
                            <th scope="col">Plan </th>
                            <th scope="col">Plan Cost </th>
                            <th scope="col">Start Date </th>
                            <th scope="col">End Date </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($payments->count() > 0)
                        <?php $i=1; ?>
                        @foreach ($payments as $item)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>
                                <a href="">{{$item->student_email}}</a>
                            </td>
                            <td>
                                {{$item->sub_plan}}
                            </td>
                            <td>
                                {{$item->amount}}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->updated_at)->format('d M, Y') }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->expiry_date)->format('d M, Y') }}
                            </td>
                        </tr>

                        @endforeach

                        @else

                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
