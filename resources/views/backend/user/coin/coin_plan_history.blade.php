@extends('backend.layouts.user_panel')
@section('title','Myanbox | Ordered Coin History')

@section('content')
<div class="freelancers">
   <section class="inner-heading" style="background-image: url('{{ asset('storage/member/'.$projectsetting->member_background_image)}}');">
    <div class="container">
    <h1>{{ Auth()->user()->name }}'s Ordered Coin History</h1>
    </div>
  </section>
  <section class="inner-wrap">
      <div class="container">
        <div class="row">
           <ul class="blog-grid">
                        <div class="col-md-9 col-sm-12">
                            <li>
                                 @if(count($coin_histories) > 0 )
                    <div class="blog-inter">
                                  <div class="row">
                                     <div class="col-md-12 table-responsive">

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
                                                    @foreach($coin_histories as $coinplan_list)
                                                        <tr>
                                                            <td width="5%">{{ $coin_plan_count }}</td>
                                                            <td width="20%"><?= number_format($coinplan_list->coin_count) ?></td>
                                                            <td width="25%"><?= number_format($coinplan_list->price) ?> <?= $coinplan_list->currency_unit->unit?></td>
                                                            <td width="25%"><?= $coinplan_list->pivot->status ?></td>
                                                            <td width="25%"><?= $coinplan_list->created_at  ?></td>
                                                        </tr>
                                                        @php $coin_plan_count +=1 @endphp
                                                      @endforeach
                                        </tbody>
                                    </table>
                                      <div class="pagination-area">
                                        <ul class="pagination">
                                         {!! $coin_histories->links() !!}
                                          </ul>
                                       </div>
                                     </div>
                                    </div>
                                </div>
                                @else
                                 <div class="blog-inter" style="min-height:350px">
                                    @include('element.404')
                                 </div>
                                @endif
                                </li>
                                </div>
                            @include('backend.element.user_menu')
            </ul>
    </div>
</div>
 </section>
    @endsection
