@extends('backend.layouts.company_panel')
@section('title','Coin Plan Histroy')
@section('content')

<div class="col-md-9 col-sm-12">


<li>
@if(count($coin_histories) > 0 )
    <div class="blog-inter">
        <table class="table table-stripe">
            <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Coin Count</th>
                <th width="25%">Price</th>
                <th width="25%">Status</th>
                <th width="25%">Ordered Date</th>
            </tr>
            </thead>
            <tbody>
            @php $coin_plan_count= 1; @endphp
            @if(!empty($coin_histories))
                @foreach($coin_histories as $coinplan_list)
                    <tr>
                        <td>{{ $coin_plan_count }}</td>
                        <td><?= number_format($coinplan_list->coin_count) ?></td>
                        <td><?= number_format($coinplan_list->price) ?> <?= $coinplan_list->unit?></td>
                        <td><?= $coinplan_list->status ?></td>
                        <td><?= $coinplan_list->created_at  ?></td>
                    </tr>
                    @php $coin_plan_count +=1 @endphp
                @endforeach
            @endif
            <!--<tr> -->
            <!--  <td>2</td> -->
            <!--  <td>10000</td> -->
            <!--  <td>200000</td> -->
            <!--  <td>approved</td> -->
            <!--  <td>2020-10-20 18:40:49</td> -->
            <!--</tr>-->
            </tbody>
        </table>
    </div>
    <div class="pagination-area">
        <ul class="pagination">
            {{ $coin_histories->links() }}
        </ul>
    </div>
@else
    <div class="blog-inter" style="min-height:350px">
        @include('element.404')
    </div>
@endif
</li>
</div>
@endsection



