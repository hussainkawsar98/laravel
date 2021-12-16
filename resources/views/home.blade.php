@include('subview.header')
<h2>Country</h2>

<ul>
@forelse($Datakey as $data)
    <li>{{$data}}</li>
@empty
    <p>NO Data</p>
    
@endforelse
</ul>

@if($loginKey == true)
<h1>You are Login</h1>
@elseif($loginKey == false)
<h1>You are not login</h1>
@else
<h1>Not found status</h1>
@endif
{{time()}}
{!!$nam!!}

@include('subview.footer', ['fkey'=> 2021])