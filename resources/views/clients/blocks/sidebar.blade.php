<div class="list-group">
   
    @foreach ($categories as $item)
        <a href="#" class="list-group-item list-group-item-action">{{$item->name}}</a>
    @endforeach
  </div>