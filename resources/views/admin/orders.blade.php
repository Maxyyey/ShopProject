<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        table{
            border: 2px solid skyblue;
            text-align: center;
        }
        th{
            background-color: skyblue;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
        .table{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        td{
            color: white;
            padding: 10px;
            border: 1px solid skyblue;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="table">
                <table>
                    <tr>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Change Status</th>
                    </tr>
                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->rec_address}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->product->title}}</td>
                        <td>{{$data->product->price}}</td>
                        <td>
                            <img src="/products/{{$data->product->image}}" width="150">
                        </td>
                        <td>
                          @if($data->status == 'in progress')

                            <span style="color:red;">{{$data->status}}</span>

                          @elseif($data->status == 'In Transit')
                          
                            <span style="color:skyblue;">{{$data->status}}</span>

                          @else

                            <span style="color:yellow;">{{$data->status}}</span>

                          @endif
                        </td>

                        <td>
                          <a class="btn btn-primary" href="{{url('in_transit',$data->id)}}">In Transit</a>

                          <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            


          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>