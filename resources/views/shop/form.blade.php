<form action={{ url('add') }} method="POST">

    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <input type="text" name="id" value="2"><br>

    name : <input type="text" name="name"><br>

    price : <input type="text" name="price"><br>

    qty : <input type="number" name="quantity"><br>

    color : <input type="text" name="color"><br>

    size : <input type="text" name="size"><br>

    <input type="submit" value="submit"><br>

</form>