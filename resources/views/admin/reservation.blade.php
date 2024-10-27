<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        table{
            border: 1px solid skyblue;
            margin: auto;
            width: 1000px;
            margin-top: 100px;
        }

        th{
            background-color: red;
            font-weight: bold;
            font-size: 20px;
            color: white;
            text-align: center;
            padding: 10px;
        }
        td{
            padding: 10px;
            color: white;
            text-align: center;
        }
    </style>
  </head>
  <body>
   
    @include('admin.header')

    @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">


            <table>
                <tr>
                    <th>Id</th>
                    <th>Phone</th>
                    <th>Guest</th>
                    <th>Time</th>
                    <th>Date</th>
                </tr>

                @foreach ($data as $data)
                    

                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->guest}}</td>
                    <td>{{$data->time}}</td>
                    <td>{{$data->date}}</td>
                </tr>

                @endforeach

            </table>
          </div>

      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>