@extends('client.index')
@section('content')
<div class="page-wrapper">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="block">
              <div class="product-list">
                <form method="post">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="">Item Name</th>
                        <th class="">Item Price</th>
                        <th class="">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					@foreach($dataCartUser as $key => $value)
                      <tr class="">
                        <td class="">
                          <div class="product-info">
                            @php 
                                $image = explode(',', $value['image']);
                            @endphp
                            <img width="80" src="{{ asset('assets/uploads/product/'. $image[0]) }}" alt="" />
                            <a href="#!">{{$value['name']}}</a>
                          </div>
                        </td>
                        <td class="">{{$value['price']}}</td>
                        <td class="">
                          <a class="product-remove" href="#!">Remove</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <a href="checkout.html" class="btn btn-main pull-right">Checkout</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="{{ asset('assets/client/js/common.js') }}"></script>
@endsection