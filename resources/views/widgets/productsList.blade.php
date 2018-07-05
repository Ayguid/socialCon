


<ol>

@foreach (Auth::user()->getProducts() as $key => $value)
  <li><a href="#"><small>{{ 'Producto '}}</small>{{$value['product_name']}}<small>{{ ' Valor : '}}</small>{{$value['price'].'$'}}<br></a></li>
@endforeach

</ol>
