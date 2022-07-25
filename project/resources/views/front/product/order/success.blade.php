<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cloudbay ">
    <meta name="keywords" content=" Cloudbay ">
    <meta name="author" content="Cloudbay">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>Cloudbay - Successfully Order </title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style type="text/css">
      body{
      text-align: center;
      margin: 0 auto;
      width: 650px;
      font-family: work-Sans, sans-serif;
      background-color: #f6f7fb;
      display: block;
      }
      ul{
      margin:0;
      padding: 0;
      }
      li{
      display: inline-block;
      text-decoration: unset;
      }
      a{
      text-decoration: none;
      }
      p{
      margin: 15px 0;
      }
      h5{
      color:#444;
      text-align:left;
      font-weight:400;
      }
      .text-center{
      text-align: center
      }
      .main-bg-light{
      background-color: #fafafa;
      box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);
      }
      .title{
      color: #444444;
      font-size: 22px;
      font-weight: bold;
      margin-top: 10px;
      margin-bottom: 10px;
      padding-bottom: 0;
      text-transform: uppercase;
      display: inline-block;
      line-height: 1;
      }
      table{
      margin-top:30px
      }
      table.top-0{
      margin-top:0;
      }
      table.order-detail , .order-detail th , .order-detail td {
      border: 1px solid #ddd;
      border-collapse: collapse;
      }
      .order-detail th{
      font-size:16px;
      padding:15px;
      text-align:center;
      }
      .footer-social-icon tr td img{
      margin-left:5px;
      margin-right:5px;
      }
    </style>
  </head>
  <body style="margin: 20px auto;">

    @if(!empty($tempcart))
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
      <tbody>
        <tr>
          <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td><img src="{{ asset('assets/images/order/delivery.png') }}" alt="" style=";margin-bottom: 30px;"></td>
                </tr>
                <tr>
                  <td><img src="{{ asset('assets/images/order/success.png') }}" alt=""></td>
                </tr>
                <tr>
                  <td>
                    <h2 class="title">thank you</h2>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Payment Is Successfully Processsed And Your Order Is On The Way</p>
                    <h2 class="title">Order# - {{$order->order_number}}</h2>
                    <p><a href="{{ route('home') }}">Get Back To Cloudbay</a></p>
                    @if($order->method != "cash")
                        @if($order->method=="Stripe")
                            <p>{{$order->method}} Transaction ID: {{$order->charge_id}}</p>
                        @endif

                        <p>{{$order->method}} Transaction ID: {{$order->txnid}}</p>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>
                    <div style="border-top:1px solid #777;height:1px;margin-top: 30px;"></div>
                  </td>
                </tr>
                <tr>
                  <td><img src="{{ asset('assets/images/order/order-success.png') }}" alt="" style="margin-top: 30px;"></td>
                </tr>
              </tbody>
            </table>
            <table border="0" cellpadding="0" cellspacing="0">
              <tbody>
                
                <tr>
                  <td>
                    <h2 class="title">YOUR ORDER DETAILS</h2><span class="ml-4">({{date('d-M-Y',strtotime($order->created_at))}})</span>
                  </td>
                </tr>
              </tbody>
            </table>
            <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left">
              <tbody>
                <tr align="left">
                  <th>PRODUCT</th>
                  <th style="padding-left: 15px;">DESCRIPTION</th>
                  <th>QUANTITY</th>
                  <th>PRICE </th>
                  <th>TOTAL </th>
                </tr>
                
                @foreach($tempcart->items as $product)
                <tr>
                  <td><img src="{{ $product['item']['image'] ? asset('assets/uploads/products/'.$product['item']['image']):asset('assets/uploads/noimage.png') }}" alt="" width="130"></td>
                  <td valign="top" style="padding-left: 15px;">
                    <h5 style="margin-top: 15px;"><strong> {{ $product['item']['name'] }}</strong> </h5>
                  </td>
                  <td valign="top" style="padding-left: 15px;">
                    <h5 style="font-size: 14px; color:#444;margin-top: 10px; margin-bottom: 0px;">QTY : <span>{{$product['qty']}}</span></h5>
                    @if(!empty($product['size']))
                    <h5 style="font-size: 14px; color:#444;margin-top:15px;    ">Size : <span> {{ $product['item']['measure'] }}{{str_replace('-',' ',$product['size'])}}</span></h5>
                    @endif
                    @if(!empty($product['color']))
                    <h5 style="font-size: 14px; color:#444;margin-top:15px;    ">Colour  <span> <span id="color-bar" style="border: 10px solid #{{$product['color'] == "" ? "white" : $product['color']}};"></span></span></h5>
                    @endif
                  </td>
                  <td valign="top" style="padding-left: 15px;">
                    <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>{{$order->currency_sign}}{{round($product['item_price'] * $order->currency_value,2)}}</b></h5>
                  </td>
                  <td valign="top" style="padding-left: 15px;">
                    <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>{{$order->currency_sign}}{{round($product['price'] * $order->currency_value,2)}}</b></h5>
                  </td>
                </tr>
                @endforeach


             


                <tr>
                  <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">Products:</td>
                  <td class="price" colspan="3" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>{{$order->currency_sign}}{{ round($tempcart->totalPrice * $order->currency_value , 2) }}</b></td>
                </tr>
                {{-- @if($order->coupon_discount)
                <tr>
                  <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">Discount :</td>
                  <td class="price" colspan="3" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>{{$order->currency_sign}}{{ round($order->coupon_discount * $order->currency_value , 2) }}</b></td>
                </tr>
                @endif --}}
                
                <tr>
                  <td colspan="2" style="line-height: 49px;font-family: Arial;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">Payment Method</td>
                  <td class="price" colspan="3" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>{{$order->method}}</b></td>
                </tr>
                @if($order->dp != 1)
                <tr>
                  <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;                  padding-left: 20px;text-align:left;border-right: unset;">Shipping : </td>
                  <td class="price" colspan="3" style="                  line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>{{$order->shipping}}</b></td>
                </tr>
                <tr>
                  <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;                  padding-left: 20px;text-align:left;border-right: unset;">Ship cost : </td>
                  <td class="price" colspan="3" style="                  line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>{{ App\Models\Product::convertPrice($order->shipping_cost) }}</b></td>
                </tr>
                @endif
                <tr>
                  <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;                  padding-left: 20px;text-align:left;border-right: unset;">TOTAL PAID :</td>
                  <td class="price" colspan="3" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>{{$order->currency_sign}}{{ round($order->pay_amount * $order->currency_value , 2) }}</b></td>
                </tr>
                <tr>
                  <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;                  padding-left: 20px;text-align:left;border-right: unset;">Order Status :</td>
                  <td class="price" colspan="3" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>{{$order->status}}</b></td>
                </tr>
              </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" border="0" align="left" style="width: 100%;margin-top: 30px;    margin-bottom: 30px;">
              <tbody>
                <tr>
                  <td style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%;">
                    <h5 style="font-size: 16px; font-weight: 500;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">DILIVERY ADDRESS</h5>
                    <p style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">Name: {{$order->customer_name}}<br> Email: {{$order->customer_email}} <br>Phone: {{$order->customer_phone}} <br>Address:  {{$order->customer_address}} <br>{{$order->customer_city}}-{{$order->customer_zip}}</p>
                    {{-- <p style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">268 Cambridge Lane New Albany,<br> IN 47150268 Cambridge Lane <br>New Albany, IN 47150</p> --}}
                  </td>
                  <td class="user-info" width="57" height="25"></td>
                  @if($order->dp != 1)
                  <td class="user-info" style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%;">
                    <h5 style="font-size: 16px;font-weight: 500;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">SHIPPING ADDRESS</h5>
                    <p style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">Name: {{$order->shipping_name == null ? $order->customer_name : $order->shipping_name}}
                      <br> Email: {{$order->shipping_email == null ? $order->customer_email : $order->shipping_email}} 
                      <br>Phone: {{$order->shipping_phone == null ? $order->customer_phone :
                        $order->shipping_phone}} 
                      <br>Address: {{$order->shipping_address == null ? $order->customer_address :
                        $order->shipping_address}}

                      <br>{{$order->shipping_city == null ? $order->customer_city : $order->shipping_city}}-{{$order->shipping_zip
                          == null ? $order->customer_zip : $order->shipping_zip}}
                    </p>
                  </td>
                  @endif
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="main-bg-light text-center top-0" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td style="padding: 30px;">
            <div>
              <h4 class="title" style="margin:0;text-align: center;">Follow us</h4>
            </div>
            <table class="footer-social-icon" border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top:20px;">
              <tbody>
                <tr>
                  <td><a href="#"><img src="{{ asset('assets/images/order/facebook.png') }}" alt=""></a></td>
                  <td><a href="#"><img src="{{ asset('assets/images/order/youtube.png') }}" alt=""></a></td>
                  <td><a href="#"><img src="{{ asset('assets/images/order/twitter.png') }}" alt=""></a></td>
                  {{-- <td><a href="#"><img src="{{ asset('assets/images/order/gplus.png') }}" alt=""></a></td> --}}
                  {{-- <td><a href="#"><img src="{{ asset('assets/images/order/linkedin.png') }}" alt=""></a></td> --}}
                  {{-- <td><a href="#"><img src="{{ asset('assets/images/order/pinterest.png') }}" alt=""></a></td> --}}
                </tr>
              </tbody>
            </table>
            <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;">
              <tbody>
                
                <tr>
                  <td>
                    <p style="font-size:13px; margin:0;">2018 - 19 Copy Right Cloudbay World</p>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>

    @endif
  </body>

</html>