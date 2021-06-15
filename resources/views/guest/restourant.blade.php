
<ul>
    @foreach ($restourants as $restourant)
    <li>
        {{$restourant->name}}  <a href="{{ route('products_index', $restourant->id) }}"><input type="button"value="SHOW" ></a>
    </li>
    @endforeach
</ul>